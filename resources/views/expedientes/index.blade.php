@extends('home')

@section('contenido')
    <h1 class="text-left p-2">Expedientes</h1>
    <div class="container">

        @role('admin')
        <a href="{{url('/expedientes/create')}}" class="btn btn-warning mb-3">
            <ion-icon name="create-outline"></ion-icon>
            Nuevo Expediente
        </a>
        @endrole

        @role('creador')
        <a href="{{url('/expedientes/create')}}" class="btn btn-warning mb-3">
            <ion-icon name="create-outline"></ion-icon>
            Nuevo Expediente
        </a>
        @endrole

        {{-- <a href="{{url('/expedientes/pdf')}}" class="btn btn-danger mb-3">
            <ion-icon name="download-outline"></ion-icon>
            PDF
        </a>
         --}}

        <div class="row justify-content-center bordeOscuro">
            <div class="parteSuperiorTablas">
                <p>Listado de expedientes</p>
                <div class="buscador">
                    <form action="{{url('/expedientes')}}" method="GET" class="d-flex" role="search">
                        <input class="form-control me-2" type="search" value="{{$busqueda}}" placeholder="Nombre o Apellido" aria-label="Search" name="buscar">
                        <button class="btn btn-outline-success" type="submit"><ion-icon name="search-outline"></ion-icon></button>
                    </form>
                </div>
            </div>

            <div class="col-md-12 fs-6">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            {{-- <th scope="col">#</th> --}}
                            <th scope="col">Primer Nombre</th>
                            <th scope="col">Primer Apellido</th>
                            <th scope="col">Fecha De Nacimiento</th>
                            <th scope="col">Sexo</th>
                            <th scope="col">Nombre Encargado</th>
                            <th scope="col">Telefono Encargado</th>
                            <th scope="col">Semaforo</th>
                            @role('admin')
                                <th scope="col">Acciones</th>
                            @endrole
                            @role('editor')
                                <th scope="col">Acciones</th>
                            @endrole
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($datos as $dato)
                            <tr>
                                {{-- <th>{{$dato->id}}</th> --}}
                                <td>{{$dato->nombre1}}</td>
                                <td>{{$dato->apellido1}}</td>
                                <td>{{$dato->fecha_nacimiento}}</td>
                                <td>{{$dato->sexo}}</td>
                                <td>{{$dato->nombre_encargado}}</td>
                                <td>{{$dato->telefono_encargado}}</td>

                                <td>
                                    @foreach ($evaluacionMedicas as $evaluacionMedica)
                                        @if ($dato->id == $evaluacionMedica->id_expediente)
                                            <p class="d-none">{{ $semaforo = $evaluacionMedica->semaforo }}</p>
                                            <p class="d-none">{{ $id = $evaluacionMedica->id_expediente }}</p>
                                        @endif
                                    @endforeach

                                    @foreach ($evaluacionPsicologicas as $evaluacionPsicologica)
                                        @if ($dato->id == $evaluacionPsicologica->id_expediente)
                                            <p class="d-none">{{ $semaforo2 = $evaluacionPsicologica->semaforo }}</p>
                                            <p class="d-none">{{ $id2 = $evaluacionPsicologica->id_expediente }}</p>
                                        @endif
                                    @endforeach

                                    @foreach ($notas as $nota)
                                        @if ($dato->id == $nota->id_expediente)
                                            <p class="d-none">{{ $semaforo3 = $nota->semaforo }}</p>
                                            <p class="d-none">{{ $id3 = $nota->id_expediente }}</p>
                                        @endif
                                    @endforeach

                                    @foreach ($detalleActividades as $detalleActividade)
                                        @if ($dato->id == $detalleActividade->id_expediente)
                                            <p class="d-none">{{ $semaforo4 = $detalleActividade->semaforo }}</p>
                                            <p class="d-none">{{ $id4 = $detalleActividade->id_expediente }}</p>
                                        @endif
                                    @endforeach

                                    {{-- {{ $semaforo . $semaforo2 . $semaforo3 . $semaforo4}} --}}
                                    {{-- {{ $id . $id2 . $id3 . $id4}} --}}

                                    @php
                                        $combinaciones = [
                                            "VerdeVerdeVerdeVerde" => "Verde",
                                            "VerdeVerdeVerdeAmarillo" => "Verde",
                                            "VerdeVerdeVerdeRojo" => "Verde",
                                            "VerdeVerdeAmarilloRojo" => "Verde",
                                            "VerdeAmarilloRojoRojo" => "Rojo",
                                            "AmarilloAmarilloRojoRojo" => "Rojo",
                                            "VerdeVerdeAmarilloAmarillo" => "Amarillo",
                                            "VerdeRojoRojoRojo" => "Rojo",
                                            "AmarilloVerdeRojoRojo" => "Rojo",
                                            "AmarilloAmarilloVerdeRojo" => "Amarillo",
                                            "AmarilloAmarilloRojoVerde" => "Amarillo",
                                            "RojoRojoVerdeVerde" => "Rojo",
                                            "RojoVerdeAmarilloAmarillo" => "Amarillo",
                                            "RojoVerdeVerdeAmarillo" => "Verde",
                                            "RojoAmarilloAmarilloVerde" => "Amarillo",
                                            "RojoAmarilloVerdeVerde" => "Verde",
                                            "VerdeAmarilloAmarilloRojo" => "Amarillo",
                                            "VerdeRojoAmarilloRojo" => "Rojo",
                                            "AmarilloRojoRojoRojo" => "Rojo",
                                            "VerdeVerdeRojoRojo" => "Rojo",
                                            "VerdeAmarilloAmarilloAmarillo" => "Amarillo",
                                            "VerdeRojoVerdeRojo" => "Rojo",
                                            "AmarilloRojoVerdeVerde" => "Verde",
                                            "RojoVerdeRojoVerde" => "Rojo",
                                            "RojoAmarilloAmarilloAmarillo" => "Amarillo",
                                            "RojoVerdeVerdeVerde" => "Verde",
                                            "RojoRojoVerdeAmarillo" => "Rojo",
                                            "RojoRojoAmarilloVerde" => "Rojo",
                                            "RojoVerdeAmarilloRojo" => "Rojo",
                                            "RojoAmarilloVerdeRojo" => "Rojo",
                                            "VerdeRojoRojoVerde" => "Rojo",
                                            "RojoVerdeVerdeRojo" => "Rojo",
                                            "VerdeAmarilloAmarilloVerde" => "Amarillo",
                                            "AmarilloVerdeVerdeAmarillo" => "Amarillo",
                                            "AmarilloAmarilloAmarilloRojo" => "Amarillo",
                                            "RojoRojoRojoVerde" => "Rojo",
                                            "RojoVerdeRojoRojo" => "Rojo",
                                            "AmarilloAmarilloAmarilloVerde" => "Amarillo",
                                            "RojoRojoRojoAmarillo" => "Rojo",
                                            "RojoRojoAmarilloAmarillo" => "Rojo",
                                            "AmarilloAmarilloVerdeVerde" => "Amarillo",
                                            "AmarilloVerdeRojoVerde" => "Verde",
                                            "VerdeVerdeAmarilloVerde" => "Verde",
                                            "RojoAmarilloAmarilloRojo" => "Rojo",
                                            "VerdeAmarilloRojoAmarillo" => "Amarillo",
                                            "VerdeAmarilloRojoVerde" => "Verde",
                                            "VerdeRojoRojoAmarillo" => "Rojo",
                                            "AmarilloVerdeVerdeRojo" => "Verde",
                                            "AmarilloRojoRojoVerde" => "Rojo",
                                            "AmarilloRojoAmarilloVerde" => "Amarillo",
                                            "RojoAmarilloRojoVerde" => "Rojo",
                                            "RojoVerdeRojoAmarillo" => "Rojo",
                                            "VerdeAmarilloVerdeRojo" => "Verde",
                                            "VerdeRojoVerdeAmarillo" => "Verde",
                                            "AmarilloVerdeAmarilloRojo" => "Amarillo",
                                            "AmarilloRojoVerdeAmarillo" => "Amarillo",
                                            "RojoAmarilloVerdeAmarillo" => "Amarillo",
                                            "AmarilloRojoRojoAmarillo" => "Rojo",
                                            "VerdeRojoAmarilloVerde" => "Verde",
                                            "AmarilloVerdeAmarilloVerde" => "Amarillo"
                                            // Añade aquí todas las combinaciones necesarias
                                        ];
                                        
                                        // Obtener la combinación actual de semáforos y su resultado correspondiente
                                        $combinacion_actual = $semaforo.$semaforo2.$semaforo3.$semaforo4;
                                        $resultado = isset($combinaciones[$combinacion_actual]) ? $combinaciones[$combinacion_actual] : "";
                                        
                                        // Mostrar el resultado correspondiente
                                    @endphp
                                    
                                    @if ($resultado == "Verde")
                                        <p style="background: rgba(83, 180, 83, .6)">Verde</p>
                                    @elseif ($resultado == "Rojo")
                                        <p style="background: rgba(218, 78, 78, .5);">Rojo</p>
                                    @elseif ($resultado == "Amarillo")
                                        <p style="background: rgba(255, 255, 0, .4)">Amarillo</p>
                                    @endif
                                </td>

                                {{-- @if ($dato->id === "Verde")
                                    <td style="background: rgba(83, 180, 83, .6)">{{$dato->semaforo}}</td>
                                @elseif ($dato->semaforo === "Rojo")
                                    <td style="background: rgba(218, 78, 78, .5)">{{$dato->semaforo}}</td>
                                @else
                                    <td style="background: rgba(255, 255, 0, .4)">{{$dato->semaforo}}</td>
                                @endif --}}
                                @role('admin')
                                    <td>
                                        <a href="{{url('expedientes/'.$dato->id)}}" class="btn btn-primary"><ion-icon name="eye-outline"></ion-icon></a>
                                        |
                                        <a href="{{url('expedientes/'.$dato->id.'/edit')}}" class="btn btn-success"><ion-icon name="brush-outline"></ion-icon></a>

                                        {{-- <form action="{{'expedientes/'.$dato->id}}" method="post" class="d-inline">
                                            @csrf
                                            {{method_field('DELETE')}}
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás Seguro de borrarlo?')"><ion-icon name="beaker-outline"></ion-icon></button>
                                        </form> --}}
                                    </td>
                                @endrole

                                @role('editor')
                                    <td>
                                        <a href="{{url('expedientes/'.$dato->id)}}" class="btn btn-primary"><ion-icon name="eye-outline"></ion-icon></a>
                                        |
                                        <a href="{{url('expedientes/'.$dato->id.'/edit')}}" class="btn btn-success"><ion-icon name="brush-outline"></ion-icon></a>
                                    </td>
                                @endrole
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {!! $datos->links() !!}
                </div>
            </div>
        </div>

    </div>
@endsection
