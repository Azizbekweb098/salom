<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TudoController;
use App\Http\Controllers\TudoSearchController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

// login start
Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/logout', [LogoutController::class, 'logout'])->middleware('auth:sanctum');
Route::get('/user/{id}', [UserController::class, 'user']);

// login end


// category start
Route::resource('category', CategoryController::class);
// category end

// Todo start
Route::resource('tudo', TudoController::class);
// Todo end

// search start
Route::resource('category_search', SearchController::class);
// search end
// search start
Route::resource('tudo_search', TudoSearchController::class);
// search end

