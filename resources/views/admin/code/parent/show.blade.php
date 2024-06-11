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
                        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <b>Parent</b>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Code</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>{{ $parent_code->code }}</label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>System</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>{{ $parent_code->system }}</label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Display</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>{{ $parent_code->display }}</label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Count</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>{{ $child_codes->count() }}</label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-header bg-success">
                                        <b>Child Code</b>
                                    </div>
                                    <div class="card-body">
                                        <div class=" table-responsive">
                                            <form class="form-inline" action="{{ route('code.child.store') }}" method="post">
                                                @csrf
                                                <div class="input-group">
                                                    <input type="number" class="form-control col-2" name="norut" value="{{ $child_codes->count()+1 }}">
                                                    <input type="text" class="form-control" name="code" placeholder="child code">
                                                    <input type="hidden" class="form-control" name="parent" value="{{ $parent_code->code }}">
                                                    <span class="input-group-append">
                                                        <button type="submit" class="btn btn-primary btn-flat">Save</button>
                                                    </span>
                                                    @error('code')
                                                    <span class="input-group-append ml-2">
                                                        <small class="text-danger">{{$message}}</small></span>
                                                    @enderror
                                                </div>
                                            </form>
                                            <br>
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
                                                @foreach($child_codes as $data)
                                                    <tr>
                                                        <td>{{ $data->norut }}</td>
                                                        <td>{{ $data->code }}</td>
                                                        <td>{{ $data->display }}</td>
                                                        <td>{{ $data->system }}</td>
                                                        <td>
                                                            <!-- Button trigger modal -->
                                                            <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#detail{{ $data->id }}">
                                                                Detail
                                                            </button>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="detail{{ $data->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header bg-success">
                                                                            <h5 class="modal-title" id="staticBackdropLabel">Detail</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <form action="{{ route('code.child.update', ['id'=> $data->_id]) }}" method="post">
                                                                            @csrf
                                                                            @method('put')
                                                                            <div class="modal-body">
                                                                                <div class="form-group row">
                                                                                    <label class="col-sm-2">No</label>
                                                                                    <div class="col-sm-2">
                                                                                        <input type="text" class="form-control" name="norut" value="{{ $data->norut }}">
                                                                                    </div>
                                                                                    <label class="col-sm-2">Code</label>
                                                                                    <div class="col-sm-6">
                                                                                        <input type="text" class="form-control" name="code" value="{{ $data->code }}">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label class="col-sm-2">System</label>
                                                                                    <div class="col-sm-10">
                                                                                        <input type="text" class="form-control" name="system" value="{{ $data->system }}" >
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label class="col-sm-2">Display</label>
                                                                                    <div class="col-sm-10">
                                                                                        <input type="text" class="form-control" name="display" value="{{ $data->display }}" >
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
                                    <div class="card-footer">
                                        <a href="{{ route('code.parent.index') }}" class="btn btn-danger">Back</a>
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
