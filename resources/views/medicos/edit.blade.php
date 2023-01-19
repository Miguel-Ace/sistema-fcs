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
                <p>Editar médico</p>
                <div class="buscador">
                </div>
            </div>

        <div class="col-md-12 fs-6">
                <form action="{{url('medicos/'.$datos->id)}}" class="row" method="post">
                    @csrf
                    {{method_field('PATCH')}}
                    
                    <div class="col-md-3"> {{-- Inicio --}}
                      
                      <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" value="{{$datos->nombre}}" id="nombre" name="nombre">
                      </div>

                      <div class="mb-3">
                        <label for="telefono" class="form-label">Telefono</label>
                        <input type="number" class="form-control" value="{{$datos->telefono}}" id="telefono" name="telefono">
                      </div>
                      
                    </div>

                    <div class="col-md-3"> {{-- Inicio --}}

                      <div class="mb-3">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" class="form-control" value="{{$datos->apellido}}" id="apellido" name="apellido">
                      </div>
                    </div>

                    <div class="col-md-3"> {{-- Inicio --}}

                      <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" value="{{$datos->email}}" id="email" name="email">
                      </div>

                    </div>
                    <div class="col-md-3"> {{-- Inicio --}}

                      <div class="mb-3">
                        <label for="cedula" class="form-label">Cédula</label>
                        <input type="text" class="form-control" value="{{$datos->cedula}}" id="cedula" name="cedula">
                      </div>
                      
                    </div>
                    
                    <div class="mb-3">
                      <label for="direccion" class="form-label">Dirección</label>
                      <input type="text" class="form-control" value="{{$datos->direccion}}" id="direccion" name="direccion">
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