@extends('home')

@section('contenido')
<h1 class="text-left p-2">Barrio </h1>
<div class="container">
    
     <a href="{{url('/barrios')}}" class="btn btn-warning mb-3">
        <ion-icon name="arrow-undo-outline"></ion-icon>
          Volver a lista de barrios
    </a>

    <div class="row justify-content-center bordeOscuro">
        <div class="parteSuperiorTablas">
            <p>Ver barrio</p>
            <div class="buscador">
            </div>
        </div>
        
        <div class="vistas">
            <div class="show">
                <div>
                    <p><span>Barrio:</span> {{$datos->barrio}}</p>
                </div>
                
                <div>
                    <p><span>Cantón:</span> {{$datos->cantones->canton}}</p>
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