@extends('home')

@section('contenido')
    <h1 class="text-left p-2">Tipo Pobreza</h1>
    <div class="container">

      <a href="{{url('/tipo_pobreza')}}" class="btn btn-warning mb-3">
        <ion-icon name="arrow-undo-outline"></ion-icon>
          Volver a lista Tipo Pobreza
      </a>

      <div class="row justify-content-center bordeOscuro">
            <div class="parteSuperiorTablas">
                <p>Crear nuevo Tipo Pobreza</p>
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
          <form action="{{url('/tipo_pobreza')}}" class="" method="post">
            @csrf
            <div class="col-md-5">
              <div class="mb-3">
                <label for="tipo_pobreza" class="form-label">Tipo De Pobreza</label>
                <input type="text" class="form-control" id="tipo_pobreza" name="tipo_pobreza" value="{{old('tipo_pobreza')}}">
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
