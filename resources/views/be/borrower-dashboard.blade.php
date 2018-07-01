@extends('layout.master')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="box-body">
      <h1>Manage Information</h1>
    </div>
  </div>
  <div class="col-md-6">
    <!-- /.box-header -->
    <div class="box-body">
        <!-- text input -->
        <div class="form-group">
          <label>Full Name <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i></label>
          <input type="text" name="full_name" class="form-control" value="">
        </div>
        <div class="form-group">
          <label>Address <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i></label>
          <input type="text" name="address" class="form-control" value="">
        </div>
        <div class="form-group">
          <label>Mobile No. <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i></label>
          <input type="text" name="mobile_no" class="form-control" value="">
        </div>
        <div class="form-group">
          <label>Current Employer <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i></label>
          <input type="text" name="first_name" class="form-control" value="">
        </div>
        <div class="form-group">
          <label>Job Title <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i></label>
          <input type="text" name="first_name" class="form-control" value="">
        </div>
        <div class="form-group">
          <label>Monthly Net Income <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i></label>
          <input type="text" name="first_name" class="form-control" value="">
        </div>
    </div>
  </div>

  <div class="col-md-6">
    <!-- /.box-header -->
    <div class="box-body">
        <!-- text input -->
        <div class="form-group">
          <label>No of. months/years on the company <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i></label>
          <input type="text" name="full_name" class="form-control" value="">
        </div>
        <div class="form-group">
          <label>Birthdate <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i></label>
          <input type="text" name="first_name" class="form-control" value="">
        </div>
    </div>
  </div>

</div>

@endsection     
