@extends('home')

@section('contenido')
<h1 class="text-left p-2">Lista De Participantes</h1>
<div class="container">

     <a href="{{url('/detalle_actividades?buscar='.$start)}}" class="btn btn-warning mb-3">
        <ion-icon name="arrow-undo-outline"></ion-icon>
          Volver a Lista De Participantes
    </a>

    <div class="row justify-content-center bordeOscuro">
        <div class="parteSuperiorTablas">
            <p>Ver participante</p>
            <div class="buscador">
            </div>
        </div>

        <div class="vistas">
            <div class="show">
                <div>
                    <p><span>Actividad:</span> {{$datos->actividades->actividad}}</p>
                    <p><span>Observación:</span> {{$datos->observacion}}</p>
                </div>

                <div>
                    <p><span>Expdiente:</span> {{$datos->expedientes->nombre1}} {{$datos->expedientes->nombre2}} {{$datos->expedientes->apellido1}} {{$datos->expedientes->apellido2}}</p>
                </div>

                <div>
                    <p><span>Asistencia:</span> {{$datos->asistencia}}</p>
                </div>

                <div>
                    <p><span>Semáforo:</span> {{$datos->semaforo}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
