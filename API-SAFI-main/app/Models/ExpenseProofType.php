<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseProofType extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function expenseProof(){
        return $this->belongsTo(ExpenseProof::class);
    }
}
