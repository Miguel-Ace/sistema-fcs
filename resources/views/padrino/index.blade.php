@extends('home')

@section('contenido')
    <h1 class="text-left p-2">Padrinos</h1>
    <div class="container">
        @role('admin')
        <a href="{{url('/padrinos/create')}}" class="btn btn-warning mb-3">
            <ion-icon name="create-outline"></ion-icon>
            Nuevo Padrino
        </a>
        @endrole

        @role('creador')
        <a href="{{url('/padrinos/create')}}" class="btn btn-warning mb-3">
            <ion-icon name="create-outline"></ion-icon>
            Nueva Padrino
        </a>
        @endrole

        <div class="row justify-content-center bordeOscuro">
            <div class="parteSuperiorTablas">
                <p>Listado de padrinos</p>
                <div class="buscador">
                    <form action="{{url('/padrinos')}}" method="GET" class="d-flex" role="search">
                        <input class="form-control me-2" type="search" value="{{$busqueda}}" placeholder="Nombre o Apellido" aria-label="Search" name="buscar">
                        <button class="btn btn-outline-success" type="submit"><ion-icon name="search-outline"></ion-icon></button>
                    </form>
                </div>
            </div>

            <div class="col-md-12 fs-6">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Método De Pago</th>
                            <th scope="col">Correo</th>
                            {{-- <th scope="col">Tipo</th> --}}
                            {{-- <th scope="col">Fecha Inicial</th>
                            <th scope="col">Dirección</th>
                            <th scope="col">Fecha Final</th>
                            <th scope="col">Fecha Nacimiento</th>
                            <th scope="col">Banco</th> --}}
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
                                    @if ($Bajapadrino->id_padrino == $dato->id)
                                        <h1 class="d-none">{{$valor = $Bajapadrino->id_padrino}}</h1>
                                    @endif
                                @endforeach
                                    @if ($valor == $dato->id)
                                            <th style="color: red">{{$dato->id}}</th>
                                            <td style="color: red">{{$dato->nombre}}</td>
                                            <th style="color: red">{{$dato->apellido}}</th>
                                            <td style="color: red">{{$dato->telefono}}</td>
                                            <td style="color: red">{{$dato->metodos_pagos->metodo_pago}}</td>
                                            <td style="color: red">{{$dato->correo}}</td>
                                            {{-- <td>{{$dato->tipo}}</td> --}}
                                            {{-- <td>{{$dato->fecha_inicio}}</td>
                                            <td>{{$dato->direccion}}</td>
                                            <td>{{$dato->fecha_final}}</td>
                                            <td>{{$dato->fecha_nacimiento}}</td>
                                            <td>{{$dato->bancos->banco}}</td> --}}

                                        @role('admin')
                                        <td>
                                            <a href="{{url('padrinos/'.$dato->id)}}" class="btn btn-primary"><ion-icon name="eye-outline"></ion-icon></a>
                                            |
                                            <a href="{{url('padrinos/'.$dato->id.'/edit')}}" class="btn btn-success"><ion-icon name="brush-outline"></ion-icon></a>
                                            {{-- |
                                            <form action="{{'padrinos/'.$dato->id}}" method="post" class="d-inline">
                                                @csrf
                                                {{method_field('DELETE')}}
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás Seguro de borrarlo?')"><ion-icon name="beaker-outline"></ion-icon></button>
                                            </form> --}}
                                        </td>
                                        @endrole
                                    @else
                                            <th>{{$dato->id}}</th>
                                            <td>{{$dato->nombre}}</td>
                                            <th>{{$dato->apellido}}</th>
                                            <td>{{$dato->telefono}}</td>
                                            <td>{{$dato->metodos_pagos->metodo_pago}}</td>
                                            <td>{{$dato->correo}}</td>
                                            {{-- <td>{{$dato->tipo}}</td> --}}
                                            {{-- <td>{{$dato->fecha_inicio}}</td>
                                            <td>{{$dato->direccion}}</td>
                                            <td>{{$dato->fecha_final}}</td>
                                            <td>{{$dato->fecha_nacimiento}}</td>
                                            <td>{{$dato->bancos->banco}}</td> --}}

                                        @role('admin')
                                        <td>
                                            <a href="{{url('padrinos/'.$dato->id)}}" class="btn btn-primary"><ion-icon name="eye-outline"></ion-icon></a>
                                            |
                                            <a href="{{url('padrinos/'.$dato->id.'/edit')}}" class="btn btn-success"><ion-icon name="brush-outline"></ion-icon></a>
                                            {{-- |
                                            <form action="{{'padrinos/'.$dato->id}}" method="post" class="d-inline">
                                                @csrf
                                                {{method_field('DELETE')}}
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás Seguro de borrarlo?')"><ion-icon name="beaker-outline"></ion-icon></button>
                                            </form> --}}
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
