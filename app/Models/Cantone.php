<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cantone extends Model
{
    use HasFactory;
    function provincias(){
        return $this->belongsTo(Provincia::class, 'id_provincia');
    }
}
