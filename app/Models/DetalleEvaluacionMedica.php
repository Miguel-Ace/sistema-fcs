<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleEvaluacionMedica extends Model
{
    use HasFactory;

    function evaluacion_medicas(){
        return $this->belongsTo(EvaluacionesMedica::class,'id_evaluacion_medica');
    }
    function especialidades(){
        return $this->belongsTo(Especialidad::class, 'id_especialidad');
    }
}
