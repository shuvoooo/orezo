@extends('layouts.base')


@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="border rounded-lg shadow-sm p-4">
                    <h4 class="font-weight-light border-bottom mb-4 pb-3">About Me</h4>
                    <div class="d-flex flex-column align-items-center my-4">
                        <div>
                            <div class="avatar avatar-xl">
                                <img src="//placehold.it/300x300.jpg" alt="..." style="height: 6rem; width: 6rem;"
                                     class="avatar-img rounded-circle">
                            </div>
                        </div>
                        <div>
                            <h5 class="font-weight-bold mb-0">{{auth()->user()->name}}</h5>
                        </div>
                    </div>
                    <div class="">
                        <div class="d-flex align-items-center">
                            <i class="fa fa-phone mr-1"></i>
                            <span>{{auth()->user()->address->mobile??'N/A'}}</span>
                        </div>

                        <div class="d-flex align-items-center">
                            <i class="fa fa-envelope mr-1"></i>
                            <span>{{auth()->user()->email}}</span>
                        </div>
                    </div>

                    <div class="mt-4">
                        <a href="{{route_with_year('user_profile_view')}}" type="button" class="btn btn-primary btn-sm">
                            Change Password
                        </a>

                        <a href="{{route_with_year('user_profile_view')}}" type="button" class="btn btn-light btn-sm">
                            Edit Profile
                        </a>
                    </div>

                </div>
            </div>

            <div class="col-md-8">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section_title text_center mb-55">
                            <div class="section_main_title">
                                <h1>Year Dashboard</h1>
                            </div>
                            <div class="em_bar">
                                <div class="em_bar_bg"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach(range(date('Y')+1, 2020) as $year)
                        <div class="col-md-4">
                            <div class="techno_flipbox mb-30">
                                <div class="techno_flipbox_font">
                                    <div class="techno_flipbox_inner">
                                        <div class="techno_flipbox_icon">
                                            <div class="icon">
                                                <i class="flaticon-global-1"></i>
                                            </div>
                                        </div>
                                        <div class="">
                                            <h5 class="">TAX YEAR {{$year}}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="techno_flipbox_back">
                                    <div class="techno_flipbox_inner">
                                        <div class="flipbox_title">
                                            <h3>TAX YEAR {{$year}}</h3>
                                        </div>
                                        <div class="flipbox_desc">
                                            {{--                                            <p>Whether bringing new amazing products and services to market</p>--}}
                                            <a href="{{route_with_year('dashboard', ['year'=>$year])}}"
                                               class="btn btn-light">Click Here to Proceed</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <x-brand></x-brand>
@endsection
