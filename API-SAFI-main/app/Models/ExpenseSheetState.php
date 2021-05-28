<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseSheetState extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    public function expenseSheet(){
        return $this->belongsTo(ExpenseSheet::class);
    }
}
