<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fees;
class FeesController extends Controller
{
    /**
     * Display a listing of the fees.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('admin.pages.fees.view_fees');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.fees.create');
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
            'school_terms'=>'required',
            'total_fees'=>'required',
            'amount_paid'=>'required',
            'class_id'=>'required',
            'date_of_payment'=>'required',
            'fee_balance'=>'required',
        ]);

        $fee = new Fees;
        $fee->student_id = $request->input('student_id');
        $fee->student_id = $request->input('school_terms');
        $fee->amount_to_be_paid = $request->input('total_fees');
        $fee->amount_id = $request->input('amount_paid');
        $fee->class_id = $request->input('class_id');
        $fee->date_paid = $request->input('date_of_payment');
        $fee->balancee = $request->input('fee_balance');
        $fee->save();

        return view();
        
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
