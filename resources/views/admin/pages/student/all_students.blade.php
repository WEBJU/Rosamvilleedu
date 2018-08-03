<?php
/**
 * Created by PhpStorm.
 * User: Brian Mutinda
 * Date: 01/08/2018
 * Time: 03:51 PM
 */
?>

@extends('admin.index')
@section('content')
    <div class="container-fluid">

        <!--Search Button-->
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-6">
                <h1><center>All students</center></h1>
                <form method="get" class="sidebar-form m-2">
                    <div class="input-group">
                        <input type="text" name="student_search" id="search_query" class="form-control" placeholder="Search Student Name">
                        <span class="input-group-btn">
                          <button type="submit" name="search_student" id="search-btn" class="btn btn-primary"><i class="fa fa-search"></i>
                          </button>
                         </span>
                    </div>
                </form>
            </div>
            <div class="col-lg-2"></div>
        </div>


        <div class="table-responsive">
            <table class="table table-striped table-hover" id="studentsTable">
                <div id="validation-errors">

                </div>

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

                <thead>
                    <tr>
                        <th>Surname</th>
                        <th>First Name</th>
                        <th>Other Name</th>
                        <th>Class</th>
                        <th>Date Of Birth</th>
                        <th>Add Parent</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($students as $student)
                        <tr class="student{{$student->id}} table-hover">
                            <td>{{$student->student_surname}}</td>
                            <td>{{$student->student_firstname}}</td>
                            <td>{{$student->student_other_name}}</td>
                            <td>{{$student->student_class}}</td>
                            <td>{{$student->student_date_of_birth}}</td>
                            <td>
                                <a href="/addparent/existing_parents/{{$student->id}}" class="btn btn-primary">Existing parent</a>
                                <a href="#" class="new_parent_mod btn btn-success" id="new_parent">New parent </a>
                            </td>

                            <td>
                                <!--delete-->
                                <a href="#"
                                   class="delete_student btn btn-danger m-1"
                                   id="delete_student"
                                   data-id="{{$student->id}}"
                                   data-name="{{$student->student_surname." ".$student->student_firstname." ".$student->student_other_name}}"
                                >Delete</a>

                                <!--edit-->
                                <a href="#"
                                   class="student_edit btn btn-info"
                                   id="edit_student"
                                   data-id="{{$student->id}}"
                                   data-surname="{{$student->student_surname}}"
                                   data-firstname="{{$student->student_firstname}}"
                                   data-othername="{{$student->student_other_name}}"
                                   data-student_class="{{$student->student_class}}"
                                   data-dob = "{{$student->student_date_of_birth}}"
                                   data-religion = "{{$student->student_religion}}"
                                   data-medical = "{{$student->student_medical_info}}"
                                   data-schools = "{{$student->primary_school_attended}}"
                                   data-siblings = "{{$student->student_number_of_siblings}}"
                                   data-emergency = "{{$student->emergency_name}}"
                                   data-relationship = "{{$student->emergency_relationship}}"
                                   data-emergency_contact = "{{$student->emergency_contact}}"
                                   data-class_name = "{{$student->student_class}}"
                                   data-class_id = "{{$student->class_id}}"
                                >Edit</a>

                                <!--Details-->
                                <a href="#"
                                   class="student_details btn btn-secondary m-1"
                                   data-id="{{$student->id}}"
                                   data-surname="{{$student->student_surname}}"
                                   data-firstname="{{$student->student_firstname}}"
                                   data-othername="{{$student->student_other_name}}"
                                   data-student_class="{{$student->student_class}}"
                                   data-dob = "{{$student->student_date_of_birth}}"
                                   data-religion = "{{$student->student_religion}}"
                                   data-medical = "{{$student->student_medical_info}}"
                                   data-schools = "{{$student->primary_school_attended}}"
                                   data-siblings = "{{$student->student_number_of_siblings}}"
                                   data-emergency = "{{$student->emergency_name}}"
                                   data-relationship = "{{$student->emergency_relationship}}"
                                   data-emergency_contact = "{{$student->emergency_contact}}"
                                   data-class_name = "{{$student->student_class}}"
                                   data-class_id = "{{$student->student_id}}"
                                >More Details</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>


        </div>

    </div>

    <!--The modals-->
    <!--The new parent modal-->
    <div class="modal fade" id="parentModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Add Parent to Student John Doe</h4>
                   <button type="button" class="close" data-dismiss="modal">&times;</button><br>
                </div>

                <div class="modal-body">
                    <form role="form">
                        <div class="form-group">
                            <label for="parentType">Select Category</label>
                            <select name="parent_category" class="form-control">
                                <option value="1">Single Parent</option>
                                <option value="1">Guardian</option>
                                <option value="2">Parents</option>
                            </select>
                        </div>
                    </form>

                    <form action="#" method="post">
                        {{csrf_token()}}

                    </form>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!--Delete Modal-->
    <div class="modal modal fade" id="deleteModal" role="dialog">
        <div class="modal-dialog modal-md">
            <!--Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Erase Student Record</h1>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <h4 id="delete_message">Are you sure you want to delete this item</h4>
                </div>

                <div class="modal-footer">
                    <form action="/student/delete" method="post">
                        {{csrf_field()}}
                        <input type="hidden" value="" id="student_id" name="student_id">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!--Edit Modal-->
    <div class="modal fade" id="editModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <!--modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Edit Student Record</h1>
                    <button type="button" class="close" data-dismiss="modal">&times</button>
                </div>

                <div class="modal-body">
                    <form class="form-horizontal" action="/updateStudent">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" value="" name="student_id" id="edit_id">
                        <div class="card-body">
                            <p class="text-info">Student Information</p>
                            <div class="form-group">
                                <label for="surname" class="col-sm-2 control-label">Surname</label>
                                <div class="col-sm-10">
                                    <input type="text" name="surname"class="form-control" id="edit_surname" placeholder="Surname">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="fname" class="col-sm-2 control-label">First Name</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="first_name" id="edit_fname" placeholder="First Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="other_name" class="col-sm-2 control-label">Other Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="edit_other_name" placeholder="edit_Other Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="other_name" class="col-sm-2 control-label">Pick date of Birth</label>
                                <div class="input-group date" data-provide="datepicker">
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="edit_Date_of_Birth" id="edit_dob">
                                    </div>
                                    <span class="input-group-addon">
                                <span class="fa fa-calender"></span>
                            </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Select Religion</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="edit_select_religion">
                                        <option value="" id="edit_religion"></option><!--The current-->
                                        <option value="Christian">Christian</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Muslim">Muslim</option>
                                        <option value="Others">other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Primary/School Attended</label>
                                <div class="col-sm-10">
                                    <input type="text" name="school_attended" class="form-control" id="edit_former_school" placeholder="Primary/School Attended">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Number of Siblings</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control m-2" name="boys" id="edit_boys" placeholder="Number of Siblings" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Emergency Contact Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="emergency_name" id="edit_emergency_contact" placeholder="Name of Emergency Contact" value="{{old('emergency_name')}}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Emergency Contact Phone</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="emergency_phone" id="edit_emergency_phone" placeholder="Phone of Emergency Contact" value="{{old('emergency_phone')}}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Relationship of Student With Emergency Contact</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="emergency_relationship" id="edit_emergency_relationship" placeholder="Relationship Between Student and Emergency Contact" value="{{old('emergency_relationship')}}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Select a Class</label>
                                <div class="col-sm-10">
                                    <select name="class_id" id="random" class="form-control">
                                        <option value="" id="edit_class"></option>
                                        @foreach($all_classes as $class)
                                            <option value="{{$class->id}}">{{$class->class_name}}</option>
                                        @endforeach
                                    </select>

                                    <!--
                                    <select name="class_id" class="edit_class form-control">
                                            <option value="" id="edit_class"></option>
                                        @foreach($all_classes as $class)
                                            <option value="{{$class->id}}">{{$class->class_name}}</option>
                                        @endforeach
                                    </select>-->
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Relevant medical information(Please indicate if he/she suffers from any disease)</label>
                                <textarea class="form-control"name="medical_info" rows="5" id="edit_medical_info"></textarea>
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

                        <!-- /.card-footer -->

                    </form>
                </div>

                <div class="edit_modal-footer modal-footer">
                    <div class="form-group m-2">
                        <button  type="button"  class="edit_button btn btn-lg btn-primary mb-2" id="edit_button">Save Changes</button>
                    </div>
                    <button class="btn btn-lg btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!--View Details modal-->
    <div class="modal fade" id="studentDetailsModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <!--modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Student Details</h1>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form class="form-horizontal" enctype="multipart/form-data" method="post">
                        <div class="card-body">
                            <p class="text-info">Student Information</p>
                            <div class="form-group">
                                <label for="surname" class="col-sm-2 control-label">Surname</label>
                                <div class="col-sm-10">
                                    <input type="text" name="surname"class="form-control" id="surname" placeholder="Surname" value="" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="fname" class="col-sm-2 control-label">First Name</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="first_name" id="fname" placeholder="First Name" value="" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="other_name" class="col-sm-2 control-label" readonly="" value="">Other Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="other_name" placeholder="Other Name" readonly value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="other_name" class="col-sm-2 control-label">Pick date of Birth</label>
                                <div class="input-group date" data-provide="datepicker">
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="Date_of_Birth" id="dob" readonly value="">
                                    </div>
                                    <span class="input-group-addon">
                                <span class="fa fa-calender"></span>
                            </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Select Religion</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="religion" id="select_religion" readonly value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Primary/School Attended</label>
                                <div class="col-sm-10">
                                    <input type="text" name="school_attended" class="form-control" id="former_school" placeholder="Primary/School Attended" readonly value="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Number of Siblings</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control m-2" name="boys" id="boys" placeholder="Number of Siblings" readonly value="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Emergency Contact Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="emergency_name" id="emergency_contact" placeholder="Name of Emergency Contact" value="{{old('emergency_name')}}" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Emergency Contact Phone</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="emergency_phone" id="emergency_phone" placeholder="Phone of Emergency Contact" value="{{old('emergency_phone')}}" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Relationship of Student With Emergency Contact</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="emergency_relationship" id="emergency_relationship" placeholder="Relationship Between Student and Emergency Contact" value="{{old('emergency_relationship')}}" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Class</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control" name="class" id="view_class">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Relevant medical information(Please indicate if he/she suffers from any disease)</label>
                                <textarea class="form-control"name="medical_info" rows="5" id="medical_info" readonly value=""></textarea>
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

                        <!-- /.card-footer -->

                    </form>
                </div>

                <div class="modal-footer">
                    <!--
                    <div class="form-group m-2">
                        <button  type="button"  class="edit_button btn btn-primary mb-2" id="edit_button">Print Details</button>
                    </div>-->

                    <button type="submit" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!--jquery-->
    <script>
        //launch the new parent modal
        $(document).ready(function () {
            $(document).on('click','.new_parent_mod',function () {
                $('#parentModal').modal('show');
            });
        });

        //launch the delete modal
        $(document).ready(function () {
           $(document).on('click','.delete_student',function () {
               $('#student_id').val($(this).data('id'));
               $('#delete_message').text("Are you sure you want to delete "+$(this).data('name'));
              $('#deleteModal').modal('show');
           });
        });

        //launch the edit modal
        $(document).ready(function () {
            $(document).on('click','.student_edit',function () {
                $('#edit_id').val($(this).data('id'));
                $('#edit_surname').val($(this).data('surname'));
                $('#edit_fname').val($(this).data('firstname'));
                $('#edit_other_name').val($(this).data('othername'));
                $('#edit_dob').val($(this).data('dob'));
                $('#edit_class').val($(this).data('class_id'));
                $('#edit_class').text($(this).data('class_name'));
                $('#edit_religion').val($(this).data('religion'));
                $('#edit_religion').text($(this).data('religion'));
                $('#edit_former_school').val($(this).data('schools'));
                $('#edit_boys').val($(this).data('siblings'));
                $('#edit_medical_info').text($(this).data('medical'));
                $('#edit_emergency_contact').val($(this).data('emergency'));
                $('#edit_emergency_phone').val($(this).data('emergency_contact'));
                $('#edit_emergency_relationship').val($(this).data('relationship'));
                $('#editModal').modal('show');
            });
        });

        //launch the student details
        $(document).ready(function () {
            $(document).on('click','.student_details',function () {
                $('#surname').val($(this).data('surname'));
                $('#fname').val($(this).data('firstname'));
                $('#other_name').val($(this).data('othername'));
                $('#dob').val($(this).data('dob'));
                $('#view_class').val($(this).data('class_name'));
                $('#select_religion').val($(this).data('religion'));
                $('#former_school').val($(this).data('schools'));
                $('#boys').val($(this).data('siblings'));
                $('#medical_info').text($(this).data('medical'));
                $('#emergency_contact').val($(this).data('emergency'));
                $('#emergency_phone').val($(this).data('emergency_contact'));
                $('#emergency_relationship').val($(this).data('relationship'));
                $('#studentDetailsModal').modal('show');
            });
        });

        //live search
        $(document).ready(function () {
            $('#search_query').keyup(function () {
                $value = $(this).val();
                $.ajax({
                    type:'get',
                    url:'/searchStudent',
                    data:{'search':$value},
                    success:function (data) {
                        $('tbody').html(data);
                    }
                });
            });
        });

        //update logic
        $(document).ready(function () {
            $('.edit_modal-footer').on('click','.edit_button',function () {
                $.ajax({
                    type:"post",
                    url:"/updateStudent",
                    data:{
                        '_token':$('input[name=_token]').val(),
                        'student_id':$('#edit_id').val(),
                        'surname':$('#edit_surname').val(),
                        'first_name':$('#edit_fname').val(),
                        'other_name':$('#edit_other_name').val(),
                        'Date_of_Birth':$('#edit_dob').val(),
                        'religion':$('#edit_select_religion option:selected').val(),
                        'school_attended':$('#edit_former_school').val(),
                        'siblings':$('#edit_boys').val(),
                        'medical_info':$('#edit_medical_info').val(),
                        'emergency_name':$('#edit_emergency_contact').val(),
                        'emergency_phone':$('#edit_emergency_phone').val(),
                        'emergency_relationship':$('#edit_emergency_relationship').val(),
                        'class_id':$('#random').val()
                    },

                    success:function (data) {
                        $('#studentsTable').ajax.reload();
                        alert('Record has been updated successfully');
                    },
                    error:function (data) {
                        $('#validation-errors').html('');
                        $.each(responseJSON.errors,function (key,value) {
                            $('#validation-errors').append('<div class="alert alert-danger">'+value+'</div>');
                        })
                    }
                });
            });

        });

    </script>

    <script type="text/javascript">
        $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
    </script>

@endsection
