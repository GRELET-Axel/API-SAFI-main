<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExpensePackageType extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function expenseInPackage(){
        return $this->belongsTo(ExpenseInPackage::class);
    }
}
