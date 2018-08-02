@extends('admin.index')
  @section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Class</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Classs List</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
      <a href="/addClass" class="btn btn-primary ml-2">Add New Class</a>
        <h1 style="margin-left:20px;">View Class</h1>
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
            <th>Class Type</th>
            <th>Description</th>
            <th>Amount</th>
            <th>Date Spend</th>
            <th>Action</th>
          </tr>

          </thead>
          <tbody>
            @if (count($Classs)>0)
              @foreach ($Classs as $Class)
          <tr>
            <td>{{}}</td>
            <td>{{}}</td>
            <td>Kshs.{{}}</td>
            <td>{{}}</td>
            <td><a href="#" class="btn btn-info">Edit</a><a href="#" class="btn btn-danger m-2">Delete</a><a href="#" class="btn btn-secondary">Print Details</a></td>

          </tr>
              @endforeach
            @endif
        </tbody>
  @endsection
