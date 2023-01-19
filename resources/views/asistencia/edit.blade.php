
@extends('home')

@section('contenido')
    <h1 class="text-left p-2">Asistencias</h1>
    <div class="container">

      <a href="{{url('/asistencias')}}" class="btn btn-warning mb-3">
        <ion-icon name="arrow-undo-outline"></ion-icon>
          Volver a asistencia
      </a>

      <div class="row justify-content-center bordeOscuro">
            <div class="parteSuperiorTablas">
                <p>Crear nueva asistencia</p>
                <div class="buscador">
                </div>
            </div>

        <div class="col-md-12 fs-6">
                <form action="{{url('asistencias/'.$datos->id)}}" class="row" method="post">
                    @csrf
                    {{method_field('PATCH')}}
                    <div class="col-md-3"> {{-- Inicio --}}
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
                    </div>

                    <div class="col-md-3"> {{-- Inicio --}}
                        <div class="mb-3">
                            <label for="fecha" class="form-label">Fecha</label>
                            <input type="date" class="form-control" value="{{$datos->fecha}}" id="fecha" name="fecha">
                          </div>
                    </div>

                    <div class="col-md-6"> {{-- Inicio --}}
                        <div class="mb-3">
                            <label for="sigla_asistencia" class="form-label">Sigla Asistencia</label>
                            <input type="text" class="form-control" value="{{$datos->sigla_asistencia}}" id="sigla_asistencia" name="sigla_asistencia">
                          </div>
                    </div>

                    <button type="submit" class="btn btn-primary enviar">
                      <ion-icon name="save-outline"></ion-icon>
                      Guardar
                    </button>
                </form>

            </div>
        </div>


    </div>
@endsection
