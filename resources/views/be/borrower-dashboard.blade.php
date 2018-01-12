@extends('layout.master')
@section('content')
<div class="row">
    <div class="col-md-3">
      <!-- Profile Image -->
      <div class="box box-primary">
        <div class="box-body box-profile">
          <div class="row">
            <div class="col-md-12 text-center">
                <div class="kv-avatar text-center">
                    <div>
                        <input id="avatar-1" name="avatar-1" type="file" required>
                    </div>
                </div>
            </div>   
          </div>         
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

      <!-- About Me Box -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">About Me</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <strong><i class="fa fa-facebook margin-r-5"></i> Facebook ID</strong>
            <p class="text-muted">
              @if($user->facebook_id == '')
                {{ 'N\A' }}
              @else
                {{$user->facebook_id}}
              @endif
            </p>
           <strong><i class="fa fa-linkedin margin-r-5"></i> Linked In ID</strong>
            <p class="text-muted">
              @if($user->linkedin_id == '')
                {{ 'N\A' }}
              @else
                {{$user->linkedin_id}}
              @endif
            </p>
          <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
          <p class="text-muted">{{ $user->permanent_address }}</p>

          <hr>
          <hr>
          <strong><i class="fa fa-file-text-o margin-r-5"></i> More About Me</strong>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
    <div class="col-md-9">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#activity" data-toggle="tab">User Information</a></li>
          <li><a href="#document" data-toggle="tab">Uploaded Documents</a></li>
        </ul>
        <div class="tab-content">
          <div class="active tab-pane" id="activity">
              <div class="row">
                <div class="col-md-12">
                  <div class="box-header with-border">
                    <h3 class="box-title">Update Profile</h3>
                  </div>
                </div>
              </div>
              <div class="row">
                {{ Form::open(array('url' => 'profile', 'method' => 'post')) }}
                <div class="col-md-6">
                    <!-- /.box-header -->
                    {{ session('user') }}
                    <div class="box-body">
                        <!-- text input -->
                        <div class="form-group">
                          <label>First Name <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i></label>
                          <input type="text" name="first_name" class="form-control" value=" @if(isset($user)) {{ $user->first_name }} @endif">
                        </div>
                        <div class="form-group">
                          <label>Middle Name</label>
                          <input type="text" name="middle_name" class="form-control"  value=" @if(isset($user)) {{ $user->middle_name }} @endif">
                        </div>
                        <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="last_name" class="form-control"  value=" @if(isset($user)) {{ $user->last_name }} @endif">
                        </div>
                        <div class="form-group">
                          <label>Gender</label>
                          <select class="form-control" name="gender">
                            <option value="0" @if($user->gender == 0) {{ "selected='selected'" }} @endif >Male</option>
                            <option value="1" @if($user->gender == 1) {{ "selected='selected'" }} @endif >Female</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Date of Birth</label>
                          <input type="date" name="birth_date" class="form-control" id="datepicker"  value=" @if(isset($user)) {{ $user->bday }} @endif">
                        </div>
                        <div class="form-group">
                          <label>Civil Status</label>
                          <select class="form-control" name="civil_status">
                            <option value="0"@if($user->civil_status == 0) {{ "selected='selected'" }} @endif >Single</option>
                            <option value="1"@if($user->civil_status == 1) {{ "selected='selected'" }} @endif >Married</option>
                            <option value="2"@if($user->civil_status == 2) {{ "selected='selected'" }} @endif >Divorced</option>
                            <option value="3"@if($user->civil_status == 3) {{ "selected='selected'" }} @endif >Widowed</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Spouse Name</label>
                          <input type="text" name="spouse_name" class="form-control"  value=" @if(isset($user)) {{ $user->spouse_name }} @endif">
                        </div>
                        <div class="form-group">
                          <label>Educational Attainment</label>
                          <select class="form-control" name="educational_attainment" name="civil_status">
                            <option>High School Graduate</option>
                            <option>College Under Graduate</option>
                            <option>College Graduate</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>SSS/GSIS</label>
                          <input type="text" name="sss_gsis" class="form-control"  value=" @if(isset($user)) {{ $user->sss_gsis }} @endif">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                  <div class="box-body">
                    <div class="form-group">
                      <label>TIN</label>
                      <input type="text" name="tin" class="form-control"  value=" @if(isset($user)) {{ $user->tin }} @endif">
                    </div>
                    <div class="form-group">
                      <label>Facebook ID</label>
                      <input type="text" name="facebook_id" class="form-control"  value=" @if(isset($user)) {{ $user->facebook_id }} @endif">
                    </div>
                    <div class="form-group">
                      <label>Street Addess</label>
                      <input type="text" name="street_adress" class="form-control"  value=" @if(isset($user)) {{ $user->street_adress }} @endif">
                    </div>
                    <div class="form-group">
                      <label>City</label>
                      <input type="text" name="city" class="form-control"  value=" @if(isset($user)) {{ $user->city }} @endif">
                    </div>
                    <div class="form-group">
                      <label>Zip Code</label>
                      <input type="text" name="zip_code" class="form-control"  value=" @if(isset($user)) {{ $user->zipcode }} @endif">
                    </div>
                    <div class="form-group">
                      <label>Permanent Address</label>
                      <input type="text" name="permanent_address" class="form-control"  value=" @if(isset($user)) {{ $user->permanent_address }} @endif">
                    </div>
                    <div class="form-group">
                      <label>Permanent City</label>
                      <input type="text" name="permanent_city" class="form-control"  value=" @if(isset($user)) {{ $user->permanent_city }} @endif">
                    </div>
                    <div class="form-group">
                      <label>Permanent Zip</label>
                      <input type="text" name="permanent_zip" class="form-control"  value=" @if(isset($user)) {{ $user->permanent_zip }} @endif">
                    </div>
                    <div class="form-group">
                      <label>Ownership Of Residence</label>
                      <select class="form-control" name="ownership_residence">
                        <option>Own</option>
                        <option>Rent</option>
                        <option>Mortgage</option>
                      </select>
                    </div>
                </div>
              </div>
              </div> 
              <div class="row">
                <div class="col-md-12">
                  <div class="text-center"><button type="submit" class="btn btn-block btn-success">Update Profile</button></div>
                </div>
              </div>
              </form>       
          </div>
        </div>
        </div>  
      </div>  

    </div> 
<script type="text/javascript">
        
    $(document).ready(function(){
      var btnCust = '<button type="button" class="btn btn-secondary" title="Add picture tags" ' + 
          'onclick="">' +
          '<i class="glyphicon glyphicon-tag"></i>' +
          '</button>'; 

      $("#avatar-1").fileinput({
          overwriteInitial: true,
          maxFileSize: 1500,
          showClose: false,
          showCaption: false,
          browseLabel: '',
          removeLabel: '',
          browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
          removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
          removeTitle: 'Cancel or reset changes',
          elErrorContainer: '#kv-avatar-errors-1',
          msgErrorClass: 'alert alert-block alert-danger',
          defaultPreviewContent: '<img src="/uploads/default_avatar_male.jpg" alt="Your Avatar" class="img-responsive">',
          layoutTemplates: {main2: '{preview} ' +  btnCust + ' {remove} {browse}'},
          allowedFileExtensions: ["jpg", "png", "gif"]
      });

    });

</script>    
@endsection     

