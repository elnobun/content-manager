<?php

//use Illuminate\Http\Request;

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

// Auth POST request

use Illuminate\Support\Facades\Route;

Route::post('/register', 'AuthController@register');
Route::post('/login', 'AuthController@login');
Route::post('/logout', 'AuthController@logout');

// Auth GET request
Route::get('/user', 'AuthController@user');

// pre-fix group of routes for topic
Route::group(['prefix' => 'topics'], function () {
    Route::post('/', 'TopicController@store')->middleware('auth:api');
    Route::get('/', 'TopicController@index');
    Route::get('/{topic}', 'TopicController@show');
});
