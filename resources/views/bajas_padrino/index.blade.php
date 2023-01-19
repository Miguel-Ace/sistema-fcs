@extends('home')

@section('contenido')
    <h1 class="text-left p-2">Baja De Padrino</h1>
    <div class="container">
        @role('admin')
        <a href="{{url('/baja_padrinos/create')}}" class="btn btn-warning mb-3">
            <ion-icon name="create-outline"></ion-icon>
            Dar de baja padrino
        </a>
        @endrole
        @role('creador')
        <a href="{{url('/baja_padrinos/create')}}" class="btn btn-warning mb-3">
            <ion-icon name="create-outline"></ion-icon>
            Dar de baja padrino
        </a>
        @endrole

        <div class="row justify-content-center bordeOscuro">

            <div class="parteSuperiorTablas">
                <p>Listado de los padrinos dados de baja</p>
                {{-- <div class="buscador">
                    <form action="{{url('/baja_padrinos')}}" method="GET" class="d-flex" role="search">
                        <input class="form-control me-2" type="search" value="{{$busqueda}}" placeholder="Buscar" aria-label="Search" name="buscar">
                        <button class="btn btn-outline-success" type="submit"><ion-icon name="search-outline"></ion-icon></button>
                    </form>
                </div> --}}

                <div class="buscador">
                    <form action="{{url('/baja_padrinos')}}" method="GET" class="d-flex" role="search">
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
                            <th scope="col">Padrino</th>
                            <th scope="col">Expediente</th>
                            <th scope="col">Fecha Baja</th>
                            <th scope="col">Quien Sale</th>
                            <th scope="col">Motivo Baja</th>
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
                                <th>{{$dato->id}}</th>
                                <td>{{$dato->padrinos->nombre}} {{$dato->padrinos->apellido}}</td>
                                <th>{{$dato->expedientes->nombre1}} {{$dato->expedientes->nombre2}} {{$dato->expedientes->apellido1}} {{$dato->expedientes->apellido2}}</th>
                                <td>{{$dato->fecha_baja}}</td>
                                <td>{{$dato->quien_sale}}</td>
                                <td>{{$dato->motivo_bajas->motivo_baja}}</td>
                                @role('admin')
                                <td>
                                    <a href="{{url('baja_padrinos/'.$dato->id)}}" class="btn btn-primary"><ion-icon name="eye-outline"></ion-icon></a>
                                    |
                                    <a href="{{url('baja_padrinos/'.$dato->id.'/edit')}}" class="btn btn-success"><ion-icon name="brush-outline"></ion-icon></a>
                                    {{-- |
                                    <form action="{{'baja_padrinos/'.$dato->id}}" method="post" class="d-inline">
                                        @csrf
                                        {{method_field('DELETE')}}
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás Seguro de borrarlo?')"><ion-icon name="beaker-outline"></ion-icon></button>
                                    </form> --}}
                                </td>
                                @endrole
                                @role('editor')
                                <td>
                                    <a href="{{url('baja_padrinos/'.$dato->id)}}" class="btn btn-primary"><ion-icon name="eye-outline"></ion-icon></a>
                                    |
                                    <a href="{{url('baja_padrinos/'.$dato->id.'/edit')}}" class="btn btn-success"><ion-icon name="brush-outline"></ion-icon></a>
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
