@extends('layout.app')
@section('content')      
    <div class="row">
        <div class="col-md-6">
            <div class="wizard">
              <h3 class="text-center">4 Easy Steps to get a Cash Loan</h3>
              <br>
              <div class="row">
                <div class="col-lg-2 col-md-2 col-xs-2">
                    <a data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                        <span class="round-tab">
                            1
                        </span>
                    </a>
                </div>
                <div class="col-lg-10 col-md>-10 col-xs-10">
                  <span class="clearfix"><b>Loan Amount</b></span>
                  <span class="clearfix">How much do you need?</span>
                  <span class="clearfix">See how much you can get and the interest.</span>
                </div>
              </div>  
              <div class="row">
                <div class="col-md-2 col-xs-2">
                    <a data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                        <span class="round-tab">
                            2
                        </span>
                    </a>
                </div>
                <div class="col-md-10 col-xs-10">
                  <span class="clearfix"><b>Personal Information</b></span>
                  <span class="clearfix">Let us know you personally.</span>
                  <span class="clearfix">Fill the the form with your personal data.</span>
                </div>
              </div> 
              <div class="row">
                <div class="col-md-2 col-xs-2">
                    <a data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                        <span class="round-tab">
                            3
                        </span>
                    </a>
                </div>
                <div class="col-md-10 col-xs-10">
                  
                  <span class="clearfix"><b>Requirements </b></span>
                  <span class="clearfix">Help us know you more.</span>
                  <span class="clearfix">Upload your ID's and a selifie.</span>
                </div>
              </div>
              <div class="row">
                <div class="col-md-2 col-xs-2">
                    <a data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                        <span class="round-tab">
                            4
                        </span>
                    </a>
                </div>
                <div class="col-md-10 col-xs-10">
                  <span class="clearfix"><b>Validation</b></span>
                  <span class="clearfix">We will contact you and once validated and approve time to get your cash.</span>
                </div>
              </div>
              <br>
              <br>
              <div class="row">
                <div class="col-md-12 col-xs-12">
                  <p><b>Fixed</b> interest is given at <b>5%</b> for <b>15-days</b> loan period and <b>10%</b> for <b>30-days</b> loan duration.</p>
                  <p><b>Estimated amount</b> reflects the total payable including interest, taxes and admin fees.</p>
                  <p><b>Recommended income</b> is a projected debtor monthly income to avail the loan amount selected. </p>
                </div>
              </div>  
            </div>
        </div>
        <div class="col-md-6">
                  <div class="wizard">
                      <h4 class="text-center">Need Cash? Just follow the steps.</h4>
                      <div class="wizard-inner">
                        <div class="connecting-line"></div>
                          <ul class="nav nav-tabs" role="tablist">
                              <li role="presentation" class="active">
                                  <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                                      <span class="round-tab">
                                          1
                                      </span>
                                  </a>
                              </li>
                              <li role="presentation" class="disabled">
                                  <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                                      <span class="round-tab">
                                          2
                                      </span>
                                  </a>
                              </li>
                              <li role="presentation" class="disabled">
                                  <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                                      <span class="round-tab">
                                          3
                                      </span>
                                  </a>
                              </li>
                              <li role="presentation" class="disabled">
                                  <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                                      <span class="round-tab">
                                          4
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
                                          <p>Borrow between <span class="label label-primary">1,000</span> - <span class="label label-primary">10,000</span> </p>
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
                                          <p>Recommended Income:</p>
                                      
                                    </div>
                                  </div>
                                  <ul class="list-inline pull-right">
                                      <li><button type="button" class="btn btn-primary btn-info-full next-step">Save and continue</button></li>
                                  </ul>
                              </div>
                              <div class="tab-pane" role="tabpanel" id="step2">
                                  <h3>Personal Information</h3>
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <input type="text" class="form-control" name="email_address" required="required" placeholder="Full Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                      </div>
                                      <div class="form-group">
                                        <input type="text" class="form-control" name="email_address" required="required" placeholder="Cellphone Number" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                      </div>
                                      <div class="form-group">
                                        <input type="text" class="form-control" name="email_address" required="required" placeholder="Address" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                      </div>
                                      <div class="form-group">
                                        <input type="text" class="form-control" name="email_address" required="required" placeholder="Email Address" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                      </div>
                                    </div>
                                    
                                    
                                  </div>
                                  <ul class="list-inline pull-right">
                                      <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                      <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
                                  </ul>
                              </div>
                              <div class="tab-pane" role="tabpanel" id="step3">
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
                                      <li><button type="button" class="btn btn-primary next-step">Save</button></li>
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

