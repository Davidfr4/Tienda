<?php

namespace Database\Seeders;

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
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'cliente']);
        
        Permission::create(['name' => 'admin.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.list_users'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.list_productos'])->syncRoles([$role1]);

        Permission::create(['name' => 'contacta'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'contacta.form'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'contacta.index'])->syncRoles([$role1,$role2]);

        Permission::create(['name' => 'emails.index'])->syncRoles([$role1,$role2]);

        Permission::create(['name' => 'productos.index'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'productos.form'])->syncRoles([$role1]);
        Permission::create(['name' => 'productos.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'productos.edit'])->syncRoles([$role1]);

    }
}
