<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class Workbook extends Model
{
    use HasFactory;

    protected $fillable = ['dateWorkbook','location_id','user_id','number'];

    public function location(){
        return $this->belongsTo(Location::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function daily_reports(){
        return $this->hasMany(DailyReport::class);
    }

    public function status(){
        $dateWorkbook = strtotime($this->dateWorkbook);
        $today = strtotime(Carbon::today()->toDateString());
        $differenceInHours = abs(round(($dateWorkbook - $today)/60/60,0));
        $locationMaxTimeOpen = $this->location->maxtimeopen;
        if (($differenceInHours > $locationMaxTimeOpen)){
            return __('content.closed');
        }else{
            return __('content.opened');
        }
        
    }

}
