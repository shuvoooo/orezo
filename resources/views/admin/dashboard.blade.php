@extends('layouts.admin-base')

@section('title', 'Dashboard')

@section('content')

    <div class="row">
        <div class="col">
            <h4 class="font-weight-light text-info">Welcome back! {{ Auth::user()->name }}</h4>
            <hr/>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-6">
            <div class="techno_flipbox mb-30">
                <div class="techno_flipbox_font">
                    <div class="techno_flipbox_inner">
                        <div class="techno_flipbox_icon">
                            <div class="icon">
                                <i class="flaticon-padlock"></i>
                            </div>
                        </div>
                        <div class="flipbox_title">
                            <h3 class="text-dark">Personal Information</h3>
                        </div>
                        <div class="flipbox_desc">
                            <p class="text-dark">Porem asum molor sit amet, consectetur adipiscing do miusmod
                                tempor.</p>
                        </div>
                    </div>
                </div>

                <div class="techno_flipbox_back "
                     style="background-image:url('{{asset('assets/images/feature1.jpg')}}');">
                    <div class="techno_flipbox_inner">
                        <div class="flipbox_title">
                            <h3>Personal Information</h3>
                        </div>
                        <div class="flipbox_desc">
                            <p>Porem asum molor sit amet, consectetur adipiscing do miusmod tempor.</p>
                        </div>
                        <div class="flipbox_button">
                            <a href="">Goto Link<i
                                    class="fa fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-6">
            <div class="techno_flipbox mb-30">
                <div class="techno_flipbox_font">
                    <div class="techno_flipbox_inner">
                        <div class="techno_flipbox_icon">
                            <div class="icon">
                                <i class="flaticon-padlock"></i>
                            </div>
                        </div>
                        <div class="flipbox_title">
                            <h3 class="text-dark">Personal Information</h3>
                        </div>
                        <div class="flipbox_desc">
                            <p class="text-dark">Porem asum molor sit amet, consectetur adipiscing do miusmod
                                tempor.</p>
                        </div>
                    </div>
                </div>

                <div class="techno_flipbox_back "
                     style="background-image:url('{{asset('assets/images/feature1.jpg')}}');">
                    <div class="techno_flipbox_inner">
                        <div class="flipbox_title">
                            <h3>Personal Information</h3>
                        </div>
                        <div class="flipbox_desc">
                            <p>Porem asum molor sit amet, consectetur adipiscing do miusmod tempor.</p>
                        </div>
                        <div class="flipbox_button">
                            <a href="{{('personal_information')}}">Goto Link<i
                                    class="fa fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-6">
            <div class="techno_flipbox mb-30">
                <div class="techno_flipbox_font">
                    <div class="techno_flipbox_inner">
                        <div class="techno_flipbox_icon">
                            <div class="icon">
                                <i class="flaticon-padlock"></i>
                            </div>
                        </div>
                        <div class="flipbox_title">
                            <h3 class="text-dark">Personal Information</h3>
                        </div>
                        <div class="flipbox_desc">
                            <p class="text-dark">Porem asum molor sit amet, consectetur adipiscing do miusmod
                                tempor.</p>
                        </div>
                    </div>
                </div>

                <div class="techno_flipbox_back "
                     style="background-image:url('{{asset('assets/images/feature1.jpg')}}');">
                    <div class="techno_flipbox_inner">
                        <div class="flipbox_title">
                            <h3>Personal Information</h3>
                        </div>
                        <div class="flipbox_desc">
                            <p>Porem asum molor sit amet, consectetur adipiscing do miusmod tempor.</p>
                        </div>
                        <div class="flipbox_button">
                            <a href="{{('personal_information')}}">Goto Link<i
                                    class="fa fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-6">
            <div class="techno_flipbox mb-30">
                <div class="techno_flipbox_font">
                    <div class="techno_flipbox_inner">
                        <div class="techno_flipbox_icon">
                            <div class="icon">
                                <i class="flaticon-padlock"></i>
                            </div>
                        </div>
                        <div class="flipbox_title">
                            <h3 class="text-dark">Personal Information</h3>
                        </div>
                        <div class="flipbox_desc">
                            <p class="text-dark">Porem asum molor sit amet, consectetur adipiscing do miusmod
                                tempor.</p>
                        </div>
                    </div>
                </div>

                <div class="techno_flipbox_back "
                     style="background-image:url('{{asset('assets/images/feature1.jpg')}}');">
                    <div class="techno_flipbox_inner">
                        <div class="flipbox_title">
                            <h3>Personal Information</h3>
                        </div>
                        <div class="flipbox_desc">
                            <p>Porem asum molor sit amet, consectetur adipiscing do miusmod tempor.</p>
                        </div>
                        <div class="flipbox_button">
                            <a href="{{('personal_information')}}">Goto Link<i
                                    class="fa fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-6">
            <div class="techno_flipbox mb-30">
                <div class="techno_flipbox_font">
                    <div class="techno_flipbox_inner">
                        <div class="techno_flipbox_icon">
                            <div class="icon">
                                <i class="flaticon-padlock"></i>
                            </div>
                        </div>
                        <div class="flipbox_title">
                            <h3 class="text-dark">Personal Information</h3>
                        </div>
                        <div class="flipbox_desc">
                            <p class="text-dark">Porem asum molor sit amet, consectetur adipiscing do miusmod
                                tempor.</p>
                        </div>
                    </div>
                </div>

                <div class="techno_flipbox_back "
                     style="background-image:url('{{asset('assets/images/feature1.jpg')}}');">
                    <div class="techno_flipbox_inner">
                        <div class="flipbox_title">
                            <h3>Personal Information</h3>
                        </div>
                        <div class="flipbox_desc">
                            <p>Porem asum molor sit amet, consectetur adipiscing do miusmod tempor.</p>
                        </div>
                        <div class="flipbox_button">
                            <a href="{{('personal_information')}}">Goto Link<i
                                    class="fa fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-6">
            <div class="techno_flipbox mb-30">
                <div class="techno_flipbox_font">
                    <div class="techno_flipbox_inner">
                        <div class="techno_flipbox_icon">
                            <div class="icon">
                                <i class="flaticon-padlock"></i>
                            </div>
                        </div>
                        <div class="flipbox_title">
                            <h3 class="text-dark">Personal Information</h3>
                        </div>
                        <div class="flipbox_desc">
                            <p class="text-dark">Porem asum molor sit amet, consectetur adipiscing do miusmod
                                tempor.</p>
                        </div>
                    </div>
                </div>

                <div class="techno_flipbox_back "
                     style="background-image:url('{{asset('assets/images/feature1.jpg')}}');">
                    <div class="techno_flipbox_inner">
                        <div class="flipbox_title">
                            <h3>Personal Information</h3>
                        </div>
                        <div class="flipbox_desc">
                            <p>Porem asum molor sit amet, consectetur adipiscing do miusmod tempor.</p>
                        </div>
                        <div class="flipbox_button">
                            <a href="{{('personal_information')}}">Goto Link<i
                                    class="fa fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
