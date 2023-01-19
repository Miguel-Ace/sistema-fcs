<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleActividad extends Model
{
    use HasFactory;

    function actividades(){
        return $this->belongsTo(Actividad::class, 'id_actividad');
    }

    function expedientes(){
        return $this->belongsTo(Expediente::class, 'id_expediente');
    }
}
