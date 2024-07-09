@extends('user.master')

@section('content')
    <section>
        <div class="container box">
            <div class="section-header">
                latest movies
            </div>
            <div class="row">
                @foreach ($movies as $movie)
                    <div class="col-3 col-md-4 col-sm-4 mb-5">
                        <a href="{{ route('user#movieDetail', $movie->id) }}" class="movie-item">
                            <img src="{{ asset('storage/images/movies/'.$movie->image) }}" alt="">
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
                                        {{ $movie->genre_name }}
                                    </div>
                                    <div class="movie-info">
                                        <span>HD</span>
                                    </div>
                                    <div class="movie-info">
                                        <span>{{ $movie->type }}</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
