<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fees;
use App\Student;
use App\classess;

class FeesController extends Controller
{
    /**
     * Display a listing of the fees.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_classes = classess::all();
        $all_students = Student::all();
        $all_fees = Fees::all();

        return view('admin.pages.fees.view_fees', compact('all_classes'))->with('all_students',$all_students)->with('all_fees', $all_fees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_classes = classess::all();
        $all_students = Student::all();
        return view('admin.pages.fees.create', compact('all_students'))->with('all_classes', $all_classes);
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
            'student_id'=>'required',
            'school_term'=>'required',
            'total_fees'=>'required',
            'amount_paid'=>'required',
            'class_id'=>'required',
            'date_of_payment'=>'required',
            'fee_balance'=>'required',
        ]);

        $fee = new Fees;
        $fee->student_id = $request->input('student_id'); 
        $fee->class_id = $request->input('class_id');
        $fee->term_paid_for = $request->input('school_term');     
        $fee->amount_to_be_paid = $request->input('total_fees');
        $fee->amount_paid = $request->input('amount_paid');       
        $fee->date_paid = $request->input('date_of_payment');
        $fee->balance = $request->input('fee_balance');
        $fee->save();

        return redirect('/addFees')->with('success', 'Fees Paid successfully');
        
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
        $this->validate($request,[
            'student_surname'=>'required',
            'student_fname'=>'required',
            'student_lname'=>'required',
            'student_class'=>'required',
            'amount_paid'=>'required',
            'date_paid'=>'required',
            'balance'=>'required',

        ]);
        
        $id = $request->input('fees_id');
        $fee = Fees::find($id);
        $student = Student::find($id);
        $clas = classess::find($id);
        return ['id'=>$id];
        // if($student->id == $fee->student_id){
        //     $student->student_surname = $request->input('student_surname');
        //     $student->student_firstname = $request->input('student_fname');
        //     $student->student_other_name = $request->input('student_lname');
        //     $student->save();           

        //     $fee->amount_paid = $request->input('amount_paid');
        //     $fee->date_paid = $request->input('date_paid');
        //     $fee->balance = $request->input('balance');
        //     $fee->save();

        //     if($student->class_id == $clas->id){
        //         $clas->class_name = $request->input('student_class');
        //         $clas->save();
        //     }
        // }

        return redirect('/feeDetails')->with('success', 'Fees Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $fee_id = $request->input('delete_fees');
        $fee = Fees::where('id', $fee_id);
        $fee->delete();

        return redirect('/feeDetails')->with('success', 'Fees Delate Successfully');
    }
}
