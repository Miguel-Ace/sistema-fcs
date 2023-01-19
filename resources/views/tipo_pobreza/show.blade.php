@extends('home')

@section('contenido')
<h1 class="text-left p-2">Tipo Pobreza</h1>
<div class="container">
    
     <a href="{{url('/tipo_pobreza')}}" class="btn btn-warning mb-3">
        <ion-icon name="arrow-undo-outline"></ion-icon>
          Volver a lista Tipo Pobreza
    </a>

    <div class="row justify-content-center bordeOscuro">
        <div class="parteSuperiorTablas">
            <p>Ver Tipo Pobreza</p>
            <div class="buscador">
            </div>
        </div>
        
        <div class="vistas">
            <div class="show">
                <div>
                    <p><span>Tipo Pobreza:</span> {{$datos->tipo_pobreza}}</p>
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