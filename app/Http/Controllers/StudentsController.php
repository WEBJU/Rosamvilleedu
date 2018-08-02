<?php

namespace App\Http\Controllers;

use App\classess;
use App\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //show all students
        //$students = Student::all(); instead paginate
        $students = Student::paginate(20);
        foreach ($students as $student){
            $class = classess::find($student->class_id);
            $student['student_class']=$class->class_name;
        }

        return view('admin.pages.student.all_students',['students'=>$students]);
    }

    /*
     * Display all parents
     *
     */
    public function all_parents($id){
        //check if student has two parents / guardian /single_parent
        /*
         *
         */
        return view('admin.pages.student.view_parents');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = classess::all();
        return view('admin.pages.student.create',['all_classes'=>$classes]);
    }

    /*
     * Searchfor information
     * */
    public function search(Request $request){
        if($request->ajax()){
            $output = "";
            $search_name = request('search');
            //check if its empty
            if(empty($search_name)){
                $students = Student::all();
            }else{
                $students = Student::where('student_surname','like','%'.$search_name.'%')
                    ->orWhere('student_firstname','like','%'.$search_name.'%')
                    ->orWhere('student_other_name','like','%'.$search_name.'%')
                    ->get();
            }

           if($students){
                foreach ($students as $student){
                    //get the class name
                    $class = classess::find($student->class_id);
                    $student['student_class']=$class->class_name;

                    //display the output
                    $output = '<tr>'.
                        '<td>'.$student->student_surname.'</td>'.
                        '<td>'.$student->student_firstname.'</td>'.
                        '<td>'.$student->student_other_name.'</td>'.
                        '<td>'.$student->student_class.'</td>'.
                        '<td>'.$student->student_date_of_birth.'</td>'.
                        '<td>'.
                            '<a href="/addparent/existing_parents/'.$student->id.'" class="btn btn-primary">Existing parent</a>'.
                            '<a href="#" class="btn btn-success" id="new_parent">New parent </a>'.
                        '</td>'.
                        '<td>'.
                            '<a href="#" class="btn btn-danger m-1" id="delete_student">Delete</a>'.
                            '<a href="#" class="btn btn-info" id="edit_student">Edit'.
                            '</a><a href="#" class="btn btn-secondary m-1" id="student_details">More Details</a>'.
                        '</td>'.
                        '</tr>';

                    echo $output;
                }
            //return response($output);

            }else{
                $output = '<tr>'.'<td align="center" colspan="7">No Data found</td>'.'</tr>';
                echo $output;
             //   return response($output);
            }



        }

    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate the data
        $request->validate([
            'surname' => 'required|string|min:2',
            'first_name'=>'required|string|min:2',
            'other_name'=>'required|string|min:2',
            'Date_of_Birth'=>'required|string|min:2',
            'religion'=>'required|string',
            'school_attended'=>'required|string|min:2',
            'siblings'=>'required|integer',
            'medical_info'=>'required|string|min:4',
            'emergency_name'=>'required|string|min:2',
            'emergency_phone'=>'required|string|regex:/(07)[0-9]{8}/',
            'emergency_relationship'=>'required|string|min:2',
            'class_id'=>'required|integer',
        ]);

        //save the record
        $student = new Student();
        $student->student_surname = request('surname');
        $student->student_firstname = request('first_name');
        $student->student_other_name = request('other_name');
        $student->student_date_of_birth = request('Date_of_Birth');
        $student->student_religion = request('religion');
        $student->student_medical_info = request('medical_info');
        $student->primary_school_attended = request('school_attended');
        $student->emergency_name = request('emergency_name');
        $student->emergency_relationship = request('emergency_relationship');
        $student->emergency_contact = request('emergency_phone');
        $student->class_id = request('class_id');
        $student->student_number_of_siblings = request('siblings');
        $student->save();

        return back()->with('message','New Record has been saved successfully');
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
