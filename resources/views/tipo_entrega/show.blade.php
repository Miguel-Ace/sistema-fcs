@extends('home')

@section('contenido')
<h1 class="text-left p-2">Tipo Entrega</h1>
<div class="container">
    
     <a href="{{url('/tipo_entrega')}}" class="btn btn-warning mb-3">
        <ion-icon name="arrow-undo-outline"></ion-icon>
          Volver a lista Tipo Entrega
    </a>

    <div class="row justify-content-center bordeOscuro">
        <div class="parteSuperiorTablas">
            <p>Ver Tipo Entrega</p>
            <div class="buscador">
            </div>
        </div>
        
        <div class="vistas">
            <div class="show">
                <div>
                    <p><span>Tipo Entrega:</span> {{$datos->tipo_entrega}}</p>
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