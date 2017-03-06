<?php

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

use App\Pick;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', function () {
    return App\User::get();
});


// Make Picks Page
Route::get('/get-open-day', 'AvailableController@index');
Route::get('/available-teams/{user_id}', 'AvailableController@available');
Route::get('/used-teams/{user_id}', 'AvailableController@used');

Route::post('/save-picks/{user_id}', 'PicksController@savePicks');

// Grid Page
Route::get('/users', 'GridController@index');


