@extends('layout.master')
@section('content')
   <label class="control-label">Select File to Upload</label>
   <div id="errorBlock" class="help-block"></div>
   	<form method="POST" action="{{ URL::to('documents') }}"  enctype="multipart/form-data" >
   		<input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="hidden" name="document_type" value="{{ $document_type }}">
   		<input id="input-folder-2" name="image" class="file-loading" type="file" data-show-preview="false">
   	</form>	
   <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">List Of Uploaded Documents</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th>File Name</th>
                  <th style="width: 10px" class="text-center">Status</th>
                </tr>
                @foreach ($documents as $document)
                  <tr>
                    <td>
                      <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
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
   <script>
   $(document).on('ready', function() {
       $("#input-folder-2").fileinput({
           browseLabel: 'Select File To Upload...',
           previewFileIcon: '<i class="fa fa-file"></i>',
           allowedPreviewTypes: null, // set to empty, null or false to disable preview for all types
           previewFileIconSettings: {
               'doc': '<i class="fa fa-file-word-o text-primary"></i>',
               'xls': '<i class="fa fa-file-excel-o text-success"></i>',
               'ppt': '<i class="fa fa-file-powerpoint-o text-danger"></i>',
               'jpg': '<i class="fa fa-file-photo-o text-warning"></i>',
               'pdf': '<i class="fa fa-file-pdf-o text-danger"></i>',
               'zip': '<i class="fa fa-file-archive-o text-muted"></i>',
               'htm': '<i class="fa fa-file-code-o text-info"></i>',
               'txt': '<i class="fa fa-file-text-o text-info"></i>',
               'mov': '<i class="fa fa-file-movie-o text-warning"></i>',
               'mp3': '<i class="fa fa-file-audio-o text-warning"></i>',
           },
           previewFileExtSettings: {
               'doc': function(ext) {
                   return ext.match(/(doc|docx)$/i);
               },
               'xls': function(ext) {
                   return ext.match(/(xls|xlsx)$/i);
               },
               'ppt': function(ext) {
                   return ext.match(/(ppt|pptx)$/i);
               },
               'jpg': function(ext) {
                   return ext.match(/(jp?g|png|gif|bmp)$/i);
               },
               'zip': function(ext) {
                   return ext.match(/(zip|rar|tar|gzip|gz|7z)$/i);
               },
               'htm': function(ext) {
                   return ext.match(/(php|js|css|htm|html)$/i);
               },
               'txt': function(ext) {
                   return ext.match(/(txt|ini|md)$/i);
               },
               'mov': function(ext) {
                   return ext.match(/(avi|mpg|mkv|mov|mp4|3gp|webm|wmv)$/i);
               },
               'mp3': function(ext) {
                   return ext.match(/(mp3|wav)$/i);
               },
           }
       });


		
   });
   </script>
@endsection