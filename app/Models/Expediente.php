<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{
    use HasFactory;
    function comunidades(){
        return $this->belongsTo(Comunidad::class, 'id_comunidad');
    }
    function estados(){
        return $this->belongsTo(Estado::class, 'id_estado');
    }
    function tipo_pobrezas(){
        return $this->belongsTo(TipoPobreza::class, 'id_tipo_pobreza');
    }
    function barrios(){
        return $this->belongsTo(Barrio::class, 'id_barrio');
    }
    function grados_escolares(){
        return $this->belongsTo(GradosEscolare::class, 'id_grado_escolar');
    }
    function centro_educativos(){
        return $this->belongsTo(CentroEducativo::class, 'id_centro_educativo');
    }
    // function enfermedades(){
    //     return $this->belongsTo(Enfermedad::class, 'id_enfermedad');
    // }
}
