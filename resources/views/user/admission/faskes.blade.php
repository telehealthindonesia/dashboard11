@extends('layout.user')
@section('content')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary">Pasien Baru</a>
                <a href="{{ route('users.find') }}" class="btn btn-sm btn-success">Pasien Lama</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-sm table-striped" id="example1">
                            <thead>
                            <th>#</th>
                            <th>Date</th>
                            <th>Nama</th>
                            <th>Tujuan</th>
                            <th>Jaminan</th>
                            <th>Aksi</th>
                            </thead>
                            <tbody>
                            @foreach($admissions as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->date }}</td>
                                    <td>
                                        @php
                                        $user = \App\Models\User::find($data->id_pasien);
                                        @endphp
                                        {{ $user->nama['nama_depan'].' '.$user->nama['nama_belakang'] }}
                                    </td>
                                    <td>{{ $data->id_service }}</td>
                                    <td>{{ $data->id_jaminan }}</td>
                                    <td></td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
