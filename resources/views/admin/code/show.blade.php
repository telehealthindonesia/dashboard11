@extends('layout.admin')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
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
                    <div class="card">
                        <div class="card-header bg-info">
                            @include('layout.menu.admin.submenu.master')
                        </div>
                        <div class="row mt-2 justify-content-center">
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-header bg-dark"><b>Create Master {{ $title }}</b></div>
                                    <form action="{{ route('code.update', ['id' => $code->id]) }}" method="post">
                                        @csrf
                                        @include('admin.code._form')
                                        <diV class="card-footer">
                                            <a href="{{ route('code.index') }}" class="btn btn-warning">Back</a>
                                            <button type="submit" class="btn btn-success">Update</button>
                                        </diV>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header bg-dark">
                                        <b>Child Code</b>
                                    </div>
                                    <div class="card-body">
                                        <div class=" table-responsive">
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#newChild">
                                                Add New Child
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="newChild" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('code.store') }}" method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="row mb-1">
                                                                    <label class="col-sm-3">Code</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control" name="code" value="{{ old('code') }}">
                                                                        @error('code')
                                                                        <small class="text-danger">{{$message}}</small>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-1">
                                                                    <label class="col-sm-3">System</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control" name="system" value="{{  old('system') }}">
                                                                        @error('system')
                                                                        <small class="text-danger">{{$message}}</small>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-1">
                                                                    <label class="col-sm-3">Display</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control" name="display" value="{{ old('display') }}">
                                                                        @error('display')
                                                                        <small class="text-danger">{{$message}}</small>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-1">
                                                                    <label class="col-sm-3">Category</label>
                                                                    <div class="col-sm-9">
                                                                        <select class="form-control" name="category">
                                                                            <option value="{{ $code->code }}">{{ $code->display }}</option>

                                                                        </select>
                                                                        @error('display')
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
                                            <table class="table table-sm table-striped">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Code</th>
                                                    <th>Display</th>
                                                    <th>System</th>
                                                    <th>Aksi</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($child_code as $data)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $data->code }}</td>
                                                        <td>{{ $data->display }}</td>
                                                        <td>{{ $data->system }}</td>
                                                        <td><a class="btn btn-sm btn-info" href="{{ route('code.show', ['id'=>$data->_id]) }} ">Detail</a></td>
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
                </div>
            </div>
        </div>
            <!-- /.container-fluid -->
    </section>
@endsection
