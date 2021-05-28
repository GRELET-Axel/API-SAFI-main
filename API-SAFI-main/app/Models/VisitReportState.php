<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitReportState extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function visitReport(){
        return $this->hasMany(VisitReport::class);
    }
}
