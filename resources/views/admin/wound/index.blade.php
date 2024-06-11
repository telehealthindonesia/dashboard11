
@extends('layout.admin')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-5">
                        <div class="card-header bg-black"><b>Daftar User</b></div>
                        <div class="card-body">
                            <table class="table table-sm mt-2">
                                <thead>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Gender</th>
                                <th>Kontak</th>
                                <th>NIK</th>
                                <th>Aksi</th>
                                </thead>
                                <tbody>
                                @php
                                $no = $users->firstItem()
                                @endphp

                                @foreach($users as $user)
                                    <tr class="@if($user->active == false) bg-warning @endif">
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $user->nama['nama_depan']." ".$user->nama['nama_belakang'] }}</td>
                                        <td>{{ $user->gender }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ (int)$user->nik }}</td>
                                        <td>
                                            <a href="{{ route('wound.user', ['id' => $user->id]) }}" class="btn btn-sm btn-info">Detail</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $users->onEachSide(3)->links() }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
    </section>
@endsection
