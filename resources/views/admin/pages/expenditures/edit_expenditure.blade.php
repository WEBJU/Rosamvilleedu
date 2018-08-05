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
              <li class="breadcrumb-item active">Edit Expenditure</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

        <h1 style="margin-left:20px;">Edit Expenditure</h1>
            <form class="form-horizontal" action="{{action('ExpendituresController@update',$id)}}" method="post" enctype="multipart/form-data" >
                @csrf
                 <input type="hidden" name="_method" value="PATCH">
                  <div class="card-body">
                    <h3>Edit Expenditure Details</h3>
                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Type of Expenditure</label>
                      <div class="col-sm-10">
                        <select class="form-control" name="expenditure" id="select_expenditure">
                          <option value="Food" @if($expenditure->expenditure_type=="Food")
                            selected
                          @endif>Food</option>
                          <option value="Equipments" @if($expenditure->expenditure_type=="Equipments")
                          @endif>Equipments</option>
                          <option value="Repairs" @if($expenditure->expenditure_type=="Repairs")
                          @endif>Repairs</option>
                        </select>
                      </div>

                    </div>
                    <div class="form-group">
                      <label>Description</label>
                      <div class="col-sm-10">
                        <textarea value="{{ $expenditure->description }}" class="form-control" name="description" rows="5" placeholder="Give detailed description of the spenditure "></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="surname" class="col-sm-2 control-label">Amount</label>
                      <div class="col-sm-10">
                        <input type="text" name="amount" value="{{$expenditure->amount_spend}}" class="form-control" id="amount" placeholder="Amount">
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="other_name" class="col-sm-2 control-label">Date Spend</label>
                          <div class="input-group date" data-provide="">
                            <div class="col-sm-10">
                              <input type="date" value="{{$expenditure->date_spend}}" class="form-control" name="date_spend">
                            </div>
                            <span class="input-group-addon">
                                <span class="fa fa-calender"></span>
                            </span>
                        </div>
                    </div>
                          <div class="form-group m-2">
                              <button  type="submit"  class="btn btn-primary mb-2">Edit Expenditure</button>
                          </div>
                  </div>

                  <!-- /.card-footer -->
                </form>
  @endsection
