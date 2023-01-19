@extends('home')

@section('contenido')
    <h1 class="text-left p-2">Entregas Mensuales</h1>

    <div class="container">
        <a href="{{url('/entregas_mensuales')}}" class="btn btn-warning mb-3">
            <ion-icon name="arrow-undo-outline"></ion-icon>
            Volver Entregas Mensuales
        </a>

        @role('admin')
        <div class="row justify-content-center bordeOscuro">

            <div class="parteSuperiorTablas">
                <p>Editar entrega mensual</p>
                <div class="buscador">
                </div>
            </div>

            <div class="col-md-12 fs-6">

                <form action="{{url('entregas_mensuales/'.$datos->id)}}" class="row" method="post">
                    @csrf
                    {{method_field('PATCH')}}

                    <div class="col-md-3">{{-- Inicio --}}
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

                    </div>{{-- Fin --}}

                    <div class="col-md-3">{{-- Inicio --}}

                        <label for="id_padrino" class="form-label">Padrino</label>
                        <select class="form-select mb-3" id="id_padrino" name="id_padrino">
                            @foreach ($padrinos as $padrino)
                                @foreach ($Bajapadrinos as $Bajapadrino)
                                    @if ($Bajapadrino->id_padrino == $padrino->id)
                                        {{$valor = $Bajapadrino->id_padrino}}
                                    @endif
                                @endforeach

                                @if ($valor == $padrino->id)

                                @else
                                    @if ($padrino->id === $datos->padrinos->id)
                                        <option value="{{$padrino->id}}" selected>{{$padrino->nombre}} {{$padrino->apellido}}</option>
                                    @else
                                        <option value="{{$padrino->id}}">{{$padrino->nombre}} {{$padrino->apellido}}</option>
                                    @endif
                                @endif

                            @endforeach
                        </select>

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
                            <label for="fecha" class="form-label">Fecha</label>
                            <input type="date" class="form-control" value="{{$datos->fecha}}" id="fecha" name="fecha">
                        </div>

                        <div class="mb-3">
                            <label for="talla_zapato" class="form-label">talla_zapato</label>
                            <input type="number" min="0" max="46" class="form-control" value="{{$datos->talla_zapato}}" id="talla_zapato" name="talla_zapato">
                          </div>
                    </div>{{-- Fin --}}

                    <div class="col-md-3">{{-- Inicio --}}

                        <div class="mb-3">
                            <label for="edad" class="form-label">Edad</label>
                            <input type="number" min="0" class="form-control" value="{{$datos->edad}}" id="edad" name="edad">
                        </div>

                        <div class="mb-3">
                            <label for="grado_escolar" class="form-label">Grado Escolar</label>
                            <input type="text" class="form-control" id="grado_escolar" value="{{$datos->grado_escolar}}" name="grado_escolar">
                        </div>


                    </div>{{-- Fin --}}

                    <div class="mb-3">
                        <label for="observaciones" class="form-label">Observaciones</label>
                        <input type="text" class="form-control" id="observaciones" value="{{$datos->observaciones}}" name="observaciones">
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
        <div class="row justify-content-center bordeOscuro">

            <div class="parteSuperiorTablas">
                <p>Crear entrega mensual</p>
                <div class="buscador">
                </div>
            </div>

            <div class="col-md-12 fs-6">

                <form action="{{url('entregas_mensuales/'.$datos->id)}}" class="row" method="post">
                    @csrf
                    {{method_field('PATCH')}}

                    <div class="col-md-3">{{-- Inicio --}}
                        <label for="id_expediente" class="form-label">Expediente</label>
                        <select class="form-select mb-3" id="id_expediente" name="id_expediente">
                            <option value="" selected>Seleccione Expediente</option>
                            @foreach ($expedientes as $expediente)
                                @if ($expediente->id === $datos->expedientes->id)
                                    <option value="{{$expediente->id}}" selected>{{$expediente->id}}</option>
                                @else
                                    <option value="{{$expediente->id}}">{{$expediente->id}}</option>
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

                    </div>{{-- Fin --}}

                    <div class="col-md-3">{{-- Inicio --}}

                        <label for="id_padrino" class="form-label">Padrino</label>
                        <select class="form-select mb-3" id="id_padrino" name="id_padrino">
                            @foreach ($padrinos as $padrino)
                                @if ($padrino->id === $datos->padrinos->id)
                                    <option value="{{$padrino->id}}" selected>{{$padrino->nombre}}</option>
                                @else
                                    <option value="{{$padrino->id}}">{{$padrino->nombre}}</option>
                                @endif
                            @endforeach
                        </select>

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
                            <label for="fecha" class="form-label">Fecha</label>
                            <input type="date" class="form-control" value="{{$datos->fecha}}" id="fecha" name="fecha">
                        </div>

                        <div class="mb-3">
                            <label for="talla_zapato" class="form-label">talla_zapato</label>
                            <input type="number" min="0" max="46" class="form-control" value="{{$datos->talla_zapato}}" id="talla_zapato" name="talla_zapato">
                          </div>
                    </div>{{-- Fin --}}

                    <div class="col-md-3">{{-- Inicio --}}

                        <div class="mb-3">
                            <label for="edad" class="form-label">Edad</label>
                            <input type="number" min="0" class="form-control" value="{{$datos->edad}}" id="edad" name="edad">
                        </div>

                        <div class="mb-3">
                            <label for="grado_escolar" class="form-label">Grado Escolar</label>
                            <input type="text" class="form-control" id="grado_escolar" value="{{$datos->grado_escolar}}" name="grado_escolar">
                        </div>


                    </div>{{-- Fin --}}

                    <div class="mb-3">
                        <label for="observaciones" class="form-label">Observaciones</label>
                        <input type="text" class="form-control" id="observaciones" value="{{$datos->observaciones}}" name="observaciones">
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
