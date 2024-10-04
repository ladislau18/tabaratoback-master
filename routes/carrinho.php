<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarrinhoController;

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
Route::get('carrinho', [CarrinhoController::class,'carrinho'])->name('carrinho');
Route::get('addCarrinho/{id}', [CarrinhoController::class,'Add'])->name('carrinho.add');
Route::patch('updateCarrinho', [CarrinhoController::class,'update'])->name('carrinho.update');
Route::delete('removeCarrinho', [CarrinhoController::class,'remove'])->name('carrinho.remove');