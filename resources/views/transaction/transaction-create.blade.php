@extends('layout.master')
@section('content')
<div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Create New Transaction</h3>
            @if($errors->any())
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Error!</h4>
                <p>{{$errors->first()}}</p>
              </div>
                           
            @endif
            @if (session('status'))
                <div class="alert alert-success alert-dismissible">
                <h4><i class="icon fa fa-ban"></i> Success</h4>
                  <p>  {{ session('status') }}</p>
                </div>
            @endif
          </div>
          <!-- /.box-header -->
          <div class="box-body">  
            <div class="row">
              <div class="col-md-6">
                 {{ Form::open(array('url' => 'admin/transaction', 'method' => 'post' ,  'enctype' => 'multipart/form-data')) }}
                    <div class="form-group">
                    <label >Select your transaction</label>
                    <select class="form-control" id="t_type" name="transaction_type">
                      <option disabled selected="selected">-- Select one --</option>
                      <option value="1">Loan Release</option>
                      <option value="2">Loan Remittance</option>
                    </select>
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Loan Information</label>
                    <select class="form-control" id="loan_id" name="loan_id">

                    </select>
                  </div>
                  <div class="form-group">
                    <label>Amount</label>
                    <input type="number" name="amount" class="form-control" id="exampleInputPassword1" placeholder="Enter Amount">
                  </div>
              </div>
              <div class="col-md-6">
                <form role="form">
                  <div class="form-group">
                    <label>Note</label>
                    <textarea class="form-control" name="note"></textarea>
                  </div>
                  <div class="form-group">
                    <label>File</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
            <div>
              <button type="submit">Create</button>
              {{ Form::close() }}  
            </div>
        </div>
    </div>
  </div>

<script type="text/javascript">
  $(document).ready(function(){
    $("#t_type").change(function(){
      $.get("{{URL::to('loan/list')}}",
        {
          't_type' : $(this).val(),
        }
      ).done(function(msg){
        if( msg != ''){
          $("#loan_id option").remove();
          $("#loan_id").append(msg);
        }else{
          $("#loan_id option").remove();
          $("#loan_id").append('<option>No record found.</option>');
        }
      }).error(function(msg){
        console.log(msg);
      });
    })
  })
</script>
@endsection