<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\CheckController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/logout', [LogoutController::class, 'logout'])->middleware('auth:sanctum');

Route::get('/profile', [CheckController::class, 'profile'])->middleware('auth:sanctum');















//Route::middleware('auth:sanctum')->group(function () {
//    //Route::get('/get', GetController::class);
//
////    Route::get('/user', function (Request $request) {
////        return $request->user();
////    });
//});

//Route::get('/get', GetController::class);
//Route::get('/article', function () {
//    // http://127.0.0.1:8000/api/hello
//    return ['message' => 'test route qwe'];
//});

//Route::get('/hello', function () {
//    // http://127.0.0.1:8000/api/hello
//    return ['message' => 'test route'];
//});
//

//Route::prefix('user')->name('User')->group(function () {
//    Route::post('/', StoreUserController::class);
//});
