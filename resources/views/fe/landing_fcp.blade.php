@extends('layout.app')
@section('content')      
    <div class="row">
        <div class="col-md-6">
            <div class="wizard">
              <h3 class="text-center">Get Fast Loan with these 3 easy steps</h3>
              <br>
              <div class="row">
                <div class="col-lg-2 col-md-2 col-xs-2">
                  <a data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                     <img src="{{ URL::asset('img/if_calculator_406835.png') }}" class="img-responsive">
                  </a>
                </div>
                <div class="col-lg-10 col-md>-10 col-xs-10">
                  <span class="clearfix text-green"><b>Loan Amount</b></span>
                  <span class="clearfix">Let us know how much you need.</span>
                </div>
              </div>  
              <br/>
              <div class="row">
                <div class="col-md-2 col-xs-2">
                  <a data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                    <img src="{{ URL::asset('img/if_news_1055019.png') }}" class="img-responsive">
                  </a>
                </div>
                <div class="col-md-10 col-xs-10">
                  <span class="clearfix text-green"><b>Personal Information</b></span>
                  <span class="clearfix">Let us know more about you.</span>
                </div>
              </div>
              <br/> 
              <div class="row">
                <div class="col-md-2 col-xs-2">
                    <a data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                      <img src="{{ URL::asset('img/if_08_dropbox_353453.png') }}" class="img-responsive">
                    </a>
                </div>
                <div class="col-md-10 col-xs-10">
                  <span class="clearfix text-green"><b>Requirements </b></span>
                  <span class="clearfix">Show us that you can pay your loan.</span>
                </div>
              </div>
              <hr/>
              <div class="row">
                <div class="col-md-12 col-xs-12">
                  <p class="text-justify"><b>Fixed</b> interest is given at <b>5%</b> for <b>15-days</b> loan period and <b>10%</b> for <b>30-days</b> loan duration.</p>
                  <p class="text-justify"><b>Estimated amount</b> reflects the total payable including interest, taxes and admin fees.</p>
                  <p class="text-justify"><b>Recommended income</b> is a projected debtor monthly income to avail the loan amount selected. </p>
                </div>
              </div>  
            </div>
        </div>
        <div class="col-md-6">
          <div class="wizard">
              <h4 class="text-center">Need Cash? Just follow the steps.</h4>
              @if (Session::has('status'))
                <div class="alert alert-success">
                  <strong>Success!</strong> {!! session('status') !!}
                </div>
              @endif

              @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
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
                          <a href="#complete" class="disabled" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                              <span class="round-tab">
                                  4
                              </span>
                          </a>
                      </li>
                  </ul>
              </div>
              {{ Form::open(array('url' => 'index.php/client/create', 'method' => 'post' , 'enctype'=>'multipart/form-data')) }}
                  <div class="tab-content">
                      <div class="tab-pane active" role="tabpanel" id="step1">
                          <h3>Loan Amount</h3>
                          <div class="row">
                            <div class="col-md-12">
                              <p>Exclusively available to employees of accredited companies.</p>
                              <p>Borrow between <span class="label label-primary">1,000</span> - <span class="label label-primary">10,000</span> </p>
                              <p>As low as 5 - 10 % interest per month</p>
                              <div class="form-group">
                                <select class="form-control" id="amount" name="loanamount">
                                  <option value="">Select Loan Amount</option>
                                  <option value="1000" @if ( old('loanamount')  === '1000') {{ "selected='selected' "}} @endif>1,000 PHP</option>
                                  <option value="2000" @if ( old('loanamount')  === '2000') {{ "selected='selected' "}} @endif>2,000 PHP</option>
                                  <option value="3000" @if ( old('loanamount')  === '3000') {{ "selected='selected' "}} @endif> 3,000 PHP</option>
                                  <option value="4000" @if ( old('loanamount')  === '4000') {{ "selected='selected' "}} @endif>4,000 PHP</option>
                                  <option value="5000" @if ( old('loanamount')  === '5000') {{ "selected='selected' "}} @endif>5,000 PHP</option>
                                  <option value="6000" @if ( old('loanamount')  === '6000') {{ "selected='selected' "}} @endif>6,000 PHP</option>
                                  <option value="7000" @if ( old('loanamount')  === '7000') {{ "selected='selected' "}} @endif>7,000 PHP</option>
                                  <option value="8000" @if ( old('loanamount')  === '8000') {{ "selected='selected' "}} @endif>8,000 PHP</option>
                                  <option value="9000" @if ( old('loanamount')  === '9000') {{ "selected='selected' "}} @endif>9,000 PHP</option>
                                  <option value="10000" @if ( old('loanamount')  === '10000') {{ "selected='selected' "}} @endif>10,000 PHP</option>
                                  <option value="20000" @if ( old('loanamount')  === '20000') {{ "selected='selected' "}} @endif>20,000 PHP</option>
                                  <option value="30000" @if ( old('loanamount')  === '30000') {{ "selected='selected' "}} @endif>30,000 PHP</option>
                                </select>
                              </div> 
                              <div class="form-group">
                                <label class="radio-inline"><input type="radio" value="15" name="terms" checked="checked">15 Days</label>
                                <label class="radio-inline"><input type="radio" value="30" name="terms">30 Days</label>
                              </div>
                              <hr/>     
                              <p><b>Estimated Amount: <span class="text-green" id="estimatedAmount">0.00 PHP</span></b></p>
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
                                <input type="text" class="form-control" value="{!! old('fullname') !!}" name="fullname" placeholder="Full Name e.g (Juan Dela Cruz)" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                              </div>
                              <div class="form-group">
                                <input type="text" class="form-control" name="mobileno"  placeholder="Cellphone Number e.g(0910xxxxxxx)" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                              </div>
                              <div class="form-group">
                                <input type="text" class="form-control"  value="{!! old('address') !!}" name="address"  placeholder="Address" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                              </div>
                              <div class="form-group">
                                <input type="text" class="form-control" value="{!! old('emailaddress') !!}" name="emailaddress"  placeholder="Email Address e.g(juan@gmail.com)" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                              </div>
                              <div class="form-group">
                                <input type="text" class="form-control" value="{!! old('bankname') !!}" name="bankname"  placeholder="Bank Account Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                              </div>
                              <div class="form-group">
                                <input type="text" class="form-control" value="{!! old('bankno') !!}" name="bankno" placeholder="Bank Account Number" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
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
                                <input id="input-folder-2" name="id1"  class="file-loading" required="required" type="file" data-show-preview="false" accept="image/*" />
                              </div>

                              <div class="form-group">
                                <label class="control-label">Goverment ID #2</label>
                                <div id="errorBlock" class="help-block"></div>
                                <input id="input-folder-2" name="id2"  class="file-loading" required="required" type="file" data-show-preview="false" accept="image/*" />
                              </div>

                              <div class="form-group">
                                <label class="control-label">Billing Statement</label>
                                <div id="errorBlock" class="help-block"></div>
                                <input id="input-folder-2" name="billingstatement" class="file-loading" required="required" type="file" data-show-preview="false" accept="image/*" />
                              </div>
                              <div class="form-group">
                                <label class="control-label">Payslip/COE</label>
                                <div id="errorBlock" class="help-block"></div>
                                <input id="input-folder-2" name="payslipcoe" class="file-loading" required="required" type="file" data-show-preview="false" accept="image/*" />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="control-label clearfix">Letter of Undertaking</label>
                                <br>
                                <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">View Format</button>
                                <div id="demo" class="collapse">
                                  <small class="text-justify">Copy the format content using your handwriting in a sheet of paper.Fill out the necessary details then place your full name and signature at the bottom. Then upload the file.</small>
                                  <p>I,(Name) at legal age with residence address of (Address) will borrow an amount of cash worth (Amount) pesos with a (Interest) % for 1 month from FastCashPinoy.</p>
                                  <p>I promise to pay via BPI account deposit on (Date). Failure to pay on the said date will result of penalty of 1% per day starting (Date).</p>
                                </div>
                                <div id="errorBlock" class="help-block"></div>
                                <input id="input-folder-2" name="letter" class="file-loading" type="file" data-show-preview="false" accept="image/*" >
                              </div>
                              <div class="form-group">
                                <label class="control-label">Referred By</label>
                                <input type="text" class="form-control" name="email_address" required="required" placeholder="Full Name e.g (Juan Dela Cruz)" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                              </div>
                              <div class="form-group">
                                <input type="text" class="form-control" name="email_address" required="required" placeholder="Area + Phone Number" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                              </div>
                            </div>
                          </div>
                          
                          <ul class="list-inline pull-right">
                              <li><button type="submit" class="btn btn-primary">Submit</button></li>
                          </ul>
                      </div>
                      
                      <div class="tab-pane" role="tabpanel" id="complete">
                          <h3>Complete</h3>
                          <p>Please wait for our loan officer to contact you for validation. 
                             Keep your line open.
                          </p>
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

          $('input[type=radio][name=terms]').change(function() {
            if($("#amount").val() != 0){
              $("#estimatedAmount").text(computeAmount( this.value, $("#amount").val() ) + " PHP");
            }
          });



          $("#amount").change(function(){
             $("#estimatedAmount").html(computeAmount( $('input[type=radio][name=terms]:checked').val(), this.value ) + " PHP") ;
          })

          $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
          });

          computeAmount($('input[type=radio][name=terms]:checked').val(),$("#amount").val());

      });

      function nextTab(elem) {
          $(elem).next().find('a[data-toggle="tab"]').click();
      }
      function prevTab(elem) {
          $(elem).prev().find('a[data-toggle="tab"]').click();
      }

      function computeAmount(days,amount){  
        var day= days;
        var myamount = 0;
        myamount = amount;
        totalAmount = 0;
        if( day == 30 ){
         totalAmount = (amount * 0.1) + Number(myamount) + 200;
        }else{
         totalAmount = (amount * 0.05) + Number(myamount) + 200;
        }
        return totalAmount;
      }
    </script>     
@endsection

