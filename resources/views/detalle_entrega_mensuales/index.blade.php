@extends('home')

@section('contenido')
    <h1 class="text-left p-2">Detalle Entregas Mensuales</h1>
    <div class="container">
        @role('admin')
        <a href="{{url('/detalle_entregas_mensuales/create?buscar='.$start)}}" class="btn btn-warning mb-3">
            <ion-icon name="create-outline"></ion-icon>
            Nuevo Detalle de Entregas Mensuales
        </a>

        <a href="{{url('/entregas_mensuales')}}" class="btn btn-info mb-3">
            <ion-icon name="arrow-back-outline"></ion-icon>
            Volver a Entregas Mensuales
        </a>
        @endrole

        @role('creador')
        <a href="{{url('/detalle_entregas_mensuales/create?buscar='.$start)}}" class="btn btn-warning mb-3">
            <ion-icon name="create-outline"></ion-icon>
            Nuevo Detalle de Entregas Mensuales
        </a>

        <a href="{{url('/entregas_mensuales')}}" class="btn btn-info mb-3">
            <ion-icon name="arrow-back-outline"></ion-icon>
            Volver a Entregas Mensuales
        </a>
        @endrole

        {{-- <a href="{{url('/expedientes/pdf')}}" class="btn btn-danger mb-3">
            <ion-icon name="download-outline"></ion-icon>
            PDF
        </a>
         --}}

         <div class="row justify-content-center bordeOscuro">
            <div class="parteSuperiorTablas">
                <p>Listado detalle de entregas mensuales</p>
                {{-- <div class="buscador">
                    <form action="{{url('/detalle_entregas_mensuales')}}" method="GET" class="d-flex" role="search">
                        <input class="form-control me-2" type="search" value="{{$busqueda}}" placeholder="Buscar" aria-label="Search" name="buscar">
                        <button class="btn btn-outline-success" type="submit"><ion-icon name="search-outline"></ion-icon></button>
                    </form>
                </div> --}}

                @foreach ($expedientes as $expediente)
                    @if ($start == $expediente->id)
                    <p class="parraf" style="font-size: 1.5rem; display: none">Expediente de : "<span style="color: green">{{$expediente->nombre1 . ' ' . $expediente->nombre2 . ' ' . $expediente->apellido1 . ' ' . $expediente->apellido2}}</span>" Seleccionado</p>
                    @endif
                @endforeach

                {{-- <div class="buscador">
                    <form action="{{url('/detalle_entregas_mensuales')}}" method="GET" class="d-flex" role="search">
                        <select class="form-select mb-3" id="buscar" name="buscar">
                            <option value="">Selecciona expediente</option>
                            @foreach ($datos as $dato)
                            <option value="{{$dato->expedientes->id}}">{{$dato->expedientes->nombre1}} {{$dato->expedientes->nombre2}} {{$dato->expedientes->apellido1}} {{$dato->expedientes->apellido2}}</option>
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
                            {{-- <th scope="col">Entrega Mensual</th> --}}
                            <th scope="col">Tipo Entrega</th>
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

                                @if ($dato->id_expediente == $start)
                                    {{-- <th>{{$dato->expedientes->nombre1}} {{$dato->expedientes->nombre2}} {{$dato->expedientes->apellido1}} {{$dato->expedientes->apellido2}}</th> --}}

                                    <th>{{$dato->tipo_entregas->tipo_entrega}}</th>

                                    @role('admin')
                                        <td>
                                            {{-- <a href="{{url('detalle_entregas_mensuales/'.$dato->id)}}" class="btn btn-primary"><ion-icon name="eye-outline"></ion-icon></a>
                                            | --}}
                                            <a href="{{url('detalle_entregas_mensuales/'.$dato->id.'/edit?buscar='.$start)}}" class="btn btn-success"><ion-icon name="pencil-outline"></ion-icon></a>
                                            |
                                            <form action="{{'detalle_entregas_mensuales/'.$dato->id}}" method="post" class="d-inline">
                                                @csrf
                                                {{method_field('DELETE')}}
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás Seguro de borrarlo?')"><ion-icon name="beaker-outline"></ion-icon></button>
                                            </form>
                                        </td>
                                    @endrole
                                    @role('editor')
                                        <td>
                                            {{-- <a href="{{url('detalle_entregas_mensuales/'.$dato->id)}}" class="btn btn-primary"><ion-icon name="eye-outline"></ion-icon></a>
                                            | --}}
                                            <a href="{{url('detalle_entregas_mensuales/'.$dato->id.'/edit?buscar='.$start)}}" class="btn btn-success"><ion-icon name="pencil-outline"></ion-icon></a>
                                            |
                                            <form action="{{'detalle_entregas_mensuales/'.$dato->id}}" method="post" class="d-inline">
                                                @csrf
                                                {{method_field('DELETE')}}
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás Seguro de borrarlo?')"><ion-icon name="beaker-outline"></ion-icon></button>
                                            </form>
                                        </td>
                                    @endrole
                                @endif
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
