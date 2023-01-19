<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    use HasFactory;

    function tipoAsistencias(){
        return $this->belongsTo(TipoAsistencia::class, 'id_tipo_asistencia');
    }
}
