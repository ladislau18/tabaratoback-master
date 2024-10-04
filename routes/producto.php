<?php

use App\Http\Controllers\ComercianteController;
use App\Http\Controllers\EstabelecimentoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['logado'])->group(function () {
 


    // Productos Comerciante
    Route::get('dashboard/productos/cadastrar',[ProductoController::class,'cadastrarView'])->name('producto.cadastrar_view');
    Route::get('dashboard/productos',[ProductoController::class,'listarProductosLoja'])->name('producto.listarProductosLoja');
    
    Route::post('/productos', [ProductoController::class,'cadastrar'])->name('producto.cadastrar');
});

Route::middleware(['logado'])->group(function () {
 


    // Productos Comerciante
    Route::get('admin/dashboard/productos',[ProductoController::class,'listarAdmin'])->name('producto.listarProductos');

});




