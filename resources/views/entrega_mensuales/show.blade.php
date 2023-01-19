@extends('home')

@section('contenido')
<h1 class="text-left p-2">Entregas Mensuales</h1>
<div class="container">
    
     <a href="{{url('/entregas_mensuales')}}" class="btn btn-warning mb-3">
        <ion-icon name="arrow-undo-outline"></ion-icon>
          Volver a Entregas Mensuales
    </a>

    <div class="row justify-content-center bordeOscuro">
        <div class="parteSuperiorTablas">
            <p>Ver entrega mensual</p>
            <div class="buscador">
            </div>
        </div>
        
        <div class="vistas">
            <div class="show">
                <div>
                    <p><span>Expediente:</span> {{$datos->expedientes->nombre1}} {{$datos->expedientes->nombre2}} {{$datos->expedientes->apellido1}} {{$datos->expedientes->apellido2}}</p>
                    <p><span>Grado Escolar:</span> {{$datos->grado_escolar}}</p>
                    <p><span>Observaciones:</span> {{$datos->observaciones}}</p>
                </div>
                
                <div>
                    <p><span>Nombre del Padrino:</span> {{$datos->padrinos->nombre}} {{$datos->padrinos->apellido}}</p>
                    <p><span>Talla de Pantalón:</span> {{$datos->talla_pantalon}}</p>
                </div>
                
                <div>
                    <p><span>Fecha:</span> {{$datos->fecha}}</p>
                    <p><span>Talla de Camisa:</span> {{$datos->talla_camisa}}</p>
                </div>
                
                <div>
                    <p><span>Edad:</span> {{$datos->edad}}</p>
                    <p><span>Talla de Zapato:</span> {{$datos->talla_zapato}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection