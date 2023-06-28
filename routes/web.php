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
    return view('index');
});

Route::resource('club','App\Http\Controllers\ClubController');
Route::resource('score','App\Http\Controllers\ScoreController');
Route::resource('standings','App\Http\Controllers\StandingsController');

Auth::routes();

