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

//Auth::routes();




Route::resource('/','IndexController',[
                                        'only' => 'index',
                                        'names' => [
                                            'index' => 'home'
                                        ]
                                      ]);

Route::resource('/portfolios','PortfolioController',[
                                                        'parameters' => [
                                                            'portfolios' => 'alias',
                                                        ]
                                                    ]);

Route::resource('/articles','ArticleController',[
                                                    'parameters' => [
                                                        'articles' => 'alias',
                                                    ]
                                                ]);


Route::get('/articles/cat/{cat_alias?}',['uses' => 'ArticleController@index','as' => 'articlesCat']);


Route::resource('/comment','CommentController',['only' => 'store']);

Route::get('/contacts',['uses' => 'ContactController@index','as' => 'contacts']);
Route::post('/contacts',['uses' => 'ContactController@store','as' => 'contacts']);

/*Route::post('/login',['uses' => '\Auth\LoginController@login'])*/;

Route::namespace('Auth')->group(function () {
    Route::get('/login',['uses' => 'LoginController@showLoginForm','as' => 'login']);
    Route::post('/login',['uses' => 'LoginController@login','as' => 'login']);
    Route::get('/logout',['uses' => 'LoginController@logout','login']);

});
