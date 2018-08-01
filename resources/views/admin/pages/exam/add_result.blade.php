@extends('admin.index')
  @section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Exam Results</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="#">Exams</a></li>
              <li class="breadcrumb-item active">Add Exam Results</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
        <h1 style="margin-left:20px;">Add Result</h1>
            <form class="form-horizontal" action="/registerStudent" enctype="multipart/form-data">

                  <div class="card-body">
                    <h3>Select Exam Type you want to Record Results</h3>
                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Type of Exam</label>
                      <div class="col-sm-10">
                        <select class="form-control" id="select_religion">
                          <option>Mid Term</option>
                          <option>End Term</option>
                          <option>Special Exam</option>
                        </select>
                      </div>
                    </div>


                          <div class="form-group m-2">
                              <button  type="submit"  class="btn btn-primary mb-2">GO</button>
                          </div>
                  </div>

                  <!-- /.card-footer -->
                </form>
  @endsection
