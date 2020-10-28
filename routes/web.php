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
Route::get('/', 'EpochController@index')->name('home');

Route::post('/date', 'EpochController@getDateFromTimestamp');
Route::get('/date', function () {
    return redirect()->route('home');
});

Route::post('/timestamp', 'EpochController@getTimestampFromDate');
Route::get('/timestamp', function () {
    return redirect()->route('home');
});

Route::post('/time-stamp', 'EpochController@getTimestampFromHumanDate');
Route::get('/time-stamp', function () {
    return redirect()->route('home');
});

Route::post('/dates', 'EpochController@getFirstAndLastOfInterval');
Route::get('/dates', function () {
    return redirect()->route('home');
});
