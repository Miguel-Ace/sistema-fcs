@extends('home')

@section('contenido')
<h1 class="text-left p-2">Asistencia</h1>
<div class="container">

     <a href="{{url('/asistencias')}}" class="btn btn-warning mb-3">
        <ion-icon name="arrow-undo-outline"></ion-icon>
          Volver a asistencia
    </a>

    <div class="row justify-content-center bordeOscuro">
        <div class="parteSuperiorTablas">
            <p>Ver expedientes</p>
            <div class="buscador">
            </div>
        </div>

        <div class="vistas">
            <div class="show">
                <div>
                    <p><span>Expediente:</span> {{$datos->expedientes->nombre1}} {{$datos->expedientes->nombre2}} {{$datos->expedientes->apellido1}} {{$datos->expedientes->apellido2}}</p>
                </div>

                <div>
                    <p><span>Fecha:</span> {{$datos->fecha}}</p>
                </div>

                <div>
                </div>

                <div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
