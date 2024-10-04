<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\VendaController;
use Illuminate\Support\Facades\Route;


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

Route::middleware(['admin'])->group(function () {

    Route::get('admin/dashboard', [UserController::class,'dashboard'])->name('admin.dashboard');
    Route::get('admin/dashboard/encomendas', [VendaController::class,'listarEncomendas'])->name('admin.encomendas');
    Route::get('admin/dashboard/vendas', [VendaController::class,'listarVendas'])->name('admin.vendas');
    Route::get('admin/dashboard/usuarios', [UserController::class,'listar'])->name('admin.users');
    
});