@extends('layout.app')
@section('content')      
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <h4 class="text-center"><i class="icon-envelope"></i><strong>Welcome to our Site</strong></h4>
          <p class="text-center">
            Sign in to your account
          </p>
          <h5 class="text-center">Account activated,please create password to continue</h5>
          <!-- start contact form -->
          <div class="cform" id="contact-form">
            <div id="sendmessage">Your message has been sent. Thank you!</div>
            <div id="errormessage"></div>
            {{ Form::open(array('url' => 'save_password', 'method' => 'get')) }}
              <input name="h_email_address" type="hidden" value="{{ $email_address }}">
              <input name="h_token" type="hidden" value="{{ $m_token }}">
              <div class="form-group">
                <input type="text" class="form-control" name="password" required="required" placeholder="Password" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="confirm_password" required="required" placeholder="Confirm Password" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>
              <div class="text-center"><button type="submit" class="btn btn-lg btn-theme">Create Password</button></div>
            {{ Form::close() }}
          </div>
          <!-- END contact form -->
        </div>
      </div>
    </div>
@endsection     