@extends('layout.user')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <b>Nama</b>
                                        </div>
                                        <div class="col-md-4">
                                            {{ $user->nama['nama_depan'] }}  {{ $user->nama['nama_belakang'] }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <b>Gender</b>
                                        </div>
                                        <div class="col-md-4">
                                            {{ $user->gender }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <b>Tanggal Lahir</b>
                                        </div>
                                        <div class="col-md-4">
                                            @if($user->lahir != null)
                                            {{ $user->lahir['tanggal'] }}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <b>NIK</b>
                                        </div>
                                        <div class="col-md-4">
                                            {{ $user->nik }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <b>Email</b>
                                        </div>
                                        <div class="col-md-4">
                                            @if($user->kontak != null)
                                                {{ $user->kontak['email'] }}
                                            @endif

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <b>Suku</b>
                                        </div>
                                        <div class="col-md-4">
                                            {{ $user->suku }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card mb-5">
                        <div class="card-header">
                            <b>Riwayat Pemeriksaan</b>
                        </div>
                        <div class="card-body">
                            <table class="table table-sm mt-2" id="example1">
                                <thead>
                                <th>#</th>
                                <th>Waktu</th>
                                <th>Pemeriksaan</th>
                                <th>Hasil</th>
                                <th>Satuan</th>
                                <th>Detail</th>
                                </thead>
                                <tbody>
                                @foreach($observation as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ date('Y-m-d H:i', $data->time) }}</td>
                                    <td>{{ $data->coding['display'] }}</td>
                                    <td>{{ round($data->value,2) }} </td>
                                    <td>{{ $data->unit['display'] }}</td>
                                    <td><a href="{{ route('patient.observation.detail',['observation_id'=>$data->_id]) }}" class="btn btn-sm btn-info">Detail</a></td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('patient.index') }}" class="btn btn-danger">Back</a>
                        </div>

                    </div>

                </div>
            </div>
            <!-- /.container-fluid -->
    </section>
@endsection
