<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\Category\CategoryController;

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

Route::prefix('admin')->group(function(){

    Route::get('/', [AdminController::class,'index']);
    Route::get('/login', [AdminController::class,'index'])->name('admin_login_form');
    Route::get('/register', [AdminController::class,'adminregister'])->name('admin.register');
    Route::post('/registerstore', [AdminController::class,'registerstore'])->name('admin.registerstore');
    Route::post('/login-owner', [AdminController::class,'login'])->name('admin.login');
    Route::get('/logout', [AdminController::class,'Adminlogout'])->name('admin.logout')->middleware('admin');
    Route::get('/dashboard', [AdminController::class,'dashboard'])->name('admin_dashboard')->middleware('admin');
    Route::get('categories', [CategoryController::class,'category'])->name('categories');


});






Route::get('/', function () {
    return view('pages.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
