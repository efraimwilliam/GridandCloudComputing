<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;

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





Route::group(['middleware' => 'auth'], function (){
    
    Route::get('/home', [MainController::class, 'getpost']);

    Route::get('/createpostpage', [MainController::class, 'createpostpage']);

    Route::post('/unggah', [MainController::class, 'uploadpost']);

    Route::get('/profile/{id}', [MainController::class, 'profilepage']);

    Route::put('/like/{id}', [MainController::class, 'like']);

    Route::get('/profilepost/{id}', [MainController::class, 'profilepost']);

    Route::put('/editprofile/{id}', [MainController::class, 'editprofile']);

    Route::put('/like/{id}', [MainController::class, 'like']);

});





//Auth
Route::get('/auth', [AuthController::class, 'loginpage']);

Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'registerpage']);

Route::post('/daftar', [AuthController::class, 'register']);

Route::get('/logout', [AuthController::class, 'logout']);
