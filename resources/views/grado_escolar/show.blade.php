@extends('home')

@section('contenido')
<h1 class="text-left p-2">Grado Escolar</h1>
<div class="container">
    
     <a href="{{url('/grado_escolar')}}" class="btn btn-warning mb-3">
        <ion-icon name="arrow-undo-outline"></ion-icon>
          Volver a lista de Grado Escolar
        </a>
    </a>

    <div class="row justify-content-center bordeOscuro">
        <div class="parteSuperiorTablas">
            <p>Ver Grado Escolar</p>
            <div class="buscador">
            </div>
        </div>
        
        <div class="vistas">
            <div class="show">
                <div>
                    <p><span>Grado Escolar:</span> {{$datos->grado_escolar}}</p>
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