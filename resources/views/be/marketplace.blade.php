@extends('layout.master')
@section('content')
   <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">The MarketPlace</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-hover">
                <tr>
                  <th width="10%">LOAN ID</th>
                  <th>Mothly Yield</th>
                  <th>Amount</th>
                  <th>Terms</th>
                  <th>Interest</th>

                  <th>Funded %</th>
                  <th width="2%" class="text-center">PIN</th>
                </tr>
                @foreach ($l_transactions as $transaction)
                  <tr class="header" style="cursor:pointer;">
                    <td><u data-toggle="modal" style="cursor:pointer;" data-target="#myModal"><a>{{ str_pad($transaction->loan_transaction_id,9,'0',STR_PAD_LEFT) }}</a></u></td>
                    <td>
                       1.2
                    </td>
                    <td>{{ number_format($transaction->amount,0) }}</td>
                    <td>{{ $transaction->terms }} Months</td>
                    <td>{{ $transaction->interest }} %</td>
                    <td>
                      <div class="progress">
                        <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"
                        aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:{{ helper::get_total_fund($transaction->loan_transaction_id,$transaction->amount) }}%">
                          {{ number_format(helper::get_total_fund($transaction->loan_transaction_id,$transaction->amount),0) }}% Funded
                        </div>
                      </div>
                    </td>
                    <td class="text-center"><i class="fa fa-thumb-tack" aria-hidden="true"></i></td>
                  </tr>
                  <tr  class="detail" style="display:none;">
                    <td colspan="7" class="success">
                      <div class="row">
                         <div class="col-md-3">
                            <h4 class="text-center">How much would you like to place?</h4>
                            <div class="row">
                              <div class="col-md-6">
                                <p class="text-center">Current Balance</p>
                                <h3 class="text-center text-primary">P {{ number_format(helper::get_balance(Auth::id()),0) }}</h3>
                              </div>
                              <div class="col-md-6">
                                <p class="text-center">Amount to be funded</p>
                                <h3 class="text-center text-primary">P {{ number_format($transaction->amount,0) }}</h3>
                              </div>
                              <div class="col-md-12">
                                <p class='min'>Minimum Investment: 1,000</p>
                                <p class='max' data-val='{{ ($transaction->amount * 0.20 ) }}'>Maximum Investment: {{ number_format( ($transaction->amount * 0.20 ), 0) }}</p>
                                <p> Placement :</p>
                                <div class="input-group input-group-sm">
                                  <input type="text" class="form-control" id="amount">
                                  <span class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-flat invest" class="invest" data-id="{{ $transaction->loan_transaction_id }}"
                                      data-balance="" >Enter</button>
                                  </span>    
                                </div>
                                <small>Note: Your investment to loan should be by thousands</small>
                                <br>
                                <small>Changes will take effect when you click Enter</small>
                                <br>
                                <small>All amounts entered are not yet placed until confirmed in Review Loans</small>                 
                              </div>
                            </div> 
                         </div>

                         <div class="col-md-3">
                            <p>Personal Information</p>
                            <p><i class="fa fa-check-circle text-success"></i> Identity</p>
                            <p><i class="fa fa-check-circle text-success"></i> Email</p>
                            <p><i class="fa fa-check-circle text-success"></i> Birthday</p>
                            <p><i class="fa fa-check-circle text-success"></i> Address</p>
                            <p><i class="fa fa-check-circle text-success"></i> Mobile Number</p>
                            <p><i class="fa fa-check-circle text-success"></i> TIN</p>
                            <p><i class="fa fa-check-circle text-success"></i> SSS</p>
                            <p><i class="fa fa-check-circle text-success"></i> Mobile Number</p>
                            <p><i class="fa fa-check-circle text-success"></i> SSS</p>
                            <p><i class="fa fa-check-circle text-success"></i> Bank Account</p>
                         </div>
                         <div class="col-md-3">
                            <p>Document</p>
                            <p class="text-center">None</p>
                         </div>
                         <div class="col-md-3">
                            <div class="row">
                              <div class="col-md-12">
                                <p>Loan Purpose Description:</p>
                              </div>
                              <div class="col-md-12">
                                <small>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</small>
                              </div>
                            </div>                 
                         </div>
                      </div>
                    </td>
                  </tr>
                @endforeach
              </table>
            </div>
        </div>
        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center">Loan Information</h4>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-6">
                    <p id='' class='text-center'>LOAN-0047525</p>
                    <p id='' class='text-center'>Salary Loan(20 Months)</p>
                    <p id='' class='text-center'>Unsecured</p>
                  </div>
                  <div class="col-md-6">
                    <p id='' class='text-center'>P 20,000</p>
                    <p id='' class='text-center'>Monthly Yield</p>
                    <p id='' class='text-center'>0.27 %</p>
                  </div>
                  <div class="col-md-6"></div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <p id='' class='text-center'>Fund Percentage</p>
                  </div>
                  <div class="col-md-9">
                    <div class="progress">
                      <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"
                      aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">
                        40% Funded
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6"></div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <p>Loan Purpose Description:</p>
                  </div>
                  <div class="col-md-12">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
    </div>
<script type="text/javascript">
  $(document).ready(function(){
    $('tr.header').click(function(){
      $(this).next('tr').toggle('slow');
    });

    $('.invest').click(function(){
      var elem =$(this).parent().parent().find('input');
      if( elem.val() ){
        if(!(elem.val() % 1000) && elem.val() > 1){
          var data_elem = elem.parent().parent();
          if( elem.val() < data_elem.find('.min').data('val') || elem.val() > data_elem.find('.max').data('val')){
            alert('Invalid Investment Amount!');
          }else{
            /*Invest Fund*/

            $.post("{{URL::to('user/invest')}}",{
              '_token' : $('meta[name="csrf-token"]').attr('content'),
              'loan_id': $(this).data('id'),
              'amount' : data_elem.find('#amount').val() 
            }).done(function(msg){
              if(msg == 1){
                alert("You don't have enough balance to invest!");
              }

              if(msg == 0){
                alert('You already invested on this transaction!');
              }

              if(msg == 9){
                alert('Your investment successfully in place.');
              }
            });

          }

        }else{
          alert('Amount should be divisible by 1000.');
        }
      }


    });
  });
</script>    
@endsection