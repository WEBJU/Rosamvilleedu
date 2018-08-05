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
Route::get('/viewStudent','StudentsController@index');//show all students
Route::get('/addparent/existing_parents/{id}','StudentsController@all_parents');//add existing parent
Route::post('/registerStudent','StudentsController@store');//store new student information
Route::get('/searchStudent','StudentsController@search');//search for a student name
Route::post('/student/delete','StudentsController@destroy');//delete a student
Route::post('/updateStudent','StudentsController@update');//delete student record
Route::post('/parents','ParentsController@store');//store parent child relationship
Route::get('/student/parent_info','StudentsController@parentInfo');//get the parents information
//Route::get('/searchStudent/','StudentsController@searchForm');

// // route to add teachers to the databse
Route::get('/addTeacher','TeachersController@create');

// // route to add teachers to the databse
Route::post('/addTeacher/store','TeachersController@store');
// route to add class to the databse
Route::get('/viewTeachers','TeachersController@index');
// route to delete teacher's information from the databse
Route::post('/viewTeachers/destroy','TeachersController@destroy');
// route to add class to the databse
Route::post('/addClass/store','ClassController@store');
//displays class details
Route::get('/viewClass','ClassController@index');
//route to view class form
Route::get('/addClass','ClassController@create');
// route to add subject to the databse
Route::post('/addSubject/store','SubjectsController@store');
//route to view subjects page
Route::get('/addSubject','SubjectsController@create');
//route to store
Route::post('/addSubject/edit','SubjectsController@edit');
//route to delete subject
Route::post('/viewSubjectDetails/destroy','SubjectsController@destroy');
// route to add subject to the databse
Route::get('/saveSubject','SubjectsController@store');
//
// Route::get('/viewSubjectDetails/edit', '');
// route to add Exam to the databse
Route::get('/addExam','ExamsController@create');//show form for creating exam
Route::get('/viewExamDetails','ExamsController@index');//displays exams
Route::get('/saveExam','ExamsController@store');//store exam
// route to add Exam Results to the databse
Route::get('/addResults','ExamsController@addResult');
// route to add fees details to the databse
Route::post('/addFees/store','FeesController@store');
//route to view the fee page
Route::get('/addFees','FeesController@create');
// route to display a form to expenditure to the databse
Route::get('/addExpenditure','ExpendituresController@create');
Route::post('/saveExpenditure','ExpendituresController@store');
// // route to add Users to the databse
Route::get('/addUser','UsersController@create');
//route to insert users into the database
Route::post('/addUser/store','UsersController@store');
//route to view user details
Route::get('/userDetails','UsersController@index');
// Route::resouce('/','UsersController@create');

// Route::get();
// Route::resource('fees','FeesController');
// controller to display list of teachers
// Route::get('/viewTeachers','TeachersController@displayTeachers');
//route to get fee details
Route::get('/feeDetails','FeesController@index');
//get subject Details
Route::get('/viewSubjectDetails','SubjectsController@index');
//Route to display expenditures
Route::get('/expenditureDetails','ExpendituresController@index');
