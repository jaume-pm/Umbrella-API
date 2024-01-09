<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\JsonResponse;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConcertController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\UserController;

use App\Http\Requests\StoreConcertRequest;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
});

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::get('user/concerts', [ConcertController::class, 'indexUserConcerts']);
    Route::get('concerts', [ConcertController::class, 'index']);
    Route::get('artists', [ArtistController::class, 'index']);
    Route::patch('update_balance', [UserController::class,'updateBalance']);
});


Route::middleware(['auth:sanctum','admin'])->prefix('v1')->group(function () {
    Route::post('concerts', [ConcertController::class,'store']);
    Route::post('concerts/artist', [ConcertController::class,'addArtist']);
    
});


