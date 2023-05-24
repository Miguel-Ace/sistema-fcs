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
                    <p><span>Expediente:</span> {{$datos->expedientes->nombre1}}</p>
                    <p><span>Talla:</span> {{$datos->talla}}</p>
                </div>

                <div>
                    <p><span>Clínica:</span> {{$datos->clinicas->clinica}}</p>
                    <p><span>Signos:</span> {{$datos->signos}}</p>
                </div>

                <div>
                    <p><span>Fecha de Ingreso:</span> {{$datos->fecha}}</p>
                    <p><span>Notas:</span> {{$datos->notas}}</p>
                </div>

                <div>
                    <p><span>Peso:</span> {{$datos->peso}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
