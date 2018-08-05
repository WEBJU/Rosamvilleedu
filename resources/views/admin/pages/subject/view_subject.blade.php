@extends('admin.index')
  @section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Subjects</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Subjects List</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
        <h1 style="margin-left:20px;">View Subjects</h1>
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
            <th>Subject id</th>
            <th>Subject Name</th>
            <th>Delete</th>
            <th>Edit</th>
          </tr>
          </thead>
          <tbody>

            {{-- check if subject is greater than 1 --}}
              @if(count($subjects) > 0)
                {{-- loop through the subjects --}}
              @foreach ($subjects as $subject)
          <tr>
            <td>{{$subject->id}}</td>
            <td>{{$subject->subject_name}}</td>
            <td>
              <form action="/viewSubjectDetails/destroy" method="POST">
                @csrf
                <input type="hidden" name="delete_subject" value="{{$subject->id}}">
                <button class="btn btn-danger mr-1">Delete</button>
              </form>
            </td>
            <td>              
                <button 
                  class="btn btn-info"
                  type="button"
                  data-subject_id="{{$subject->id}}" 
                  data-subject_name="{{$subject->subject_name}}" 
                  data-toggle="modal" 
                  data-target="#editSubjectModal">Edit</button>
              
            </td>
          </tr>
          </tbody>

        </tbody>
          @endforeach
          @endif

          <!--Edit modal-->
          <div class="modal modal fade" id="editSubjectModal" role="dialog">
            <div class="modal-dialog">
                <!--Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h1>Edit Subject</h1>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>    
                    <div class="modal-body">
                    <form class="form-horizontal" action="/viewSubjectDetails/update/{{$subject->id}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <p class="text-info">Subject Information</p>
                            <div class="form-group">
                                <label for="subject_name" class="col-sm-2 control-label">Subject</label>
                                <div class="col-sm-10">
                                    <input type="hidden" name="subject_id" id="subject_id" value="{{$subject->id}}">
                                    <input type="text" name="subject_name" class="form-control" id="subject_name">
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
      $('#editSubjectModal').on('show.bs.modal', function(event){

        var button = $(event.relatedTarget)// button that triggered the modal
        var subject_id = button.data('subject_id')
        var subject_name = button.data('subject_name') //Extra info from data.* attr

        var modal = $(this)
        modal.find('.modal-body #subject_id').val(subject_id)
        modal.find('.modal-body #subject_name').val(subject_name)
      })
     
    </script>
  @endsection
