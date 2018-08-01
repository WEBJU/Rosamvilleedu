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
    return view('admin.index');
});
Route::get('/dashboard','DashboardController@index');
Route::get('/addStudent','StudentsController@create');
Route::get('/addTeacher','TeachersController@create');
Route::get('/addClass','ClassController@create');
Route::get('/addSubject','SubjectsController@create');
Route::get('/addExam','ExamsController@create');
Route::get('/addResults','ExamsController@addResult');
Route::get('/addFees','FeesController@create');
Route::get('/addExpenditure','ExpendituresController@create');
Route::get('/addUser','UsersController@create');
// Route::get();
// Route::resource('fees','FeesController');
