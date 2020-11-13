<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = ['name','code','project_id','sequence','maxtimeopen','maxtimenote','maxtimecomment',];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function turns()
    {
        return $this->hasMany(TurnLocation::class);
    }

    public function folios()
    {
        return $this->hasMany(Folio::class);
    }

    public function uploadSequence(){
        $newSequence = $this->sequence + 1;
        $this->update([
            'sequence' => $newSequence,
        ]);
    }
}
