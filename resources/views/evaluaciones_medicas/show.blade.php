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
                    <p><span>Número de Expediente:</span> {{$datos->expedientes->id}}</p>
                    <p><span>Nombre del Médico:</span> {{$datos->medicos->nombre}}</p>
                    <p><span>Fecha de Ingreso:</span> {{$datos->fecha}}</p>
                    <p><span>Semáforo:</span> {{$datos->semaforo}}</p>
                </div>
                
                <div>
                    <p><span>Cancer:</span> {{$datos->cancer}}</p>
                    <p><span>Asma:</span> {{$datos->asma}}</p>
                    <p><span>Diabetes:</span> {{$datos->diabetes}}</p>
                    <p><span>Notas del Médico:</span> {{$datos->notas}}</p>
                </div>
                
                <div>
                    <p><span>Epilepcia:</span> {{$datos->epilepcia}}</p>
                    <p><span>Enfermadedas Cardíacas:</span> {{$datos->enfermedad_corazon}}</p>
                    <p><span>Ostogenesis:</span> {{$datos->ostogenesis}}</p>
                    <p><span>Anteojos:</span> {{$datos->anteojos}}</p>
                </div>
                
                <div>
                    <p><span>Sindrome de Piernas Inquietas:</span> {{$datos->sindrome_piernas_inquietas}}</p>
                    <p><span>Otras Enfermedades:</span> {{$datos->otras_enfermedades}}</p>
                    <p><span>Frenillos:</span> {{$datos->frenillos}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection