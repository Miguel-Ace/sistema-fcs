@extends('home')

@section('contenido')
    <h1 class="text-left p-2">Cumpleaños</h1>
    <div class="container">

        @role('admin')
        <a href="{{url('/cumpleanios/create')}}" class="btn btn-warning mb-3">
            <ion-icon name="create-outline"></ion-icon>
            Nueva Cumpleaños
        </a>
        @endrole
        @role('creador')
        <a href="{{url('/cumpleanios/create')}}" class="btn btn-warning mb-3">
            <ion-icon name="create-outline"></ion-icon>
            Nueva Cumpleaños
        </a>
        @endrole

        <div class="row justify-content-center bordeOscuro">

            <div class="parteSuperiorTablas">
                <p>Listado de los cumpleaños</p>
                {{-- <div class="buscador">
                    <form action="{{url('/cumpleanios')}}" method="GET" class="d-flex" role="search">
                        <input class="form-control me-2" type="search" value="{{$busqueda}}" placeholder="Buscar" aria-label="Search" name="buscar">
                        <button class="btn btn-outline-success" type="submit"><ion-icon name="search-outline"></ion-icon></button>
                    </form>
                </div> --}}

                <div class="buscador">
                    <form action="{{url('/cumpleanios')}}" method="GET" class="d-flex" role="search">
                        <select class="form-select mb-3" id="buscar" name="buscar">
                            <option value="">Selecciona al cumpleañero</option>
                            @foreach ($datos as $dato)
                            <option value="{{$dato->padrinos->id}}">{{$dato->padrinos->nombre}} {{$dato->padrinos->apellido}}</option>
                            @endforeach
                        </select>

                        <div>
                            <button class="btn btn-outline-success" type="submit"><ion-icon name="search-outline"></ion-icon></button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-12 fs-6">
                <table class="table table-bordered table-hover"">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Padrino</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Fecha Entrega de Carta</th>
                            <th scope="col">Entrega Carta Presentación</th>
                            <th scope="col">Entrega Video</th>
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
                                @foreach ($bajaPadrinos as $bajaPadrino)
                                    @if ($bajaPadrino->id_padrino == $dato->id_padrino)
                                        <h1 class="d-none">{{$valor = $bajaPadrino->id_padrino}}</h1>
                                    @endif
                                @endforeach

                                @if ($valor == $dato->id_padrino)
                                    @if ($fecha->format('Y-m-d') === $dato->fecha)
                                        <td style="background: rgba(255,255,0,.3); color: red">{{$dato->id}}</td>
                                        <td style="background: rgba(255,255,0,.3); color: red">{{$dato->padrinos->nombre}} {{$dato->padrinos->apellido}}</td>
                                        <th style="background: rgba(255,255,0,.3); color: red">{{$dato->fecha}}</th>
                                        <td style="background: rgba(255,255,0,.3); color: red">{{$dato->fecha_entrega_carta}}</td>
                                        <td style="background: rgba(255,255,0,.3); color: red">{{$dato->entrega_carta_presentacion}}</td>
                                        <td style="background: rgba(255,255,0,.3); color: red">{{$dato->entrega_video}}</td>
                                        <td style="background: rgba(255,255,0,.3); color: red">{{$dato->observaciones}}</td>
                                        @role('admin')
                                        <td>
                                            <a href="{{url('cumpleanios/'.$dato->id)}}" class="btn btn-primary"><ion-icon name="eye-outline"></ion-icon></a>
                                            |
                                            <a href="{{url('cumpleanios/'.$dato->id.'/edit')}}" class="btn btn-success"><ion-icon name="brush-outline"></ion-icon></a>
                                            {{-- |
                                            <form action="{{'cumpleanios/'.$dato->id}}" method="post" class="d-inline">
                                                @csrf
                                                {{method_field('DELETE')}}
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás Seguro de borrarlo?')"><ion-icon name="beaker-outline"></ion-icon></button>
                                            </form> --}}
                                        </td>
                                        @endrole
                                        @role('editor')
                                        @endrole
                                    @else
                                        <td style="color: red">{{$dato->id}}</td>
                                        <td style="color: red">{{$dato->padrinos->nombre}} {{$dato->padrinos->apellido}}</td>
                                        <th style="color: red">{{$dato->fecha}}</th>
                                        <td style="color: red">{{$dato->fecha_entrega_carta}}</td>
                                        <td style="color: red">{{$dato->entrega_carta_presentacion}}</td>
                                        <td style="color: red">{{$dato->entrega_video}}</td>
                                        <td style="color: red">{{$dato->observaciones}}</td>
                                        @role('admin')
                                        <td>
                                            <a href="{{url('cumpleanios/'.$dato->id)}}" class="btn btn-primary"><ion-icon name="eye-outline"></ion-icon></a>
                                            |
                                            <a href="{{url('cumpleanios/'.$dato->id.'/edit')}}" class="btn btn-success"><ion-icon name="brush-outline"></ion-icon></a>
                                            {{-- |
                                            <form action="{{'cumpleanios/'.$dato->id}}" method="post" class="d-inline">
                                                @csrf
                                                {{method_field('DELETE')}}
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás Seguro de borrarlo?')"><ion-icon name="beaker-outline"></ion-icon></button>
                                            </form> --}}
                                        </td>
                                        @endrole
                                        @role('editor')
                                        @endrole
                                    @endif

                                @else

                                    @if ($fecha->format('Y-m-d') === $dato->fecha)
                                        <td style="background: rgba(255,255,0,.3)">{{$dato->id}}</td>
                                        <td style="background: rgba(255,255,0,.3)">{{$dato->padrinos->nombre}} {{$dato->padrinos->apellido}}</td>
                                        <th style="background: rgba(255,255,0,.3)">{{$dato->fecha}}</th>
                                        <td style="background: rgba(255,255,0,.3)">{{$dato->fecha_entrega_carta}}</td>
                                        <td style="background: rgba(255,255,0,.3)">{{$dato->entrega_carta_presentacion}}</td>
                                        <td style="background: rgba(255,255,0,.3)">{{$dato->entrega_video}}</td>
                                        <td style="background: rgba(255,255,0,.3)">{{$dato->observaciones}}</td>
                                        @role('admin')
                                        <td>
                                            <a href="{{url('cumpleanios/'.$dato->id)}}" class="btn btn-primary"><ion-icon name="eye-outline"></ion-icon></a>
                                            |
                                            <a href="{{url('cumpleanios/'.$dato->id.'/edit')}}" class="btn btn-success"><ion-icon name="brush-outline"></ion-icon></a>
                                            {{-- |
                                            <form action="{{'cumpleanios/'.$dato->id}}" method="post" class="d-inline">
                                                @csrf
                                                {{method_field('DELETE')}}
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás Seguro de borrarlo?')"><ion-icon name="beaker-outline"></ion-icon></button>
                                            </form> --}}
                                        </td>
                                        @endrole
                                        @role('editor')
                                        @endrole
                                    @else
                                        <td>{{$dato->id}}</td>
                                        <td>{{$dato->padrinos->nombre}} {{$dato->padrinos->apellido}}</td>
                                        <th>{{$dato->fecha}}</th>
                                        <td>{{$dato->fecha_entrega_carta}}</td>
                                        <td>{{$dato->entrega_carta_presentacion}}</td>
                                        <td>{{$dato->entrega_video}}</td>
                                        <td>{{$dato->observaciones}}</td>
                                        @role('admin')
                                        <td>
                                            <a href="{{url('cumpleanios/'.$dato->id)}}" class="btn btn-primary"><ion-icon name="eye-outline"></ion-icon></a>
                                            |
                                            <a href="{{url('cumpleanios/'.$dato->id.'/edit')}}" class="btn btn-success"><ion-icon name="brush-outline"></ion-icon></a>
                                            {{-- |
                                            <form action="{{'cumpleanios/'.$dato->id}}" method="post" class="d-inline">
                                                @csrf
                                                {{method_field('DELETE')}}
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás Seguro de borrarlo?')"><ion-icon name="beaker-outline"></ion-icon></button>
                                            </form> --}}
                                        </td>
                                        @endrole
                                        @role('editor')
                                        @endrole
                                    @endif

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
