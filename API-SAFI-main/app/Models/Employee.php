<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function expenseSheet(){
        return $this->hasMany(ExpenseSheet::class);
    }

    public function appPrivilege(){
        return $this->hasOneThrough(Application::class, Privilege::class);
    }

    public function sector(){
        return $this->belongsTo(sector::class);
    }

    public function visit(){
        return $this->hasMany(visit::class);
    }
    
    public function activity(){
        return $this->hasMany(Activity::class);
    }
}
