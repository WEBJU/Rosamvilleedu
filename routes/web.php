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
    return view('inc.dashboard');
});
//route to the main dashboard
Route::get('/dashboard','DashboardController@index');

// route to add student to the database
Route::get('/addStudent','StudentsController@create');
Route::get('/viewStudent','StudentsController@index');//show all students
Route::post('/registerStudent','StudentsController@store');//store new student information
Route::get('/searchStudent','StudentsController@search');//search for a student name
Route::post('/student/delete','StudentsController@destroy');//delete a student
Route::post('/updateStudent','StudentsController@update');//delete student record
Route::get('/student/parent_info','StudentsController@parentInfo');//get the parents information

//parents
Route::post('/parents','ParentsController@store');//store parent child relationship
Route::get('/allParents/','ParentsController@show_all');//View all parents
Route::get('/searchParent','ParentsController@search');//search by use of parent name
Route::post('/updateParent','ParentsController@update');//update record
Route::get('/searchParentStudent','ParentsController@searchParent');//search parent name and return certain details in students
//Route::get('/searchStudent/','StudentsController@searchForm');

// // route to add teachers to the databse
Route::get('/addTeacher','TeachersController@create');

// // route to add teachers to the databse
Route::post('/addTeacher/store','TeachersController@store');
// route to view all teachers
Route::get('/viewTeachers','TeachersController@index');
// route to edit and update all teachers details
Route::post('/viewTeachers/update/{teacher_id}','TeachersController@update');
// route to delete teacher's information from the databse
Route::post('/viewTeachers/destroy','TeachersController@destroy');
// route to add class to the databse
Route::post('/addClass/store','ClassController@store');
//displays class details
Route::get('/viewClass','ClassController@index');
//route to edit class
// Route::get('/classes/edit','ClassController@edit');

//print class Details

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
//route to delete subject
Route::post('/viewSubjectDetails/update/{subject_id}','SubjectsController@update');
// route to add subject to the databse
Route::get('/saveSubject','SubjectsController@store');
//
// Route::get('/viewSubjectDetails/edit', '');
// route to add Exam to the databse
 // Route::get('/addExam','ExamsController@create');//show form for creating exam
// Route::get('/viewExamDetails','ExamsController@index');//displays exams
Route::post('/saveExam','ExamsController@store');//store exam
// Route::get('/edit/{$id}',[
//   'uses'=>'ExamsController@edit'
// ]);
Route::resource('exams','ExamsController');
// Route::post('/delete/{$id}',[
//   'uses'=>'ExamsController@destroy'
// ]);
// route to add Exam Results to the databse
Route::get('/addResults','ExamsController@addResult');
// route to add fees details to the databse
Route::post('/addFees/store','FeesController@store');
// route to edit and update fees detils
Route::post('/feeDetails/update/{fees_id}','FeesController@update');
//route to view the fee page
Route::get('/addFees','FeesController@create');

// route to display a form to expenditure to the databse
Route::resource('expenditures','ExpendituresController');
// Route::get('/addExpenditure','ExpendituresController@create');
 Route::post('/saveExpenditure','ExpendituresController@store');

// route to display a form to expenditure to the databse 
Route::get('/addExpenditure','ExpendituresController@create');
Route::post('/saveExpenditure','ExpendituresController@store');

// // route to add Users to the databse
Route::get('/addUser','UsersController@create');
//route to insert users into the database
Route::post('/addUser/store','UsersController@store');
//route to view user details
Route::get('/userDetails','UsersController@index');
//route to delete user details
Route::post('/userDetails/destroy','UsersController@destroy');
// Route::resouce('/','UsersController@create');
Route::resource('class','ClassController');
// Route::get();
// Route::resource('fees','FeesController');
// controller to display list of teachers
// Route::get('/viewTeachers','TeachersController@displayTeachers');
//route to get fee details
Route::get('/feeDetails','FeesController@index');
//get subject Details
Route::post('/feeDetails/destroy','FeesController@destroy');
//get subject Details
Route::get('/viewSubjectDetails','SubjectsController@index');
//Route to display expenditures
// Route::get('/expenditureDetails','ExpendituresController@index');
//route to delete
Route::get('delete/{class_id}',['uses'=>'ClassController@delete','as'=>'delete-class']);
//expenditure report
Route::get('/expenditure/chart','ExpendituresController@chart');