@extends('home')

@section('contenido')
    <h1 class="text-left p-2">Detalle Entregas Mensuales</h1>
    <div class="container">

      <a href="{{url('/detalle_entregas_mensuales')}}" class="btn btn-warning mb-3">
        <ion-icon name="arrow-undo-outline"></ion-icon>
          Volver a lista de detalle Entregas Mensuales
      </a>

      <div class="row justify-content-center bordeOscuro">
            <div class="parteSuperiorTablas">
                <p>Editar Detalle Entregas Mensuales</p>
                <div class="buscador">
                </div>
            </div>

        <div class="col-md-12 fs-6">
          <form action="{{url('detalle_entregas_mensuales/'.$datos->id)}}" class="" method="post">
            @csrf
            {{method_field('PATCH')}}
            <div class="col-md-5">
                <label for="id_entregaMensual" class="form-label">Entrega Mensual</label>
                    {{-- <select class="form-select mb-3" id="id_entregaMensual" name="id_entregaMensual">
                        @foreach ($entregaMensuales as $entregaMensual)
                            @if ($entregaMensual->id === $datos->entregas_mensuales->id)
                            <option value="{{$entregaMensual->id}}" selected>{{$entregaMensual->id}}</option>
                            @else
                            <option value="{{$entregaMensual->id}}">{{$entregaMensual->id}}</option>
                            @endif
                        @endforeach
                    </select> --}}

                    <select class="form-select mb-3" id="id_expediente" name="id_expediente">
                        @foreach ($expedientes as $expediente)
                            @if ($expediente->id === $datos->expedientes->id)
                                <option value="{{$expediente->id}}" selected>{{$expediente->nombre1}} {{$expediente->nombre2}} {{$expediente->apellido1}} {{$expediente->apellido2}}</option>
                            @else
                                <option value="{{$expediente->id}}">{{$expediente->nombre1}} {{$expediente->nombre2}} {{$expediente->apellido1}} {{$expediente->apellido2}}</option>
                            @endif
                        @endforeach
                    </select>
            </div>

            <div class="col-md-5">
                <label for="id_tipoEntrega" class="form-label">Tipo de entrega</label>
                <select class="form-select mb-3" id="id_tipoEntrega" name="id_tipoEntrega">
                    @foreach ($tipoEntregas as $tipoEntrega)
                        @if ($tipoEntrega->id == $datos->tipo_entregas->id)
                            <option value="{{$tipoEntrega->id}}" selected>{{$tipoEntrega->tipo_entrega}}</option>
                        @else
                            <option value="{{$tipoEntrega->id}}">{{$tipoEntrega->tipo_entrega}}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary enviar">
              <ion-icon name="save-outline"></ion-icon>
              Guardar
            </button>
        </form>


            </div>
        </div>


    </div>
@endsection
