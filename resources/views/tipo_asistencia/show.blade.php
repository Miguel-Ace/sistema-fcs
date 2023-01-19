@extends('home')

@section('contenido')
<h1 class="text-left p-2">Tipo Asistencia</h1>
<div class="container">

     <a href="{{url('/tipo_asistencia')}}" class="btn btn-warning mb-3">
        <ion-icon name="arrow-undo-outline"></ion-icon>
          Volver a Tipo de Asistencia
    </a>

    <div class="row justify-content-center bordeOscuro">
        <div class="parteSuperiorTablas">
            <p>Ver tipo asistencia</p>
            <div class="buscador">
            </div>
        </div>

        <div class="vistas">
            <div class="show">
                <div>
                    <p><span>Tipo Asistencia:</span> {{$datos->tipo_asistencia}}</p>
                </div>

                <div>
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
