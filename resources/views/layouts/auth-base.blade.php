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


    <!-- font-awesome CSS -->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/fonts/font-awesome/css/font-awesome.min.css')}}">
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="56x56" href="{{asset('assets/images/fav-icon/icon.png')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
          integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">


    <!-- meanmenu CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/meanmenu.min.css')}}" type="text/css" media="all"/>

    <!-- theme-default CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/theme-default.css')}}" type="text/css" media="all"/>
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{asset('style.css')}}" type="text/css" media="all"/>


    <title>@yield("title","Welcome to Dashboard")</title>


    <script src="//www.google.com/recaptcha/api.js" async defer></script>

    <!-- google site key -->
    <meta name="google-site-verification" content="{{env('RECAPTCHA_SITE_KEY')}}">


    <style>


        .border-md {
            border-width: 2px;
        }


        .form-control:not(select) {
            padding: 1.5rem 0.5rem;
        }

        select.form-control {
            height: 52px;
            padding-left: 0.5rem;
        }

        .form-control::placeholder {
            color: #ccc;
            font-weight: bold;
            font-size: 0.9rem;
        }

        .form-control:focus {
            box-shadow: none;
        }

        .input-group-text {
            border-color: #e6e6e6;
        }


    </style>

</head>
<body>

{{--<!-- Navbar-->--}}
{{--<header class="header">--}}
{{--    <nav class="navbar navbar-expand-lg navbar-light py-3">--}}
{{--        <div class="container">--}}
{{--            <a href="#" class="navbar-brand">--}}
{{--                <img src="https://bootstrapious.com/i/snippets/sn-registeration/logo.svg" alt="logo" width="150">--}}
{{--            </a>--}}
{{--        </div>--}}
{{--    </nav>--}}
{{--</header>--}}


@include('shared._header')

<hr class="p-0 m-0 mb-4"/>

<div id="app">
    @yield('content')
</div>


<!-- jquery js -->
<script type="text/javascript" src="{{asset('assets/js/vendor/jquery-3.2.1.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
<!-- jquery meanmenu js -->
<script type="text/javascript" src="{{asset('assets/js/jquery.meanmenu.js')}}"></script>
<!-- jquery scrollup js -->
<script type="text/javascript" src="{{asset('assets/js/jquery.scrollUp.js')}}"></script>
<!-- theme js -->
<script type="text/javascript" src="{{asset('assets/js/theme.js')}}"></script>



<!-- Main js -->
<script type="text/javascript" src="{{mix('js/app.js')}}"></script>

<script>
    $(function () {
        $('input, select').on('focus', function () {
            $(this).parent().find('.input-group-text').css('border-color', '#80bdff');
        });
        $('input, select').on('blur', function () {
            $(this).parent().find('.input-group-text').css('border-color', '#e6e6e6');
        });
    });
</script>

@stack('scripts')

</body>

</html>
