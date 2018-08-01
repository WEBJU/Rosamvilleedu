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
                        <input type="text" name="student_search" class="form-control" placeholder="Search Students...">
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
            <table class="table table-striped table-hover">
                <tr>
                    <th>Surname</th>
                    <th>First Name</th>
                    <th>Other Name</th>
                    <th>Class</th>
                    <th>Date Of Birth</th>
                    <th>Add Parent</th>
                    <th>Actions</th>
                </tr>

                <tr class="table-hover">
                    <td>Mr</td>
                    <td>John</td>
                    <td>Doe</td>
                    <td>1c</td>
                    <td>1998/7/17</td>
                    <td>

                        <a href="/addparent/existing_parents/1" class="btn btn-primary">Existing parent</a>
                        <a href="#" class="btn btn-success" id="existing_parent">New parent </a>
                    </td>

                    <td>
                        <a href="#" class="btn btn-danger m-1">Delete</a>
                        <a href="#" class="btn btn-info">Edit
                        </a><a href="#" class="btn btn-secondary m-1">More Details</a>
                    </td>
                </tr>
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
            $('#existing_parent').click(function () {
                $('#parentModal').modal();
            });
        });
    </script>
@endsection
