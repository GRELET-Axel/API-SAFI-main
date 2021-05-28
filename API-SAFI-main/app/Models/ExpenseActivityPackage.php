<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseActivityPackage extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function expenseProofs(){
        return $this->hasMany(ExpenseProof::class);
    }
    public function expense(){
        return $this->belongsTo(Expense::class);
    }

    public function activity(){
        return $this->belongsTo(Activity::class);
    }


}
