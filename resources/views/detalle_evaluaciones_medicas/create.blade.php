@extends('home')
@vite(['resources/sass/app.scss', 'resources/js/app2.js'])
@section('contenido')
    <h1 class="text-left p-2">Detalle Evaluaciones Médicas</h1>
    <div class="container">

        <a href="{{url('/detalle_evaluacion_medicas?buscar='.$start)}}" class="btn btn-warning mb-3">
          <ion-icon name="arrow-undo-outline"></ion-icon>
          Volver a Detalle Evaluaciones Médicas
        </a>

      @role('admin')
      <div class="row justify-content-center bordeOscuro">
        <div class="parteSuperiorTablas">
            <p>Crear Detalle Evaluaciones Médicas</p>
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

            <form action="{{url('/detalle_evaluacion_medicas')}}" class="row" method="post">
                @csrf
                <div class="col-md-4">
                  <div class="mb-3 d-none">
                    <label for="id_evaluacion_medica" class="form-label">ID Evaluación Médica</label>
                    <input type="number" class="form-control" id="id_evaluacion_medica" name="id_evaluacion_medica" value="{{$start}}">
                  </div>

                  <label for="id_especialidad" class="form-label">Especialidad</label>
                  <select class="form-select mb-3" id="id_especialidad" name="id_especialidad">
                    @foreach ($especialidades as $especialidad)
                      <option value="{{$especialidad->id}}">{{$especialidad->especialidad}}</option>
                    @endforeach
                  </select>

                  <div class="mb-3">
                    <label for="obsevacion" class="form-label">Observación</label>
                    <input type="text" class="form-control" id="obsevacion" name="obsevacion" value="{{old('obsevacion')}}">
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="mb-3">
                    <label for="medico" class="form-label">Médico</label>
                    <input type="text" class="form-control" id="medico" name="medico" value="{{old('medico')}}">
                  </div>

                  <label for="semaforo" class="form-label">Semaforo</label>
                  <select class="form-select mb-3" id="semaforo" name="semaforo">
                    <option value="Verde">Verde</option>
                    <option value="Amarillo">Amarillo</option>
                    <option value="Rojo">Rojo</option>
                  </select>
                </div>

                <div class="col-md-4">
                  <div class="mb-3">
                    <label for="diagnostico" class="form-label">Diagnóstico</label>
                    <input type="text" class="form-control" id="diagnostico" name="diagnostico" value="{{old('diagnostico')}}">
                  </div>

                  <div class="mb-3">
                    <label for="fecha" class="form-label">Fecha</label>
                    <input type="date" class="form-control" id="fecha" name="fecha" value="{{old('fecha')}}">
                  </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3" id="nombre_diente" style="display: none;">
                        <label for="nombre_diente" class="form-label">Nombre del diente</label>
                        <input type="text" class="form-control" name="nombre_diente" value="{{old('nombre_diente')}}">
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="mb-3" id="descripcion" style="display: none;">
                      <label for="descripcion" class="form-label">Descripción</label>
                      <input type="text" class="form-control" name="descripcion" value="{{old('descripcion')}}">
                    </div>
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
@endsection
