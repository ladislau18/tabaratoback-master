<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\SessionController;
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
Route::get('/',[ProductoController::class,'listar'])->name('home');


//Route::get('producto/listar',[ProductoController::class,'index'])->name('producto.index');

//Route::get('email', [PasswordController::class,'Password']);
//Route::get('cod', [PasswordController::class,'enviarCodigo']);
require __DIR__.'/loja.php';
require __DIR__.'/security.php';
require __DIR__.'/producto.php';
require __DIR__.'/carrinho.php';
require __DIR__.'/admin.php';
require __DIR__.'/venda.php';
