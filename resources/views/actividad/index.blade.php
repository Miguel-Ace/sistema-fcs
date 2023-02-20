@extends('home')

@section('contenido')
    <h1 class="text-left p-2">Actividades</h1>
    <div class="container">

        @role('admin')
        <a href="{{url('/actividades/create')}}" class="btn btn-warning mb-3">
            <ion-icon name="create-outline"></ion-icon>
            Nueva Actividad
        </a>

        {{-- <a href="{{url('/detalle_actividades')}}" class="btn btn-info mb-3">
            <ion-icon name="add-circle-outline"></ion-icon>
            Lista De Participantes
        </a> --}}
        @endrole

        @role('creador')
        <a href="{{url('/actividades/create')}}" class="btn btn-warning mb-3">
            <ion-icon name="create-outline"></ion-icon>
            Nueva Actividad
        </a>
        @endrole

        {{-- <a href="{{url('/expedientes/pdf')}}" class="btn btn-danger mb-3">
            <ion-icon name="download-outline"></ion-icon>
            PDF
        </a>
         --}}

        <div class="row justify-content-center bordeOscuro">
            <div class="parteSuperiorTablas">
                <p>Listado de actividades</p>
                {{-- <div class="buscador">
                    <form action="{{url('/actividades')}}" method="GET" class="d-flex" role="search">
                        <input class="form-control me-2" type="search" value="{{$busqueda}}" placeholder="Buscar id o actividad" aria-label="Search" name="buscar">
                        <button class="btn btn-outline-success" type="submit"><ion-icon name="search-outline"></ion-icon></button>
                    </form>
                </div> --}}

                <div class="buscador">
                    <form action="{{url('/actividades')}}" method="GET" class="d-flex" role="search">
                        <select class="form-select mb-3" id="buscar" name="buscar">
                            <option value="">Buscar actividad</option>
                            @foreach ($datos as $dato)
                            <option value="{{$dato->actividad}}">{{$dato->actividad}}</option>
                            @endforeach
                        </select>

                        <div>
                            <button class="btn btn-outline-success" type="submit"><ion-icon name="search-outline"></ion-icon></button>
                        </div>
                    </form>
                </div>
            </div>
            
            @if (session('success'))
                <div>
                    <p style="color: rgb(44, 105, 44)">{{session('success')}}</p>
                </div>
            @endif

            <div class="col-md-12 fs-5">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            {{-- <th scope="col">#</th> --}}
                            <th scope="col">Actividad</th>
                            <th scope="col">Fecha Creación</th>
                            <th scope="col">Fecha Actividad</th>
                            <th scope="col">Tipo Asistencia</th>
                            <th scope="col">Patrocinador</th>
                            <th scope="col">Observación</th>
                            @role('admin')
                                <th scope="col">Acciones</th>
                            @endrole
                            @role('editor')
                                <th scope="col">Acciones</th>
                            @endrole
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datos as $dato)
                            <tr class="text-center">
                                {{-- <th>{{$dato->id}}</th> --}}
                                <th>{{$dato->actividad}}</th>
                                <td>{{$dato->fecha_creacion}}</td>
                                <td>{{$dato->fecha_actividad}}</td>
                                <td>{{$dato->tipoAsistencias->tipo_asistencia}}</td>
                                <td>{{$dato->patrocinador}}</td>
                                <td>{{$dato->observacion}}</td>
                                @role('admin')
                                <td>
                                    <a href="{{url('actividades/'.$dato->id)}}" class="btn btn-primary"><ion-icon name="eye-outline"></ion-icon></a>
                                    |
                                    <a href="{{url('actividades/'.$dato->id.'/edit')}}" class="btn btn-success"><ion-icon name="brush-outline"></ion-icon></a>
                                    |
                                    <a href="{{url('/detalle_actividades?buscar='.$dato->id)}}" class="btn btn-info"><ion-icon name="add-circle-outline"></ion-icon></a>

                                    {{-- <form action="{{'actividades/'.$dato->id}}" method="post" class="d-inline">
                                        @csrf
                                        {{method_field('DELETE')}}
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás Seguro de borrarlo?')">Borrar</button>
                                    </form> --}}
                                </td>
                                @endrole
                                @role('editor')
                                <td>
                                    <a href="{{url('actividades/'.$dato->id)}}" class="btn btn-primary"><ion-icon name="eye-outline"></ion-icon></a>
                                    |
                                    <a href="{{url('actividades/'.$dato->id.'/edit')}}" class="btn btn-success"><ion-icon name="brush-outline"></ion-icon></a>

                                    {{-- <form action="{{'actividades/'.$dato->id}}" method="post" class="d-inline">
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
