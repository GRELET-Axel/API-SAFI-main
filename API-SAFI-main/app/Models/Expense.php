<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function expenseInPackages(){
        return $this->hasMany(ExpenseInPackage::class);
    }

    public function expenseOutPackage(){
        return $this->hasMany(ExpenseOutPackage::class);
    }

    public function expenseActivityPackage(){
        return $this->hasMany(ExpenseActivityPackage::class);
    }

    public function expenseSheet(){
        return $this->hasMany(ExpenseSheet::class);
    }
    
    public function expenseState(){
        return $this->belongsTo(ExpenseState::class);
    }
}


