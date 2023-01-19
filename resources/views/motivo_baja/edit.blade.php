@extends('home')

@section('contenido')
    <h1 class="text-left p-2">Motivo Bajas</h1>
    <div class="container">

      <a href="{{url('/motivo_baja')}}" class="btn btn-warning mb-3">
        <ion-icon name="arrow-undo-outline"></ion-icon>
          Volver a lista Motivo Baja
      </a>

      <div class="row justify-content-center bordeOscuro">
            <div class="parteSuperiorTablas">
                <p>Editar motivo bajas</p>
                <div class="buscador">
                </div>
            </div>

        <div class="col-md-12 fs-6">
          <form action="{{url('motivo_baja/'.$datos->id)}}" class="" method="post">
            @csrf
            {{method_field('PATCH')}}
            <div class="col-md-5">
                <div class="mb-3">
                    <label for="motivo_baja" class="form-label">Motivo Baja</label>
                    <input type="text" class="form-control" value="{{$datos->motivo_baja}}" id="motivo_baja" name="motivo_baja">
                  </div>

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