<?php

use App\Http\Controllers\Api\Auth\Spa\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('auth/spa')->name('user')->middleware('web')->group(function (){
    Route::post('login', LoginController::class)->middleware('guest');
});







Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
//Route::get('/hello', function () {
//    // http://127.0.0.1:8000/api/hello
//    return ['message' => 'test route'];
//});
//
Route::get('/article', function () {
    // http://127.0.0.1:8000/api/hello
    return ['message' => 'test route qwe'];
});

//Route::prefix('user')->name('User')->group(function () {
//    Route::post('/', StoreUserController::class);
//});
