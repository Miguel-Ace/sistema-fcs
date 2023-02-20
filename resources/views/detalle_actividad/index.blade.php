@extends('home')

@section('contenido')
    <h1 class="text-left p-2">Lista De Participantes</h1>
    <div class="container">

        @role('admin')
        <a href="{{url('/detalle_actividades/create?buscar='.$start)}}" class="btn btn-warning mb-3">
            <ion-icon name="create-outline"></ion-icon>
            Nuevo Participante
        </a>
        <a href="{{url('/actividades')}}" class="btn btn-info mb-3">
            <ion-icon name="arrow-back-outline"></ion-icon>
            Volver a Actividades
        </a>
        @endrole

        @role('creador')
        @endrole

        {{-- <a href="{{url('/expedientes/pdf')}}" class="btn btn-danger mb-3">
            <ion-icon name="download-outline"></ion-icon>
            PDF
        </a> --}}

        <div class="row justify-content-center bordeOscuro">

            <div class="parteSuperiorTablas">
                <p>Listado De Participantes</p>
                {{-- {{$start}} --}}
                @foreach ($datos as $dato)
                    @if ($start == $dato->id_actividad)
                    <p class="parraf" style="font-size: 1.5rem; display: none">Actividad : "<span style="color: green">{{$dato->actividades->actividad}}</span>" Seleccionada</p>
                    @endif
                @endforeach

                {{-- <div class="buscador">
                    <form action="{{url('/detalle_actividades')}}" method="GET" class="d-flex" role="search">
                        <select class="form-select mb-3" id="buscar" name="buscar">
                            @foreach ($actividades as $actividad)
                            <option value="{{$actividad->id}}">{{$actividad->actividad}}</option>
                            @endforeach
                        </select>

                        <div>
                            <button class="btn btn-outline-success" type="submit"><ion-icon name="search-outline"></ion-icon></button>
                        </div>
                    </form>
                </div> --}}
            </div>

            <div class="col-md-12 fs-5">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            {{-- <th scope="col">#</th> --}}
                            {{-- <th scope="col">Actividad</th> --}}
                            <th scope="col">Expediente</th>
                            {{-- <th scope="col">Asistencia</th> --}}
                            <th scope="col">Observación</th>
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
                                {{-- <th>{{$dato->id}}</th> --}}
                                {{-- <td>{{$dato->actividades->actividad}}</td> --}}
                                <th>{{$dato->expedientes->nombre1}} {{$dato->expedientes->nombre2}} {{$dato->expedientes->apellido1}} {{$dato->expedientes->apellido2}}</th>
                                {{-- <td>{{$dato->asistencia}}</td> --}}
                                <td>{{$dato->observacion}}</td>
                                @if ($dato->semaforo === "Verde")
                                    <td style="background: rgba(83, 180, 83, .6)">{{$dato->semaforo}}</td>
                                @elseif ($dato->semaforo === "Rojo")
                                    <td style="background: rgba(218, 78, 78, .5)">{{$dato->semaforo}}</td>
                                @endif
                                @role('admin')
                                    <td>
                                        <a href="{{url('detalle_actividades/'.$dato->id.'?buscar='.$start)}}" class="btn btn-primary"><ion-icon name="eye-outline"></ion-icon></a>
                                        |
                                        <a href="{{url('detalle_actividades/'.$dato->id.'/edit?buscar='.$start)}}" class="btn btn-success"><ion-icon name="brush-outline"></ion-icon></a>
                                        |
                                        <form action="{{'detalle_actividades/'.$dato->id.'/'.$start}}" method="post" class="d-inline">
                                            @csrf
                                            {{method_field('DELETE')}}
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás Seguro de borrarlo?')"><ion-icon name="beaker-outline"></ion-icon></button>
                                        </form>
                                    </td>
                                @endrole

                                @role('editor')
                                <td>
                                    <a href="{{url('detalle_actividades/'.$dato->id)}}" class="btn btn-primary"><ion-icon name="eye-outline"></ion-icon></a>
                                    |
                                    <a href="{{url('detalle_actividades/'.$dato->id.'/edit')}}" class="btn btn-success"><ion-icon name="brush-outline"></ion-icon></a>
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
