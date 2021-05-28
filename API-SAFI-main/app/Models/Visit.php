<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Visit extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'practitioners_id',
        'employees_id',
        'attendedDate',
        'visitStates_id'
    ];
    
    public function employee(){
        return $this->belongsTo(Employee::class);
    }

    public function practitioner(){
        return $this->belongsTo(Practitioner::class);
    }

    public function visitState(){
        return $this->belongsTo(VisitState::class);
    }

    public function visitReport(){
        return $this->hasOne(VisitReport::class);
    }
}
