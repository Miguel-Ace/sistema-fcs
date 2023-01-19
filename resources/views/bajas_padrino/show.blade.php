@extends('home')

@section('contenido')
<h1 class="text-left p-2">Baja de Padrino</h1>
<div class="container">
    
     <a href="{{url('/baja_padrinos')}}" class="btn btn-warning mb-3">
        <ion-icon name="arrow-undo-outline"></ion-icon>
          Volver a lista baja padrinos
    </a>

    <div class="row justify-content-center bordeOscuro">
        <div class="parteSuperiorTablas">
            <p>Ver baja a pradino</p>
            <div class="buscador">
            </div>
        </div>
        
        <div class="vistas">
            <div class="show">
                    
                    <div>
                        <p><span>Nombre:</span> {{$datos->padrinos->nombre}} {{$datos->padrinos->apellido}}</p>
                    </div>
                    
                    
                    <div>
                        <p><span>Epdiente:</span> {{$datos->expedientes->nombre1}} {{$datos->expedientes->apellido1}} {{$datos->expedientes->nombre2}} {{$datos->expedientes->apellido2}}</p>
                    </div>
                    
                    <div>
                        <p><span>Fecha de Baja:</span> {{$datos->fecha_baja}}</p>
                    </div>
                    
                    <div>
                        <p><span>Quien sale:</span> {{$datos->quien_sale}}</p>
                    </div>
                    
                    <div>
                        <p><span>Motivo de Baja:</span> {{$datos->motivo_bajas->motivo_baja}}</p>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection