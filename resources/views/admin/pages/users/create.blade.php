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
            <form class="form-horizontal" action="/addUser/store" enctype="multipart/form-data" method="POST">
              @csrf
                  <div class="card-body">
                    <h3>User Details</h3>
                    <div class="form-group">
                      <label for="surname" class="col-sm-2 control-label">Sir Name</label>
                      <div class="col-sm-10">
                        <input type="text" name="sir_name"class="form-control" id="sir_name" placeholder="Sir Name">
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="surname" class="col-sm-2 control-label">First Name</label>
                        <div class="col-sm-10">
                          <input type="text" name="first_name"class="form-control" id="first_name" placeholder="First Name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="surname" class="col-sm-2 control-label">Last Name</label>
                        <div class="col-sm-10">
                          <input type="text" name="last_name"class="form-control" id="last_name" placeholder="Last Name">
                        </div>
                      </div>
                    <div class="form-group">
                      <label for="surname" class="col-sm-2 control-label">National ID</label>
                      <div class="col-sm-10">
                        <input type="text" name="national_id"class="form-control" id="national_id" placeholder="National ID">
                      </div>
                    </div>                   
                      <div class="form-group">
                        <label for="surname" class="col-sm-2 control-label">Phone Number</label>
                        <div class="col-sm-10">
                          <input type="number" name="phone_number"class="form-control" id="phone_number" placeholder="Phone Number">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="surname" class="col-sm-2 control-label">Email Address</label>
                        <div class="col-sm-10">
                          <input type="email" name="email_address"class="form-control" id="email_address" placeholder="Email Address">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="surname" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                          <input type="password" name="password"class="form-control" id="password" placeholder="Password">
                        </div>
                      </div>
                    
                    <div class="form-group">
                        <label for="other_name" class="col-sm-2 control-label">Other Information </label>
                        <textarea class="form-control"name="other_info" rows="5" ></textarea>
                    </div>                
                   
                          <div class="form-group m-2">
                              <button  type="submit"  class="btn btn-primary mb-2">Add User</button>
                          </div>
                  </div>

                  <!-- /.card-footer -->
                </form>
  @endsection
