<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = 'Miguel Acevedo';
        $user->email = 'acevedo51198mac@gmail.com';
        $user->password = Hash::make('12345678');
        $user->save();

        // // Crear permisos
        // Permission::create(['name' => 'editar expedientes']);
        // Permission::create(['name' => 'borrar expedientes']);

        // // Crear roles y asignar permisos
        // $adminRole = Role::create(['name' => 'administrador']);
        // $adminRole->givePermissionTo('editar expedientes', 'borrar expedientes');

        // $editorRole = Role::create(['name' => 'editor']);
        // $editorRole->givePermissionTo('editar expedientes');
    }
}
