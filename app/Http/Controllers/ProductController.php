<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductController extends Controller
{
    public function productList()
    {
        $productos = Producto::all();

        return view('products', compact('productos'));
    }
} 