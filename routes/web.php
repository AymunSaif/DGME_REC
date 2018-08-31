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

Route::resource('job_form','JobFormController')->middleware('auth');
// job_form.store
// job_form.create
Route::get('/form', 'JobFormController@index')->name('index')->middleware('auth');
Auth::routes();
