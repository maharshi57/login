<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddressController;

use App\Http\Controllers\UserController;
use App\Http\Middleware\loginMiddleware;
use App\Http\Middleware\userAge;


// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::view('login', 'login')->name('login');
Route::view('regi', 'regi')->name('regi');
Route::view('dashboard', 'dashboard')->name('dashboard')->middleware('userGroup');
Route::view('temp', 'temp')->name('temp');

Route::post('saveuser/', [userController::class, 'registeration'])->name('registeration');
Route::post('logedin/', [userController::class, 'login'])->name('logedin');
Route::post('logout/', [userController::class, 'logout'])->name('logout');

// Route::post('store/',[AddressController::class, 'store'])->name('store');
