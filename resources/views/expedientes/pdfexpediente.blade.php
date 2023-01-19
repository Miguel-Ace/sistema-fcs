@extends('home')

@section('contenido')
    <h1 class="text-left p-2">Expedientes</h1>
    <div class="container">

        <div class="row justify-content-center bordeOscuro">
            <div class="parteSuperiorTablas">
                <p>Listado de expedientes</p>
                <div class="buscador">
                </div>
            </div>

            <div class="col-md-12 fs-6">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Primer Nombre</th>
                            <th scope="col">Primer Apellido</th>
                            <th scope="col">Fecha De Nacimiento</th>
                            <th scope="col">Sexo</th>
                            <th scope="col">Nombre Encargado</th>
                            <th scope="col">Telefono Encargado</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($datos as $dato)
                            <tr>
                                <th>{{$dato->id}}</th>
                                <td>{{$dato->nombre1}}</td>
                                <td>{{$dato->apellido1}}</td>
                                <td>{{$dato->fecha_nacimiento}}</td>
                                <td>{{$dato->sexo}}</td>
                                <td>{{$dato->nombre_encargado}}</td>
                                <td>{{$dato->telefono_encargado}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
@endsection