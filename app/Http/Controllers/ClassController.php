<?php

namespace App\Http\Controllers;
use App\Teachers;
use App\Users;
use Illuminate\Http\Request;
use App\Classes;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // $teachers=DB::table('teachers')->pluck('user_id');
       // $user=User::All();
       // $teacher->teacher_name=$user->id;
        // $teachers = Teachers::all();
        // foreach($teachers as $teacher) {
        //     $user=Users::all();
        //     if ($user->id==$teacher->user_id){
        //
        //       $teacher_firstname=$user->first_name;
        //       $teacher_lastname=$user->last_name;
        //     }
        //     // $teacher_name =
        //     // $teachers[]
        // }
        // return view('admin.pages.class.create',['first_name'=>$teacher_firstname,'lastname'=>$teacher_lastname]);
        return view('admin.pages.class.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
