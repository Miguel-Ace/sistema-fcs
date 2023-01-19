@extends('home')

@section('contenido')
    <h1 class="text-left p-2">Médicos</h1>
    <div class="container">

      <a href="{{url('/medicos')}}" class="btn btn-warning mb-3">
        <ion-icon name="arrow-undo-outline"></ion-icon>
          Volver a lista de médicos
      </a>

      <div class="row justify-content-center bordeOscuro">
            <div class="parteSuperiorTablas">
                <p>Crear nuevo médico</p>
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
                <form action="{{url('/medicos')}}" class="row" method="post">
                    @csrf
                    <div class="col-md-3"> {{-- Inicio --}}

                      <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre')}}">
                      </div>

                      <div class="mb-3">
                        <label for="telefono" class="form-label">Telefono</label>
                        <input type="number" class="form-control" min="0" maxlength="8" id="telefono" name="telefono" value="{{old('telefono')}}">
                      </div>
                    </div>

                    <div class="col-md-3"> {{-- Inicio --}}

                      <div class="mb-3">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" value="{{old('apellido')}}">
                      </div>

                    </div>

                    <div class="col-md-3"> {{-- Inicio --}}

                      <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
                      </div>

                    </div>
                    <div class="col-md-3"> {{-- Inicio --}}

                      <div class="mb-3">
                        <label for="cedula" class="form-label">Cédula</label>
                        <input type="text" class="form-control" id="cedula" name="cedula" value="{{old('cedula')}}">
                      </div>

                    </div>

                    <div class="mb-6">
                      <label for="direccion" class="form-label">Dirección</label>
                      <input type="text" class="form-control" id="direccion" name="direccion" value="{{old('direccion')}}">
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
