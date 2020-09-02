<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <livewire:styles />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">

     <!-- Main CSS-->
    <link href="{{ asset('admin/css/theme.css') }} " rel="stylesheet" type="text/css">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com" >
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Fontfaces CSS-->
    <link href="{{ asset('admin/css/font-face.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('admin/vendor/font-awesome-4.7/css/font-awesome.min.css') }} " rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/vendor/font-awesome-5/css/fontawesome-all.min.css') }} " rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/vendor/mdi-font/css/material-design-iconic-font.min.css') }} " rel="stylesheet" type="text/css">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('admin/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Vendor CSS-->
    <!-- <link href="{{ asset('admin/vendor/animsition/animsition.min.css') }}" rel="stylesheet" type="text/css"> -->
    <link href="{{ asset('admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/vendor/wow/animate.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/vendor/slick/slick.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/vendor/select2/select2.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" type="text/css">

    <!-- Notificaciones -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/sweetalert.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/toastr.css') }}">
    <link href="{{ asset('admin/css/toastr.min.css') }}" rel="stylesheet" type="text/css" />

    <livewire:scripts />
</head>
<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
                <div class="logo">
                    <a href="/">
                        <img src="{{ asset('admin/images/icon/logo.png') }}" alt="Cool Admin" />
                    </a>
                </div>
                <div class="menu-sidebar__content js-scrollbar1">
                    <nav class="navbar-sidebar">
                        <ul class="list-unstyled navbar__list">
                            <li>
                                <a href="/administracion/desarrolladoras"><i class="fas fa-table"></i> Desarrolladoras</a>
                            </li>
                            <li>
                                <a href="/administracion/clasificaciones"><i class="fas fa-table"></i>Clasificaciones</a>
                            </li>
                            <li>
                                <a href="/administracion/generos"><i class="fas fa-table"></i>Generos</a>
                            </li>
                            <li>
                                <a href="/administracion/juegos"><i class="fas fa-table"></i>Juegos</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>
            <!-- END MENU SIDEBAR-->

            <div class="page-container">
                <div class="main-content">
                <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            @yield('content')
                            
                        </div>
                </div>
                </div>
            </div>

    
    </div><!-- Page-wrapper -->
    

    
    
    <!-- Scripts -->
   
    
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Jquery JS-->
    <script src="{{ asset('admin/vendor/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap JS-->
    <script src="{{ asset('admin/vendor/bootstrap-4.1/popper.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
    <!-- Vendor JS       -->
    <script src="{{ asset('admin/vendor/slick/slick.min.js') }}"></script>

    <script src="{{ asset('admin/vendor/wow/wow.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/animsition/animsition.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>

    <script src="{{ asset('admin/vendor/counter-up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/counter-up/jquery.counterup.min.js') }}"></script>

    <script src="{{ asset('admin/vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('admin/vendor/chartjs/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/select2/select2.min.js') }}"></script>
    <!-- <script src="{{ asset('js/main.js') }}"></script> -->
    
    <!-- Notificaciones -->
    <script src="{{ asset('admin/js/toastr.min.js') }}"></script>
   

    <script src="{{ asset('admin/js/sweetalert.min.js') }}"></script>     
    <script src="{{ asset('js/toast.js') }}"> </script>

    
    @if($desarrolladoras <=0 )
        <script type="text/javascript">
            toastr.warning('Registre alguna desarrolladora');
        </script>
    @endif
    @if($clasificaciones <=0 )
        <script type="text/javascript">
            toastr.warning('Registre alguna clasificacion');
        </script>
    @endif
    @if($generos <=0 )
        <script type="text/javascript">
            toastr.warning('Registre algun genero');
        </script>
    @endif
    @if($juegos <=0 )
        <script type="text/javascript">
            toastr.warning('Registre algun juego');
        </script>
    @endif
    
    
</body>
</html>
