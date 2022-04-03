<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotoController;
use App\Http\Middleware;

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

Route::middleware('UserIsValid')->group(function () {
    Route::post('/photos',[PhotoController::class, 'store']);
    Route::post('/photos/{id}',[PhotoController::class, 'update']);
    Route::delete('/photos/{id}',[PhotoController::class, 'destroy']);
    Route::post('/photos/{id}/like',[PhotoController::class, 'like']);
    Route::post('/photos/{id}/unlike',[PhotoController::class, 'unlike']);    
});
// Route::post('/photos/{id}/like',[PhotoController::class, 'like'])->middleware('UserIsValid');
Route::get('/photos',[PhotoController::class, 'index']);
Route::get('/photos/{id}',[PhotoController::class, 'show']);

