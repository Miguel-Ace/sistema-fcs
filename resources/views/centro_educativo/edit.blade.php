@extends('home')

@section('contenido')
    <h1 class="text-left p-2">Centro Educativo</h1>
    <div class="container">

      <a href="{{url('/centro_educativo')}}" class="btn btn-warning mb-3">
        <ion-icon name="arrow-undo-outline"></ion-icon>
          Volver a lista centro educativo
      </a>

      <div class="row justify-content-center bordeOscuro">
            <div class="parteSuperiorTablas">
                <p>Editar centro educativo</p>
                <div class="buscador">
                </div>
            </div>

        <div class="col-md-12 fs-6">
          <form action="{{url('centro_educativo/'.$datos->id)}}" class="" method="post">
            @csrf
            {{method_field('PATCH')}}
            <div class="col-md-5">
                <div class="mb-3">
                    <label for="centro_educativo" class="form-label">Centro Educativo</label>
                    <input type="text" class="form-control" value="{{$datos->centro_educativo}}" id="centro_educativo" name="centro_educativo">
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