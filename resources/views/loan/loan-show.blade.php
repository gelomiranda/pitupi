@extends('layout.master')
@section('content')
   <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">List Of Loans</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">              
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
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
                    <td>
                      <a href="{{URL::to('admin/loan/'.$loan->loan_id)}}" target="blank">
                        LOAN ID: {{$loan->loan_id}}
                      </a>
                    </td>
                    <td>
                      <a href="{{URL::to('admin/user/profile/'.$loan->user_id)}}" target="blank">
                        {{$loan->profile_fullname}}
                      </a>
                    </td>
                    <td scope="row">{{$loan->profile_address}}</td>
                    <td>{{ number_format($loan->loan_amount,2) }} PHP</td>
                    <td>{{$loan->loan_terms}} Days</td>
                    <td><i>{{$loan->loan_interest}} %</i></td>
                    <td>{{ number_format((($loan->loan_amount + ($loan->loan_amount * $interest)) + 200),2) }} PHP</td>
                    <td>{{ date( 'M-d-Y g:ia', strtotime($loan->created_at)) }}</td>
                    <td>{{ Helper::loan_status($loan->loan_status) }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
        </div>
    </div>
@endsection