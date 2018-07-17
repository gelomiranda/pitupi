@extends('layout.master')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="box-body">
      <h1>Manage Loan</h1>

      @if($errors->any())
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-ban"></i> Error!</h4>
          <p>{{$errors->first()}}</p>
        </div>
                     
      @endif
      @if (session('status'))
          <div class="alert alert-success alert-dismissible">
          <h4><i class="icon fa fa-ban"></i> Success</h4>
            <p>  {{ session('status') }}</p>
          </div>
      @endif
      <div class="box-body">
        <div class="row">
          <div class="col-md-4 login-box-body">
            <p>Exclusively available to employees of accredited companies.</p>
            <p>Borrow between <span class="label label-primary">1,000</span> - <span class="label label-primary">10,000</span> </p>
            <p>As low as 10 - 15 % interest per month</p>

            {{ Form::open(array('url' => 'loan', 'method' => 'post')) }}
            <div class="form-group">
              <select class="form-control" id="amount" name="amount">
                <option value="">Select Loan Amount</option>
                <option value="1000" @if ( old('loanamount')  === '1000') {{ "selected='selected' "}} @endif>1,000 PHP</option>
                <option value="2000" @if ( old('loanamount')  === '2000') {{ "selected='selected' "}} @endif>2,000 PHP</option>
                <option value="3000" @if ( old('loanamount')  === '3000') {{ "selected='selected' "}} @endif> 3,000 PHP</option>
                <option value="4000" @if ( old('loanamount')  === '4000') {{ "selected='selected' "}} @endif>4,000 PHP</option>
                <option value="5000" @if ( old('loanamount')  === '5000') {{ "selected='selected' "}} @endif>5,000 PHP</option>
              </select>
            </div> 
            <div class="form-group">
              <label class="radio-inline"><input type="radio" value="15" name="terms"  @if ( old('terms')  === '15') {{ "checked='checked'"}} @endif checked='checked'>15 Days</label>
              <label class="radio-inline"><input type="radio" value="30" name="terms"  @if ( old('terms')  === '30') {{ "checked='checked'"}} @endif >30 Days</label>
            </div>
            <div class="form-group">
              <p>Reason for borrowing:</p>
              <textarea class="form-control" name="reason"></textarea>
            </div>
            <hr/>     
            <p><b>Amount to pay: <span class="text-green" id="estimatedAmount">0.00 PHP</span></b></p>
            
            <ul class="list-inline pull-right">
                <li><button type="submit" class="btn btn-success btn-info-full ">Create</button></li>
            </ul>
            {{Form::close()}} 
          </div>

          <div class="col-md-8">
            <!-- /.box-header -->
            <div class="box-body login-box-body">
              <p class="text-center">Loan Application List</p>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Terms</th>
                    <th scope="col">Interest</th>
                    <th scope="col">Total Repayment</th>
                    <th scope="col">Date Created</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($loans as $loan)
                  <tr>
                    @php
                      $interest = ($loan->loan_interest == '15') ? '0.15' : '0.1'; 
                    @endphp
                    <td scope="row">1</td>
                    <td>{{$loan->loan_amount}}</td>
                    <td>{{$loan->loan_terms}} Days</td>
                    <td><i>{{$loan->loan_interest}} %</i></td>
                    <td>{{($loan->loan_amount + ($loan->loan_amount * $interest)) + 200}}</td>

                    <td>{{ $loan->created_at}}</td>
                    <td><label>{{ Helper::loan_status($loan->loan_status) }}</label></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).on('ready', function() {      //Initialize tooltips
     
      $('input[type=radio][name=terms]').change(function() {
        if($("#amount").val() != 0){
          $("#estimatedAmount").text(computeAmount( this.value, $("#amount").val() ) + " PHP");
        }
      });



      $("#amount").change(function(){
         $("#estimatedAmount").html(computeAmount( $('input[type=radio][name=terms]:checked').val(), this.value ) + " PHP") ;
      })
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
     totalAmount = (amount * 0.15) + Number(myamount) + 200;
    }else{
     totalAmount = (amount * 0.1) + Number(myamount) + 200;
    }
    return totalAmount;
  }
</script>
@endsection