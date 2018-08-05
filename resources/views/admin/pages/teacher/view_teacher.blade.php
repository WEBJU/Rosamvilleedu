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
              <li class="breadcrumb-item active">Teachers List</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
        <h1 style="margin-left:20px;">View Teacher</h1>
        <form action="#" method="get" class="sidebar-form m-2">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
                  <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                  </button>
                </span>
          </div>
        </form>
        <table  class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Teachers Name</th>
            <th>TSC Number</th>
              <th>Class</th>
            <th colspan="2">Action</th>
          </tr>

          </thead>
          <tbody>
              @if(count($teacher) > 0)
                @foreach($teacher as $teach)
                  @if(count($users) > 0)
                    @foreach($users as $user)
                      @if($teach->user_id == $user->id)
                        <tr>
                          <td>{{$user->sur_name}} {{$user->first_name}} {{$user->last_name}}</td>
                          <td>{{$teach->teacher_tsc_no}}</td>
                          @if(count($classes) > 0)
                            @foreach($classes as $clases)
                              @if($clases->class_teacher_id == $teach->user_id)
                              <td>{{$clases->class_name}}</td>
                              @endif
                            @endforeach
              @else
              {{-- if the no teacher exists in the database  --}}

              @endif
                        
                        
                        
                        <td>
                            <form action="/viewTeachers/destroy" method="POST">
                              @csrf
                              <input type="hidden" value="{{$teach->user_id}}" name="delete_teacher">
                              <button  class="btn btn-danger m-2">Delete</button>                              
                          </form> 
                        </td>
                        <td>                                                         
                            <button 
                            class="btn btn-info"
                            type="button"
                            data-teacher_id="{{$teach->user_id}}" 
                            data-teacher_surname="{{$user->sur_name}}" 
                            data-teacher_fname = "{{$user->first_name}}"
                            data-teacher_lname = "{{$user->last_name}}"
                            data-teacher_tsc_no = "{{$teach->teacher_tsc_no}}"
                            data-teacher_class = "{{$clases->class_name}}"
                            data-toggle="modal" 
                            data-target="#editTeacherModal">Edit</button>
                          
                        </td>
                     </tr>                      
                    @endif
                  @endforeach
                @endif
              @endforeach
            @endif
          
        </tbody>

        <!--Edit modal-->
        <div class="modal modal fade" id="editTeacherModal" role="dialog">
            <div class="modal-dialog">
                <!--Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h1>Edit Teacher</h1>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>    
                    <div class="modal-body">
                    <form class="form-horizontal" action="/viewTeachers/update/{{$teach->user_id}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <p class="text-info">Teacher Information</p>
                            <input type="hidden" name="teacher_id" id="teacher_id" value="{{$teach->user_id}}">
                            <div class="form-group">                                
                                <label for="surname" class="col-sm-2 control-label">Surname</label>
                                <div class="col-sm-10">                                    
                                    <input type="text" name="teacher_surname" class="form-control" id="teacher_surname">
                                </div>
                            </div>
                            <div class="form-group">                                
                                <label for="first_name" class="col-sm-2 control-label">First Name</label>
                                <div class="col-sm-10">                                    
                                    <input type="text" name="teacher_fname" class="form-control" id="teacher_fname">
                                </div>
                            </div>
                            <div class="form-group">                                
                                <label for="last_name" class="col-sm-2 control-label">Last Name</label>
                                <div class="col-sm-10">                                    
                                    <input type="text" name="teacher_lname" class="form-control" id="teacher_lname">
                                </div>
                            </div>
                            <div class="form-group">                                
                                <label for="teacher_tsc_no" class="col-sm-2 control-label">TSC Number</label>
                                <div class="col-sm-10">                                    
                                    <input type="text" name="teacher_tsc_no" class="form-control" id="teacher_tsc_no">
                                </div>
                            </div>
                            <div class="form-group">                                
                                <label for="teacher_class" class="col-sm-2 control-label">Class</label>
                                <div class="col-sm-10">                                    
                                    <input type="text" name="teacher_class" class="form-control" id="teacher_class">
                                </div>
                            </div>                                                        
                        </div>             
    
                    <div class="modal-footer">                                                    
                            {{-- <input type="hidden" value="$subject->id" id="subject_id" name="subject_id"> --}}
                            <button type="submit" class="btn btn-danger">Save Changes</button>                          
                        </form>
                        <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
         <!--jquery-->
    <script>
      $('#editTeacherModal').on('show.bs.modal', function(event){

        var button = $(event.relatedTarget)// button that triggered the modal
        var teacher_id = button.data('teacher_id')
        var teacher_surname = button.data('teacher_surname') //Extra info from data.* attr
        var teacher_fname = button.data('teacher_fname') //Extra info from data.* attr
        var teacher_lname = button.data('teacher_lname') //Extra info from data.* attr
        var teacher_tsc_no = button.data('teacher_tsc_no') //Extra info from data.* attr
        var teacher_class = button.data('teacher_class') //Extra info from data.* attr       

        var modal = $(this)
        modal.find('.modal-body #teacher_id').val(teacher_id)
        modal.find('.modal-body #teacher_surname').val(teacher_surname)
        modal.find('.modal-body #teacher_fname').val(teacher_fname)
        modal.find('.modal-body #teacher_lname').val(teacher_lname)
        modal.find('.modal-body #teacher_tsc_no').val(teacher_tsc_no)
        modal.find('.modal-body #teacher_class').val(teacher_class)
      })
     
    </script>
  @endsection
