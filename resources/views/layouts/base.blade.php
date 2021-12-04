<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title',"Welcome to eTaxPlanner")</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
@include('shared._footer')
<!-- jquery js -->
<script type="text/javascript" src="{{asset('assets/js/vendor/jquery-3.2.1.min.js')}}"></script>
<!-- bootstrap js -->
<script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script>
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
</body>
</html>
