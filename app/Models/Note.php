<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = ['workbook_id','period_id','dateNote','note','user_id','status',];

    public function workbook()
    {
        return $this->belongsTo(Workbook::class);
    }

    public function period()
    {
        return $this->belongsTo(Period::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function attachments()
    {
        return $this->hasMany(AttachmentNote::class);
    }

    public function comments()
    {
        return $this->hasMany(CommentNote::class);
    }
}
