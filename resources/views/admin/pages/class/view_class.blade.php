@extends('admin.index')
  @section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Class</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Classs List</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
      <a href="/addClass" class="btn btn-primary ml-2">Add New Class</a>
        <h1 style="margin-left:20px;">View Class</h1>
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
            <th>Class Name</th>
            <th>Capacity</th>
            <th>Class Prefect</th>
            <th>Class Teacher</th>

            <th colspan="3">Action</th>
          </tr>

          </thead>
          <tbody>
            @if(count($classess)>0)
              @foreach ($classess as $class)
          <tr>
            <td>{{$class->class_name}}</td>
            <td>{{$class->class_capacity}}</td>
            <td>{{$class->class_prefect}}</td>
            <td>{{$class->class_teacher_id}}</td>
            

            <td>
              <a href="{{ action('ClassController@edit',$class['id']) }}" class="btn btn-info">Edit</a>
            </td>
              <td><form action="{{action('ClassController@destroy',$class['id'])}}" method="post">
              @csrf
              <input name="_method" type="hidden" value="DELETE">
              <button type="submit" class="btn btn-danger">Delete</button>
            </form></td>
              <td><a href="" class="btn btn-secondary">Print Details</a></td>

          </tr>
              @endforeach
            @endif
        </tbody>

  @endsection
