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
            <p>Añadir participante</p>
            {{-- {{$start}} --}}
            {{-- <div class="buscador">
                    <form action="{{url('/detalle_actividades/create')}}" method="GET" class="d-flex" role="search">
                        <select class="form-select mb-3" id="buscar" name="buscar">
                            @foreach ($actividades as $actividad)
                            <option value="{{$actividad->id}}">{{$actividad->actividad}}</option>
                            @endforeach
                        </select>

                        <div>
                            <button class="btn btn-outline-success" type="submit"><ion-icon name="search-outline"></ion-icon></button>
                        </div>
                    </form>
                </div> --}}

        </div>

        <div class="col-md-12 fs-6">
            @if (Session::has('mensaje'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{Session::get('mensaje')}}
            </div>
            @endif

          @if ($errors->any())
              <ul class="bg-white text-danger p-2">
                  @foreach ($errors->all() as $error)
                  <li>{{$error}}</li>
                  @endforeach
              </ul>
          @endif
            <form action="{{url('detalle_actividades/'.$start)}}" class="row" method="post">
              @csrf
              <div class="row">{{-- Inicio --}}

                    <div class="col-md-4 d-none">
                        <label for="id_actividad" class="form-label">Actividad</label>
                        <select class="form-select mb-3" id="id_actividad" name="id_actividad">
                            @foreach ($actividades as $actividad)
                            @if ($actividad->id == $start)
                                <option value="{{$actividad->id}}">{{$actividad->actividad}}</option>
                            @endif
                            @endforeach
                          </select>
                    </div>

                    {{-- <div class="col-md-3">
                        <label for="id_expediente" class="form-label">Expediente</label>
                        <select class="form-select mb-3" id="id_expediente" name="id_expediente">
                            @foreach ($expedientes as $expediente)
                              <option value="{{$expediente->id}}">{{$expediente->nombre1}} {{$expediente->nombre2}} {{$expediente->apellido1}} {{$expediente->apellido2}}</option>
                          @endforeach
                      </select>
                    </div> --}}

                    <div class="col-md-9">
                        <table class="table table-bordered table-hover">
                          <thead>
                              <tr>
                                  <th scope="col">Expediente</th>
                                  <th scope="col">Agregar</th>
                              </tr>
                          </thead>
                          <tbody class="text-center" id="listaParticipante">

                              @foreach ($expedientes as $expediente)
                                <tr>
                                    @role('admin')
                                    @foreach ($datos as $dato)
                                        @if ($expediente->id == $dato->expedientes->id)
                                        <p class="d-none">{{$valor = $expediente->id}}</p>
                                        @endif
                                    @endforeach
                                        @if ($valor == $expediente->id)
                                        @else
                                            <th>{{$expediente->nombre1}} {{$expediente->nombre2}} {{$expediente->apellido1}} {{$expediente->apellido2}}</th>

                                            <td>
                                                <input type="text" class="form-control d-none" id="id_expediente" name="" value="{{$expediente->id}}">

                                                <button type="submit" class="btn btn-primary botoncin" id="btnEnviarParticipante">+</button>
                                            </td>
                                        @endif
                                    @endrole

                                      @role('editor')
                                      <td>
                                      </td>
                                      @endrole
                                </tr>
                              @endforeach
                          </tbody>
                      </table>
                    </div>

                    <div class="col-md-3 d-none">
                        <label for="asistencia" class="form-label">Aistencia</label>
                          <select class="form-select mb-3" id="asistencia" name="asistencia">
                              <option value="No">No</option>
                              <option value="Si">Si</option>
                          </select>
                    </div>

                    <div class="col-md-3 d-none">
                        <label for="semaforo" class="form-label">Semáforo</label>
                          <select class="form-select mb-3" id="semaforo" name="semaforo">
                              <option value="Rojo">Rojo</option>
                              <option value="Verde">Verde</option>
                          </select>
                    </div>
                    </div>{{-- Fin --}}

                    <div class="mb-3 d-none">
                        <label for="observacion" class="form-label">Observación</label>
                        <input type="text" class="form-control" id="observacion" name="observacion">
                    </div>

                  {{-- <button type="submit" class="btn btn-primary enviar">
                    <ion-icon name="save-outline"></ion-icon>
                    Guardar
                  </button> --}}
              </form>
            </div>
        </div>
        @endrole
@endsection
