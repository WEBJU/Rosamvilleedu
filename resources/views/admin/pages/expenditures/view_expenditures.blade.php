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
            <th>Amount</th>
            <th>Date Spend</th>
            <th>Action</th>
          </tr>

          </thead>
          <tbody>
          <tr>
            <td>Dummmy Expenditure</td>
            <td>Kshs.2000</td>
            <td>12/3/2018</td>
            <td><a href="#" class="btn btn-info">Edit</a><a href="#" class="btn btn-danger m-2">Delete</a><a href="#" class="btn btn-secondary">Print Details</a></td>

          </tr>
        </tbody>
  @endsection
