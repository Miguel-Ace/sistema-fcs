@extends('home')

@section('contenido')
<h1 class="text-left p-2">Detalle Entregas Mensuales</h1>
<div class="container">
    
     <a href="{{url('/detalle_entregas_mensuales')}}" class="btn btn-warning mb-3">
        <ion-icon name="arrow-undo-outline"></ion-icon>
          Volver a lista de detalle Entregas Mensuales
    </a>

    <div class="row justify-content-center bordeOscuro">
        <div class="parteSuperiorTablas">
            <p>Ver detalle Entregas Mensuales</p>
            <div class="buscador">
            </div>
        </div>
        
        <div class="vistas">
            <div class="show">
                <div>
                    <p><span>Entregas Mensuales:</span> {{$datos->entregas_mensuales->id}}</p>
                </div>
                
                <div>
                    <p><span>Entregas Mensuales:</span> {{$datos->tipo_entregas->tipo_entrega}}</p>
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