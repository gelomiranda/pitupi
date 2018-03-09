@extends('layout.master')
@section('content')
<div class="row">
    <!-- /.col -->
    <div class="col-md-12">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#timeline" data-toggle="tab">Uploaded Documents</a></li>
          <li><a href="#history" data-toggle="tab">History</a></li>
        </ul>
        <div class="tab-content">
         
          <!-- /.tab-pane -->
          <div class="tab-pane" id="timeline">
           <div class="box">
             
             <!-- /.box-header -->
             <div class="box-body">
               <table class="table table-bordered">
                 <tr>
                   <th width="10%">Docs. ID</th>
                   <th>File Name</th>
                   <th style="width: 10px" class="text-center">Status</th>
                 </tr>
                 <tbody>
                  <tr>
                    <td>COE/Payslip</td>
                    <td>
                       <button type="button" class="btn my_modal btn-default" data-toggle="modal" data-target="#modal-default" data-link=" {{ asset('uploads/'.$client[0]->id1 ) }}">
                         View
                       </button>
                     </td>
                  </tr>
                 </tbody>
               </table>
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

