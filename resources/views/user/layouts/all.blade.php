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
                                    @if (Auth::user())
                                        <input type="hidden" id="userId" value="{{ Auth::user()->id }}">
                                    @endif
                                    <input type="hidden" id="movieId" value="{{ $movie->id }}">
                                    <div class="movie-infos">
                                        <div class="movie-info">
                                            <div class="movie-info">
                                                <i class="bx bxs-star bxs-blue"></i>
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
                                        <div class="movie-favourate"
                                            style="position: absolute; margin-left:22em; margin-bottom:50px; border-radius: 50%;">
                                            {{-- <img style="width: 30px; height: 30px;" src="{{ asset('images/pink-heart.png') }}" alt=""> --}}
                                            <button class="addFavourate" type="button"
                                                style="width: 50px; height: 50px; padding: 10px; background-color: black; outline: none;">
                                                <img style="margin-top:10px; margin-left:10px;"
                                                    src="{{ asset('images/pink-heart.png') }}" alt="">
                                            </button>
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
