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

                </div>

            </div>

        </div>
            <!-- /.container-fluid -->
    </section>
@endsection
