@extends('auth.layout.main')

@section('content')

<div class="row justify-content-center">

    <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto">

        <div class="card o-hidden border-0 shadow-lg my-5" style="background: linear-gradient(135deg, #2c2c2c, #000);">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-white mb-4">Form Register</h1>
                            </div>
                            <form class="user">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                    placeholder="Nama">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email Address">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="No Telepon">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" id="exampleInputEmail"
                                    placeholder="Password">
                                </div>
                                <a href="" class="btn btn-warning btn-user btn-block">
                                    Register Akun
                                </a>
                                <hr>
                                <a href="index.html" class="btn btn-primary btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="/login">Sudah punya akun? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection

