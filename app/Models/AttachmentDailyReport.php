<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttachmentDailyReport extends Model
{
    use HasFactory;

    protected $fillable = ['daily_report_id','filename','description','user_id',];
}
