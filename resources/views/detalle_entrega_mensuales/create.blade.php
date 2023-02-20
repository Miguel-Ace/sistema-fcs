@extends('home')

@section('contenido')
    <h1 class="text-left p-2">Detalle Entregas Mensuales</h1>
    <div class="container">

      <a href="{{url('/detalle_entregas_mensuales?buscar='.$start)}}" class="btn btn-warning mb-3">
        <ion-icon name="arrow-undo-outline"></ion-icon>
          Volver a lista de detalle Entregas Mensuales
      </a>

      <div class="row justify-content-center bordeOscuro">
            <div class="parteSuperiorTablas">
                <p>Crear nuevo Detalle Entregas Mensuales</p>
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
          <form action="{{url('/detalle_entregas_mensuales'.'/'.$start)}}" class="" method="post">
            @csrf
            <div class="col-md-5 d-none">
                <label for="id_expediente" class="form-label">Entrega Mensual</label>
                <select class="form-select mb-3" id="id_expediente" name="id_expediente">
                    @foreach ($expedientes as $expediente)
                        <option value="{{$start}}" selected>{{$expediente->nombre1}} {{$expediente->nombre2}} {{$expediente->apellido1}} {{$expediente->apellido2}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-5">
              <label for="id_tipoEntrega" class="form-label">Tipo de entrega</label>
                    <select class="form-select mb-3" id="id_tipoEntrega" name="id_tipoEntrega">
                        @foreach ($tipoEntregas as $tipoEntrega)
                            <option value="{{$tipoEntrega->id}}">{{$tipoEntrega->tipo_entrega}}</option>
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
