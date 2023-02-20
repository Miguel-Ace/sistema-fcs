@extends('home')

@section('contenido')
    <h1 class="text-left p-2">Becas</h1>
    <div class="container">

      <a href="{{url('/beca')}}" class="btn btn-warning mb-3">
        <ion-icon name="arrow-undo-outline"></ion-icon>
          Volver a lista beca
      </a>

      <div class="row justify-content-center bordeOscuro">
            <div class="parteSuperiorTablas">
                <p>Crear nueva beca</p>
                <div class="buscador">
                </div>
            </div>

        <div class="col-md-12 fs-6">
          <form action="{{url('beca/'.$datos->id)}}" class="" method="post">
            @csrf
            {{method_field('PATCH')}}

            <div class="col-md-5">
                <div class="mb-3">
                    <label for="beca" class="form-label">Beca</label>
                    <input type="text" class="form-control" value="{{$datos->beca}}" id="beca" name="beca">
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