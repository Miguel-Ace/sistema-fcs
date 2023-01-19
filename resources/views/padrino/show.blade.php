@extends('home')

@section('contenido')
<h1 class="text-left p-2">Padrinos</h1>
<div class="container">
    
     <a href="{{url('/padrinos')}}" class="btn btn-warning mb-3">
        <ion-icon name="arrow-undo-outline"></ion-icon>
          Volver a Lista de Padrinos
    </a>

    <div class="row justify-content-center bordeOscuro">
        <div class="parteSuperiorTablas">
            <p>Ver Padrinos</p>
            <div class="buscador">
            </div>
        </div>
        
        <div class="vistas">
            <div class="show">
                <div>
                    <p><span>Nombre:</span> {{$datos->nombre}}</p>
                    <p><span>Tipo:</span> {{$datos->tipo}}</p>
                    <p><span>Teléfono:</span> {{$datos->telefono}}</p>
                </div>
                
                <div>
                    <p><span>Apellido:</span> {{$datos->apellido}}</p>
                    <p><span>Fecha de Inicio:</span> {{$datos->fecha_inicio}}</p>
                    <p><span>Método de Pago:</span> {{$datos->metodos_pagos->metodo_pago}}</p>
                </div>
                
                <div>
                    <p><span>Fecha de Nacimiento:</span> {{$datos->fecha_nacimiento}}</p>
                    <p><span>Fecha Final:</span> {{$datos->fecha_final}}</p>
                    <p><span>Dirección:</span> {{$datos->direccion}}</p>
                </div>
                
                <div>
                    <p><span>Banco:</span> {{$datos->bancos->banco}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection