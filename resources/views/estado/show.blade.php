@extends('home')

@section('contenido')
<h1 class="text-left p-2">Estado</h1>
<div class="container">
    
     <a href="{{url('/estado')}}" class="btn btn-warning mb-3">
        <ion-icon name="arrow-undo-outline"></ion-icon>
          Volver a ista de estado
    </a>

    <div class="row justify-content-center bordeOscuro">
        <div class="parteSuperiorTablas">
            <p>Ver estado</p>
            <div class="buscador">
            </div>
        </div>
        
        <div class="vistas">
            <div class="show">
                <div>
                    <p><span>Estado:</span> {{$datos->estado}}</p>
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