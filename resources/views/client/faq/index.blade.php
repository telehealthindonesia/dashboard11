@extends('layout.client')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-black"><b>{{ $title }}</b></div>

                        <div class="card-body">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#staticBackdrop">
                                New Data
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header bg-dark">
                                            <h5 class="modal-title" id="staticBackdropLabel">Create New FAQ</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('faq.store', ['corporate_id'=>\Illuminate\Support\Facades\Auth::user()['organisasi']['id']]) }}" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label>Nomor Urut</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <input type="number" name="nomor_urut" class="form-control">
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label>Pertanyaan</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <input type="text" name="pertanyaan" class="form-control">
                                                    </div>

                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label>Jawaban</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <textarea class="form-control" name="jawaban"></textarea>
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
                            <table class="table table-sm mt-2" id="example1">
                                <thead>
                                <th>#</th>
                                <th>FAQ</th>
                                <th>Aksi</th>
                                </thead>
                                <tbody>
                                @foreach($faq as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><b class="text-primary">{{ $data->pertanyaan}}</b> <br> {{ $data->jawaban}}</td>

                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#faq{{$data->id}}">
                                                Detail
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="faq{{$data->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-dark">
                                                            <h5 class="modal-title" id="staticBackdropLabel">Update Data</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('faq.update', ['faq_id'=>$data->id]) }}" method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <label>Nomor Urut</label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <input type="number" name="nomor_urut" class="form-control" value="{{ $data->nomor_urut }}">
                                                                    </div>

                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <label>Pertanyaan</label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <input type="text" name="pertanyaan" class="form-control" value="{{ $data->pertanyaan }}">
                                                                    </div>

                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <label>Jawaban</label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <textarea class="form-control" name="jawaban">{{ $data->jawaban }}</textarea>
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
