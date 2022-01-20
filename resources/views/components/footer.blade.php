<!--==================================================-->
<!----- Start eTaxPlanner Footer Middle Area ----->
<!--==================================================-->
<div class="footer-middle pt-95" style="background-image:url({{asset('assets/images/call-bg.png')}})">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="widget widgets-company-info">
                    <div class="footer-bottom-logo pb-40">
                        <div class="d-flex">
                            <img src="{{asset('assets/images/logo/etaxplanner_logo.png')}}" class="mr-4" width="40"
                                 alt=""/>
                            <div class="brand h3 font-weight-normal text-light">E Tax Planner</div>
                        </div>
                    </div>
                    <div class="company-info-desc">
                        <p>
                            {{general_config('footer_text')}}
                        </p>
                    </div>
                    <div class="follow-company-info pt-3">
                        <div class="follow-company-text mr-3">
                            <a href="#"><p>Follow Us</p></a>
                        </div>
                        <div class="follow-company-icon">
                            <a href="{{general_config('facebook_link')}}"><i class="fa fa-facebook"></i></a>
                            <a href="{{general_config('twitter_link')}}"><i class="fa fa-twitter"></i></a>
                            <a href="{{general_config('linkedin_link')}}"><i class="fa fa-linkedin"></i></a>
                            <a href="{{general_config('instagram_link')}}"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="widget widget-nav-menu">
                    <h4 class="widget-title pb-4">Our Services</h4>
                    <div class="menu-quick-link-container ml-4">
                        <ul id="menu-quick-link" class="menu">
                            @foreach($services as $service)
                                <li><a href="{{$service->url}}">{{$service->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="widget widgets-company-info">
                    <h3 class="widget-title pb-4">Company Address</h3>
                    {{--                    <div class="company-info-desc">--}}
                    {{--                        <p>--}}
                    {{--                            {{general_config('company_address')}}--}}
                    {{--                        </p>--}}
                    {{--                    </div>--}}
                    <div class="footer-social-info">
                        <p><span>Address :</span>{{general_config('company_address')}}</p>
                    </div>
                    <div class="footer-social-info">
                        <p><span>Phone : </span> {{general_config('contact_phone')}}</p>
                    </div>
                    <div class="footer-social-info">
                        <p><span>Email : </span> {{general_config('contact_email')}}</p>
                    </div>

                </div>
            </div>


        </div>


        <div class="row footer-bottom mt-70 pt-3 pb-1">
            <div class="col-lg-6 col-md-6">
                <div class="footer-bottom-content">
                    <div class="footer-bottom-content-copy">
                        <p>{{general_config('copyright_text')}} </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="footer-bottom-right">
                    <div class="footer-bottom-right-text">
                        <a class="absod" href="{{route('page','privacy-policy')}}">Privacy Policy </a>
                        <a class="absod" href="{{route('page','RSDP')}}">Refund Policy </a>
                        <a href="{{route('page','terms-and-conditions')}}"> Terms & Conditions</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--==================================================-->
<!----- End eTaxPlanner Footer Middle Area ----->
<!--==================================================-->
