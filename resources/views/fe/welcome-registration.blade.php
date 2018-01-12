@extends('layout.app')
@section('content')      
  <div class="row">
    <div class="col-md-6">
      <h4>Welcome to our site.</h4>
      <p>
        An email was sent to email <b>{{ session('email') }} </b>.
      </p>
      <p>
         Click the link in the  we sent to activate your account.
      </p>
      <p>
        Didn't receive an email?Click here to resend.
      </p>      
  </div>
@endsection 