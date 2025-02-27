<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PlanController;

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
Route::get('/plan', [PlanController::class,'index'])->name('plan')->middleware('auth');
Route::put('/usuarios/{id}', [UsuarioController::class, 'update'])->name('usuarios.update');


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::middleware('guest')->group(function () {
    Route::get('/register', [LoginController::class, 'showRegisterForm']);
    Route::post('/register', [LoginController::class, 'register']);
});

Route::get('/perfil', [HomeController::class, 'perfil'])->name('home.perfil')->middleware('auth');
Route::put('/perfil', [HomeController::class, 'updatePerfil'])->name('home.updatePerfil')->middleware('auth');

Route::post('/logout', function () {Auth::logout();return redirect('/login');})->name('logout');


Route::get('/terminos-condiciones', function () {
    return view('Home.terminosCondiciones');
})->name('home.terminosCondiciones');

Route::prefix('plan')->group(function () {
    Route::get('/', function () { return view('Plan.index'); })->name('plan');
    Route::get('/create', function () { return view('Plan.createPlan'); })->name('planc');
    Route::post('/store', [PlanController::class, 'store'])->name('plan.store');
});
