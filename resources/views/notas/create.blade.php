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
                <p>Crear notas</p>
                <div class="buscador">
                </div>
            </div>

        <div class="col-md-12 fs-6">
            @if ($errors->any())
              <ul class="bg-white text-danger p-2">
                  @foreach ($errors->all() as $error)
                  <li>{{$error}}</li>
                  @endforeach
              </ul>
            @endif
            <form action="{{url('/notas')}}" class="row" method="post">
                @csrf

                <div class="col-md-3">{{-- Inicio --}}
                    <label for="id_expediente" class="form-label">Expediente</label>
                    <select class="form-select mb-3" id="id_expediente" name="id_expediente">
                        @foreach ($expedientes as $expediente)
                        <option value="{{$expediente->id}}">{{$expediente->nombre1}} {{$expediente->nombre2}} {{$expediente->apellido1}} {{$expediente->apellido2}}</option>
                        @endforeach
                    </select>

                    <label for="tipo_promedio" class="form-label">Tipo De Promedio</label>
                    <select class="form-select mb-3" id="tipo_promedio" name="tipo_promedio">
                        <option value="Exelente">Exelente</option>
                        <option value="Muy Bueno">Muy Bueno</option>
                        <option value="Bueno">Bueno</option>
                        <option value="Malo">Malo</option>
                    </select>
                </div>{{-- Fin --}}

                <div class="col-md-3">{{-- Inicio --}}
                    <div class="mb-3">
                        <label for="promedio" class="form-label">Promedio</label>
                        <input type="number" min="0" max="100" class="form-control" id="promedio" name="promedio" value="{{old('promedio')}}">
                    </div>

                    <label for="id_clasificacion_nota" class="form-label">Clasificacion De Nota</label>
                    <select class="form-select mb-3" id="id_clasificacion_nota" name="id_clasificacion_nota">
                        @foreach ($clasificacionNotas as $clasificacionNota)
                            <option value="{{$clasificacionNota->id}}">{{$clasificacionNota->clasificacion_nota}}</option>
                        @endforeach
                    </select>
                </div>{{-- Fin --}}

                <div class="col-md-3">{{-- Inicio --}}
                    <div class="mb-3">
                        <label for="fecha" class="form-label">Fecha</label>
                        <input type="date" class="form-control" id="fecha" name="fecha" value="{{old('fecha')}}">
                    </div>

                    <label for="semaforo" class="form-label">Semáforo</label>
                        <select class="form-select mb-3" id="semaforo" name="semaforo">
                            <option value="Verde">Verde</option>
                            <option value="Rojo">Rojo</option>
                            <option value="Amarillo">Amarillo</option>
                        </select>
                </div>{{-- Fin --}}

                <div class="col-md-3">{{-- Inicio --}}
                    <label for="id_grado_escolar" class="form-label">Grado Escolar</label>
                    <select class="form-select mb-3" id="id_grado_escolar" name="id_grado_escolar">
                        @foreach ($gradoEscolares as $gradoEscolar)
                        <option value="{{$gradoEscolar->id}}">{{$gradoEscolar->grado_escolar}}</option>
                        @endforeach
                    </select>
                </div>{{-- Fin --}}
                
                <div class="mb-3">
                    <label for="observaciones" class="form-label">Observaciones</label>
                    <input type="text" class="form-control" id="observaciones" name="observaciones" value="{{old('observaciones')}}">
                </div>

                <button type="submit" class="btn btn-primary enviar">
                    <ion-icon name="save-outline"></ion-icon>
                    Guardar
                </button>
            </form>

            </div>
        </div>
        @endrole

        @role('creador')
        @endrole
    </div>
@endsection
