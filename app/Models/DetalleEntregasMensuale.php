<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleEntregasMensuale extends Model
{
    use HasFactory;
    // function entregas_mensuales(){
    //     return $this->belongsTo(EntregasMensuale::class,'id_entregaMensual');
    // }
    function tipo_entregas(){
        return $this->belongsTo(TipoEntrega::class,'id_tipoEntrega');
    }
    function expedientes(){
        return $this->belongsTo(Expediente::class, 'id_expediente');
    }
}
