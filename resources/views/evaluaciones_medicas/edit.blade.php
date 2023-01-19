@extends('home')

@section('contenido')
    <h1 class="text-left p-2">Evaluaciones Médicas</h1>
    <div class="container">

        <a href="{{url('/evaluaciones_medicas')}}" class="btn btn-warning mb-3">
          <ion-icon name="arrow-undo-outline"></ion-icon>
          Volver a evaluaciones médicas
        </a>


      @role('admin')
      <div class="row justify-content-center bordeOscuro">
        <div class="parteSuperiorTablas">
            <p>Editar evaluación médica</p>
            <div class="buscador">
            </div>
        </div>

        <div class="col-md-12 fs-6">
            <form action="{{url('evaluaciones_medicas/'.$datos->id)}}" class="row" method="post">
              @csrf
              {{method_field('PATCH')}}
              <div class="col-md-3">{{-- Inicio --}}

                <label for="id_expediente" class="form-label">Expediente</label>
                <select class="form-select mb-3" id="id_expediente" name="id_expediente">
                    <option value="" selected>Seleccione un expediente</option>
                    @foreach ($expedientes as $expediente)
                        @if ($expediente->id === $datos->expedientes->id)
                            <option value="{{$expediente->id}}" selected>{{$expediente->nombre1}} {{$expediente->nombre2}} {{$expediente->apellido1}} {{$expediente->apellido2}}</option>
                        @else
                            <option value="{{$expediente->id}}">{{$expediente->nombre1}} {{$expediente->nombre2}} {{$expediente->apellido1}} {{$expediente->apellido2}}</option>
                        @endif
                    @endforeach
                </select>

                      <label for="cancer" class="form-label">Cancer</label>
                        <select class="form-select mb-3" id="cancer" name="cancer">
                            @if ($datos->cancer === "Si")
                                <option value="Si">Si</option>
                            @else
                                <option value="No">No</option>
                            @endif
                        </select>

                        <label for="asma" class="form-label">Asma</label>
                        <select class="form-select mb-3" id="asma" name="asma">
                            @if ($datos->asma === "Si")
                            <option value="Si">Si</option>
                            @else
                            <option value="No">No</option>
                            @endif
                        </select>

                        <label for="ostogenesis" class="form-label">Ostogenesis</label>
                        <select class="form-select mb-3" id="ostogenesis" name="ostogenesis">

                            @if ($datos->ostogenesis === "Si")
                                <option value="Si">Si</option>
                            @else
                                <option value="No">No</option>
                            @endif
                        </select>

                    </div>{{-- Fin --}}

                    <div class="col-md-3">{{-- Inicio --}}
                    <label for="id_medico" class="form-label">Medico</label>
                    <select class="form-select mb-3" id="id_medico" name="id_medico">
                        <option value="" selected>Seleccione El Medico</option>
                        @foreach ($medicos as $medico)
                            @if ($medico->id === $datos->medicos->id)
                                <option value="{{$medico->id}}" selected>{{$medico->nombre}} {{$medico->apellido}}</option>
                            @else
                                <option value="{{$medico->id}}">{{$medico->nombre}} {{$medico->apellido}}</option>
                            @endif
                        @endforeach
                    </select>

                        <label for="epilepcia" class="form-label">Epilepsia</label>
                        <select class="form-select mb-3" id="epilepcia" name="epilepcia">
                            @if ($datos->epilepcia === "Si")
                                <option value="Si">Si</option>
                            @else
                                <option value="No">No</option>
                            @endif
                        </select>

                        <label for="enfermedad_corazon" class="form-label">Enfermedades Cardiacas</label>
                        <select class="form-select mb-3" id="enfermedad_corazon" name="enfermedad_corazon">

                            @if ($datos->enfermedad_corazon === "Si")
                                <option value="Si">Si</option>
                            @else
                                <option value="No">No</option>
                            @endif
                        </select>

                        <label for="sindrome_piernas_inquietas" class="form-label">Sindrome Piernas Inquietas</label>
                        <select class="form-select mb-3" id="sindrome_piernas_inquietas" name="sindrome_piernas_inquietas">

                            @if ($datos->sindrome_piernas_inquietas === "Si")
                                <option value="Si">Si</option>
                            @else
                                <option value="No">No</option>
                            @endif
                        </select>
                </div>{{-- Fin --}}


                  <div class="col-md-3">{{-- Inicio --}}

                    <div class="mb-3">
                        <label for="fecha" class="form-label">Fecha</label>
                        <input type="date" class="form-control" value="{{$datos->fecha}}" id="fecha" name="fecha">
                    </div>


                    <label for="frenillos" class="form-label">Frenillos</label>
                        <select class="form-select mb-3" id="frenillos" name="frenillos">

                            @if ($datos->frenillos === "Si")
                                <option value="Si">Si</option>
                            @else
                                <option value="No">No</option>
                            @endif
                    </select>

                    <label for="anteojos" class="form-label">Anteojos</label>
                        <select class="form-select mb-3" id="anteojos" name="anteojos">

                            @if ($datos->anteojos === "Si")
                                <option value="Si">Si</option>
                            @else
                                <option value="No">No</option>
                            @endif
                        </select>


                  <label for="otras_enfermedades" class="form-label">Otras Enfermedades</label>
                  <select class="form-select mb-3" id="otras_enfermedades" name="otras_enfermedades">

                      @if ($datos->otras_enfermedades === "Si")
                          <option value="Si">Si</option>
                      @else
                          <option value="No">No</option>
                      @endif
                  </select>
                    </div>{{-- Fin --}}

                <div class="col-md-3">{{-- Inicio --}}

                    <label for="diabetes" class="form-label">Diabetes</label>
                    <select class="form-select mb-3" id="diabetes" name="diabetes">

                        @if ($datos->diabetes === "Si")
                        <option value="Si">Si</option>
                        @else
                        <option value="No">No</option>
                        @endif
                    </select>


                  <label for="semaforo" class="form-label">Semáforo</label>
                  <select class="form-select mb-3" id="semaforo" name="semaforo">

                                @if ($datos->semaforo === "Verde")
                                    <option value="Verde" selected>Verde</option>
                                    <option value="Rojo">Rojo</option>
                                    <option value="Amarillo">Amarillo</option>
                                @elseif ($datos->semaforo === "Rojo")
                                    <option value="Verde">Verde</option>
                                    <option value="Rojo" selected>Rojo</option>
                                    <option value="Amarillo">Amarillo</option>
                                @else
                                    <option value="Verde">Verde</option>
                                    <option value="Rojo">Rojo</option>
                                    <option value="Amarillo" selected>Amarillo</option>
                                @endif
                            </select>

                        </div>{{-- Fin --}}
                        <div class="mb-3">
                            <label for="notas" class="form-label">Notas</label>
                            <input type="text" class="form-control" id="notas" name="notas" value="{{$datos->notas}}">
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
