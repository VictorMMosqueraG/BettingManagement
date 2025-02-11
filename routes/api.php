<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SportsEventController;
use App\Http\Controllers\BetController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//------USER-----
Route::post('users', [UserController::class, 'store']);   //CREATE
Route::put('users/{id}', [UserController::class, 'update']); //UPDATE


//------SPORTS EVENT-----
Route::post('sports-events', [SportsEventController::class, 'store']);
Route::get('sports-events', [SportsEventController::class, 'index']);
Route::put('bets/{id}/status', [BetController::class, 'updateStatus']);

//------BET-----
Route::post('bets', [BetController::class, 'store']);
Route::get('bets/user/{user_id}', [BetController::class, 'index']);
