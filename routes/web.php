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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', [App\Http\Controllers\ReservoirController::class, 'index']);
      Route::resource('member', App\Http\Controllers\MemberController::class);
      Route::resource('reservoir', App\Http\Controllers\ReservoirController::class);
  });
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



