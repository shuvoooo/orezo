@extends('layouts.admin-base')


@section('content')
    <div class="row">
        <div class="col">
            <h4 class="font-weight-light text-info">Welcome back! {{ Auth::user()->name }}</h4>
            <hr/>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-6">

            <div class="etaxplanner_flipbox mb-30">
                <div class="etaxplanner_flipbox_font">
                    <div class="etaxplanner_flipbox_inner">
                        <div class="etaxplanner_flipbox_icon">
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

                <div class="etaxplanner_flipbox_back "
                     style="background-image:url('{{asset('assets/images/feature1.jpg')}}');">
                    <div class="etaxplanner_flipbox_inner">
                        <div class="flipbox_title">
                            <h3>Personal Information</h3>
                        </div>
                        <div class="flipbox_desc">
                            <p>Porem asum molor sit amet, consectetur adipiscing do miusmod tempor.</p>
                        </div>
                        <div class="flipbox_button">
                            <a href="{{route_with_year('personal_information')}}">Goto Link<i
                                    class="fa fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-6">
            <div class="etaxplanner_flipbox mb-30">
                <div class="etaxplanner_flipbox_font">
                    <div class="etaxplanner_flipbox_inner">
                        <div class="etaxplanner_flipbox_icon">
                            <div class="icon">
                                <i class="flaticon-intelligent"></i>
                            </div>
                        </div>
                        <div class="flipbox_title">
                            <h3 class="text-dark">Tax Information</h3>
                        </div>
                        <div class="flipbox_desc text-dark">
                            <p class="text-dark">Porem asum molor sit amet, consectetur adipiscing do miusmod
                                tempor.</p>
                        </div>
                    </div>
                </div>
                <div class="etaxplanner_flipbox_back "
                     style="background-image:url('{{asset('assets/images/feature2.jpg')}}');">
                    <div class="etaxplanner_flipbox_inner">
                        <div class="flipbox_title">
                            <h3>Tax Information</h3>
                        </div>
                        <div class="flipbox_desc">
                            <p>Porem asum molor sit amet, consectetur adipiscing do miusmod tempor.</p>
                        </div>
                        <div class="flipbox_button">
                            <a href="{{route_with_year('employer_details')}}">Goto Link<i
                                    class="fa fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-6">
            <div class="etaxplanner_flipbox mb-30">
                <div class="etaxplanner_flipbox_font">
                    <div class="etaxplanner_flipbox_inner">
                        <div class="etaxplanner_flipbox_icon">
                            <div class="icon">
                                <i class="flaticon-code"></i>
                            </div>
                        </div>
                        <div class="flipbox_title">
                            <h3 class="text-dark">Upload Tax Documents</h3>
                        </div>
                        <div class="flipbox_desc">
                            <p class="text-dark">Porem asum molor sit amet, consectetur adipiscing do miusmod
                                tempor.</p>
                        </div>
                    </div>
                </div>
                <div class="etaxplanner_flipbox_back "
                     style="background-image:url('{{asset('assets/images/feature3.jpg')}}');">
                    <div class="etaxplanner_flipbox_inner">
                        <div class="flipbox_title">
                            <h3>Online Marketing</h3>
                        </div>
                        <div class="flipbox_desc">
                            <p>Porem asum molor sit amet, consectetur adipiscing do miusmod tempor.</p>
                        </div>
                        <div class="flipbox_button">
                            <a href="{{route_with_year('upload_tax_documents')}}">Goto Link<i
                                    class="fa fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-6">
            <div class="etaxplanner_flipbox mb-30">
                <div class="etaxplanner_flipbox_font">
                    <div class="etaxplanner_flipbox_inner">
                        <div class="etaxplanner_flipbox_icon">
                            <div class="icon">
                                <i class="flaticon-content-writing"></i>
                            </div>
                        </div>
                        <div class="flipbox_title">
                            <h3 class="text-dark">Download Tax Documents</h3>
                        </div>
                        <div class="flipbox_desc">
                            <p class="text-dark">Porem asum molor sit amet, consectetur adipiscing do miusmod
                                tempor.</p>
                        </div>
                    </div>
                </div>
                <div class="etaxplanner_flipbox_back "
                     style="background-image:url('{{asset('assets/images/feature3.jpg')}}');">
                    <div class="etaxplanner_flipbox_inner">
                        <div class="flipbox_title">
                            <h3>Download Tax Documents</h3>
                        </div>
                        <div class="flipbox_desc">
                            <p>Porem asum molor sit amet, consectetur adipiscing do miusmod tempor.</p>
                        </div>
                        <div class="flipbox_button">
                            <a href="">Goto Link<i class="fa fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-6">
            <div class="etaxplanner_flipbox mb-30">
                <div class="etaxplanner_flipbox_font">
                    <div class="etaxplanner_flipbox_inner">
                        <div class="etaxplanner_flipbox_icon">
                            <div class="icon">
                                <i class="flaticon-bar-chart"></i>
                            </div>
                        </div>
                        <div class="flipbox_title">
                            <h3 class="text-dark">My File Status</h3>
                        </div>
                        <div class="flipbox_desc">
                            <p class="text-dark">Porem asum molor sit amet, consectetur adipiscing do miusmod
                                tempor.</p>
                        </div>
                    </div>
                </div>
                <div class="etaxplanner_flipbox_back "
                     style="background-image:url('{{asset('assets/images/feature1.jpg')}}');">
                    <div class="etaxplanner_flipbox_inner">
                        <div class="flipbox_title">
                            <h3>My File Status</h3>
                        </div>
                        <div class="flipbox_desc">
                            <p>Porem asum molor sit amet, consectetur adipiscing do miusmod tempor.</p>
                        </div>
                        <div class="flipbox_button">
                            <a href="{{route_with_year('my_file_status')}}">Goto Link<i
                                    class="fa fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-6">
            <div class="etaxplanner_flipbox mb-30">
                <div class="etaxplanner_flipbox_font">
                    <div class="etaxplanner_flipbox_inner">
                        <div class="etaxplanner_flipbox_icon">
                            <div class="icon">
                                <i class="flaticon-business-and-finance"></i>
                            </div>
                        </div>
                        <div class="flipbox_title">
                            <h3 class="text-dark">View Tax Summary</h3>
                        </div>
                        <div class="flipbox_desc">
                            <p class="text-dark">Porem asum molor sit amet, consectetur adipiscing do miusmod
                                tempor.</p>
                        </div>
                    </div>
                </div>
                <div class="etaxplanner_flipbox_back "
                     style="background-image:url('{{asset('assets/images/feature2.jpg')}}');">
                    <div class="etaxplanner_flipbox_inner">
                        <div class="flipbox_title">
                            <h3>View Tax Summary</h3>
                        </div>
                        <div class="flipbox_desc">
                            <p>Porem asum molor sit amet, consectetur adipiscing do miusmod tempor.</p>
                        </div>
                        <div class="flipbox_button">
                            <a href="{{route_with_year('view_tax_summary')}}">Goto Link<i
                                    class="fa fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
