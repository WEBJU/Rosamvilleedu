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
              <li class="breadcrumb-item active">Add Class</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
        <h1 style="margin-left:20px;">Add Class</h1>
            <form class="form-horizontal" action="/addClass/store" enctype="multipart/form-data" method="POST">
              @csrf
                  <div class="card-body">
                    <h3>Class Information</h3>
                    <div class="form-group">
                      <label for="classname" class="col-sm-2 control-label">Class Name</label>
                      <div class="col-sm-10">
                        <input type="text" name="class_name"class="form-control" id="class_name" placeholder="Class Name">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="fname" class="col-sm-2 control-label">Capacity</label>
                      <div class="col-sm-10">
                        <input type="number" class="form-control" name="class_capacity" id="fname" placeholder="Capacity">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="other_name" class="col-sm-2 control-label">Class Prefect</label>
                      <div class="col-sm-10">
                        <input type="text" name="class_prefect" class="form-control" id="class_prefect" placeholder="Class Prefect">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Class Teacher</label>
                      <div class="col-sm-10">
                        <select name="class_teacher"class="form-control" >
                          @foreach ($teachers as $teacher)
                            <option value="{{$teacher->id}}">{{$teacher->id}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Class Year</label>
                        <div class="col-sm-10">
                          <select name="class_year"class="form-control" >
                            <option>2018</option>
                            <option>2019</option>
                            <option>2020</option>
                          </select>
                        </div>
                    </div>
                          <div class="form-group m-2">
                              <button  type="submit"  class="btn btn-primary mb-2">Add Teacher</button>
                          </div>
                  </div>

                  <!-- /.card-footer -->
                </form>
  @endsection
