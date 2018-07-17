@extends('layout.app')
@section('content')  
    <div class="row">
      @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
      @endif
      @if (Session::has('status'))
        <div class="alert alert-success">
          <strong>Success!</strong> {!! session('status') !!}
        </div>
      @endif
    </div>    
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
                  <p class="text-justify"><b>Fixed</b> interest is given at <b>15%</b> for <b>15-days</b> loan period and <b>20%</b> for <b>30-days</b> loan duration.</p>
                  <p class="text-justify"><b>Estimated amount</b> reflects the total payable including interest, taxes and admin fees.</p>
                  <p class="text-justify"><b>Recommended income</b> is a projected debtor monthly income to avail the loan amount selected. </p>
                </div>
              </div>  
            </div>
        </div>
        <div class="col-md-6">
          <div class="box">
            <h3 class="text-center">Loan Calculator</h3>
            <div class="row">
              <div class="col-md-12">
                <p>Exclusively available to employees of accredited companies.</p>
                <p>Borrow between <span class="label label-primary">3,000</span> - <span class="label label-primary">5,000</span> </p>
                <p>As low as 15 - 20 % interest per month</p>
                <div class="form-group">
                  <select class="form-control" id="amount" name="loanamount">
                    <option value="">Select Loan Amount</option>
                    <option value="3000">3,000 PHP</option>
                    <option value="4000">4,000 PHP</option>
                    <option value="5000">5,000 PHP</option>
                  </select>
                </div> 
                <div class="form-group">
                  <label class="radio-inline"><input type="radio" value="15" name="terms"  @if ( old('terms')  === '15') {{ "checked='checked'"}} @endif checked='checked'>15 Days</label>
                  <label class="radio-inline"><input type="radio" value="30" name="terms"  @if ( old('terms')  === '30') {{ "checked='checked'"}} @endif >30 Days</label>
                </div>
                <hr/>     
                <p><b>Repayment Amount: <span class="text-green" id="estimatedAmount">0.00 PHP</span></b></p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-8 col-xs-10 col-md-offset-2">
              <h6 class="text-center">You can pay us on the following.</h6>
                <div class="row">
                  <div class="col-md-4 col-xs-4">
                     <img src="{{ URL::asset('img/GCash.jpg') }}" class="img-responsive img-circle" style="width: auto; height: 100px;">
                  </div>

                  <div class="col-md-4 col-xs-4">
                     <img src="{{ URL::asset('img/BPI.jpg') }}" class="img-responsive img-circle" style="width: auto; height: 100px;">
                  </div>

                  <div class="col-md-4 col-xs-4">
                    <img src="{{ URL::asset('img/Smart.png') }}" class="img-responsive img-circle" style="width: auto; height: 100px;">
                  </div>
                </div>
            </div>
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
         totalAmount = (amount * 0.2) + Number(myamount) + 200;
        }else{
         totalAmount = (amount * 0.05) + Number(myamount) + 200;
        }
        return totalAmount;
      }
    </script>     
@endsection

