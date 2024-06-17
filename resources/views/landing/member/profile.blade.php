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
                <div class="col-md-6">
                    <table class="table">
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td>{{ $user->nama['nama_depan'] }} {{ $user->nama['nama_belakang'] }}</td>
                        </tr>
                        <tr>
                            <td>NIK</td>
                            <td>:</td>
                            <td>{{ $user->nik }}</td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td>:</td>
                            <td>{{ $user->gender }}</td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir</td>
                            <td>:</td>
                            <td>{{ $user->lahir['tempat'] }}, {{ $user->lahir['tanggal'] }}</td>
                        </tr>
                        <tr>
                            <td>Nomor Passport</td>
                            <td>:</td>
                            <td>
                                {{ $user->passport }}
                            </td>
                        </tr>
                    </table>

                </div>

            </div>

        </div>
    </section>

@endsection
