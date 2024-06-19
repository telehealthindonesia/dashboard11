@extends('layout.landing')
@section('content')
    <!-- content begin -->
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Pertanyaan Yang Sering Diungkapkan</h4>
                    <div class="spacing-20"></div>
                </div>
                <div class="col-md-12">
                    <div class="accordion">
                        @foreach($faq as $data)
                        <div class="accordion_in">
                            <div class="acc_head"><i class="fa fa-area-chart"></i> {{ $data->pertanyaan }}</div>
                            <div class="acc_content">
                                <p>{{ $data->jawaban }}</p>
                            </div>
                        </div>

                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content close -->
@endsection
