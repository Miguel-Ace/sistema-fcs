@extends('home')

@section('contenido')
    <h1 class="text-left p-2">Estado</h1>
    <div class="container">

        @role('admin')
        <a href="{{url('/estado/create')}}" class="btn btn-warning mb-3">
            <ion-icon name="create-outline"></ion-icon>
            Nuevo Estado
        </a>
        @endrole

        @role('creador')
        <a href="{{url('/estado/create')}}" class="btn btn-warning mb-3">
            <ion-icon name="create-outline"></ion-icon>
            Nuevo Estado
        </a>
        @endrole

        {{-- <a href="{{url('/expedientes/pdf')}}" class="btn btn-danger mb-3">
            <ion-icon name="download-outline"></ion-icon>
            PDF
        </a>
         --}}

        <div class="row justify-content-center bordeOscuro">
            <div class="parteSuperiorTablas">
                <p>Listado de estados</p>
                <div class="buscador">
                    <form action="{{url('/estado')}}" method="GET" class="d-flex" role="search">
                        <input class="form-control me-2" type="search" value="{{$busqueda}}" placeholder="Buscar" aria-label="Search" name="buscar">
                        <button class="btn btn-outline-success" type="submit"><ion-icon name="search-outline"></ion-icon></button>
                    </form>
                </div>
            </div>

            <div class="col-md-12 fs-5">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Estado</th>
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
                                <td>{{$dato->estado}}</td>
                                @role('admin')
                                @endrole
                                @role('editor')
                                @endrole
                                <td>
                                    <a href="{{url('estado/'.$dato->id)}}" class="btn btn-primary"><ion-icon name="eye-outline"></ion-icon></a>
                                    |
                                    <a href="{{url('estado/'.$dato->id.'/edit')}}" class="btn btn-success"><ion-icon name="pencil-outline"></ion-icon></a>
                                    {{-- <form action="{{'estado/'.$dato->id}}" method="post" class="d-inline">
                                        @csrf
                                        {{method_field('DELETE')}}
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás Seguro de borrarlo?')">Borrar</button>
                                    </form> --}}
                                </td>
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
