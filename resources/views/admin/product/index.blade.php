@extends('layout.admin')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">

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
                            <a href="{{ route('admin.product.create') }}" class="btn btn-sm btn-primary mb-1">Add Data</a>
                            <div class="row">
                                @foreach($products as $data)
                                    <div class="col-md-4">
                                        <div class="card">
                                            <img src="{{ $data->image }}" class="w-100">
                                            <div class="card-header"><h4><b>{{ $data->title }}</b></h4></div>
                                            <div class="card-footer">
                                                <a href="" class="btn btn-info">Detail</a>
                                                <a href="{{ route('admin.product.edit', ['id'=>$data->id]) }}" class="btn btn-success">Edit</a>
                                                <a href="" class="btn btn-danger">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
            <!-- /.container-fluid -->
    </section>
@endsection
