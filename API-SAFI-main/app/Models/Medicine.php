<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Medicine extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function medVisitReport(){
        return $this->hasMany(MedecineVisitReport::class);
    }

    public function medFamily(){
        return $this->hasMany(MedecineFamily::class);
    }
    
}
