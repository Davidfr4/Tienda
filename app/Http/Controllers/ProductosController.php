<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function __construct(){
        $this->middleware("auth");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
        $productos = Producto::with('user')->paginate(10);    
        return view("productos.index", compact("productos"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $producto = new Producto;
        $title = __("Crear producto");
        $textButton = __("Crear");
        $route = route("productos.store");
        return view("productos.create", compact("title", "textButton", "route","producto"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $this->validate($request, [
            "name" => "max:140|unique:productos,name",
            "precio" => "required",
            "stock" => "required",
            "fabricante" => "required",
        ]);
        
        Producto::create($request->only("name","precio","stock","fabricante"));

        return redirect(route("productos.index"))
            ->with("success", __("¡Producto creado con éxito!"));        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        $update = true;
        $title = __("Editar producto");
        $textButton = __("Actualizar");
        $route = route("productos.update", ["producto" => $producto]);
        return view("productos.edit", compact("update","title", "textButton", "route","producto"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {   
        $this->validate($request, [
            "name" => "max:140" . $producto->id,
            "precio" => "required",
            "stock" => "required",
            "fabricante" => "required",
            
        ]);
        $producto->fill($request->only("name", "precio", "stock", "fabricante"))->save();
        return redirect(route("productos.index"))
            ->with("success", __("¡Producto actualizado con éxito!")); ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return back()->with("succes",__("¡Producto eliminado!"));
    }
}
