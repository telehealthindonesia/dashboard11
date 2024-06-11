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
                            <div class="row mb-2 justify-content-between">
                                <div class="col-md-6">
                                    <a href="{{ route('role.show', ['id'=>$role_code->id]) }}" class="btn btn-danger mb-2">Back</a>
                                </div>
                                <div class="col-md-3 text-right">
                                    <form action="" method="get">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Search name ..." name="name" value="{{ $keyword_name }}">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit" id="button-addon2">Search</button>
                                            </div>
                                        </div>

                                    </form>

                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="table-responsive">

                                    <table class="table table-sm mt-2">
                                        <thead>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>PIC</th>
                                        <th>Email</th>
                                        <th>Count</th>
                                        <th>Action</th>
                                        </thead>
                                        <tbody>
                                        @foreach($customers as $data)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $data->name }}</td>
                                                <td>{{ $data->pic }}</td>
                                                <td>{{ $data->email }}</td>
                                                <td></td>
                                                <td>

                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    {{ $customers->links() }}
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <!-- /.container-fluid -->
    </section>
@endsection
