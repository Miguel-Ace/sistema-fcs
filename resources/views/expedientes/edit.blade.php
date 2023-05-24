@extends('home')

@section('contenido')
    <h1 class="text-left p-2">Expediente</h1>
    <div class="container">

        <a href="{{url('/expedientes')}}" class="btn btn-warning mb-3">
          <ion-icon name="arrow-undo-outline"></ion-icon>
            Volver a expedientes
        </a>

        @hasrole('admin')
        <div class="row justify-content-center bordeOscuro">
            <div class="parteSuperiorTablas">
                <p>Editar los expedientes</p>
                <div class="buscador">
                </div>
            </div>

            <div class="col-md-12 fs-6"> {{-- Inicio --}}
                <form action="{{url('expedientes/'.$datos->id)}}" class="row" method="post">
                  @csrf
                  {{method_field('PATCH')}}

                  <div class="col-md-3">

                    <div class="mb-3 d-none">
                      <label for="codigo_nino" class="form-label">codigo_nino</label>
                      <input type="text" class="form-control" id="codigo_nino" name="codigo_nino" value="{{$datos->codigo_nino}}">
                    </div>

                    <div class="mb-3">
                      <label for="nombre1" class="form-label">Primer Nombre</label>
                      <input type="text" class="form-control" value="{{$datos->nombre1}}" id="nombre1" name="nombre1">
                    </div>

                    <label for="sexo" class="form-label">Sexo</label>
                      <select class="form-select mb-3" id="sexo" name="sexo">
                          @if ($datos->sexo === "Masculino")
                            <option value="Masculino" selected>Masculino</option>
                            <option value="Femenino">Femenino</option>
                          @else
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino" selected>Femenino</option>
                          @endif
                      </select>

                    <label for="id_comunidad" class="form-label">Comunida</label>
                      <select class="form-select mb-3" id="id_comunidad" name="id_comunidad">
                          <option selected>Selecciona una comunidad</option>
                          @foreach ($comunidades as $comunidad)
                            @if ($comunidad->id === $datos->comunidades->id)
                              <option value="{{$comunidad->id}}" selected>{{$comunidad->comunidad}}</option>
                            @else
                              <option value="{{$comunidad->id}}">{{$comunidad->comunidad}}</option>
                            @endif
                          @endforeach
                      </select>

                      <div class="mb-3">
                        <label for="cedula" class="form-label">Cédula</label>
                        <input type="text" min="0" class="form-control" value="{{$datos->cedula}}" id="cedula" name="cedula">
                      </div>

                      <label for="id_tipo_pobreza" class="form-label">Tipo Pobreza</label>
                      <select class="form-select mb-3" id="id_tipo_pobreza" name="id_tipo_pobreza">
                          <option selected>Selecciona Tipo Pobreza</option>
                          @foreach ($tipoPobrezas as $tipoPobreza)
                            @if ($tipoPobreza->id === $datos->tipo_pobrezas->id)
                              <option value="{{$tipoPobreza->id}}" selected>{{$tipoPobreza->tipo_pobreza}}</option>
                            @else
                              <option value="{{$tipoPobreza->id}}">{{$tipoPobreza->tipo_pobreza}}</option>
                            @endif
                          @endforeach
                      </select>

                    <div class="mb-3">
                      <label for="pp" class="form-label">PP</label>
                      <input type="text" class="form-control" value="{{$datos->pp}}" id="pp" name="pp">
                    </div>

                    {{-- <label for="semaforo" class="form-label">Semáforo</label>
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
                            </select> --}}

                  </div>{{-- Fin --}}

                    <div class="col-md-3">{{-- Inicio --}}

                      <div class="mb-3">
                        <label for="nombre2" class="form-label">Segundo Nombre</label>
                        <input type="text" class="form-control" value="{{$datos->nombre2}}" id="nombre2" name="nombre2">
                      </div>

                      {{-- <div class="mb-3">
                        <label for="edad" class="form-label">Edad</label>
                        <input type="number" class="form-control" id="edad" min="0" name="edad" value="{{$datos->edad}}">
                      </div> --}}

                      <label for="padrino" class="form-label">Padrino</label>
                      <select class="form-select mb-3" id="padrino" name="padrino">
                          <option value="" disabled>Selecciona el padrino</option>
                          @foreach ($padrinos as $padrino)
                            @if ($padrino->id == $datos->padrino)
                              <option value="{{$padrino->id}}" selected>{{$padrino->nombre . ' ' . $padrino->apellido}}</option>
                            @else
                              <option value="{{$padrino->id}}">{{$padrino->nombre . ' ' . $padrino->apellido}}</option>
                            @endif
                          @endforeach
                      </select>

                      {{-- <div class="mb-3">
                        <label for="representantePEM" class="form-label">RepresentantePEM</label>
                        <input type="text" class="form-control" value="{{$datos->representantePEM}}" id="representantePEM" name="representantePEM">
                      </div> --}}

                      <label for="id_estado" class="form-label">Estado</label>
                      <select class="form-select mb-3" id="id_estado" name="id_estado">
                          <option selected>Selecciona un Estado</option>
                          @foreach ($estados as $estado)
                            @if ($estado->id === $datos->estados->id)
                              <option value="{{$estado->id}}" selected>{{$estado->estado}}</option>
                            @else
                              <option value="{{$estado->id}}">{{$estado->estado}}</option>
                            @endif
                          @endforeach
                      </select>



                      <label for="id_barrio" class="form-label">Barrio</label>
                      <select class="form-select mb-3" id="id_barrio" name="id_barrio">
                          <option selected>Selecciona un Barrio</option>
                          @foreach ($barrios as $barrio)
                            @if ($barrio->id === $datos->barrios->id)
                              <option value="{{$barrio->id}}" selected>{{$barrio->barrio}}</option>
                            @else
                              <option value="{{$barrio->id}}">{{$barrio->barrio}}</option>
                            @endif
                          @endforeach
                      </select>

                      <label for="talla_pantalon" class="form-label">Talla Pantalón</label>
                      <select class="form-select mb-3" id="talla_pantalon" name="talla_pantalon">
                          @if ($datos->talla_pantalon === "S")
                          <option value="S" selected>S</option>
                          <option value="M">M</option>
                          <option value="L">L</option>
                          <option value="XL">XL</option>
                          <option value="2XL">2XL</option>

                          @elseif ($datos->talla_pantalon === "M")
                          <option value="S">S</option>
                          <option value="M" selected>M</option>
                          <option value="L">L</option>
                          <option value="XL">XL</option>
                          <option value="2XL">2XL</option>

                          @elseif ($datos->talla_pantalon === "L")
                          <option value="S">S</option>
                          <option value="M">M</option>
                          <option value="L" selected>L</option>
                          <option value="XL">XL</option>
                          <option value="2XL">2XL</option>

                          @elseif ($datos->talla_pantalon === "XL")
                          <option value="S">S</option>
                          <option value="M">M</option>
                          <option value="L">L</option>
                          <option value="XL" selected>XL</option>
                          <option value="2XL">2XL</option>

                          @else
                          <option value="S">S</option>
                          <option value="M">M</option>
                          <option value="L">L</option>
                          <option value="XL">XL</option>
                          <option value="2XL" selected>2XL</option>
                          @endif
                      </select>

                      <label for="activo" class="form-label">Activo</label>
                      <select class="form-select mb-3" id="activo" name="activo">
                          @if ($datos->activo === "Si")
                            <option value="Si" selected>Si</option>
                            <option value="No">No</option>
                          @else
                            <option value="Si">Si</option>
                            <option value="No" selected>No</option>
                          @endif
                      </select>
                  </div>{{-- Fin --}}

                  <div class="col-md-3">{{-- Inicio --}}

                    <div class="mb-3">
                      <label for="apellido1" class="form-label">Primer Apellido</label>
                      <input type="text" class="form-control" value="{{$datos->apellido1}}" id="apellido1" name="apellido1">
                    </div>

                    <div class="mb-3">
                      <label for="escuela" class="form-label">Escuela</label>
                      <input type="text" class="form-control" id="escuela" name="escuela" value="{{$datos->escuela}}">
                    </div>

                    <div class="mb-3">
                      <label for="contacto_representante" class="form-label">Contacto PME</label>
                      <input type="number" min="0" class="form-control" value="{{$datos->contacto_representante}}" id="contacto_representante" name="contacto_representante">
                    </div>

                    <label for="id_grado_escolar" class="form-label">Grado Escolar</label>
                      <select class="form-select mb-3" id="id_grado_escolar" name="id_grado_escolar">
                          <option selected>Selecciona El Grado Escolar</option>
                          @foreach ($gradoEscolares as $gradoEscolar)
                            @if ($gradoEscolar->id === $datos->grados_escolares->id)
                              <option value="{{$gradoEscolar->id}}" selected>{{$gradoEscolar->grado_escolar}}</option>
                            @else
                              <option value="{{$gradoEscolar->id}}">{{$gradoEscolar->grado_escolar}}</option>
                            @endif
                          @endforeach
                      </select>

                      <div class="mb-3">
                        <label for="nombre_encargado" class="form-label">Nombre Encargado</label>
                        <input type="text" class="form-control" value="{{$datos->nombre_encargado}}" id="nombre_encargado" name="nombre_encargado">
                      </div>

                    <label for="talla_camisa" class="form-label">Talla Camisa</label>
                      <select class="form-select mb-3" id="talla_camisa" name="talla_camisa">
                        @if ($datos->talla_camisa === "S")
                        <option value="S" selected>S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                        <option value="2XL">2XL</option>

                        @elseif ($datos->talla_camisa === "M")
                        <option value="S">S</option>
                        <option value="M" selected>M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                        <option value="2XL">2XL</option>

                        @elseif ($datos->talla_camisa === "L")
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L" selected>L</option>
                        <option value="XL">XL</option>
                        <option value="2XL">2XL</option>

                        @elseif ($datos->talla_camisa === "XL")
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL" selected>XL</option>
                        <option value="2XL">2XL</option>

                        @else
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                        <option value="2XL" selected>2XL</option>
                        @endif
                      </select>


                    </div>{{-- Fin --}}

                    <div class="col-md-3">{{-- Inicio --}}

                      <div class="mb-3">
                        <label for="apellido2" class="form-label">Segundo Apellido</label>
                        <input type="text" class="form-control" value="{{$datos->apellido2}}" id="apellido2" name="apellido2">
                      </div>

                      <label for="beca" class="form-label">beca</label>
                      <select class="form-select mb-3" id="beca" name="beca">
                          <option value="" disabled selected>Selecciona una beca</option>
                          @foreach ($becas as $beca)
                            @if ($beca->beca === $datos->beca)
                              <option value="{{$beca->beca}}" selected>{{$beca->beca}}</option>
                            @else
                              <option value="{{$beca->beca}}">{{$beca->beca}}</option>
                            @endif
                          @endforeach
                      </select>

                      <div class="mb-3">
                        <label for="fecha_nacimiento" class="form-label">Fecha Nacimiento</label>
                        <input type="date" class="form-control" value="{{$datos->fecha_nacimiento}}" id="fecha_nacimiento" name="fecha_nacimiento">
                      </div>

                    <label for="id_centro_educativo" class="form-label">Centro Educativo</label>
                      <select class="form-select mb-3" id="id_centro_educativo" name="id_centro_educativo">
                          <option selected>Selecciona El Centro Educativo</option>
                          @foreach ($centroEducativos as $centroEducativo)
                            @if ($centroEducativo->id === $datos->centro_educativos->id)
                              <option value="{{$centroEducativo->id}}" selected>{{$centroEducativo->centro_educativo}}</option>
                            @else
                              <option value="{{$centroEducativo->id}}">{{$centroEducativo->centro_educativo}}</option>
                            @endif
                          @endforeach
                      </select>


                      <div class="mb-3">
                        <label for="telefono_encargado" class="form-label">Telefono Encargado</label>
                        <input type="number" min="0" class="form-control" value="{{$datos->telefono_encargado}}" id="telefono_encargado" name="telefono_encargado">
                      </div>

                      <div class="mb-3">
                        <label for="talla_zapato" class="form-label">talla_zapato</label>
                        <input type="number" min="0" max="46" class="form-control" value="{{$datos->talla_zapato}}" id="talla_zapato" name="talla_zapato">
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

        @hasrole('editor')

        @endrole

    </div>
@endsection
