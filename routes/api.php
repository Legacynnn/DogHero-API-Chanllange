<?php

use App\Http\Controllers\DogsController;
use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Users Public Routes
Route::post('users', [UsersController::class, 'store']);
Route::post('login', [UsersController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    //Users Routes
    Route::get('users', [UsersController::class, 'index']);
    Route::get('me', [UsersController::class, 'me']);
    Route::get('logout', [UsersController::class, 'logout']); //Destroy the token
    Route::get('users/{id}', [UsersController::class, 'show']);
    Route::put('users/{id}', [UsersController::class, 'update']);
    Route::delete('users/{id}', [UsersController::class, 'destroy']);


    //Dogs Routes
    Route::get('dog', [DogsController::class, 'index']);
    Route::post('dog', [DogsController::class, 'store']);
    Route::get('dog/{id}', [DogsController::class, 'show']);
    Route::put('dog/{id}', [DogsController::class, 'update']);
    Route::delete('dog/{id}', [DogsController::class, 'destroy']);
    Route::get('myDogs', [DogsController::class, 'myDogs']);

    //Walkers
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
