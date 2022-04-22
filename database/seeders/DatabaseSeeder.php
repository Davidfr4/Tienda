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


        // CATEGORIAS
        \App\Models\Categorias::create(['id'=> 1, 'name'=>"Componentes de ordenador"]);
        \App\Models\Categorias::create(['id'=> 2, 'name'=>"Electrónica"]);
        \App\Models\Categorias::create(['id'=> 3, 'name'=>"Electrodomésticos"]);

        
        // PRODUCTOS
        \App\Models\Producto::create(['id'=> 1, 'name'=>"Iphone 13", 'precio'=> 1300, 'stock'=>20, 'fabricante'=>'Apple', 'id_categoria'=>2]);
        \App\Models\Producto::create(['id'=> 2, 'name'=>"Xiaomi Redmi 9", 'precio'=> 800, 'stock'=>10, 'fabricante'=>'Xiaomi', 'id_categoria'=>2]);
        \App\Models\Producto::create(['id'=> 3, 'name'=>"RTX 3060", 'precio'=> 700, 'stock'=>5, 'fabricante'=>'Nvidia', 'id_categoria'=>1]);
        \App\Models\Producto::create(['id'=> 4, 'name'=>"SSD 500GB", 'precio'=> 70, 'stock'=>50, 'fabricante'=>'SanDisk', 'id_categoria'=>1]);
        \App\Models\Producto::create(['id'=> 5, 'name'=>"HDD 2TB", 'precio'=> 1300, 'stock'=>25, 'fabricante'=>'Seagate', 'id_categoria'=>1]);
        \App\Models\Producto::create(['id'=> 6, 'name'=>"Fuente de alimentación 650W", 'precio'=> 60, 'stock'=>60, 'fabricante'=>'Nfortec', 'id_categoria'=>1]);
        \App\Models\Producto::create(['id'=> 7, 'name'=>"Memoria RAM 2x8 GB", 'precio'=> 90, 'stock'=>40, 'fabricante'=>'Corsair', 'id_categoria'=>1]);
        \App\Models\Producto::create(['id'=> 8, 'name'=>"Impresora 3D", 'precio'=> 2500, 'stock'=>15, 'fabricante'=>'Tumaker', 'id_categoria'=>2]);
        \App\Models\Producto::create(['id'=> 9, 'name'=>"Caja semitorre", 'precio'=> 50, 'stock'=>100, 'fabricante'=>'NOX', 'id_categoria'=>1]);
        \App\Models\Producto::create(['id'=> 10, 'name'=>"Pantalla ordenador", 'precio'=> 400, 'stock'=>80, 'fabricante'=>'AOC', 'id_categoria'=>1]);
        \App\Models\Producto::create(['id'=> 11, 'name'=>"Repetidor wifi", 'precio'=> 50, 'stock'=>45, 'fabricante'=>'TP-Link', 'id_categoria'=>2]);
        \App\Models\Producto::create(['id'=> 12, 'name'=>"Ratón", 'precio'=> 25, 'stock'=>220, 'fabricante'=>'Logitech', 'id_categoria'=>1]);
        \App\Models\Producto::create(['id'=> 13, 'name'=>"Pasta térmica", 'precio'=> 15, 'stock'=>60, 'fabricante'=>'NOX', 'id_categoria'=>1]);
        \App\Models\Producto::create(['id'=> 14, 'name'=>"Teclado", 'precio'=> 40, 'stock'=>250, 'fabricante'=>'Logitech', 'id_categoria'=>1]);
        \App\Models\Producto::create(['id'=> 15, 'name'=>"Nevera", 'precio'=> 700, 'stock'=>120, 'fabricante'=>'Balay', 'id_categoria'=>3]);
        
    }
}
