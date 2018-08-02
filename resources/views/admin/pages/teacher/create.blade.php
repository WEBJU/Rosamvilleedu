@extends('admin.index')
  @section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Teacher</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Add Teacher</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
        <h1 style="margin-left:20px;">Add Teacher</h1>
            <form class="form-horizontal" action="/addTeacher/store" enctype="multipart/form-data" method="POST">
              @csrf
                  <div class="card-body">
                    <h3>Teacher's Information</h3>
                    <div class="form-group">
                      <label for="surname" class="col-sm-2 control-label">Surname</label>
                      <div class="col-sm-10">
                        <input type="text" name="surname"class="form-control" id="surname" placeholder="Surname">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="fname" class="col-sm-2 control-label">First Name</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="first_name" id="fname" placeholder="First Name">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="other_name" class="col-sm-2 control-label">Other Name</label>
                      <div class="col-sm-10">
                        <input type="text" name="other_name" class="form-control" id="other_name" placeholder="Other Name">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="other_name" class="col-sm-2 control-label">National ID</label>
                      <div class="col-sm-10">
                        <input type="text" name="national_id" class="form-control" id="national_id" placeholder="National ID">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="surname" class="col-sm-2 control-label">TSC Number</label>
                      <div class="col-sm-10">
                        <input type="text" name="tsc_number"class="form-control" id="tsc_number" placeholder="TSC Number">
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="other_name" class="col-sm-2 control-label">Email Address</label>
                        <div class="col-sm-10">
                          <input type="text" name="email_address" class="form-control" id="email_address" placeholder="Email Address">
                        </div>
                      </div>
                      <div class="form-group">
                          <label for="other_name" class="col-sm-2 control-label">Phone Number</label>
                          <div class="col-sm-10">
                            <input type="number" name="phone_number" class="form-control" id="phone_number" placeholder="Phone Number">
                          </div>
                        </div>
                        <div class="form-group">
                            <label for="other_name" class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-10">
                              <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                            </div>
                          </div>                    
                    <div class="form-group">
                      <label for="other_name" class="col-sm-2 control-label">Subjects Specialized</label>
                      <div class="col-sm-10">
                        <select multiple class="form-control" name="subjects_taught">
                          <option value="math">Math</option>
                          <option value="english">English</option>
                          <option value="kiswahili">Kiswahili</option>
                          <option value="social">Social Studies</option>
                          <option value="social">CRE</option>
                          <option value="social">Science</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="fname" class="col-sm-2 control-label">Experience</label>
  
                        <div class="col-sm-10">
                          <textarea class="form-control" rows="5" name="experience" id="experience" placeholder="Experience"></textarea>
                        </div>
                      </div>


                          <div class="form-group m-2">
                              <button  type="submit"  class="btn btn-primary mb-2">Add Teacher</button>
                          </div>
                  </div>

                  <!-- /.card-footer -->
                </form>
  @endsection
