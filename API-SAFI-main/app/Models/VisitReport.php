<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitReport extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function visit(){
        return $this->belongsTo(Visit::class);
    }

    public function medicineVisitReport(){
        return $this->hasMany(MedicineVisitReport::class);
    }

    public function visitReportState(){
        return $this->belongsTo(VisitReportState::class);
    }
}
