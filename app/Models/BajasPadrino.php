<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BajasPadrino extends Model
{
    use HasFactory;
    function padrinos(){
        return $this->belongsTo(Padrino::class,'id_padrino');
    }
    function expedientes(){
        return $this->belongsTo(Expediente::class, 'id_expediente');
    }
    function motivo_bajas(){
        return $this->belongsTo(MotivoBaja::class, 'id_motivo_baja');
    }
}
