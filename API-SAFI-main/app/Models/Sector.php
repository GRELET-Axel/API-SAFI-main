<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function employee(){
        return $this->hasMany(Employee::class);
    }

    public function sectorDistrict(){
        return $this->belongsTo(SectorDistrict::class);
    }
}
