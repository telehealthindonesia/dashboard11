
@extends('layout.admin')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @elseif(session('danger'))
                        <div class="alert alert-danger">
                            {{ session('danger') }}
                        </div>
                    @endif
                    <div class="card mb-5">
                        <div class="card-header bg-black"><b>Pengkajian Luka</b></div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <b>Time</b>
                                        </div>
                                        <div class="col-md-4">
                                            <b>{{ date('Y-m-d H:i',$wound_assesment->time ) }}</b>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <b>Jenis</b>
                                        </div>
                                        <div class="col-md-4">
                                            <b>{{ $wound_assesment->wound['jenis_luka'] }}</b>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <b>Lokasi</b>
                                        </div>
                                        <div class="col-md-4">
                                            <b>{{ $wound_assesment->wound['lokasi_luka'] }}</b>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <b>Grade</b>
                                        </div>
                                        <div class="col-md-4">
                                            <b>{{ $wound_assesment->grade }}</b>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <b>Dimensi</b>
                                        </div>
                                        <div class="col-md-4">
                                            <b>{{ $wound_assesment->panjang }} x {{ $wound_assesment->lebar }} x {{ $wound_assesment->kedalaman }}</b>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <b>Warna</b>
                                        </div>
                                        <div class="col-md-4">
                                            <b>{{ $wound_assesment->warna }}</b>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <b>Infeksi</b>
                                        </div>
                                        <div class="col-md-4">
                                            <b>{{ $wound_assesment->infeksi }}</b>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <b>Exudate</b>
                                        </div>
                                        <div class="col-md-4">
                                            <b>{{ $wound_assesment->jenis_exudate }}</b>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <b>Petugas</b>
                                        </div>
                                        <div class="col-md-4">
                                            <b>{{ $wound_assesment->petugas_assesment_luka->nama['nama_depan'] }} {{ $wound_assesment->petugas_assesment_luka->nama['nama_belakang'] }}</b>
                                        </div>

                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <img src="{{ $wound_assesment->foto }}" class="w-75">

                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <a href="{{ route('wound.show', ['id'=>$wound_assesment->wound['id']]) }}" class="btn btn-sm btn-danger">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection
