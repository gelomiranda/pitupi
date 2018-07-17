@extends('layout.master')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="box-body">
      <h1>User Information</h1>
    </div>
  </div>
  <div class="col-md-6">
    <!-- /.box-header -->
    <div class="box-body login-box-body">
        <!-- text input -->
        <div class="form-group">
          <label>Full Name <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i></label>
          <input type="text" disabled name="fullname" class="form-control" value="{{ $profile->profile_fullname }} {{ old('fullname') }}">
        
        </div>
        <div class="form-group">
          <label>Address <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i></label>
          <input type="text" disabled name="address" class="form-control" value="{{ $profile->profile_address }} {{ old('address') }}">
        </div>
        <div class="form-group">
          <label>Mobile No. <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i></label>
          <input type="text" disabled placeholder="0917xxxxxxx" name="mobile_no" class="form-control" value="{{ $profile->profile_mobile_no }} {{ old('mobile_no') }}">
        </div>
        <div class="form-group">
          <label>Current Employer <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i></label>
          <input type="text" disabled name="current_employer" class="form-control" value="{{ $profile->profile_current_employer }} {{ old('current_employer') }}">
        </div>
        <div class="form-group">
          <label>Job Title <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i></label>
          <input type="text" disabled name="job_title" class="form-control" value="{{ $profile->profile_job_title }} {{ old('job_title') }}">
        </div>
        <div class="form-group">
          <label>Monthly Net Income <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i></label>
          <input type="text" disabled name="monthly_income" class="form-control" value="{{ $profile->profile_monthly_income }} {{ old('monthly_income') }}">
        </div>
        <div class="form-group">
          <label>No of. months/years on the company <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i></label>
          <input type="text" disabled name="no_of_years" class="form-control" value="{{ $profile->profile_no_of_years }} {{ old('no_of_years') }}">
        </div>
        <div class="form-group">
          <label>Birthdate <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i></label>
          <input type="text" disabled name="birthdate" class="form-control" value="{{ $profile->profile_birthdate }} {{ old('birthdate') }}">
        </div>

        <div class="form-group">
          <label>Bank <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i></label>
          <input type="text"  disabled name="bank" class="form-control" value="{{ $profile->profile_bank }} {{ old('bank') }}">
        </div>
        <div class="form-group">
          <label>Bank Account No <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i></label>
          <input type="text" disabled name="bank_account" class="form-control" value="{{ $profile->profile_bank_account }} {{ old('bank_account') }}">
        </div>
    </div>
  </div>

  <div class="col-md-6">
    <!-- /.box-header -->
    <div class="box-body login-box-body">
        <p class="text-center">Document List</p>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Description</th>
              <th scope="col">File</th>
            </tr>
          </thead>
          <tbody>
            @foreach($documents as $document)
            <tr>
              <th scope="row">1</th>
              <td>{{$document->document_description}}</td>
              <td>
                 <button type="button" class="btn my_modal btn-default btn-block" data-toggle="modal" data-target="#modal-default" data-link="{{ asset('uploads/'.$document->document_path ) }}">
                   View Me
                 </button>
               </td>
            </tr>
            @endforeach
            
          </tbody>
        </table>

    </div>
    <br>
    <ul class="list-inline pull-right">
        <li><button type="button" id="approved" data-id="{{$profile->user_id}}" class="btn btn-success btn-block">Approved</button></li>
    </ul>
  </div>
  
  </div>
</div>
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <img class="imagepreview img-responsive" src="">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>     
<script type="text/javascript">
  $(document).ready(function(){
    $('.my_modal').click(function(){
      $('.imagepreview').attr('src', $(this).data('link'));
    });

    $('#approved').click(function(){
      
      if(confirm("Are you sure you want to confirm this profile?") == true){
        $.post("{{URL::to('admin/user/approve')}}",
          {
            '_token' : $('meta[name="csrf-token"]').attr('content'),
            'user_id': $(this).data("id")
          }
        ).done(function(msg){
          alert(msg);
        }).error(function(msg){
          console.log( "{{URL::to('admin/user/validate')}} ");
          //alert($('meta[name="csrf-token"]').attr('content'));
        });
      }
    });
  });
</script>

@endsection