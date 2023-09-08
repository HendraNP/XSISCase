<?php

use Illuminate\Http\Request;
use App\Http\Controllers\MoviesController;
use Illuminate\Support\Facades\Route;

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

//Movies
Route::get('/Movies', [MoviesController::class, 'list']);
Route::get('/Movies/{id}', [MoviesController::class, 'movie']);
Route::post('/Movies', [MoviesController::class, 'add']);
Route::post('/Movies/{id}', [MoviesController::class, 'update']); //UT using POST instead of PATCH
Route::delete('/Movies/{id}', [MoviesController::class, 'delete']);
