@extends('layout.master')
@section('content')
<div class="row">
  <div class="col-md-12">
      <h1>Manage Documents</h1>
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
  {{ Form::open(array('url' => 'document', 'method' => 'post' ,  'enctype' => 'multipart/form-data')) }}
  <div class="col-md-6">
    <!-- /.box-header -->
    <div class="login-box-body">
        <!-- text input -->
        <div class="form-group">
          <label>Document Name <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i></label>
          <input type="text" name="description" class="form-control" value=" {{ old('fullname') }}">
        </div>
        <div class="form-group">
          <label>File <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i></label>
          <input type="file" name="image" class="form-control" value="{{ old('address') }}">
        </div>
      <button type="submit">Upload</button>
          
    </div>
  </div>
  {{ Form::close() }}


  <div class="col-md-6">
    <!-- /.box-header -->
    <div class="box-body login-box-body">
      <p class="text-center">Document List</p>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Description</th>
            <th scope="col">File</th>
          </tr>
        </thead>
        <tbody>
          @foreach($documents as $document)
          <tr>
            <th scope="row">1</th>
            <td>{{$document->document_description}}</td>
            <td>
               <button type="button" class="btn my_modal btn-default btn-block" data-toggle="modal" data-target="#modal-default" data-link="{{ asset('uploads/'.$document->document_path ) }}">
                 View Me
               </button>
             </td>
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
  });
</script>

@endsection