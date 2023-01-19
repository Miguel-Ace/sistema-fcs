@extends('home')

@section('contenido')
<h1 class="text-left p-2">Banco</h1>
<div class="container">
    
     <a href="{{url('/banco')}}" class="btn btn-warning mb-3">
        <ion-icon name="arrow-undo-outline"></ion-icon>
          Volver a lista banco
    </a>

    <div class="row justify-content-center bordeOscuro">
        <div class="parteSuperiorTablas">
            <p>Ver banco</p>
            <div class="buscador">
            </div>
        </div>
        
        <div class="vistas">
            <div class="show">
                <div>
                    <p><span>Banco:</span> {{$datos->banco}}</p>
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