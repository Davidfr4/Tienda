<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Categorias;

class CategoriasController extends Controller
{

    public function destroy(Categorias $categoria)
    {
        $categoria->delete();
        return back()->with("success",__("¡Categoría eliminada!"));
    }
}
