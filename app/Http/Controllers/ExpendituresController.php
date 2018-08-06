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
        return redirect()->back()->with('success','Expenditure created successfully');
    }
    /**
     * displays expenditures report
     .
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function chart(){
        
        $expenditure=Expenditure::all();
        return response()->json($expenditure);
//        return view('admin.pages.expenditures.expenditure_report')->with('expenditure',$expenditure);
        
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
        $expenditure=Expenditure::find($id);
        return view('admin.pages.expenditures.edit_expenditure',compact('expenditure','id'));
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
      $expenditure=Expenditure::find($id);
      $expenditure->expenditure_type=$request->input('expenditure');
      $expenditure->description=$request->input('description');
      $expenditure->amount_spend=$request->input('amount');
      $expenditure->date_spend=$request->input('date_spend');
      $expenditure->save();
      return redirect()->back()->with('success','Expenditure created successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $expenditure=Expenditure::find($id);
      $expenditure->delete();
      return redirect()->back()->with('success','Expenditure deleted successfully');
    }
}
