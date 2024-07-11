@extends('user.master')

@section('content')
    <section>
        <div class="container box">
            <div class="section-header">
                All movies
            </div>
            <div class="row" style="min-height: 60vh">
                @if (count($movies) != 0)
                    @foreach ($movies as $movie)
                        <div class="col-3 col-md-4 col-sm-4 mb-5">
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
                @else
                <div class="col-12">
                    <h2>There is no movie ...</h2>
                </div>
                @endif
            </div>
        </div>
    </section>
@endsection
