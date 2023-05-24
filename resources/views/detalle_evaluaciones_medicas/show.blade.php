@extends('home')

@section('contenido')
<h1 class="text-left p-2">Evaluaciones Médicas</h1>
<div class="container">

     <a href="{{url('/evaluaciones_medicas')}}" class="btn btn-warning mb-3">
        <ion-icon name="arrow-undo-outline"></ion-icon>
          Volver a evaluaciones médicas
    </a>

    <div class="row justify-content-center bordeOscuro">
        <div class="parteSuperiorTablas">
            <p>Ver evaluaciones médicas</p>
            <div class="buscador">
            </div>
        </div>

        <div class="vistas">
            <div class="show">
                <div>
                    <p><span>Especialidad:</span> {{$datos->id_especialidad}}</p>
                    <p><span>Fecha:</span> {{$datos->fecha}}</p>
                </div>

                <div>
                    <p><span>Médico:</span> {{$datos->medico}}</p>
                    <p><span>Semaforo:</span> {{$datos->semaforo}}</p>
                </div>

                <div>
                    <p><span>Diagnostico:</span> {{$datos->diagnostico}}</p>
                    @if ($datos->nombre_diente)
                        <p><span>Nombre Diente:</span> {{$datos->nombre_diente}}</p>
                    @endif
                </div>

                <div>
                    <p><span>Obsevación:</span> {{$datos->obsevacion}}</p>
                    @if ($datos->descripcion)
                        <p><span>Descripción:</span> {{$datos->descripcion}}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
