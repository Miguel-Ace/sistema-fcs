@extends('home')

@section('contenido')
    <h1 class="text-left p-2">Banco</h1>
    <div class="container">

      <a href="{{url('/banco')}}" class="btn btn-warning mb-3">
        <ion-icon name="arrow-undo-outline"></ion-icon>
          Volver a lista banco
      </a>

      <div class="row justify-content-center bordeOscuro">
            <div class="parteSuperiorTablas">
                <p>Crear nuevo banco</p>
                <div class="buscador">
                </div>
            </div>

        <div class="col-md-12 fs-6">
          <form action="{{url('banco/'.$datos->id)}}" class="" method="post">
            @csrf
            {{method_field('PATCH')}}

            <div class="col-md-5">
                <div class="mb-3">
                    <label for="banco" class="form-label">Banco</label>
                    <input type="text" class="form-control" value="{{$datos->banco}}" id="banco" name="banco">
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