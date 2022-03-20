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

Route::get('/request', 'App\Http\Controllers\RequestAction');
Route::get('/payload', 'App\Http\Controllers\PayloadAction');

Route::post('/user/register', 'App\Http\Controllers\UserController@registerApi');

Route::get('/text', 'App\Http\Controllers\TextAction');
Route::get('/json', 'App\Http\Controllers\JsonAction');
Route::get('/jsonp', 'App\Http\Controllers\JsonpAction');