@extends('layout.master')
@section('content')
   <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">List Of Users</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th>Name</th>
                  <th>Email Address</th>
                  <th>Age</th>
                  <th>Gender</th>
                  <th>Date Applied</th>
                  <th style="width: 10px" class="text-center">Status</th>
                  <th style="width: 10px" class="text-center">Action</th>
                </tr>
                @foreach ($users as $user)
                  <tr>
                    <td>
                        {{ $user->first_name }}
                    </td>
                    <td>
                        {{ $user->email_address }}
                    </td>
                    <td>
                        @if($user->gender == 0)
                        {{ 'Male' }}
                        @else
                        {{ 'Female' }}
                        @endif
                    </td>
                    <td>
                        {{ $user->email_address }}
                    </td>
                    
                    <td>
                        {{ $user->created_at }}
                    </td>
                    <td>
                      <span class="badge bg-red">For Approval</span>
                    </td>
                    <td>
                      <a target="_blank" href="{{URL::to('admin/user/'.$user->id)}}"><button>View Profile</button></a> 
                    </td>
                </tr>
                @endforeach
                
              </table>
            </div>
        </div>
    </div>
@endsection