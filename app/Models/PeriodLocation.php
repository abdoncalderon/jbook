<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriodLocation extends Model
{
    use HasFactory;

    public function period()
    {
        return $this->belongsTo(Period::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
