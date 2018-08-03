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
              <li class="breadcrumb-item active">Add Fees</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
        <h1 style="margin-left:20px;">Add Fees</h1>
            <form class="form-horizontal" action="/addFees/store" enctype="multipart/form-data" method="POST">
              @csrf
                  <div class="card-body">
                    <h3>Fee Payment Details</h3>
                    <div class="form-group">
                        <label for="surname" class="col-sm-2 control-label">Student ID</label>
                        <div class="col-sm-10">
                            <select name="student_id" class="form-control">
                                @foreach($all_students as $student)
                                  <option value="{{$student->id}}">{{$student->id}}</option>
                                @endforeach
                            </select>
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
                        <label for="surname" class="col-sm-2 control-label">School Term</label>
                        <div class="col-sm-10">
                          <select name="school_term" class="form-control">
                            <option value="term_one">Term One</option>
                            <option value="term_two">Term Two</option>
                            <option value="term_three">Term Three</option>
                          </select>
                        </div>
                      </div>
                    <div class="form-group">
                      <label for="surname" class="col-sm-2 control-label">Total Fees </label>
                      <div class="col-sm-10">
                        <input type="text" name="total_fees"class="form-control" id="amount" placeholder="Total Fees">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="surname" class="col-sm-2 control-label">Amount Paid</label>
                      <div class="col-sm-10">
                        <input type="text" name="amount_paid"class="form-control" id="amount_paid" placeholder="Amount Paid">
                      </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="other_name" class="col-sm-2 control-label">Payment Date</label>                          
                            <div class="col-sm-10">
                              <input type="date" class="form-control" name="date_of_payment">                                                      
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="surname" class="col-sm-2 control-label">Balance</label>
                      <div class="col-sm-10">
                        <input type="text" name="fee_balance"class="form-control" id="balance" placeholder="Balance">
                      </div>
                    </div>
                          <div class="form-group m-2">
                              <button  type="submit"  class="btn btn-primary mb-2">Add Fees</button>
                          </div>
                  </div>

                  <!-- /.card-footer -->
                </form>
  @endsection
