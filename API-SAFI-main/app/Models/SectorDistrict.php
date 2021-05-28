<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectorDistrict extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function sector(){
        return $this->hasMany(Sector::class);
    }

    public function employee(){
        return $this->belongsTo(Employee::class);
    }

    public function practitioner(){
        return $this->belongsTo(Practitioner::class);
    }
}
