@extends('home')

@section('contenido')
<h1 class="text-left p-2">Centro Educativo</h1>
<div class="container">
    
     <a href="{{url('/centro_educativo')}}" class="btn btn-warning mb-3">
        <ion-icon name="arrow-undo-outline"></ion-icon>
          Volver a lista centro educativo
    </a>

    <div class="row justify-content-center bordeOscuro">
        <div class="parteSuperiorTablas">
            <p>Ver centro educativo</p>
            <div class="buscador">
            </div>
        </div>
        
        <div class="vistas">
            <div class="show">
                <div>
                    <p><span>Centro Educativo:</span> {{$datos->centro_educativo}}</p>
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