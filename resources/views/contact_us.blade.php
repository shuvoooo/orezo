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
                            <h2>Contact Us </h2>
                        </div>
                        <div class="breatcome_content">
                            <ul>
                                <li><a href="index.html">Home</a> <i class="fa fa-angle-right"></i> <a href="#">
                                        Pages</a> <i class="fa fa-angle-right"></i> <span>Contact Us</span></li>
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

    <div class="contact_address_area pt-80 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title text_center mb-55">
                        <div class="section_sub_title uppercase mb-3">
                            <h6>CONTACT US</h6>
                        </div>
                        <div class="section_main_title">
                            <h1>We Are Here For You</h1>
                        </div>
                        <div class="em_bar">
                            <div class="em_bar_bg"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="single_contact_address text_center mb-30">
                        <div class="contact_address_icon pb-3">
                            <i class="fa fa-map-o"></i>
                        </div>
                        <div class="contact_address_title pb-2">
                            <h4>Enter Your Address</h4>
                        </div>
                        <div class="contact_address_text">
                            <p>54/1 New sorini Asut, Melbord Austria.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="single_contact_address text_center mb-30">
                        <div class="contact_address_icon pb-3">
                            <i class="fa fa-clock-o"></i>
                        </div>
                        <div class="contact_address_title pb-2">
                            <h4>Opening Hours</h4>
                        </div>
                        <div class="contact_address_text">
                            <p>Mon - Thu: 10:00am - 05:00pm</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="single_contact_address text_center mb-30">
                        <div class="contact_address_icon pb-3">
                            <i class="fa fa-volume-control-phone"></i>
                        </div>
                        <div class="contact_address_title pb-2">
                            <h4>Contact Directly</h4>
                        </div>
                        <div class="contact_address_text">
                            <p>demo@example.com, 54786547521</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!--==================================================-->
    <!----- Start Techno Contact Area ----->
    <!--==================================================-->
    <div class="main_contact_area pt-80 bg_color2 pb-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title text_center mb-55">
                        <div class="section_sub_title uppercase mb-3">
                            <h6>CONTACT US</h6>
                        </div>
                        <div class="section_main_title">
                            <h1>Feel Free Contact</h1>
                            <h1>Us Now</h1>
                        </div>
                        <div class="em_bar">
                            <div class="em_bar_bg"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="contact_from">
                        <form id="contact_form" action="mail.php" method="POST">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form_box mb-30">
                                        <input type="text" name="name" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form_box mb-30">
                                        <input type="email" name="email" placeholder="Email Address">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form_box mb-30">
                                        <input type="text" name="phone" placeholder="Phone Number">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form_box mb-30">
                                        <input type="text" name="web" placeholder="Website">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form_box mb-30">
                                        <textarea name="message" id="message" cols="30" rows="10"
                                                  placeholder="Write a Message"></textarea>
                                    </div>
                                    <div class="quote_btn text_center">
                                        <button class="btn" type="submit">Send Message</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <p class="form-message"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--==================================================-->
    <!----- End Techno Contact Area ----->
    <!--==================================================-->

    <!--==================================================-->
    <!----- End Techno Map Area ----->
    <!--==================================================-->
    <div class="google_map_area">
        <div class="row-fluid">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="google_map_area">
                    <iframe class="map" src="https://snazzymaps.com/embed/65241"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!--==================================================-->
    <!----- End Techno Map Area ----->
    <!--==================================================-->



@endsection
