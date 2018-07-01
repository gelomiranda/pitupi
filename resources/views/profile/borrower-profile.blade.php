@extends('layout.master')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="box-body">
      <h1>Manage Information</h1>
    </div>
    @if($errors->any())
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-ban"></i> Error!</h4>
        <p>{{$errors->first()}}</p>
      </div>
                   
    @endif
    @if (session('status'))
        <div class="alert alert-success alert-dismissible">
        <h4><i class="icon fa fa-ban"></i> Success</h4>
          <p>  {{ session('status') }}</p>
        </div>
    @endif
  </div>
   {{ Form::open(array('url' => 'profile', 'method' => 'post')) }}
  <div class="col-md-6">
    <!-- /.box-header -->
    <div class="box-body login-box-body">
        <!-- text input -->
        <div class="form-group">
          <label>Full Name <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i></label>
          <input type="text" name="fullname" class="form-control" value="@if(!$profile->isEmpty()) {{ $profile[0]->profile_fullname }} @endif {{ old('fullname') }}">
        </div>
        <div class="form-group">
          <label>Address <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i></label>
          <input type="text" name="address" class="form-control" value="@if(!$profile->isEmpty()) {{ $profile[0]->profile_address }} @endif {{ old('address') }}">
        </div>
        <div class="form-group">
          <label>Mobile No. <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i></label>
          <input type="text" placeholder="0917xxxxxxx" name="mobile_no" class="form-control" value="@if(!$profile->isEmpty()) {{ $profile[0]->profile_mobile_no }} @endif {{ old('mobile_no') }}">
        </div>
        <div class="form-group">
          <label>Current Employer <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i></label>
          <input type="text" name="current_employer" class="form-control" value="@if(!$profile->isEmpty()) {{ $profile[0]->profile_current_employer }} @endif {{ old('current_employer') }}">
        </div>
        <div class="form-group">
          <label>Job Title <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i></label>
          <input type="text" name="job_title" class="form-control" value="@if(!$profile->isEmpty()) {{ $profile[0]->profile_job_title }} @endif {{ old('job_title') }}">
        </div>
        <div class="form-group">
          <label>Monthly Net Income <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i></label>
          <input type="text" name="monthly_income" class="form-control" value="@if(!$profile->isEmpty()) {{ $profile[0]->profile_monthly_income }} @endif {{ old('monthly_income') }}">
        </div>
    </div>
  </div>

  <div class="col-md-6">
    <!-- /.box-header -->
    <div class="box-body login-box-body">
        <!-- text input -->
        <div class="form-group">
          <label>No of. months/years on the company <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i></label>
          <input type="text" name="no_of_years" class="form-control" value="@if(!$profile->isEmpty()) {{ $profile[0]->profile_no_of_years }} @endif {{ old('no_of_years') }}">
        </div>
        <div class="form-group">
          <label>Birthdate <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i></label>
          <input type="text" name="birthdate" class="form-control" value="@if(!$profile->isEmpty()) {{ $profile[0]->profile_birthdate }} @endif {{ old('birthdate') }}">
        </div>

        <div class="form-group">
          <label>Bank <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i></label>
          <input type="text" name="bank" class="form-control" value="@if(!$profile->isEmpty()) {{ $profile[0]->profile_bank }} @endif {{ old('bank') }}">
        </div>
        <div class="form-group">
          <label>Bank Account No<i class="fa fa-check-circle-o text-success" aria-hidden="true"></i></label>
          <input type="text" name="bank_account" class="form-control" value="@if(!$profile->isEmpty()) {{ $profile[0]->profile_bank_account }} @endif {{ old('bank_account') }}">
        </div>
    </div>
  </div>

  <div class="col-md-12">
    <div class="box-body">
      <button type="submit">Update</button>
    </div>
  </div>
  {{ Form::close() }}

</div>

@endsection     
