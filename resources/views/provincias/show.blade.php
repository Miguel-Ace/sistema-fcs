@extends('home')

@section('contenido')
<h1 class="text-left p-2">Provincias</h1>
<div class="container">
    
     <a href="{{url('/provincias')}}" class="btn btn-warning mb-3">
        <ion-icon name="arrow-undo-outline"></ion-icon>
          Volver a lista provincias
    </a>

    <div class="row justify-content-center bordeOscuro">
        <div class="parteSuperiorTablas">
            <p>Ver provincia</p>
            <div class="buscador">
            </div>
        </div>
        
        <div class="vistas">
            <div class="show">
                <div>
                    <p><span>Provincia:</span> {{$datos->provincia}}</p>
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