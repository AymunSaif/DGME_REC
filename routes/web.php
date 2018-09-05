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

Route::get('createCnic','JobFormController@createCnic')->name('createCnic');
Route::post('storecnic','JobFormController@storeCnic')->name('storeCnic');
Route::get('/job_form_create/{cnic}','JobFormController@create')->name('job_form_create');
Route::resource('job_form','JobFormController',['except' =>['create']])->middleware('auth');
Route::post('/higherSubject','HigherSubjectController@getCustom')->name('getCustomSubject');
Route::get('/form', 'JobFormController@index')->name('index')->middleware('auth');
Auth::routes();
