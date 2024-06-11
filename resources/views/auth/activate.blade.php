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
                <p class="login-box-msg">Enter OTP and email to activate this account.</p>
                @if(session('success') != null)
                    <p class="login-box-msg text-success">{{ session('success') }}</p>
                @elseif(session('danger') != null)
                    <p class="login-box-msg text-success">{{ session('danger') }}</p>
                @endif
                <form action="{{ route('auth.do_activate') }}" method="post">
                    @csrf
                    <div class="mb-1">
                        <input type="number" class="form-control" placeholder="OTP" name="otp" value="{{ old('otp') }}">
                        @error('otp')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-1">
                        <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
                        @error('email')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Activate Now</button>
                        </div>
                    </div>
                </form>
                <hr>
                <p class="mb-0"><a href="{{ route('auth.login') }}">Login</a></p>
                <p class="mb-0"><a href="{{ route('auth.register') }}" class="text-center">Register</a></p>
                <p class="mb-0"><a href="{{ route('auth.new_otp') }}">Create New OTP</a></p>
            </div>

        </div>
    </div>
@endsection
