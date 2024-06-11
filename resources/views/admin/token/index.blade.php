
@extends('layout.admin')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-5">
                        @include('layout.menu.admin.submenu.master')
                        <div class="card-body">
                            <table class="table table-sm mt-2" id="example1">
                                <thead>
                                <th>#</th>
                                <th>Nama</th>
                                <th>User ID</th>
                                <th>Last Hit</th>
                                <th>Long Time</th>
                                <th>Created At</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                @foreach($tokens as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->name  }}</td>
                                        <td>{{ $data->tokenable_id  }}</td>
                                        <td>{{ $data->updated_at }}</td>
                                        <td>{{ strtotime($data->updated_at) - strtotime($data->created_at) }}</td>
                                        <td>{{ $data->created_at }}</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-info">Detail</a>
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
    </section>
@endsection
