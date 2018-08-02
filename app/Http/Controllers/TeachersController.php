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
            'surname'=>'required',
            'first_name'=>'required',
            'other_name'=>'required',
            'national_id'=>'required',
            'tsc_number'=>'required',
            'experience'=>'required',
            'subjects_taught'=>'required',
            'email_address'=>'required',
            'phone_number'=>'required',
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

        return redirect('/addTeacher')->with('success','Subject created successfully');
        
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
    public function destroy($id)
    {
        //
    }
}
