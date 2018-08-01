@extends('admin.index')
  @section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Expenditure</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Add Expenditure</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
        <h1 style="margin-left:20px;">Add Expenditure</h1>
            <form class="form-horizontal" action="/registerStudent" enctype="multipart/form-data">

                  <div class="card-body">
                    <h3>Expenditure Details</h3>
                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Type of Expenditure</label>
                      <div class="col-sm-10">
                        <select class="form-control" id="select_expenditure">
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                        </select>
                      </div>

                    </div>
                    <div class="form-group">
                      <label>Description</label>
                      <div class="col-sm-10">
                        <textarea class="form-control"name="medical_info" rows="5" placeholder="Give detailed description of the spenditure "></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="surname" class="col-sm-2 control-label">Amount</label>
                      <div class="col-sm-10">
                        <input type="text" name="amount"class="form-control" id="amount" placeholder="Amount">
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="other_name" class="col-sm-2 control-label">Date Spend</label>
                          <div class="input-group date" data-provide="datepicker">
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="date_spend">
                            </div>
                            <span class="input-group-addon">
                                <span class="fa fa-calender"></span>
                            </span>
                        </div>
                    </div>
                          <div class="form-group m-2">
                              <button  type="submit"  class="btn btn-primary mb-2">Add Expenditure</button>
                          </div>
                  </div>

                  <!-- /.card-footer -->
                </form>
  @endsection
