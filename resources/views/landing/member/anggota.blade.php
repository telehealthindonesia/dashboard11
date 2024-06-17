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
            <div class="row">
                <table class="table">
                    <thead>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>Gender</th>
                    <th>Tanggal Lahir</th>
                    </thead>
                    <tbody>
                    @foreach($family as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->nama['nama_depan'] }} {{ $data->nama['nama_belakang'] }}</td>
                        <td>{{ $data->nik }}</td>
                        <td>{{ $data->gender }}</td>
                        <td>{{ $data->lahir['tanggal'] }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </section>

@endsection
