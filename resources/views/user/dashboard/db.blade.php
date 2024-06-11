@extends($content)
@section('content')
    <section class="content">
        <div class="container-fluid">
            @if(\Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {!! \Session::get('success') !!}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @elseif(\Session::has('errors'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ "Gagal Validasi, data tidak lengkap" }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @elseif(\Session::has('danger'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {!! \Session::get('danger') !!}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    {{ $title }}
                </div>
                <div class="card-body">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#addNewData">
                        Add New Data
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="addNewData" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('dashboard.store') }}" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <label class="col-md-4">Variable</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control form-control-sm" name="variable">
                                                @error('variable')
                                                <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4">Model</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control form-control-sm" name="model" value="{{ old('model') }}">
                                                @error('model')
                                                <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4">Key</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control form-control-sm" name="key">
                                                @error('key')
                                                <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4">Value</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control form-control-sm" name="value">
                                                @error('value')
                                                <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4">Colour</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control form-control-sm" name="colour">
                                                @error('colour')
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
                    <table class="table table-sm table-striped" id="example1">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Variable</th>
                            <th>Model</th>
                            <th>Key</th>
                            <th>Value</th>
                            <th>Count</th>
                            <th>Updated</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($dashboard as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->variable }}</td>
                            <td>{{ $data->model }}</td>
                            <td>{{ $data->key }}</td>
                            <td>{{ $data->value }}</td>
                            <td>{{ $data->count }}</td>
                            <td>{{ $data->updated_at }}</td>
                            <td>
                                <a href="{{ route('dashboard.show', ['id'=>$data->id]) }}" class="btn btn-info btn-sm">Detail</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
            <!-- /.container-fluid -->
    </section>
@endsection
