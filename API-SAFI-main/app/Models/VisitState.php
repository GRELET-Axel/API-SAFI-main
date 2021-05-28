<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitState extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function visit(){
        return $this->hasMany(Visit::class);
    }
}
