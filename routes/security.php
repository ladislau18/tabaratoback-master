<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PasswordController;

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

Route::middleware(['guest'])->group(function () {
    Route::post('/login', [AuthController::class, 'login'])->name('loginpost');
    Route::get('/login', function () {

        return view('user.login');
    })->name('login');
});

Route::middleware(['logado'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

});




Route::get('users/cadastrar',function(){
    return view('user.cadastrar');
})->name('user.cadastrar_view');
Route::post('users',[UserController::class,'cadastrar'])->name('users.cadastrar');


//Route::get('users/logout', [AuthController::class,'logout']);

Route::middleware('auth:sanctum')->get('users/logout', [AuthController::class, 'logout']);

Route::post('users/verificarcodigo', [PasswordController::class, 'verificarCodigo']);
Route::post('users/codigo', [PasswordController::class, 'enviarCodigo']);
Route::post('users/password', [PasswordController::class, 'novaSenha']);
Route::post('users', [UserController::class, 'cadastrar'])->name('user.cadastrar');