@extends('layout.user')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if(session('danger'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('danger') }}
                        </div>
                    @endif
                    @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="card">
                        <form action="{{ route('users.store') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header bg-success"><b>Identitas</b></div>

                                            <div class="card-body">
                                                <table class="table table-sm table-striped">
                                                    <tr>
                                                        <th>Nama Depan</th>
                                                        <td>:</td>
                                                        <td>
                                                            <input type="text" class="form-control form-control-sm" name="nama_depan" value="{{ old('nama_depan') }}">
                                                            @error('nama_depan')
                                                            <small class="text-danger">{{$message}}</small>
                                                            @enderror
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Nama Belakang</th>
                                                        <td>:</td>
                                                        <td>
                                                            <input type="text" class="form-control form-control-sm" name="nama_belakang" value="{{ old('nama_belakang') }}">
                                                            @error('nama_belakang')
                                                            <small class="text-danger">{{$message}}</small>
                                                            @enderror
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th>NIK</th>
                                                        <td>:</td>
                                                        <td>
                                                            <input type="text" class="form-control form-control-sm" name="nik" value="{{ old('nik') }}">
                                                            @error('nik')
                                                            <small class="text-danger">{{$message}}</small>
                                                            @enderror
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Gender</th>
                                                        <td>:</td>
                                                        <td>
                                                            <select name="gender" class="form-control form-control-sm">
                                                                <option value="">---pilih---</option>
                                                                <option value="male">Male</option>
                                                                <option value="female">Female</option>
                                                            </select>
                                                            @error('gender')
                                                            <small class="text-danger">{{$message}}</small>
                                                            @enderror
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <th>Warga Negara</th>
                                                        <td>:</td>
                                                        <td>
                                                            <select name="warga_negara" class="form-control form-control-sm">
                                                                <option value="">---pilih---</option>
                                                                <option value="wni">WNI</option>
                                                                <option value="wna">WNA</option>
                                                            </select>
                                                            @error('gender')
                                                            <small class="text-danger">{{$message}}</small>
                                                            @enderror
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Suku</th>
                                                        <td>:</td>
                                                        <td>
                                                            <input type="text" class="form-control form-control-sm" name="suku" value="{{ old('suku') }}">
                                                            @error('suku')
                                                            <small class="text-danger">{{$message}}</small>
                                                            @enderror
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header bg-success"><b>Identitas</b></div>
                                            <div class="card-body">
                                                <table class="table table-sm table-striped">
                                                    <tr>
                                                        <th>Tempat Lahir</th>
                                                        <td>:</td>
                                                        <td>
                                                            <input type="text" class="form-control form-control-sm" name="tempat_lahir" value="{{ old('tempat_lahir') }}">
                                                            @error('tempat_lahir')
                                                            <small class="text-danger">{{$message}}</small>
                                                            @enderror
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Tanggal Lahir</th>
                                                        <td>:</td>
                                                        <td>
                                                            <input type="date" class="form-control form-control-sm" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                                                            @error('tanggal_lahir')
                                                            <small class="text-danger">{{$message}}</small>
                                                            @enderror
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th>Status Pernikahan</th>
                                                        <td>:</td>
                                                        <td>
                                                            <select class="form-control form-control-sm" name="status_menikah">
                                                                <option value="">---pilih---</option>
                                                                @foreach($marital_status as $nikah)
                                                                    <option value="{{ $nikah->code }}">{{ $nikah->code }} {{ $nikah->display }}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Agama</th>
                                                        <td>:</td>
                                                        <td>
                                                            <select class="form-control form-control-sm" name="agama">
                                                                <option value="">---pilih---</option>
                                                                @foreach($agama as $data)
                                                                    <option value="{{ $data->_id }}">{{ $data->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('agama')
                                                            <small class="text-danger">{{$message}}</small>
                                                            @enderror
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th>Phone</th>
                                                        <td>:</td>
                                                        <td>
                                                            <input type="number" class="form-control form-control-sm" name="nomor_telepon" value="{{ old('nomor_telepon' ) }}">
                                                            @error('nomor_telepon')
                                                            <small class="text-danger">{{$message}}</small>
                                                            @enderror
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Email</th>
                                                        <td>:</td>
                                                        <td>
                                                            <input type="email" class="form-control form-control-sm" name="email" value="{{ old('email') }}">
                                                            @error('email')
                                                            <small class="text-danger">{{$message}}</small>
                                                            @enderror
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <a href="{{ route('users.index') }}" class="btn btn-danger">Kembali</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
            <!-- /.container-fluid -->
    </section>
@endsection
