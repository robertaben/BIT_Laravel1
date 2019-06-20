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

Route::get('/kontaktai', "PageController@contacts");


Route::get('/apie-mus', "PageController@aboutUs");

Route::get('/projektai', "ProjectController@index");
Route::get('/projektai/{id}', "ProjectController@show");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users', 'UserController@index')->name('users.index');
Route::get('/user/create', "UserController@create")->name('users.create')->middleware('auth');
Route::post('/user/store', "UserController@store")->name('users.store')->middleware('auth');

Route::get('/user/{id}', "UserController@show")->name('users.show');
Route::get('/user/{id}/edit', "UserController@edit")->name('users.edit')->middleware('auth');
Route::put('/user/{id}/update', "UserController@update")->name('users.update')->middleware('auth');
Route::delete('/user/{id}/delete', "UserController@delete")->name('users.delete')->middleware('auth');

Route::get('/user/{id}/tasks/{task_id}', 'UserController@showTask')->name('users.showTask');

Route::get('/todo/active', 'ToDoController@indexActive')->name('todo.indexActive');
Route::get('/todo/completed', 'ToDoController@indexCompleted')->name('todo.indexCompleted');
Route::post('/todo/{id}/mark-as-uncompleted', 'ToDoController@markAsUncompleted')->name('todo.uncomplete');
Route::post('/todo/{id}/mark-as-completed', 'ToDoController@markAsCompleted')->name('todo.complete');
Route::delete('/todo/deleteAll', "ToDoController@deleteALL")->name('todo.deleteAll');
Route::resource('/todo', 'ToDoController');

Route::resource('comment', 'CommentController');

