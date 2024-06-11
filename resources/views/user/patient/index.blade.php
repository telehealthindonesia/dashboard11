@extends('layout.user')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-info">

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
                            <div class="row justify-content-between">
                                <div class="col-md-3 text-end">
                                    <form class="form-inline  text-end" method="get">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search name ..." name="keyword" @if(isset($_GET['keyword'])) value="{{ $_GET['keyword'] }}" @endif>
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit">Search</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>

                            </div>
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table table-sm mt-2">
                                        <thead>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Gender</th>
                                        <th>Tanggal Lahir</th>
                                        <th>NIK</th>
                                        <th>Detail</th>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $data)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $data->nama['nama_depan'] }} {{ $data->nama['nama_belakang'] }}</td>
                                                <td>{{ $data->gender }}</td>
                                                <td>
                                                    @if($data->lahir !=null)
                                                        {{ $data->lahir['tanggal'] }}
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ (int) $data->nik }}
                                                </td>
                                                <td><a href="{{ route('patient.observation.show', ['user_id'=>$data->_id]) }}" class="btn btn-sm btn-info">Detail</a></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>


                            <hr>
                            {{ $users->links() }}

                        </div>

                    </div>

                </div>
            </div>
        </div>
            <!-- /.container-fluid -->
    </section>
@endsection
