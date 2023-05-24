@extends('home')

@section('contenido')
<h1 class="text-left p-2">Actividades</h1>
<div class="container">

     <a href="{{url('/actividades')}}" class="btn btn-warning mb-3">
        <ion-icon name="arrow-undo-outline"></ion-icon>
          Volver a actividades
    </a>

    <div class="row justify-content-center bordeOscuro">
        <div class="parteSuperiorTablas">
            <p>Ver actividades</p>
            <div class="buscador">
            </div>
        </div>

        <div class="vistas">
            <div class="show">
                <div>
                    <p><span>Actividad:</span> {{$datos->actividad}}</p>
                    <p><span>Observación:</span> {{$datos->observacion}}</p>
                </div>

                <div>
                    <p><span>Rubro:</span> {{$datos->rubro}}</p>
                    <p><span>Patrocinador:</span> {{$datos->patrocinador}}</p>
                </div>
                
                <div>
                    <p><span>Fecha De Creación:</span> {{$datos->fecha_creacion}}</p>
                    <p><span>Tipo de Asistencia:</span> {{$datos->tipoAsistencias->tipo_asistencia}}</p>
                </div>
                
                <div>
                    <p><span>Fecha De Actividad:</span> {{$datos->fecha_actividad}}</p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
