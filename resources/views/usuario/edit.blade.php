@extends('home')

@section('contenido')
    <h1>Editar Usuarios</h1>

    @if ($errors->any())
        <ul class="bg-white text-danger p-2">
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif

    @if (session('success'))
        <div>
            <p style="background: rgb(64, 129, 64); color: white;text-align: center">{{session('success')}}</p>
        </div>
    @endif

    @if (session('danger'))
        <div>
            <p style="background: rgb(243, 61, 37); color: white;text-align: center">{{session('danger')}}</p>
        </div>
    @endif

    <form action="{{url('/usuarios'.'/'.$datos->id)}}" class="row formusuarios" method="post">
      @csrf
      {{method_field('PATCH')}}
      <div class="col-md-4">
          <div class="mb-3">
              <label for="name" class="form-label">Nombre</label>
              <input type="text" class="form-control" id="name" name="name" @error("name") style="border: 1px solid red" @enderror value="{{$datos->name}}">
            </div>
        </div>
  
      <div class="col-md-4">
          <div class="mb-3">
              <label for="email" class="form-label">Correo</label>
              <input type="email" class="form-control" id="email" name="email" @error("email") style="border: 1px solid red" @enderror value="{{$datos->email}}">
            </div>
        </div>
  
      <div class="col-md-4">
          <div class="mb-3">
              <label for="password" class="form-label">Contraseña</label>
              <input type="text" class="form-control" id="password" name="password" @error("password") style="border: 1px solid red" @enderror value="">
            </div>
        </div>

        <button type="submit" class="btn btn-primary enviar">
            <ion-icon name="save-outline"></ion-icon>
            Guardar
        </button>
        <a href="{{url('/usuarios')}}" class="btn regresar"><ion-icon name="arrow-back-outline"></ion-icon>Regresar</a>
    </form>
@endsection