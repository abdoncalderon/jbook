<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyReport extends Model
{
    use HasFactory;

    protected $fillable = ['workbook_id','period_id','report','user_id','status','approvedBy','reviewedBy','responsible',];

    public function workbook()
    {
        return $this->belongsTo(Workbook::class);
    }

    public function period()
    {
        return $this->belongsTo(Period::class);
    }

    public function equipments()
    {
        return $this->hasMany(EquipmentDailyReport::class);
    }

    public function positions()
    {
        return $this->hasMany(PositionDailyReport::class);
    }

    public function events()
    {
        return $this->hasMany(EventDailyReport::class);
    }

    public function attachments()
    {
        return $this->hasMany(AttachmentDailyReport::class);
    }

    public function status(){
        $status = $this->status;
        if ($status==0){
            return __('content.draft');
        }elseif($status==1){
            return __('content.final');
        }elseif($status==2){
            return __('content.reviewed');
        }
    }
}
