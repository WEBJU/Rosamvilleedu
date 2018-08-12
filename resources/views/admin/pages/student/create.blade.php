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


            <!--Check for sucess message-->
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{session()->get('message')}}
                    </div>
                @endif

                  <div class="card-body">
                    <p class="text-info">Student Information</p>

                      <div class="row">
                          <div class="col-lg-4">
                              <div class="form-group">
                                  <label for="surname" class="col-sm-4 control-label">Surname</label>

                                  <div class="col-sm-8">
                                      <input type="text" name="surname"class="form-control" id="surname" placeholder="Surname" value="{{old('surname')}}" required>
                                  </div>
                              </div>
                          </div>

                          <div class="col-lg-4">
                              <div class="form-group">
                                  <label for="fname" class="col-sm-4 control-label">First Name</label>

                                  <div class="col-sm-8">
                                      <input type="text" class="form-control" name="first_name" id="fname" placeholder="First Name" value="{{old('first_name')}}" required>
                                  </div>
                              </div>
                          </div>

                          <div class="col-lg-4">
                              <div class="form-group">
                                  <label for="other_name" class="col-sm-4 control-label">Other Name</label>

                                  <div class="col-sm-8">
                                      <input type="text" class="form-control" name="other_name" id="other_name" placeholder="Other Name" value="{{old('other_name')}}" required>
                                  </div>
                              </div>
                          </div>
                      </div><br><hr>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="col-md-9">
                                    <label for="Date_of_Birth" class=" control-label">Pick date of Birth</label>
                                    <input type="date" class="form-control" name="Date_of_Birth" placeholder="Date Of birth" value="{{old('Date_of_Birth')}}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-9">
                                    <label for="religion" class="control-label">Select Religion</label>
                                    <select class="form-control" id="select_religion" name="religion">
                                        <option value="Christian">Christian</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Muslim">Muslim</option>
                                        <option value="Others">other</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-9">
                                    <label for="school_attended" class=" control-label">Primary/School Attended</label>
                                    <input type="text" name="school_attended" class="form-control" id="former_school" placeholder="Primary/School Attended" value="{{old('school_attended')}}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-9">
                                    <label class=" control-label">Number of Siblings</label>
                                    <input type="number" class="form-control" name="siblings" id="siblings" placeholder="Number of Siblings" value="{{old('siblings')}}" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="col-sm-9">
                                    <label class="control-label">Emergency Contact Name</label>
                                    <input type="text" class="form-control" name="emergency_name" id="emergency_contact" placeholder="Name of Emergency Contact" value="{{old('emergency_name')}}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-9">
                                    <label class="control-label">Emergency Contact Phone</label>
                                    <input type="number" class="form-control" name="emergency_phone" id="emergency_phone" placeholder="Phone of Emergency Contact" value="{{old('emergency_phone')}}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-9">
                                    <label class=" control-label">Relationship of Student With Emergency Contact</label>
                                    <input type="text" class="form-control" name="emergency_relationship" id="emergency_relationship" placeholder="Relationship Between Student and Emergency Contact" value="{{old('emergency_relationship')}}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-9">
                                    <label class="control-label">Select a Class</label>
                                    <select name="class_id" class="form-control">
                                        @foreach($all_classes as $class)
                                            <option value="{{$class->id}}">{{$class->class_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div><br><hr>
                    <div class="form-group">
                      <label>Relevant medical information(Please indicate if he/she suffers from any disease)</label>
                      <textarea class="form-control"name="medical_info" rows="5" required>{{old('medical_info')}}</textarea>
                    </div>

                      <div class="form-group">
                          <button  type="submit"  class="btn btn-primary mb-2">Submit Details</button>
                      </div>
                  </div>
  @endsection
