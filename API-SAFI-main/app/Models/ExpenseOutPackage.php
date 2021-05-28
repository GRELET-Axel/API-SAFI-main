<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseOutPackage extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function expenseProof(){
        return $this->hasMany(ExpenseProof::class);
    }
    
    public function expense(){
        return $this->belongsTo(Expense::class);
    }

}
