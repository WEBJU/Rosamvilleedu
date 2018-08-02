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
                <form action="#" method="get" class="sidebar-form m-2">
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
                        <tr class="table-hover">
                            <td>{{$student->student_surname}}</td>
                            <td>{{$student->student_firstname}}</td>
                            <td>{{$student->student_other_name}}</td>
                            <td>{{$student->student_class}}</td>
                            <td>{{$student->student_date_of_birth}}</td>
                            <td>
                                <a href="/addparent/existing_parents/{{$student->id}}" class="btn btn-primary">Existing parent</a>
                                <a href="#" class="btn btn-success" id="new_parent">New parent </a>
                            </td>

                            <td>
                                <a href="#" class="delete_student btn btn-danger m-1" id="delete_student">Delete</a>
                                <a href="#" class="btn btn-info" id="edit_student">Edit
                                </a><a href="#" class="btn btn-secondary m-1" id="student_details">More Details</a>
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
    <div class="modal fade" id="deleteModal" role="dialog">
        <div class="modal-dialog">
            <!--Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Delete</h1>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <h4>Are you sure you want to delete this item</h4>
                </div>

                <div class="modal-footer">
                    <form>
                        {{csrf_token()}}
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!--Edit Modal-->
    <div class="modal fade" id="editModal" role="dialog">
        <div class="modal-dialog">
            <!--modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Edit Student Record</h1>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form class="form-horizontal" action="/updateStudent" enctype="multipart/form-data">
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
                                <label for="" class="col-sm-2 control-label">Select Religion</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="select_religion">
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
                                    <input type="text" name="school_attended" class="form-control" id="former_school" placeholder="Primary/School Attended">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Number of Siblings</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control m-2" name="boys" id="boys" placeholder="Number of Siblings" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Relevant medical information(Please indicate if he/she suffers from any disease)</label>
                                <textarea class="form-control"name="medical_info" rows="5" ></textarea>
                            </div>

                            <div class="form-group m-2">
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

                        <!-- /.card-footer -->

                    </form>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!--View Details modal-->
    <div class="modal fade" id="studentDetailsModal" role="dialog">
        <div class="modal-dialog">
            <!--modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Student Details</h1>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form class="form-horizontal" action="/updateStudent" enctype="multipart/form-data">
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
                                <label for="" class="col-sm-2 control-label">Select Religion</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="select_religion">
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
                                    <input type="text" name="school_attended" class="form-control" id="former_school" placeholder="Primary/School Attended">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Number of Siblings</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control m-2" name="boys" id="boys" placeholder="Number of Siblings" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Relevant medical information(Please indicate if he/she suffers from any disease)</label>
                                <textarea class="form-control"name="medical_info" rows="5" ></textarea>
                            </div>

                            <div class="form-group m-2">
                                <button  type="button"  class="btn btn-primary mb-2">Print Details</button>
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
                    <button type="submit" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        //launch the new parent modal
        $(document).ready(function () {
            $('#new_parent').click(function () {
                $('#parentModal').modal();
            });
        });

        //launch the delete modal
        $(document).ready(function () {
           $('.delete_student').click(function () {
              $('#deleteModal').modal('show');
           });
        });

        //launch the edit modal
        $(document).ready(function () {
            $('#edit_student').click(function () {
                $('#editModal').modal();
            });
        });

        //launch the student details
        $(document).ready(function () {
            $('#student_details').click(function () {
                $('#studentDetailsModal').modal();
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

    </script>

    <script type="text/javascript">
        $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
    </script>

@endsection
