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
                <div class="col-md-4">{{-- Inicio --}}

                <label for="id_clinica" class="form-label">Clínica</label>
                <select class="form-select mb-3" id="id_clinica" name="id_clinica">
                    @foreach ($clinicas as $clinica)
                        <option value="{{$clinica->id}}">{{$clinica->clinica}}</option>
                    @endforeach
                </select>

                </div>

                <div class="col-md-4">{{-- Inicio --}}
                    <label for="id_expediente" class="form-label">Expediente</label>
                    <select class="form-select mb-3" id="id_expediente" name="id_expediente">
                        @foreach ($expedientes as $expediente)
                        <option value="{{$expediente->id}}">{{$expediente->nombre1}} {{$expediente->nombre2}} {{$expediente->apellido1}} {{$expediente->apellido2}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4">{{-- Inicio --}}
                    <div class="mb-3">
                        <label for="categoria_psicologica" class="form-label">Categoria Psicológica</label>
                        <input type="text" class="form-control" id="categoria_psicologica" name="categoria_psicologica" value="{{old('categoria_psicologica')}}">
                    </div>
                </div>

                <div class="col-md-6">{{-- Inicio --}}
                    <label for="id_comunidad" class="form-label">Comunidad</label>
                    <select class="form-select mb-3" id="id_comunidad" name="id_comunidad">
                        <option value="">Selecciona Comunidad</option>
                        @foreach ($comunidades as $comunidad)
                        <option value="{{$comunidad->comunidad}}">{{$comunidad->comunidad}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">{{-- Inicio --}}

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
                    <div class="col-md-4">{{-- Inicio --}}

                        <label for="id_clinica" class="form-label">Clínica</label>
                        <select class="form-select mb-3" id="id_clinica" name="id_clinica">
                            @foreach ($clinicas as $clinica)
                                <option value="{{$clinica->id}}">{{$clinica->clinica}}</option>
                            @endforeach
                        </select>

                        </div>

                        <div class="col-md-4">{{-- Inicio --}}
                            <label for="id_expediente" class="form-label">Expediente</label>
                            <select class="form-select mb-3" id="id_expediente" name="id_expediente">
                                @foreach ($expedientes as $expediente)
                                <option value="{{$expediente->id}}">{{$expediente->nombre1}} {{$expediente->nombre2}} {{$expediente->apellido1}} {{$expediente->apellido2}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4">{{-- Inicio --}}
                            <div class="mb-3">
                                <label for="categoria_psicologica" class="form-label">Categoria Psicológica</label>
                                <input type="text" class="form-control" id="categoria_psicologica" name="categoria_psicologica" value="{{old('categoria_psicologica')}}">
                            </div>
                        </div>

                        <div class="col-md-6">{{-- Inicio --}}
                            <label for="id_comunidad" class="form-label">Comunidad</label>
                            <select class="form-select mb-3" id="id_comunidad" name="id_comunidad">
                                <option value="">Selecciona Comunidad</option>
                                @foreach ($comunidades as $comunidad)
                                <option value="{{$comunidad->comunidad}}">{{$comunidad->comunidad}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">{{-- Inicio --}}

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
