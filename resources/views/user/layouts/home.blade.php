@extends('user.master')

@section('content')
    <!-- HERO SECTION -->
    <div class="hero-section">
        <!-- HERO SLIDE -->
        <div class="hero-slide">
            <div class="owl-carousel carousel-nav-center" id="hero-carousel">
                <!-- SLIDE ITEM -->
                <div class="hero-slide-item">
                    <img src="{{ asset('images/black-banner.png') }}" alt="">
                    <div class="overlay"></div>
                    <div class="hero-slide-item-content">
                        <div class="item-content-wraper">
                            <div class="item-content-title top-down">
                                Black Panther
                            </div>
                            <div class="movie-infos top-down delay-2">
                                <div class="movie-info">
                                    <i class="bx bxs-star"></i>
                                    <span>9.5</span>
                                </div>
                                <div class="movie-info">
                                    <i class="bx bxs-time"></i>
                                    <span>120 mins</span>
                                </div>
                                <div class="movie-info">
                                    <span>HD</span>
                                </div>
                                <div class="movie-info">
                                    <span>16+</span>
                                </div>
                            </div>
                            <div class="item-content-description top-down delay-4">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas, possimus eius. Deserunt
                                non odit, cum vero reprehenderit laudantium odio vitae autem quam, incidunt molestias
                                ratione mollitia accusantium, facere ab suscipit.
                            </div>
                            <div class="item-action top-down delay-6">
                                <a href="{{ route('user#all') }}" class="btn btn-hover">
                                    <i class="bx bxs-right-arrow"></i>
                                    <span>Watch now</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END SLIDE ITEM -->
                <!-- SLIDE ITEM -->
                <div class="hero-slide-item">
                    <img src="{{ asset('images/supergirl-banner.jpg') }}" alt="">
                    <div class="overlay"></div>
                    <div class="hero-slide-item-content">
                        <div class="item-content-wraper">
                            <div class="item-content-title top-down">
                                Supergirl
                            </div>
                            <div class="movie-infos top-down delay-2">
                                <div class="movie-info">
                                    <i class="bx bxs-star"></i>
                                    <span>9.5</span>
                                </div>
                                <div class="movie-info">
                                    <i class="bx bxs-time"></i>
                                    <span>120 mins</span>
                                </div>
                                <div class="movie-info">
                                    <span>HD</span>
                                </div>
                                <div class="movie-info">
                                    <span>16+</span>
                                </div>
                            </div>
                            <div class="item-content-description top-down delay-4">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas, possimus eius. Deserunt
                                non odit, cum vero reprehenderit laudantium odio vitae autem quam, incidunt molestias
                                ratione mollitia accusantium, facere ab suscipit.
                            </div>
                            <div class="item-action top-down delay-6">
                                <a href="{{ route('user#all') }}" class="btn btn-hover">
                                    <i class="bx bxs-right-arrow"></i>
                                    <span>Watch now</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END SLIDE ITEM -->
                <!-- SLIDE ITEM -->
                <div class="hero-slide-item">
                    <img src="{{ asset('images/wanda-banner.jpg') }}" alt="">
                    <div class="overlay"></div>
                    <div class="hero-slide-item-content">
                        <div class="item-content-wraper">
                            <div class="item-content-title top-down">
                                Wanda Vision
                            </div>
                            <div class="movie-infos top-down delay-2">
                                <div class="movie-info">
                                    <i class="bx bxs-star"></i>
                                    <span>9.5</span>
                                </div>
                                <div class="movie-info">
                                    <i class="bx bxs-time"></i>
                                    <span>120 mins</span>
                                </div>
                                <div class="movie-info">
                                    <span>HD</span>
                                </div>
                                <div class="movie-info">
                                    <span>16+</span>
                                </div>
                            </div>
                            <div class="item-content-description top-down delay-4">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas, possimus eius. Deserunt
                                non odit, cum vero reprehenderit laudantium odio vitae autem quam, incidunt molestias
                                ratione mollitia accusantium, facere ab suscipit.
                            </div>
                            <div class="item-action top-down delay-6">
                                <a href="{{ route('user#all') }}" class="btn btn-hover">
                                    <i class="bx bxs-right-arrow"></i>
                                    <span>Watch now</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END SLIDE ITEM -->
            </div>
        </div>
        <!-- END HERO SLIDE -->
    </div>
    <!-- END HERO SECTION -->

    <!-- LATEST MOVIES SECTION -->
    @if (Auth::user())
        <div class="section">
            <div class="container">
                <div class="section-header">
                    recent movies
                </div>
                <div class="movies-slide carousel-nav-center owl-carousel">
                    <!-- MOVIE ITEM -->
                    @foreach ($recentViews as $recentView)
                        <a href="{{ route('user#movieDetail', $recentView->movie->id) }}" class="movie-item">
                            <img src="{{ asset('storage/images/movies/' . $recentView->movie->image) }}" alt="">
                            <div class="movie-item-content">
                                <div class="movie-item-title">
                                    {{ $recentView->movie->name }}
                                </div>
                                <div class="movie-infos">
                                    <div class="movie-info">
                                        <i class="bx bxs-star"></i>
                                        <span>{{ $recentView->movie->rating }}</span>
                                    </div>
                                    <div class="movie-info">
                                        <span>HD</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach

                </div>
            </div>
        </div>
    @endif
    <!-- END LATEST MOVIES SECTION -->

    <!-- LATEST MOVIES SECTION -->
    <div class="section">
        <div class="container">
            <div class="section-header">
                latest movies
            </div>
            <div class="movies-slide carousel-nav-center owl-carousel">
                <!-- MOVIE ITEM -->
                @foreach ($movies as $movie)
                    <a href="{{ route('user#movieDetail', $movie->id) }}" class="movie-item">
                        <img src="{{ asset('storage/images/movies/' . $movie->image) }}" alt="">
                        <div class="movie-item-content">
                            <div class="movie-item-title">
                                {{ $movie->name }}
                            </div>
                            <div class="movie-infos">
                                <div class="movie-info">
                                    <i class="bx bxs-star"></i>
                                    <span>{{ $movie->rating }}</span>
                                </div>
                                <div class="movie-info">
                                    <span>HD</span>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach

            </div>
        </div>
    </div>
    <!-- END LATEST MOVIES SECTION -->

    <!-- LATEST SERIES SECTION -->
    <div class="section">
        <div class="container">
            <div class="section-header">
                latest series
            </div>
            <div class="movies-slide carousel-nav-center owl-carousel">
                <!-- MOVIE ITEM -->
                @foreach ($series as $serie)
                    <a href="{{ route('user#movieDetail', $serie->id) }}" class="movie-item">
                        <img src="{{ asset('storage/images/movies/' . $serie->image) }}" alt="">
                        <div class="movie-item-content">
                            <div class="movie-item-title">
                                {{ $serie->name }}
                            </div>
                            <div class="movie-infos">
                                <div class="movie-info">
                                    <i class="bx bxs-star"></i>
                                    <span>{{ $serie->rating }}</span>
                                </div>
                                <div class="movie-info">
                                    <span>HD</span>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
    <!-- END LATEST SERIES SECTION -->

    <!-- LATEST CARTOONS SECTION -->
    <div class="section">
        <div class="container">
            <div class="section-header">
                latest cartoons
            </div>
            <div class="movies-slide carousel-nav-center owl-carousel">
                <!-- MOVIE ITEM -->
                @foreach ($cartoons as $cartoon)
                    <a href="{{ route('user#movieDetail', $cartoon->id) }}" class="movie-item">
                        <img src="{{ asset('storage/images/movies/' . $cartoon->image) }}" alt="">
                        <div class="movie-item-content">
                            <div class="movie-item-title">
                                {{ $cartoon->name }}
                            </div>
                            <div class="movie-infos">
                                <div class="movie-info">
                                    <i class="bx bxs-star"></i>
                                    <span>{{ $cartoon->rating }}</span>
                                </div>
                                <div class="movie-info">
                                    <span>HD</span>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
                <!-- END MOVIE ITEM -->
            </div>
        </div>
    </div>
    <!-- END LATEST CARTOONS SECTION -->
@endsection
