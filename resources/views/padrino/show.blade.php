@extends('home')

@section('contenido')
<h1 class="text-left p-2">Padrinos</h1>
<div class="container">

     <a href="{{url('/padrinos')}}" class="btn btn-warning mb-3">
        <ion-icon name="arrow-undo-outline"></ion-icon>
          Volver a Lista de Padrinos
    </a>

    <div class="row justify-content-center bordeOscuro">
        <div class="parteSuperiorTablas">
            <p>Datos del Padrinos</p>
            <div class="buscador">
            </div>
        </div>

        <div class="vistas">
            <div class="show">
                <div>
                    <p><span>Nombre:</span> {{$datos->nombre}}</p>
                    <p><span>Tipo:</span> {{$datos->tipo}}</p>
                    <p><span>Teléfono:</span> {{$datos->telefono}}</p>
                    <p><span>Provincia:</span> {{$datos->provincia}}</p>
                    <p><span>Banco:</span> {{$datos->bancos->banco}}</p>
                </div>

                <div>
                    <p><span>Apellido:</span> {{$datos->apellido}}</p>
                    <p><span>Fecha de Inicio:</span> {{$datos->fecha_inicio}}</p>
                    <p><span>Método de Pago:</span> {{$datos->metodos_pagos->metodo_pago}}</p>
                    <p><span>Cantón:</span> {{$datos->canton}}</p>
                </div>

                <div>
                    <p><span>Fecha de Nacimiento:</span> {{$datos->fecha_nacimiento}}</p>
                    <p><span>Fecha Final:</span> {{$datos->fecha_final}}</p>
                    <p><span>Dirección:</span> {{$datos->direccion}}</p>
                    <p><span>Barrio:</span> {{$datos->barrio}}</p>
                </div>
            </div>
        </div>

        @php
            $incrementable = 0;
        @endphp
        <div class="parteSuperiorTablas">
            <p></p>
        </div>

        <div class="showtable">
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Edad</th>
                        <th>Comunidad</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($expedientes as $expediente)
                    @php
                        $fecha_nacimiento = $expediente->fecha_nacimiento;
                        $fecha_nacimiento = \Carbon\Carbon::parse($fecha_nacimiento);
                        $fecha_actual = \Carbon\Carbon::now();
                        $edad = $fecha_nacimiento->diffInYears($fecha_actual);
                    @endphp
                        @if ($expediente->padrino == $obtenerId)
                            @php
                                $incrementable += 1
                            @endphp
                            <tr>
                                <td>{{$expediente->nombre1}} {{$expediente->nombre2}} {{$expediente->apellido1}} {{$expediente->apellido2}}</td>
                                <td>{{$edad}}</td>
                                <td>{{$expediente->comunidades->comunidad}}</td>
                            </tr>
                        @endif
                    @endforeach
                    <p class="titulo-ahijados">Ahijados Asignados: {{$incrementable}}</p>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
