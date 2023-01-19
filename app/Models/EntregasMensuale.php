<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntregasMensuale extends Model
{
    use HasFactory;
    function expedientes(){
        return $this->belongsTo(Expediente::class, 'id_expediente');
    }
    function padrinos(){
        return $this->belongsTo(Padrino::class, 'id_padrino');
    }
}
