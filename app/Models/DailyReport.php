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
}
