@extends('layout.auth')
@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="/"><b>{{ env('APP_NAME') }}</b></a>
        </div>

        <div class="card">
            <div class="card-img text-center">
                <img class="small card-img w-50" src="{{ env('APP_LOGO') }}">
            </div>
            <div class="card-body login-card-body">

                @if(session('success') != null)
                    <p class="login-box-msg text-success">{{ session('success') }}</p>
                @elseif(session('danger') != null)
                    <p class="login-box-msg text-danger">{{ session('danger') }}</p>
                @else
                    <p class="login-box-msg">Enter email to create new OTP.</p>
                @endif
                <form action="{{ route('auth.create.new_otp') }}" method="post">
                    @csrf
                    <div class="mb-1">
                        <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
                        @error('email')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-1">
                        <input type="number" class="form-control" placeholder="Phone Number" name="nomor_telepon" value="{{ old('nomor_telepon') }}">
                        @error('nomor_telepon')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Create New OTP</button>
                        </div>
                    </div>
                </form>
                    <hr>
                    <p class="mt-3 mb-0"><a href="{{ route('auth.activate') }}" class="text-center">Account Activation</a></p>
                    <p class="mb-1"><a href="{{ route('auth.login') }}">Login</a></p>
                    <p class="mb-0"><a href="{{ route('auth.register') }}" class="text-center">Register</a></p>
            </div>

        </div>
    </div>
@endsection
