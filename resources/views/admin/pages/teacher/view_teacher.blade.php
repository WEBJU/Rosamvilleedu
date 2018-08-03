@extends('admin.index')
  @section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Teacher</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Teachers List</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
        <h1 style="margin-left:20px;">View Teacher</h1>
        <form action="#" method="get" class="sidebar-form m-2">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
                  <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                  </button>
                </span>
          </div>
        </form>
        <table  class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Teachers Name</th>
            <th>TSC Number</th>
            <th>Class </th>
            <th>Action</th>
          </tr>

          </thead>
          <tbody>
              @if(count($teacher) > 0)
              @foreach($teacher as $teach)
                @if(count($users) > 0)
                  @foreach($users as $user)
                    @if($teach->user_id == $user->id)
                      <tr>
                        <td>{{$user->sur_name}} {{$user->first_name}} {{$user->last_name}}</td>
                        <td>{{$teach->teacher_tsc_no}}</td>
                        <td>Class 3</td>
                        <td>
                            <form action="/viewTeachers/destroy" method="POST">
                              @csrf
                              <input type="hidden" value="{{$teach->user_id}}" name="delete_teacher">
                              <button  class="btn btn-danger m-2">Delete</button>                              
                          </form> 
                        </td>
                        <td>
                            <form>
                              @csrf
                              <input type="hidden" value="{{$teach->user_id}}" name="delete_teacher">                              
                              <button class="btn btn-info">Edit</button>
                          </form> 
                        </td>
                     </tr>                      
                    @endif
                  @endforeach
                @endif
              @endforeach
            @endif
          
        </tbody>
  @endsection
