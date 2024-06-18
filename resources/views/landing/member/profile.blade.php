@extends('layout.landing')
@section('content')
    <section id="subheader" data-speed="8" data-type="background" class="padding-top-bottom subheader">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Member</h1>
                    <ul class="breadcrumbs">
                        <li><a href="{{ route('landing.home') }}">Home</a></li>
                        <b>/</b>
                        <li class="active">Member</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- section begin -->
    <section class="shortcodes section-elements">
        <div class="container">
            @include('landing.member.menu.menu')
            <h6>A. Identitas Utama</h6>
            <div class="row">
                <div class="col-md-6">
                    <a href="#" class="btn btn-success mb-2">Edit</a>
                    <table class="table">
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td>{{ $user->nama['nama_depan'] }} {{ $user->nama['nama_belakang'] }}</td>
                        </tr>
                        <tr>
                            <td>NIK</td>
                            <td>:</td>
                            <td>{{ $user->nik }}</td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td>:</td>
                            <td>{{ $user->gender }}</td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir</td>
                            <td>:</td>
                            <td>{{ $user->lahir['tempat'] }}, {{ $user->lahir['tanggal'] }}</td>
                        </tr>
                        <tr>
                            <td>Nomor Passport</td>
                            <td>:</td>
                            <td>
                                {{ $user->passport }}
                            </td>
                        </tr>
                    </table>

                </div>

            </div>
            <h6>B. Identitas Anggota Keluarga</h6>
            <div class="row">
                <div class="col-md-12">
                    <button id="openModalBtn" class="btn-small mb-2">New Family</button>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <b>Registrasi gagal {{ session('validasi') }}</b>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(!empty(session('success')))
                        <div class="alert alert-success">
                            <b>{{ session('success') }}</b>
                        </div>
                    @elseif(!empty(session('danger')))
                        <div class="alert alert-danger">
                            <b>{{ session('danger') }}</b>
                        </div>
                    @endif

                    <div id="openModal" class="modal mb-2">
                        <div class="modal-content">
                            <h5>New Family</h5>
                            <form action="{{ route('member.register') }}" method="post">
                                @csrf
                                <div class="row mb-1">
                                    <div class="col-md-4">
                                        <label>Nama Depan</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="nama_depan" value="{{ old('nama_depan') }}">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-4">
                                        <label>Nama Belakang</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="nama_belakang" value="{{ old('nama_belakang') }}">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-4">
                                        <label>Gender</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select class="form-control" name="gender" required>
                                            <option value="">---pilih---</option>
                                            <option value="male" @if(old('gender') == 'male') {{ "selected" }} @endif>Laki-laki</option>
                                            <option value="female" @if(old('gender') == 'female') {{ "selected" }} @endif>Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-4">
                                        <label>NIK</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="number" class="form-control" name="nik" value="{{ old('nik') }}">
                                        @error('nik')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-4">
                                        <label>Tempat Lahir</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="tempat_lahir" value="{{ old('tempat_lahir') }}">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-4">
                                        <label>Tanggal Lahir</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="date" class="form-control" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-4">
                                        <label>Relasi</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select class="form-control" name="relasi" required>
                                            <option value="">---pilih---</option>
                                            <option value="pasangan" @if(old('relasi') == 'pasangan') {{ "selected" }} @endif>Pasangan</option>
                                            <option value="anak" @if(old('relasi') == 'anak') {{ "selected" }} @endif>Anaka</option>
                                            <option value="saudara" @if(old('relasi') == 'saudara') {{ "selected" }} @endif>Saudara</option>
                                            <option value="lainnya" @if(old('relasi') == 'lainnya') {{ "selected" }} @endif>Lainnya</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-12">
                                        <input type="checkbox" name="agreement" required> Dengan ini saya telah membaca ketentuan-ketentuan yang tercantum dalam peraturan rumah sakit dan bersedia mematuhi nya
                                    </div>

                                </div>
                                <div class="row mb-1 margin-top-20">
                                    <div class="col-md-12">
                                        <button class="btn-small" type="submit">Save</button>
                                        <button class="btn btn-danger closeBtn">Close</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    <script src="{{ asset('assets/js/modal.js') }}"></script>
                    <table class="table">
                        <thead>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Gender</th>
                        <th>Tanggal Lahir</th>
                        </thead>
                        <tbody>
                        @foreach($family as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->nama['nama_depan'] }} {{ $data->nama['nama_belakang'] }}</td>
                                <td>{{ $data->nik }}</td>
                                <td>{{ $data->gender }}</td>
                                <td>{{ $data->lahir['tanggal'] }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </section>

@endsection
