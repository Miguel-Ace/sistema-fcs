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
                <p>Editar canton</p>
                <div class="buscador">
                </div>
            </div>

        <div class="col-md-12 fs-6">
          <form action="{{url('cantones/'.$datos->id)}}" class="" method="post">
            @csrf
            {{method_field('PATCH')}}
            <div class="col-md-5">
                <div class="mb-3">
                    <label for="cantones" class="form-label">Cantones</label>
                    <input type="text" class="form-control" value="{{$datos->canton}}" id="canton" name="canton">
                </div>
            </div>

            <div class="col-md-5">
                <option selected>Selecciona La Provincia</option>
                <select class="form-select" name="id_provincia">
                    @foreach ($provincias as $provincia)
                        @if ($provincia->id === $datos->provincias->id)
                            <option value="{{$provincia->id}}" selected>{{$provincia->provincia}}</option> 
                        @else
                            <option value="{{$provincia->id}}">{{$provincia->provincia}}</option> 
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