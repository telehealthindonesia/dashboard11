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
                        <div class="row mt-2 justify-content-center">
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-header bg-dark"><b>Create Master {{ $title }}</b></div>
                                    <form action="{{ route('admin.product.update', ['id'=>$product->id]) }}" method="post">
                                        @method('PUT')
                                        @csrf
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <b>Nama Product</b>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" name="title" value="{{ $product->title,old('title') }}">
                                                    @error('title')
                                                    <small class="text-danger">{{$message}}</small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mt-1">
                                                <div class="col-md-3">
                                                    <b>Price</b>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" name="price" value="{{ $product->price,old('price') }}" >
                                                    @error('price')
                                                    <small class="text-danger">{{$message}}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mt-1">
                                                <div class="col-md-3">
                                                    <b>Description</b>
                                                </div>
                                                <div class="col-md-9">
                                                    <textarea id="my-editor" class="form-control" name="description">{{ $product->description, old('description') }}</textarea>
                                                    @error('description')
                                                    <small class="text-danger">{{$message}}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mt-1">
                                                <div class="col-md-3">
                                                    <b>File</b> <br>
                                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                                                        Ambil dari bank file
                                                    </button>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="file" class="form-control" name="file">
                                                    @error('file')
                                                    <small class="text-danger">{{$message}}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-dark">
                                                        <h5 class="modal-title" id="staticBackdropLabel">My Gallery</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            @foreach($images as $data)
                                                            <div class="col-md-3">
                                                                <div class="card">
                                                                    <div class="card-header">
                                                                        <input type="radio" name="image" value="{{ $data->url }}">
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <img src="{{ $data->url }}" class="w-100">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            @endforeach
                                                        </div>


                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Pilih</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>


                                        <diV class="card-footer">
                                            <a href="{{ route('petugas.index') }}" class="btn btn-warning">Back</a>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </diV>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <!-- /.container-fluid -->
    </section>
    <!-- Place the first <script> tag in your HTML's <head> -->
    <script src="https://cdn.tiny.cloud/1/gdxzidsu73dqj548bh5h8o9zyuppxxs6oasx7p2e5zw3pc8f/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

    <!-- Place the following <script> and <textarea> tags your HTML's <body> -->
    <script>
        tinymce.init({
            selector: '#my-editor',
            plugins: 'autolink lists link image charmap print preview',
            toolbar: 'undo redo | bold italic | alignleft aligncenter alignright | link image',
            height: 500,
        });
    </script>

@endsection
