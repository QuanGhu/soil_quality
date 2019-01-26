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
                Route::post('/list','CriteriaController@list')->name('list');
                Route::post('/save','CriteriaController@save')->name('save');
                Route::put('/update','CriteriaController@update')->name('update');
                Route::delete('/delete','CriteriaController@delete')->name('delete');
            });    
        });

        Route::name('property.')->group( function() {
            Route::group(['prefix' => 'sifat'], function () {
                Route::get('/','PropertiesController@index')->name('index');
                Route::post('/list','PropertiesController@list')->name('list');
                Route::post('/save','PropertiesController@save')->name('save');
                Route::put('/update','PropertiesController@update')->name('update');
                Route::delete('/delete','PropertiesController@delete')->name('delete');

                Route::group(['prefix' => 'penyebab'], function () {
                    Route::name('causes.')->group( function() {
                        Route::get('/','CausesController@index')->name('index');
                    });
                });

                Route::group(['prefix' => 'solusi'], function () {
                    Route::name('solution.')->group( function() {
                        Route::get('/','SolutionController@index')->name('index');
                    });
                });
            });    
        });
    });

    Route::group(['namespace' => 'Admin'], function () {
        Route::name('admin.')->group( function() {
            Route::group(['prefix' => 'administrator'], function () {

                Route::name('user.')->group( function() {
                    Route::group(['prefix' => 'pengguna'], function () {
                        Route::get('/','UserController@index')->name('index');
                    });
                });

                Route::name('level.')->group( function() {
                    Route::group(['prefix' => 'level'], function () {
                        Route::get('/','UserLevelController@index')->name('index');
                    });
                });

            });    
        });

    });

});

    
