@extends('layout.master')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">List of Transaction</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">  
        <div class="row">
          <div class="col-md-6">
             {{ Form::open(array('url' => 'admin/transactions', 'method' => 'get' )) }}
              <div class="form-group">
                <label >From</label>
                <input type="date" name="from" class="form-control" id="exampleInputPassword1" placeholder="Enter Amount">
              </div>
          </div>
          <div class="col-md-6">
             <div class="form-group">
                <label >To</label>
                <input type="date" name="to" class="form-control" id="exampleInputPassword1" placeholder="Enter Amount">
              </div>
          </div>
        </div>
        <div>
          <button type="submit">Search</button>
          {{ Form::close() }}  
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-12">
    <div class="box">
      <table class="table">
        <thead>
          <tr>
            <th >Type</th>
            <th >Amount</th>
            <th >Note</th>
            <th >Document</th>
            <th >Transaction Date</th>
            <th >Created By</th>
          </tr>
        </thead>
        <tbody>
        @foreach($transactions as $transaction)
          <tr>
           <td>
              @if($transaction->transaction_type == 1)
              {{ 'Released' }}
              @endif
              @if($transaction->transaction_type == 2)
              {{ 'Remitted' }}
              @endif
            </td>
            <td>{{ $transaction->transaction_amount  }} PHP</td>
            <td>
              @if($transaction->transaction_note != "")
                {{ $transaction->transaction_note }}
              @else
               <span class="text-danger">No Notes Available</span>
              @endif
             </td>
            <td>
              @if($transaction->document_path != "")
              <button type="button" class="btn my_modal btn-default btn-block" data-toggle="modal" data-target="#modal-default" data-link="{{ asset('uploads/'.$transaction->document_path ) }}">
                View Me
              </button>
              @else
               <span class="text-danger">No Docs. Available</span>
              @endif
            </td>
            <td>{{ date( 'M-d-Y g:ia', strtotime($transaction->transaction_date))  }}</td>
            <td>{{ $transaction->profile_fullname }}</td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
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
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>     
<script type="text/javascript">
  $(document).ready(function(){
    $('.my_modal').click(function(){
      $('.imagepreview').attr('src', $(this).data('link'));
    });

  })
</script>
@endsection