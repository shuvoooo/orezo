<!--==================================================-->
<!----- Start Techno Brand One Area ----->
<!--==================================================-->

<div class="brand_area pt-50 pb-70 bg_color2">
    <div class="container">
        <div class="row">
            <!-- Start Section Tile -->
            <div class="col-lg-12">
                <div class="section_title text_center mb-50 mt-3">
                    <div class="section_main_title">
                        <h1>Our Brands</h1>
                    </div>
                    <div class="em_bar">
                        <div class="em_bar_bg"></div>
                    </div>

                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <!--testimonial owl curousel -->
                    <div class="brand_list owl-carousel curosel-style">
                    @foreach($brands as $brand)
                        <!-- Single Brand -->
                            <div class="col-lg-12">
                                <div class="single_brand">
                                    <div class="single_brand_thumb">
                                        <img style="width:8rem;" src="{{storage_asset($brand->logo)}}" alt=""/>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--==================================================-->
<!----- End Techno Brand One Area ----->
<!--==================================================-->
