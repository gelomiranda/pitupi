@extends('layout.master')
@section('content')
   <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">General Information</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">              
              <div class="col-md-4">
                </table>
                <h4 class="box-title">Profile Information</h4>
                <div class="form-group">
                  <label class="font-weight-normal">Name </label>
                  <span> : {{ $loan->profile_fullname }}</span>
                </div>
                <div class="form-group">
                  <label>Address </label>
                  <span> : {{ $loan->profile_address }}</span>
                </div>
                <div class="form-group">
                  <label>Mobile # :  </label>
                  <span>{{ $loan->profile_mobile_no }}</span>
                </div>
                <div class="form-group">
                  <label>Bank  </label>
                  <span>: {{ $loan->profile_bank }}</span>
                </div>
                <div class="form-group">
                  <label>Bank Account No  </label>
                  <span>: {{ $loan->profile_bank_account }}</span>
                </div>
                <div class="form-group">
                  <label>Job Title </label>
                  <span>: {{ $loan->profile_job_title }}</span>
                </div>
                <div class="form-group">
                  <label>No of tenure </label>
                  <span>: {{ $loan->profile_no_of_years }}</span>
                </div>
                <div class="form-group">
                  <label>Monthly Income </label>
                  <span>: {{ $loan->profile_monthly_income }} PHP</span>
                </div>
              </div>
              <div class="col-md-4">
                <h4 class="box-title">Loan Information</h4>
                <div class="form-group">
                  <label>Amount </label>
                  <span> {{ number_format($loan->loan_amount,2 )}} PHP</span>
                </div>
                <div class="form-group">
                  <label>Interest  </label>
                  <span class="font-italic">: {{ $loan->loan_interest }} %</span>
                </div>
                <div class="form-group">
                  <label>Terms </label>
                  <span>:{{ $loan->loan_terms }} days</span>
                </div>
                @php
                  $interest = ($loan->loan_interest == '15') ? '0.15' : '0.1'; 
                @endphp
                <div class="form-group">
                  <label>Repayment : </label>
                  <span>{{ number_format((($loan->loan_amount + ($loan->loan_amount * $interest)) + 200),2) }} PHP</span>
                </div>
                <div class="form-group">
                  <label>Application Date  </label>
                  <span>: {{ date( 'M-d-Y g:ia', strtotime($loan->created_at)) }}</span>
                </div>
                <div class="form-group">
                  <label>Reason </label>
                  <p class="text-justify">{{ $loan->loan_reason }} </p>
                </div>
              </div>
              @if($loan->loan_status == 1)
              <div class="col-md-4">
                <h4 class="box-title">Select your action</h4>
                <div class="form-group">
                  <label>Administrator Notes : </label>
                  <textarea class="form-control" id="note" name="reason"></textarea>
                </div>  
                <ul class="list-inline pull-right">
                    <li><button type="button" data-status="2" data-id="{{$loan->loan_id}}" data-msg="Do you want to reject this request?" class="btn btn-danger btn-info-full ">Reject</button></li>
                    <li><button type="button" data-status="5" data-id="{{$loan->loan_id}}" data-msg='Do you want to approve this request?' class="btn btn-success btn-info-full ">Approve</button></li>
                </ul> 
              </div>
              @else
              <div class="col-md-4">
                <h4 class="box-title">Loan Status</h4>
                @if($loan->loan_status == 2)
                  <p class="text-success">This loan was approved.</p>
                  <div class="form-group">
                    <label>Approved by : </label>
                    <span>{{ $loan->profile_fullname }} </span>
                  </div>
                  <div class="form-group">
                    <label>Date Approved : </label>
                    <span> {{ date( 'M-d-Y g:ia', strtotime($loan->loan_approved_at)) }} </span>
                  </div>
                  <div class="form-group">
                    <label>Reason </label>
                    <p class="text-justify">{{ $loan->loan_note }} </p>
                  </div>
                @endif
                @if($loan->loan_status == 5)
                  <p class="text-danger">This loan was rejected.</p>
                  <div class="form-group">
                    <label>Rejected by : </label>
                    <span>{{ $loan->profile_fullname }} </span>
                  </div>
                  <div class="form-group">
                    <label>Date Rejected : </label>
                    <span> {{ date( 'M-d-Y g:ia', strtotime($loan->loan_approved_at)) }} </span>
                  </div>
                  <div class="form-group">
                    <label>Reason </label>
                    <p class="text-justify">{{ $loan->loan_note }} </p>
                  </div>
                @endif
              </div>
              @endif
            </div>
        </div>
    </div>
<script type="text/javascript">
  $(document).ready(function(){
    $("button").click(function(){
      if(confirm($(this).data('msg')) == true){
        
        $.post("{{URL::to('admin/loan/status')}}",
          {
            '_token' : $('meta[name="csrf-token"]').attr('content'),
            'loan_id': $(this).data('id'),
            'status' : $(this).data('status'),
            'note'   : $("#note").val()
          }
        ).done(function(msg){
          alert(msg);
        }).error(function(msg){
          console.log(msg);
        });
      }
    });

  })
</script>
@endsection