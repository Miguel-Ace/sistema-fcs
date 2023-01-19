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
            <p>Crear evaluación médica</p>
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
            <form action="{{url('/evaluaciones_medicas')}}" class="row" method="post">
              @csrf
              <div class="col-md-3">{{-- Inicio --}}
                      <label for="id_expediente" class="form-label">Expediente</label>
                      <select class="form-select mb-3" id="id_expediente" name="id_expediente">
                          @foreach ($expedientes as $expediente)
                              <option value="{{$expediente->id}}">{{$expediente->nombre1}} {{$expediente->nombre2}} {{$expediente->apellido1}} {{$expediente->apellido2}}</option>
                          @endforeach
                      </select>

                      <label for="cancer" class="form-label">Cancer</label>
                      <select class="form-select mb-3" id="cancer" name="cancer">
                          <option value="Si">Si</option>
                          <option value="No" selected>No</option>
                      </select>

                    <label for="asma" class="form-label">Asma</label>
                    <select class="form-select mb-3" id="asma" name="asma">
                        <option value="Si">Si</option>
                        <option value="No" selected>No</option>
                    </select>

                      <label for="ostogenesis" class="form-label">Ostogenesis</label>
                        <select class="form-select mb-3" id="ostogenesis" name="ostogenesis">
                            <option value="Si">Si</option>
                            <option value="No" selected>No</option>
                        </select>
                    </div>{{-- Fin --}}

                    <div class="col-md-3">{{-- Inicio --}}
                      <label for="id_medico" class="form-label">Medico</label>
                      <select class="form-select mb-3" id="id_medico" name="id_medico">
                          @foreach ($medicos as $medico)
                              <option value="{{$medico->id}}">{{$medico->nombre}} {{$medico->apellido}}</option>
                          @endforeach
                      </select>

                        <label for="epilepcia" class="form-label">Epilepsia</label>
                        <select class="form-select mb-3" id="epilepcia" name="epilepcia">
                            <option value="Si">Si</option>
                            <option value="No" selected>No</option>
                        </select>

                        <label for="enfermedad_corazon" class="form-label">Enfermedades Cardiacas</label>
                        <select class="form-select mb-3" id="enfermedad_corazon" name="enfermedad_corazon">
                            <option value="Si">Si</option>
                            <option value="No" selected>No</option>
                        </select>



                    <label for="sindrome_piernas_inquietas" class="form-label">Sindrome Piernas Inquietas</label>
                    <select class="form-select mb-3" id="sindrome_piernas_inquietas" name="sindrome_piernas_inquietas">
                        <option value="Si">Si</option>
                        <option value="No" selected>No</option>
                    </select>
                </div>{{-- Fin --}}


                  <div class="col-md-3">{{-- Inicio --}}

                    <div class="mb-3">
                        <label for="fecha" class="form-label">Fecha</label>
                        <input type="date" class="form-control" id="fecha" name="fecha" value="{{old('fecha')}}">
                    </div>

                      <label for="frenillos" class="form-label">Frenillos</label>
                    <select class="form-select mb-3" id="frenillos" name="frenillos">
                      <option value="Si">Si</option>
                      <option value="No" selected>No</option>
                    </select>


                    <label for="anteojos" class="form-label">Anteojos</label>
                    <select class="form-select mb-3" id="anteojos" name="anteojos">
                        <option value="Si">Si</option>
                        <option value="No" selected>No</option>
                      </select>

                    <label for="otras_enfermedades" class="form-label">Otras Enfermedades</label>
                    <select class="form-select mb-3" id="otras_enfermedades" name="otras_enfermedades">
                        <option value="Si">Si</option>
                        <option value="No" selected>No</option>
                    </select>
                </div>{{-- Fin --}}

                <div class="col-md-3">{{-- Inicio --}}

                      <label for="diabetes" class="form-label">Diabetes</label>
                      <select class="form-select mb-3" id="diabetes" name="diabetes">
                          <option value="Si">Si</option>
                          <option value="No" selected>No</option>
                      </select>


                    <label for="semaforo" class="form-label">Semáforo</label>
                    <select class="form-select mb-3" id="semaforo" name="semaforo">
                        <option value="Verde">Verde</option>
                        <option value="Rojo">Rojo</option>
                        <option value="Amarillo">Amarillo</option>
                    </select>
                </div>{{-- Fin --}}
                <div class="mb-3">
                    <label for="notas" class="form-label">Notas</label>
                    <input type="text" class="form-control" id="notas" name="notas" value="{{old('notas')}}">
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
