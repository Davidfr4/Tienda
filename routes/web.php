<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ProductosController;
use \App\Http\Controllers\ContactaController;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\Controller;
use \App\Http\Controllers\AdminController;
use \App\Http\Controllers\PayPalController;
use \App\Http\Controllers\CartController;
use \App\Http\Controllers\CategoriasController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

// Rutas página principal
Route::get('/', function () {
    return view('home');
});

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('users', UserController::class);


// Ruta de productos
Route::resource("productos", ProductosController::class);
Route::get('indexComponentes',[ProductosController::class,'indexComponentes'])->name('productos.indexComponentes');
Route::get('indexElectronica',[ProductosController::class,'indexElectronica'])->name('productos.indexElectronica');
Route::get('indexElectrodomesticos',[ProductosController::class,'indexElectrodomesticos'])->name('productos.indexElectrodomesticos');


// Rutas de categorias
Route::resource("categorias", CategoriasController::class);


// Rutas pestaña contacta
Route::get('contacta', function (){
    $correo= new ContactaMail;
    Mail::to('angelai05@educastur.es')->send($correo);
    return ("mensaje enviado");
});

Route::get('contacta',[ContactaController::class,'index'])->name('contacta.index');
Route::post('contacta',[ContactaController::class,'store'])->name('contacta.store');


// Rutas panel de administrador
Route::get('admin',[AdminController::class, 'index'])->name('admin.index');

    Route::prefix('admin')->group(function () {
        Route::get('/index',[AdminController::class, 'index']);
        Route::get('/list_users',[AdminController::class, 'list_users']);
        Route::get('/list_productos',[AdminController::class, 'list_productos']);
        Route::get('/list_categorias',[AdminController::class, 'list_categorias']);
    });


// Rutas de paypal
Route::get('create-transaction', [PayPalController::class, 'createTransaction'])->name('createTransaction');
Route::get('process-transaction', [PayPalController::class, 'processTransaction'])->name('processTransaction');
Route::get('success-transaction', [PayPalController::class, 'successTransaction'])->name('successTransaction');
Route::get('cancel-transaction', [PayPalController::class, 'cancelTransaction'])->name('cancelTransaction');
Route::get('pago', [PayPalController::class, 'pago'])->name('pago');


// Rutas carrito de la compra
Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');