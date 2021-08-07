<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    
    <!--====== Title ======-->
    <title>SIMASET</title>
    
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{ asset('consult-opl/assets/images/favicon.png') }}" type="image/png">
        
    <!--====== Slick CSS ======-->
    <link rel="stylesheet" href="{{ asset('consult-opl/assets/css/slick.css') }}">
        
    <!--====== Font Awesome CSS ======-->
    <link rel="stylesheet" href="{{ asset('consult-opl/assets/css/font-awesome.min.css') }}">
        
    <!--====== Line Icons CSS ======-->
    <link rel="stylesheet" href="{{ asset('consult-opl/assets/css/LineIcons.css') }}">
        
    <!--====== Animate CSS ======-->
    <link rel="stylesheet" href="{{ asset('consult-opl/assets/css/animate.css') }}">
        
    <!--====== Magnific Popup CSS ======-->
    <link rel="stylesheet" href="{{ asset('consult-opl/assets/css/magnific-popup.css') }}">
        
    <!--====== Bootstrap CSS ======-->
    <link rel="stylesheet" href="{{ asset('consult-opl/assets/css/bootstrap.min.css') }}">
    
    <!--====== Default CSS ======-->
    <link rel="stylesheet" href="{{ asset('consult-opl/assets/css/default.css') }}">
    
    <!--====== Style CSS ======-->
    <link rel="stylesheet" href="{{ asset('consult-opl/assets/css/style.css') }}">
    
</head>

<body>
    <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->
   
   
    <!--====== PRELOADER PART START ======-->


    <!--====== PRELOADER PART ENDS ======-->
    
    <!--====== HEADER PART START ======-->
    
    
    <header class="header-area">
        <div id="home" class="header-hero bg_cover d-lg-flex align-items-center" style="background-image: url({{ asset('consult-opl/assets/images/footer-bg.jpg') }})">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="header-hero-content">
                            <h1 class="hero-title wow fadeInUp" data-wow-duration="0.2s" data-wow-delay="0.2s"><b>Selamat</b> <span>Datang</span> SIMASET </h1> <br>
                            
                                @if (Route::has('login'))
                                <div class="top-right links">
                                    @auth
                                        @if(Auth::user()->akses == 'sarpras')
                                            <a href="{{ url('/sarpras/home') }}" class="main-btn">Home</a>
                                        @elseif(Auth::user()->akses == 'keuangan')
                                            <a href="{{ url('/keuangan/home') }}" class="main-btn">Home</a>
                                        @elseif(Auth::user()->akses == 'unitkerja')
                                            <a href="{{ url('/umpeg/home') }}" class="main-btn">Home</a>
                                        @endif
                                @else
                                        <a href="{{ route('login') }}" class="main-btn">LOGIN</a>
                                    @endauth
                                </div>
                                 @endif
                                
                           
                        </div> <!-- header hero content -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
            <div class="header-hero-image d-flex align-items-center wow fadeInRightBig" data-wow-duration="1s" data-wow-delay="1.1s">
                <div class="image">
                    <img src="{{ asset('consult-opl/assets/images/1626938036928.png') }}" alt="Hero Image">
                </div>
            </div> <!-- header hero image -->
        </div> <!-- header hero -->
    </header>
    
    <!--====== HEADER PART ENDS ======-->
    





    <!--====== Jquery js ======-->
    <script src="{{ asset('consult-opl/assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('consult-opl/assets/js/vendor/modernizr-3.7.1.min.js') }}"></script>
    
    <!--====== Bootstrap js ======-->
    <script src="{{ asset('consult-opl/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('consult-opl/assets/js/bootstrap.min.js') }}"></script>
    
    <!--====== Slick js ======-->
    <script src="{{ asset('consult-opl/assets/js/slick.min.js') }}"></script>
    
    <!--====== Isotope js ======-->
    <script src="{{ asset('consult-opl/assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('consult-opl/assets/js/isotope.pkgd.min.js') }}"></script>
    
    <!--====== Counter Up js ======-->
    <script src="{{ asset('consult-opl/assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('consult-opl/assets/js/jquery.counterup.min.js') }}"></script>
    
    <!--====== Circles js ======-->
    <script src="{{ asset('consult-opl/assets/js/circles.min.js') }}"></script>
    
    <!--====== Appear js ======-->
    <script src="{{ asset('consult-opl/assets/js/jquery.appear.min.js') }}"></script>
    
    <!--====== WOW js ======-->
    <script src="{{ asset('consult-opl/assets/js/wow.min.js') }}"></script>
    
    <!--====== Headroom js ======-->
    <script src="{{ asset('consult-opl/assets/js/headroom.min.js') }}"></script>
    
    <!--====== Jquery Nav js ======-->
    <script src="{{ asset('consult-opl/assets/js/jquery.nav.js') }}"></script>
    
    <!--====== Scroll It js ======-->
    <script src="{{ asset('consult-opl/assets/js/scrollIt.min.js') }}"></script>
    
    <!--====== Magnific Popup js ======-->
    <script src="{{ asset('consult-opl/assets/js/jquery.magnific-popup.min.js') }}"></script>
    
    <!--====== Main js ======-->
    <script src="{{ asset('consult-opl/assets/js/main.js') }}"></script>
    
</body>

</html>
