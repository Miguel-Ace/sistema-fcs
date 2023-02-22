@extends('home')

@section('contenido')
    <h1 class="text-left p-2">Evaluaciones Médicas</h1>
    <div class="container">

        @role('admin')
        <a href="{{url('/evaluaciones_medicas/create')}}" class="btn btn-warning mb-3">
            <ion-icon name="create-outline"></ion-icon>
            Nueva Evaluación Médica
        </a>
        @endrole

        @role('creador')
        <a href="{{url('/evaluaciones_medicas/create')}}" class="btn btn-warning mb-3">
            <ion-icon name="create-outline"></ion-icon>
            Nueva Evaluación Médica
        </a>
        @endrole

        {{-- <a href="{{url('/expedientes/pdf')}}" class="btn btn-danger mb-3">
            <ion-icon name="download-outline"></ion-icon>
            PDF
        </a> --}}

        <div class="row justify-content-center bordeOscuro">

            <div class="parteSuperiorTablas">
                <p>Listado de evaluaciones médicas</p>
                {{-- <div class="buscador">
                    <form action="{{url('/evaluaciones_medicas')}}" method="GET" class="d-flex" role="search">
                        <input class="form-control me-2" type="search" value="{{$busqueda}}" placeholder="Buscar" aria-label="Search" name="buscar">
                        <button class="btn btn-outline-success" type="submit"><ion-icon name="search-outline"></ion-icon></button>
                    </form>
                </div> --}}

                <div class="buscador">
                    <form action="{{url('/evaluaciones_medicas')}}" method="GET" class="d-flex" role="search">
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
                            <th scope="col">Expediente</th>
                            <th scope="col">Medico</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Notas</th>
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
                                <td>{{$dato->expedientes->nombre1}} {{$dato->expedientes->nombre2}} {{$dato->expedientes->apellido1}} {{$dato->expedientes->apellido2}}</td>
                                <th>{{$dato->medicos->nombre}}</th>
                                <td>{{$dato->fecha}}</td>
                                <td>{{$dato->notas}}</td>
                                @if ($dato->semaforo === "Verde")
                                    <td style="background: rgba(83, 180, 83, .6)">{{$dato->semaforo}}</td>
                                @elseif ($dato->semaforo === "Rojo")
                                    <td style="background: rgba(218, 78, 78, .5)">{{$dato->semaforo}}</td>
                                @else
                                    <td style="background: rgba(255, 255, 0, .4)">{{$dato->semaforo}}</td>
                                @endif
                                @role('admin')
                                    <td>
                                        <a href="{{url('evaluaciones_medicas/'.$dato->id)}}" class="btn btn-primary"><ion-icon name="eye-outline"></ion-icon></a>
                                        |
                                        <a href="{{url('evaluaciones_medicas/'.$dato->id.'/edit')}}" class="btn btn-success"><ion-icon name="brush-outline"></ion-icon></a>
                                        {{-- |
                                        <form action="{{'evaluaciones_medicas/'.$dato->id}}" method="post" class="d-inline">
                                            @csrf
                                            {{method_field('DELETE')}}
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás Seguro de borrarlo?')"><ion-icon name="beaker-outline"></ion-icon></button>
                                        </form> --}}
                                    </td>
                                @endrole

                                @role('editor')
                                <td>
                                    <a href="{{url('evaluaciones_medicas/'.$dato->id)}}" class="btn btn-primary"><ion-icon name="eye-outline"></ion-icon></a>
                                    |
                                    <a href="{{url('evaluaciones_medicas/'.$dato->id.'/edit')}}" class="btn btn-success"><ion-icon name="brush-outline"></ion-icon></a>
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
