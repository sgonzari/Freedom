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

/* INDEX ROUTE */
Route::get('/', [AuthenticatedSessionController::class, 'create'])->middleware('guest')->name("index") ;

/* BAN ROUTE */
Route::view('/banned', "banned")->middleware(['auth'])->name("banned") ;

/* HOME ROUTE */
Route::view('/home', "home")->middleware(['banned', 'auth'])->name("home") ;

/* NOTIFICATION ROUTE */
Route::view('/notification', "notification")->middleware(['banned', 'auth'])->name("notification") ;

/* BOOKMARK ROUTE */
Route::view('/bookmark', "bookmark")->middleware(['banned', 'auth'])->name("bookmark") ;

/* POST ROUTE */
Route::get('/{username}/post/{id_post}', [UserController::class, "post"])->middleware(['banned', 'auth'])->name("post") ;

/* ADMIN ROUTE */
Route::view('/admin', "admin")->middleware(['banned', 'auth', 'admin'])->name("admin") ;

require __DIR__.'/auth.php';

/* PROFILES ROUTES */
Route::get('/{username}', [UserController::class, "profile"])->middleware(['banned', 'auth'])->name("profile") ;
Route::get('/{username}/reposts', [UserController::class, "profileReposts"])->middleware(['banned', 'auth'])->name("profile-reposts") ;
Route::get('/{username}/likes', [UserController::class, "profileLikes"])->middleware(['banned', 'auth'])->name("profile-likes") ;