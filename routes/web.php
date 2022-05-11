<?php

use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\IndexController;

Route::get('/', [IndexController::class, 'index']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/libro', [App\Http\Controllers\LibroController::class, 'index']);
Route::get('/libro/crear', [App\Http\Controllers\LibroController::class, 'create']);
Route::post('/libro/guardar', [App\Http\Controllers\LibroController::class, 'save']);
Route::get('/libro/editar/{idLibro}', [App\Http\Controllers\LibroController::class, 'edit']);
Route::post('/libro/actualizar', [App\Http\Controllers\LibroController::class, 'update']);
Route::get('/libro/cambiar/estado/{idLibro}/{estado}', [App\Http\Controllers\LibroController::class, 'updateState']);
Route::get('/libro/listar', [App\Http\Controllers\LibroController::class, 'listar']);
Route::post('/libro/download', [App\Http\Controllers\LibroController::class, 'download']);

Route::get('/autor', [App\Http\Controllers\AutorController::class, 'index']);
Route::get('/autor/crear', [App\Http\Controllers\AutorController::class, 'create']);
Route::post('/autor/guardar', [App\Http\Controllers\AutorController::class, 'save']);
Route::get('/autor/editar/{idAutor}', [App\Http\Controllers\AutorController::class, 'edit']);
Route::post('/autor/actualizar', [App\Http\Controllers\AutorController::class, 'update']);
Route::get('/autor/listar', [App\Http\Controllers\AutorController::class, 'listar']);
Route::post('/autor/download', [App\Http\Controllers\AutorController::class, 'download']);

Route::get('/prestamo', [App\Http\Controllers\PrestamoController::class, 'index']);
Route::get('/prestamo/crear', [App\Http\Controllers\PrestamoController::class, 'create']);
Route::post('/prestamo/guardar', [App\Http\Controllers\PrestamoController::class, 'save']);
Route::get('/prestamo/cambiar/estado/{idPrestamo}/{estado}', [App\Http\Controllers\PrestamoController::class, 'updateState']);
Route::get('/prestamo/listar', [App\Http\Controllers\PrestamoController::class, 'listar']);

Route::get('/usuario', [App\Http\Controllers\UsuarioController::class, 'index']);
Route::get('/usuario/crear', [App\Http\Controllers\UsuarioController::class, 'create']);
Route::post('/usuario/guardar', [App\Http\Controllers\UsuarioController::class, 'save']);
Route::get('/usuario/editar/{idUsuario}', [App\Http\Controllers\UsuarioController::class, 'edit']);
Route::post('/usuario/actualizar', [App\Http\Controllers\UsuarioController::class, 'update']);
Route::get('/usuario/cambiar/estado/{idUsuario}/{estado}', [App\Http\Controllers\UsuarioController::class, 'updateState']);
Route::get('/usuario/listar', [App\Http\Controllers\UsuarioController::class, 'listar']);
