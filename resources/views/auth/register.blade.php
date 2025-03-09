@extends('auth.layout.main')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 mb-4 text-white font-weight-bold">Form Register</h1>
            </div>
            @if(session('verifyGagals'))
            <div class="alert alert-danger">
                {{ session('verifyGagals') }}
            </div>
            @endif
             @if(session('verifyGagal'))
            <div class="alert alert-danger">
                {{ session('verifyGagal') }}
            </div>
            @endif
            <form class="user" action="/store" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror" id="name"
                    placeholder="Nama" name="name" required style="font-size: 15px;">
                    @error('name')
                    <div class="invalid-feedback px-3">
                        {{ $message }}
                    </div>
                   @enderror
                </div>
                <div class="form-group">
                    <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="email"
                        placeholder="Email Address" name="email" required style="font-size: 15px;">
                    @error('email')
                    <div class="invalid-feedback px-3">
                        {{ $message }}
                    </div>
                   @enderror
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user @error('phone') is-invalid @enderror" id="phone"
                        placeholder="No Telepon" name="phone" required style="font-size: 15px;">
                        @error('phone')
                        <div class="invalid-feedback px-3">
                            {{ $message }}
                        </div>
                       @enderror
                </div>
                <div class="form-group">
                    <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="password"
                    placeholder="Password" name="password" required style="font-size: 15px;">
                    @error('password')
                    <div class="invalid-feedback px-3">
                        {{ $message }}
                    </div>
                   @enderror
                </div>
                <button type="submit" class="btn btn-warning btn-user btn-block font-weight-bold">
                    Register Akun
                </button>
                <hr>
                <a href="index.html" class="btn btn-primary btn-user btn-block">
                    <i class="fab fa-google fa-fw"></i> Register with Google
                </a>
            </form>

            <hr>
            <div class="text-center ">
                <a class="small text-white" href="/login">Sudah punya akun? Login!</a>
            </div>
        </div>
    </div>
</div>

@endsection

