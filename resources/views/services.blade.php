@extends('layouts.base')

@section('title', 'Service')


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
                            <h2>Service Two</h2>
                        </div>
                        <div class="breatcome_content">
                            <ul>
                                <li><a href="index.html">Home</a> <i class="fa fa-angle-right"></i> <a href="#">
                                        Pages</a> <i class="fa fa-angle-right"></i> <span>Service Two</span></li>
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
    <x-service></x-service>


    <!--==================================================-->
    <!----- Start Techno Call Do Action Area ----->
    <!--==================================================-->
    <div class="call_do_action pt-85 pb-50 bg_color" style="background-image:url(assets/images/slider/slider-4.jpg)" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title white text_center mb-60 mt-3">
                        <div class="phone_number mb-3">
                            <h5>+880 013 143 206</h5>
                        </div>
                        <div class="section_main_title">
                            <h1>To make requests for the</h1>
                            <h1>further information</h1>
                        </div>
                        <div class="button three mt-40">
                            <a href="#">Join With Now<i class="fa fa-long-arrow-right"></i></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--==================================================-->
    <!----- End Techno Call Do Action Area ----->
    <!--==================================================-->


    <x-team></x-team>

    <x-testimonial></x-testimonial>

    <x-brand></x-brand>
@endsection
