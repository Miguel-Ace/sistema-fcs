<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Padrino extends Model
{
    use HasFactory;
    function metodos_pagos(){
        return $this->belongsTo(MetodosPago::class, 'id_metodo_pago');
    }
    function bancos(){
        return $this->belongsTo(Banco::class, 'id_banco');
    }
}
