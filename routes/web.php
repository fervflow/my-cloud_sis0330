<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ArchivoController;
use App\Http\Controllers\StorageController;
use App\Http\Controllers\CarpetaController;

Route::get('/', function () {
    return redirect('/inicio');
});

Route::prefix('usuarios')->group(function () {
    Route::get('/', [UsuarioController::class, 'index']);
    Route::post('/', [UsuarioController::class, 'store']);
});

Route::get('/home', [HomeController::class, 'index'])->name('home.index')->middleware('auth');
Route::get('/home/storage', [StorageController::class, 'storage'])->name('home.storage')->middleware('auth');
Route::get('/home/recient', [StorageController::class, 'recient'])->name('home.recient')->middleware('auth');


Route::get('/adminuser', function () {
    return view('AdminUser.index');
});

Route::middleware([App\Http\Middleware\AdminRoleMiddleware::class])->group(function (){
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/plan/create', [PlanController::class, 'create'])->name('plan.create');
    Route::post('/plan/store', [PlanController::class, 'store'])->name('plan.store');
    Route::put('/usuarios/{id}', [UsuarioController::class, 'update'])->name('usuarios.update');
});


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);



Route::middleware('guest')->group(function () {
    Route::get('/register', [LoginController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [LoginController::class, 'register']);
});

Route::post('/logout', function () {Auth::logout();return redirect('/');})->name('logout');


Route::get('/terminos-condiciones', function () {
    return view('Home.terminosCondiciones');
})->name('home.terminosCondiciones');

Route::get('/plan', [PlanController::class, 'index'])->name('plan.index')->middleware('auth');
Route::get('/plan/adquirir/{planId}', [PlanController::class, 'adquirir'])->name('plan.adquirir')->middleware('auth');

Route::get('/inicio', [HomeController::class, 'inicio']);
Route::post('/archivo/subir', [ArchivoController::class, 'subirArchivo'])->name('archivo.subir')->middleware('auth');
Route::get('/archivo/descargar/{id}', [ArchivoController::class, 'descargarArchivo'])->name('archivo.descargar')->middleware('auth');
Route::delete('/archivo/eliminar/{id}', [ArchivoController::class, 'eliminarArchivo'])->name('archivo.eliminar')->middleware('auth');

Route::get('/carpetas', [CarpetaController::class, 'index'])->name('carpeta.index');
