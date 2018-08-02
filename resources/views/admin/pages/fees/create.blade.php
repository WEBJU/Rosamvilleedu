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
                        <input type="text" name="student_id"class="form-control" id="student_id" placeholder="Student ID">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Term</label>
                      <div class="col-sm-10">
                        <select class="form-control" id="select_religion" name="school_terms">
                          <option value="first_term">First Term</option>
                          <option value="second_term">Second Term</option>
                          <option value="third_term">Third Term</option>
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
                      <label for="surname" class="col-sm-2 control-label">Class ID</label>
                      <div class="col-sm-10">
                        <input type="text" name="class_id"class="form-control" id="class_id" placeholder="Class ID">
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="other_name" class="col-sm-2 control-label">Payment Date</label>
                          <div class="input-group date" data-provide="datepicker">
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="date_of_payment">
                            </div>
                            <span class="input-group-addon">
                                <span class="fa fa-calender"></span>
                            </span>
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
