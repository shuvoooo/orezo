<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title',"Welcome to eTaxPlanner")</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Laravel CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Current Year -->
    <meta name="year" content="{{ request()->route('year') ?? date('Y') }}">

    <!-- google site key -->
    <meta name="google-site-verification" content="{{env('RECAPTCHA_SITE_KEY')}}">

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="56x56" href="{{asset('assets/images/fav-icon/icon.png')}}">
    <!-- bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" type="text/css" media="all"/>
    <!-- carousel CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}" type="text/css" media="all"/>
    <!-- responsive CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}" type="text/css" media="all"/>
    <!-- nivo-slider CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/nivo-slider.css')}}" type="text/css" media="all"/>
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}" type="text/css" media="all"/>
    <!-- animated-text CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/animated-text.css')}}" type="text/css" media="all"/>
    <!-- font-awesome CSS -->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/fonts/font-awesome/css/font-awesome.min.css')}}">
    <!-- font-flaticon CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/flaticon.css')}}" type="text/css" media="all"/>
    <!-- theme-default CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/theme-default.css')}}" type="text/css" media="all"/>
    <!-- meanmenu CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/meanmenu.min.css')}}" type="text/css" media="all"/>
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{asset('style.css')}}" type="text/css" media="all"/>
    <!-- transitions CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/owl.transitions.css')}}" type="text/css" media="all"/>
    <!-- venobox CSS -->
    <link rel="stylesheet" href="{{asset('venobox/venobox.css')}}" type="text/css" media="all"/>
    <!-- widget CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/widget.css')}}" type="text/css" media="all"/>
    <!-- modernizr js -->
    <script type="text/javascript" src="{{asset('assets/js/vendor/modernizr-3.5.0.min.js')}}')}}"></script>

</head>
<body>

@include('shared._header')
@yield('content')

<x-footer></x-footer>


<!-- jquery js -->
<script type="text/javascript" src="{{asset('assets/js/vendor/jquery-3.2.1.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
<!-- carousel js -->
<script type="text/javascript" src="{{asset('assets/js/owl.carousel.min.js')}}"></script>

<!-- counterup js -->
<script type="text/javascript" src="{{asset('assets/js/jquery.counterup.min.js')}}"></script>

<!-- waypoints js -->
<script type="text/javascript" src="{{asset('assets/js/waypoints.min.js')}}"></script>

<!-- wow js -->
<script type="text/javascript" src="{{asset('assets/js/wow.js')}}"></script>

<!-- imagesloaded js -->
<script type="text/javascript" src="{{asset('assets/js/imagesloaded.pkgd.min.js')}}"></script>

<!-- venobox js -->
<script type="text/javascript" src="{{asset('venobox/venobox.js')}}"></script>
<!-- ajax mail js -->
<script type="text/javascript" src="{{asset('assets/js/ajax-mail.js')}}"></script>
<!--  testimonial js -->
<script type="text/javascript" src="{{asset('assets/js/testimonial.js')}}"></script>
<!--  animated-text js -->
<script type="text/javascript" src="{{asset('assets/js/animated-text.js')}}"></script>
<!-- venobox min js -->
<script type="text/javascript" src="{{asset('venobox/venobox.min.js')}}"></script>
<!-- isotope js -->
<script type="text/javascript" src="{{asset('assets/js/isotope.pkgd.min.js')}}"></script>
<!-- jquery nivo slider pack js -->
<script type="text/javascript" src="{{asset('assets/js/jquery.nivo.slider.pack.js')}}"></script>
<!-- jquery meanmenu js -->
<script type="text/javascript" src="{{asset('assets/js/jquery.meanmenu.js')}}"></script>
<!-- jquery scrollup js -->
<script type="text/javascript" src="{{asset('assets/js/jquery.scrollUp.js')}}"></script>
<!-- theme js -->
<script type="text/javascript" src="{{asset('assets/js/theme.js')}}"></script>
<!-- jquery js -->

@stack('scripts')

</body>
</html>
