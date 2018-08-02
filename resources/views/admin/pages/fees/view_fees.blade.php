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
          <tr>
            <td>Dummmy Fees</td>
            <td>Grade 1s</td>
            <td>200</td>
            <td>12/3/4500</td>
            <td>Ksh.2000</td>
            <td><a href="#" class="btn btn-danger m-1">Delete</a><a href="#" class="btn btn-info">Edit</a><a href="#" class="btn btn-secondary m-1">Print Receipt</a></td>

          </tr>
        </tbody>
  @endsection
