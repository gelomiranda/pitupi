@extends('layout.app')
@section('content')      
    <div class="row">
        <div class="col-md-12">
                  <div class="wizard">
                      <div class="wizard-inner">
                          <div class="connecting-line"></div>
                          <ul class="nav nav-tabs" role="tablist">
                              <li role="presentation" class="active">
                                  <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                                      <span class="round-tab">
                                          <i class="glyphicon glyphicon-user"></i>
                                      </span>
                                  </a>
                              </li>
                              <li role="presentation" class="disabled">
                                  <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                                      <span class="round-tab">
                                          <i class="glyphicon glyphicon-pencil"></i>
                                      </span>
                                  </a>
                              </li>
                              <li role="presentation" class="disabled">
                                  <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                                      <span class="round-tab">
                                          <i class="glyphicon glyphicon-picture"></i>
                                      </span>
                                  </a>
                              </li>
                              <li role="presentation" class="disabled">
                                  <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                                      <span class="round-tab">
                                          <i class="glyphicon glyphicon-ok"></i>
                                      </span>
                                  </a>
                              </li>
                          </ul>
                      </div>

                      <form role="form">
                          <div class="tab-content">
                              <div class="tab-pane active" role="tabpanel" id="step1">
                                  <h3>Loan Amount</h3>
                                  <div class="row">
                                    <div class="col-md-12">
                                          <p>Exclusively available to employees of accredited companies.</p>
                                          <p>Borrow between 1,000 - 10,000 </p>
                                          <p>As low as 5 - 10 % interest per month</p>
                                          <div class="form-group">
                                            <select class="form-control">
                                              <option>Select Loan Amount</option>
                                              <option>1,000 PHP</option>
                                              <option>2,000 PHP</option>
                                              <option>3,000 PHP</option>
                                              <option>4,000 PHP</option>
                                              <option>5,000 PHP</option>
                                              <option>6,000 PHP</option>
                                              <option>7,000 PHP</option>
                                              <option>8,000 PHP</option>
                                              <option>8,000 PHP</option>
                                              <option>10,000 PHP</option>
                                            </select>
                                          </div> 
                                          <div class="form-group">
                                            <label class="radio-inline"><input type="radio" name="optradio">15 Days</label>
                                            <label class="radio-inline"><input type="radio" name="optradio">30 Days</label>
                                          </div>     
                                          <p>Estimated Amount</p>
                                          <p>Estimated Monthly Repayments:</p>
                                          <p>Recommended Income:</p>
                                      
                                    </div>
                                  </div>
                                  <ul class="list-inline pull-right">
                                      <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                      <li><button type="button" class="btn btn-default next-step">Skip</button></li>
                                      <li><button type="button" class="btn btn-primary btn-info-full next-step">Save and continue</button></li>
                                  </ul>
                              </div>
                              <div class="tab-pane" role="tabpanel" id="step3">
                                  <h3>Personal Information</h3>
                                  <div class="row">
                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <input type="text" class="form-control" name="email_address" required="required" placeholder="First Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                      </div>
                                      <div class="form-group">
                                        <input type="text" class="form-control" name="email_address" required="required" placeholder="Email Address" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                      </div>
                                      <div class="form-group">
                                        <input type="text" class="form-control" name="email_address" required="required" placeholder="Unit No. of Building" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                      </div>
                                      <div class="form-group">
                                        <input type="text" class="form-control" name="email_address" required="required" placeholder="City" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                      </div>
                                    </div>
                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <input type="text" class="form-control" name="email_address" required="required" placeholder="Middle Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                      </div>
                                      <div class="form-group">
                                        <input type="text" class="form-control" name="email_address" required="required" placeholder="Mobile Number" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                      </div>
                                      <div class="form-group">
                                        <input type="text" class="form-control" name="email_address" required="required" placeholder="Village Street" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                      </div>
                                      <div class="form-group">
                                        <input type="text" class="form-control" name="email_address" required="required" placeholder="Zip Code" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                      </div>
                                    </div>
                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <input type="text" class="form-control" name="email_address" required="required" placeholder="Last Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                      </div>
                                      <div class="form-group">
                                        <input type="text" class="form-control" name="email_address" required="required" placeholder="Birthdate" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                      </div>
                                      <div class="form-group">
                                        <input type="text" class="form-control" name="email_address" required="required" placeholder="Barangay" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                      </div>
                                      <div class="form-group">
                                        <input type="text" class="form-control" name="email_address" required="required" placeholder="City" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                      </div>
                                     </div>
                                  </div>
                                  <ul class="list-inline pull-right">
                                      <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
                                  </ul>
                              </div>
                              <div class="tab-pane" role="tabpanel" id="step2">
                                  <h3>Requirements</h3>
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">Goverment ID #1</label>
                                        <div id="errorBlock" class="help-block"></div>
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input id="input-folder-2" name="image" class="file-loading" type="file" data-show-preview="false">
                                      </div>

                                      <div class="form-group">
                                        <label class="control-label">Goverment ID #2</label>
                                        <div id="errorBlock" class="help-block"></div>
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input id="input-folder-2" name="image" class="file-loading" type="file" data-show-preview="false">
                                      </div>

                                      <div class="form-group">
                                        <label class="control-label">Billing Statement</label>
                                        <div id="errorBlock" class="help-block"></div>
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input id="input-folder-2" name="image" class="file-loading" type="file" data-show-preview="false">
                                      </div>
                                      <div class="form-group">
                                        <label class="control-label">Payslip/COE</label>
                                        <div id="errorBlock" class="help-block"></div>
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input id="input-folder-2" name="image" class="file-loading" type="file" data-show-preview="false">
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">Download and Sign Docs</label>
                                        <div id="errorBlock" class="help-block"></div>
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input id="input-folder-2" name="image" class="file-loading" type="file" data-show-preview="false">
                                      </div>
                                      <div class="form-group">

                                        <label class="control-label">Referred By</label>
                                        <input type="text" class="form-control" name="email_address" required="required" placeholder="Full Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                      </div>

                                      <div class="form-group">
                                        <input type="text" class="form-control" name="email_address" required="required" placeholder="Area + Phone Number" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                      </div>
                                    </div>
                                  </div>
                                  
                                  <ul class="list-inline pull-right">
                                      <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                      <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
                                  </ul>
                              </div>
                              
                              <div class="tab-pane" role="tabpanel" id="complete">
                                  <h3>Complete</h3>
                                  <p>You have successfully completed all steps.</p>
                              </div>
                              <div class="clearfix"></div>
                          </div>
                      </form>
                  </div>
            </div>
      </div>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script type="text/javascript">
      
      $(document).on('ready', function() {      //Initialize tooltips
         

             $(".next-step").click(function (e) {

                  var $active = $('.wizard .nav-tabs li.active');
                  $active.next().removeClass('disabled');
                  nextTab($active);

              });
              $(".prev-step").click(function (e) {

                  var $active = $('.wizard .nav-tabs li.active');
                  prevTab($active);

              });
        });

      function nextTab(elem) {
          $(elem).next().find('a[data-toggle="tab"]').click();
      }
      function prevTab(elem) {
          $(elem).prev().find('a[data-toggle="tab"]').click();
      }
    </script>     
@endsection

