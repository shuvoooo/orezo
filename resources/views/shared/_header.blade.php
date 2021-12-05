<!--==================================================-->
<!----- Start	Techno Header Top Menu Area Css ----->
<!--==================================================-->
<div class="header_top_menu pt-2 pb-2 bg_color">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-sm-8">
                <div class="header_top_menu_address">
                    <div class="header_top_menu_address_inner">
                        <ul>
                            <li><a href="#"><i class="fa fa-envelope-o"></i>example@gmail.com</a></li>
                            <li><a href="#"><i class="fa fa-map-marker"></i>24/5, 1st Floor, Kurigram</a></li>
                            <li><a href="#"><i class="fa fa-phone"></i>+ (1800) 456 7890</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-4">
                <div class="header_top_menu_icon">
                    <div class="header_top_menu_icon_inner">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
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
                    <a class="logo_img" href="index.html" title="techno">
                        <img src="{{asset('assets/images/1.png')}}" alt=""/>
                    </a>
                    <a class="main_sticky" href="index.html" title="techno">
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
                    </ul>
                    <div class="donate-btn-header">
                        <a class="dtbtn" href="#">Get A Quote</a>
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
            </ul>
        </nav>
    </div>
</div>
<!--==================================================-->
<!----- End Techno Main Menu Area ----->
<!--==================================================-->
