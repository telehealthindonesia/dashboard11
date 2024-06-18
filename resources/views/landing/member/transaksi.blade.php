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
                    <th>Tanggal</th>
                    <th>Kode Booking</th>
                    <th>Pelayanan</th>
                    <th>Status</th>
                    </thead>
                    <tbody>
                    @foreach($transaksi as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </section>

@endsection
