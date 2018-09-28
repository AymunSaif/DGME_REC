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
    return redirect('/login');
});


Route::get('/dashboard', function () {
    return view('recuritment.mainpage');
})->name('myhome');

Route::get('/new', function () {
    return view('newlogin');
});
// ADMIN
Route::group(['middleware' => ['role:admin','auth']], function () {

});

// DATAENTRY
Route::group(['middleware' => ['role:dataentry','auth']], function () {
Route::get('createCnic','JobFormController@createCnic')->name('createCnic');
Route::post('storecnic','JobFormController@storeCnic')->name('storeCnic');
Route::get('/DmcFilter','JobFormController@getDMCWise')->name('getDMCWise');
Route::get('/summary','JobFormController@showsummary')->name('summary');
Route::get('/job_form_create/{cnic}','JobFormController@create')->name('job_form_create');
Route::resource('job_form','JobFormController',['except' =>['create']])->middleware('auth');
Route::post('/secondarySubject','SecondarySubjectController@getCustom')->name('getSecondaryCustomSubject');
Route::post('/higherSubject','HigherSubjectController@getCustom')->name('getCustomSubject');
Route::get('/univ','UniversityController@getuniv')->name('getuniv');
Route::post('/district','DistrictController@getDistrict')->name('getDistrict');
Route::get('/form', 'JobFormController@index')->name('index')->middleware('auth');
});
Route::get('/403', function () {
    return view('403');
});
Auth::routes();
