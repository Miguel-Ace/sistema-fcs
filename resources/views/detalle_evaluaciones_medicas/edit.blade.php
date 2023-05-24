@extends('home')

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
            <p>Editar Detalle Evaluaciones Médicas</p>
            <div class="buscador">
            </div>
        </div>

        <div class="col-md-12 fs-6">
            <form action="{{url('detalle_evaluacion_medicas/'.$datos->id)}}" class="row" method="post">
              @csrf
              {{method_field('PATCH')}}
              <div class="col-md-4">{{-- Inicio --}}

                <div class="mb-3 d-none">
                    <label for="id_evaluacion_medica" class="form-label">ID Evaluación Médica</label>
                    <input type="text" class="form-control" id="id_evaluacion_medica" name="id_evaluacion_medica" value="{{$datos->id_evaluacion_medica}}">
                </div>

                    <label for="id_especialidad" class="form-label">Especialidad</label>
                        <select class="form-select mb-3" id="id_especialidad" name="id_especialidad">
                            @foreach ($especialidades as $especialidad)
                                @if ($especialidad->id === $datos->especialidades->especialidad)
                                    <option value="{{$especialidad->id}}" selected>{{$especialidad->especialidad}}</option>
                                @else
                                    <option value="{{$especialidad->id}}">{{$especialidad->especialidad}}</option>
                                @endif
                            @endforeach
                        </select>

                        <div class="mb-3">
                            <label for="obsevacion" class="form-label">Obsevacion</label>
                            <input type="text" class="form-control" id="obsevacion" name="obsevacion" value="{{$datos->obsevacion}}">
                        </div>
                </div>{{-- Fin --}}

                <div class="col-md-4">{{-- Inicio --}}
                    <div class="mb-3">
                        <label for="medico" class="form-label">Médico</label>
                        <input type="text" class="form-control" id="medico" name="medico" value="{{$datos->medico}}">
                    </div>


                    <label for="semaforo" class="form-label">Semáforo</label>
                    <select class="form-select mb-3" id="semaforo" name="semaforo">

                        @if ($datos->semaforo === "Verde")
                            <option value="Verde" selected>Verde</option>
                            <option value="Amarillo">Amarillo</option>
                            <option value="Rojo">Rojo</option>
                        @elseif ($datos->semaforo === "Amarillo")
                            <option value="Verde">Verde</option>
                            <option value="Amarillo" selected>Amarillo</option>
                            <option value="Rojo">Rojo</option>
                        @else
                            <option value="Verde">Verde</option>
                            <option value="Amarillo">Amarillo</option>
                            <option value="Rojo" selected>Rojo</option>
                        @endif
                    </select>
                </div>{{-- Fin --}}


                <div class="col-md-4">{{-- Inicio --}}
                    <div class="mb-3">
                        <label for="diagnostico" class="form-label">Diagnostico</label>
                        <input type="text" class="form-control" id="diagnostico" name="diagnostico" value="{{$datos->diagnostico}}">
                    </div>

                    <div class="mb-3">
                        <label for="fecha" class="form-label">Fecha</label>
                        <input type="date" class="form-control" id="fecha" name="fecha" value="{{$datos->fecha}}">
                    </div>
                </div>{{-- Fin --}}


                <div class="col-md-4">
                    @if ($datos->nombre_diente)
                        <div class="mb-3" id="nombre_diente">
                            <label for="nombre_diente" class="form-label">Nombre del diente</label>
                            <input type="text" class="form-control" name="nombre_diente" value="{{$datos->nombre_diente}}">
                        </div>
                    @endif
                </div>

                <div class="col-md-8">
                    @if ($datos->descripcion)
                        <div class="mb-3" id="descripcion">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <input type="text" class="form-control" name="descripcion" value="{{$datos->descripcion}}">
                        </div>
                    @endif
                </div>
                  <button type="submit" class="btn btn-primary enviar">
                    <ion-icon name="save-outline"></ion-icon>
                    Guardar
                </button>
              </form>
            </div>
        </div>
        @endrole

        @role('editor')
        @endrole
@endsection
