<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{
    use HasFactory;

    protected $fillable = [
        'cantidad_productos',
        'precio_total',
        'fecha_pedido',
        'direccion_envio',
        'id_usuario',
    ];
}
