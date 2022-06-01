<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_usuario',
        'name',
        'email',
        'precio_total',
        'pais',
        'provincia',
        'ciudad',
        'codigoPostal',
        'calle',
        'portal',
        'piso',
    ];
}
