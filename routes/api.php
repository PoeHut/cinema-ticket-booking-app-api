<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MovieController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/user/register', [AuthController::class, 'register']);
Route::post('/user/login', [AuthController::class, 'login']);

Route::middleware(['check.auth.token'])->group(function () {
    Route::get('/user/check', function (Request $request) {
        return response()->json($request->user());
    });

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::controller(MovieController::class)->group(function () {
        Route::prefix('movie')->group(function () {
            Route::post('/create', 'createMovie');
            Route::get('/all', 'getAllMovies');
            Route::get('/{id}', 'getMovieById');
            Route::post('/update', 'updateMovie');
            Route::post('/delete', 'deleteMovie');
        });
        
    });
});


