<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barrio extends Model
{
    use HasFactory;
    function cantones(){
        return $this->belongsTo(Cantone::class,'id_canton');
    }
}
