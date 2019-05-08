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

Route::get('/','ArticlesController@home');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::post('/articles/add-article', 'ArticlesController@store');
Route::get('/articles/edit/{id}','ArticlesController@edit');
Route::put('/articles/editArticle/{id}','ArticlesController@editArticle');
Route::delete('/articles/delete/{id}', 'ArticlesController@destroy');
Route::get('/articles','ArticlesController@index');