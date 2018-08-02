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
        <table  class="table">
          <thead>
          <tr>
            <th>Exam Type</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Release Date</th>
            <th>Action</th>
          </tr>

          </thead>
          <tbody>
            {{-- check if exams exist --}}
            @if(count($exams)>1)
            @foreach ($exams as $exam)
          <tr>
            <td>{{$exam->exam_type}}</td>
            <td>{{$exam->exam_start_date}}</td>
            <td>{{$exam->exam_end_date}}</td>
            <td>{{$exam->exam_release_date}}</td>
            <td><a href="#" class="btn btn-danger m-1">Delete</a><a href="#" class="btn btn-info">Edit</a><a href="#" class="btn btn-secondary m-1">Print Receipt</a></td>
          </tr>
            @endforeach
            @endif
        </tbody>
  @endsection
