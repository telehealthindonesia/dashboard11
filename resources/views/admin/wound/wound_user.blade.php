
@extends('layout.admin')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @elseif(session('danger'))
                        <div class="alert alert-danger">
                            {{ session('danger') }}
                        </div>
                    @endif
                    <div class="card mb-5">
                        <div class="card-header bg-black"><b>Pengkajian Luka</b></div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <b>Nama</b>
                                        </div>
                                        <div class="col-md-8">
                                            <b>{{ $user->nama['nama_depan'] }}</b>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <b>NRM</b>
                                        </div>
                                        <div class="col-md-8">
                                            <b>{{ $user->_id }}</b>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary mt-1 mb-2" data-toggle="modal" data-target="#lokasiLuka">
                                Lokasi Luka
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="lokasiLuka" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-dark">
                                            <h5 class="modal-title" id="staticBackdropLabel">Tambah Lokasi Luka</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('wound.store') }}" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="row mt-1">
                                                    <div class="col-md-4">
                                                        <div class="label">Waktu Pengkajian</div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="datetime-local" name="time" class="form-control">

                                                    </div>
                                                </div>

                                                <div class="row mt-1">
                                                    <div class="col-md-4">
                                                        <div class="label">Jenis</div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <select class="form-control" name="jenis">
                                                            <option>---pilih---</option>
                                                            <option>Luka Tekan</option>
                                                            <option>Luka Trauma</option>
                                                            <option>Luka Insisi</option>
                                                            <option>Luka Bakar</option>
                                                            <option>Luka Luka Plebitis</option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mt-1">
                                                    <div class="col-md-4">
                                                        <div class="label">Lokasi</div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="hidden" name="id_pasien" value="{{ $user->_id }}">
                                                        <select class="form-control" name="lokasi">
                                                            <option>---pilih---</option>
                                                            <option>Sacrum</option>
                                                            <option>Telinga</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <table class="table table-sm table-stiped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Time</th>
                                        <th>Jenis Luka</th>
                                        <th>Lokasi</th>
                                        <th>Grade Awal</th>
                                        <th>Grade Ahir</th>
                                        <th>Tanggal Teratasi</th>
                                        <th>Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($wounds as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ date('Y-m-d H:i', $data->time) }}</td>
                                            <td>{{ $data->jenis_luka }}</td>
                                            <td>{{ $data->lokasi_luka }}</td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                @if($data->date_teratasi == null)
                                                    {{ "belum teratasi" }}
                                                @else
                                                    {{ $data->date_teratasi }}
                                                @endif
                                            </td>
                                            <td><a href="{{ route('wound.show', ['id'=>$data->id]) }}" class="btn btn-sm btn-info">Detail</a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>

                        </div>
                        <div class="card-footer">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection
