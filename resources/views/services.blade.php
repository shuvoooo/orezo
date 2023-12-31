@extends('layouts.base')

@section('title', 'Service')


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
                            <h2>Our Service</h2>
                        </div>
                        <div class="breatcome_content">
                            <ul>
                                <li><a href="{{route('home')}}">Home</a> <i class="fa fa-angle-right"></i> <a href="#">
                                        Pages</a> <i class="fa fa-angle-right"></i> <span>Our Service</span></li>
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
    <x-service></x-service>


    <x-call-to-do></x-call-to-do>


    <x-team></x-team>

    <x-testimonial></x-testimonial>

    <x-brand></x-brand>
@endsection
