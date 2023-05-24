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
              <div class="col-md-4">{{-- Inicio --}}
                      <label for="id_expediente" class="form-label">Expediente PME</label>
                      <select class="form-select mb-3" id="id_expediente" name="id_expediente">
                          @foreach ($expedientes as $expediente)
                              <option value="{{$expediente->id}}">{{$expediente->nombre1}} {{$expediente->nombre2}} {{$expediente->apellido1}} {{$expediente->apellido2}}</option>
                          @endforeach
                      </select>

                      <div class="mb-3">
                        <label for="peso" class="form-label">Peso</label>
                        <input type="number" class="form-control" id="peso" name="peso" min="0" step=".1" value="{{old('peso')}}">
                      </div>

                    </div>{{-- Fin --}}

                    <div class="col-md-4">{{-- Inicio --}}
                        <label for="id_clinica" class="form-label">Clínica</label>
                        <select class="form-select mb-3" id="id_clinica" name="id_clinica">
                            @foreach ($clinicas as $clinica)
                                <option value="{{$clinica->id}}">{{$clinica->clinica}}</option>
                            @endforeach
                        </select>

                        <div class="mb-3">
                            <label for="talla" class="form-label">Talla</label>
                            <input type="number" class="form-control" id="talla" min="0" step=".1" name="talla" value="{{old('talla')}}">
                        </div>
                    </div>{{-- Fin --}}


                <div class="col-md-4">{{-- Inicio --}}
                    <div class="mb-3">
                        <label for="fecha" class="form-label">Fecha</label>
                        <input type="date" class="form-control" id="fecha" name="fecha" value="{{old('fecha')}}">
                    </div>

                    <div class="mb-3">
                        <label for="signos" class="form-label">Signos</label>
                        <input type="number" class="form-control" id="signos" min="0" step=".1" name="signos" value="{{old('signos')}}">
                    </div>
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
