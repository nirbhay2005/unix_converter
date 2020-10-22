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
Route::get('/', 'TimestampController@index')->name('home');

Route::post('/date', 'TimestampController@getDateFromTimestamp');
Route::get('/date', function () {
    return redirect()->route('home');
});

Route::post('/timestamp', 'TimestampController@getTimestampFromDate');
Route::get('/timestamp', function () {
    return redirect()->route('home');
});

Route::post('/time-stamp', 'TimestampController@getTimestampFromHumanDate');
Route::get('/time-stamp', function () {
    return redirect()->route('home');
});

Route::post('/dates', 'TimestampController@getFirstAndLastOfInterval');
Route::get('/dates', function () {
    return redirect()->route('home');
});
