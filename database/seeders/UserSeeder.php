<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
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
        $user = User::create([
            'name' => 'عبادة يحيى أبو مسامح',
            'email' => 'obadatech02@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123123123'), // password
            'image' => 'owner.jpg',
            'mobile' => '00972595961289',
            'remember_token' => Str::random(10),
            'roles_name' => 'owner',
            'status' => 1
        ]);

        $role = Role::create(['name' => 'owner']);
        $permission = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permission);
        $user->assignRole([$role->id]);
    }
}
