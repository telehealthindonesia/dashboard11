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
                    <div class="card">
                        <form action="{{ route('users.update', ['id' => $users->id]) }}" method="post">
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
                                                            <input type="text" class="form-control form-control-sm" name="nama_depan" value="{{ old('nama_depan', $users->nama['nama_depan']) }}">
                                                            @error('nama_depan')
                                                            <small class="text-danger">{{$message}}</small>
                                                            @enderror
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Nama Belakang</th>
                                                        <td>:</td>
                                                        <td>
                                                            <input type="text" class="form-control form-control-sm" name="nama_belakang" value="{{ old('nama_belakang', $users->nama['nama_belakang']) }}">
                                                            @error('nama_belakang')
                                                            <small class="text-danger">{{$message}}</small>
                                                            @enderror
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th>NIK</th>
                                                        <td>:</td>
                                                        <td>
                                                            <input type="text" class="form-control form-control-sm" name="nik" value="{{ old('nik', $users->nik) }}">
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
                                                                <option value="male" @if($users->gender == "male" || old('gender') == "male") selected @endif>Male</option>
                                                                <option value="female" @if($users->gender == "female" || old('gender') == "female") selected @endif>Female</option>
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
                                                                <option value="WNI" @if($users->warga_negara == "WNI" || old('warga_negara') == "WNI") selected @endif>WNI</option>
                                                                <option value="WNA" @if($users->warga_negara == "WNA" || old('warga_negara') == "WNA") selected @endif>WNA</option>
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
                                                            <input type="text" class="form-control form-control-sm" name="suku" value="{{ old('suku', $users->suku) }}">
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
                                                            <input type="text" class="form-control form-control-sm" name="tempat_lahir" value="{{ old('tempat_lahir', $users->lahir['tempat']) }}">
                                                            @error('tempat_lahir')
                                                            <small class="text-danger">{{$message}}</small>
                                                            @enderror
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Tanggal Lahir</th>
                                                        <td>:</td>
                                                        <td>
                                                            <input type="date" class="form-control form-control-sm" name="tanggal_lahir" value="{{ old('tanggal_lahir', $users->lahir['tanggal']) }}">
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
                                                                    <option value="{{ $nikah->code }}" @if($users->status_menikah == null ) {{ "" }} @elseif($nikah->code == $users->status_menikah['code']) {{ "selected" }} @endif>{{ $nikah->display }}</option>
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
                                                                    <option value="{{ $data->_id }}" @if($users->agama == null) {{ "" }} @elseif($data->_id == $users->agama['id']) {{ "selected" }} @endif>{{ $data->name }}</option>
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
                                                            <input type="number" class="form-control form-control-sm" name="nomor_telepon" value="{{ old('nomor_telepon', $users->kontak['nomor_telepon'] ) }}">
                                                            @error('nomor_telepon')
                                                            <small class="text-danger">{{$message}}</small>
                                                            @enderror
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Email</th>
                                                        <td>:</td>
                                                        <td>
                                                            <input type="email" class="form-control form-control-sm" name="email" value="{{ old('email', $users->kontak['email'] ) }}">
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
                                <a href="{{ route('users.show', ['id'=>$users->id]) }}" class="btn btn-danger">Kembali</a>
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
            <!-- /.container-fluid -->
    </section>
@endsection
