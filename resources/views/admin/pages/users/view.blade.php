@extends('admin.index')
  @section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">View Users</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <a href="/addUser" class="btn btn-primary m-1">Add New User</a>
  
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
            <th>Sir Name</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Nationa ID</th>
            <th>Email</th>
            <th>Phone Number</th>
        </tr>
      </thead>
      <tbody>
        @if(count($user) > 0)
            @foreach($user as $us)
                <tr>
                    <td>{{$us->sur_name}}</td>
                    <td>{{$us->first_name}}</td>
                    <td>{{$us->last_name}}</td>
                    <td>{{$us->national_id}}</td>
                    <td>{{$us->email}}</td>
                    <td>{{$us->phone_no}}</td>
                </tr>
            @endforeach
        @endif
      </tbody>
    </table>
  @endsection
