@extends('home')

@section('contenido')
    <h1 class="text-left p-2">Actividades</h1>
    <div class="container">

      <a href="{{url('/actividades')}}" class="btn btn-warning mb-3">
        <ion-icon name="arrow-undo-outline"></ion-icon>
          Volver a actividades
      </a>

      <div class="row justify-content-center bordeOscuro">
            <div class="parteSuperiorTablas">
                <p>Crear nueva actividad</p>
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
                <form action="{{url('/actividades')}}" class="row" method="post">
                    @csrf
                    <div class="col-md-3"> {{-- Inicio --}}
                        <div class="mb-3">
                          <label for="actividad" class="form-label">Actividad</label>
                          <input type="text" class="form-control" id="actividad" name="actividad" value="{{old('actividad')}}">
                        </div>
                    </div>

                    <div class="col-md-3"> {{-- Inicio --}}
                        <div class="mb-3">
                          <label for="fecha_creacion" class="form-label">Fecha Creacion</label>
                          <input type="date" class="form-control" id="fecha_creacion" name="fecha_creacion" value="{{old('fecha_creacion')}}">
                        </div>
                    </div>

                    <div class="col-md-3"> {{-- Inicio --}}
                        <div class="mb-3">
                          <label for="fecha_actividad" class="form-label">Fecha Actividad</label>
                          <input type="date" class="form-control" id="fecha_actividad" name="fecha_actividad" value="{{old('fecha_actividad')}}">
                        </div>
                    </div>

                    <div class="col-md-3"> {{-- Inicio --}}
                      <label for="id_tipo_asistencia" class="form-label">Tipo Asistencia</label>
                      <select class="form-select mb-3" id="id_tipo_asistencia" name="id_tipo_asistencia">

                        @foreach ($tipoAsistencias as $tipoAsistencia)
                        <option value="{{$tipoAsistencia->id}}">{{$tipoAsistencia->tipo_asistencia}}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="col-md-12"> {{-- Inicio --}}
                        <div class="mb-3">
                          <label for="observacion" class="form-label">Observación</label>
                          <input type="text" class="form-control" id="observacion" name="observacion" value="{{old('observacion')}}">
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
