<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

use App\Http\Controllers\UserController;
use App\Http\Controllers\SportsEventController;

//-----User
Route::get('users/create', [UserController::class, 'create'])->name('users.create');//Show forms
Route::post('users', [UserController::class, 'store'])->name('users.store');
Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('users/{id}', [UserController::class, 'update'])->name('users.update');

//-----SportsEvent
Route::get('sportsevents/create', [SportsEventController::class, 'create'])->name('sportsevents.create');
Route::post('sportsevents', [SportsEventController::class, 'store'])->name('sportsevents.store');
Route::get('sportsevents', [SportsEventController::class, 'indexView'])->name('sportsevents.index');
