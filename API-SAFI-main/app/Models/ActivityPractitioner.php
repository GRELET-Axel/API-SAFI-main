<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityPractitioner extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function activity(){
        return $this->belongsTo(Activity::class);
    }

    public function practitioner(){
        return $this->belongsTo(Practitioner::class);
    }

}
