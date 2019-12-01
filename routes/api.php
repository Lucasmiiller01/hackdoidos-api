<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => [/*'auth:api'*/]], function () {
    Route::post('/user', 'UserController@store')->name('user.create');
    Route::get('/events', 'EventController@index')->name('event.all');
    Route::post('/events', 'EventController@store')->name('event.create');
});
