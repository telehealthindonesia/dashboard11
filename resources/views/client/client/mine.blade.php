@extends('layout.client')
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
                        <div class="card-header bg-black"><b>{{ $title }}</b></div>
                        <div class="card-body">
                            @if(empty($customer))
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#daftarMitra">
                                    Daftar
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="daftarMitra" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header bg-dark">
                                                <h5 class="modal-title" id="staticBackdropLabel">Pendaftaran Menjadi Mitra</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('customers.store.mine') }}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Nama Perusahaan</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Singkatan Perusahaan</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="code">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Email</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" name="email">
                                                        </div>
                                                        <label class="col-sm-3 col-form-label">HP</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" name="hp">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Website</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="website">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Alamat</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="alamat">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Kode Pos</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="postal_code">
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
                            @else
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <b>Nama Perusahaan</b>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <b>{{ $customer->name }}</b>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <b>Kode Perusahaan</b>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <b>{{ $customer->code }}</b>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <b>Email</b>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <b>{{ $customer->email }}</b>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <b>HP</b>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <b>{{ $customer->hp }}</b>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="table-responsive">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                                        Create Project
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Create Project</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('oauth.client.store') }}" method="post">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="row mb-1">
                                                            <div class="col-md-4">
                                                                <label>Project Name</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="name">
                                                                @error('name')
                                                                <small class="text-danger">{{$message}}</small>
                                                                @enderror

                                                            </div>
                                                        </div>
                                                        <div class="row mb-1">
                                                            <div class="col-md-4">
                                                                <label>Redirect</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="url" class="form-control" name="redirect">
                                                                @error('redirect')
                                                                <small class="text-danger">{{$message}}</small>
                                                                @enderror
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
                                    <table class="table table-sm mt-2">
                                        <thead>
                                        <th>#</th>
                                        <th>Project</th>
                                        <th>Redirect</th>
                                        <th>Client Id</th>
                                        <th>Status</th>
                                        <th>Time</th>
                                        <th>Aksi</th>
                                        </thead>
                                        <tbody>
                                        @foreach($oauth_clients as $data)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $data->name}}</td>
                                                <td>{{ $data->redirect}}</td>
                                                <td>{{ $data->id}}</td>
                                                <td>
                                                    @if($data->revoked == true)
                                                        <span class="badge badge-danger">{{ "Blokir" }}</span>
                                                    @else
                                                        <span class="badge badge-success">{{ "Active" }}</span>

                                                    @endif
                                                </td>



                                                <td>{{ $data->created_at}}</td>
                                                <td>
                                                    <a class="btn btn-sm btn-info" href="{{ route('oauth.client.show',['id'=>$data->id]) }}">Detail</a>
                                                </td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
    </section>
@endsection
