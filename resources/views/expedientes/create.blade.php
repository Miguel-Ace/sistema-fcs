@extends('home')

@section('contenido')
    <h1 class="text-left p-2">Expedientes</h1>
    <div class="container">

        <a href="{{url('/expedientes')}}" class="btn btn-warning mb-3">
          <ion-icon name="arrow-undo-outline"></ion-icon>
            Volver a expedientes
        </a>

        @hasrole('admin')
        <div class="row justify-content-center bordeOscuro">
            <div class="parteSuperiorTablas">
                <p>Crear nuevo expediente</p>
                <div class="buscador">
                </div>
            </div>

            <div class="col-md-12 fs-6"> {{-- Inicio --}}
              @if ($errors->any())
                  <ul class="bg-white text-danger p-2">
                      @foreach ($errors->all() as $error)
                      <li>{{$error}}</li>
                      @endforeach
                  </ul>
              @endif
                <form action="{{url('/expedientes')}}" class="row" method="post">
                  @csrf

                  <div class="col-md-3">

                    <div class="mb-3 d-none">
                      <label for="codigo_nino" class="form-label">codigo_nino</label>
                      <input type="text" class="form-control" id="codigo_nino" name="codigo_nino" value="{{$cantidad + 1 . '-' . date('Y')}}">
                    </div>

                    <div class="mb-3">
                      <label for="nombre1" class="form-label">Primer Nombre</label>
                      <input type="text" class="form-control" id="nombre1" name="nombre1" value="{{old('nombre1')}}">
                    </div>

                    <label for="sexo" class="form-label">Sexo</label>
                    <select class="form-select mb-3" id="sexo" name="sexo">
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                    </select>

                    <label for="id_comunidad" class="form-label">Comunida</label>
                    <select class="form-select mb-3" id="id_comunidad" name="id_comunidad">
                        @foreach ($comunidades as $comunidad)
                            <option value="{{$comunidad->id}}">{{$comunidad->comunidad}}</option>
                        @endforeach
                    </select>

                    <div class="mb-3">
                      <label for="cedula" class="form-label">Cédula</label>
                      <input type="text" min="0" class="form-control" id="cedula" name="cedula" value="{{old('cedula')}}">
                    </div>

                    <label for="id_tipo_pobreza" class="form-label">Tipo Pobreza</label>
                    <select class="form-select mb-3" id="id_tipo_pobreza" name="id_tipo_pobreza">
                        @foreach ($tipoPobrezas as $tipoPobreza)
                            <option value="{{$tipoPobreza->id}}">{{$tipoPobreza->tipo_pobreza}}</option>
                        @endforeach
                    </select>

                    <div class="mb-3">
                      <label for="pp" class="form-label">PP</label>
                      <input type="text" class="form-control" id="pp" name="pp" value="{{old('pp')}}">
                    </div>

                    {{-- <label for="semaforo" class="form-label">Semáforo</label>
                      <select class="form-select mb-3" id="semaforo" name="semaforo">
                          <option value="Verde">Verde</option>
                          <option value="Rojo">Rojo</option>
                          <option value="Amarillo">Amarillo</option>
                      </select> --}}

                  </div>{{-- Fin --}}

                    <div class="col-md-3">{{-- Inicio --}}

                      <div class="mb-3">
                        <label for="nombre2" class="form-label">Segundo Nombre</label>
                        <input type="text" class="form-control" id="nombre2" name="nombre2" value="{{old('nombre2')}}">
                      </div>

                      <div class="mb-3">
                        <label for="edad" class="form-label">Edad</label>
                        <input type="number" class="form-control" id="edad" min="0" name="edad" value="{{old('edad')}}">
                      </div>

                      <label for="padrino" class="form-label">Padrino</label>
                      <select class="form-select mb-3" id="padrino" name="padrino">
                          <option value="" disabled selected>Selecciona el padrino</option>
                          @foreach ($padrinos as $padrino)
                              <option value="{{$padrino->id}}">{{$padrino->nombre . ' ' . $padrino->apellido}}</option>
                          @endforeach
                      </select>
                      
                      <div class="mb-3">
                        <label for="representantePEM" class="form-label">RepresentantePEM</label>
                        <input type="text" class="form-control" id="representantePEM" name="representantePEM" value="{{old('representantePEM')}}">
                      </div>

                    <label for="id_estado" class="form-label">Estado</label>
                    <select class="form-select mb-3" id="id_estado" name="id_estado">
                        @foreach ($estados as $estado)
                            <option value="{{$estado->id}}">{{$estado->estado}}</option>
                        @endforeach
                    </select>

                    <label for="id_barrio" class="form-label">Barrio</label>
                    <select class="form-select mb-3" id="id_barrio" name="id_barrio">
                        @foreach ($barrios as $barrio)
                            <option value="{{$barrio->id}}">{{$barrio->barrio}}</option>
                        @endforeach
                    </select>

                    <label for="talla_pantalon" class="form-label">Talla Pantalón</label>
                    <select class="form-select mb-3" id="talla_pantalon" name="talla_pantalon">
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                        <option value="2XL">2XL</option>
                    </select>

                  </div>{{-- Fin --}}

                  <div class="col-md-3">{{-- Inicio --}}

                    <div class="mb-3">
                      <label for="apellido1" class="form-label">Primer Apellido</label>
                      <input type="text" class="form-control" id="apellido1" name="apellido1" value="{{old('apellido1')}}">
                    </div>

                    <div class="mb-3">
                      <label for="escuela" class="form-label">Escuela</label>
                      <input type="text" class="form-control" id="escuela" name="escuela" value="{{old('escuela')}}">
                    </div>

                    <div class="mb-3">
                      <label for="contacto_representante" class="form-label">Contacto Representante</label>
                      <input type="number" min="0" class="form-control" id="contacto_representante" name="contacto_representante" value="{{old('contacto_representante')}}">
                    </div>

                    <label for="id_grado_escolar" class="form-label">Grado Escolar</label>
                    <select class="form-select mb-3" id="id_grado_escolar" name="id_grado_escolar">
                        @foreach ($gradoEscolares as $gradoEscolar)
                            <option value="{{$gradoEscolar->id}}">{{$gradoEscolar->grado_escolar}}</option>
                        @endforeach
                    </select>

                    <div class="mb-3">
                      <label for="nombre_encargado" class="form-label">Nombre Encargado</label>
                      <input type="text" class="form-control" id="nombre_encargado" name="nombre_encargado" value="{{old('nombre_encargado')}}">
                    </div>

                    <label for="talla_camisa" class="form-label">Talla Camisa</label>
                    <select class="form-select mb-3" id="talla_camisa" name="talla_camisa">
                        <option value="S" selected>S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                        <option value="2XL">2XL</option>
                    </select>

                    <label for="activo" class="form-label">Activo</label>
                    <select class="form-select mb-3" id="activo" name="activo">
                        <option value="Si" selected>Si</option>
                        <option value="No">No</option>
                    </select>
                    </div>{{-- Fin --}}

                    <div class="col-md-3">{{-- Inicio --}}

                      <div class="mb-3">
                        <label for="apellido2" class="form-label">Segundo Apellido</label>
                        <input type="text" class="form-control" id="apellido2" name="apellido2" value="{{old('apellido2')}}">
                      </div>

                      <label for="beca" class="form-label">beca</label>
                      <select class="form-select mb-3" id="beca" name="beca">
                          <option value="" disabled selected>Selecciona una beca</option>
                          @foreach ($becas as $beca)
                              <option value="{{$beca->beca}}">{{$beca->beca}}</option>
                          @endforeach
                      </select>

                      <div class="mb-3">
                        <label for="fecha_nacimiento" class="form-label">Fecha Nacimiento</label>
                        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="{{old('fecha_nacimiento')}}">
                      </div>

                    <label for="id_centro_educativo" class="form-label">Centro Educativo</label>
                    <select class="form-select mb-3" id="id_centro_educativo" name="id_centro_educativo">
                        @foreach ($centroEducativos as $centroEducativo)
                            <option value="{{$centroEducativo->id}}">{{$centroEducativo->centro_educativo}}</option>
                        @endforeach
                    </select>


                    <div class="mb-3">
                      <label for="telefono_encargado" class="form-label">Telefono Encargado</label>
                      <input type="number" min="0" class="form-control" id="telefono_encargado" name="telefono_encargado" value="{{old('telefono_encargado')}}">
                    </div>

                    <div class="mb-3">
                      <label for="talla_zapato" class="form-label">talla_zapato</label>
                      <input type="number" min="0" max="46" class="form-control" id="talla_zapato" name="talla_zapato" value="{{old('talla_zapato')}}">
                    </div>

                  </div>{{-- Fin --}}

                  <button type="submit" class="btn btn-primary enviar">
                    <ion-icon name="save-outline"></ion-icon>
                    Guardar
                  </button>
              </form>
            </div>
        </div>
        @endrole

        @hasrole('creador')
        @endrole

    </div>
@endsection

