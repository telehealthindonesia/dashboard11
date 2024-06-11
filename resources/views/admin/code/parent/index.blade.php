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

                        <div class="card-body">
                            <form class="form-inline" action="{{ route('code.parent.store') }}" method="post">
                                @csrf
                                <div class="input-group">
                                    <select class="form-control" name="code_id">
                                        <option value="">---Pilih---</option>
                                        @foreach($codes as $code)
                                            <option value="{{ $code->id }}">{{ $code->display }}</option>
                                        @endforeach
                                    </select>
                                    <span class="input-group-append">
                                        <button type="submit" class="btn btn-info btn-flat">Save</button>
                                    </span>
                                    @error('code_id')
                                    <span class="input-group-append ml-2">
                                        <small class="text-danger">{{$message}}</small>
                                    </span>
                                    @enderror

                                </div>
                            </form>
                            <br>

                            <table class="table table-sm mt-2">
                                <thead>
                                <th>#</th>
                                <th>Code</th>
                                <th>Display</th>
                                <th>System</th>
                                <th>Aksi</th>
                                </thead>
                                <tbody>
                                @if($parent_codes->count()<1)
                                    <tr class="bg-danger">
                                        <td colspan="5" class="text-center"><b>Data tidak ditemukan</b></td>
                                    </tr>
                                @else
                                    @foreach($parent_codes as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->code }}</td>
                                            <td>{{ $data->display }}</td>
                                            <td>{{ $data->system }}</td>
                                            <td><a href="{{ route('code.parent.show', ['id'=>$data->id]) }}" class="btn btn-sm btn-info">Detail</a></td>
                                        </tr>
                                    @endforeach
                                @endif


                                </tbody>
                            </table>
                            <hr>
                            {{ $parent_codes->links() }}

                        </div>

                    </div>

                </div>
            </div>
        </div>
            <!-- /.container-fluid -->
    </section>
@endsection
