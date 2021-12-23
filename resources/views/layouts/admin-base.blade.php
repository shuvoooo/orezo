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
    <!-- font-flaticon CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/flaticon.css')}}" type="text/css" media="all"/>

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
        .sidebar-container {
            width: 15rem;
            background-color: #f1f1f1;
            border-right: 1px solid #ccc;
        }

        .main-container {
            flex: 1;
            background-color: #fff;
            padding: 1.2rem;
        }
    </style>

    @yield('css')
</head>

<body>


@include('shared._header')

<hr class="p-0 m-0"/>

<div class="d-flex flex-nowrap">
    <div class="sidebar-container">
        @include('shared._sidebar')
    </div>

    <div class="main-container" id="app">
        <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->
            <ul class="breadcrumb">
                <li>
                    <a href="" target="_blank">Home</a>
                    <span class="divider"> / </span>
                </li>

                <li>
                    <a href="" target="_blank">&nbsp;User</a>
                    <span class="divider"> / </span>
                </li>

                @for($i = 2; $i <= count(Request::segments()); $i++)
                    <li>
                        <a class="text-capitalize"
                           href="{{ URL::to( implode( '/', array_slice(Request::segments(), 0 ,$i, true)))}}">
                            &nbsp;{{Request::segment($i)}}</a>
                        <span class="divider"> / </span>
                    </li>
                @endfor

                <li class="ml-auto"></li>
                @foreach(range(date('Y')+1, date('Y')-1) as $year)
                    <li class="ml-3 pl-3 border-left">
                        <a href="{{route_with_year('dashboard',['year'=>$year])}}"
                           class="@if(request()->route('year') == $year) font-weight-bold text-success @endif ">{{$year}}</a>
                    </li>
                @endforeach

            </ul>

            @yield('content')

        </div>
    </div>
</div>

@include('shared._footer')


<!-- jquery js -->
<script type="text/javascript" src="{{asset('assets/js/vendor/jquery-3.2.1.min.js')}}"></script>

<!-- bootstrap js -->
<script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script>

{{--<script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>--}}

<!-- Main App Script -->
<script type="text/javascript" src="{{asset('js/app.js')}}"></script>

<script>
    $(document).ready(function () {
        $('.sidebar .sub-menu > a').click(function () {
            var last = $('.sub-menu.open', $('#sidebar'));
            last.removeClass("open");
            $('.arrow', last).removeClass("open");
            $('.sub', last).slideUp(200);
            var sub = $(this).next();
            if (sub.is(":visible")) {
                $('.arrow', $(this)).removeClass("open");
                $(this).parent().removeClass("open");
                sub.slideUp(200);
            } else {
                $('.arrow', $(this)).addClass("open");
                $(this).parent().addClass("open");
                sub.slideDown(200);
            }
            var o = ($(this).offset());
            diff = 200 - o.top;
            if (diff > 0)
                $(".sidebar-scroll").scrollTo("-=" + Math.abs(diff), 500);
            else
                $(".sidebar-scroll").scrollTo("+=" + Math.abs(diff), 500);
        });
    });
</script>


@stack('scripts')

</body>
</html>

