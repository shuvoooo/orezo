<!--==================================================-->
<!----- Start eTaxPlanner Flipbox Area ----->
<!--==================================================-->
<div class="flipbox_area pages pt-85 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section_title text_center mb-55">
                    <div class="section_sub_title uppercase mb-3">
                        <h6>SERVICES</h6>
                    </div>
                    <div class="section_main_title">
                        <h1>Provide Exclusive Services</h1>
                    </div>
                    <div class="em_bar">
                        <div class="em_bar_bg"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            @foreach($services as $service)
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-6">
                    <div class="etaxplanner_flipbox mb-30">
                        <div class="etaxplanner_flipbox_font">
                            <div class="etaxplanner_flipbox_inner">
                                <div class="etaxplanner_flipbox_icon">
                                    <div class="icon">
                                        <i class="fa fa-{{$service->icon}}"></i>
                                    </div>
                                </div>
                                <div class="flipbox_title">
                                    <h3>{{$service->name}}</h3>
                                </div>
                                <div class="flipbox_desc">
                                    {{\Illuminate\Support\Str::limit(strip_tags($service->description), 100, $end='...')}}
                                </div>
                            </div>
                        </div>
                        <div class="etaxplanner_flipbox_back "
                             style="background-image:url({{asset($service->image?\Storage::url($service->image):'assets/images/feature1.jpg')}});">
                            <div class="etaxplanner_flipbox_inner">
                                <div class="flipbox_title">
                                    <h3>{{$service->name}}</h3>
                                </div>
                                <div class="flipbox_desc">
                                    {{\Illuminate\Support\Str::limit(strip_tags($service->description), 100, $end='...')}}
                                </div>
                                <div class="flipbox_button">
                                    @if(filter_var($service->url, FILTER_VALIDATE_URL) === FALSE)
                                        <a href="{{route('service-page', $service->url)}}">Read More<i
                                                class="fa fa-angle-double-right"></i></a>
                                    @else
                                        <a href="{{$service->url}}">Read More<i
                                                class="fa fa-angle-double-right"></i></a>
                                    @endif
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
<!----- End eTaxPlanner Flipbox Area ----->
<!--==================================================-->
