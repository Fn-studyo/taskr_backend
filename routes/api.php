<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;

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

Route::group([
    'middleware' => 'api',
], function ($router) {
    Route::post('/register', [UserController::class, 'register']);
    Route::post('/login', [UserController::class, 'login']);
    Route::post('/logout', [UserController::class, 'logout']);
    Route::post('/refresh', [UserController::class, 'refresh']);
    Route::post('/me', [UserController::class, 'me']);

});

Route::post('/task', [TaskController::class, 'create']);

Route::get('/tasks', [TaskController::class, 'get']);

Route::get('/task/{id}', [TaskController::class, 'show']);

Route::put('/task/:id', [TaskController::class, 'update']);

Route::delete('/task/:id', [TaskController::class, 'delete']);
