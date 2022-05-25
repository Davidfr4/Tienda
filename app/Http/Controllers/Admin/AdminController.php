<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Producto;
use App\Models\Categorias;

class AdminController extends Controller
{   

    public function __construct()
    {
        $this->middleware('admin');
    }

    
    public function index() {
        $productos = producto::with("user")->paginate(10);
        return view('admin.list_productos', compact("productos"));
    }

    public function list_users()
    {        
        $users = User::all();

        return view('admin.list_users', compact('users'));
        
    }

    public function list_categorias()
    {        
        $categorias = categorias::paginate(10);
        return view("admin.list_categorias", compact("categorias"));
        
    }
 
}