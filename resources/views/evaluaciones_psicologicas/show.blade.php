@extends('home')

@section('contenido')
<h1 class="text-left p-2">Evaluaciones Psicológicas</h1>
<div class="container">
    
     <a href="{{url('/evaluaciones_psicologicas')}}" class="btn btn-warning mb-3">
        <ion-icon name="arrow-undo-outline"></ion-icon>
          Volver a evaluaciones psicológicas
    </a>

    <div class="row justify-content-center bordeOscuro">
        <div class="parteSuperiorTablas">
            <p>Ver evaluación psicológic</p>
            <div class="buscador">
            </div>
        </div>
        
        <div class="vistas">
            <div class="show">
                <div>
                    <p><span>Nombre del Médico:</span> {{$datos->medicos->nombre}}</p>
                    <p><span>Semaforo:</span> {{$datos->semaforo}}</p>
                </div>
                
                <div>
                    <p><span>Número de Expediente:</span> {{$datos->expedientes->id}}</p>
                </div>
                
                <div>
                    <p><span>Categoría:</span> {{$datos->categoria_psicologica}}</p>
                </div>
                
                <div>
                    <p><span>Nota:</span> {{$datos->nota}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection