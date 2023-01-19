@extends('home')

@section('contenido')
    <h1 class="text-left p-2">Notas</h1>

    <div class="container">
        <a href="{{url('/notas')}}" class="btn btn-warning mb-3">
            <ion-icon name="arrow-undo-outline"></ion-icon>
            Volver Lista de Notas
        </a>

        @role('admin')
        <div class="row justify-content-center bordeOscuro">

            <div class="parteSuperiorTablas">
                <p>Editar notas</p>
                <div class="buscador">
                </div>
            </div>

        <div class="col-md-12 fs-6">

            <form action="{{url('notas/'.$datos->id)}}" class="row" method="post">
                @csrf
                {{method_field('PATCH')}}

                <div class="col-md-3">{{-- Inicio --}}
                    <label for="id_expediente" class="form-label">Expediente</label>
                    <select class="form-select mb-3" id="id_expediente" name="id_expediente">
                        @foreach ($expedientes as $expediente)
                            @if ($expediente->id === $datos->expedientes->id)
                            <option value="{{$expediente->id}}" selected>{{$expediente->nombre1}} {{$expediente->nombre2}} {{$expediente->apellido1}} {{$expediente->apellido2}}</option>
                            @else
                            <option value="{{$expediente->id}}">{{$expediente->nombre1}} {{$expediente->nombre2}} {{$expediente->apellido1}} {{$expediente->apellido2}}</option>
                            @endif
                        @endforeach
                    </select>

                    <label for="tipo_promedio" class="form-label">Tipo De Promedio</label>
                    <select class="form-select mb-3" id="tipo_promedio" name="tipo_promedio">
                        @if ($datos->tipo_promedio === "Exelente")
                            
                            <option value="Exelente" selected>Exelente</option>
                            <option value="Muy Bueno">Muy Bueno</option>
                            <option value="Bueno">Bueno</option>
                            <option value="Malo">Malo</option>
                        @elseif ($datos->tipo_promedio === "Muy Bueno")
                            <option value="Exelente">Exelente</option>
                            <option value="Muy Bueno" selected>Muy Bueno</option>
                            <option value="Bueno">Bueno</option>
                            <option value="Malo">Malo</option>
                        
                        @elseif ($datos->tipo_promedio === "Bueno")
                            <option value="Exelente">Exelente</option>
                            <option value="Muy Bueno">Muy Bueno</option>
                            <option value="Bueno" selected>Bueno</option>
                            <option value="Malo">Malo</option>
                        
                        @elseif ($datos->tipo_promedio === "Malo")
                            <option value="Exelente">Exelente</option>
                            <option value="Muy Bueno">Muy Bueno</option>
                            <option value="Bueno">Bueno</option>
                            <option value="Malo" selected>Malo</option>
                            
                        @endif
                    </select>
                </div>{{-- Fin --}}

                <div class="col-md-3">{{-- Inicio --}}
                    <div class="mb-3">
                        <label for="promedio" class="form-label">Promedio</label>
                        <input type="number" min="0" max="100" class="form-control" value="{{$datos->promedio}}" id="promedio" name="promedio">
                    </div>

                    <label for="id_clasificacion_nota" class="form-label">Clasificacion De Nota</label>
                    <select class="form-select mb-3" id="id_clasificacion_nota" name="id_clasificacion_nota">
                        @foreach ($clasificacionNotas as $clasificacionNota)
                            @if ($clasificacionNota->id === $datos->clasificacion_notas->id)
                                <option value="{{$clasificacionNota->id}}" selected>{{$clasificacionNota->clasificacion_nota}}</option>
                            @else
                                <option value="{{$clasificacionNota->id}}">{{$clasificacionNota->clasificacion_nota}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>{{-- Fin --}}
                    
                <div class="col-md-3">{{-- Inicio --}}
                    <div class="mb-3">
                        <label for="fecha" class="form-label">Fecha</label>
                        <input type="date" class="form-control" value="{{$datos->fecha}}" id="fecha" name="fecha">
                    </div>
                </div>{{-- Fin --}}
                
                <div class="col-md-3">{{-- Inicio --}}
                    <label for="id_grado_escolar" class="form-label">Grado Escolar</label>
                    <select class="form-select mb-3" id="id_grado_escolar" name="id_grado_escolar">
                        @foreach ($gradoEscolares as $gradoEscolar)
                            @if ($gradoEscolar->id === $datos->grados_escolares->id)
                                <option value="{{$gradoEscolar->id}}" selected>{{$gradoEscolar->grado_escolar}}</option>
                            @else
                                <option value="{{$gradoEscolar->id}}">{{$gradoEscolar->grado_escolar}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>{{-- Fin --}}

                <button type="submit" class="btn btn-primary enviar">
                    <ion-icon name="save-outline"></ion-icon>
                    Guardar
                </button>
            </form>
                
            </div>
        </div>
        @endrole

        @role('editor')
        <div class="row justify-content-center bordeOscuro">

            <div class="parteSuperiorTablas">
                <p>Crear notas</p>
                <div class="buscador">
                </div>
            </div>

        <div class="col-md-12 fs-6">

            <form action="{{url('notas/'.$datos->id)}}" class="row" method="post">
                @csrf
                {{method_field('PATCH')}}

                <div class="col-md-3">{{-- Inicio --}}
                    <label for="id_expediente" class="form-label">Expediente</label>
                    <select class="form-select mb-3" id="id_expediente" name="id_expediente">
                        @foreach ($expedientes as $expediente)
                            @if ($expediente->id === $datos->expedientes->id)
                            <option value="{{$expediente->id}}" selected>{{$expediente->id}}</option>
                            @else
                            <option value="{{$expediente->id}}">{{$expediente->id}}</option>
                            @endif
                        @endforeach
                    </select>

                    <label for="tipo_promedio" class="form-label">Tipo De Promedio</label>
                    <select class="form-select mb-3" id="tipo_promedio" name="tipo_promedio">
                        @if ($datos->tipo_promedio === "Exelente")
                            
                            <option value="Exelente" selected>Exelente</option>
                            <option value="Muy Bueno">Muy Bueno</option>
                            <option value="Bueno">Bueno</option>
                            <option value="Malo">Malo</option>
                        @elseif ($datos->tipo_promedio === "Muy Bueno")
                            <option value="Exelente">Exelente</option>
                            <option value="Muy Bueno" selected>Muy Bueno</option>
                            <option value="Bueno">Bueno</option>
                            <option value="Malo">Malo</option>
                        
                        @elseif ($datos->tipo_promedio === "Bueno")
                            <option value="Exelente">Exelente</option>
                            <option value="Muy Bueno">Muy Bueno</option>
                            <option value="Bueno" selected>Bueno</option>
                            <option value="Malo">Malo</option>
                        
                        @elseif ($datos->tipo_promedio === "Malo")
                            <option value="Exelente">Exelente</option>
                            <option value="Muy Bueno">Muy Bueno</option>
                            <option value="Bueno">Bueno</option>
                            <option value="Malo" selected>Malo</option>
                            
                        @endif
                    </select>
                </div>{{-- Fin --}}

                <div class="col-md-3">{{-- Inicio --}}
                    <div class="mb-3">
                        <label for="promedio" class="form-label">Promedio</label>
                        <input type="number" min="0" max="100" class="form-control" value="{{$datos->promedio}}" id="promedio" name="promedio">
                    </div>

                    <label for="id_clasificacion_nota" class="form-label">Clasificacion De Nota</label>
                    <select class="form-select mb-3" id="id_clasificacion_nota" name="id_clasificacion_nota">
                        @foreach ($clasificacionNotas as $clasificacionNota)
                            @if ($clasificacionNota->id === $datos->clasificacion_notas->id)
                                <option value="{{$clasificacionNota->id}}" selected>{{$clasificacionNota->clasificacion_nota}}</option>
                            @else
                                <option value="{{$clasificacionNota->id}}">{{$clasificacionNota->clasificacion_nota}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>{{-- Fin --}}
                    
                <div class="col-md-3">{{-- Inicio --}}
                    <div class="mb-3">
                        <label for="fecha" class="form-label">Fecha</label>
                        <input type="date" class="form-control" value="{{$datos->fecha}}" id="fecha" name="fecha">
                    </div>
                </div>{{-- Fin --}}
                
                <div class="col-md-3">{{-- Inicio --}}
                    <label for="id_grado_escolar" class="form-label">Grado Escolar</label>
                    <select class="form-select mb-3" id="id_grado_escolar" name="id_grado_escolar">
                        @foreach ($gradoEscolares as $gradoEscolar)
                            @if ($gradoEscolar->id === $datos->grados_escolares->id)
                                <option value="{{$gradoEscolar->id}}" selected>{{$gradoEscolar->grado_escolar}}</option>
                            @else
                                <option value="{{$gradoEscolar->id}}">{{$gradoEscolar->grado_escolar}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>{{-- Fin --}}

                <button type="submit" class="btn btn-primary enviar">
                    <ion-icon name="save-outline"></ion-icon>
                    Guardar
                </button>
            </form>
                
            </div>
        </div>
        @endrole
    </div>
@endsection