<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;


Route::get('/', function () {
    return view('welcome');
});

Route::prefix('usuarios')->group(function () {
    Route::get('/', [UsuarioController::class, 'index']);
    Route::post('/', [UsuarioController::class, 'store']);
});

Route::get('/home', [HomeController::class, 'index'])->name('home.index')->middleware('auth');

Route::get('/adminuser', function () {
    return view('AdminUser.index');
});

Route::get('/admin', [AdminController::class,'index'])->name('admin')->middleware('auth');
Route::put('/usuarios/{id}', [UsuarioController::class, 'update'])->name('usuarios.update');


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::middleware('guest')->group(function () {
    Route::get('/register', [LoginController::class, 'showRegisterForm']);
    Route::post('/register', [LoginController::class, 'register']);
});


Route::post('/logout', function () {Auth::logout();return redirect('/login');})->name('logout');
////////////añadido
Route::get('/usuarios/buscar', [UsuarioController::class, 'buscar']);


