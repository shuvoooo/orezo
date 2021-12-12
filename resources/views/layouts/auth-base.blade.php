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

    <!-- font-awesome CSS -->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/fonts/font-awesome/css/font-awesome.min.css')}}">
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="56x56" href="{{asset('assets/images/fav-icon/icon.png')}}">
    <!-- bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" type="text/css" media="all"/>
    <!-- theme-default CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/theme-default.css')}}" type="text/css" media="all"/>
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{asset('style.css')}}" type="text/css" media="all"/>


    <title>@yield("title","Welcome to Dashboard")</title>


    <style>


        .border-md {
            border-width: 2px;
        }

        .btn-facebook {
            background: #405D9D;
            border: none;
        }

        .btn-facebook:hover, .btn-facebook:focus {
            background: #314879;
        }

        .btn-twitter {
            background: #42AEEC;
            border: none;
        }

        .btn-twitter:hover, .btn-twitter:focus {
            background: #1799e4;
        }


        /*
        *
        * ==========================================
        * FOR DEMO PURPOSES
        * ==========================================
        *
        */

        body {
            min-height: 100vh;
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

<!-- bootstrap js -->
<script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script>


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


</body>

</html>
