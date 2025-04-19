@extends('user.layout.main')


@section('content')
    
    <header id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach($HeroSection as $hero)
            <div class="carousel-item active" style="background: url('/images/slider/{{ $hero->image }}') center/cover no-repeat;">
                <div class="container d-flex flex-column justify-content-center align-items-center text-center text-white h-100">
                    <h1 class="fw-bold text-uppercase">{{ $hero->title }}</h1>
                    <p class="lead">{{ $hero->subtitle }}</p>
                </div>
            </div>
            @endforeach
         
        </div>
    
        <!-- Navigasi panah -->
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </header>
    
    <!-- Tentang Kami-->
    @include('user.layout.about')

      <!-- Rooms-->
    @include('user.layout.rooms')
    
    <!-- Gallery -->
    @include('user.layout.gallery')

     {{-- Attractions --}}
    @include('user.layout.attractions')

        
   

@endsection