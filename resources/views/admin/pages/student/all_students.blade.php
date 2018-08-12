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
            <div class="col-lg-2">
                <a href="/allParents/">All parents</a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-hover" id="studentsTable">

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
                               <!-- <a href="/addparent/existing_parents/{{$student->id}}" class="btn btn-primary">Existing parent</a>-->
                                <a href="#"
                                   class="new_parent_mod btn btn-success"
                                   id="new_parent"
                                   data-id="{{$student->id}}"
                                   data-parent="{{$student->parent_count}}"
                                > Add parent </a>
                            </td>

                            <td>
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

                                <!--edit-->
                                <a href="#"
                                   class="student_edit btn btn-info m-1"
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

                                <!--delete-->
                                <a href="#"
                                   class="delete_student btn btn-danger m-1"
                                   id="delete_student"
                                   data-id="{{$student->id}}"
                                   data-name="{{$student->student_surname." ".$student->student_firstname." ".$student->student_other_name}}"
                                >Delete</a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
            {{$students->links()}}

        </div>

    </div>

    <!--The modals-->
    <!--The new parent modal-->
    <div class="modal fade" id="parentModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="add_parent_heading">Add New Parent Record</h4>
                   <button type="button" class="close" data-dismiss="modal">&times;</button><br>
                </div>

                <div class="modal-body">
                    <form role="form">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <h1 style="color: red" id="parent_message"></h1>
                        <div class="form-group" id="parent_category_1">
                            <label for="parentType">Select Category</label>
                            <select name="parent_category" class="form-control" id="parent_category">
                                <option value="single">Single Parent</option>
                                <option value="guardian">Guardian</option>
                                <option value="parents">Parents</option>
                                <option value="existing">Existing Parents</option>
                            </select>
                        </div>
                    </form>

                    <div id="parent_validation-errors">

                    </div>

                    <form action="#" method="post">
                        <!--<input type="hidden" value="{{csrf_field()}}" name="_token">-->
                        <input type="hidden" value="" name="parent_student_id" id="parent_student_id">

                         <div id="existing_parent">
                             <label>Enter parent phone number</label>
                             <div class="form-group">
                                <input type="number" class="form-control" id="existing_parent_phone" name="existing_parent_phone" required>
                             </div>
                             <p></p>
                         </div>

                        <div id="oneForm">
                            <h3 class="text-info">Parents / Guardian Information</h3><hr>

                        <h5 class="parent_title text-secondary" id="parent_title"> Guardian Information</h5>
                        <div class="form-group">
                          <label class="parent_name control-label" id="parent_name">Guardian/Parent Name</label>
                            <input type="text" class="form-control" id="" placeholder="Name" name="one_parent_name">
                        </div>

                        <div class="form-group">
                          <label class="control-label">Occupation</label>
                            <input type="text" class="form-control" id="" placeholder="Occupation" name="one_occupation">
                        </div>

                        <div class="form-group">
                          <label for="" class="control-label">Residential Area</label>
                            <input type="text" class="form-control" id="" placeholder="Residential Area" name="one_residential">
                        </div>

                        <div class="form-group">
                          <label for="inputEmail3" class="control-label">Address</label>
                            <input type="text" class="form-control" id="" placeholder="Address" name="one_address">
                        </div>

                        <div class="form-group">
                          <label for="" class=" control-label">Contact</label>
                            <input type="number" class="form-control" id="" placeholder="Contact" name="one_contact">
                        </div>

                        <hr>
                        </div>

                        <div id="secondForm" class="hidden">
                            <h5 class="text-secondary"> Mothers Information</h5>
                            <div class="form-group">
                                <label class=" control-label">Mothers Name</label>
                                <input type="text" class="form-control" id="" placeholder="Mothers Name" name="two_parent">
                            </div>

                            <div class="form-group">
                                <label class=" control-label">Occupation</label>
                                    <input type="text" class="form-control" id="" placeholder="Occupation" name="two_occupation">
                            </div>

                            <div class="form-group">
                                <label for="" class=" control-label">Residential Area</label>
                                <input type="text" class="form-control" id="" placeholder="Residential Area" name="two_residential">
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class=" control-label">Address</label>
                                <input type="text" class="form-control" id="" placeholder="Address" name="two_address">
                            </div>

                            <div class="form-group">
                                <label for="" class="control-label">Contact</label>
                                <input type="number" class="form-control" id="" placeholder="Contact" name="two_contact">
                            </div>

                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <div class="" id="parent_button">
                        <button type="submit" class="parent_submit btn btn-lg btn-primary">Submit</button>
                    </div>

                    <button type="submit" class="btn btn-lg btn-danger" data-dismiss="modal">Cancel</button>
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
                    <!--<p class="error text-center alert alert-danger hidden"></p>-->
                    <div id="validation-errors">

                    </div>

                    <form class="form-horizontal" action="/updateStudent">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" value="" name="student_id" id="edit_id">
                        <div class="card-body">
                            <p class="text-info">Student Information</p>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <div class="col-sm-8">
                                            <label for="surname" class="control-label">Surname</label>
                                            <input type="text" name="surname"class="form-control" id="edit_surname" placeholder="Surname" value="{{old('surname')}}" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <div class="col-sm-8">
                                            <label for="fname" class="control-label">First Name</label>
                                            <input type="text" class="form-control" name="first_name" id="edit_fname" placeholder="First Name" value="{{old('first_name')}}" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <div class="col-sm-8">
                                            <label for="other_name" class="control-label">Other Name</label>
                                            <input type="text" class="form-control" name="other_name" id="edit_other_name" placeholder="Other Name" value="{{old('other_name')}}" required>
                                        </div>
                                    </div>
                                </div>
                            </div><br><hr>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <div class="col-md-9">
                                            <label for="Date_of_Birth" class=" control-label">Pick date of Birth</label>
                                            <input type="date" class="form-control" id="edit_dob" name="Date_of_Birth" placeholder="Date Of birth" value="{{old('Date_of_Birth')}}" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-9">
                                            <label for="religion" class="control-label">Select Religion</label>
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
                                        <div class="col-sm-9">
                                            <label for="school_attended" class=" control-label">Primary/School Attended</label>
                                            <input type="text" name="school_attended" class="form-control" id="edit_former_school" placeholder="Primary/School Attended" value="{{old('school_attended')}}" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-9">
                                            <label class=" control-label">Number of Siblings</label>
                                            <input type="number" class="form-control" name="siblings" id="edit_boys" placeholder="Number of Siblings" value="{{old('siblings')}}" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <div class="col-sm-9">
                                            <label class="control-label">Emergency Contact Name</label>
                                            <input type="text" class="form-control" name="emergency_name" id="edit_emergency_contact" placeholder="Name of Emergency Contact" value="{{old('emergency_name')}}" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-9">
                                            <label class="control-label">Emergency Contact Phone</label>
                                            <input type="number" class="form-control" name="emergency_phone" id="edit_emergency_phone" placeholder="Phone of Emergency Contact" value="{{old('emergency_phone')}}" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-9">
                                            <label class=" control-label">Relationship of Student With Emergency Contact</label>
                                            <input type="text" class="form-control" name="emergency_relationship" id="edit_emergency_relationship" placeholder="Relationship Between Student and Emergency Contact" value="{{old('emergency_relationship')}}" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-9">
                                            <label class="control-label">Select a Class</label>
                                            <select name="class_id" id="random" class="form-control">
                                                <option value="" id="edit_class"></option>
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
                                <textarea class="form-control"name="medical_info" rows="5" id="edit_medical_info"></textarea>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="edit_modal-footer modal-footer">
                    <div class="form-group m-2">
                        <button  type="button"  class="edit_button btn btn-lg btn-primary" id="edit_button">Save Changes</button>
                    </div>

                    <div class="form-group m-2">
                        <button class="btn btn-lg btn-danger" data-dismiss="modal">Cancel</button>
                    </div>

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
                    <button class="btn btn-primary btn-lg" data-toggle="collapse" data-target="#student_info">Student Information</button>
                    <button class="btn btn-primary btn-lg" data-toggle="collapse" data-target="#parent_info">Parents information</button>
                    <form class="form-horizontal collapse" enctype="multipart/form-data" method="post" id="student_info">

                        <div class="card-body">
                            <p class="text-info">Student Information</p>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <div class="col-sm-8">
                                            <label for="surname" class="control-label">Surname</label>
                                            <input type="text" name="surname"class="form-control" id="surname" placeholder="Surname" value="{{old('surname')}}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <div class="col-sm-8">
                                            <label for="fname" class="control-label">First Name</label>
                                            <input type="text" class="form-control" name="first_name" id="fname" placeholder="First Name" value="{{old('first_name')}}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <div class="col-sm-8">
                                            <label for="other_name" class="control-label">Other Name</label>
                                            <input type="text" class="form-control" name="other_name" id="other_name" placeholder="Other Name" value="{{old('other_name')}}" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div><br><hr>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <div class="col-md-9">
                                            <label for="Date_of_Birth" class=" control-label">Pick date of Birth</label>
                                            <input type="date" id="dob" class="form-control" name="Date_of_Birth" placeholder="Date Of birth" value="{{old('Date_of_Birth')}}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-9">
                                            <label for="religion" class="control-label">Select Religion</label>
                                            <input type="text" name="view_religion" class="form-control" id="select_religion" placeholder="Primary/School Attended" value="{{old('school_attended')}}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-9">
                                            <label for="school_attended" class=" control-label">Primary/School Attended</label>
                                            <input type="text" name="school_attended" class="form-control" id="former_school" placeholder="Primary/School Attended" value="{{old('school_attended')}}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-9">
                                            <label class=" control-label">Number of Siblings</label>
                                            <input type="number" class="form-control" name="siblings" id="boys" placeholder="Number of Siblings" value="{{old('siblings')}}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <div class="col-sm-9">
                                            <label class="control-label">Emergency Contact Name</label>
                                            <input type="text" class="form-control" name="emergency_name" id="emergency_contact" placeholder="Name of Emergency Contact" value="{{old('emergency_name')}}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-9">
                                            <label class="control-label">Emergency Contact Phone</label>
                                            <input type="number" class="form-control" name="emergency_phone" id="emergency_phone" placeholder="Phone of Emergency Contact" value="{{old('emergency_phone')}}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-9">
                                            <label class=" control-label">Relationship of Student With Emergency Contact</label>
                                            <input type="text" class="form-control" name="emergency_relationship" id="emergency_relationship" placeholder="Relationship Between Student and Emergency Contact" value="{{old('emergency_relationship')}}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-9">
                                            <label class="control-label">Class</label>
                                            <input type="text" class="form-control" name="view_class_name" id="view_class" placeholder="Other Name" value="{{old('other_name')}}" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>

                            <div class="form-group">
                                <label>Relevant medical information(Please indicate if he/she suffers from any disease)</label>
                                <textarea class="form-control"name="medical_info" rows="5" id="medical_info" readonly value=""></textarea>
                            </div>

                        </div>


                    </form>

                    <div class="collapse" id="parent_info"><br>
                        <h4>Parents Information</h4>
                        <div id="">
                            <P id="parents_detailzzz">Loading Parent's Data please wait</P>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">

                    <div class="form-group ">
                        <button  type="button"  class="edit_button btn btn-primary" id="pdf_button">Generate Parent's PDF Report</button>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!--jquery-->
    <script>
        //launch the new parent modal
        $(document).ready(function () {
            $(document).on('click','.new_parent_mod',function () {
                //remove any errors
                $('.alert').hide();

                var parent_count = $(this).data('parent');
                if(parent_count > 2){
                    //student has enough parents
                    $('#parent_message').show();
                    $('#parent_message').text("You can't add anymore parents/guardian to this child!! "+"This child has enough parents/guardians");
                    $('#parent_category_1').hide();
                    $('#oneForm').hide();
                    $('#secondForm').hide();
                    $('#parent_button').hide();
                    $('#existing_parent').hide();
                }else{
                    $('#parent_category_1').show();
                    $('#parent_message').hide();
                }
                $('#parent_student_id').val($(this).data('id'));
                $('#parentModal').modal('show');
                $('.error').hide();

            });
        });

        //check if parent form is 1/2
        $(document).ready(function () {
            //hide the second form
            $('#secondForm').hide();
            $('#oneForm').hide();
            $('#parent_button').hide();
            $('#existing_parent').hide();

            $('#parent_category').change(function () {
                $('#parent_button').show();
               var parent_category = this.value;

               if(parent_category === 'single' || parent_category === 'guardian'){
                    //display only one form
                    $('#oneForm').show();
                    $('#secondForm').hide();
                   $('#existing_parent').hide();

                    //single or guardian
                    if(parent_category === 'single'){
                        //title changes to single
                        $('.parent_title').text('Parent Information');
                        $('.parent_name').text('Parent Name');
                    }else{
                       $('.parent_title').text('Guardian Information');
                       $('.parent_name').text('Guardian Name');
                    }

               }else if(parent_category === 'parents'){
                    //display form 1 and 2
                   $('.parent_title').text("Father's Information");
                   $('.parent_name').text("Father's Name");
                   $('#oneForm').show();
                   $('#secondForm').show();
                   $('#existing_parent').hide();
               }else{
                   $('#oneForm').hide();
                   $('#secondForm').hide();
                   $('#existing_parent').show();
               }
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
                $('.error').hide();
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
                $('.alert').remove();//remove any errors
                $('#editModal').modal('show');
            });
        });

        //launch the student details
        $(document).ready(function () {
            //get the parent's info
            $(document).on('click','.student_details',function () {
               //$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
                $value = $(this).data('id');
                $.ajax({
                    type:'get',
                    url:'/student/parent_info',
                    data:{'search':$value},
                    success:function (data) {
                        $('#parents_detailzzz').html(data);
                        //alert(data);
                    }
                });

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
                            if(data.status === 200)
                                $('#studentsTable').ajax.reload();
                                alert('Record has been updated successfully. Refresh Page');
                                $('#editModal').modal('hide');
                                $('.alert').remove();
                                 //toastr.success("Record saved");
                    },

                    error: function (xhr) {
                        alert('There is an error. check the form again');
                        $('#validation-errors').html('');
                        $.each(xhr.responseJSON.message, function(key,value) {
                            $('#validation-errors').append('<div class="alert alert-danger">'+value+'</div');
                        });
                    },
                });
            });

        });

        //add parent logic
        $(document).ready(function () {
            $(document).on('click','.parent_submit',function () {
                $.ajax({
                    type:'post',
                    url:'/parents',
                    data:{
                        'existing_parent_phone':$('input[name=existing_parent_phone]').val(),

                        '_token':$('input[name=_token]').val(),
                        'student_id':$('input[name=parent_student_id]').val(),
                       'parent_category':$('#parent_category option:selected').val(),

                        'parent_one':$('input[name=one_parent_name]').val(),
                        'one_occupation':$('input[name=one_occupation]').val(),
                        'one_residential':$('input[name=one_residential]').val(),
                        'one_address':$('input[name=one_address]').val(),
                        'one_contact':$('input[name=one_contact]').val(),

                        'two_parent':$('input[name=two_parent]').val(),
                        'two_residential':$('input[name=two_residential]').val(),
                        'two_address':$('input[name=two_address]').val(),
                        'two_contact':$('input[name=two_contact]').val(),
                        'two_occupation':$('input[name=two_occupation]').val()
                    },

                    success:function (data) {
                        $('#parentModal').modal('hide');
                        alert('New Record has been saved successsfully');
                    },

                    error: function (xhr) {
                        alert('There is an error. check the form again');
                        $('#parent_validation-errors').html('');
                        $.each(xhr.responseJSON.message, function(key,value) {
                            $('#parent_validation-errors').append('<div class="alert alert-danger">'+value+'</div');
                        });
                    },
                });
            });
        });

        //generate pdf file
        $(document).ready(function(){
           var doc = new jsPDF();
            var specialElementHandlers = {
                '#editor': function (element, renderer) {
                    return true;
                }
            };

           $('#pdf_button').click(function () {
              //alert('creating pdf');
               doc.fromHTML($('#parent_info').html(), 15, 15, {
                   'width': 170,
                   'elementHandlers': specialElementHandlers
               });
               doc.save('sample-file.pdf');
           });
        });

    </script>

    <script type="text/javascript">
        $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
    </script>

    <!--generate reports-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>

@endsection
