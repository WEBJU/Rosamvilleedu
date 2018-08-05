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
              <li class="breadcrumb-item active">Expenditures List</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
      <a href="/addExpenditure" class="btn btn-primary ml-2">Add New Expenditure</a>
        <h1 style="margin-left:20px;">View Expenditure</h1>
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
            <th>Expenditure Type</th>
            <th>Description</th>
            <th>Amount</th>
            <th>Date Spend</th>
            <th colspan="3">Action</th>
          </tr>

          </thead>
          <tbody>
            @if (count($expenditures)>0)
              @foreach ($expenditures as $expenditure)
          <tr>
            <td>{{$expenditure->expenditure_type}}</td>
            <td>{{$expenditure->description}}</td>
            <td>Kshs.{{$expenditure->amount_spend}}</td>
            <td>{{$expenditure->date_spend}}</td>
            <td><a href="{{action('ExpendituresController@edit',$expenditure['id'])}}" class="btn btn-info">Edit</a></td>
            <td><form action="{{action('ExpendituresController@destroy',$expenditure['id'])}}" method="post">
              @csrf
              <input name="_method" type="hidden" value="DELETE">
              <button type="submit" class="btn btn-danger">Delete</button>
            </form></td>
            <td><a href="#" class="btn btn-secondary">Print Details</a></td>

          </tr>
              @endforeach
            @endif
        </tbody>
  @endsection
