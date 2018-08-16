<?php

namespace App\Http\Controllers;
use App\Student;
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

      //get the name of the prefect and to array(classes)
        foreach ($classess as $class){
            $student_prefect_id = $class->class_prefect_id;

            //check if the prefect id is empty or not
            if($student_prefect_id == null){
                //its empty display no information
                    $class['prefect_name'] = "No assigned Prefect Yet";
            }else{
                //fetch the prefect information from students table
                    $student_prefect = Student::find($student_prefect_id);
                    $class['prefect_name'] = $student_prefect->student_surname." ".$student_prefect->student_firstname ." ".$student_prefect->student_other_name;
            }

        }

        //get the teachers name
        foreach ($classess as $class){
            $teacher_details = Users::find($class->class_teacher_id);
            $class['teacher_name'] = $teacher_details->sur_name." ".$teacher_details->first_name." ".$teacher_details->last_name;
        }

        //return $classess;
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

        //get the teacher's name and add to array(teachers)
        foreach ($teachers as $teacher){
            $teacher_details = Users::find($teacher->user_id);
            $teacher['teacher_name'] = $teacher_details->sur_name." ".$teacher_details->first_name." ".$teacher_details->last_name;
        }

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
        //get the class information
        $class=classess::find($id);

        //get the class teachers name
        $teacher_details = Users::find($class->class_teacher_id);
        $class['class_teacher_name'] = $teacher_details->sur_name." ".$teacher_details->first_name." ".$teacher_details->last_name;

        //get all the teachers
        $teachers = Teachers::all();
        foreach ($teachers as $teacher){
            $teacher_details = Users::find($teacher->id);
            $teacher['teacher_name'] = $teacher_details->sur_name." ".$teacher_details->first_name." ".$teacher_details->last_name;
        }

        //get the prefects name
        $student_prefect_id = $class->class_prefect_id;

            //check if the prefect id is empty or not
            if($student_prefect_id == null){
                //its empty display no information
                $class['prefect_name'] = "No assigned Prefect Yet";
            }else{
                //fetch the prefect information from students table
                $student_prefect = Student::find($student_prefect_id);
                $class['prefect_name'] = $student_prefect->student_surname." ".$student_prefect->student_firstname ." ".$student_prefect->student_other_name;
            }

        /*
         *get all the students who belong to this class
         * add their names to the prefect list
         *  plus their id's
         */
        $class_students = Student::where('class_id','=',$class->id)->get();

        //return $teachers;
        return view('admin.pages.class.edit_class',['class'=>$class,'class_students'=>$class_students,'teachers'=>$teachers]);
        //return view('admin.pages.class.edit_class',compact('class','id'));
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
        //check if the class has any students
        $class_count = Student::where('class_id','=',$id)->count();

        //if students exists then you can't erase a class
        if($class_count > 0 ){
            return redirect()->back()->with('error','ERROR: YOU CANT DELETE THIS CLASS BECAUSE A student is already enrolled in this class. Total students enrolled: '.$class_count);
        }else{
        //erase the class
            $classess=classess::findOrFail($id);
            $classess->delete();
            return redirect()->back()->with('success','Class deleted successfully');
        }
        //return $class_count;

    }
}
