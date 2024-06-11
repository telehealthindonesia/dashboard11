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
                            <div class="row">
                                <a href="?status=pending" class="btn btn-sm btn-success mr-1">Waiting</a>
                                <a href="?status=skip" class="btn btn-sm btn-danger mr-1">Skip</a>
                                <a href="?status=In Progress" class="btn btn-sm btn-info mr-1">In Progress</a>
                                <a href="?status=complete" class="btn btn-sm btn-primary mr-1">Complete</a>
                            </div>
                            <div class="row">
                                <table class="table table-sm mt-2">
                                    <thead>
                                    <th>#</th>
                                    <th>Kits</th>
                                    <th>Pasien</th>
                                    <th>Waktu</th>
                                    <th>Status</th>
                                    <th>Detail</th>
                                    </thead>
                                    <tbody>
                                    @foreach($timeline as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->station }}</td>
                                            <td>
                                                {{ $data->pasien['nama']['nama_depan'] }} {{ $data->pasien['nama']['nama_belakang'] }} <br>
                                                {{ $data->pasien['tanggal_lahir'] }}
                                            </td>
                                            <td>{{ date('d-m-Y H:i', $data->time) }}</td>
                                            <td>{{ $data->status }}</td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#staticBackdrop{{$data->id}}">
                                                    Show
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="staticBackdrop{{$data->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-dark">
                                                                <h5 class="modal-title" id="staticBackdropLabel">Job Order</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="{{ route('timeline.ordered', ['id'=>$data->id]) }}" method="post">
                                                                <div class="modal-body">
                                                                    @csrf
                                                                    <div class="row">
                                                                        <label class="col-md-4">Nama</label>
                                                                        <div class="col-md-8">
                                                                            {{ $data->pasien['nama']['nama_depan'] }} {{ $data->pasien['nama']['nama_belakang'] }}
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <label class="col-md-4">Tanggal Lahir</label>
                                                                        <div class="col-md-8">
                                                                            {{ $data->pasien['tanggal_lahir'] }}
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <label class="col-md-4">Order Time</label>
                                                                        <div class="col-md-8">
                                                                            {{ date('Y-m-d H:i', $data->time) }}
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <label class="col-md-4">Kit Code</label>
                                                                        <div class="col-md-8">
                                                                            {{ $data->station }}
                                                                        </div>
                                                                    </div>
                                                                    @if($data->status == "pending")
                                                                        <div class="row">
                                                                            <label class="col-md-4">Aksi</label>
                                                                            <div class="col-md-8">
                                                                                <input type="radio" name="aksi" value="terima"> Periksa
                                                                                <input type="radio" name="aksi" value="skip"> Skip
                                                                                <input type="radio" name="aksi" value="cancel"> Tolak
                                                                            </div>
                                                                        </div>
                                                                    @elseif($data->status == "complete")
                                                                        <div class="row">
                                                                            <label class="col-md-4">Status</label>
                                                                            <div class="col-md-8">
                                                                                {{ $data->status }}
                                                                            </div>
                                                                        </div>
                                                                    @endif

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    @if($data->status == "pending")
                                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                                    @endif
                                                                </div>

                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
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
