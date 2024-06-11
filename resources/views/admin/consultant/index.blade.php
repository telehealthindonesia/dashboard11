
@extends('layout.user')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
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
                        <div class="card-header bg-black"><b>Daftar User</b></div>

                        <div class="card-body">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addConsultant">
                                Add Data
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="addConsultant" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                            <h5 class="modal-title" id="staticBackdropLabel">Create Consultant</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('consultant.store') }}" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group row">
                                                    <label class="col-sm-3">Petugas</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" required name="id_petugas" >
                                                            <option value="">----select----</option>
                                                            @foreach($petugas as $list)
                                                                <option value="{{ $list->_id }}">{{ $list->nama['nama_depan'] }} {{ $list->nama['nama_belakang'] }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3">Profesi</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" required name="id_profesi" >
                                                            <option value="">----select----</option>
                                                            @foreach($profesi as $list)
                                                                <option value="{{ $list->_id }}">{{ $list->name }}</option>
                                                            @endforeach
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
                            <table class="table table-sm" id="example1">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>NIK</th>
                                    <th>Email</th>
                                    <th>Is Active</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($consultants as $data)
                                    <tr class=@if($data->str == null) {{ "bg-danger" }} @endif>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if($data->gelar !=null)
                                                {{ $data->gelar['gelar_depan'] }} {{ $data->nama['nama_depan'] }} {{ $data->nama['nama_belakang'] }} {{ $data->gelar['gelar_belakang'] }}
                                            @else
                                                {{ $data->nama['nama_depan'] }} {{ $data->nama['nama_belakang'] }}
                                            @endif
                                        </td>
                                        <td>{{ $data->nik }}</td>
                                        <td>{{ $data->kontak['email'] }}</td>
                                        <td>
                                            @if($data->consultant !=null)
                                                @if($data->consultant['isOpenForConsultation'] == true)
                                                    {{ "active" }}
                                                @else
                                                    {{ false }}
                                                @endif
                                            @endif
                                        </td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#data{{ $data->_id }}">
                                                Activate
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="data{{ $data->_id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-success">
                                                            <h5 class="modal-title" id="staticBackdropLabel">Create Consultant</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('consultant.update') }}" method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-body">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-3">Petugas</label>
                                                                    <div class="col-sm-9">
                                                                        <select class="form-control" name="consultant_id" required>
                                                                            <option value="{{ $data->_id }}">{{ $data->nama['nama_depan'] }} {{ $data->nama['nama_belakang'] }}</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-3">Gelar</label>
                                                                    <div class="col-sm-4">
                                                                        <input type="text" class="form-control" name="gelar_depan" value="@if($data->gelar !=null) {{ $data->gelar['gelar_depan'] }} @endif">
                                                                    </div>
                                                                    <div class="col-sm-5">
                                                                        <input type="text" class="form-control" name="gelar_belakang" value="@if($data->gelar !=null) {{ $data->gelar['gelar_belakang'] }} @endif">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-3">STR</label>
                                                                    <div class="col-sm-3">
                                                                        <input type="text" class="form-control" name="str_number" value="@if($data->str != null) {{ $data->str['number'] }} @endif">
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <input type="date" class="form-control" name="str_terbit" value="@if($data->str != null) {{ $data->str['terbit'] }} @endif">
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <input type="date" class="form-control" name="str_expired" value="@if($data->str != null) {{ $data->str['expired'] }} @endif">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-3">Profesi</label>
                                                                    <div class="col-sm-9">
                                                                        <select class="form-control" required name="id_profesi" >
                                                                            <option value="">----select----</option>
                                                                            @foreach($profesi as $list)
                                                                                <option value="{{ $list->_id }}" @if($data->profesi !=null) @if($data->profesi['id'] == $list->_id){{ "selected" }}@endif @endif>{{ $list->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-3">Status</label>
                                                                    <div class="col-sm-9">
                                                                        <select class="form-control" required name="isOpenForConsultation">

                                                                            @if($data->consultant !=null)
                                                                                <option value="{{ true }}" @if($data->consultant['isOpenForConsultation'] == true) {{ "selected" }} @endif>{{ "Active" }}</option>
                                                                                <option value="{{ false }}" @if($data->consultant['isOpenForConsultation'] == false) {{ "selected" }} @endif>{{ "Not Active" }}</option>
                                                                            @else
                                                                                <option value="">----select----</option>
                                                                                <option value="{{ true }}">{{ "Active" }}</option>
                                                                                <option value="{{ false }}">{{ "Not Active" }}</option>
                                                                            @endif

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-success">Update</button>
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
            <!-- /.container-fluid -->
    </section>
@endsection
