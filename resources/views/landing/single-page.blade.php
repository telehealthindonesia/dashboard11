@extends('layout.landing')
@section('content')
    <!-- content begin -->
    <div id="content" class="no-padding">


        <!-- section begin -->
        <section id="section-project" class="no-padding-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="project-slider">
                            <div class="item"><img alt="" src="{{ asset('compact') }}/images/projects/slides/project-slider-1.jpg"></div>
                            <div class="item"><img alt="" src="{{ asset('compact') }}/images/projects/slides/project-slider-2.jpg"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="project-info">
                            <h2 class="box-title">Poliklinik Vaksinasi</h2>
                            <p>Wonec molestie felis tincidunt urna ornare, eget commodo mauris gravida. Fusce in dui vitae est maximus malesuada vel sit amet leo. Mauris tincidunt lacus porta, lacinia nibh a, finibus libero. In porta ac nisl quis mattis. Morbi purus magna, tristique sed egestas in, ultrices ac odio. Maecenas vitae vehicula enim. Sed quis ante quis eros maximus dignissim a eu mi. Proin varius arcu metus</p>
                            <ul class="project-list">
                                <li><strong>Client:</strong> Envato</li>
                                <li><strong>Skills:</strong> PSD Template, HTML5/CSS3, WordPress Theme</li>
                                <li><strong>Date:</strong> 12/01/2016</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Related Project begin -->
        <section id="section-related-project" class="no-padding-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="latest-projects-2 clearfix">
                            <div class="latest-projects-wrapper">
                                <div class="text-center">
                                    <h2 class="box-title">Related Projects</h2>
                                    <div class="tiny-border"></div>
                                </div>
                                <div id="related-projects" class="latest-projects-items">
                                    <div class="item">
                                        <img src="{{ asset('compact') }}/images/projects/small-1.jpg" alt="" class="img-responsive">
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
                                        <img src="{{ asset('compact') }}/images/projects/small-2.jpg" alt="" class="img-responsive">
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
                                        <img src="{{ asset('compact') }}/images/projects/small-3.jpg" alt="" class="img-responsive">
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
                                        <img src="{{ asset('compact') }}/images/projects/small-4.jpg" alt="" class="img-responsive">
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
        <!-- Related Project close -->

    </div>
    <!-- content close -->
@endsection
