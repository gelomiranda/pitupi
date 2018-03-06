<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Fast Cash Pinoy</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <meta http-equiv="cache-control" content="no-cache" />
  <meta http-equiv="Pragma" content="no-cache" />
  <meta http-equiv="Expires" content="-1" />
  <!-- styles -->
  <link rel="stylesheet" href="{{ URL::asset('assets/css/fancybox/jquery.fancybox.css') }}">
  <link href="{{ URL::asset('assets/css/bootstrap.css') }}" rel="stylesheet" />
  <link href="{{ URL::asset('assets/css/bootstrap-theme.css') }}" rel="stylesheet" />
  <link rel="stylesheet" href="{{ URL::asset('assets/css/slippry.css') }}">
  <link href="{{ URL::asset('assets/css/style.css') }}" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
  
  <link rel="stylesheet" href="{{ URL::asset('assets/color/default.css') }}">
  <!-- =======================================================
    Theme Name: Groovin
    Theme URL: https://bootstrapmade.com/groovin-free-bootstrap-theme/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
  ======================================================= -->
  <script src="{{ URL::asset('assets/js/modernizr.custom.js') }}"></script>
</head>

<body>
  <header>

    <div id="navigation" class="navbar navbar-inverse navbar-fixed-top default" role="navigation">
      <div class="container">

        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html">FastCashPinoy</a>
        </div>

        <div class="navigation">
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <nav>
              <ul class="nav navbar-nav navbar-right">
                <li class="current"><a href="#intro">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#works">Works</a></li>
                <li><a href="{{ url('/#contact') }}">Contact</a></li>
                <li><a href="{{ url('/register') }}">Register / Logins</a></li>
              </ul>
            </nav>
          </div>
          <!-- /.navbar-collapse -->
        </div>

      </div>
    </div>

  </header>
 
  <!-- end intro -->
  <section>
    <div class="container">
      @yield('content')
    </div>
  </section>
  <!-- end section contact -->
  <footer>
    <div class="verybottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aligncenter">
              <ul class="social-network social-circle">
                <li><a href="#" class="icoRss" title="Rss"><i class="fa fa-rss"></i></a></li>
                <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="aligncenter">
              <p>
                &copy; Groovin Theme - All right reserved
              </p>
              <div class="credits">
                <!--
                  All the links in the footer should remain intact. 
                  You can delete the links only if you purchased the pro version.
                  Licensing information: https://bootstrapmade.com/license/
                  Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Groovin
                -->
                <a href="https://bootstrapmade.com/">Free Bootstrap Themes</a> by <a href="https://bootstrapmade.com/">BootstrapMade</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <a href="#" class="scrollup"><i class="fa fa-angle-up fa-2x"></i></a>
  <!-- javascript -->
  <script src="{{ URL::asset('assets/js/jquery-1.9.1.min.js') }}"></script>
  <script src="{{ URL::asset('assets/js/jquery.easing.js') }}"></script>
  <script src="{{ URL::asset('assets/js/classie.js') }}"></script>
  <script src="{{ URL::asset('assets/js/bootstrap.js') }}"></script>
  <script src="{{ URL::asset('assets/js/slippry.min.js') }}"></script>
  <script src="{{ URL::asset('assets/js/nagging-menu.js') }}"></script>
  <script src="{{ URL::asset('assets/js/jquery.nav.js') }}"></script>
  <script src="{{ URL::asset('assets/js/jquery.scrollTo.js') }}"></script>
  <script src="{{ URL::asset('assets/js/jquery.fancybox.pack.js') }}"></script>
  <script src="{{ URL::asset('assets/js/jquery.fancybox-media.js') }}"></script>
  <script src="{{ URL::asset('assets/js/masonry.pkgd.min.js') }}"></script>
  <script src="{{ URL::asset('assets/js/imagesloaded.js') }}"></script>
  <script src="{{ URL::asset('assets/js/jquery.nicescroll.min.js') }}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8HeI8o-c1NppZA-92oYlXakhDPYR7XMY"></script>
  <script src="{{ URL::asset('assets/js/AnimOnScroll.js') }}"></script>
  <script>
    new AnimOnScroll(document.getElementById('grid'), {
      minDuration: 0.4,
      maxDuration: 0.7,
      viewportFactor: 0.2
    });
  </script>
  <script>
    $(document).ready(function() {
      $('#slippry-slider').slippry(
        defaults = {
          transition: 'vertical',
          useCSS: true,
          speed: 5000,
          pause: 3000,
          initSingle: false,
          auto: true,
          preload: 'visible',
          pager: false,
        }

      )
    });
  </script>
  <script src="{{ URL::asset('assets/js/custom.js') }}"></script>
  
</body>

</html>
