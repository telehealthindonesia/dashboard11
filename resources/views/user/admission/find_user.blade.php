
@extends('layout.user')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-dark">
                            <b>{{ $title }}</b>
                        </div>
                        <div class="row justify-content-between">

                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="col-md-3">
                                            <form action="">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Input name..." name="name" value="{{ $name }}">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-primary" type="submit">Search</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-12">
                                            <form action="{{ route('admission.create') }}" method="post">
                                                @csrf
                                                <table class="table table-sm">
                                                    <thead>
                                                    <th>#</th>
                                                    <th>Nama</th>
                                                    <th>Gender</th>
                                                    <th>DOB</th>
                                                    <th>HP</th>
                                                    </thead>
                                                    <tbody>
                                                    @if($users->count() < 1)
                                                        <tr>
                                                            <td colspan="5" class="text-center"><b class="text-danger">User Not Found</b></td>
                                                        </tr>
                                                    @else
                                                        @foreach($users as $data)
                                                            <tr>
                                                                <td>
                                                                    <input type="radio" value="{{ $data->id }}" name="user_id">
                                                                    <input type="hidden" value="{{ \Illuminate\Support\Facades\Auth::user()->organisasi['id'] }}" name="customer_id">
                                                                </td>
                                                                <td>{{ $data->nama['nama_depan']." ".$data->nama['nama_belakang'] }}</td>
                                                                <td>{{ $data->gender }}</td>
                                                                <td>{{ $data->lahir['tanggal'] }}</td>
                                                                <td>@if(!empty($data->kontak)) {{ $data->kontak['email'] }} @endif</td>
                                                            </tr>
                                                        @endforeach
                                                    @endif

                                                    </tbody>
                                                    @if($users->count()>0)
                                                        <tfoot>
                                                        <td colspan="5">
                                                            <button class="btn btn-primary mt-3" type="submit">Daftar</button>
                                                            {{--                                                        <a href="{{ route('admission.create', ['id_user'=>$data->_id, 'id_customer'=> \Illuminate\Support\Facades\Auth::user()->organisasi['id']]) }}" class="btn btn-sm btn-primary">Kunjungan</a>--}}
                                                        </td>
                                                        </tfoot>
                                                    @endif

                                                </table>
                                            </form>

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
