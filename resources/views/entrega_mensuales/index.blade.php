@extends('home')

@section('contenido')
    <h1 class="text-left p-2">Entregas Mensuales</h1>
    <div class="container">

        @role('admin')
        <a href="{{url('/entregas_mensuales/create')}}" class="btn btn-warning mb-3">
            <ion-icon name="create-outline"></ion-icon>
            Nueva Entrega Mensual
        </a>
        @endrole
        @role('creador')
        <a href="{{url('/entregas_mensuales/create')}}" class="btn btn-warning mb-3">
            <ion-icon name="create-outline"></ion-icon>
            Nueva Entrega Mensual
        </a>
        @endrole

        <div class="row justify-content-center bordeOscuro">

            <div class="parteSuperiorTablas">
                <p>Listado de las entregas mensuales</p>
                {{-- <div class="buscador">
                    <form action="{{url('/entregas_mensuales')}}" method="GET" class="d-flex" role="search">
                        <input class="form-control me-2" type="search" value="{{$busqueda}}" placeholder="Buscar" aria-label="Search" name="buscar">
                        <button class="btn btn-outline-success" type="submit"><ion-icon name="search-outline"></ion-icon></button>
                    </form>
                </div> --}}

                <div class="buscador">
                    <form action="{{url('/entregas_mensuales')}}" method="GET" class="d-flex" role="search">
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

            <div class="col-md-12 fs-6">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Expediente</th>
                            <th scope="col">Padrino</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Edad</th>
                            <th scope="col">Talla Pantalón</th>
                            <th scope="col">Talla Camisa</th>
                            <th scope="col">Talla Zapatos</th>
                            <th scope="col">Grado Escolar</th>
                            <th scope="col">Observacines</th>
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
                                @foreach ($Bajapadrinos as $Bajapadrino)
                                    @if ($Bajapadrino->id_padrino == $dato->id_padrino)
                                        <h1 class="d-none">{{$valor = $Bajapadrino->id_padrino}}</h1>
                                    @endif
                                @endforeach
                                <th>{{$dato->id}}</th>
                                <td>{{$dato->expedientes->nombre1}} {{$dato->expedientes->nombre2}} {{$dato->expedientes->apellido1}} {{$dato->expedientes->apellido2}}</td>
                                @if ($valor == $dato->id_padrino)
                                    <th style="color: red">{{$dato->padrinos->nombre}} {{$dato->padrinos->apellido}}</th>
                                @else
                                    <th>{{$dato->padrinos->nombre}} {{$dato->padrinos->apellido}}</th>
                                @endif
                                <td>{{$dato->fecha}}</td>
                                <td>{{$dato->edad}}</td>
                                <td>{{$dato->talla_pantalon}}</td>
                                <td>{{$dato->talla_camisa}}</td>
                                <td>{{$dato->talla_zapato}}</td>
                                <td>{{$dato->grado_escolar}}</td>
                                <td>{{$dato->observaciones}}</td>
                                @role('admin')
                                <td>
                                    <a href="{{url('entregas_mensuales/'.$dato->id)}}" class="btn btn-primary"><ion-icon name="eye-outline"></ion-icon></a>
                                    |
                                    <a href="{{url('entregas_mensuales/'.$dato->id.'/edit')}}" class="btn btn-success"><ion-icon name="brush-outline"></ion-icon></a>
                                    {{-- |
                                    <form action="{{'entregas_mensuales/'.$dato->id}}" method="post" class="d-inline">
                                        @csrf
                                        {{method_field('DELETE')}}
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás Seguro de borrarlo?')"><ion-icon name="beaker-outline"></ion-icon></button>
                                    </form> --}}
                                </td>
                                @endrole

                                @role('editor')
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
