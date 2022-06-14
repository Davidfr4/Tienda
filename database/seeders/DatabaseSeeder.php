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
            'email_verified_at' => '2022-01-01 00:00:00',
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
        \App\Models\Producto::create(['id'=> 1, 'name'=>"Iphone 13", 'precio'=> 1300, 'stock'=>20, 'descripcion'=>'Móvil con 6GB de RAM y 128GB de almacenamiento.', 'fabricante'=>'Apple', 'id_categoria'=>2, 'imagen'=>'Iphone13.jpg']);
        \App\Models\Producto::create(['id'=> 2, 'name'=>"Xiaomi Redmi 9", 'precio'=> 800, 'stock'=>10, 'descripcion'=>'Móvil con 4GB de RAM y 64GB de almacenamiento.', 'fabricante'=>'Xiaomi', 'id_categoria'=>2, 'imagen'=>'Xiaomi9.jpg']);
        \App\Models\Producto::create(['id'=> 3, 'name'=>"RTX 3060", 'precio'=> 700, 'stock'=>5, 'descripcion'=>'Tarjeta gráfica de la serie 30 de Nvidia con 6GB de memoria.', 'fabricante'=>'Nvidia', 'id_categoria'=>1, 'imagen'=>'RTX3060.jpg']);
        \App\Models\Producto::create(['id'=> 4, 'name'=>"SSD 500GB", 'precio'=> 70, 'stock'=>50, 'descripcion'=>'Disco sólido con 500GB de almacenamiento.', 'fabricante'=>'SanDisk', 'id_categoria'=>1, 'imagen'=>'SSD500.jpg']);
        \App\Models\Producto::create(['id'=> 5, 'name'=>"HDD 2TB", 'precio'=> 80, 'stock'=>25, 'descripcion'=>'Disco duro con 2TB de almacenamiento.', 'fabricante'=>'Seagate', 'id_categoria'=>1, 'imagen'=>'HDD2TB.jpg']);
        \App\Models\Producto::create(['id'=> 6, 'name'=>"Fuente de alimentación 650W", 'precio'=> 60, 'stock'=>60, 'descripcion'=>'Fuente de alimentación con una potencia máxima de 650W.', 'fabricante'=>'Nfortec', 'id_categoria'=>1, 'imagen'=>'FuenteAlimentacion650.jpg']);
        \App\Models\Producto::create(['id'=> 7, 'name'=>"Memoria RAM 2x8 GB", 'precio'=> 90, 'stock'=>40, 'descripcion'=>'Kit de 2 memorias RAM DDR4 para PC, cada una cuenta con 8GB de memoria.', 'fabricante'=>'GSkill', 'id_categoria'=>1, 'imagen'=>'RAM_2x8.jpg']);
        \App\Models\Producto::create(['id'=> 8, 'name'=>"Impresora 3D", 'precio'=> 2500, 'stock'=>15, 'descripcion'=>'Impresora 3D de uso profesional.', 'fabricante'=>'Tumaker', 'id_categoria'=>2, 'imagen'=>'Impresora3D.jpg']);
        \App\Models\Producto::create(['id'=> 9, 'name'=>"Caja semitorre", 'precio'=> 50, 'stock'=>100, 'descripcion'=>'Caja para PC que soporta los factores de forma Mini-ITX, Micro-ATX y ATX.', 'fabricante'=>'NOX', 'id_categoria'=>1, 'imagen'=>'Semitorre.jpg']);
        \App\Models\Producto::create(['id'=> 10, 'name'=>"Pantalla ordenador", 'precio'=> 400, 'stock'=>80, 'descripcion'=>'Pantalla de ordenador de 24 pulgadas, 1ms de respuesta, resolución 1440x1080 y una tasa de refresco de 144hz.', 'fabricante'=>'AOC', 'id_categoria'=>1, 'imagen'=>'PantallaPC.jpg']);
        \App\Models\Producto::create(['id'=> 11, 'name'=>"Repetidor wifi", 'precio'=> 50, 'stock'=>45, 'descripcion'=>'Repetidor WiFi diseñado para poder disfrutar de internet hasta en los espacios más complicados.', 'fabricante'=>'TP-Link', 'id_categoria'=>2, 'imagen'=>'RepetidorWiFi.jpg']);
        \App\Models\Producto::create(['id'=> 12, 'name'=>"Ratón", 'precio'=> 25, 'stock'=>220, 'descripcion'=>'Ratón que cuenta con 6 botones programables y 8000DPI como máximo.', 'fabricante'=>'Logitech', 'id_categoria'=>1, 'imagen'=>'Raton.jpg']);
        \App\Models\Producto::create(['id'=> 13, 'name'=>"Pasta térmica", 'precio'=> 15, 'stock'=>60, 'descripcion'=>'Pasta térmica de calidad para evitar que tu procesador se sobrecaliente.', 'fabricante'=>'NOX', 'id_categoria'=>1, 'imagen'=>'PastaTermica.jpg']);
        \App\Models\Producto::create(['id'=> 14, 'name'=>"Teclado", 'precio'=> 40, 'stock'=>250, 'descripcion'=>'Teclado de membrana que cuenta con varios botones programables, aparte de ser un teclado antisalpicaduras.', 'fabricante'=>'Logitech', 'id_categoria'=>1, 'imagen'=>'Teclado.jpg']);
        \App\Models\Producto::create(['id'=> 15, 'name'=>"Nevera", 'precio'=> 700, 'stock'=>120, 'descripcion'=>'Nevera espaciosa que cuenta con varias bandejas que pueden subirse y bajarse.', 'fabricante'=>'Balay', 'id_categoria'=>3, 'imagen'=>'Nevera.jpg']);
        
    }
}
