@extends('layout.app')
@section('content')      
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <h4 class="text-center"><i class="icon-envelope"></i><strong>Welcome to our Site</strong></h4>
          <p class="text-center">
            Sign in to your account
          </p>
          @if($errors->any())
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-ban"></i> Error!</h4>
              <p>{{$errors->first()}}</p>
            </div>
                         
          @endif
          @if (session('status'))
              <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-ban"></i> Error!</h4>
                <p>  {{ session('status') }}</p>
              </div>
          @endif
          <!-- start contact form -->
          <div class="cform" id="contact-form">
            <div id="sendmessage">Your message has been sent. Thank you!</div>
            <div id="errormessage"></div>
            {{ Form::open(array('url' => 'login', 'method' => 'post')) }}
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="form-group">
                <input type="text" class="" name="email_address" required="required" placeholder="Email Address" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="password" class="form-control" name="password" required="required" placeholder="Password" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>
              <div class="text-center"><button type="submit" class="btn btn-lg btn-theme">Login</button></div>
            {{ Form::close() }}
          </div>
          <!-- END contact form -->
        </div>
      </div>
    </div>
@endsection     