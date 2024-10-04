<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LojaController;
use App\Http\Controllers\UserController;

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

/*Route::post('comerciantes', [ComercianteController::class,'cadastrar']);
Route::get('comerciantes', [ComercianteController::class,'listar']);
*/



Route::middleware(['logado'])->group(function () {

    Route::get('/loja/cadastrar',[LojaController::class,'cadastrarView'])->name('loja.cadastrar_view');
    Route::post('/loja', [LojaController::class,'cadastrar'])->name('loja.cadastrar');
    Route::get('dashboard',[LojaController::class,'dashboard'])->name('loja.dashboard');
});
