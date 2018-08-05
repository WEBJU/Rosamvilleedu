<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teachers;
use App\Users;

class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // //getting all teachers from the database
        $teacher = Teachers::all();
        // // getting all users from the database
        $users = Users::all();

        // return view('admin.pages.teacher.view_teacher', compact('user'))->with('teacher', $teacher);
        return view('admin.pages.teacher.view_teacher',compact('users'))->with('teacher', $teacher);

    }
    /**
     * Show the table for displaying a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function displayTeachers(){
      return view('admin.pages.teacher.view_teacher');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'surname'=>'required|string|min:2',
            'first_name'=>'required|string|min:2',
            'other_name'=>'required|string|min:2',
            'national_id'=>'required|integer',
            'tsc_number'=>'required|integer',
            'experience'=>'required|string|min:4',
            'subjects_taught'=>'required',
            'email_address'=>'required|email',
            'phone_number'=>'required|string|regex:/(07)[0-9]{8}/',
            'password'=>'required',
        ]);
        
        $user = new Users;
        $user->sur_name = $request->input('surname');
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('other_name');
        $user->email = $request->input('email_address');
        $user->phone_no = $request->input('phone_number');
        $user->password = $request->input('password');
        $user->national_id = $request->input('national_id');
        $user->extra_information = $request->input('experience');
        $user->save();

        $user_id = $user->id;

        $teacher = new Teachers;
        $teacher->user_id = $user_id;
        $teacher->teacher_tsc_no = $request->input('tsc_number');
        $teacher->subject_specialized = $request->input('subjects_taught');
        $teacher->save();

        return redirect('/addTeacher')->with('success','Teacher added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $teacher_id = $request->input('delete_teacher');
        $teacher = Teachers::where('user_id', $teacher_id);

        if($teacher->delete()){
            $user = Users::where('id', $teacher_id);
            $user->delete();
        }

        return redirect('/viewTeachers')->with('success', 'Details deleted Successfully');
    }
}
