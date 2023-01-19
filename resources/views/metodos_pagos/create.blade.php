@extends('home')

@section('contenido')
    <h1 class="text-left p-2">Método De Pago</h1>
    <div class="container">

      <a href="{{url('/metodo_de_pago')}}" class="btn btn-warning mb-3">
        <ion-icon name="arrow-undo-outline"></ion-icon>
          Volver a lista método de pago
      </a>

      <div class="row justify-content-center bordeOscuro">
            <div class="parteSuperiorTablas">
                <p>Crear nuevo método de pago</p>
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
          <form action="{{url('/metodo_de_pago')}}" class="" method="post">
            @csrf
            <div class="col-md-5">
              <div class="mb-3">
                <label for="metodo_de_pago" class="form-label">Método De Pago</label>
                <input type="text" class="form-control" id="metodo_pago" name="metodo_pago" value="{{old('metodo_pago')}}">
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
