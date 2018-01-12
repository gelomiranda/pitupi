@extends('layout.master')
@section('content')
<div class="row">
    <!-- /.col -->
    <div class="col-md-12">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#activity" data-toggle="tab">Wallet Balance</a></li>
          <li><a href="#timeline" data-toggle="tab">Wallet History</a></li>
        </ul>
        <div class="tab-content">
          <div class="active tab-pane" id="activity">
           <h4>Current Balance : P {{ helper::get_balance(Auth::id()) }}</h4>
           <p>Go to Marketplace to invest your funds.</p>
          </div>
          <!-- /.tab-pane -->
          <!-- /.tab-pane -->
          <div class="tab-pane" id="timeline">
            <div>
              <!-- The timeline -->
                <ul class="timeline timeline-inverse">
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-red">
                          10 Feb. 2014
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-envelope bg-blue"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                      <h3 class="timeline-header"><a href="#">Support Team</a> verify your file .</h3>

                      <div class="timeline-body">
                        Verify transaction receipt.
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-user bg-aqua"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>
                      <h3 class="timeline-header no-border"><a href="#">Administrator</a> debited 5,000,000 to your account.
                      </h3>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-money bg-yellow"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                      <h3 class="timeline-header"><a href="#">You</a> invested 100,000 to loan #123456</h3>

                      <div class="timeline-body">
                        <p>Previous balance : 5,000,0000</p>
                        <p>Balance after invesment : 4,900,000</p>
                      </div>
                      <div class="timeline-footer">
                        <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-green">
                          3 Jan. 2014
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                      <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                      <div class="timeline-body">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                  </li>
                </ul>
            </div>
          </div>
          <!-- /.tab-pane -->
          <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
      </div>
    </div>
    <!-- /.col -->
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

