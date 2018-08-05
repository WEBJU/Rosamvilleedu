@extends('admin.index')
  @section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Exam</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Exam</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
        <h1 style="margin-left:20px;">View Exams</h1>
        <form action="#" method="get" class="sidebar-form m-2">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search Exam...">
            <span class="input-group-btn">
                  <button type="submit" name="search_Exam" id="search-btn" class="btn btn-primary"><i class="fa fa-search"></i>
                  </button>
                </span>
          </div>
        </form>
        <table  class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Exam Type</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Release Date</th>
            <th colspan="3">Action</th>
          </tr>

          </thead>
          <tbody>
            {{-- check if exams exist --}}
            @if(count($exams)>0)
            @foreach ($exams as $exam)
          <tr>
            <td>{{$exam->exam_type}}</td>
            <td>{{$exam->exam_start_date}}</td>
            <td>{{$exam->exam_end_date}}</td>
            <td>{{$exam->exam_release_date}}</td>
            <td><a href="{{action('ExamsController@edit',$exam['id'])}}" class="btn btn-info">Edit</a></td>
            <td>
              <form action="{{action('ExamsController@destroy',$exam['id'])}}" method="post">
                @csrf
                <input name="_method" type="hidden" value="DELETE">
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
            </td>
            <td><a href="#" class="btn btn-secondary">Print Details</a></td>
          </tr>
            @endforeach
            @endif
        </tbody>
  @endsection
