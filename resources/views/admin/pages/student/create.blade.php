@extends('admin.index')
  @section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!--<h1 class="m-0 text-dark">Student</h1>-->
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
            <form class="form-horizontal" action="/registerStudent" enctype="multipart/form-data" method="post">
                {{csrf_field()}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            <!--if errors exist print all of them-->
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            <!--Check for sucess message-->
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{session()->get('message')}}
                    </div>
                @endif

                  <div class="card-body">
                    <p class="text-info">Student Information</p>
                    <div class="form-group">
                      <label for="surname" class="col-sm-2 control-label">Surname</label>
                      <div class="col-sm-10">
                        <input type="text" name="surname"class="form-control" id="surname" placeholder="Surname" value="{{old('surname')}}" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="fname" class="col-sm-2 control-label">First Name</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="first_name" id="fname" placeholder="First Name" value="{{old('first_name')}}" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="other_name" class="col-sm-2 control-label">Other Name</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="other_name" id="other_name" placeholder="Other Name" value="{{old('other_name')}}" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Pick date of Birth</label>
                          <div class="col-sm-10">
                            <input type="date" class="form-control" name="Date_of_Birth" placeholder="Date Of birth" value="{{old('Date_of_Birth')}}" required>
                          </div>
                    </div>

                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Select Religion</label>
                      <div class="col-sm-10">
                        <select class="form-control" id="select_religion" name="religion">
                          <option value="Christian">Christian</option>
                          <option value="Hindu">Hindu</option>
                          <option value="Muslim">Muslim</option>
                          <option value="Others">other</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="">Primary/School Attended</label>
                      <div class="col-sm-10">
                        <input type="text" name="school_attended" class="form-control" id="former_school" placeholder="Primary/School Attended" value="{{old('school_attended')}}" required>
                      </div>
                    </div>

                      <div class="form-group">
                          <label>Number of Siblings</label>
                          <div class="col-sm-10">
                              <input type="number" class="form-control" name="siblings" id="siblings" placeholder="Number of Siblings" value="{{old('siblings')}}" required>
                          </div>
                      </div>

                      <div class="form-group">
                          <label>Emergency Contact Name</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" name="emergency_name" id="emergency_contact" placeholder="Name of Emergency Contact" value="{{old('emergency_name')}}" required>
                          </div>
                      </div>

                      <div class="form-group">
                          <label>Emergency Contact Phone</label>
                          <div class="col-sm-10">
                              <input type="number" class="form-control" name="emergency_phone" id="emergency_phone" placeholder="Phone of Emergency Contact" value="{{old('emergency_phone')}}" required>
                          </div>
                      </div>

                      <div class="form-group">
                          <label>Relationship of Student With Emergency Contact</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" name="emergency_relationship" id="emergency_relationship" placeholder="Relationship Between Student and Emergency Contact" value="{{old('emergency_relationship')}}" required>
                          </div>
                      </div>

                      <div class="form-group">
                          <label>Select a Class</label>
                          <div class="col-sm-10">
                              <select name="class_id" class="form-control">
                                  @foreach($all_classes as $class)
                                    <option value="{{$class->id}}">{{$class->class_name}}</option>
                                  @endforeach
                              </select>
                          </div>
                      </div>

                    <div class="form-group">
                      <label>Relevant medical information(Please indicate if he/she suffers from any disease)</label>
                      <textarea class="form-control"name="medical_info" rows="5" required>{{old('medical_info')}}</textarea>
                    </div>

                      <div class="form-group">
                          <button  type="submit"  class="btn btn-primary mb-2">Submit Details</button>
                      </div>
                  </div>
                  <!--
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

                

                </form>
  @endsection
