@extends('home')

@section('contenido')
<h1 class="text-left p-2">Expedientes</h1>
<div class="container">
    
     <a href="{{url('/expedientes')}}" class="btn btn-warning mb-3">
        <ion-icon name="arrow-undo-outline"></ion-icon>
          Volver a expedientes
    </a>

    <div class="row justify-content-center bordeOscuro">
        <div class="parteSuperiorTablas">
            <p>Ver expedientes</p>
            <div class="buscador">
            </div>
        </div>
        
        <div class="vistas">
            <div class="show">
                <div>
                    <p><span>Nombres:</span> {{$datos->nombre1}} {{$datos->nombre2}}</p>
                    <p><span>Apellidos:</span> {{$datos->apellido1}} {{$datos->apellido2}}</p>
                    <p><span>Fecha de Nacimiento:</span> {{$datos->fecha_nacimiento}}</p>
                    <p><span>PP:</span> {{$datos->pp}}</p>
                    <p><span>Sexo:</span> {{$datos->sexo}}</p>
                </div>
                
                <div>
                    <p><span>Cédula:</span> {{$datos->cedula}}</p>
                    <p><span>Tipo de Pobreza:</span> {{$datos->tipo_pobrezas->tipo_pobreza}}</p>
                    <p><span>Barrio:</span> {{$datos->barrios->barrio}}</p>
                    <p><span>Fecha de Nacimiento:</span> {{$datos->fecha_nacimiento}}</p>
                    <p><span>RepresentantePEM:</span> {{$datos->representantePEM}}</p>
                </div>

                <div>
                    <p><span>Contacto del Representante:</span> {{$datos->contacto_representante}}</p>
                    <p><span>Grado Ecolar:</span> {{$datos->grados_escolares->grado_escolar}}</p>
                    <p><span>Talla de Pantalón:</span> {{$datos->talla_pantalon}}</p>
                    <p><span>Talla de Camisa:</span> {{$datos->talla_camisa}}</p>
                    <p><span>Talla de Zapatos:</span> {{$datos->talla_zapato}}</p>
                </div>
                
                <div>
                    <p><span>Activo:</span> {{$datos->activo}}</p>
                    <p><span>Nombre del Encargado:</span> {{$datos->nombre_encargado}}</p>
                    <p><span>Teléfono del Encargado:</span> {{$datos->telefono_encargado}}</p>
                    <p><span>Centro Educativo:</span> {{$datos->centro_educativos->centro_educativo}}</p>
    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection