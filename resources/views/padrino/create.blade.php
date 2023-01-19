@extends('home')

@section('contenido')
    <h1 class="text-left p-2">Padrinos</h1>

    <div class="container">
        <a href="{{url('/padrinos')}}" class="btn btn-warning mb-3">
            <ion-icon name="arrow-undo-outline"></ion-icon>
            Volver Lista de Padrinos
        </a>

        @role('admin')
      <div class="row justify-content-center bordeOscuro">

        <div class="parteSuperiorTablas">
            <p>Crear Padrino</p>
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
              <form action="{{url('/padrinos')}}" class="row" method="post">
                  @csrf

                  <div class="col-md-3">
                      <div class="mb-3">
                          <label for="nombre" class="form-label">Nombre</label>
                          <input type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre')}}">
                      </div>

                      <div class="mb-3">
                        <label for="correo" class="form-label">Correo</label>
                        <input type="email" class="form-control" id="correo" name="correo" value="{{old('correo')}}">
                    </div>

                    <div class="mb-3">
                        <label for="fecha_nacimiento" class="form-label">Fecha Nacimiento</label>
                        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="{{old('fecha_nacimiento')}}">
                    </div>
                  </div>

                  <div class="col-md-3">
                      <div class="mb-3">
                          <label for="apellido" class="form-label">Apellido</label>
                          <input type="text" class="form-control" id="apellido" name="apellido" value="{{old('apellido')}}">
                      </div>

                      <div class="mb-3">
                        <label for="tipo" class="form-label">Tipo</label>
                        <input type="text" class="form-control" id="tipo" name="tipo" value="{{old('tipo')}}">
                    </div>

                    <label for="id_metodo_pago" class="form-label">Método Pago</label>
                      <select class="form-select mb-3" id="id_metodo_pago" name="id_metodo_pago">
                          @foreach ($metodoPagos as $metodoPago)
                              <option value="{{$metodoPago->id}}">{{$metodoPago->metodo_pago}}</option>
                          @endforeach
                      </select>
                </div>

                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="number" min="0" class="form-control" id="telefono" name="telefono" value="{{old('telefono')}}">
                    </div>



                    <label for="id_banco" class="form-label">Banco</label>
                      <select class="form-select mb-3" id="id_banco" name="id_banco">
                          @foreach ($bancos as $banco)
                              <option value="{{$banco->id}}">{{$banco->banco}}</option>
                          @endforeach
                      </select>
                </div>

                <div class="col-md-3">

                    <div class="mb-3">
                        <label for="fecha_inicio" class="form-label">Fecha Inicial</label>
                        <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" value="{{old('fecha_inicio')}}">
                    </div>

                    <div class="mb-3">
                        <label for="fecha_final" class="form-label">Fecha Final</label>
                        <input type="date" class="form-control" id="fecha_final" name="fecha_final" value="{{old('fecha_final')}}">
                    </div>

                </div>
                <div class="mb-3">
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
        @endrole


        @role('creador')
        @endrole
    </div>
@endsection
