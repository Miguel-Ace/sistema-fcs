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
                <p>Crear entrega mensual</p>
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
                <form action="{{url('/entregas_mensuales')}}" class="row" method="post">
                    @csrf

                    <div class="col-md-3">{{-- Inicio --}}

                        <label for="id_expediente" class="form-label">Expediente</label>
                        <select class="form-select mb-3" id="id_expediente" name="id_expediente">
                            <option value="" disabled selected>Seleccione un expediente</option>
                            @foreach ($expedientes as $expediente)
                                <option value="{{$expediente->id}}">{{$expediente->nombre1}} {{$expediente->nombre2}} {{$expediente->apellido1}} {{$expediente->apellido2}}</option>
                            @endforeach
                        </select>

                        <label for="talla_pantalon" class="form-label">Talla Pantalón</label>
                        <select class="form-select mb-3" id="talla_pantalon" name="talla_pantalon">
                            <option value="S" selected>S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                            <option value="2XL">2XL</option>
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
                                    <option value="{{$padrino->id}}" class="d-none">{{$padrino->nombre . ' ' . $padrino->apellido}}</option>
                                @endif
                            @endforeach
                        </select>

                        <label for="talla_camisa" class="form-label">Talla Camisa</label>
                        <select class="form-select mb-3" id="talla_camisa" name="talla_camisa">
                            <option value="S" selected>S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                            <option value="2XL">2XL</option>
                        </select>

                    </div>{{-- Fin --}}

                    <div class="col-md-3">{{-- Inicio --}}

                        <div class="mb-3">
                            <label for="fecha" class="form-label">Fecha</label>
                            <input type="date" class="form-control" id="fecha" name="fecha" value="{{old('fecha')}}">
                        </div>

                        <div class="mb-3">
                            <label for="talla_zapato" class="form-label">talla_zapato</label>
                            <input type="number" min="0" max="46" class="form-control" id="talla_zapato" name="talla_zapato" value="{{old('talla_zapato')}}">
                        </div>

                    </div>{{-- Fin --}}

                    <div class="col-md-3">{{-- Inicio --}}

                        <div class="mb-3">
                            <label for="edad" class="form-label">Edad</label>
                            <input type="number" min="0" class="form-control" id="edad" name="edad" value="{{old('edad')}}">
                        </div>

                        <label for="grado_escolar" class="form-label">Grado Escolar</label>
                        <select class="form-select" name="grado_escolar">
                            @foreach ($gradoescolars as $gradoescolar)
                                <option value="{{$gradoescolar->grado_escolar}}">{{$gradoescolar->grado_escolar}}</option>
                            @endforeach
                        </select>

                    </div>{{-- Fin --}}

                    <div class="mb-3">
                        <label for="observaciones" class="form-label">Observaciones</label>
                        <input type="text" class="form-control" id="observaciones" name="observaciones" value="{{old('observaciones')}}">
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
    </div>

    <script>
        const expediente = document.getElementById('id_expediente');
        const padrino = document.getElementById('id_padrino');
        
        expediente.onclick = (e) => {
            let tablaExpedientes = JSON.parse('{!! json_encode($expedientes) !!}');
            let valor = expediente.value;
            tablaExpedientes.forEach(element => {
                let idExpediente = element.id;
                let padrinoExpediente = element.padrino;
                if (valor == idExpediente) {
                    // console.log(idExpediente);
                    // console.log(padrino.innerText);
                    padrino.value = padrinoExpediente;
                }
            });
        }
    </script>
@endsection
