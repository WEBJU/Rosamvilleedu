@extends('admin.index')
  @section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Exams</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Add Exams</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
        <h1 style="margin-left:20px;">Add Exams</h1>
            <form class="form-horizontal" action="/registerStudent" enctype="multipart/form-data">

                  <div class="card-body">
                    <h3>Exams Information</h3>
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
                    <div class="form-group">
                        <label for="other_name" class="col-sm-2 control-label">Start Date</label>
                          <div class="input-group date" data-provide="datepicker">
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="start_date">
                            </div>
                            <span class="input-group-addon">
                                <span class="fa fa-calender"></span>
                            </span>
                        </div>
                  </div>
                  <div class="form-group">
                      <label for="other_name" class="col-sm-2 control-label">End Date</label>
                        <div class="input-group date" data-provide="datepicker">
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="end_date">
                          </div>
                          <span class="input-group-addon">
                              <span class="fa fa-calender"></span>
                          </span>
                      </div>
                </div>
                <div class="form-group">
                    <label for="other_name" class="col-sm-2 control-label">Release Date</label>
                      <div class="input-group date" data-provide="datepicker">
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="release_date">
                        </div>
                        <span class="input-group-addon">
                            <span class="fa fa-calender"></span>
                        </span>
                    </div>
               </div>

                          <div class="form-group m-2">
                              <button  type="submit"  class="btn btn-primary mb-2">Add Exam</button>
                          </div>
                  </div>

                  <!-- /.card-footer -->
                </form>
  @endsection
