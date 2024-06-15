@extends('layout.landing')
@section('content')
    <!-- content begin -->
    <div id="content" class="no-padding">

        <!-- section begin -->
        <section id="section-about">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-3">
                        <img src="{{ asset('compact') }}/images/about/we-are-thumb.jpg" alt="about image" class="img-responsive">
                    </div>
                    <div class="col-md-5 col-sm-5">
                        <div class="about-box">
                            <h2 class="box-title">Vaksinasi</h2>
                            <div class="tiny-border"></div>
                            <p>Poliklinik vaksinasi melayani imunisasi pada masyarakat luas, baik secara individu maupun secara kolektif di perusahaan, adapun jenis vaksin yang kami layani adalah :</p>
                            <ul class="list-style-1">
                                <li>Vaksin Meningitis</li>
                                <li>Vaksin Influenza</li>
                                <li>Vaksin Hepatitis B</li>
                                <li>Vaksin HPV</li>
                            </ul>
                            <div class="divider-single"></div>
                            <a href="{{ route('landing.singlePage') }}" class="btn btn-primary btn-small">More</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="feature-box">
                            <h2 class="box-title">Layanan Kami</h2>
                            <div class="tiny-border"></div>
                            <div class="feature">
                                <i class="fa fa-bar-chart"></i>
                                <h3>Kunjungan Rumah</h3>
                                <p>Andi sibuk bekerja? jangan hawatir kami siap melayani anda di rumah anda</p>
                            </div>
                            <div class="feature">
                                <i class="fa fa-diamond"></i>
                                <h3>Layanan Perkantoran</h3>
                                <p>Kami menerima layanan vaksinasi di kantor anda dengan biaya layanan yang konpetitif</p>
                            </div>
                            <div class="feature no-margin-bottom">
                                <i class="fa fa-bullhorn"></i>
                                <h3>Poliklinik Vaksinasi</h3>
                                <p>Vaksinasi di rumah sakit dapat dilakukan di POliklinik Reguler dan di Poliklinik Eksekutif</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section close -->

        <!-- section begin -->
        <section id="section-project" class="no-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="latest-projects clearfix">
                            <div class="latest-projects-intro">
                                <h2 class="box-title">Latest Projects</h2>
                                <div class="tiny-border-light"></div>
                                <p>Pellentesque gravida diam orci, vitae venenatis est eleifend sed. Proin non pretium turpis</p>
                            </div>
                            <div class="latest-projects-wrapper">
                                <div id="latest-projects-items" class="latest-projects-items">
                                    <div class="item">
                                        <img src="{{ asset('compact') }}/images/projects/small-2.jpg" alt="" class="img-responsive">
                                        <div class="project-details">
                                            <p class="folio-title"><a href="#">Plan For Your Bussiness</a></p>
                                            <p class="folio-cate"><i class="fa fa-tag"></i><a href="#">Finance</a>, <a href="#">Marketing</a></p>
                                            <div class="folio-buttons">
                                                <a href="{{ asset('compact') }}/images/projects/medium-1.jpg" title="Plan For Your Bussiness" class="folio"><i class="fa fa-search"></i></a>
                                                <a href="#"><i class="fa fa-link"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <img src="{{ asset('compact') }}/images/projects/small-3.jpg" alt="" class="img-responsive">
                                        <div class="project-details">
                                            <p class="folio-title"><a href="#">Business Growth Solutions</a></p>
                                            <p class="folio-cate"><i class="fa fa-tag"></i><a href="#">Finance</a>, <a href="#">Marketing</a></p>
                                            <div class="folio-buttons">
                                                <a href="{{ asset('compact') }}/images/projects/medium-2.jpg" title="Business Growth Solutions" class="folio"><i class="fa fa-search"></i></a>
                                                <a href="#"><i class="fa fa-link"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <img src="{{ asset('compact') }}/images/projects/small-4.jpg" alt="" class="img-responsive">
                                        <div class="project-details">
                                            <p class="folio-title"><a href="#">Enterprise Development</a></p>
                                            <p class="folio-cate"><i class="fa fa-tag"></i><a href="#">Finance</a>, <a href="#">Marketing</a></p>
                                            <div class="folio-buttons">
                                                <a href="{{ asset('compact') }}/images/projects/medium-3.jpg" title="Enterprise Development" class="folio"><i class="fa fa-search"></i></a>
                                                <a href="#"><i class="fa fa-link"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <img src="{{ asset('compact') }}/images/projects/small-1.jpg" alt="" class="img-responsive">
                                        <div class="project-details">
                                            <p class="folio-title"><a href="#">Successful Business</a></p>
                                            <p class="folio-cate"><i class="fa fa-tag"></i><a href="#">Finance</a>, <a href="#">Marketing</a></p>
                                            <div class="folio-buttons">
                                                <a href="{{ asset('compact') }}/images/projects/medium-4.jpg" title="Successful Business" class="folio"><i class="fa fa-search"></i></a>
                                                <a href="#"><i class="fa fa-link"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <img src="{{ asset('compact') }}/images/projects/small-5.jpg" alt="" class="img-responsive">
                                        <div class="project-details">
                                            <p class="folio-title"><a href="#">Marketing Strategy</a></p>
                                            <p class="folio-cate"><i class="fa fa-tag"></i><a href="#">Finance</a>, <a href="#">Marketing</a></p>
                                            <div class="folio-buttons">
                                                <a href="{{ asset('compact') }}/images/projects/medium-5.jpg" title="Marketing Strategy" class="folio"><i class="fa fa-search"></i></a>
                                                <a href="#"><i class="fa fa-link"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <img src="{{ asset('compact') }}/images/projects/small-6.jpg" alt="" class="img-responsive">
                                        <div class="project-details">
                                            <p class="folio-title"><a href="#">Effective Recruitment</a></p>
                                            <p class="folio-cate"><i class="fa fa-tag"></i><a href="#">Finance</a>, <a href="#">Marketing</a></p>
                                            <div class="folio-buttons">
                                                <a href="{{ asset('compact') }}/images/projects/medium-6.jpg" title="Effective Recruitment" class="folio"><i class="fa fa-search"></i></a>
                                                <a href="#"><i class="fa fa-link"></i></a>
                                            </div>
                                        </div>
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
        <section id="section-news">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="latest-blog-posts">
                            <h2 class="box-title">Latest blog Posts</h2>
                            <div class="compact-buttons">
                                <div class="latest-prev compact-prev"><i class="fa fa-angle-left"></i></div>
                                <div class="latest-next compact-next"><i class="fa fa-angle-right"></i></div>
                            </div>
                            <div class="tiny-border"></div>
                            <div class="latest-news-items">
                                <div class="item">
                                    <div class="latest-blog-post-img">
                                        <img src="{{ asset('compact') }}/images/news/thumb/thumb-1.jpg" alt="image name">
                                        <div class="latest-blog-post-date">
                                            06 <span>May</span>
                                        </div>
                                    </div>
                                    <div class="latest-blog-post-details">
                                        <p class="title"><a href="#">Help your business to success</a></p>
                                        <p>Morbi vehicula a nibh in commodo. Aliquam quis dolor eget lectus pulvinar eu rhoncus ligula. Ut leo mauris, molestie imperdiet consequat in, varius ac sapien.</p>
                                        <div class="latest-blog-post-data">
                                            <span class="tags"><i class="fa fa-tags"></i> <a href="#">Development,</a> <a href="#">Maketing</a></span>
                                            <span class="btn-read"><a href="#"><i class="fa fa-plus-square"></i> Read more</a></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="latest-blog-post-img">
                                        <img src="{{ asset('compact') }}/images/news/thumb/thumb-2.jpg" alt="image name">
                                        <div class="latest-blog-post-date">
                                            02 <span>May</span>
                                        </div>
                                    </div>
                                    <div class="latest-blog-post-details">
                                        <p class="title"><a href="#">Manage for collective creativity</a></p>
                                        <p>Morbi vehicula a nibh in commodo. Aliquam quis dolor eget lectus pulvinar eu rhoncus ligula. Ut leo mauris, molestie imperdiet consequat in, varius ac sapien.</p>
                                        <div class="latest-blog-post-data">
                                            <span class="tags"><i class="fa fa-tags"></i> <a href="#">Development,</a> <a href="#">Maketing</a></span>
                                            <span class="btn-read"><a href="#"><i class="fa fa-plus-square"></i> Read more</a></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="latest-blog-post-img">
                                        <img src="{{ asset('compact') }}/images/news/thumb/thumb-3.jpg" alt="image name">
                                        <div class="latest-blog-post-date">
                                            22 <span>Mar</span>
                                        </div>
                                    </div>
                                    <div class="latest-blog-post-details">
                                        <p class="title"><a href="#">Why Designers Need Marketing Skills</a></p>
                                        <p>Morbi vehicula a nibh in commodo. Aliquam quis dolor eget lectus pulvinar eu rhoncus ligula. Ut leo mauris, molestie imperdiet consequat in, varius ac sapien.</p>
                                        <div class="latest-blog-post-data">
                                            <span class="tags"><i class="fa fa-tags"></i> <a href="#">Development,</a> <a href="#">Maketing</a></span>
                                            <span class="btn-read"><a href="#"><i class="fa fa-plus-square"></i> Read more</a></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="latest-blog-post-img">
                                        <img src="{{ asset('compact') }}/images/news/thumb/thumb-4.jpg" alt="image name">
                                        <div class="latest-blog-post-date">
                                            18 <span>Mar</span>
                                        </div>
                                    </div>
                                    <div class="latest-blog-post-details">
                                        <p class="title"><a href="#">10 Ways To Design For The Human Brain</a></p>
                                        <p>Morbi vehicula a nibh in commodo. Aliquam quis dolor eget lectus pulvinar eu rhoncus ligula. Ut leo mauris, molestie imperdiet consequat in, varius ac sapien.</p>
                                        <div class="latest-blog-post-data">
                                            <span class="tags"><i class="fa fa-tags"></i> <a href="#">Development,</a> <a href="#">Maketing</a></span>
                                            <span class="btn-read"><a href="#"><i class="fa fa-plus-square"></i> Read more</a></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="latest-blog-post-img">
                                        <img src="{{ asset('compact') }}/images/news/thumb/thumb-5.jpg" alt="image name">
                                        <div class="latest-blog-post-date">
                                            08 <span>Feb</span>
                                        </div>
                                    </div>
                                    <div class="latest-blog-post-details">
                                        <p class="title"><a href="#">UX Design Trends For 2016</a></p>
                                        <p>Morbi vehicula a nibh in commodo. Aliquam quis dolor eget lectus pulvinar eu rhoncus ligula. Ut leo mauris, molestie imperdiet consequat in, varius ac sapien.</p>
                                        <div class="latest-blog-post-data">
                                            <span class="tags"><i class="fa fa-tags"></i> <a href="#">Development,</a> <a href="#">Maketing</a></span>
                                            <span class="btn-read"><a href="#"><i class="fa fa-plus-square"></i> Read more</a></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="latest-blog-post-img">
                                        <img src="{{ asset('compact') }}/images/news/thumb/thumb-6.jpg" alt="image name">
                                        <div class="latest-blog-post-date">
                                            06 <span>Feb</span>
                                        </div>
                                    </div>
                                    <div class="latest-blog-post-details">
                                        <p class="title"><a href="#">Mobile UX And User Expectations</a></p>
                                        <p>Morbi vehicula a nibh in commodo. Aliquam quis dolor eget lectus pulvinar eu rhoncus ligula. Ut leo mauris, molestie imperdiet consequat in, varius ac sapien.</p>
                                        <div class="latest-blog-post-data">
                                            <span class="tags"><i class="fa fa-tags"></i> <a href="#">Development,</a> <a href="#">Maketing</a></span>
                                            <span class="btn-read"><a href="#"><i class="fa fa-plus-square"></i> Read more</a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="testimonials-slider-wrapper">
                            <h2 class="box-title">Testimonials</h2>
                            <div class="compact-buttons">
                                <div class="testi-prev compact-prev"><i class="fa fa-angle-left"></i></div>
                                <div class="testi-next compact-next"><i class="fa fa-angle-right"></i></div>
                            </div>
                            <div class="tiny-border"></div>
                            <div class="testimonials-slider">
                                <div class="item">
                                    <div class="testi-boxes">
                                        <blockquote>
                                            Morbi auctor vel mauris facilisis lacinia. Aenean suscipit lorem leo, et hendrerit odio fermentum et. Donec ac dolor eros. Mauris arcu nunc, iaculis sit amet lacus iaculis, faucibus faucibus nunc. Vestibulum sit amet lacinia massa
                                        </blockquote>
                                        <div class="testi-info clearfix">
                                            <img alt="" src="{{ asset('compact') }}/images/testimonial/thumb-1.png" class="img-circle">
                                            <div class="testi-details">
                                                <span>Cheryl Cruz</span>
                                                Maketing Manager
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="testi-boxes">
                                        <blockquote>
                                            Morbi auctor vel mauris facilisis lacinia. Aenean suscipit lorem leo, et hendrerit odio fermentum et. Donec ac dolor eros. Mauris arcu nunc, iaculis sit amet lacus iaculis, faucibus faucibus nunc. Vestibulum sit amet lacinia massa
                                        </blockquote>
                                        <div class=" testi-info clearfix">
                                            <img alt="" src="{{ asset('compact') }}/images/testimonial/thumb-2.png" class="img-circle">
                                            <div class="testi-details">
                                                <span>John Walker</span>
                                                Developent
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="testi-boxes">
                                        <blockquote>
                                            Morbi auctor vel mauris facilisis lacinia. Aenean suscipit lorem leo, et hendrerit odio fermentum et. Donec ac dolor eros. Mauris arcu nunc, iaculis sit amet lacus iaculis, faucibus faucibus nunc. Vestibulum sit amet lacinia massa
                                        </blockquote>
                                        <div class="testi-info clearfix">
                                            <img alt="" src="{{ asset('compact') }}/images/testimonial/thumb-3.png" class="img-circle">
                                            <div class="testi-details">
                                                <span>Frank Furius</span>
                                                Art Director
                                            </div>
                                        </div>
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
                            <span>Kami telah memberikan pelayanan vaksin kepada <b>10.000+</b> pelanggan dengan berbagai macam jeis vaksin, baik secara individu maupun koleksif di kantor, hubungi kami segera untuk mendapatkan pelayanan vaksin di kantor anda </span>
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
