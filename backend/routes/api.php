<?php

use App\Http\Controllers\Articles\CreateController;
use App\Http\Controllers\Articles\EditController;
use App\Http\Controllers\Auth\LoginAuthController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterAuthController;
use App\Models\Article;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Articles\IndexController;
use App\Http\Controllers\Articles\ShowController ;
use App\Http\Controllers\Articles\StoreController ;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;

Route::post('/login', [LoginAuthController::class, 'index']);
Route::post('/register', [RegisterAuthController::class, 'index']);
Route::post('/logout', [LogoutController::class, 'index'])->middleware('auth:sanctum');


Route::get('/article', [IndexController::class, 'index'])->middleware('auth:sanctum');
Route::get('/article/{id}', function (string $id) {
    return response()->json([
        'id' => $id,
        'page' => Article::find($id)
    ]);
});
Route::get('/user/article/', [ShowController::class, 'index'])->middleware('auth:sanctum');
Route::post('/article/', [StoreController::class, 'index'])->middleware('auth:sanctum');
Route::post('/article/create', [CreateController::class, 'index'])->withoutMiddleware([EnsureFrontendRequestsAreStateful::class]);
Route::post('/article/edit', [EditController::class, 'index'])->withoutMiddleware([EnsureFrontendRequestsAreStateful::class]);
















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
