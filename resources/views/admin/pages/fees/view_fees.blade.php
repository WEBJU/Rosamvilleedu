@extends('admin.index')
  @section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Fees</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Fees</li>
            </ol>
            
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <a href="/addUser" class="btn btn-default">Go Back</a>
    <br>
        <h1 style="margin-left:20px;">View Fees</h1>
        <form action="#" method="get" class="sidebar-form m-2">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search Fees...">
            <span class="input-group-btn">
                  <button type="submit" name="search_fees" id="search-btn" class="btn btn-primary"><i class="fa fa-search"></i>
                  </button>
                </span>
          </div>
        </form>
        <table  class="table">
          <thead>
          <tr>
            <th>student Name</th>
            <th>Class Name</th>
            <th>Amount Paid</th>
            <th>Date Paid</th>
            <th>Balance </th>
            <th>Action</th>
          </tr>

          </thead>
          <tbody>
            @if(count($all_fees) > 0)
              @foreach($all_fees as $fees)
                @if(count($all_students) > 0)
                  @foreach($all_students as $students)
                    @if(count($all_classes) > 0)
                      @foreach($all_classes as $classes)
                        @if($fees->student_id == $students->id && $classes->id == $students->class_id)
                          <tr>
                              <td>{{$students->student_surname}} {{$students->student_firstname}} {{$students->student_other_name}}</td>                             
                              <td>{{$classes->class_name}}</td>
                              <td>{{$fees->amount_paid}}</td>
                              <td>{{$fees->date_paid}}</td>
                              <td>{{$fees->balance}}</td>
                              <td>
                              <form action="/feeDetails/destroy" method="POST">
                                @csrf
                                <input type="hidden" name="delete_fees" value="{{$fees->id}}">
                                <button class="btn btn-danger m-1">DELETE</button>
                              </form>
                              </td>
                              <td>
                                <button 
                                  class="btn btn-info"
                                  type="button"
                                  data-fees_id="{{$fees->id}}"
                                  data-student_surname = "{{$students->student_surname}}"
                                  data-student_fname="{{$students->student_firstname}}" 
                                  data-student_lname="{{$students->student_other_name}}"
                                  data-student_class="{{$classes->class_name}}"
                                  data-amount_paid="{{$fees->amount_paid}}"
                                  data-date_paid= "{{$fees->date_paid}}"
                                  data-balance="{{$fees->balance}}"                                
                                  data-toggle="modal" 
                                  data-target="#editFeeModal">Edit</button>                              
                              </td>
                              <td>
                              
                                <button class="btn btn-secondary m-1">Print Receipt</button>
                              </form>
                              </td>                             
                          </tr>
                        @endif
                      @endforeach                    
                    @endif
                  @endforeach                
                @endif
              @endforeach
            @endif          
        </tbody>
        </table>

        <!--Edit modal-->
        <div class="modal modal fade" id="editFeeModal" role="dialog">
            <div class="modal-dialog">
                <!--Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h1>Edit Fee</h1>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>    
                    <div class="modal-body">
                    <form class="form-horizontal" action="/feeDetails/update/{{$fees->id}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <p class="text-info">Fees Information</p>
                            <input type="hidden" name="fees_id" id="fees_id" value="{{$fees->id}}">
                            <div class="form-group">                                
                                <label for="surname" class="col-sm-2 control-label">Surname</label>
                                <div class="col-sm-10">                                    
                                    <input type="text" name="student_surname" class="form-control" id="student_surname">
                                </div>
                            </div>
                            <div class="form-group">                                
                                <label for="first_name" class="col-sm-2 control-label">First Name</label>
                                <div class="col-sm-10">                                    
                                    <input type="text" name="student_fname" class="form-control" id="student_fname">
                                </div>
                            </div>
                            <div class="form-group">                                
                                <label for="last_name" class="col-sm-2 control-label">Last Name</label>
                                <div class="col-sm-10">                                    
                                    <input type="text" name="student_lname" class="form-control" id="student_lname">
                                </div>
                            </div>
                            <div class="form-group">                                
                                <label for="student_class" class="col-sm-2 control-label">Class</label>
                                <div class="col-sm-10">                                    
                                    <input type="text" name="student_class" class="form-control" id="student_class">
                                </div>
                            </div> 
                            <div class="form-group">                                
                                <label for="amount_paid" class="col-sm-2 control-label">Amount Paid</label>
                                <div class="col-sm-10">                                    
                                    <input type="text" name="amount_paid" class="form-control" id="amount_paid">
                                </div>
                            </div>
                            <div class="form-group">                                
                                <label for="date_paid" class="col-sm-2 control-label">Date of Payment</label>
                                <div class="col-sm-10">                                    
                                    <input type="date" name="date_paid" class="form-control" id="date_paid">
                                </div>
                            </div>
                            <div class="form-group">                                
                                <label for="balance" class="col-sm-2 control-label">Balance</label>
                                <div class="col-sm-10">                                    
                                    <input type="text" name="balance" class="form-control" id="balance">
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
      $('#editFeeModal').on('show.bs.modal', function(event){
        var button = $(event.relatedTarget)// button that triggered the modal
        var fees_id = button.data('fees_id')
        var student_surname = button.data('student_surname') //Extra info from data.* attr
        var student_fname = button.data('student_fname') //Extra info from data.* attr
        var student_lname = button.data('student_lname') //Extra info from data.* attr
        var student_class = button.data('student_class') //Extra info from data.* attr
        var amount_paid = button.data('amount_paid')
        var date_paid = button.data('date_paid') //Extra info from data.* attr   
        var balance = button.data('balance') //Extra info from data.* attr       

        var modal = $(this)
        modal.find('.modal-body #fees_id').val(fees_id)
        modal.find('.modal-body #student_surname').val(student_surname)
        modal.find('.modal-body #student_fname').val(student_fname)
        modal.find('.modal-body #student_lname').val(student_lname)
        modal.find('.modal-body #student_class').val(student_class)
        modal.find('.modal-body #amount_paid').val(amount_paid)
        modal.find('.modal-body #date_paid').val(date_paid)
        modal.find('.modal-body #balance').val(balance)

       
      })
    </script>
     
  @endsection
