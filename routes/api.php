<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//
//Route::get('todo', 'TodoController@index')->name('view.todo');
//Route::post('todo', 'TodoController@create')->name('create.todo');
//Route::delete('todo', 'TodoController@delete')->name('delete.todo');
//Route::put('todo/{id}', 'TodoController@update')->name('update.todo');
//Route::post('complete/{id}', 'TodoController@complete')->name('complete.todo');
//Route::post('incomplete/{id}', 'TodoController@incomplete')->name('incomplete.todo');
//
//
//Route::get('categories', 'CategoryController@index')->name('view.category');
//Route::post('category', 'CategoryController@create')->name('create.category');
//Route::delete('category/{id}', 'CategoryController@delete')->name('delete.category');
//Route::update('category/{id}', 'CategoryController@update')->name('update.category');