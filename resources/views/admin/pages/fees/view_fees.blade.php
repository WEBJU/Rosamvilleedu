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
            <a href="/addUser" class="btn btn-default">Go Back</a>
            <br>
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
                        @if($fees->student_id == $students->id)
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
                              <form>
                                @csrf
                                <input type="hidden" name="edit_fees" value="{{$fees->id}}">
                                <button class="btn btn-info">EDIT</button>
                              </form>
                              </td>
                              <td>
                              <form>
                                @csrf
                                <input type="hidden" name="print_fees">
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
          <tr>
            

          </tr>
        </tbody>
  @endsection
