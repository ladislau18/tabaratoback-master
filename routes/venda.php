<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VendaController;

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
    Route::get('comprar', [VendaController::class,'checkout'])->name('venda.checkout');
    Route::post('encomendar', [VendaController::class,'encomendar'])->name('venda.encomendar');
    Route::get('finalizar/{id}', [VendaController::class,'finalizar'])->name('venda.finalizar');
});
