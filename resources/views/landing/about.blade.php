@extends('layout.landing')
@section('content')
    <!-- content begin -->
    <div id="content" class="no-padding">

        <!-- section begin -->
        <section id="about-intro">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="about-text-intro text-center">
                            <h2>RSPON</h2>
                            <p>Bersatu Melayani Mulia</p>
                        </div>
                        <div class="box-intro-video">
                            <div id="overlay-video" class="overlay-video-intro">
                                <img alt="" src="{{ asset('compact') }}/images/wbk.jpg" class="img-responsive" />
                                <a href="https://www.youtube.com/embed/06BeBhTP-gM?autoplay=1" class="btn-intro-video"><i class="fa fa-play"></i></a>
                            </div>
                            <div id="thevideo" style="display:none">
                                <iframe id="someFrame" width="750" height="422" src="" frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section close -->

        <!-- section begin -->
        <section id="section-about" class="margin-top-80">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h5>We are Compact</h5>
                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed quis neque rutrum, dignissim libero vitae, ullamcorper diam. Donec eros massa, cursus eu risus nec, tempus aliquam odio. Proin lacinia urna ac ex euismod imperdiet.</p>
                    </div>
                    <div class="col-md-4">
                        <h5>What We Do?</h5>
                        <p>Sed dui nisi, feugiat ac dictum sed, feugiat vel sem. Ut elementum nisl sit amet metus fermentum, nec ultricies ipsum accumsan. Sed eget molestie lectus. Fusce egestas at lorem ac semper. Curabitur  vehicula vitae ipsum eu pulvinar. Cras egestas eros sed</p>
                    </div>
                    <div class="col-md-4">
                        <h5>Why Choose Us?</h5>
                        <p>Lectus volutpat, sed malesuada ligula blandit. Pellentesque consequat dui sit amet quam tincidunt dapibus. Etiam sapien magna, maximus eu sagittis nec, fringilla et ipsum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- section close -->

        <!-- section begin -->
        <section id="section-team" class="bg-grey">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center">
                            <h2>Direktur</h2>
                            <div class="tiny-border"></div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="team-box">
                            <div class="team-inner">
                                <img src="{{ asset('compact') }}/images/team/dirsdm.png" alt="" class="img-circle">
                                <div class="mask"></div>
                                <ul class="team-social-list">
                                    <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                            <h6>dr. Adin Nulhasanah, Sp.S, MARS</h6>
                            <div class="subtext">Direktur Utama</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="team-box">
                            <div class="team-inner">
                                <img src="{{ asset('compact') }}/images/team/thumb-2.png" alt="" class="img-circle">
                                <div class="mask"></div>
                                <ul class="team-social-list">
                                    <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                            <h6>Betty Lane</h6>
                            <div class="subtext">Marketing Manager</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="team-box">
                            <div class="team-inner">
                                <img src="{{ asset('compact') }}/images/team/thumb-3.png" alt="" class="img-circle">
                                <div class="mask"></div>
                                <ul class="team-social-list">
                                    <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                            <h6>Richard Pierce</h6>
                            <div class="subtext">Risk Analyst</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="team-box">
                            <div class="team-inner">
                                <img src="{{ asset('compact') }}/images/team/dirkeu.jpg" alt="" class="img-circle">
                                <div class="mask"></div>
                                <ul class="team-social-list">
                                    <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                            <h6>Janice Rose</h6>
                            <div class="subtext">Accountant</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section close -->

        <!-- section begin -->
        <section id="section-testimonial">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="testimonials-slider-wrapper">
                            <div class="text-center">
                                <h2>Testimonials</h2>
                                <div class="tiny-border"></div>
                            </div>

                            <div class="testimonials-slider-2 text-center">
                                <div class="item">
                                    <div class="testi-boxes">
                                        <div class="testi-info clearfix">
                                            <img alt="" src="{{ asset('compact') }}/images/testimonial/thumb-1.png" class="img-circle">
                                            <div class="testi-details">
                                                <span>Cheryl Cruz</span>
                                                Maketing Manager
                                            </div>
                                        </div>
                                        <blockquote>
                                            Morbi auctor vel mauris facilisis lacinia. Aenean suscipit lorem leo, et hendrerit odio fermentum et. Donec ac dolor eros. Mauris arcu nunc, iaculis sit amet lacus iaculis, faucibus faucibus nunc. Vestibulum sit amet lacinia massa
                                        </blockquote>

                                    </div>
                                </div>
                                <div class="item">
                                    <div class="testi-boxes">
                                        <div class=" testi-info clearfix">
                                            <img alt="" src="{{ asset('compact') }}/images/testimonial/thumb-2.png" class="img-circle">
                                            <div class="testi-details">
                                                <span>John Walker</span>
                                                Developent
                                            </div>
                                        </div>
                                        <blockquote>
                                            Morbi auctor vel mauris facilisis lacinia. Aenean suscipit lorem leo, et hendrerit odio fermentum et. Donec ac dolor eros. Mauris arcu nunc, iaculis sit amet lacus iaculis, faucibus faucibus nunc. Vestibulum sit amet lacinia massa
                                        </blockquote>

                                    </div>
                                </div>
                                <div class="item">
                                    <div class="testi-boxes">
                                        <div class="testi-info clearfix">
                                            <img alt="" src="{{ asset('compact') }}/images/testimonial/thumb-3.png" class="img-circle">
                                            <div class="testi-details">
                                                <span>Frank Furius</span>
                                                Art Director
                                            </div>
                                        </div>
                                        <blockquote>
                                            Morbi auctor vel mauris facilisis lacinia. Aenean suscipit lorem leo, et hendrerit odio fermentum et. Donec ac dolor eros. Mauris arcu nunc, iaculis sit amet lacus iaculis, faucibus faucibus nunc. Vestibulum sit amet lacinia massa
                                        </blockquote>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section close -->

        <!-- section begin -->
        <section id="section-cta">
            <div class="sep-background-mask"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="cal-to-action text-center">
                            <span>We’ve Completed More Than <b>100+</b> project for our amazing clients, If you interested?</span>
                            <a href="#" class="btn btn-border-light">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section close -->

    </div>
    <!-- content close -->
@endsection
