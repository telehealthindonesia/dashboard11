@extends('layout.admin')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-info">
                            @include('layout.menu.admin.submenu.master')
                        </div>
                        @if(\Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                                {!! \Session::get('success') !!}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if(\Session::has('danger'))
                            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                                {!! \Session::get('danger') !!}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="card-body">
                            <div class="row mb-2">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNewData">
                                    Add New Data
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="addNewData" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-primary">
                                                <h5 class="modal-title" id="staticBackdropLabel">Add New Data</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('code.store') }}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="row mb-1">
                                                        <label class="col-md-4">Code</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="code">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                        <label class="col-md-4">System</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="system">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                        <label class="col-md-4">Display</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="display">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                        <label class="col-md-4">Category</label>
                                                        <div class="col-md-8">
                                                            <select class="form-control" name="category">
                                                                <option value="{{ $role_code->code }}">{{ $role_code->display }}</option>
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
                            <div class="row mb-2">
                                <div class="table-responsive">
                                    <table class="table table-sm mt-2">
                                        <thead>
                                        <th>#</th>
                                        <th>Code</th>
                                        <th>System</th>
                                        <th>Display</th>
                                        <th>Count</th>
                                        <th>Action</th>
                                        </thead>
                                        <tbody>
                                        @foreach($roles as $data)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $data->code }}</td>
                                                <td>{{ $data->system }}</td>
                                                <td>{{ $data->display }}</td>
                                                <td></td>
                                                <td>
                                                    <a href="{{ route('role.show', ['id'=>$data->id]) }}" class="btn btn-info btn-sm">Detail</a>
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
            </div>
            <!-- /.container-fluid -->
    </section>
@endsection
