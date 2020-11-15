<?php

namespace App;

use App\Models\LocationUser;
use App\Models\Permit;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'user', 'email', 'role_id','password', 'status', 'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function permit(){
        return $this->hasOne(Permit::class);
    }

    public function locations(){
        return $this->hasMany(LocationUser::class);
    }

    public function permits(){
        return $this->hasMany(Permit::class);
    }

    public function isDailyReportApprover($location){
        $locationUser = LocationUser::where('user_id',$this->id)->where('location_id',$location->id)->first();
        return ($locationUser->dailyreport_approver==1);
    }

    public function isFolioApprover($location){
        $locationUser = LocationUser::where('user_id',$this->id)->where('location_id',$location->id)->first();
        return ($locationUser->folio_approver==1);
    }
    
}
