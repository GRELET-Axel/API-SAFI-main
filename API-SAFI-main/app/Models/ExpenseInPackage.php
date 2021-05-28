<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseInPackage extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function expensePackageType(){
        return $this->hasMany(ExpensePackageType::class);
    }
    
    public function expense(){
        return $this->belongsTo(Expense::class);
    }

}