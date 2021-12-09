<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title',"Welcome to eTaxPlanner")</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">


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
        .menu-container {
            display: flex;
            flex-wrap: nowrap;
        }

        .menubar {
            width: 15rem;
            background-color: #f1f1f1;
            border-right: 1px solid #ccc;
        }

        .main-content {
            flex: 1;
            background-color: #fff;
            padding: 1.2rem;
        }
    </style>

</head>

<body>


@include('shared._header')

<hr class="p-0 m-0"/>

<div class="menu-container">
    <div class="menubar">
        @include('shared._sidebar')
    </div>

    <div class="main-content">
        @yield('content')
    </div>
</div>

@include('shared._footer')


<!-- jquery js -->
<script type="text/javascript" src="{{asset('assets/js/vendor/jquery-3.2.1.min.js')}}"></script>

<!-- bootstrap js -->
<script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script>
</body>
</html>

