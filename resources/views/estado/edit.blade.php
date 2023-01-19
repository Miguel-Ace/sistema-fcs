@extends('home')

@section('contenido')
    <h1 class="text-left p-2">Estado</h1>
    <div class="container">

      <a href="{{url('/estado')}}" class="btn btn-warning mb-3">
        <ion-icon name="arrow-undo-outline"></ion-icon>
          Volver a lista de estado
      </a>

      <div class="row justify-content-center bordeOscuro">
            <div class="parteSuperiorTablas">
                <p>Crear nuevo estado</p>
                <div class="buscador">
                </div>
            </div>

        <div class="col-md-12 fs-6">
          <form action="{{url('estado/'.$datos->id)}}" class="" method="post">
            @csrf
            {{method_field('PATCH')}}
            <div class="col-md-5">
                <div class="mb-3">
                    <label for="estado" class="form-label">Estado</label>
                    <input type="text" class="form-control" value="{{$datos->estado}}" id="estado" name="estado">
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