@extends('admin.index')
  @section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Subjects</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Subjects List</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
        <h1 style="margin-left:20px;">View Subjects</h1>
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
            <th>Subject id</th>
            <th>Subject Name</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>

                        {{-- check if subject is greater than 1 --}}
                          @if(count($subjects) > 0)
                            {{-- loop through the subjects --}}
                          @foreach ($subjects as $subject)
                      <tr>
                        <td>{{$subject->id}}</td>
                        <td>{{$subject->subject_name}}</td>
                        <td>
                          <form action="/viewSubjectDetails/destroy" method="POST">
                            @csrf
                            <input type="hidden" name="delete_subject" value="{{$subject->id}}">
                            <button class="btn btn-danger mr-1">Delete</button>                           
                          </form>
                        </td>
                        <td>
                          <form action="#" method="#">
                            @csrf
                            <input type="hidden" name="edit_subject" value="{{$subject->id}}">
                            <button class="btn btn-info">Edit</button>                         
                          </form>
                        </td>                                                   
                      </tr>
          </tbody>

        </tbody>
          @endforeach
          @endif
  @endsection
