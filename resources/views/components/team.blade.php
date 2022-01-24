<!--==================================================-->
<!----- Start eTaxPlanner Team Three Area ----->
<!--==================================================-->
<div class="team_area bg_color2 pt-80 pb-70">
    <div class="container">
        <div class="row">
            <!-- Start Section Tile -->
            <div class="col-lg-12">
                <div class="section_title text_center mb-50 mt-3">

                    <div class="section_sub_title uppercase mb-3">
                        <h6>Our Team Member</h6>
                    </div>
                    <div class="section_main_title">
                        <h1>Meet with Our Team</h1>
                    </div>
                    <div class="em_bar">
                        <div class="em_bar_bg"></div>
                    </div>

                </div>

            </div>
        </div>
        <div class="row">

            @foreach($teams as $team)
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="team_style_two mb-4">
                        <div class="team_style_two_thumb">
                            <img style="aspect-ratio:1/1;" src="{{storage_asset($team->image)}}" alt=""/>
                        </div>
                        <div class="team_style_two_content">
                            <div class="team_style_two_title pb-2">
                                <h5>{{$team->name}}</h5>
                                <span>{{$team->designation}}</span>
                            </div>
                            <div class="team_style_two_icon">

                                @if($team->social_link['email']??false)
                                    <a href="mailto:{{$team->social_link['email']??''}}"><i class="fa fa-envelope"></i></a>
                                @endif

                                @if($team->social_link['phone']??false)
                                    <a href="tel:{{$team->social_link['phone']??''}}"><i class="fa fa-phone"></i></a>
                                @endif

                                @if($team->social_link['google_chat']??false)
                                    <a href="{{$team->social_link['google_chat']??'#'}}"><i
                                            class="fa fa-meetup"></i></a>
                                @endif

                                @if($team->social_link['whatsapp']??false)
                                    <a href="whatsapp://send?abid={{$team->social_link['whatsapp']??''}}"><i
                                            class="fa fa-whatsapp"></i></a>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!--==================================================-->
<!----- End eTaxPlanner Team Three Area ----->
<!--==================================================-->
