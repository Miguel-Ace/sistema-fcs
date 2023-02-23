@extends('home')

@section('contenido')
    <h1 class="text-left p-2">Roles y Permisos</h1>
    <div class="container">

<form action="/assign" method="post" class="d-none">
    @csrf
    <div class="form-group">
        <label for="user_id">Usuario</label>
        <select name="user_id" id="user_id" class="form-control">
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="role">Rol</label>
        <select name="role" id="role" class="form-control">
            @foreach ($roles as $role)
                <option value="{{ $role->name }}">{{ $role->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Asignar rol</button>
</form>

@if (session('update'))
    <div>
        <p style="background: rgb(64, 129, 64); color: white;text-align: center">{{session('update')}}</p>
    </div>
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
<div class="tablausuarios">
    <table class="table table-bordered mt-3 tablarol">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Rol del Usuario</th>
                <th>Asignar Rol</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td class="text-center  font-bold fs-5">{{ $user->name }}</td>
                    <td style="color: green" class="text-center  font-bold fs-5">{{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}</td>
                    <td class="roles">
                        <form action="{{ route('role.update', $user->id) }}" method="post" class="actualizar">
                            @csrf
                            @method('PUT')
                            <select name="role" id="role" class="form-control">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}" {{ $user->hasRole($role) ? 'selected' : '' }}>{{ $role->name }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class=""><ion-icon name="checkmark-done-circle-outline"></ion-icon></button>
                            {{-- <input type="submit" value="Actualizar"> --}}
                        </form>
    
                        <form action="{{ route('role.destroy', $user->id) }}" method="post" class="eliminar">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class=""><ion-icon name="close-circle-outline"></ion-icon></button>
                            {{-- <input type="submit" value="Eliminar"> --}}
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection