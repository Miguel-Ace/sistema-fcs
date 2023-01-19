@extends('home')

@section('contenido')
<h1 class="text-left p-2">Método De Pago</h1>
<div class="container">
    
     <a href="{{url('/metodo_de_pago')}}" class="btn btn-warning mb-3">
        <ion-icon name="arrow-undo-outline"></ion-icon>
          Volver a lista método de pago
        </a>
    </a>

    <div class="row justify-content-center bordeOscuro">
        <div class="parteSuperiorTablas">
            <p>Ver método de pago</p>
            <div class="buscador">
            </div>
        </div>
        
        <div class="vistas">
            <div class="show">
                <div>
                    <p><span>Nombre:</span> {{$datos->metodo_pago}}</p>
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