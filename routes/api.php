<?php

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

Route::post('authenticate', 'AuthenticationController@doLogin')->name('authenticate.store');

Route::middleware(['auth:api'])->group(function () {
    // All routes here are protected
    Route::get('users', 'UserController@index');
});

Route::post('/date', 'EpochController@getDateFromTimestamp');

Route::post('/timestamp', 'EpochController@getTimestampFromDate');

Route::post('/timestamp-human', 'EpochController@getTimestampFromHumanDate');

Route::post('/begin-end', 'EpochController@getBeginEndOfInterval');

Route::post('/timezone', 'EpochController@getDateForTimezone');
