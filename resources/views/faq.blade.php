@extends('layouts.base')


@section('content')

    <!-- ============================================================== -->
    <!-- Start eTaxPlanner Breatcome Area -->
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
                                <li>
                                    <a href="{{route('home')}}">Home</a>
                                    <i class="fa fa-angle-right"></i>
                                    <a href="#">
                                        Pages</a> <i class="fa fa-angle-right"></i> <span>FAQ'S</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End eTaxPlanner Breatcome Area -->
    <!-- ============================================================== -->


    <!-- ============================================================== -->
    <!-- Start - eTaxPlanner FAQ Area -->
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
                @foreach($faqs as $faq)
                    <div class="col-lg-6 col-md-6">
                        <div class="single_faq mb-4">
                            <div class="single_faq_content">
                                <div class="single_faq_title pb-2">
                                    <h4>{{$faq->question}}</h4>
                                </div>
                                <div class="single_faq_text">
                                    <p>{{$faq->answer}}</p>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End - eTaxPlanner Team Area -->
    <!-- ============================================================== -->



    <x-call-to-do></x-call-to-do>

    <x-team></x-team>

    <x-testimonial></x-testimonial>

    <x-brand></x-brand>
@endsection
