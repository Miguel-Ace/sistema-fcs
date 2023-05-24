@extends('home')

@section('contenido')
    <h1 class="text-left p-2">Enfermedades:
        @foreach ($expedientes as $expediente)
         @if ($expediente->id == $start)
            {{$expediente->nombre1}} {{$expediente->nombre2}} {{$expediente->apellido1}} {{$expediente->apellido2}}
         @endif
        @endforeach
    </h1>
    <div class="container">

        @role('admin')
        <a href="{{url('/enfermedades/create?buscar='.$start)}}" class="btn btn-warning mb-3">
            <ion-icon name="create-outline"></ion-icon>
            Nueva Enfermedad
        </a>
        <a href="{{url('/evaluaciones_medicas')}}" class="btn btn-secondary mb-3">
            <ion-icon name="arrow-back-outline"></ion-icon>
            Volver
        </a>
        @endrole

        @role('creador')
        <a href="{{url('/enfermedades/create?buscar='.$start)}}" class="btn btn-warning mb-3">
            <ion-icon name="create-outline"></ion-icon>
            Nueva Enfermedad
        </a>
        <a href="{{url('evaluaciones_medicas')}}" class="btn btn-secondary mb-3">
            <ion-icon name="arrow-back-outline"></ion-icon>
            Volver
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
                    <form action="{{url('/enfermedades')}}" method="GET" class="d-flex" role="search">
                        <select class="form-select mb-3" id="buscar" name="buscar">
                            <option value="">Buscar por enfermedad</option>
                            @foreach ($datos as $dato)
                            <option value="{{$dato->id}}">{{$dato->enfermedad}}</option>
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
                            <th scope="col">Enfermedad</th>
                            <th scope="col">Medicamento</th>
                            <th scope="col">Fecha</th>
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
                            @if ($dato->id_expediente == $start)
                                <tr>
                                    <th>{{$dato->enfermedad}}</th>
                                    <th>{{$dato->medicamento}}</th>
                                    <th>{{$dato->fecha}}</th>
                                    @role('admin')
                                        <td>
                                            {{-- <a href="{{url('enfermedades/'.$dato->id)}}" class="btn btn-primary"><ion-icon name="eye-outline"></ion-icon></a> --}}
                                            {{-- | --}}
                                            <a href="{{url('enfermedades/'.$dato->id.'/edit?buscar='.$start)}}" class="btn btn-success"><ion-icon name="brush-outline"></ion-icon></a>
                                            {{-- |
                                            <form action="{{'enfermedades/'.$dato->id}}" method="post" class="d-inline">
                                                @csrf
                                                {{method_field('DELETE')}}
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás Seguro de borrarlo?')"><ion-icon name="beaker-outline"></ion-icon></button>
                                            </form> --}}
                                        </td>
                                    @endrole

                                    @role('editor')
                                    <td>
                                        {{-- <a href="{{url('enfermedades/'.$dato->id)}}" class="btn btn-primary"><ion-icon name="eye-outline"></ion-icon></a> --}}
                                        {{-- | --}}
                                        <a href="{{url('enfermedades/'.$dato->id.'/edit?buscar='.$start)}}" class="btn btn-success"><ion-icon name="brush-outline"></ion-icon></a>
                                    </td>
                                    @endrole
                                </tr>
                            @endif
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
