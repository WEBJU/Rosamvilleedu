<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expenditure;
class ExpendituresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $expenditures=Expenditure::All();
      return view('admin.pages.expenditures.view_expenditures')->with('expenditures',$expenditures);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.pages.expenditures.create');
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
          'expenditure'=>'required',
          'description'=>'required',
          'amount'=>'required',
          'date_spend'=>'required'
        ]);
        $expenditure=new Expenditure;
        $expenditure->expenditure_type=$request->input('expenditure');
        $expenditure->description=$request->input('description');
        $expenditure->amount_spend=$request->input('amount');
        $expenditure->date_spend=$request->input('date_spend');
        $expenditure->save();
        return redirect('/addExpenditure')->with('success','Expenditure created successfully');
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
