<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


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

Route::get('/', [AuthenticatedSessionController::class, 'create'])->middleware('guest')->name("index") ;

Route::get('/home', [UserController::class, "home"])->middleware('auth')->name("home") ;
Route::view('/bookmark', "bookmark")->middleware('auth')->name("bookmark") ;
require __DIR__.'/auth.php';
Route::get('/{username}', [UserController::class, "user"])->middleware('auth')->name("profile") ;

