@extends('layout.landing')
@section('content')
    <section id="subheader" data-speed="8" data-type="background" class="padding-top-bottom subheader">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Our Product</h1>
                    <ul class="breadcrumbs">
                        <li><a href="{{ route('landing.home') }}">Home</a></li>
                        <b>/</b>
                        <li class="active">Product</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- content begin -->
    <div id="content" class="no-padding">

        <!-- section begin -->
        <section id="section-project">
            <div class="container">
                <div class="row">

                    <div id="projects-grid" class="projects-boxes">
                        @foreach($products as $data)
                        <div class="project-item col-md-4 col-sm-6 business">
                            <div class="project-item-inner">
                                <a href=""><img src="{{ $data->image }}" alt="" class="img-responsive"></a>
                                <h4>{{ $data->title }}</h4>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- section close -->
    </div>
    <!-- content close -->
@endsection
