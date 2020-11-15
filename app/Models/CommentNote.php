<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentNote extends Model
{
    // use HasFactory;

    protected $fillable = ['note_id','dateComment','comment','user_id',];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
