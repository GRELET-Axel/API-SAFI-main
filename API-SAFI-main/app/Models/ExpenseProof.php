<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseProof extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function expenseProofType(){
        return $this->hasMany(ExpenseProofType::class);
    }
    
    public function expenseOutPackage(){
        return $this->belongsTo(ExpenseOutPackage::class);
    }

    public function expenseActivityPackage(){
        return $this->belongsTo(expenseActivityPackage::class);
    }
}
