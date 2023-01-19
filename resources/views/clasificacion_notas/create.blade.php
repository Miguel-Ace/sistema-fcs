@extends('home')

@section('contenido')
    <h1 class="text-left p-2">Clasificación Notas</h1>
    <div class="container">

      <a href="{{url('/clasificacion_nota')}}" class="btn btn-warning mb-3">
        <ion-icon name="arrow-undo-outline"></ion-icon>
          Volver a lista clasificación notas
      </a>

      <div class="row justify-content-center bordeOscuro">
            <div class="parteSuperiorTablas">
                <p>Crear nuevo clasifición de notas</p>
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
          <form action="{{url('/clasificacion_nota')}}" class="" method="post">
            @csrf
            <div class="col-md-5">
              <div class="mb-3">
                <label for="clasificacion_nota" class="form-label">Clasificación Nota</label>
                <input type="text" class="form-control" id="clasificacion_nota" name="clasificacion_nota" value="{{old('clasificacion_nota')}}">
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
