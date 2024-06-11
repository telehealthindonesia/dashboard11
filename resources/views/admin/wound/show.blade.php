
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
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <b>Nama</b>
                                        </div>
                                        <div class="col-md-8">
                                            <b>{{ $wound->pasien->nama['nama_depan'] }} {{ $wound->pasien->nama['nama_belakang'] }}</b>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <b>NRM</b>
                                        </div>
                                        <div class="col-md-8">
                                            <b>{{ $wound->pasien->_id }}</b>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <b>Waktu Pengkajian Awal</b>
                                        </div>
                                        <div class="col-md-8">
                                            <b>{{ date('Y-m-d H:i', $wound->time) }}</b>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <b>Lama Perawatan Luka</b>
                                        </div>
                                        <div class="col-md-8">
                                            <b>{{ round((time()-$wound->time)/(60*60),2) }} Jam</b>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <b>Lokasi Luka</b>
                                        </div>
                                        <div class="col-md-8">
                                            <b>{{ $wound->lokasi_luka }}</b>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <b>Jenis Luka</b>
                                        </div>
                                        <div class="col-md-8">
                                            <b>{{ $wound->jenis_luka }}</b>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <a href="{{ route('wound.user', ['id'=>$wound->pasien->_id]) }}" class="btn btn-danger mt-1 mb-2  mr-1">Back</a>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary mt-1 mb-2 mr-1" data-toggle="modal" data-target="#monitoringLuka">
                                    Monitoring Luka
                                </button>
                                <button type="button" class="btn btn-success mt-1 mb-2 mr-1" data-toggle="modal" data-target="#perawatanLuka">
                                    Perawatan Luka
                                </button>
                                <!-- Modal Monitoring Luka-->
                                <div class="modal fade" id="monitoringLuka" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header bg-dark">
                                                <h5 class="modal-title" id="staticBackdropLabel">Monitoring Luka</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('wound.assessment.store') }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-3 mt-2">
                                                            <div class="label">Waktu Pemeriksaan</div>
                                                        </div>
                                                        <div class="col-md-3 mt-2">
                                                            <input type="datetime-local" class="form-control" name="time">
                                                        </div>
                                                        <div class="col-md-3 mt-2">
                                                            <div class="label">Grade</div>
                                                        </div>
                                                        <div class="col-md-3 mt-2">
                                                            <input type="hidden" name="wound_id" value="{{ $wound->id }}">
                                                            <select class="form-control" name="grade" required>
                                                                <option value="">---pilih---</option>
                                                                @for($x=1; $x<=4; $x++)
                                                                    <option value="{{ $x }}">Grade {{ $x }}</option>
                                                                @endfor

                                                            </select>
                                                        </div>
                                                        <div class="col-md-3 mt-2">
                                                            <div class="label">Dimensi Luka (PxLxT) cm</div>
                                                        </div>
                                                        <div class="col-md-1 mt-2">
                                                            <input type="number" class="form-control" placeholder="panjang" name="panjang" required>
                                                        </div>
                                                        <div class="col-md-1 mt-2">
                                                            <input type="number" class="form-control" placeholder="lebar" name="lebar" required>
                                                        </div>
                                                        <div class="col-md-1 mt-2">
                                                            <input type="number" class="form-control" placeholder="dalam" name="kedalaman" required>
                                                        </div>
                                                        <div class="col-md-3 mt-2">
                                                            <div class="label">Warna Luka</div>
                                                        </div>
                                                        <div class="col-md-3 mt-2">
                                                            <select class="form-control" name="warna" required>
                                                                <option value="">---pilih---</option>
                                                                <option value="Kehitaman">Kehitaman</option>
                                                                <option value="Kuning">Kuning</option>
                                                                <option value="Merah">Merah</option>
                                                                <option value="Pink">Pink</option>
                                                                <option value="Kehijauan">Kehijauan</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-3 mt-2">
                                                            <div class="label">Infeksi Luka</div>
                                                        </div>
                                                        <div class="col-md-3 mt-2">
                                                            <select class="form-control" name="infeksi" required>
                                                                <option value="">---pilih---</option>
                                                                <option value="Luka Bersih">Luka Bersih</option>
                                                                <option value="Luka Bersih Terkontaminasi">Luka Bersih Terkontaminasi</option>
                                                                <option value="Luka Terkontaminasi">Luka Terkontaminasi</option>
                                                                <option value="Infeksi">Infeksi</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-3 mt-2">
                                                            <div class="label">Jenis Exudate</div>
                                                        </div>
                                                        <div class="col-md-3 mt-2">
                                                            <select class="form-control" name="jenis_exudate">
                                                                <option>---pilih---</option>
                                                                <option>Tidak Ada</option>
                                                                <option>Serous</option>
                                                                <option>Hemoserous</option>
                                                                <option>Sanguenous</option>
                                                                <option>Purulent</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-3 mt-2">
                                                            <div class="label">Foto</div>
                                                        </div>
                                                        <div class="col-md-3 mt-2">
                                                            <input type="file" name="foto" class="form-control">
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
                                <!-- Modal Perawatan Luka-->
                                <div class="modal fade" id="perawatanLuka" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-success">
                                                <h5 class="modal-title" id="staticBackdropLabel">Perawatan Luka</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('wound.store') }}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="label">Waktu Perawatan</div>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="datetime-local" name="time" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="row mt-1">
                                                        <div class="col-md-4">
                                                            <div class="label">Jenis Drasing</div>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <select class="form-control" name="jenis">
                                                                <option>---pilih---</option>
                                                                <option>Perawatan Terbuka</option>
                                                                <option>Kassa Lembab</option>
                                                                <option>Modern Dressing</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-1">
                                                        <div class="col-md-4">
                                                            <div class="label">Jenis Drasing</div>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <select class="form-control" name="jenis">
                                                                <option>---pilih---</option>
                                                                <option>Tidak Menggunakan Dressing Luka</option>
                                                                <option>Kassa Lembab</option>
                                                                <option>Modern Dressing</option>
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
                            </div>

                            <div class="row">
                                <b>{{ $title }}</b>
                                <table class="table table-sm table-stiped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Time</th>
                                        <th>Grade</th>
                                        <th>Warna</th>
                                        <th>Dimensi</th>
                                        <th>Exudate</th>
                                        <th>Infeksi Luka</th>
                                        <th>Pengkaji</th>
                                        <th>Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($wound_assesments as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ date('Y-m-d H:i', $data->time) }}</td>
                                            <td>{{ $data->grade }}</td>
                                            <td>{{ $data->warna }}</td>
                                            <td>{{ $data->panjang }} x {{ $data->lebar }} x {{ $data->kedalaman }}</td>
                                            <td>{{ $data->jenis_exudate }}</td>
                                            <td>{{ $data->infeksi }}</td>

                                            <td>
                                                {{ $data->petugas_assesment_luka->nama['nama_depan'] }} {{ $data->petugas_assesment_luka->nama['nama_belakang'] }}
                                            </td>
                                            <td><a href="{{ route('wound.assessment.show', ['id'=>$data->id]) }}" class="btn btn-sm btn-info">Detail</a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                                {{ $wound_assesments->links() }}
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
