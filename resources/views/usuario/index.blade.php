@extends('home')

@section('contenido')
    <h1>Usuarios</h1>

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

    <form action="{{url('/usuarios')}}" class="row formusuarios" method="post">
        @csrf
        <div class="col-md-4">
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" @error("name") style="border: 1px solid red" @enderror value="{{old('name')}}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="email" class="form-label">Correo</label>
                <input type="email" class="form-control" id="email" name="email" @error("email") style="border: 1px solid red" @enderror value="{{old('email')}}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="text" class="form-control" id="password" name="password" @error("password") style="border: 1px solid red" @enderror value="{{ $random }}">
            </div>
        </div>

        <button type="submit" class="btn btn-primary enviar">
            <ion-icon name="save-outline"></ion-icon>
            Guardar
        </button>
    </form>

Lista de usuarios

    <div class="col-md-12 fs-6 tablausuarios">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contraseña</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-center tbusuarios">
                @foreach ($datos as $dato )
                    <tr class="tusuarios">
                        <td>{{$dato->id}}</td>
                        <td>{{$dato->name}}</td>
                        <td>{{$dato->email}}</td>
                        <td>{{$dato->password}}</td>
                        <td class="accionesUsuarios">
                            <a href="{{url('usuarios/'.$dato->id.'/edit')}}" class="edit"><ion-icon name="pencil-outline"></ion-icon></a>
                            {{-- | --}}
                            <form action="{{url('usuarios/'.$dato->id)}}" method="POST" class="delete">
                                @csrf
                                {{method_field('DELETE')}}
                                <button type="submit"><ion-icon name="beaker-outline"></ion-icon></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection