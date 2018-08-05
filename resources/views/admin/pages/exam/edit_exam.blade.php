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
              <li class="breadcrumb-item active">Edit Exams</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
        <h1 style="margin-left:20px;">Edit Exams</h1>
            <form class="form-horizontal" action="{{action('ExamsController@update',$id)}}" method="post" enctype="multipart/form-data">
              @csrf
                    <input name="_method" type="hidden" value="PATCH">
                  <div class="card-body">
                    <h3>Exams Information</h3>
                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Type of Exam</label>
                      <div class="col-sm-10">
                        <select name="term" class="form-control" >
                          <option value="Mid Term" @if ($exam->exam_type=="Mid Term")
                            selected
                          @endif>Mid Term</option>
                          <option value="End Term" @if ($exam->exam_type=="End Term")
                            selected
                          @endif>End Term</option>
                          <option value="Special Exam" @if ($exam->exam_type=="Special Exam")
                            selected
                          @endif>Special Exam</option>

                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="other_name" class="col-sm-2 control-label">Start Date</label>
                          <div class="input-group date" data-provide="">
                            <div class="col-sm-10">
                              <input type="date" class="form-control" name="start_date" value="{{$exam->exam_start_date}}">
                            </div>
                            <span class="input-group-Editon">
                                <span class="fa fa-calender"></span>
                            </span>
                        </div>
                  </div>
                  <div class="form-group">
                      <label for="other_name" class="col-sm-2 control-label">End Date</label>
                        <div class="input-group date" data-provide="">
                          <div class="col-sm-10">
                            <input type="date" class="form-control" name="end_date" value="{{$exam->exam_end_date}}">
                          </div>
                          <span class="input-group-Editon">
                              <span class="fa fa-calender"></span>
                          </span>
                      </div>
                </div>
                <div class="form-group">
                    <label for="other_name" class="col-sm-2 control-label">Release Date</label>
                      <div class="input-group date" data-provide="">
                        <div class="col-sm-10">
                          <input type="date" class="form-control" name="release_date" value="{{$exam->exam_release_date}}">
                        </div>
                        <span class="input-group-Editon">
                            <span class="fa fa-calender"></span>
                        </span>
                    </div>
               </div>

                          <div class="form-group m-2">
                              <button  type="submit"  class="btn btn-primary mb-2">Edit Exam</button>
                          </div>
                  </div>

                  <!-- /.card-footer -->
                </form>
  @endsection
