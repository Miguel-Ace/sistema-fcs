@extends('home')

@section('contenido')
    <h1 class="text-left p-2">Evaluaciones Psicológicas</h1>
    <div class="container">

        @role('admin')
        <a href="{{url('/evaluaciones_psicologicas/create')}}" class="btn btn-warning mb-3">
            <ion-icon name="create-outline"></ion-icon>
            Nueva Evaluación Psicológica
        </a>
        @endrole

        @role('creador')
        <a href="{{url('/evaluaciones_psicologicas/create')}}" class="btn btn-warning mb-3">
            <ion-icon name="create-outline"></ion-icon>
            Nueva Evaluación Psicológica
        </a>
        @endrole

        {{-- <a href="{{url('/expedientes/pdf')}}" class="btn btn-danger mb-3">
            <ion-icon name="download-outline"></ion-icon>
            PDF
        </a>--}}

        <div class="row justify-content-center bordeOscuro">

            <div class="parteSuperiorTablas">
                <p>Listado de las evaluaciones psicológicas</p>
                {{-- <div class="buscador">
                    <form action="{{url('/evaluaciones_psicologicas')}}" method="GET" class="d-flex" role="search">
                        <input class="form-control me-2" type="search" value="{{$busqueda}}" placeholder="Buscar" aria-label="Search" name="buscar">
                        <button class="btn btn-outline-success" type="submit"><ion-icon name="search-outline"></ion-icon></button>
                    </form>
                </div> --}}

                <div class="buscador">
                    <form action="{{url('/evaluaciones_psicologicas')}}" method="GET" class="d-flex" role="search">
                        <select class="form-select mb-3" id="buscar" name="buscar">
                            <option value="">Buscar por expediente</option>
                            @foreach ($datos as $dato)
                            <option value="{{$dato->expedientes->id}}">{{$dato->expedientes->nombre1}} {{$dato->expedientes->nombre2}} {{$dato->expedientes->apellido1}} {{$dato->expedientes->apellido2}}</option>
                            @endforeach
                        </select>

                        <div>
                            <button class="btn btn-outline-success" type="submit"><ion-icon name="search-outline"></ion-icon></button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-12 fs-5">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Clínica</th>
                            <th scope="col">Expediente</th>
                            <th scope="col">Categoria Psicologica</th>
                            <th scope="col">Comunidad</th>
                            <th scope="col">Nota</th>
                            <th scope="col">Semáforo</th>
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
                                <th>{{$dato->id_expediente}}</th>
                                <th>{{$dato->clinicas->clinica}}</th>
                                <td>{{$dato->expedientes->nombre1}} {{$dato->expedientes->nombre2}} {{$dato->expedientes->apellido1}} {{$dato->expedientes->apellido2}}</td>
                                <td>{{$dato->categoria_psicologica}}</td>
                                <td>{{$dato->id_comunidad}}</td>
                                <td>{{$dato->nota}}</td>
                                @if ($dato->semaforo === "Verde")
                                    <td style="background: rgba(83, 180, 83, .6)">{{$dato->semaforo}}</td>
                                @elseif ($dato->semaforo === "Rojo")
                                    <td style="background: rgba(218, 78, 78, .5)">{{$dato->semaforo}}</td>
                                @else
                                    <td style="background: rgba(255, 255, 0, .4)">{{$dato->semaforo}}</td>
                                @endif
                                @role('admin')
                                <td>
                                    <a href="{{url('evaluaciones_psicologicas/'.$dato->id)}}" class="btn btn-primary"><ion-icon name="eye-outline"></ion-icon></a>
                                    |
                                    <a href="{{url('evaluaciones_psicologicas/'.$dato->id.'/edit')}}" class="btn btn-success"><ion-icon name="brush-outline"></ion-icon></a>
                                    {{-- |
                                    <form action="{{'evaluaciones_psicologicas/'.$dato->id}}" method="post" class="d-inline">
                                        @csrf
                                        {{method_field('DELETE')}}
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás Seguro de borrarlo?')"><ion-icon name="beaker-outline"></ion-icon></button>
                                    </form> --}}
                                </td>
                                @endrole

                                @role('editor')
                                <td>
                                    <a href="{{url('evaluaciones_psicologicas/'.$dato->id)}}" class="btn btn-primary"><ion-icon name="eye-outline"></ion-icon></a>
                                    |
                                    <a href="{{url('evaluaciones_psicologicas/'.$dato->id.'/edit')}}" class="btn btn-success"><ion-icon name="brush-outline"></ion-icon></a>
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
