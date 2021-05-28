<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Practitioner extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function activityPractitioner(){
        return $this->hasMany(ActivityPractitioner::class);
    }

    public function sectorDistrict(){
        return $this->belongsTo(SectorDistrict::class);
    }

    public function visit(){
        return $this->hasOne(Visit::class);
    }

}
