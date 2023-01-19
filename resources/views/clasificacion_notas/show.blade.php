@extends('home')

@section('contenido')
<h1 class="text-left p-2">Clasificación Notas</h1>
<div class="container">
    
     <a href="{{url('/clasificacion_nota')}}" class="btn btn-warning mb-3">
        <ion-icon name="arrow-undo-outline"></ion-icon>
          Volver a lista clasificación notas
    </a>

    <div class="row justify-content-center bordeOscuro">
        <div class="parteSuperiorTablas">
            <p>Ver clasificación de nota</p>
            <div class="buscador">
            </div>
        </div>
        
        <div class="vistas">
            <div class="show">
                <div>
                    <p><span>Clasificación de Nota:</span> {{$datos->clasificacion_nota}}</p>
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