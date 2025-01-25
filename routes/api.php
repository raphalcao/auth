<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/use App\Models\User; // Substitua pelo modelo da sua tabela

Route::get('/users', function () {
    // Consulta no banco de dados
    $users = User::all();

    // Retorna os resultados em formato JSON
    return response()->json([
        'status' => 'success',
        'data' => $users,
    ]);
});

Route::get('/teste', function () {
    return response()->json([
        'message' => 'Rota de teste funcionando!',
        'status' => 'success',
        'timestamp' => now(),
    ]);
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

