@extends('admin.index')
  @section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Student</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Add Student</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
        <h1 style="margin-left:20px;">Add Student</h1>
            <form class="form-horizontal" action="/registerStudent" enctype="multipart/form-data">

                  <div class="card-body">
                    <p class="text-info">Student Information</p>
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
                        <input type="text" class="form-control" id="other_name" placeholder="Other Name">
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="other_name" class="col-sm-2 control-label">Pick date of Birth</label>
                          <div class="input-group date" data-provide="datepicker">
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="Date_of_Birth">
                            </div>
                            <span class="input-group-addon">
                                <span class="fa fa-calender"></span>
                            </span>
                        </div>
                  </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Place of Birth</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="birth_place" placeholder="Place of Birth">
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Select Religion</label>
                      <div class="col-sm-10">
                        <select class="form-control" id="select_religion">
                          <option>Christian</option>
                          <option>Hindu</option>
                          <option>Muslim</option>
                          <option>other</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Primary/School Attended</label>
                      <div class="col-sm-10">
                        <input type="text" name="school_attended" class="form-control" id="former_school" placeholder="Primary/School Attended">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Relevant medical information(Please indicate if he/she suffers from any disease)</label>
                      <textarea class="form-control"name="medical_info" rows="5" ></textarea>
                    </div>
                    <div class="form-group">
                      <label>Number of Children in the family</label>
                      <div class="form-inline">
                      <div class="col-sm-10">
                        <input type="number" class="form-control m-2" name="boys" id="boys" placeholder="Boys" ><input type="number" name="girls" class="form-control" id="boys" placeholder="Girls">
                      </div>
                    </div>
                  </div>
                  <hr>
                  <h3 class="text-info">Parents/Guardian Information</h3>
                    <h5 class="text-secondary"> Fathers Information</h5>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Fathers Name</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="" placeholder="Fathers Name">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Occupation</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="" placeholder="Occupation">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Residential Area</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="" placeholder="Residential Area">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Address</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="" placeholder="Address">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Contact</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="" placeholder="Contact">
                      </div>
                    </div>

                      <h5 class="text-secondary"> Mothers Information</h5>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Mothers Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="" placeholder="Mothers Name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Occupation</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="" placeholder="Occupation">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Residential Area</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="" placeholder="Residential Area">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Address</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="" placeholder="Address">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Contact</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="" placeholder="Contact">
                        </div>
                      </div>

                        <h5 class="text-secondary"> Guardians Information</h5>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Guardians Name</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="" placeholder="Guardians Name">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Occupation</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="" placeholder="Occupation">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="" class="col-sm-2 control-label">Residential Area</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="" placeholder="Residential Area">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label">Address</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="" placeholder="Address">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="" class="col-sm-2 control-label">Contact</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="" placeholder="Contact">
                          </div>
                        </div>
                        <hr>
                        <h3>Person to be contacted incase of an emergency</h3>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Name</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="" placeholder="Name">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Relationship</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="" placeholder="Relationship">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="" class="col-sm-2 control-label">Contact</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="" placeholder="Contact">
                          </div>
                          <div class="form-group m-2">
                              <button  type="submit"  class="btn btn-primary mb-2">Register Now</button>
                          </div>
                  </div>

                  <!-- /.card-footer -->
                </form>
  @endsection
