<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();


});
Route::get('/article', [\App\Http\Controllers\Api\ArticleController::class, 'index']);
Route::get('/show', [\App\Http\Controllers\Api\ArticleController::class, 'show']);
Route::get('/store', [\App\Http\Controllers\Api\ArticleController::class, 'store']);
Route::get('/update', [\App\Http\Controllers\Api\ArticleController::class, 'update']);
Route::get('/delete', [\App\Http\Controllers\Api\ArticleController::class, 'destroy']);
