@extends('home')

@section('contenido')
    <h1 class="text-left p-2">Grado Escolar</h1>
    <div class="container">

      <a href="{{url('/grado_escolar')}}" class="btn btn-warning mb-3">
        <ion-icon name="arrow-undo-outline"></ion-icon>
          Volver a lista de Grado Escolar
      </a>

      <div class="row justify-content-center bordeOscuro">
            <div class="parteSuperiorTablas">
                <p>Crear nuevo Grado Escolar</p>
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
          <form action="{{url('/grado_escolar')}}" class="needs-validation" method="post">
            @csrf
            <div class="col-md-5">
              <div class="mb-3">
                <label for="grado_escolar" class="form-label">Grado Escolar</label>
                <input type="text" class="form-control" id="grado_escolar" name="grado_escolar" value="{{old('grado_escolar')}}">
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
