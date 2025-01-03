<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\SeatController;
use App\Http\Controllers\Api\MovieController;
use App\Http\Controllers\Api\SeatNumController;
use App\Http\Controllers\Api\ShowTimeMgmtController;
use App\Http\Controllers\Api\BookingServiceController;

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

    Route::controller(ShowTimeMgmtController::class)->group(function () {
        Route::prefix('show-time')->group(function () {
            Route::post('/create', 'createMovieShowTime');
            Route::get('/all', 'getAllMovieShowTime');
            Route::get('/{id}', 'getMovieShowTimeById');
            Route::post('/update', 'updateMoiveShowTime');
            Route::post('/delete', 'deleteMovieShowTime');
        });
    });

    Route::controller(SeatController::class)->group(function () {
        Route::prefix('seat')->group(function () {
            Route::post('/create', 'createSeat');
            Route::get('/all', 'getAllSeats');
            Route::get('/{id}', 'getSeatById');
            Route::post('/update', 'updateSeat');
            Route::post('/delete', 'deleteSeat');
        });
    });

    Route::controller(SeatNumController::class)->group(function () {
        Route::prefix('seat-num')->group(function () {
            Route::post('/create', 'createSeat');
            Route::get('/all', 'getAllSeats');
            Route::get('/room', 'getRoomSeats');
            Route::get('/{id}', 'getSeatById');
            Route::post('/update', 'updateSeat');
            Route::post('/delete', 'deleteSeat');
        });
    });

    Route::controller(BookingServiceController::class)->group(function () {
        Route::prefix('booking')->group(function () {
            Route::post('/create', 'createBooking');
            Route::get('/booked-seats/{id}', 'getBookedRoomSeats');
        });
    });
});


