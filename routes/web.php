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
//route to the main dashboard
Route::get('/dashboard','DashboardController@index');
// route to add student to the databse
Route::get('/addStudent','StudentsController@create');
// // route to add teachers to the databse
Route::get('/addTeacher','TeachersController@create');
// route to add class to the databse
Route::get('/addClass','ClassController@create');
// route to add subject to the databse
Route::get('/addSubject','SubjectsController@create');
// route to add Exam to the databse
Route::get('/addExam','ExamsController@create');
// route to add Exam Results to the databse
Route::get('/addResults','ExamsController@addResult');
// route to add fees details to the databse
Route::get('/addFees','FeesController@create');
// route to add school expenditure to the databse
Route::get('/addExpenditure','ExpendituresController@create');
// // route to add Users to the databse
Route::get('/addUser','UsersController@create');
// Route::get();
// Route::resource('fees','FeesController');
// controller to display list of teachers
Route::get('/viewTeachers','TeachersController@displayTeachers');
//route to get fee details
Route::get('feeDetails','FeesController@index');
