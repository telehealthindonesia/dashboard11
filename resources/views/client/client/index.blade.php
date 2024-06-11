@extends('layout.client')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-black"><b>{{ $title }}</b></div>

                        <div class="card-body">
                            <table class="table table-sm mt-2" id="example1">
                                <thead>
                                <th>#</th>
                                <th>Project</th>
                                <th>Redirect</th>
                                <th>Client Id</th>
                                <th>Status</th>
                                <th>Time</th>
                                <th>Aksi</th>
                                </thead>
                                <tbody>
                                @foreach($oauth_clients as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->name}}</td>
                                        <td>{{ $data->redirect}}</td>
                                        <td>{{ $data->id}}</td>
                                        <td>
                                        @if($data->revoked == true)
                                                <span class="badge badge-danger">{{ "Blokir" }}</span>
                                        @else
                                                <span class="badge badge-success">{{ "Active" }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $data->created_at}}</td>
                                        <td>
                                            <a class="btn btn-sm btn-info" href="{{ route('oauth.client.show',['id'=>$data->id]) }}">Detail</a>
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>

                    </div>

                </div>
            </div>
            <!-- /.container-fluid -->
    </section>
@endsection
