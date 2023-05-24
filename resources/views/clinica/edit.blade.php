@extends('home')

@section('contenido')
    <h1 class="text-left p-2">Clínica</h1>
    <div class="container">

      <a href="{{url('/clinicas')}}" class="btn btn-warning mb-3">
        <ion-icon name="arrow-undo-outline"></ion-icon>
            Volver a lista de Clínicas
      </a>

      <div class="row justify-content-center bordeOscuro">
            <div class="parteSuperiorTablas">
                <p>Editar Clínica</p>
                <div class="buscador">
                </div>
            </div>

        <div class="col-md-12 fs-6">
                <form action="{{url('clinicas/'.$datos->id)}}" class="row" method="post">
                    @csrf
                    {{method_field('PATCH')}}

                    <div class="col-md-3"> {{-- Inicio --}}
                        <div class="mb-3">
                          <label for="clinica" class="form-label">Clínica</label>
                          <input type="text" class="form-control" id="clinica" name="clinica" value="{{$datos->clinica}}">
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
