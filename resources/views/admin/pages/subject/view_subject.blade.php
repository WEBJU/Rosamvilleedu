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
            @if(count($sbjs) > 0)
              @foreach($sbjs as $sbj)
              <tr>
                  <td>{{$sbj->id}}</td>
                  <td>{{$sbj->subject_name}}</td>
                  <td><a href="/addSubject/delete" class="btn btn-danger m-2">Delete</a><a href="/addSubject/update" class="btn btn-info">Edit</a></td>

                </tr>
              @endforeach
            @endif

        </tbody>
        </table>
            {{-- check if subject is greater than 1 --}}
              @if(count($subjects) > 1)
                {{-- loop through the subjects --}}
              @foreach ($subjects as $subject)
          <tr>
            <td>{{$subject->id}}</td>
            <td>{{$subject->subject_name}}</td>
            <td><a href="/deleteSubject/delete/{{$subject->id}}" class="btn btn-danger mr-1">Delete</a><a href="/editSubject/edit/{{$subject->id}}" class="btn btn-info">Edit</a></td>
          </tr>
        </tbody>
          @endforeach
          @endif
  @endsection
