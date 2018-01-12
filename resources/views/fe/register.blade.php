@extends('layout.app')
@section('content')      
    <div class="row">
        <div class="col-md-6">
          <h4>Loan Calculator</h4>
          <p>
            Want to work with us or just want to say hello? Don't hesitate to get in touch!
          </p>

          <ul class="nav nav-tabs">
            @foreach ($loans as $loan)
              <li><a data-toggle="tab" href="#{{ $loan->loan_id }}">{{ $loan->description }}</a></li>
            @endforeach
          </ul>
          <div class="tab-content">
            @foreach ($loans as $loan)
              <div id="{{ $loan->loan_id }}" class="tab-pane fade in active">
                <h3>{{ $loan->description }} Loan</h3>
                <p>Exclusively available to employees of accredited companies.</p>
                <p>Borrow between @foreach(explode('-', $loan->min_max) as $min_max) 
                          {{ $min_max }}P
                        @endforeach</p>
                <p>As low as {{ $loan->interest }}% interest per month</p>
                <form>
                    <div class="form-group">
                      <select class="form-control">
                        @foreach(explode(',', $loan->terms) as $term) 
                          <option>{{$term}} Months</option>
                        @endforeach
                      </select>
                    </div>  
                    <div class="form-group">
                      <input type="text" class="form-control" name="first_name" required="required" placeholder="Enter Amount" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    </div>
                </form>
                <p>Estimated Amount</p>
                <p>Estimated Monthly Repayments:</p>
                <p>Recommended Income:</p>
              </div>
            @endforeach
          </div>
        </div>
         <div class="col-md-6">
          <h4><i class="icon-envelope"></i><strong>Please Sign Up Form</strong></h4>
          <p>
            Want to work with us or just want to say hello? Don't hesitate to get in touch!
          </p>
          <!-- start contact form -->
          <div class="cform" id="contact-form">
            <div id="sendmessage">Your message has been sent. Thank you!</div>
            <div id="errormessage"></div>
            {{ Form::open(array('url' => 'user/create', 'method' => 'post')) }}
              <div class="form-group">
                <input type="text" class="form-control" name="first_name" required="required" placeholder="Enter First Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="middle_name" required="required" placeholder="Enter Middle Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="last_name" required="required" placeholder="Enter Last Email" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="email_address" required="required" placeholder="Enter Email Address" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="mobile_number" required="required" placeholder="Enter your mobile number" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>
              <div class="text-center"><button type="submit" class="btn btn-lg btn-theme">Apply</button></div>
            {{ Form::close() }}
          </div>
          <!-- END contact form -->
        </div>
      </div>
    </div>
@endsection     