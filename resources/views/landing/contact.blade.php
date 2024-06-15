@extends('layout.landing')
@section('content')
    <!-- content begin -->
    <div id="content" class="no-padding">

        <!-- section begin -->
        <section id="section-contact">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="intro-text text-center">
                            <h2>Contact Us</h2>
                            <p>Send us an email vulputate bibendum justo sed, tincidunt quisque <br> dictum eget dolor vel maximus.</p>
                        </div>
                        <form action="" class="wpcf7-form">
                            <div class="col-one-third">
                                <input type="text" placeholder="Your Name">
                            </div>
                            <div class="col-one-third margin-one-third">
                                <input type="email" placeholder="Your Email">
                            </div>
                            <div class="col-one-third">
                                <input type="number" placeholder="Your Phone">
                            </div>
                            <div class="col-full"><textarea placeholder="Your Message"></textarea></div>
                            <div class="clearfix"></div>
                            <div class="text-center">
                                <div class="divider-single"></div>
                                <button class="btn btn-primary btn-big">Send Email</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- section close -->

        <!-- section gmap begin -->
        <section id="section-gmap" class="no-padding">
            <div id="map-canvas" class="map-canvas"></div>
        </section>
        <!-- section gmap close -->

    </div>
    <!-- content close -->
@endsection
