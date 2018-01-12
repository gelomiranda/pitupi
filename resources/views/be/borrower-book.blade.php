@extends('layout.master')
@section('content')
   <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">List Of Loan Transaction</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th>Loan Type</th>
                  <th>Amount</th>
                  <th>Terms</th>
                  <th>Interest</th>
                  <th>Date Applied</th>
                  <th style="width: 10px" class="text-center">Status</th>
                </tr>
                @foreach ($l_transactions as $transaction)
                  <tr>
                    <td>
                        {{ $transaction->description }}
                    </td>
                    <td><span class="badge bg-red">{{ number_format($transaction->amount,0) }}</span></td>

                    <td><span class="badge bg-red">{{ $transaction->terms }} Months</span></td>
                    <td><span class="badge bg-red">{{ $transaction->interest }} %</span></td>
                    <td><span class="badge bg-red">{{ $transaction->created_at }}</span></td>
                    <td><span class="badge bg-red">For Approval</span></td>
                </tr>
                @endforeach
                
              </table>
            </div>
        </div>
    </div>
@endsection