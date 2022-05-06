<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Categorias;

class CategoriasController extends Controller
{

    public function store(Request $request)
    {   
        $this->validate($request, [
            "name" => "max:140|unique:categorias,name",
        ]);
        
        Categorias::create($request->only("name"));

        return redirect(route("categorias.create"))
            ->with("success", __("¡Categoría creada con éxito!"));        
    }

    public function create()
    {   
        $categorias = new Categorias;
        $title = __("Crear categoría");
        $textButton = __("Crear categoría");
        $route = route("categorias.store");
        return view("categorias.create", compact("title", "textButton", "route","categorias"));
    }

    public function update(Request $request, Categorias $categorias)
    {   
        $this->validate($request, [
            "name" => "max:140" . $categorias->id,
            
        ]);
        $categorias->fill($request->only("name"))->save();
        return redirect(route("admin.list_categorias"))
            ->with("success", __("¡Categoría actualizada con éxito!")); ;
    }

    public function edit(Categorias $categorias)
    {
        $update = true;
        $title = __("Editar categoría");
        $textButton = __("Actualizar categoría");
        $route = route("categorias.update", ["categorias" => $categorias]);
        return view("categorias.edit", compact("update","title", "textButton", "route","producto"));
    }

    public function destroy(Categorias $categoria)
    {
        $categoria->delete();
        return back()->with("success",__("¡Categoría eliminada!"));
    }
}
