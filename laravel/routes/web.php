<?php

use App\Http\Controllers\User as ControllersUser;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\User;
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

Route::view('/', 'home');

Route::view('/home', 'home');

Route::view('/cart', 'home')->middleware('validateGuest');

Route::get('/logout', [UserController::class, 'logout']);

Route::get('/login', [UserController::class, 'index']);

Route::post('/loging', [UserController::class, 'login']);