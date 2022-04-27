<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes([
    'register' => false
]);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('crops', \App\Http\Controllers\CropController::class)->except('show');
    Route::resource('fertilizers', \App\Http\Controllers\FertilizerController::class)->except('show');
    Route::resource('clients', \App\Http\Controllers\ClientController::class)->except('show');
    Route::resource('users', \App\Http\Controllers\UserController::class)->except('show');
});