<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user', 'App\Http\Controllers\UserController@index');
Route::post('/user/register', 'App\Http\Controllers\UserController@register');
Route::post('/user/registerForm', 'App\Http\Controllers\UserController@registerForm');

Route::get('/register', [App\Http\Controllers\UserController::class, 'create'])
->middleware('guest')
->name('register');

Route::get('/registerForm', [App\Http\Controllers\UserController::class, 'createForm'])
->middleware('guest')
->name('register');

Route::get('/view', 'App\Http\Controllers\ViewAction');
Route::get('/download', 'App\Http\Controllers\DownloadAction');
Route::get('/redirect', 'App\Http\Controllers\RedirectAction');
Route::get('/stream', 'App\Http\Controllers\StreamAction');
Route::get('/payload', 'App\Http\Controllers\ArticlePayloadAction');