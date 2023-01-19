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
