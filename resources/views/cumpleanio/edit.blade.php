@extends('home')

@section('contenido')
    <h1 class="text-left p-2">Cumpleaños</h1>

    <div class="container">
        <a href="{{url('/cumpleanios')}}" class="btn btn-warning mb-3">
            <ion-icon name="arrow-undo-outline"></ion-icon>
            Volver lista de cumpleaños
        </a>

        @role('admin')
        <div class="row justify-content-center bordeOscuro">

            <div class="parteSuperiorTablas">
                <p>Editar cumpleaños</p>
                <div class="buscador">
                </div>
            </div>

        <div class="col-md-12 fs-6">

            <form action="{{url('cumpleanios/'.$datos->id)}}" class="row" method="post">
                @csrf
                {{method_field('PATCH')}}

                <div class="col-md-3">{{-- Inicio --}}
                    <label for="id_padrino" class="form-label">Padrino</label>
                    <select class="form-select mb-3" id="id_padrino" name="id_padrino">
                        @foreach ($padrinos as $padrino)
                            @foreach ($bajaPadrinos as $bajaPadrino)
                                @if ($bajaPadrino->id_padrino == $padrino->id)
                                    <h1 class="d-none">{{$valor = $bajaPadrino->id_padrino}}</h1>
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
                </div>{{-- Fin --}}

                <div class="col-md-3">{{-- Inicio --}}
                    <div class="mb-3">
                        <label for="fecha" class="form-label">Fecha</label>
                        <input type="date" class="form-control" value="{{$datos->fecha}}" id="fecha" name="fecha">
                    </div>

                </div>{{-- Fin --}}

                <div class="col-md-3">{{-- Inicio --}}
                    <div class="mb-3">
                        <label for="fecha_entrega_carta" class="form-label">Fecha Entrega Carta</label>
                        <input type="date" class="form-control" value="{{$datos->fecha_entrega_carta}}" id="fecha_entrega_carta" name="fecha_entrega_carta">
                    </div>
                </div>{{-- Fin --}}

                <div class="col-md-3">{{-- Inicio --}}
                    <div class="mb-3">
                        <label for="entrega_carta_presentacion" class="form-label">Entrega Carta Presentación</label>
                        <input type="date" class="form-control" value="{{$datos->entrega_carta_presentacion}}" id="entrega_carta_presentacion" name="entrega_carta_presentacion">
                    </div>

                </div>{{-- Fin --}}

                <div class="col-md-3">{{-- Inicio --}}
                    <div class="mb-3">
                        <label for="entrega_video" class="form-label">Entrega Video</label>
                        <input type="date" class="form-control" value="{{$datos->entrega_video}}" id="entrega_video" name="entrega_video">
                    </div>

                </div>{{-- Fin --}}

                <div class="col-md-3">{{-- Inicio --}}
                    <div class="mb-3">
                        <label for="regalo" class="form-label">Regalo</label>
                        <input type="text" class="form-control" id="regalo" name="regalo" value="{{$datos->regalo}}">
                    </div>

                </div>{{-- Fin --}}

                <div class="mb-3">
                    <label for="observaciones" class="form-label">Observaciones</label>
                    <input type="text" class="form-control" value="{{$datos->observaciones}}" id="observaciones" name="observaciones">
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
                <p>Editar cumpleaños</p>
                <div class="buscador">
                </div>
            </div>

        <div class="col-md-12 fs-6">

            <form action="{{url('cumpleanios/'.$datos->id)}}" class="row" method="post">
                @csrf
                {{method_field('PATCH')}}

                <div class="col-md-3">{{-- Inicio --}}
                    <label for="id_padrino" class="form-label">Padrino</label>
                    <select class="form-select mb-3" id="id_padrino" name="id_padrino">
                        @foreach ($padrinos as $padrino)
                            @foreach ($bajaPadrinos as $bajaPadrino)
                                @if ($bajaPadrino->id_padrino === $padrino->id)
                                    ""
                                @else
                                    @if ($padrino->id === $datos->padrinos->id)
                                        <option value="{{$padrino->id}}" selected>{{$padrino->nombre}} {{$padrino->apellido}}</option>
                                    @else
                                        <option value="{{$padrino->id}}">{{$padrino->nombre}} {{$padrino->apellido}}</option>

                                    @endif
                                @endif
                            @endforeach
                        @endforeach
                    </select>
                </div>{{-- Fin --}}

                <div class="col-md-3">{{-- Inicio --}}
                    <div class="mb-3">
                        <label for="fecha" class="form-label">Fecha</label>
                        <input type="date" class="form-control" value="{{$datos->fecha}}" id="fecha" name="fecha">
                    </div>

                </div>{{-- Fin --}}

                <div class="col-md-3">{{-- Inicio --}}
                    <div class="mb-3">
                        <label for="fecha_entrega_carta" class="form-label">Fecha Entrega Carta</label>
                        <input type="date" class="form-control" value="{{$datos->fecha_entrega_carta}}" id="fecha_entrega_carta" name="fecha_entrega_carta">
                    </div>
                </div>{{-- Fin --}}

                <div class="col-md-3">{{-- Inicio --}}
                    <div class="mb-3">
                        <label for="entrega_carta_presentacion" class="form-label">Entrega Carta Presentación</label>
                        <input type="date" class="form-control" value="{{$datos->entrega_carta_presentacion}}" id="entrega_carta_presentacion" name="entrega_carta_presentacion">
                    </div>

                </div>{{-- Fin --}}

                <div class="col-md-3">{{-- Inicio --}}
                    <div class="mb-3">
                        <label for="entrega_video" class="form-label">Entrega Video</label>
                        <input type="date" class="form-control" value="{{$datos->entrega_video}}" id="entrega_video" name="entrega_video">
                    </div>

                </div>{{-- Fin --}}

                <div class="mb-3">
                    <label for="observaciones" class="form-label">Observaciones</label>
                    <input type="text" class="form-control" value="{{$datos->observaciones}}" id="observaciones" name="observaciones">
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
