<?php

namespace App\Http\Controllers;
use App\Teachers;
use App\Users;
use App\classess;
use Illuminate\Http\Request;


class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $classess=classess::all();
      return view('admin.pages.class.view_class')->with('classess',$classess);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers=Teachers::all();
        return view('admin.pages.class.create')->with('teachers',$teachers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // validate entries
        $request->validate([
          'class_name'=>'required',
          'class_capacity'=>'required',
          'class_teacher'=>'required',
          // 'class_year'=>'required'
        ]);
        // save Record
        $classess=new classess;
        $classess->class_name=$request->input('class_name');
        $classess->class_capacity=$request->input('class_capacity');
        $classess->class_prefect_id=$request->input('class_prefect');
        $classess->class_teacher_id=$request->input('class_teacher');
        // $classess->class_year=$request->input('class_year');
        $classess->save();
        return back()->with('success','New Class added successfully');
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
           
        $class=classess::find($id);
        return view('admin.pages.class.edit_class',compact('class','id'));
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
        $classess=classess::find($id);
        $classess->class_name=$request->input('class_name');
        $classess->class_capacity=$request->input('class_capacity');
        $classess->class_prefect_id=$request->input('class_prefect');
        $classess->class_teacher_id=$request->input('class_teacher');
        // $classess->class_year=$request->input('class_year');
        $classess->save();
        return back()->with('success',' Class Edited successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     classess::destroy($id);
    //     return redirect()->back()->with('success','Class deleted successfully');
    // }
    public function destroy($id)
    {
        $classess=classess::findOrFail($id);
        $classess->delete();
        return redirect()->back()->with('success','Class deleted successfully');
    }
}
