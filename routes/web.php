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

    //Hapus Profile post
    Route::delete('hapuspost/{id}', [MainController::class,'deleteprofilepost']);


    Route::get('/commentinfo/{id}', [MainController::class, 'commentpage']);

    Route::post('/comment/{id}', [MainController::class, 'comment']);

    Route::post('/commentcomment/{id}', [MainController::class, 'commentcomment']);



    Route::get('/commentinfo2/{id}', [MainController::class, 'commentpage2']);

    Route::post('/comment2/{id}', [MainController::class, 'comment2']);

    Route::post('/commentcomment2/{id}', [MainController::class, 'commentcomment2']);
    

    Route::get('/following/{id}', [MainController::class, 'followingpage']);

    Route::get('follow/{id}', [MainController::class, 'follow']);


    Route::put('/like/{id}', [MainController::class, 'like']);

    Route::get('/profilepost/{id}', [MainController::class, 'profilepost']);

    Route::post('/editprofile/{id}', [MainController::class, 'editprofile']);

    Route::put('/like/{id}', [MainController::class, 'like']);

    Route::put('/likeprofilepost/{id}', [MainController::class, 'likeprofilepost']);
    
    Route::put('/like2/{id}', [MainController::class, 'like2']);

    Route::get('/newhome', [MainController::class, 'newhomepage']);



    Route::get('/group1', [MainController::class, 'group1']);


    
    Route::get('/group2', [MainController::class, 'group2']);
    Route::get('/createpostpage2', [MainController::class, 'createpostpage2']);
    Route::post('/unggah2', [MainController::class, 'uploadpost2']);

});





//Auth
Route::get('/', [AuthController::class, 'loginpage']);

Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'registerpage']);

Route::post('/daftar', [AuthController::class, 'register']);

Route::get('/logout', [AuthController::class, 'logout']);
