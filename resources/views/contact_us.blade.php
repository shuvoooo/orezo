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
                                <li><a href="{{route('home')}}">Home</a> <i class="fa fa-angle-right"></i> <a href="#">
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
                            <p>{{general_config('your_address')}}</p>
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
                            <p>{{general_config('opening_hours')}}</p>
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
                            <p>{{general_config('contact_directly')}}</p>
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
                        <form id="contact_form" action="{{route('contact_us_mail')}}" method="POST">
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
    <x-brand></x-brand>
@endsection


@push('scripts')

    <script>
        $(function () {

            // Get the form.
            var form = $('#contact_form');

            // Get the messages div.
            var formMessages = $('.form-message');

            // Set up an event listener for the contact form.
            $(form).submit(function (e) {
                // Stop the browser from submitting the form.
                e.preventDefault();

                // Serialize the form data.
                var formData = $(form).serialize();

                // Submit the form using AJAX.
                $.ajax({
                    type: 'POST',
                    url: $(form).attr('action'),
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                })
                    .done(function (response) {
                        // Make sure that the formMessages div has the 'success' class.
                        $(formMessages).removeClass('error');
                        $(formMessages).addClass('success');

                        // Set the message text.
                        $(formMessages).text(response);

                        // Clear the form.
                        $('#contact-form input,#contact-form textarea').val('');
                    })
                    .fail(function (data) {
                        // Make sure that the formMessages div has the 'error' class.
                        $(formMessages).removeClass('success');
                        $(formMessages).addClass('error');

                        // Set the message text.
                        if (data.responseText !== '') {
                            $(formMessages).text(data.responseText);
                        } else {
                            $(formMessages).text('Oops! An error occured and your message could not be sent.');
                        }
                    });
            });

        });
    </script>
@endpush
