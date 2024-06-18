@extends('layout.landing')
@section('content')
    <section id="subheader" data-speed="8" data-type="background" class="padding-top-bottom subheader">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Member</h1>
                    <ul class="breadcrumbs">
                        <li><a href="{{ route('landing.home') }}">Home</a></li>
                        <b>/</b>
                        <li class="active">Member</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- section begin -->
    <section class="shortcodes section-elements">
        <div class="container">
            @include('landing.member.menu.menu')

            <button id="openModalBtn" class="btn btn-small btn-primary">Upload New File</button>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <b>Registrasi gagal {{ session('validasi') }}</b>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row margin-top-20">
                @foreach($files as $data)
                    <div class="col-md-2">
                        <img src="{{ $data->url }}" style="width: 100%"> <br>
                        <h6>{{ $data->nama_file }}</h6>
                    </div>
                @endforeach
                    <div id="openModal" class="modal mb-2">
                        <div class="modal-content">
                            <h5>New File</h5>
                            <form action="{{ route('file.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-1">
                                    <div class="col-md-4">
                                        <label>Nama File</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="nama_file" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-4">
                                        <label>Upload File</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="file" name="file" accept="image/*" required class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-12">
                                        <input type="checkbox" required name="agreement"> Dengan ini saya setuju mengunggah file untuk pelayanan di RSPON Mahar Mardjono
                                    </div>

                                </div>
                                <div class="row mb-1 margin-top-20">
                                    <div class="col-md-12">
                                        <button class="btn-small" type="submit">Save</button>
                                        <button class="closeBtn">Close</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                    <script src="{{ asset('assets/js/modal.js') }}"></script>

            </div>

        </div>
    </section>

@endsection
