@extends('layouts.base')


@section('content')
    <!-- ============================================================== -->
    <!-- Start Techno Breatcome Area -->
    <!-- ============================================================== -->
    <div class="breatcome_area d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breatcome_title">
                        <div class="breatcome_title_inner pb-2">
                            <h2>About Us</h2>
                        </div>
                        <div class="breatcome_content">
                            <ul>
                                <li><a href="{{route('home')}}">Home</a> <i class="fa fa-angle-right"></i> <a href="#">
                                        Pages</a> <i class="fa fa-angle-right"></i> <span>About Us</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Techno Breatcome Area -->
    <!-- ============================================================== -->


    <!--==================================================-->
    <!----- Start Techno About Area ----->
    <!--==================================================-->
    <div class="about_area pt-85 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-6">
                    <div class="about_thumb">
                        <img src="{{storage_asset($about->image)}}" alt=""/>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-6">
                    <div class="section_title text_left mb-40 mt-3">
                        <div class="section_sub_title uppercase mb-3">
                            <h6>{{$about->note}}</h6>
                        </div>
                        <div class="section_main_title">
                            <h1>{{$about->heading}}</h1>
                        </div>
                        <div class="em_bar">
                            <div class="em_bar_bg"></div>
                        </div>
                        <div class="section_content_text bold pt-5">
                            <p>{{$about->subheading}}</p>
                        </div>
                    </div>
                    <div class="singel_about_left mb-30">
                        <div class="singel_about_left_inner mb-3">
                            <div class="singel-about-content boder pl-4">
                                {!! $about->description !!}
                            </div>
                        </div>
                        <div class="singel_about_left_inner pl-4">
                            <div class="button two">
                                <a href="#">More Details</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--==================================================-->
    <!----- End Techno About Area ----->
    <!--==================================================-->


    <x-service></x-service>

    <x-team></x-team>

    <x-testimonial></x-testimonial>

    <x-brand></x-brand>
@endsection
