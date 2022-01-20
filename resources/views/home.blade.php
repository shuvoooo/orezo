@extends('layouts.base')

@section('title', 'Home')

@section('content')
    <!--==================================================-->
    <!----- Start eTaxPlanner Slider Area ----->
    <!--==================================================-->
    <div class="banner_area banner1 d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="single_banner">
                        <div class="single_banner_content">
                            <div class="banner_text_content">
                                <h1>{{explode("/", $homePage->title)[0]}}</h1>
                                <h1>{{explode("/", $homePage->title)[1]}}</h1>
                                <h1 class="cd-headline clip is-full-width">
									<span class="cd-words-wrapper" style="width: 457.078px;">
                                        @foreach(array_slice(explode("/", $homePage->title) ,2) as $title)
                                            <b class=" @if($loop->index == 0) is-visible @else is-hidden @endif ">{{$title}}</b>
                                        @endforeach
									</span>
                                </h1>
                            </div>
                            <div class="banner_content_text pt-30">
                                <p>{{$homePage->description}}</p>
                            </div>
                            <div class="slider_button pt-25 d-flex">
                                <div class="button">
                                    <a href="#">How IT Work <i class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                            <div class="data_science_video">
                                <div class="data_science_video_inner">
                                    <a class="video-vemo-icon venobox vbox-item" data-vbtype="youtube"
                                       data-autoplay="true" href="{{$homePage->youtube_url}}">
                                        <i class="fa fa-play"></i>
                                        <div id="spinnerbtn"></div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="single_banner_thumb">
                        <div class="banner_shape">
                            <div class="banner_shape_inner1 bounce-animate5">
                                <img src="{{asset('assets/images/shape/2.png')}}" alt="">
                            </div>
                            <div class="banner_shape_inner2 bounce-animate">
                                <img src="{{asset('assets/images/shape/3.png')}}" alt="">
                            </div>
                            <div class="banner_shape_inner3 rotateme">
                                <img src="{{asset('assets/images/shape/4.png')}}" alt="">
                            </div>
                            <div class="banner_shape_inner4 ">
                                <img src="{{asset('assets/images/shape/text1.png')}}" alt="">
                            </div>
                            <div class="banner_shape_inner5 bounce-animate2">
                                <img src="{{asset('assets/images/shape/text2.png')}}" alt="">
                            </div>
                            <div class="banner_shape_inner6 bounce-animate3">
                                <img src="{{asset('assets/images/shape/text3.png')}}" alt="">
                            </div>

                        </div>
                        <div class="single_banner_thumb_inner">
                            <img src="{{asset('assets/images/shape/1.png')}}" alt="">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--==================================================-->
    <!----- End eTaxPlanner Slider Area ----->
    <!--==================================================-->






    <!--==================================================-->
    <!----- Start eTaxPlanner Counter Four Area ----->
    <!--==================================================-->
    <div class="counter_area white bg_fixed pt-80 pb-70" style="background-image:url(assets/images/cn-bg.jpg)">
        <div class="container">
            <div class="row">
                <!-- Start Section Tile -->
                <div class="col-lg-12">
                    <div class="section_title text_center white mb-50 mt-3">
                        <div class="section_main_title">
                            <h1>Company Profile</h1>
                        </div>
                        <div class="em_bar">
                            <div class="em_bar_bg"></div>
                        </div>

                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="single_counter text_center mb-4">
                        <div class="countr_text">
                            <h1>
                                <span class="counter">
                                    {{$homePage->counters['clients']}}
                                </span>
                            </h1>
                        </div>
                        <div class="counter_desc">
                            <h5>Happy Clients</h5>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="single_counter text_center mb-4">
                        <div class="countr_text">
                            <h1><span class="counter">   {{$homePage->counters['tax_prepared']}}</span></h1>
                        </div>
                        <div class="counter_desc">
                            <h5>Tax Prepared</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="single_counter text_center mb-4">
                        <div class="countr_text">
                            <h1><span class="counter">  {{$homePage->counters['staff_members']}}</span></h1>
                        </div>
                        <div class="counter_desc">
                            <h5>Staff Members</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="single_counter text_center mb-4">
                        <div class="countr_text">
                            <h1><span class="counter">   {{$homePage->counters['years_in_business']}}</span></h1>
                        </div>
                        <div class="counter_desc">
                            <h5>Years In Business</h5>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--==================================================-->
    <!----- End eTaxPlanner Counter Four Area ----->
    <!--==================================================-->





    <!--==================================================-->
    <!----- Start eTaxPlanner  Feature New Style ----->
    <!--==================================================-->
    <div class="feature_area pt-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title text_center mb-55">
                        <div class="section_main_title">
                            <h1>Useful Information</h1>
                        </div>
                        <div class="em_bar">
                            <div class="em_bar_bg"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($homePage->info as $information)

                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="feature_style_eight mb-30 wow flipInY" data-wow-delay="0ms"
                             data-wow-duration="1500ms">
                            <div class="feature_style_eight_content">
                                <div class="feature_style_eight_icon">
                                    <i class="fa fa-{{$information['icon']}}"></i>
                                    <div class="anim-icon">
                                        <span class="icon icon-1"></span>
                                        <span class="icon icon-2"></span>
                                        <span class="icon icon-3"></span>
                                    </div>
                                </div>
                                <div class="feature_style_eight_title pt-4">
                                    <h4>
                                        <a href="{{$information['url']}}">{{$information['title']}}</a>
                                    </h4>
                                </div>
                                <div class="feature_style_eight_text pt-15">
                                    <p>{{$information['description']}}</p>
                                </div>
                                <div class="feature_style_eight_button pt-3">
                                    <div class="button style-four">
                                        <a href="{{$information['url']}}">Learn More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!--==================================================-->
    <!----- End eTaxPlanner  Feature New Style ----->
    <!--==================================================-->




    <x-brand></x-brand>
@endsection
