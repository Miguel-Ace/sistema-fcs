@extends('home')

@section('contenido')
    <h1 class="text-left p-2">Lista De Participantes</h1>
    <div class="container">

        <a href="{{url('/detalle_actividades?buscar='.$start)}}" class="btn btn-warning mb-3">
          <ion-icon name="arrow-undo-outline"></ion-icon>
          Volver a Lista De Participantes
        </a>


      @role('admin')
      <div class="row justify-content-center bordeOscuro">
        <div class="parteSuperiorTablas">
            <p>Editar participante</p>
            <div class="buscador">
            </div>
        </div>

        <div class="col-md-12 fs-6">
            <form action="{{url('detalle_actividades/'.$datos->id.'/'.$start)}}" class="row" method="post">
              @csrf
              {{method_field('PATCH')}}

              <div class="row">{{-- Inicio --}}
                <div class="col-md-3">
                    <label for="id_actividad" class="form-label">Actividad</label>
                    <select class="form-select mb-3" id="id_actividad" name="id_actividad">
                        @foreach ($actividades as $actividad)
                            @if ($actividad->id === $datos->actividades->id)
                                <option value="{{$actividad->id}}" selected>{{$actividad->actividad}}</option>
                            @else
                                <option value="{{$actividad->id}}">{{$actividad->actividad}}</option>
                            @endif
                        @endforeach
                      </select>
                </div>

                <div class="col-md-3">
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

                <div class="col-md-3">
                    <label for="asistencia" class="form-label">Aistencia</label>
                      <select class="form-select mb-3" id="asistencia" name="asistencia">
                        @if ($datos->asistencia == 'No')
                            <option value="Si">Si</option>
                            <option value="No" selected>No</option>
                        @else
                            <option value="Si" selected>Si</option>
                            <option value="No">No</option>
                        @endif
                      </select>
                </div>

                <div class="col-md-3">
                    <label for="semaforo" class="form-label">Semáforo</label>
                      <select class="form-select mb-3" id="semaforo" name="semaforo">
                        @if ($datos->semaforo === 'Verde')
                            <option value="Verde" selected>Verde</option>
                            <option value="Rojo">Rojo</option>
                        @else
                            <option value="Verde">Verde</option>
                            <option value="Rojo" selected>Rojo</option>
                        @endif
                      </select>
                </div>
                </div>{{-- Fin --}}

                <div class="mb-3">
                    <label for="observacion" class="form-label">Observación</label>
                    <input type="text" class="form-control" id="observacion" name="observacion" value="{{$datos->observacion}}">
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
