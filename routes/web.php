<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\loginMiddleware;
use App\Http\Controllers\AddressController;

use App\Http\Middleware\userAge;
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::view('login', 'login')->name('login');
// Route::view('regi', 'regi')->name('regi');
// Route::view('dashboard', 'dashboard')->name('dashboard')->middleware('userGroup');
// Route::view('temp', 'temp')->name('temp');

// Route::post('saveuser/', [userController::class, 'registeration'])->name('registeration');
// Route::post('logedin/', [userController::class, 'login'])->name('logedin');

Route::view('/address', 'address')->name('address');

Route::post('/store',[AddressController::class, 'store'])->name('store');

