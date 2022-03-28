<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ProductosController;
use \App\Http\Controllers\ContactaController;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\Controller;
use \App\Http\Controllers\AdminController;

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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('users', UserController::class);

Route::resource("productos", ProductosController::class);


Route::get('contacta', function (){
    $correo= new ContactaMail;
    Mail::to('angelai05@educastur.es')->send($correo);
    return ("mensaje enviado");
});

Route::get('contacta',[ContactaController::class,'index'])->name('contacta.index');
Route::post('contacta',[ContactaController::class,'store'])->name('contacta.store');

Route::get('admin',[AdminController::class, 'index'])->name('admin.index');


    Route::prefix('admin')->group(function () {
        Route::get('/index',[AdminController::class, 'index']);
        Route::get('/list_users',[AdminController::class, 'list_users']);
        Route::get('/list_productos',[AdminController::class, 'list_productos']);
    });