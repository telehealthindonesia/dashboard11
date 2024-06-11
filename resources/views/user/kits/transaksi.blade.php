@extends('layout.user')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">

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
                            <div class="row justify-content-between">
                                <div class="col-md-3">
                                    {{ $keyword }}
                                </div>
                                <div class="col-md-3">
                                    <form action="" method="get">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search...." name="keyword" value="{{ $keyword }}">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit">Search</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <table class="table table-sm mt-2">
                                <thead>
                                <th>#</th>
                                <th>Waktu</th>
                                <th>Pasien</th>
                                <th>Pemeriksaan</th>
                                <th>Hasil</th>
                                <th>Detail</th>
                                </thead>
                                <tbody>
                                @foreach($observations as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ date('d-m-Y H:i', $data->time) }}</td>
                                    <td>{{ $data->pasien['nama']['nama_depan'] }} {{ $data->pasien['nama']['nama_belakang'] }}</td>
                                    <td>
                                        {{ $data->coding['display'] }}
                                    </td>
                                    <td>{{ $data->value }} {{ $data->unit['display'] }}</td>
                                    <td><a href="" class="btn btn-sm btn-info">Detail</a></td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $observations->links() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
            <!-- /.container-fluid -->
    </section>
@endsection
