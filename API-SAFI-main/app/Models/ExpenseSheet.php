<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseSheet extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function expense(){
        return $this->belongsTo(Expense::class);
    }

    public function expenseSheetState(){
        return $this->belongsTo(ExpenseSheetState::class);
    }
    
    public function employee(){
        return $this->belongsTo(Employee::class);
    }


}
