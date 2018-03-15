@extends('layout.master')
@section('content')
   <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">List Of Clients</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th>Name</th>
                  <th>Present Address</th>
                  <th>Billing Address</th>
                  <th>Mobile Number</th>
                  <th>Loan Amount</th>
                  <th>Terms</th>
                  <th>Email Address</th>
                  <th class="text-center">Apply@ </th>
                  <th style="width: 10px" class="text-center">Action</th>
                </tr>
                @foreach ($clients as $client)
                  <tr>
                    <td>
                        {{ $client->fullname }}
                    </td>
                    <td>
                        {{ $client->p_address }}
                    </td>
                    <td>
                        {{ $client->b_address }}
                    </td>
                    <td>
                        {{ $client->mobileno }}
                    </td>
                    <td>
                        {{ $client->loanamount }}
                    </td>
                    <td>
                        {{ $client->terms }}
                    </td>

                    <td>
                        {{ $client->emailaddress }}
                    </td>
                    <td>
                        {{ $client->created_at }}
                    </td>
                    <td>
                      <a target="_blank" href="{{URL::to('admin/client/'.$client->ID)}}"><button>View Profile</button></a> 
                    </td>
                </tr>
                @endforeach
                
              </table>
            </div>
        </div>
    </div>
@endsection