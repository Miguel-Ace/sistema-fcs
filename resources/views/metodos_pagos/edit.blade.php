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
                <p>Editar método de pago</p>
                <div class="buscador">
                </div>
            </div>

        <div class="col-md-12 fs-6">
          <form action="{{url('metodo_de_pago/'.$datos->id)}}" class="" method="post">
            @csrf
            {{method_field('PATCH')}}
            <div class="col-md-5">
                <div class="mb-3">
                    <label for="metodo_de_pago" class="form-label">metodo_de_pago</label>
                    <input type="text" class="form-control" value="{{$datos->metodo_pago}}" id="metodo_pago" name="metodo_pago">
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