@extends('home')

@section('contenido')
    <h1 class="text-left p-2">Barrios</h1>
    <div class="container">

      <a href="{{url('/barrios')}}" class="btn btn-warning mb-3">
        <ion-icon name="arrow-undo-outline"></ion-icon>
          Volver a lista de barrios
      </a>

      <div class="row justify-content-center bordeOscuro">
            <div class="parteSuperiorTablas">
                <p>Crear nuevo barrio</p>
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
          <form action="{{url('/barrios')}}" class="" method="post">
            @csrf
            <div class="col-md-5">
                <div class="mb-3">
                    <label for="barrio" class="form-label">Barrio</label>
                    <input type="text" class="form-control" id="barrio" name="barrio" value="{{old('barrio')}}">
                  </div>
                </div>
            <div class="col-md-5">
                <option selected>Selecciona EL Canton</option>
              <select class="form-select" name="id_canton">
                        @foreach ($cantones as $canton)
                            <option value="{{$canton->id}}">{{$canton->canton}}</option>
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
