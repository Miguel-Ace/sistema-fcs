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
                <p>Editar barrio</p>
                <div class="buscador">
                </div>
            </div>

        <div class="col-md-12 fs-6">
          <form action="{{url('barrios/'.$datos->id)}}" class="" method="post">
            @csrf
            {{method_field('PATCH')}}
            <div class="col-md-5">
                <div class="mb-3">
                    <label for="barrio" class="form-label">Barrio</label>
                    <input type="text" class="form-control" value="{{$datos->barrio}}" id="barrio" name="barrio">
                </div>
            </div>

            <div class="col-md-5">
                <option selected>Selecciona EL Canton</option>
                <select class="form-select" name="id_canton">
                    <option selected>Selecciona EL Canton</option>
                    @foreach ($cantones as $canton)
                        @if ($canton->id === $datos->cantones->id)
                            <option value="{{$canton->id}}" selected>{{$canton->canton}}</option> 
                        @else
                            <option value="{{$canton->id}}">{{$canton->canton}}</option> 
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