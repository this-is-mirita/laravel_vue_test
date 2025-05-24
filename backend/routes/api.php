<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\IndexController as UserIndexController;
use App\Http\Controllers\Articles\IndexController as ArticlesIndexController;
use App\Http\Controllers\Articles\ShowController as ArticleShowController;
use App\Http\Controllers\Articles\CreateController as ArticleCreateController;

Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/logout', [LogoutController::class, 'logout'])->middleware('auth:sanctum');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', [UserIndexController::class, 'index']);
});

Route::post('/article/create', [ArticleCreateController::class, 'create']);
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/article', [ArticlesIndexController::class, 'index']);
    Route::get('/article/', [ArticleShowController::class, 'show']);

});













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
