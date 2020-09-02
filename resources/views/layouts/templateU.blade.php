<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Information's Games </title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    
    

	<!-- CSS here -->
	<link rel="stylesheet" href="user/assets/css/owl.carousel.min.css">
	<link rel="stylesheet" href="user/assets/css/slicknav.css">
	<link rel="stylesheet" href="user/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="user/assets/css/flaticon.css">
    <link rel="stylesheet" href="user/assets/css/gijgo.css">
	<link rel="stylesheet" href="user/assets/css/animate.min.css">
	<link rel="stylesheet" href="user/assets/css/magnific-popup.css">
	<link rel="stylesheet" href="user/assets/css/fontawesome-all.min.css">
	<link rel="stylesheet" href="user/assets/css/themify-icons.css">
	<link rel="stylesheet" href="user/assets/css/slick.css">
	<link rel="stylesheet" href="user/assets/css/nice-select.css">
	<link rel="stylesheet" href="user/assets/css/style.css">

    <!-- Notificaciones -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/sweetalert.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/toastr.css') }}">
    <link href="{{ asset('admin/css/toastr.min.css') }}" rel="stylesheet" type="text/css" />

    <livewire:styles/>
</head>
<body>
<header>
    <!--? Header Start -->
    <div class="header-area">
        <div class="main-header header-sticky">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <!-- Logo -->
                    <div class="col-xl-2 col-lg-2 col-md-1">
                        <div class="logo">
                            <a href="index.html"><img src="" alt=""></a>
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-10 col-md-10">
                        <div class="menu-main d-flex align-items-center justify-content-end">
                            <!-- Main-menu -->
                            <div class="main-menu f-right d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="/">Home</a></li>
                                        <li><a href="/juegos">Juegos</a></li>
                                        <li><a href="/about">About</a></li>
                                        
                                    </ul>
                                </nav>
                            </div>
                            <div class="header-right-btn f-right d-none d-lg-block ml-30">
                                <a href="/" class="btn header-btn">Bienvenido</a>
                            </div>
                        </div>
                    </div>   
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>

<main>

    @yield('content')
        
</main>    
    
    <!-- Scripts -->
   <!-- JS here -->
   <script src="{{ asset('js/app.js') }}" defer></script>
   <script src="user/assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="user/assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="user/assets/js/popper.min.js"></script>
    <script src="user/assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="user/assets/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="user/assets/js/owl.carousel.min.js"></script>
    <script src="user/assets/js/slick.min.js"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="user/assets/js/wow.min.js"></script>
    <script src="user/assets/js/animated.headline.js"></script>
    <script src="user/assets/js/jquery.magnific-popup.js"></script>

    <!-- Date Picker -->
    <script src="user/assets/js/gijgo.min.js"></script>
    <!-- Nice-select, sticky -->
    <script src="user/assets/js/jquery.nice-select.min.js"></script>
    <script src="user/assets/js/jquery.sticky.js"></script>
    
    <!-- counter , waypoint -->
    <script src="user/assets/js/jquery.counterup.min.js"></script>
    <script src="user/assets/js/waypoints.min.js"></script>
    <script src="user/assets/js/jquery.countdown.min.js"></script>
    <!-- contact js -->
    <script src="user/assets/js/contact.js"></script>
    <script src="user/assets/js/jquery.form.js"></script>
    <script src="user/assets/js/jquery.validate.min.js"></script>
    <script src="user/assets/js/mail-script.js"></script>
    <script src="user/assets/js/jquery.ajaxchimp.min.js"></script>
    
    <!-- Jquery Plugins, main Jquery -->	
    <script src="user/assets/js/plugins.js"></script>
    <script src="user/assets/js/main.js"></script>
   
    
    <!-- Notificaciones -->
    <script src="{{ asset('admin/js/toastr.min.js') }}"></script>
   

    <script src="{{ asset('admin/js/sweetalert.min.js') }}"></script>     
    <!-- <script src="{{ asset('js/toast.js') }}"> </script> -->

    <livewire:scripts />
</body>
</html>
