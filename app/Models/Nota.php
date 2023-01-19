<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;
    function expedientes(){
        return $this->belongsTo(Expediente::class, 'id_expediente');
    }
    function grados_escolares(){
        return $this->belongsTo(GradosEscolare::class, 'id_grado_escolar');
    }
    function clasificacion_notas(){
        return $this->belongsTo(ClasificacionNota::class, 'id_clasificacion_nota');
    }
}
