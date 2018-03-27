@extends('layout.master')
@section('content')
   <div class="row">
        <div class="col-md-12 col-sm-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">List Of Clients</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow: auto">
              <table class="table data table-striped table-responsive-sm w-auto" style="overflow-y: hidden !important;">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Present Address</th>
                    <th>Billing Address</th>
                    <th>Mobile Number</th>
                    <th>Loan Amount</th>
                    <th>Duration</th>
                    <th>Email Address</th>
                    <th class="text-center">Apply@ </th>
                    <th class="text-center">Due Date </th>
                    <th>Status</th>
                    <th style="width: 10px" class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($clients as $client)
                  <tr id="{{$client->ID}}" class="@if( $client->due_date != '' ) 
                          {{ 'success' }}
                        @else
                          {{ 'danger;' }}
                        @endif">
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
                        {{ $client->terms.' Days'}}
                    </td>
                    <td>
                        {{ $client->emailaddress }}
                    </td>
                    <td>
                        {{ $client->created_at }}
                    </td>

                    <td>
                        @if( $client->due_date != "" ) 
                          {{ $client->due_date }}
                        @else
                          {{ "N/A" }}
                        @endif
                    </td>
                    <td>
                        @if( $client->due_date != "" && $client->is_paid == 0) 
                          {{ 'Approved' }}
                        @elseif($client->due_date != "" && $client->is_paid == 1)
                          {{ 'Paid' }} 
                        @else
                          {{ 'Pending' }}
                        @endif
                    </td>
                    <td>
                      <a target="_blank" btn btn-default href="{{URL::to('admin/client/'.$client->ID)}}">
                        <i class="glyphicon glyphicon-zoom-in"></i>
                      </a> 
                      |
                      @if( $client->due_date == "") 
                      <a target="_blank" data-toggle="modal" class="my_modal" data-id="{{$client->ID}}" data-name='{{ $client->fullname }}' data-amount='{{ $client->loanamount }}' data-target="#myModal">
                        <i class="glyphicon glyphicon-ok"></i>
                      </a>
                      @endif
                    </td>
                </tr>
                @endforeach
                </tbody>
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
                <h4 class="modal-title">Client Approval</h4>
              </div>
              <form method="post" class="approved">
                <div class="modal-body">
                <h6 id='client_name'></h6>
                  <div class="form-group">
                    <input type="hidden" id="c_id">
                    <label>Payment Due Date:</label>
                    <input type="text" id="due_date" data-provide="datepicker" data-date-format="yyyy-mm-dd" class="form-control" value="" name="duedate" required="required" placeholder="Select payment due date"  />
                  </div>
                  <div class="form-group">
                    <label>Total Amount:</label>
                    <input type="text" id="amount" class="form-control" value="" name="amount" required="required"  />
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-success" >Approved</button>
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
  </div>
  <script type="text/javascript">
    $(document).ready(function(){
      $('.datepicker').datepicker({
        format: 'yyyy-mm-dd'
      });

      $("form.approved").submit(function(){
        $.post("{{URL::to('client/approved')}}",
          {
            '_token' : $('meta[name="csrf-token"]').attr('content'),
            'c_id'   : $('#c_id').val(),
            'due_date' : $('#due_date').val(),
            'amount' : $('#amount').val()
          }
        ).done(function(msg){
          //Remove the danger class and add success class to highlight the row that is approved
          $("table.data").find("tr#"+$('#c_id').val()).removeClass("danger").addClass("success");
          alert("Approved!");
          
        }).error(function(msg){
        
        });
        return false;
      });


      $('.my_modal').click(function(){
        $('#c_id').val($(this).data('id'));
        $('#client_name').html('Client name: ' + $(this).data('name'));
        $('#amount').val($(this).data('amount'));
      });

    });
  </script>
@endsection