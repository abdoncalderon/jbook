<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permit extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','create_folio','create_dailyreport','create_note','create_comment','print_dailyreport','print_note','print_folio','edit_sequence',];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
