@extends('user.master')

@section('content')
    <section>
        <div class="container box">
            <div class="section-header">
                Favorite Movies
            </div>
            <div class="row" style="min-height: 60vh;">
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
                                        @if (Auth::user())
                                        <div class="movie-favourate"
                                            style=" position: absolute; margin-left:85%;
                                                        margin-bottom:10px; border-radius: 50%;">
                                            {{-- <img style="width: 30px; height: 30px;" src="{{ asset('images/pink-heart.png') }}" alt=""> --}}
                                            <form action="{{ route('movies.deleteFavorite') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="movieId" value="{{ $movie->id }}">
                                                <button class="" type="submit"
                                                style=" background-image: url('{{ asset('images/pink-heart.png') }}');
                                                            background-size: cover;
                                                            background-color: black;
                                                            width:30px;
                                                            height: 30px;"
                                                data-movie-id="{{ $movie->id }}">
                                            </button>
                                            </form>
                                        </div>
                                    @endif
                                    </div>

                                </div>
                            </a>
                        </div>
                    @endforeach
                @else
                    <div>
                        <h2>This is no movies ...</h2>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
