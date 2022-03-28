<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\Admin\AdminController;
    
    Route::get('admin',[AdminController::class, 'index'])->name('admin.index');


    Route::prefix('admin')->group(function () {
        Route::get('/index',[AdminController::class, 'index']);
        Route::get('/list_users',[AdminController::class, 'list_users']);
        Route::get('/list_productos',[AdminController::class, 'list_productos']);
    });

    Route::resource('users',UserController::class);

?>