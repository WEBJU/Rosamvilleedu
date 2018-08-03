<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;

class SubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects=Subject::All();
        return view('admin.pages.subject.view_subject')->with('subjects',$subjects);
        // $sbjs = Subject::all();
        // return view('admin.pages.subject.view_subject')->with('sbjs', $sbjs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.subject.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // form validation
        $this->validate($request,[
          'subject_name'=>'required'
        ]);
        //create subject
        $subject=new Subject;
        $subject->subject_name=$request->input('subject_name');
        $subject->save();
        return redirect('/addSubject')->with('success','Subject created successfully');
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
    public function edit(Request $request)
    {
        // $subject_id = $request->input('edit_subject');
        // $subject = Subject::where('id', $subject_id);
        
        // return view('admin.pages.subject.edit_subject')->with('subject', $subject);
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
        $subject_id = $request->input('delete_subject');
        $subject = Subject::where('id', $subject_id);
        $subject->delete();

        return redirect('/viewSubjectDetails')->with('success', 'Details deleted Successfully');
        
    }
}
