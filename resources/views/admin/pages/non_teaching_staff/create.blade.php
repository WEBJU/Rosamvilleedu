@extends('admin.index')
  @section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Add User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
        <h1 style="margin-left:20px;">Add User</h1>
            <form class="form-horizontal" action="/registerStudent" enctype="multipart/form-data">

                  <div class="card-body">
                    <h3>User Details</h3>
                    <div class="form-group">
                      <label for="surname" class="col-sm-2 control-label">Full Name</label>
                      <div class="col-sm-10">
                        <input type="text" name="amount"class="form-control" id="amount" placeholder="Full Name">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="surname" class="col-sm-2 control-label">ID Number</label>
                      <div class="col-sm-10">
                        <input type="text" name="amount"class="form-control" id="amount" placeholder="ID Number">
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="other_name" class="col-sm-2 control-label">Date of Birth</label>
                          <div class="input-group date" data-provide="datepicker">
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="date_spend">
                            </div>
                            <span class="input-group-addon">
                                <span class="fa fa-calender"></span>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="surname" class="col-sm-2 control-label">Religion</label>
                      <div class="col-sm-10">
                        <input type="text" name="amount"class="form-control" id="amount" placeholder="Religion">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="surname" class="col-sm-2 control-label">Skills</label>
                      <div class="col-sm-10">
                        <input type="text" name="amount"class="form-control" id="amount" placeholder="Full Name">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="surname" class="col-sm-2 control-label">Certification(if any)</label>
                      <div class="col-sm-10">
                        <input type="text" name="amount"class="form-control" id="amount" placeholder="Certifications">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="surname" class="col-sm-2 control-label">Residential Area</label>
                      <div class="col-sm-10">
                        <input type="text" name="amount"class="form-control" id="amount" placeholder="Residential Area">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="surname" class="col-sm-2 control-label">Address</label>
                      <div class="col-sm-10">
                        <input type="text" name="amount"class="form-control" id="amount" placeholder="Address">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="surname" class="col-sm-2 control-label">Contact</label>
                      <div class="col-sm-10">
                        <input type="text" name="amount"class="form-control" id="amount" placeholder="Contact">
                      </div>
                    </div>
                          <div class="form-group m-2">
                              <button  type="submit"  class="btn btn-primary mb-2">Add User</button>
                          </div>
                  </div>

                  <!-- /.card-footer -->
                </form>
  @endsection
