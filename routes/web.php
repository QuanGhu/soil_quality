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
    return view('layouts.master');
});

Route::group(['namespace' => 'Web'], function () {

    Route::group(['namespace' => 'Soil'], function () {
        Route::name('criteria.')->group( function() {
            Route::group(['prefix' => 'kriteria'], function () {
                Route::get('/','CriteriaController@index')->name('index');
            });    
        });

        Route::name('property.')->group( function() {
            Route::group(['prefix' => 'sifat'], function () {
                Route::get('/','PropertiesController@index')->name('index');
            });    
        });
    });

});

    
