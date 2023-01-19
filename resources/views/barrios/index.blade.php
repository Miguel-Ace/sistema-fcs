@extends('home')

@section('contenido')
    <h1 class="text-left p-2">Barrios</h1>
    <div class="container">
        @role('admin')
        <a href="{{url('/barrios/create')}}" class="btn btn-warning mb-3">
            <ion-icon name="create-outline"></ion-icon>
            Nuevo Barrio
        </a>
        @endrole

        @role('creador')
        <a href="{{url('/barrios/create')}}" class="btn btn-warning mb-3">
            <ion-icon name="create-outline"></ion-icon>
            Nuevo Barrio
        </a>
        @endrole

        <div class="row justify-content-center bordeOscuro">
            <div class="parteSuperiorTablas">
                <p>Listado de los barrios</p>
                <div class="buscador">
                    <form action="{{url('/barrios')}}" method="GET" class="d-flex" role="search">
                        <input class="form-control me-2" type="search" value="{{$busqueda}}" placeholder="Buscar barrio" aria-label="Search" name="buscar">
                        <button class="btn btn-outline-success" type="submit"><ion-icon name="search-outline"></ion-icon></button>
                    </form>
                </div>
            </div>

            <div class="col-md-12 fs-6">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            {{-- <th scope="col">#</th> --}}
                            <th scope="col">Barrio</th>
                            <th scope="col">Canton</th>
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
                                <td>{{$dato->barrio}}</td>
                                <td>{{$dato->cantones->canton}}</td>
                                @role('admin')
                                <td>
                                    <a href="{{url('barrios/'.$dato->id)}}" class="btn btn-primary"><ion-icon name="eye-outline"></ion-icon></a>
                                    |
                                    <a href="{{url('barrios/'.$dato->id.'/edit')}}" class="btn btn-success"><ion-icon name="pencil-outline"></ion-icon></a>
                                    {{-- <form action="{{'barrios/'.$dato->id}}" method="post" class="d-inline">
                                        @csrf
                                        {{method_field('DELETE')}}
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás Seguro de borrarlo?')">Borrar</button>
                                    </form> --}}
                                </td>
                                @endrole
                                @role('editor')
                                <td>
                                    <a href="{{url('barrios/'.$dato->id)}}" class="btn btn-primary"><ion-icon name="eye-outline"></ion-icon></a>
                                    |
                                    <a href="{{url('barrios/'.$dato->id.'/edit')}}" class="btn btn-success"><ion-icon name="pencil-outline"></ion-icon></a>
                                    {{-- <form action="{{'barrios/'.$dato->id}}" method="post" class="d-inline">
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
