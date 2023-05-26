<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Racana App </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="manifest" href="site.webmanifest">
		<link rel="shortcut icon" type="image/x-icon" href="assets/img/trending/logo.jpg">

		<!-- CSS here -->
            <link rel="stylesheet" href="{{ URL::asset('/assets/css/bootstrap.min.css') }}">
            <link rel="stylesheet" href="{{ URL::asset('/assets/css/owl.carousel.min.css') }}">
            <link rel="stylesheet" href="{{ URL::asset('/assets/css/ticker-style.css') }}">
            <link rel="stylesheet" href="{{ URL::asset('/assets/css/flaticon.css') }}">
            <link rel="stylesheet" href="{{ URL::asset('/assets/css/slicknav.css') }}">
            <link rel="stylesheet" href="{{ URL::asset('/assets/css/animate.min.css') }}">
            <link rel="stylesheet" href="{{ URL::asset('/assets/css/magnific-popup.css') }}">
            <link rel="stylesheet" href="{{ URL::asset('/assets/css/fontawesome-all.min.css') }}">
            <link rel="stylesheet" href="{{ URL::asset('/assets/css/themify-icons.css') }}">
            <link rel="stylesheet" href="{{ URL::asset('/assets/css/slick.css') }}">
            <link rel="stylesheet" href="{{ URL::asset('/assets/css/nice-select.css') }}">
            <link rel="stylesheet" href="{{ URL::asset('/assets/css/style.css') }}">
   </head>
   <style>
    ul.numbered-list {
      list-style-type: decimal; /* Use decimal numbering */
      padding-left: 20px; /* Add left padding to align the numbers */
    }
  </style>

   <body>
       
    <!-- Preloader Start -->
    <!-- <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/logo.png" alt="">
                </div>
            </div>
        </div>
    </div> -->
    <!-- Preloader Start -->

    @include('layouts.header')

    <main>
    <!-- Trending Area Start -->
    <div class="trending-area fix">
        <div class="container">
            <div class="trending-main">
                <!-- Trending Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="trending-tittle">
                            
                            <!-- <p>Rem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Trending Top -->
                        <div class="trending-top mb-30">
                            
                            <div class="trend-top-img">
                                <img src="build/img/trending/pramuka3.jpg" alt="" width="300">
                            </div>
                            
                        </div>
                        <!-- Trending Bottom -->
                        <div class="trending-bottom mb-3">
                            <div class="container">
                                <div class="row mb-3">
                                    <h2>KIR AMBACANA ARS UNIVERSITY</h2>
                                </div>
                                <div class="row">
                                    <p>ini nantinya kir.</p> <br>
                                    
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <!-- Riht content -->
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Berita Populer</h4>
                                @foreach ($popular as $pop)
                                    <div class="trand-right-single d-flex">
                                        <div class="trand-right-img">
                                            <img src="{{ $pop->image_url }}" alt="" width="100" height="100">
                                        </div>
                                        <div class="trand-right-cap">
                                            <span class="color1">{{ $pop->categories->name }}</span>
                                            <h4><a href="{{ route('detail',$pop->id) }}">{{ $pop->name }}</a></h4>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- Trending Area End -->
    <!--   Weekly-News start -->
    <div class="weekly-news-area pt-50">
        <div class="container">
            <div class="weekly-wrapper">
                <!-- section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle mb-30">
                            <h3>Berita Populer Mingguan</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="weekly-news-active dot-style d-flex dot-style">
                            @foreach ($popular as $item)
                                <div class="weekly-single">
                                    <div class="weekly-img">
                                        <img src="{{ $item->image_url }}" alt="" height="400">
                                    </div>
                                    <div class="weekly-caption">
                                        <span class="color1">{{ $item->categories->name }}</span>
                                        <h4><a href="{{ route('detail',$item->id) }}">{{ $item->name }}</a></h4>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
               
    <!-- End Weekly-News -->
   <!-- Whats New Start -->
   
    <!-- Whats New End -->
    <!--   Weekly2-News start -->
          
    <!-- End Weekly-News -->
    <!-- Start Youtube -->
   
    <!-- End Start youtube -->
    <!--  Recent Articles start -->
          
    <!--Recent Articles End -->
    <!--Start pagination -->

    <!-- End pagination  -->
    </main>
    
   @include('layouts.footer2')
   
	<!-- JS here -->
    {{ URL::asset('/build/css/bootstrap.min.css') }}
		<!-- All JS Custom Plugins Link Here here -->
        <script src="{{ URL::asset('/assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
		<!-- Jquery, Popper, Bootstrap -->
		<script src="{{ URL::asset('/assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
        <script src="{{ URL::asset('/assets/js/popper.min.js') }}"></script>
        <script src="{{ URL::asset('/assets/js/bootstrap.min.js') }}"></script>
	    <!-- Jquery Mobile Menu -->
        <script src="{{ URL::asset('/assets/js/jquery.slicknav.min.js') }}"></script>

		<!-- Jquery Slick , Owl-Carousel Plugins -->
        <script src="{{ URL::asset('/assets/js/owl.carousel.min.js') }}"></script>
        <script src="{{ URL::asset('/assets/js/slick.min.js') }}"></script>
        <!-- Date Picker -->
        <script src="{{ URL::asset('/assets/js/gijgo.min.js') }}"></script>
		<!-- One Page, Animated-HeadLin -->
        <script src="{{ URL::asset('/assets/js/wow.min.js') }}"></script>
		<script src="{{ URL::asset('/assets/js/animated.headline.js') }}"></script>
        <script src="{{ URL::asset('/assets/js/jquery.magnific-popup.js') }}"></script>

        <!-- Breaking New Pluging -->
        <script src="{{ URL::asset('/assets/js/jquery.ticker.js') }}"></script>
        <script src="{{ URL::asset('/assets/js/site.js') }}"></script>

		<!-- Scrollup, nice-select, sticky -->
        <script src="{{ URL::asset('/assets/js/jquery.scrollUp.min.js') }}"></script>
        <script src="{{ URL::asset('/assets/js/jquery.nice-select.min.js') }}"></script>
		<script src="{{ URL::asset('/assets/js/jquery.sticky.js') }}"></script>
        
        <!-- contact js -->
        <script src="{{ URL::asset('/assets/js/contact.js') }}"></script>
        <script src="{{ URL::asset('/assets/js/jquery.form.js') }}"></script>
        <script src="{{ URL::asset('/assets/js/jquery.validate.min.js') }}"></script>
        <script src="{{ URL::asset('/assets/js/mail-script.js') }}"></script>
        <script src="{{ URL::asset('/assets/js/jquery.ajaxchimp.min.js') }}"></script>
        
		<!-- Jquery Plugins, main Jquery -->	
        <script src="{{ URL::asset('/assets/js/plugins.js') }}"></script>
        <script src="{{ URL::asset('/assets/js/main.js') }}"></script>
        
    </body>
</html>