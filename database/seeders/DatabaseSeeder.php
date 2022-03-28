<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $admin = \App\Models\User::create([
            'id' => 1,
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
        ]);
        $admin->assignRole('admin');
        

        // ASIGNAR ROLES DE CLIENTE

        \App\Models\User::factory(9)->create();

        $users = \App\Models\User::all();
        
        foreach($users as $user) 
        {   
            if($user->name != 'admin') 
                $user->assignRole('cliente');
        }

       // PRODUCTOS
       \App\Models\Producto::create(['id'=> 1, 'name'=>"Iphone 13", 'precio'=> 1300, 'cantidad'=>20, 'fabricante'=>'Apple']);
       \App\Models\Producto::create(['id'=> 2, 'name'=>"Xiaomi Redmi 9", 'precio'=> 800, 'cantidad'=>10, 'fabricante'=>'Xiaomi']);
       \App\Models\Producto::create(['id'=> 3, 'name'=>"RTX 3060", 'precio'=> 700, 'cantidad'=>5, 'fabricante'=>'Nvidia']);
       \App\Models\Producto::create(['id'=> 4, 'name'=>"SSD 500GB", 'precio'=> 70, 'cantidad'=>50, 'fabricante'=>'SanDisk']);
       \App\Models\Producto::create(['id'=> 5, 'name'=>"HDD 2TB", 'precio'=> 1300, 'cantidad'=>25, 'fabricante'=>'Seagate']);
       \App\Models\Producto::create(['id'=> 6, 'name'=>"Fuente de alimentación 650W", 'precio'=> 60, 'cantidad'=>60, 'fabricante'=>'Nfortec']);
       \App\Models\Producto::create(['id'=> 7, 'name'=>"Memoria RAM 2x8 GB", 'precio'=> 90, 'cantidad'=>40, 'fabricante'=>'Corsair']);
       \App\Models\Producto::create(['id'=> 8, 'name'=>"Impresora 3D", 'precio'=> 2500, 'cantidad'=>15, 'fabricante'=>'Tumaker']);
       \App\Models\Producto::create(['id'=> 9, 'name'=>"Caja semitorre", 'precio'=> 50, 'cantidad'=>100, 'fabricante'=>'NOX']);
       \App\Models\Producto::create(['id'=> 10, 'name'=>"Pantalla ordenador", 'precio'=> 400, 'cantidad'=>80, 'fabricante'=>'AOC']);
       \App\Models\Producto::create(['id'=> 11, 'name'=>"Repetidor wifi", 'precio'=> 50, 'cantidad'=>45, 'fabricante'=>'TP-Link']);
       \App\Models\Producto::create(['id'=> 12, 'name'=>"Ratón", 'precio'=> 25, 'cantidad'=>220, 'fabricante'=>'Logitech']);
       \App\Models\Producto::create(['id'=> 13, 'name'=>"Pasta térmica", 'precio'=> 15, 'cantidad'=>60, 'fabricante'=>'NOX']);
       \App\Models\Producto::create(['id'=> 14, 'name'=>"Teclado", 'precio'=> 40, 'cantidad'=>250, 'fabricante'=>'Logitech']);
       \App\Models\Producto::create(['id'=> 15, 'name'=>"Nevera", 'precio'=> 700, 'cantidad'=>120, 'fabricante'=>'Balay']);
        
    }
}
