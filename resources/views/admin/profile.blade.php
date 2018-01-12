@extends('layout.master')
@section('content')
<div class="row">
    <div class="col-md-3">
      <!-- Profile Image -->
      <div class="box box-primary">
        <div class="box-body box-profile">
          <img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">
          <h3 class="profile-username text-center">{{$user->first_name.' '.$user->last_name}}</h3>
          <p class="text-muted text-center">Software Engineer</p>
          <a href="#" class="btn btn-primary btn-block"><b>Validate</b></a>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

      <!-- About Me Box -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">About Me</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <strong><i class="fa fa-facebook margin-r-5"></i> Facebook ID</strong>
            <p class="text-muted">
              @if($user->facebook_id == '')
                {{ 'N\A' }}
              @else
                {{$user->facebook_id}}
              @endif
            </p>
           <strong><i class="fa fa-linkedin margin-r-5"></i> Linked In ID</strong>
            <p class="text-muted">
              @if($user->linkedin_id == '')
                {{ 'N\A' }}
              @else
                {{$user->linkedin_id}}
              @endif
            </p>
          <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
          <p class="text-muted">{{ $user->permanent_address }}</p>

          <hr>
          <hr>
          <strong><i class="fa fa-file-text-o margin-r-5"></i> More About Me</strong>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
    <div class="col-md-9">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#activity" data-toggle="tab">User Information</a></li>
          <li><a href="#timeline" data-toggle="tab">Uploaded Documents</a></li>
          <li><a href="#settings" data-toggle="tab">Loan Application</a></li>
          <li><a href="#transaction" data-toggle="tab">Uploaded Transaction</a></li>
          <li><a href="#transfer" data-toggle="tab">Wire Transfer</a></li>
          <li><a href="#history" data-toggle="tab">History</a></li>
        </ul>
        <div class="tab-content">
          <div class="active tab-pane" id="activity">
            <form class="form-horizontal">
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">Email Address</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" id="inputName" placeholder="Name" value="{{$user->email_address}}" disabled="disabled">
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-sm-2 control-label">Birth Date</label>

                <div class="col-sm-10">
                  <input type="email" class="form-control" value="{{$user->bday}}" disabled="disabled">
                </div>
              </div>
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">Civil Status</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" value="{{ Helper::get_civil_status($user->civil_status) }}" disabled="disabled">
                </div>
              </div>
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">Educational Attainment</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" value="{{$user->email_address}}" disabled="disabled">
                </div>
              </div>
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">Last School Attended</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" value="{{$user->email_address}}" disabled="disabled">
                </div>
              </div>
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">SSS / GSIS #</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" value="{{$user->email_address}}" disabled="disabled">
                </div>
              </div>
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">TIN #</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" value="{{$user->email_address}}" disabled="disabled">
                </div>
              </div>
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">Street Address</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" value="{{$user->street_address}}" disabled="disabled">
                </div>
              </div>
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">City</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" value="{{ $user->city }}" disabled="disabled">
                </div>
              </div>
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">Zipcode</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" value="{{$user->zipcode}}" disabled="disabled">
                </div>
              </div>
            </form>
          </div>

          <!-- /.tab-pane -->
          <div class="tab-pane" id="timeline">
           <div class="box">
             
             <!-- /.box-header -->
             <div class="box-body">
               <table class="table table-bordered">
                 <tr>
                   <th>File Name</th>
                   <th style="width: 10px" class="text-center">Status</th>
                 </tr>
                 @foreach ($p_documents as $document)
                   <tr>
                     <td>
                       <button type="button" class="btn my_modal btn-default" data-toggle="modal" data-target="#modal-default" data-link=" {{ asset('uploads/'.$document->location) }}">
                         {{ $document->filename }}
                       </button>
                     </td>
                     <td><span class="badge bg-red">For Approval</span></td>
                 </tr>
                 @endforeach
                 
               </table>
             </div>
            </div>
          </div>
          <!-- /.tab-pane -->

          <div class="tab-pane" id="settings">
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th>Loan Type</th>
                  <th>Amount</th>
                  <th>Terms</th>
                  <th>Interest</th>
                  <th>Date Applied</th>
                  <th class="text-center" width="25%">Action</th>
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
                    <td class="text-center">
                      <button type="button" class="btn btn-success btn-approve" data-id="{{ $transaction->loan_transaction_id }}">
                        <span class="glyphicon glyphicon-check"></span>Approve
                      </button>
                      <button type="button" class="btn btn-success btn-danger">
                        <span class="glyphicon glyphicon-check"></span>Decline
                      </button>
                    </td>
                </tr>
                @endforeach
              </table>
            </div>
          </div>

          <!-- /.tab-pane -->
          <div class="tab-pane" id="transaction">
           <div class="box">
             
             <!-- /.box-header -->
             <div class="box-body">
               <table class="table table-bordered">
                 <tr>
                   <th width="10%">Docs. ID</th>
                   <th>File Name</th>
                   <th style="width: 10px" class="text-center">Status</th>
                 </tr>
                 @foreach ($t_documents as $document)
                   <tr>
                     <td>{{$document->document_id}}</td>
                     <td>
                       <button type="button" class="btn my_modal btn-default" data-toggle="modal" data-target="#modal-default" data-link=" {{ asset('uploads/'.$document->location) }}">
                         {{ $document->filename }}
                       </button>
                     </td>
                     <td><span class="badge bg-red">For Approval</span></td>
                 </tr>
                 @endforeach
               </table>
             </div>
            </div>
          </div>
          <!-- /.tab-pane -->

          <!-- /.tab-pane -->
          <div class="tab-pane" id="transfer">
           <div class="row">
             <!-- /.box-header -->
             <div class="box-body">
                <div class="col-md-8">
                  <form class="form-horizontal transfer" method="post" action="{{URL::to('admin/transfer')}}">
                   <input type="hidden" id="user_id" value="{{ $user->id }}">
                   <div class="form-group">
                     <label for="inputName" class="col-sm-2 control-label">Amount</label>
                     <div class="col-sm-10">
                       <input type="text" class="form-control" id="amount" placeholder="Enter Amount">
                     </div>
                   </div>
                   <div class="form-group">
                     <label for="inputName" class="col-sm-2 control-label">Document #</label>
                     <div class="col-sm-10">
                       <input type="text" class="form-control" id="document_id" placeholder="Link Uploaded Document">
                     </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Update Account</button>
                  </form>
                </div>
                <div class="col-md-4">
                  <h4>Previous Balance : {{ helper::get_balance($user->id) }}</h4>
                  <h4>Current Balance  : 0.00</h4>
                </div> 
             </div>
            </div>
          </div>
          <!-- /.tab-pane -->

          <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
        <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body">
                <img class="imagepreview img-responsive" src="">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Approve</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
      </div>
    </div>
    <!-- /.col -->
  </div>
  <script type="text/javascript">
    $(document).ready(function(){
      $('.my_modal').click(function(){
        $('.imagepreview').attr('src', $(this).data('link'));
      });

     


      $('.btn-approve').click(function(){
        var x = $(this);
        $.post("{{URL::to('admin/approve_loan')}}",
          {
            '_token' : $('meta[name="csrf-token"]').attr('content'),
            'loan_id': $(this).data('id')
          }
        ).done(function(msg){
           x.parent().parent().fadeOut();
        });
      });

      $('form.transfer').submit(function(){
        $.post("{{URL::to('admin/transfer')}}",
          {
            '_token' : $('meta[name="csrf-token"]').attr('content'),
            'user_id': $('#user_id').val(),
            'amount' : $('#amount').val(),
            'document_id' : $('#document_id').val()
          }
        ).done(function(msg){
          alert(msg);
        }).error(function(msg){
          //console.log(msg);
          alert($('meta[name="csrf-token"]').attr('content'));
        });
        return false;         
      });

    })
  </script>
@endsection

