@extends('home')

@section('contenido')
<h1 class="text-left p-2">Cantón</h1>
<div class="container">
    
     <a href="{{url('/cantones')}}" class="btn btn-warning mb-3">
        <ion-icon name="arrow-undo-outline"></ion-icon>
          Volver a lista de cantones
    </a>

    <div class="row justify-content-center bordeOscuro">
        <div class="parteSuperiorTablas">
            <p>Ver cantón</p>
            <div class="buscador">
            </div>
        </div>
        
        <div class="vistas">
            <div class="show">
                <div>
                    <p><span>Cantón:</span> {{$datos->canton}}</p>
                </div>
                
                <div>
                    <p><span>Provincias:</span> {{$datos->provincias->provincia}}</p>
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