@extends('layout.admin')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-info">
                            @include('layout.menu.admin.submenu.master')
                        </div>
                        @if(\Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                                {!! \Session::get('success') !!}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if(\Session::has('danger'))
                            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                                {!! \Session::get('danger') !!}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="table-responsive">
                                    <table class="table table-sm mt-2">
                                        <thead>
                                        <th>#</th>
                                        <th>Code</th>
                                        <th>Display</th>
                                        <th>Organisasi</th>
                                        <th>Action</th>
                                        </thead>
                                        <tbody>
                                        @foreach($roles as $data)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $data->role['code'] }}</td>
                                                <td>{{ $data->role['display'] }}</td>
                                                <td>{{ $data->organisasi['name'] }}</td>
                                                <td>

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
            </div>
            <!-- /.container-fluid -->
    </section>
@endsection
