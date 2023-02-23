<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class RolController extends Controller
{
    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        return view('roles',compact('users','roles'));
    }

    public function store(Request $request)
    {
        $user = User::find($request->user_id);
        $user->assignRole($request->role);

        return redirect()->back()->with('success', 'Rol asignado correctamente.');
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->syncRoles([$request->role]);

        return redirect()->back()->with('update', 'Rol actualizado correctamente.');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->removeRole($id);

        return redirect()->back()->with('danger', 'Rol eliminado correctamente.');
    }
}
