<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedecineFamily extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function medicine(){
        return $this->hasMany(Medecine::class);
    }
}
