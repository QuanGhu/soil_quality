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
Route::get('testing', function () {
    return view('testing');
});

Route::get('/login','Auth\LoginController@loginView')->name('login.view');
Route::post('/login','Auth\LoginController@login')->name('login');
Route::get('/logout','Auth\LoginController@logout')->name('logout');
Route::get('/register','Auth\RegisterController@registerView')->name('register.view');
Route::post('/register','Auth\RegisterController@register')->name('register');

Route::group(['namespace' => 'Web','middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/profilesaya','HomeController@myProfile')->name('myprofile');
    Route::get('/editprofile','HomeController@editProfileView')->name('changeprofile.view');
    Route::put('/changeprofile','HomeController@changeProfile')->name('changeprofile');
    Route::get('/gantipassword','HomeController@changePasswordView')->name('changepassword.view');
    Route::put('/gantipassword','HomeController@changePasswordProcess')->name('changepassword.process');

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
                        Route::post('/list','CausesController@list')->name('list');
                        Route::post('/save','CausesController@save')->name('save');
                        Route::put('/update','CausesController@update')->name('update');
                        Route::delete('/delete','CausesController@delete')->name('delete');
                    });
                });

                Route::group(['prefix' => 'solusi'], function () {
                    Route::name('solution.')->group( function() {
                        Route::get('/','SolutionController@index')->name('index');
                        Route::post('/list','SolutionController@list')->name('list');
                        Route::post('/save','SolutionController@save')->name('save');
                        Route::put('/update','SolutionController@update')->name('update');
                        Route::delete('/delete','SolutionController@delete')->name('delete');
                    });
                });

                Route::group(['prefix' => 'ketentuan'], function () {
                    Route::name('rule.')->group( function() {
                        Route::get('/','RuleController@index')->name('index');
                        Route::get('/new','RuleController@new')->name('new');
                        Route::get('/view/{id}','RuleController@view')->name('view');
                        Route::get('/edit/{id}','RuleController@edit')->name('edit');
                        Route::post('/save','RuleController@save')->name('save');
                        Route::post('/list','RuleController@list')->name('list');
                        Route::put('/update','RuleController@update')->name('update');
                        Route::delete('/delete','RuleController@delete')->name('delete');
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
                        Route::post('/list','UserController@list')->name('list');
                    });
                });

                Route::name('level.')->group( function() {
                    Route::group(['prefix' => 'level'], function () {
                        Route::get('/','UserLevelController@index')->name('index');
                        Route::post('/list','UserLevelController@list')->name('list');
                        Route::post('/save','UserLevelController@save')->name('save');
                        Route::put('/update','UserLevelController@update')->name('update');
                        Route::delete('/delete','UserLevelController@delete')->name('delete');
                    });
                });

            });    
        });

    });

    Route::group(['namespace' => 'Customer'], function () {
        Route::name('customer.')->group( function() {
            Route::group(['prefix' => 'penilaian'], function () {
                Route::get('/','SoilQualityAssessmentController@index')->name('index');
                Route::get('/new','SoilQualityAssessmentController@new')->name('new');
                Route::post('/analyze','SoilQualityAssessmentController@analyze')->name('analyze');
                Route::post('/list','SoilQualityAssessmentController@list')->name('result.list');
                Route::get('/result/{id}','SoilQualityAssessmentController@showResult')->name('result');
                Route::get('/printlist','SoilQualityAssessmentController@showListReport')->name('print.list');
                Route::get('/printdetail/{id}','SoilQualityAssessmentController@printDetail')->name('print.detail');
            });    
        });
    });

});

    
// Route::get('/home', 'HomeController@index')->name('home');
