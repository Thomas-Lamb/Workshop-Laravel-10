<?php

use App\Http\Controllers\ChannelController;
use App\Http\Controllers\MessageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('user/register', [UserController::class, 'register']);
Route::get('user/login', [UserController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'index']);
    });

    Route::prefix('messages')->group(function () {
        Route::get('/', [MessageController::class, 'index']);
        Route::get('/channel/{channel}', [MessageController::class, 'showByChannel']);
        Route::get('/{message}', [MessageController::class, 'show']);
        Route::post('/', [MessageController::class, 'store']);
    });

    Route::prefix('channels')->group(function () {
        Route::get('/', [ChannelController::class, 'index']);
        Route::get('/{channel}', [ChannelController::class, 'show']);
        Route::post('/', [ChannelController::class, 'store']);
    });
});
