@extends('auth.layout.main')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="p-5">
            <div class="text-center">
                <h1 class="text-warning font-weight-bold">HOTELIN</h1>
            </div>
            <div class="text-center">
                <h1 class="h4 mb-4 text-white font-weight-bold">Form Login</h1>
            </div>
            @if(session('loginError'))
            <div class="alert alert-danger">
                {{ session('loginError') }}
            </div>
            @endif

            <form class="user" action="/authenticate" method="POST">
                @csrf
                <div class="form-group">
                    <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror"
                        id="email" aria-describedby="email"
                        placeholder="Enter Email Address..." style="font-size: 15px;" name="email" required>
                        @error('email')
                        <div class="invalid-feedback px-3">
                            {{ $message }}
                        </div>
                       @enderror
                </div>
                <div class="form-group">
                    <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                        id="password" placeholder="Password" style="font-size: 15px" name="password">
                        @error('password')
                        <div class="invalid-feedback px-3">
                            {{ $message }}
                        </div>
                       @enderror
                </div>
                <button type="submit" class="btn btn-danger btn-user btn-block font-weight-bold" style="font-size: 15px">
                    Login
                </button>
                <hr>
                <a href="index.html" class="btn btn-primary btn-user btn-block" style="font-size: 15px">
                    <i class="fab fa-google fa-fw"></i> Login dengan Google
                </a>
            </form>
            
            <hr>
            <div class="text-center">
                <a class="small text-white" href="forgot-password.html">Lupa Password?</a>
            </div>
            <div class="text-center ">
                <a class="small text-white" href="/register">Buat Akun!</a>
            </div>
        </div>
    </div>
</div>

@endsection
