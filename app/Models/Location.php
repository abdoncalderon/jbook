<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = ['name','code','project_id','sequence',];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function periods(){
        return $this->hasMany(Period::class);
    }

    public function uploadSequence(){
        $newSequence = $this->sequence + 1;
        $this->update([
            'sequence' => $newSequence,
        ]);
    }
}
