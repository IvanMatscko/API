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

Route::get('/','GuzzleController@homeController')->name('home');

Route::post('/give',  'GuzzleController@giveСities');

Route::post('/route',  'GuzzleController@getRouteData')->name('route');
