<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Recaudador']);
        $role3 = Role::create(['name' => 'Punto']);

        Permission::create(['name' => 'recaudador.token'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'punto.datos'])->syncRoles([$role1,$role3]);
        Permission::create(['name' => 'dashboard'])->syncRoles([$role1]);

        Permission::create(['name' => 'users.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.update'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.nuevo'])->syncRoles([$role1]);

        Permission::create(['name' => 'profile.show'])->syncRoles([$role1]);
        
        
    }
}
