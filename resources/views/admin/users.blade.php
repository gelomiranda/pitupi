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
                  <th>Address</th>
                  <th>Date Applied</th>
                  <th style="width: 10px" class="text-center">Status</th>
                </tr>
                @foreach ($users as $user)
                  <tr>
                    <td>
                       <a target="_blank" href="{{URL::to('admin/user/profile/'.$user->user_id)}}">{{ $user->profile_fullname}}</a>
                    </td>
                    <td>
                      {{ $user->user_email }}
                    </td>
                    <td>
                      {{ $user->profile_address }}
                    </td>
                    <td>
                        {{ date( 'M-d-Y g:ia', strtotime($user->created_at)) }}
                    </td>
                    <td>
                      @if( $user->user_is_validated == 1)
                      <span class="badge bg-green">Approved</span>
                      @else
                      <span class="badge bg-red">For Approval</span>
                      @endif
                    </td>
                </tr>
                @endforeach
              </table>
            </div>
        </div>
    </div>
@endsection