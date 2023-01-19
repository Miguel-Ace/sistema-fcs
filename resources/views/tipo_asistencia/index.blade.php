@extends('home')

@section('contenido')
    <h1 class="text-left p-2">Tipo Asistencia</h1>
    <div class="container">

        @role('admin')
        <a href="{{url('/tipo_asistencia/create')}}" class="btn btn-warning mb-3">
            <ion-icon name="create-outline"></ion-icon>
            Nuevo Tipo de Asistencia
        </a>
        @endrole

        @role('creador')
        <a href="{{url('/tipo_asistencia/create')}}" class="btn btn-warning mb-3">
            <ion-icon name="create-outline"></ion-icon>
            Nuevo Tipo de Asistencia
        </a>
        @endrole

        <div class="row justify-content-center bordeOscuro">
            <div class="parteSuperiorTablas">
                <p>Listado tipos de asistencia</p>
                {{-- <div class="buscador">
                    <form action="{{url('/tipo_asistencia')}}" method="GET" class="d-flex" role="search">
                        <input class="form-control me-2" type="search" value="{{$busqueda}}" placeholder="Buscar" aria-label="Search" name="buscar">
                        <button class="btn btn-outline-success" type="submit"><ion-icon name="search-outline"></ion-icon></button>
                    </form>
                </div> --}}

                <div class="buscador">
                    <form action="{{url('/tipo_asistencia')}}" method="GET" class="d-flex" role="search">
                        <select class="form-select mb-3" id="buscar" name="buscar">
                            <option value="">Buscar tipo de asistencia</option>
                            @foreach ($datos as $dato)
                            <option value="{{$dato->tipo_asistencia}}">{{$dato->tipo_asistencia}}</option>
                            @endforeach
                        </select>

                        <div>
                            <button class="btn btn-outline-success" type="submit"><ion-icon name="search-outline"></ion-icon></button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-12 fs-6">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            {{-- <th scope="col">#</th> --}}
                            <th scope="col">Tipo Asistencia</th>
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
                                <td>{{$dato->tipo_asistencia}}</td>
                                @role('admin')
                                <td>
                                    <a href="{{url('tipo_asistencia/'.$dato->id)}}" class="btn btn-primary"><ion-icon name="eye-outline"></ion-icon></a>
                                    |
                                    <a href="{{url('tipo_asistencia/'.$dato->id.'/edit')}}" class="btn btn-success"><ion-icon name="pencil-outline"></ion-icon></a>
                                    {{-- <form action="{{'tipo_asistencia/'.$dato->id}}" method="post" class="d-inline">
                                        @csrf
                                        {{method_field('DELETE')}}
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás Seguro de borrarlo?')">Borrar</button>
                                    </form> --}}
                                </td>
                                @endrole
                                @role('editor')
                                <td>
                                    <a href="{{url('tipo_asistencia/'.$dato->id)}}" class="btn btn-primary"><ion-icon name="eye-outline"></ion-icon></a>
                                    |
                                    <a href="{{url('tipo_asistencia/'.$dato->id.'/edit')}}" class="btn btn-success"><ion-icon name="pencil-outline"></ion-icon></a>
                                    {{-- <form action="{{'tipo_asistencia/'.$dato->id}}" method="post" class="d-inline">
                                        @csrf
                                        {{method_field('DELETE')}}
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás Seguro de borrarlo?')">Borrar</button>
                                    </form> --}}
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
