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
            <form class="form-horizontal" action="/registerStudent" enctype="multipart/form-data">

                  <div class="card-body">
                    <h3>Class Information</h3>
                    <div class="form-group">
                      <label for="surname" class="col-sm-2 control-label">Class Name</label>
                      <div class="col-sm-10">
                        <input type="text" name="surname"class="form-control" id="surname" placeholder="Class Name">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="fname" class="col-sm-2 control-label">Capacity</label>
                      <div class="col-sm-10">
                        <input type="number" class="form-control" name="first_name" id="fname" placeholder="Capicity">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="other_name" class="col-sm-2 control-label">Class Prefect</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="other_name" placeholder="Class Prefect">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="other_name" class="col-sm-2 control-label">Class Teacher</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="other_name" placeholder="Class Teacher">
                      </div>
                    </div>
                          <div class="form-group m-2">
                              <button  type="submit"  class="btn btn-primary mb-2">Add Teacher</button>
                          </div>
                  </div>

                  <!-- /.card-footer -->
                </form>
  @endsection
