@extends('layout.user')
@section('content')
    <section class="content mb-5">
        <div class="row">
            <div class="col-12">
                @if(\Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                        {!! \Session::get('success') !!}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                    @if(\Session::has('danger'))
                        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                            {!! \Session::get('danger') !!}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                <div class="card">
                    <div class="card-header bg-dark">
                        <b>{{ $title }}</b>
                    </div>
                    <div class="card-body row">
                        <div class="col-md-6">
                            <table class="table table-sm">
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td>{{ $customer->name }}</td>
                                </tr>
                                <tr>
                                    <td>Code</td>
                                    <td>:</td>
                                    <td>{{ $customer->code }}</td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td>:</td>
                                    <td>{{ $customer->hp }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td>{{ $customer->email }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td>{{ $customer->alamat }}</td>
                                </tr>
                                <tr>
                                    <td>PIC</td>
                                    <td>:</td>
                                    <td>{{ $customer->pic }}</td>
                                </tr>
                            </table>
                            <a href="{{ route('customers.edit', ['id'=>$customer->_id]) }}" class="btn btn-sm btn-success">Edit</a>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-sm">
                                <tr>
                                    <td>Kit Count</td>
                                    <td>:</td>
                                    <td class="w-75">{{ $kits->count(). " Alat" }} </td>
                                </tr>
                                <tr>
                                    <td>Pegawai Count</td>
                                    <td>:</td>
                                    <td>{{ $petugas->count() }}</td>
                                </tr>
                                <tr>
                                    <td>Pasien Count</td>
                                    <td>:</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Kunjungan</td>
                                    <td>:</td>
                                    <td>{{ $admission->count() }}</td>
                                </tr>
                                <tr>
                                    <td>Layanan</td>
                                    <td>:</td>
                                    <td></td>
                                </tr>
                            </table>
                        </div>

                    </div>
                    <div class="card-header bg-dark">
                        <b>Kit List</b>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('kits.create') }}" class="btn btn-sm btn-primary">Add Kit</a>
                        <table class="table table-sm table-striped">
                            <thead>
                            <th>#</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Detail</th>
                            </thead>
                            <tbody>
                            @foreach($kits as $list)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $list->code }}</td>
                                    <td>{{ $list->name }}</td>
                                    <td>
                                    @if($list->status == null | $list->status == "active")
                                        <button class="btn btn-sm btn-success">{{ "Active" }}</button>
                                        @elseif($list->status == "stop")
                                            <button class="btn btn-sm btn-danger">{{ $list->status }}</button>

                                    @endif
                                    </td>
                                    <td><a href="{{ route('kits.transaksi', ['id'=>$list->id]) }}" class="btn btn-sm btn-primary">Detail</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-header bg-dark">
                        <b>Petugas</b>
                    </div>
                    <div class="card-body mb-5">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                            Add Petugas
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Add Petugas</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('petugas.store.nik') }}" method="post">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">NIK Petugas</label>
                                                <div class="col-sm-8">
                                                    <input type="number" class="form-control" name="nik">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Faskes</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" name="organisasi">
                                                        <option value="{{ $customer->_id }}">{{ $customer->name }}</option>
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
                        <table class="table table-sm table-striped">
                            <thead>
                            <th>#</th>
                            <th>Name</th>
                            <th>NIK</th>
                            <th>Contact</th>
                            <th>Detail</th>
                            </thead>
                            <tbody>
                            @foreach($petugas as $list)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $list->nama['nama_depan']." ".$list->nama['nama_belakang'] }}</td>
                                    <td>{{ (int)$list->nik }}</td>
                                    <td>
                                        {{ $list->kontak['email'] }} <br>
                                        <small>{{ $list->kontak['nomor_telepon'] }}</small>
                                    </td>
                                    <td><a href="{{ route('observation.petugas', ['id' => $list->id]) }}" class="btn btn-sm btn-primary" target="_blank">Detail</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
