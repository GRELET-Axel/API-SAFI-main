<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function employee(){
        return $this->belongsTo(Employee::class);
    }

    public function expenseActivityPackage(){
        return $this->hasMany(ExpenseActivityPackage::class);
    }

    public function activityState(){
        return $this->belongsTo(ActivityState::class);
    }

    public function activityPractitioner(){
        return $this->hasMany(ActivityPractitioner::class);
    }
}
