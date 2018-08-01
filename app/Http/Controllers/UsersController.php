<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Users::all();
        return view('admin.pages.users.view')->with('user', $user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.users.create');
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
            'sir_name'=>'required',
            'first_name'=>'required',
            'last_name'=>'required',
            'national_id'=>'required',
            'phone_number'=>'required',
            'email_address'=>'required',
            'password'=>'required',

        ]);

        $user = new Users;
        $user->sur_name = $request->input('sir_name');
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->national_id = $request->input('national_id');
        $user->phone_no = $request->input('phone_number');
        $user->email = $request->input('email_address');
        $user->password = $request->input('password');
        $user->extra_information = $request->input('other_info');
        $user->save();

        return redirect('admin.pages.users.create');

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
