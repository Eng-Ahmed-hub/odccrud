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
Route::get('/show/{id}', [\App\Http\Controllers\Api\ArticleController::class, 'show']);
Route::post('/article/store', [\App\Http\Controllers\Api\ArticleController::class, 'store']);
Route::post('/update/{id}', [\App\Http\Controllers\Api\ArticleController::class, 'update']);
Route::get('/delete/{id}', [\App\Http\Controllers\Api\ArticleController::class, 'destroy']);

Route::post('/post/create', 'App\Http\Controllers\ApiPostController@create');
Route::post('/post/update/{id}', 'App\Http\Controllers\ApiPostController@update');
Route::get('/post/delete/{id}', 'App\Http\Controllers\ApiPostController@delete');
Route::get('/posts', 'App\Http\Controllers\ApiPostController@index');
Route::get('/post/index', 'App\Http\Controllers\ApiPostController@index');
Route::get('/post/show/{id}', 'App\Http\Controllers\ApiPostController@show');
