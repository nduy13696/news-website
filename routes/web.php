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

Route::get('/','frontend\FrontendController@index')->name('frontend');

Route::get('/postIndex/detail/{slug}','frontend\FrontendController@post');

Route::post('/postIndex/search','frontend\FrontendController@search');

Route::post('/comment','frontend\FrontendController@customer');

Route::get('/postIndex/category/{slug}','frontend\FrontendController@postList');

Route::get('/categories','admin\CategoryController@index');

Route::get('/create','admin\CategoryController@create');

Route::post('/categories','admin\CategoryController@save');

Route::get('categories/delete/{id}','admin\CategoryController@delete');

Route::get('categories/edit/{id}','admin\CategoryController@edit');

Route::post('categories/edit_save/{id}','admin\CategoryController@editsave');

Route::get('/post','admin\PostController@index');

Route::get('/post/create','admin\PostController@create');

Route::post('/post','admin\PostController@save');

Route::get('/post/delete/{id}','admin\PostController@delete');

Route::get('/post/edit/{id}','admin\PostController@edit');

Route::post('post/save/{id}','admin\PostController@editsave');

Route::get('/admin','admin\loginController@index');

Route::post('/admin','admin\loginController@login');

Route::get('logout','admin\loginController@logout');


