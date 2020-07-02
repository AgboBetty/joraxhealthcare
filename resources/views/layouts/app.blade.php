<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{env('APP_NAME')}}</title>
    <link rel="icon" href="{{ asset('img/icons/favicon.png') }}" type="image/icon">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/owl.carousel.css')}}" rel="stylesheet" media="screen"/>
    <link href="{{ asset('css/owl.theme.css')}}" rel="stylesheet" media="screen"/>
    <link href="{{ asset('css/animate.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/nivo-lightbox.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/nivo-lightbox-theme/default/default.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('fonts/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('plugins/cubeportfolio/css/cubeportfolio.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/style.css')}}" rel="stylesheet" type="text/css"/>
    <link id="t-colors"  href="{{ asset('css/default.css')}}" rel="stylesheet" type="text/css">
    <link id="t-colors"  href="{{ asset('css/ov.css')}}" rel="stylesheet" type="text/css">

</head>
<body>
    <div id="app" class="no-scroll-bar" data-spy="scroll" data-target=".navbar-custom">

        <!-- navigation -->
        @include('layouts.navbar')

        <!-- main -->
        <main class="py-4">
            @yield('content')
        </main>

        <!-- footer -->
        @include('layouts.footer')
    </div>

    <!-- Scroll to top -->
    <a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

    <!-- Core JavaScript Files -->
    <script src="https://apps.elfsight.com/p/platform.js" defer></script>
    <div class="elfsight-app-a1749d28-547b-4fa5-8cb0-e0b7e3cf421f"></div>

    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery.easing.min.js')}}"></script>
    <script src="{{asset('js/wow.min.js')}}"></script>
    <script src="{{asset('js/jquery.scrollTo.js')}}"></script>
    <script src="{{asset('js/jquery.appear.js')}}"></script>
    <script src="{{asset('js/stellar.js')}}"></script>
    <script src="{{asset('plugins/cubeportfolio/js/jquery.cubeportfolio.min.js')}}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/nivo-lightbox.min.js')}}"></script>
    <script src="{{asset('js/default.js')}}"></script>
    <script src="{{asset('js/ov.js')}}"></script>
</body>
</html>
