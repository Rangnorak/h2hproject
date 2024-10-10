<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaUserController;
use App\Http\Controllers\BerandaOperatorController;
use App\Http\Controllers\UserController;

Route::prefix('operator')->middleware(['auth', 'auth.operator'])->group(function () {
    //ini route khusus untuk operator
    Route::get('beranda', [BerandaOperatorController::class, 'index'])->name('operator.beranda');
    Route::resource('user', UserController::class);
});


Route::prefix('user')->middleware(['auth', 'auth.user'])->group(function () {
    //ini route khusus untuk user-biasa
    Route::get('beranda', [BerandaUserController::class, 'index'])->name('user.beranda');
});


Route::prefix('admin')->middleware(['auth', 'auth.admin'])->group(function () {
    //ini route khusus untuk admin
});

Route::get('logout', function () {
    Auth::logout();
    return redirect('login');
})->name('logout');



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
