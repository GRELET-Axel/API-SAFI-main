<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedecineVisitReport extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function medicine(){
        return $this->belongsTo(Medicine::class);
    }

    public function visitReport(){
        return $this->belongsTo(VisitReport::class);
    }
}
