@extends('home')

@section('contenido')
<h1 class="text-left p-2">Motivo Bajas</h1>
<div class="container">
    
     <a href="{{url('/motivo_baja')}}" class="btn btn-warning mb-3">
        <ion-icon name="arrow-undo-outline"></ion-icon>
          Volver a lista Motivo Baja
        </a>
    </a>

    <div class="row justify-content-center bordeOscuro">
        <div class="parteSuperiorTablas">
            <p>Ver motivo bajas</p>
            <div class="buscador">
            </div>
        </div>
        
        <div class="vistas">
            <div class="show">
                <div>
                    <p><span>Motivo de Baja:</span> {{$datos->motivo_baja}}</p>
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