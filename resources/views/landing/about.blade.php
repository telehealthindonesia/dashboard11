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
                            <h3>RSPON Mahar Mardjono</h3>
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
                        <h5>Zona Integritas</h5>
                        <p class="text-justify">Sejak dicanangkannya zona Integritas pada tahun 2018, RSPON Mahar Mardjono terus memperbaiki kualitas pelayanan publik dan mewujidkan wilayah bebas dari korupsi. tahun 2021 kami berhasil mendapatkan predikat Wilayah Bebas dari Korupsi tingkat Kementerian Kesehatan, predikat ini memotivasi kami agar terus berupaya memberikan pelayana yang terbaik  </p>
                    </div>
                    <div class="col-md-4">
                        <h5>Akreditasi Rumah Sakit</h5>
                        <p class="text-justify">Sebagai bentuk komitmen kami dalam memberikan pelayanan yang terbaik, RSPON Mahar Mardjono Jakarta telah diakreditasi oleh lembaga akreditasi Rumah Sakit dengan predikat PARIPURNA, hasil akreditasi ini memotivasi kami untuk terus berupaya dalam peningkatan mutu pelayanan kepada masyarakat.</p>
                    </div>
                    <div class="col-md-4">
                        <h5>Wistle Blowing System</h5>
                        <p class="text-justify">Kami membutuhkan partisipasi masyarakat luas mengenai temuan-temuan benturan kepentingan yang ada di lingkungan RSPON Mahar Mardjono Jakarta, anda dapat berpartisipasi sebagai whistle Blower pada tautan berikut</p>
                        <a href="https://wbs.kemkes.go.id/" class="btn btn-info btn-sm" target="_blank">WBS</a>
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
                                <img src="{{ asset('compact') }}/images/team/thumb-3.png" alt="" class="img-circle">
                                <div class="mask"></div>
                                <ul class="team-social-list">
                                    <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                            <h6>Reza Aditya Arpandy</h6>
                            <div class="subtext">Direktur Medik dan Keperawatan</div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="team-box">
                            <div class="team-inner">
                                <img src="{{ asset('compact') }}/images/team/diryan.png" alt="" class="img-circle">
                                <div class="mask"></div>
                                <ul class="team-social-list">
                                    <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                            <h6>Andi Basuki Prima Birawa</h6>
                            <div class="subtext">Direktur SDM & DIKLIT</div>
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
                            <h6>Ignatius Susatyo Wijoyo</h6>
                            <div class="subtext">Direktur Perencanaan dan Keuangan</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="team-box">
                            <div class="team-inner">
                                <img src="{{ asset('compact') }}/images/team/kabidmedik.png" alt="" class="img-circle">
                                <div class="mask"></div>
                                <ul class="team-social-list">
                                    <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                            <h6> Sardiana Salam</h6>
                            <div class="subtext">Direktur Layanan Operasional</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section close -->


    </div>
    <!-- content close -->
@endsection
