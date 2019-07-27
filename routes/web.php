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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'Admin\DashboardController@index')->name('admin.dashboard');

/* CategoryController Route */
Route::get('/categories', 'Admin\CategoriesController@index')->name('categories');

/* TopicController Route */
Route::post('/topics', 'TopicsController@store')->name('topic.store');
Route::get('/topic/{topic}', 'TopicsController@show')->name('topic.show');