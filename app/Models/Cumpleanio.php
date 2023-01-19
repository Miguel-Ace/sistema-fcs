<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cumpleanio extends Model
{
    use HasFactory;
    function padrinos(){
        return $this->belongsTo(Padrino::class,'id_padrino');
    }
}
