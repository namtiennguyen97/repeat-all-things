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

Route::get('/', function () {
    return view('home');
});

Route::group(['prefix'=>'clocks'], function (){
   Route::get('/','ClockController@index')->name('clocks.index');
   Route::get('/create','ClockController@create')->name('clocks.create');
    Route::post('/create','ClockController@store')->name('clocks.store');
    Route::get('/{id}/edit','ClockController@edit')->name('clocks.edit');
    Route::post('/{id}/edit','ClockController@update')->name('clocks.update');
    Route::get('/{id}/destroy','ClockController@destroy')->name('clocks.destroy');
    Route::get('/search','ClockController@search')->name('clocks.search');
});
