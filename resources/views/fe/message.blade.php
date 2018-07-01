@extends('layout.app')
@section('content')      
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-ban"></i> Error!</h4>
              <p>{{$message}}</p>
            </div>
        </div>
    </div>
@endsection     