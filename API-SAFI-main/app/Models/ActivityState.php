<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityState extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function activity(){
        return $this->hasMany(Activity::class);
    }
}
