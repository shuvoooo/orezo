<!--==================================================-->
<!----- Start	Techno Header Top Menu Area Css ----->
<!--==================================================-->
<div class="header_top_menu bg_color">
    <marquee class="p-0 m-0 text-white ">
        {{general_config('notification')}}
    </marquee>
</div>
<!--==================================================-->
<!----- End	Techno Header Top Menu Area Css ----->
<!--===================================================-->

<!--==================================================-->
<!----- Start Techno Main Menu Area ----->
<!--==================================================-->
<div id="sticky-header" class="techno_nav_manu d-md-none d-lg-block d-sm-none d-none">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="logo mt-4">
                    <a class="logo_img" href="{{route('home')}}" title="techno">
                        <img src="{{asset('assets/images/1.png')}}" alt=""/>
                    </a>
                    <a class="main_sticky" href="{{route('home')}}" title="techno">
                        <img src="{{asset('assets/images/logo.png')}}" alt="astute"/>
                    </a>
                </div>
            </div>
            <div class="col-md-9">
                <nav class="techno_menu">
                    <ul class="nav_scroll">
                        <li><a href="{{route('home')}}">Home</a></li>
                        <li><a href="{{route('services')}}">Services</a></li>
                        <li><a href="{{route('about')}}">About Us</a></li>
                        <li><a href="{{route('contact')}}">Contact Us</a></li>
                        <li><a href="{{route('faq')}}">FAQ</a></li>
                        <li><a href="{{route('tips')}}">Tips</a></li>
                    </ul>
                    <div class="donate-btn-header">
                        @auth('web')

                            @if(auth()->user()->role == "admin")
                                <a href="{{route('admin.dashboard')}}" class="btn btn-primary">Admin Panel</a>

                            @elseif(auth()->user()->role == "staff")
                                <a href="#" class="btn btn-primary">Staff Panel</a>

                            @else
                                <a href="{{route_with_year('dashboard')}}" class="btn btn-primary">Dashboard</a>
                            @endif

                        @else
                            @if(\Route::currentRouteName() != 'login')
                                <a class="dtbtn" href="{{route('login')}}">Login</a>
                            @endif

                            @if(\Route::currentRouteName() != 'register')
                                <a class="dtbtn" href="{{route('register')}}">Register</a>
                            @endif
                        @endauth
                    </div>
                </nav>

            </div>
        </div>
    </div>
</div>

<!----- Techno Mobile Menu Area ----->
<div class="mobile-menu-area d-sm-block d-md-block d-lg-none ">
    <div class="mobile-menu">
        <nav class="techno_menu">
            <ul class="nav_scroll">
                <li><a href="{{route('home')}}">Home</a></li>
                <li><a href="{{route('services')}}">Services</a></li>
                <li><a href="{{route('about')}}">About Us</a></li>
                <li><a href="{{route('contact')}}">Contact Us</a></li>
                <li><a href="{{route('faq')}}">FAQ</a></li>
                <li><a href="{{route('tips')}}">Tips</a></li>
            </ul>
        </nav>
    </div>
</div>
<!--==================================================-->
<!----- End Techno Main Menu Area ----->
<!--==================================================-->
