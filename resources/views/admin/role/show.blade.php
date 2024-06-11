@extends('layout.admin')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if(\Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                            {!! \Session::get('success') !!}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if(\Session::has('danger'))
                        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                            {!! \Session::get('danger') !!}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header bg-info">
                            @include('layout.menu.admin.submenu.master')
                        </div>

                        <div class="card-body">
                            <div class="row mb-2">
                                <a href="{{ route('role.index') }}" class="btn btn-danger mr-1">Back</a>
                                <a href="{{ route('role.create', ['id'=>$role_code->id]) }}" class="btn btn-primary mr-1">Set New Role</a>
                            </div>



                            <div class="table-responsive">
                                <table class="table table-sm mt-2">
                                    <thead>
                                    <th>#</th>
                                    <th>Role</th>
                                    <th>Nama</th>
                                    <th>Organisasi</th>
                                    <th>HP</th>
                                    <th>Action</th>
                                    </thead>
                                    <tbody>
                                    @foreach($roles as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->role['display'] }}</td>
                                            <td>{{ $data->user['nama']['nama_depan'] }} {{ $data->user['nama']['nama_belakang'] }}</td>
                                            <td>{{ $data->organisasi['name'] }}</td>
                                            <td>{{ $data->user['kontak']['nomor_telepon'] }}</td>
                                            <td>
                                                <a href="" class="btn btn-info btn-sm">Detail</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
    </section>
@endsection
