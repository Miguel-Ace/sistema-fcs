@extends('home')

@section('contenido')
    <h1 class="text-left p-2">Tipo Asistencia</h1>
    <div class="container">

      <a href="{{url('/tipo_asistencia')}}" class="btn btn-warning mb-3">
        <ion-icon name="arrow-undo-outline"></ion-icon>
          Volver a Tipo de Asistencia
      </a>

      <div class="row justify-content-center bordeOscuro">
            <div class="parteSuperiorTablas">
                <p>Crear nuevo tipo asistencia</p>
                <div class="buscador">
                </div>
            </div>

        <div class="col-md-12 fs-6">
          <form action="{{url('tipo_asistencia/'.$datos->id)}}" class="" method="post">
            @csrf
            {{method_field('PATCH')}}

            <div class="col-md-5">
                <div class="mb-3">
                    <label for="tipo_asistencia" class="form-label">Tipo Asistencia</label>
                    <input type="text" class="form-control" value="{{$datos->tipo_asistencia}}" id="tipo_asistencia" name="tipo_asistencia">
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
