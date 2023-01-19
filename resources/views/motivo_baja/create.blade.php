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
                <p>Crear nuevo motivo bajas</p>
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
          <form action="{{url('/motivo_baja')}}" class="" method="post">
            @csrf
            <div class="col-md-5">
              <div class="mb-3">
                <label for="motivo_baja" class="form-label">Motivo de Baja</label>
                <input type="text" class="form-control" id="motivo_baja" name="motivo_baja" value="{{old('motivo_baja')}}">
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
