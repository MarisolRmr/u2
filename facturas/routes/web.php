<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\EmpresaEmisoraController;
use App\Http\Controllers\EmpresaReceptoraController;
use App\Http\Controllers\FacturaController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::post('/buscar', [HomeController::class, 'buscar'])->name('buscar');
Route::get('/factura_encontrada', [HomeController::class, 'facturaencontrada'])->name('encontrada');

// Vista de iniciar sesión
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');

// Vista de registrarse
Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

// Cerrar sesión
Route::get('/logout', [LogoutController::class, 'store'])->name('logout');

// Dasboard administrador
Route::get('/{user:username}', [EmpresaEmisoraController::class, 'index'])->name('posts.index');

// Vista de registrar empresa emisora
Route::get('/{user:username}/registrar_ee', [EmpresaEmisoraController::class, 'register'])->name('emisora');
Route::post('/{user:username}/registrar_ee', [EmpresaEmisoraController::class, 'store'])->name('emisora.store');
Route::get('/{user:username}/listado_ee', [EmpresaEmisoraController::class, 'listado'])->name('emisora.listado');
Route::delete('/listado_ee/{factura}', [EmpresaEmisoraController::class, 'destroy'])->name('emisora.destroy');

// Vista Registrar empresa receptora
Route::get('/{user:username}/registrar_er', [EmpresaReceptoraController::class, 'registrar_er'])->name('receptora');
Route::post('/{user:username}/registrar_er', [EmpresaReceptoraController::class, 'store'])->name('receptora.store');
Route::get('/{user:username}/listado_er', [EmpresaReceptoraController::class, 'listado'])->name('receptora.listado');
Route::delete('/listado_er/{factura}', [EmpresaReceptoraController::class, 'destroy'])->name('receptora.destroy');

// vista Registrar factura
Route::get('/{user:username}/registrar_fa', [FacturaController::class, 'registrar_fa'])->name('factura');
Route::post('/{user:username}/registrar_fa', [FacturaController::class, 'store'])->name('factura.store');
Route::get('/{user:username}/listado_fa', [FacturaController::class, 'listado'])->name('factura.listado');
Route::delete('/listado_fa/{factura}', [FacturaController::class, 'destroy'])->name('factura.destroy');


Route::post('/registrar_fa_pdf', [FacturaController::class, 'storepdf'])->name('factura.storepdf');
Route::post('/registrar_fa_xml', [FacturaController::class, 'storexml'])->name('factura.storexml');

Route::get('facturas/pdf', [FacturaController::class, 'generatePdf'])->name('facturas.pdf');
