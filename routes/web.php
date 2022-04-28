<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CropController;
use App\Http\Controllers\FertilizerController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\UserController;

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
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('crops/trashed', [CropController::class, 'showTrashed'])->name('crops.trashed');
    Route::resource('crops', CropController::class)->except('show');

    Route::get('fertilizers/trashed', [FertilizerController::class, 'showTrashed'])->name('fertilizers.trashed');
    Route::resource('fertilizers', FertilizerController::class)->except('show');

    Route::get('clients/trashed', [ClientController::class, 'showTrashed'])->name('clients.trashed');
    Route::resource('clients', ClientController::class)->except('show');

    Route::get('users/trashed', [UserController::class, 'showTrashed'])->name('users.trashed');
    Route::resource('users', UserController::class)->except('show');
});