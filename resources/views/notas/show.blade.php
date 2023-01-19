@extends('home')

@section('contenido')
<h1 class="text-left p-2">Notas</h1>
<div class="container">
    
     <a href="{{url('/notas')}}" class="btn btn-warning mb-3">
        <ion-icon name="arrow-undo-outline"></ion-icon>
          Volver a Lista de Notas
    </a>

    <div class="row justify-content-center bordeOscuro">
        <div class="parteSuperiorTablas">
            <p>Ver Notas</p>
            <div class="buscador">
            </div>
        </div>
        
        <div class="vistas">
            <div class="show">
                <div>
                    <p><span>Expediente:</span> {{$datos->expedientes->nombre}} {{$datos->expedientes->apellido}}</p>
                    <p><span>Clasificación de Nota:</span> {{$datos->clasificacion_notas->clasificacion_nota}}</p>
                </div>
                
                <div>
                    <p><span>Promedio:</span> {{$datos->promedio}}</p>
                    <p><span>Tipo de promedio:</span> {{$datos->tipo_promedio}}</p>
                </div>
                
                <div>
                    <p><span>Fecha:</span> {{$datos->fecha}}</p>
                </div>
                
                <div>
                    <p><span>Grado Escolar:</span> {{$datos->grados_escolares->grado_escolar}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection