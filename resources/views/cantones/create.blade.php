@extends('home')

@section('contenido')
    <h1 class="text-left p-2">Cantones</h1>
    <div class="container">

      <a href="{{url('/cantones')}}" class="btn btn-warning mb-3">
        <ion-icon name="arrow-undo-outline"></ion-icon>
          Volver a lista de cantones
      </a>

      <div class="row justify-content-center bordeOscuro">
            <div class="parteSuperiorTablas">
                <p>Crear nuevo canton</p>
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
          <form action="{{url('/cantones')}}" class="" method="post">
            @csrf
            <div class="col-md-5">
                <div class="mb-3">
                    <label for="provincia" class="form-label">Canton</label>
                    <input type="text" class="form-control" id="canton" name="canton" value="{{old('canton')}}">
                  </div>
            </div>

            <div class="col-md-5">
                <option selected>Selecciona La Provincia</option>
                <select class="form-select" name="id_provincia">
                    @foreach ($provincias as $provincia)
                        <option value="{{$provincia->id}}">{{$provincia->provincia}}</option>
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
