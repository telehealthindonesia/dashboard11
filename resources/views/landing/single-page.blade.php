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
                            <h2 class="box-title">Pendaftaran Vaksinasi</h2>

                            @if(\Illuminate\Support\Facades\Auth::id() !=null)
                                @include('landing.booking.member')
                                @else
                                @include('landing.booking.guest')
                            @endif


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
                                    <h2 class="box-title">Products</h2>
                                    <div class="tiny-border"></div>
                                </div>
                                <div id="related-projects" class="latest-projects-items">
                                    @for($i=1; $i<7; $i++)
                                    <div class="item">
                                        <img src="{{ asset('compact') }}/images/projects/small-1.jpg" alt="" class="img-responsive">
                                        <div class="project-details">
                                            <p class="folio-title"><a href="#">Plan For Your Bussiness</a></p>
                                            <div class="folio-buttons">
                                                <a href="#"><i class="fa fa-link"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    @endfor
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
