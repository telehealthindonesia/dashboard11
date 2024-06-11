
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
                        <form action="{{ route('wound.store') }}" method="post">
                            @csrf
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
                                                <b>NIK</b>
                                            </div>
                                            <div class="col-md-8">
                                                <b>{{ $user->nik }}</b>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">


                                    <div class="col-md-3 mt-2">
                                        <div class="label">Grade</div>
                                    </div>
                                    <div class="col-md-3 mt-2">
                                        <select class="form-control" name="grade">
                                            <option>---pilih---</option>
                                            <option>Grade 1</option>
                                            <option>Grade 2</option>
                                            <option>Grade 3</option>
                                            <option>Grade 4</option>

                                        </select>
                                    </div>
                                    <div class="col-md-3 mt-2">
                                        <div class="label">Dimensi Luka (PxLxT) cm</div>
                                    </div>
                                    <div class="col-md-1 mt-2">
                                        <input type="number" class="form-control" placeholder="panjang" name="panjang">
                                    </div>
                                    <div class="col-md-1 mt-2">
                                        <input type="number" class="form-control" placeholder="lebar" name="lebar">
                                    </div>
                                    <div class="col-md-1 mt-2">
                                        <input type="number" class="form-control" placeholder="dalam" name="kedalaman">
                                    </div>
                                    <div class="col-md-3 mt-2">
                                        <div class="label">Warna Luka</div>
                                    </div>
                                    <div class="col-md-3 mt-2">
                                        <select class="form-control" name="warna">
                                            <option>---pilih---</option>
                                            <option>Kehitaman</option>
                                            <option>Kuning</option>
                                            <option>Merah</option>
                                            <option>Pink</option>
                                            <option>Kehijauan</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mt-2">
                                        <div class="label">Infeksi Luka</div>
                                    </div>
                                    <div class="col-md-3 mt-2">
                                        <select class="form-control" name="infeksi">
                                            <option>---pilih---</option>
                                            <option>Luka Bersih</option>
                                            <option>Luka Bersih Terkontaminasi</option>
                                            <option>Luka Terkontaminasi</option>
                                            <option>Infeksi</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mt-2">
                                        <div class="label">Jenis Exudate</div>
                                    </div>
                                    <div class="col-md-3 mt-2">
                                        <select class="form-control" name="exudate">
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
                            <div class="card-footer">
                                <a href="{{ route('wound.user', ['id'=>$user->_id]) }}" class="btn btn-sm btn-danger">Back</a>
                                <button type="submit" class="btn btn-sm btn-primary">Save</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection
