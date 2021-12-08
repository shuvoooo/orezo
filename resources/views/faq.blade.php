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
                            <h2>FAQ'S</h2>
                        </div>
                        <div class="breatcome_content">
                            <ul>
                                <li><a href="index.html">Home</a> <i class="fa fa-angle-right"></i> <a href="#">
                                        Pages</a> <i class="fa fa-angle-right"></i> <span>FAQ'S</span></li>
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


    <!-- ============================================================== -->
    <!-- Start - Techno FAQ Area -->
    <!-- ============================================================== -->
    <div class="faq_area bg_color2 pt-90 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title text_center mb-60 mt-3">
                        <div class="section_main_title">
                            <h1>Frequently Asked Questions</h1>
                        </div>
                        <div class="em_bar">
                            <div class="em_bar_bg"></div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="single_faq mb-4">
                        <div class="single_faq_content">
                            <div class="single_faq_title pb-2">
                                <h4>How can I pay for this?</h4>
                            </div>
                            <div class="single_faq_text">
                                <p>Intrinsicly implement high standards in strategic theme areas via inexpensive
                                    solutions. Assertively conceptualize prospective intuitive services rather than
                                    process-centric.</p>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="single_faq mb-4">
                        <div class="single_faq_content">
                            <div class="single_faq_title pb-2">
                                <h4>Is it possible to pay yearly?</h4>
                            </div>
                            <div class="single_faq_text">
                                <p>Assertively implement high standards in strategic theme areas via inexpensive
                                    solutions. Assertively conceptualize prospective intuitive services rather than
                                    relationships.</p>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="single_faq mb-4">
                        <div class="single_faq_content">
                            <div class="single_faq_title pb-2">
                                <h4>Why there no limits the number of messages?</h4>
                            </div>
                            <div class="single_faq_text">
                                <p>Intrinsicly implement high standards in strategic theme areas via inexpensive
                                    solutions. Assertively conceptualize prospective intuitive services rather than
                                    process-centric.</p>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="single_faq mb-4">
                        <div class="single_faq_content">
                            <div class="single_faq_title pb-2">
                                <h4>Do you offer discounts on multiple items?</h4>
                            </div>
                            <div class="single_faq_text">
                                <p>Dramatically implement high standards in strategic theme areas via inexpensive
                                    solutions. Assertively conceptualize prospective intuitive services rather than
                                    process-centric.</p>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="single_faq mb-4">
                        <div class="single_faq_content">
                            <div class="single_faq_title pb-2">
                                <h4>Is VAT included in plan prices?</h4>
                            </div>
                            <div class="single_faq_text">
                                <p>Intrinsicly implement high standards in strategic theme areas via inexpensive
                                    solutions. Assertively conceptualize prospective intuitive services rather than
                                    process-centric.</p>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="single_faq mb-4">
                        <div class="single_faq_content">
                            <div class="single_faq_title pb-2">
                                <h4>Will I pay more for some features?</h4>
                            </div>
                            <div class="single_faq_text">
                                <p>Company implement high standards in strategic theme areas via inexpensive solutions.
                                    Assertively conceptualize prospective intuitive services rather than
                                    process-centric.</p>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End - Techno Team Area -->
    <!-- ============================================================== -->



    <!--==================================================-->
    <!----- Start Techno Call Do Action Area ----->
    <!--==================================================-->
    <div class="call_do_action pt-85 pb-50 bg_color" style="background-image:url(assets/images/slider/slider-4.jpg)">
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
