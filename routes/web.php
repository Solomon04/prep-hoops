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
    return view('pages.home');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('todo', 'TodoController@index')->name('view.todo');
Route::post('todo', 'TodoController@create')->name('create.todo');
Route::delete('todo', 'TodoController@delete')->name('delete.todo');
Route::post('todo/{id}', 'TodoController@update')->name('update.todo');
Route::get('todo/{id}', 'TodoController@read')->name('edit.todo');
Route::get('search', 'TodoController@search')->name('search.todo');
Route::get('complete/{id}', 'TodoController@complete')->name('complete.todo');
Route::get('incomplete/{id}', 'TodoController@incomplete')->name('incomplete.todo');


Route::get('categories', 'CategoryController@index')->name('view.category');
Route::post('category', 'CategoryController@create')->name('create.category');
Route::delete('category', 'CategoryController@delete')->name('delete.category');
Route::post('category/{id}', 'CategoryController@update')->name('update.category');
Route::get('category/{id}', 'CategoryController@read')->name('edit.category');

Route::get('stats', 'AccountController@stats')->name('stats');