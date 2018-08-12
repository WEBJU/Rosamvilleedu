@extends('admin.index')
@section('content')

    <div class="container-fluid">

        <!--Search Button-->
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-6">
                <h1><center>All Parents / Guardians</center></h1>
                <form method="get" class="sidebar-form m-2">
                    <div class="input-group">
                        <input type="text" name="student_search" id="search_query" class="form-control" placeholder="Search Parent Name">
                        <span class="input-group-btn">
                          <button type="submit" name="search_student" id="search-btn" class="btn btn-primary"><i class="fa fa-search"></i>
                          </button>
                         </span>
                    </div>
                </form>
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
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th>Occupation</th>
                    <th>Residence</th>
                    <th>Address</th>
                    <th>Edit</th>
                    <!--<th>Delete</th>-->
                </tr>
                </thead>

                <tbody id="studentsTable1">
                @foreach($parents as $parent)
                    <tr class="parent{{$parent->id}} table-hover">
                        <td>{{$parent->parent_name}}</td>
                        <td>{{$parent->parent_phone_no}}</td>
                        <td>{{$parent->parent_occupation}}</td>
                        <td>{{$parent->parent_residence}}</td>
                        <td>{{$parent->parent_address}}</td>

                        <td>
                            <!--edit-->
                            <a href="#"
                               class="parent_edit btn btn-lg btn-info"
                               id="edit_student"
                               data-id="{{$parent->id}}"
                               data-name="{{$parent->parent_name}}"
                               data-occupation="{{$parent->parent_occupation}}"
                               data-residence="{{$parent->parent_residence}}"
                               data-address="{{$parent->parent_address}}"
                               data-phone="{{$parent->parent_phone_no}}"
                            >Edit</a>
                        </td>

                        <td>
                            <!--delete>
                            <a href="#"
                               class="parent_student btn btn-danger"
                               id="delete_student"
                               data-id="{{$parent->id}}"
                               data-name="{{$parent->parent_name}}"
                            >Delete</a>

                            <!--in the future add details-->
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>

            {{$parents->links()}}

        </div>

    </div>

    <!--Edit modal-->
    <div class="modal fade" id="editModal" role="dialog">
        <div class="modal-dialog">
            <!--modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Edit Parent Record</h1>
                    <button type="button" class="close" data-dismiss="modal">&times</button>
                </div>

                <div class="modal-body">
                    <div id="validation-errors">

                    </div>

                    <form>
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" value="" name="parent_id" id="parent_id">

                        <div class="form-group">
                            <label class="parent_name control-label" id="parent_label_name">Guardian/Parent Name</label>
                            <input type="text" class="form-control" id="parent_name" placeholder="Name" name="one_parent_name">
                        </div>

                        <div class="form-group">
                            <label class="control-label">Occupation</label>
                            <input type="text" class="form-control" id="parent_occupation" placeholder="Occupation" name="one_occupation">
                        </div>

                        <div class="form-group">
                            <label for="" class="control-label">Residential Area</label>
                            <input type="text" class="form-control" id="parent_area" placeholder="Residential Area" name="one_residential">
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="control-label">Address</label>
                            <input type="text" class="form-control" id="parent_address" placeholder="Address" name="one_address">
                        </div>

                        <div class="form-group">
                            <label for="" class=" control-label">Contact</label>
                            <input type="number" class="form-control" id="parent_phone" placeholder="Contact" name="one_contact">
                        </div>
                    </form>
                </div>

                <div class="edit_modal-footer modal-footer">
                    <div class="" id="parent_button">
                        <button type="submit" class="parent_submit btn btn-lg btn-primary">Submit</button>
                    </div>

                    <button type="submit" class="btn btn-lg btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!--Delete modal-->
    <div>

    </div>

    <!--jquery and ajax-->
    <script>
        //live search
        $(document).ready(function () {
            $('#search_query').keyup(function () {
                $value = $(this).val();
                $.ajax({
                    type:'get',
                    url:'/searchParent',
                    data:{
                        'search':$value
                    },
                    success:function (data) {
                        $('tbody').html(data);
                    }
                });
            });
        });

        //launch the edit modal
        $(document).ready(function () {
           $(document).on('click','.parent_edit',function () {
               $('error').hide();
               $('#parent_id').val($(this).data('id'));
               $('#parent_name').val($(this).data('name'));
               $('#parent_address').val($(this).data('address'));
               $('#parent_occupation').val($(this).data('occupation'));
               $('#parent_area').val($(this).data('residence'));
               $('#parent_phone').val($(this).data('phone'));
               $('#editModal').modal('show');
           });
        });

        //launch the delete modal


        //update logic
        $(document).ready(function () {
            $('.edit_modal-footer').on('click','.parent_submit',function () {
                $.ajax({
                    type:"post",
                    url:"/updateParent",
                    data:{
                        '_token':$('input[name=_token]').val(),
                        'parent_id':$('#parent_id').val(),
                        'parent_name':$('#parent_name').val(),
                        'parent_occupation':$('#parent_occupation').val(),
                        'parent_address':$('#parent_address').val(),
                        'parent_contact':$('#parent_phone').val(),
                        'parent_residential':$('#parent_area').val()
                    },

                    success:function (data) {
                        //if(data.status === 200)
                        //$('#studentsTable').ajax.reload();
                        $('#editModal').modal('hide');
                        $('.alert').remove();
                        alert('Record has been updated successfully. Refresh Page');
                        //reload table
                        //$('#studentsTable1').DataTable().ajax().reload();
                        var data_table = $('#studentsTable').DataTable();
                        //data_table.ajax().reload();
                        alert(data_table);
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
    </script>

    <script type="text/javascript">
        $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
    </script>
@endsection
