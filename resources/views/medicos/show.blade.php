@extends('home')

@section('contenido')
<h1 class="text-left p-2">Médicos</h1>
<div class="container">
    
     <a href="{{url('/medicos')}}" class="btn btn-warning mb-3">
        <ion-icon name="arrow-undo-outline"></ion-icon>
          Volver a lista de médicos
        </a>
    </a>

    <div class="row justify-content-center bordeOscuro">
        <div class="parteSuperiorTablas">
            <p>Ver médico</p>
            <div class="buscador">
            </div>
        </div>
        
        <div class="vistas">
            <div class="show">
                <div>
                    <p><span>Nombre:</span> {{$datos->nombre}}</p>
                    <p><span>Dirección:</span> {{$datos->direccion}}</p>
                </div>
                
                <div>
                    <p><span>Apellido:</span> {{$datos->apellido}}</p>
                    <p><span>Cédula:</span> {{$datos->cedula}}</p>
                </div>
                
                <div>
                    <p><span>Correo:</span> {{$datos->email}}</p>
                </div>
                
                <div>
                    <p><span>Teléfono:</span> {{$datos->telefono}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection