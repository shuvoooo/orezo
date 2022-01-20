<!--==================================================-->
<!----- Start eTaxPlanner Testimonial Area ----->
<!--==================================================-->
<div id="testimonial-section" class="testimonial-bg pt-80 pb-70">
    <div id="container-general" class="ready anim-section-features anim-section-desc anim-section-quote">
        <section id="section-quote">
            <div class="col-lg-12">
                <div class="section_title text_center mt-3">
                    <div class="section_sub_title uppercase mb-3">
                        <h6>TESTIMONIAL</h6>
                    </div>
                    <div class="section_main_title">
                        <h1>Our Happy <span>Clients Says</span></h1>
                    </div>
                    <div class="em_bar">
                        <div class="em_bar_bg"></div>
                    </div>
                </div>
            </div>

            <!--Left Bubble Images-->
            <div class="container-pe-quote left">
                <div class="pp-quote li-quote-1" data-textquote="quote-text-1">
                    <div class="img animated bounce"></div>
                </div>
                <div class="pp-quote li-quote-2" data-textquote="quote-text-2">
                    <div class="img animated bounce"></div>
                </div>
                <div class="pp-quote li-quote-3" data-textquote="quote-text-3">
                    <div class="img animated bounce"></div>
                </div>
                <div class="pp-quote li-quote-4 active" data-textquote="quote-text-4">
                    <div class="img animated bounce"></div>
                </div>
                <div class="pp-quote li-quote-5" data-textquote="quote-text-5">
                    <div class="img animated bounce"></div>
                </div>
                <div class="pp-quote li-quote-6" data-textquote="quote-text-6">
                    <div class="img animated bounce"></div>
                </div>
            </div>
            <!--Left Bubble Images-->


            <!--Center Testimonials-->
            <div class="container-quote carousel-on">
                @foreach($testimonials as $testimonial)
                    <div class="quote quote-text-{{$loop->index + 1}} {{$loop->index == 0? 'show':'hide-bottom'}}"
                         data-ppquote="li-quote-3">
                        <p>'{{$testimonial->description}}'</p>
                        <div class="container-info">
                            <div class="pp"></div>
                            <div class="name">{{$testimonial->name}}</div>
                            <div class="job">{{$testimonial->designation}}</div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!--Right Bubble Images-->
            <div class="container-pe-quote right">
                <div class="pp-quote li-quote-7" data-textquote="quote-text-7">
                    <div class="img animated bounce"></div>
                </div>
                <div class="pp-quote li-quote-8" data-textquote="quote-text-8">
                    <div class="img animated bounce"></div>
                </div>
                <div class="pp-quote li-quote-9" data-textquote="quote-text-9">
                    <div class="img animated bounce"></div>
                </div>
                <div class="pp-quote li-quote-10" data-textquote="quote-text-10">
                    <div class="img animated bounce"></div>
                </div>
                <div class="pp-quote li-quote-11" data-textquote="quote-text-11">
                    <div class="img animated bounce"></div>
                </div>
                <div class="pp-quote li-quote-13" data-textquote="quote-text-13">
                    <div class="img animated bounce"></div>
                </div>
            </div>
        </section>
    </div>
</div>
<!--==================================================-->
<!----- End eTaxPlanner Testimonial Area ----->
<!--==================================================-->
