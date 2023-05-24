@extends('home')

@section('contenido')
    <h1 class="text-left p-2">Enfermedades</h1>
    <div class="container">

        <a href="{{url('/enfermedades?buscar='.$start)}}" class="btn btn-warning mb-3">
          <ion-icon name="arrow-undo-outline"></ion-icon>
          Volver a Enfermedades
        </a>

      @role('admin')
      <div class="row justify-content-center bordeOscuro">
        <div class="parteSuperiorTablas">
            <p>Crear Enfermedades</p>
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
            <form action="{{url('/enfermedades')}}" class="row" method="post">
              @csrf
                <div class="col-md-4">{{-- Inicio --}}
                    <div class="mb-3">
                        <label for="enfermedad" class="form-label">Enfermedad</label>
                        <input type="text" class="form-control" id="enfermedad" name="enfermedad" value="{{old('enfermedad')}}">
                    </div>
                </div>{{-- Fin --}}

                <div class="col-md-4">{{-- Inicio --}}
                    <div class="mb-3">
                        <label for="medicamento" class="form-label">Medicamento</label>
                        <input type="text" class="form-control" id="medicamento" name="medicamento" value="{{old('medicamento')}}">
                    </div>

                    <div class="mb-3 d-none">
                        <label for="id_expediente" class="form-label">Expediente</label>
                        <input type="text" class="form-control" id="id_expediente" name="id_expediente" value="{{$start}}">
                    </div>
                </div>{{-- Fin --}}

                <div class="col-md-4">{{-- Inicio --}}
                    <div class="mb-3">
                        <label for="fecha" class="form-label">Fecha</label>
                        <input type="date" class="form-control" id="fecha" name="fecha" value="{{old('fecha')}}">
                    </div>
                </div>{{-- Fin --}}

                  <button type="submit" class="btn btn-primary enviar">
                    <ion-icon name="save-outline"></ion-icon>
                    Guardar
                </button>
              </form>
            </div>
        </div>
        @endrole

        @role('creador')
        @endrole
@endsection
