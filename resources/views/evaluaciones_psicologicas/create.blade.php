@extends('home')

@section('contenido')
    <h1 class="text-left p-2">Evaluaciones Psicológicas</h1>
    <div class="container">

        <a href="{{url('/evaluaciones_psicologicas')}}" class="btn btn-warning mb-3">
            <ion-icon name="arrow-undo-outline"></ion-icon>
            Volver a evaluaciones psicológicas
        </a>

        @role('admin')
        <div class="row justify-content-center bordeOscuro">

        <div class="parteSuperiorTablas">
            <p>Crear evaluación psicológica</p>
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
            <form action="{{url('/evaluaciones_psicologicas')}}" class="row" method="post">
                @csrf
                <div class="col-md-3">{{-- Inicio --}}

                <label for="id_medico" class="form-label">Medico</label>
                <select class="form-select mb-3" id="id_medico" name="id_medico">
                    @foreach ($medicos as $medico)
                        <option value="{{$medico->id}}">{{$medico->nombre}} {{$medico->apellido}}</option>
                    @endforeach
                </select>

                </div>

                <div class="col-md-3">{{-- Inicio --}}
                    <label for="id_expediente" class="form-label">Expediente</label>
                    <select class="form-select mb-3" id="id_expediente" name="id_expediente">
                        @foreach ($expedientes as $expediente)
                        <option value="{{$expediente->id}}">{{$expediente->nombre1}} {{$expediente->nombre2}} {{$expediente->apellido1}} {{$expediente->apellido2}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3">{{-- Inicio --}}
                    <div class="mb-3">
                        <label for="categoria_psicologica" class="form-label">Categoria Psicológica</label>
                        <input type="text" class="form-control" id="categoria_psicologica" name="categoria_psicologica" value="{{old('categoria_psicologica')}}">
                    </div>
                </div>


                <div class="col-md-3">{{-- Inicio --}}

                <label for="semaforo" class="form-label">Semaforo</label>
                <select class="form-select mb-3" id="semaforo" name="semaforo">
                    <option value="Verde">Verde</option>
                    <option value="Rojo">Rojo</option>
                    <option value="Amarillo">Amarillo</option>
                </select>

                </div>

                <div class="mb-3">
                    <label for="nota" class="form-label">Nota</label>
                    <input type="text" class="form-control" id="nota" name="nota" value="{{old('nota')}}">
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
        <div class="row justify-content-center bordeOscuro">

            <div class="parteSuperiorTablas">
                <p>Crear evaluación psicológica</p>
                <div class="buscador">
                </div>
            </div>

            <div class="col-md-12 fs-6">

                <form action="{{url('/evaluaciones_psicologicas')}}" class="row" method="post">
                    @csrf
                    <div class="col-md-3">{{-- Inicio --}}

                    <label for="id_medico" class="form-label">Medico</label>
                    <select class="form-select mb-3" id="id_medico" name="id_medico">
                        @foreach ($medicos as $medico)
                            <option value="{{$medico->id}}">{{$medico->nombre}} {{$medico->apellido}}</option>
                        @endforeach
                    </select>

                    </div>

                    <div class="col-md-3">{{-- Inicio --}}
                        <label for="id_expediente" class="form-label">Expediente</label>
                        <select class="form-select mb-3" id="id_expediente" name="id_expediente">
                            @foreach ($expedientes as $expediente)
                            <option value="{{$expediente->id}}">{{$expediente->nombre1}} {{$expediente->nombre2}} {{$expediente->apellido1}} {{$expediente->apellido2}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">{{-- Inicio --}}
                        <div class="mb-3">
                            <label for="categoria_psicologica" class="form-label">Categoria Psicológica</label>
                            <input type="text" class="form-control" id="categoria_psicologica" name="categoria_psicologica">
                        </div>
                    </div>


                    <div class="col-md-3">{{-- Inicio --}}

                    <label for="semaforo" class="form-label">Semaforo</label>
                    <select class="form-select mb-3" id="semaforo" name="semaforo">
                        <option value="Verde">Verde</option>
                        <option value="Rojo">Rojo</option>
                        <option value="Amarillo">Amarillo</option>
                    </select>

                    </div>

                    <div class="mb-3">
                        <label for="nota" class="form-label">Nota</label>
                        <input type="text" class="form-control" id="nota" name="nota">
                      </div>

                    <button type="submit" class="btn btn-primary enviar">
                        <ion-icon name="save-outline"></ion-icon>
                        Guardar
                    </button>
                </form>


                </div>
            </div>
        @endrole
    </div>
@endsection
