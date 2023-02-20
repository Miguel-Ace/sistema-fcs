@extends('home')

@section('contenido')
<h1 class="text-left p-2">Cumpleaños</h1>
<div class="container">
    
     <a href="{{url('/cumpleanios')}}" class="btn btn-warning mb-3">
        <ion-icon name="arrow-undo-outline"></ion-icon>
          Volver a lista de cumpleaños
    </a>

    <div class="row justify-content-center bordeOscuro">
        <div class="parteSuperiorTablas">
            <p>Ver cumpleaños</p>
            <div class="buscador">
            </div>
        </div>
        
        <div class="vistas">
            <div class="show">
                <div>
                    <p><span>Nombre del Padrino:</span> {{$datos->padrinos->nombre}} {{$datos->padrinos->apellido}}</p>
                    <p><span>Observaciones:</span> {{$datos->observaciones}}</p>
                </div>
                
                <div>
                    <p><span>Fecha:</span> {{$datos->fecha}}</p>
                    <p><span>Entrega del video:</span> {{$datos->entrega_video}}</p>
                </div>

                <div>
                    <p><span>Fecha Entrega de Carta:</span> {{$datos->fecha_entrega_carta}}</p>
                    <p><span>Regalo:</span> {{$datos->regalo}}</p>
                </div>
                
                <div>
                    <p><span>Entrega Carta de Presentación:</span> {{$datos->entrega_carta_presentacion}}</p>
    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection