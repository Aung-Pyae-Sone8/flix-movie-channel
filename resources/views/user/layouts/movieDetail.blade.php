<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Flix
    </title>
    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap"
        rel="stylesheet">
    <!-- OWL CAROUSEL -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" />
    <!-- BOX ICONS -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    {{-- font awesome  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- APP CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('css/grid.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/elegant-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plyr.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slicknav.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
</head>

<body>

    <!-- Anime Section Begin -->
    <section class="anime-details spad">
        <div class="container">
            <div class="anime__details__btn" style="margin-bottom: 20px;">
                {{-- <a href="#" class="follow-btn"><i class="fa fa-heart-o"></i> Follow</a> --}}
                <a href="{{ route('user#all') }}" class="watch-btn"><span>Back</span></a>
            </div>
            <div class="anime__details__content">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="anime__details__pic set-bg" data-setbg="">
                            {{-- <div class="comment"><i class="fa fa-comments"></i> 11</div>
                            <div class="view"><i class="fa fa-eye"></i> 9141</div> --}}
                            <img style="width: 300px; max-height: 450px;"
                                src="{{ asset('storage/images/movies/' . $movie->image) }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-8 offset-1">
                        <div class="anime__details__text">
                            <div class="anime__details__title">
                                <h3>{{ $movie->name }}</h3>
                                <span>Director - {{ $movie->director }}</span>
                            </div>
                            <div class="anime__details__rating" style="display: flex">
                                <div class="rating">
                                    <p href="#"><i class="fa fa-star me-5"></i> {{ $movie->rating }}</p>

                                </div>
                                @if (Auth::user())
                                    <div class="movie-favourate" style="margin-left:10px; border-radius: 50%;">
                                        {{-- <img style="width: 30px; height: 30px;" src="{{ asset('images/pink-heart.png') }}" alt=""> --}}
                                        @if (auth()->user()->favorites()->where('movie_id', $movie->id)->exists())
                                        <form action="{{ route('movies.deleteFavorite') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="movieId" value="{{ $movie->id }}">
                                            <button class="favorite-button1" type="submit"
                                                style=" background-image: url('{{ asset('images/pink-heart.png') }}');
                                                            background-size: cover;
                                                            background-color: black;
                                                            width:30px;
                                                            height: 30px;"
                                                data-movie-id="{{ $movie->id }}">
                                            </button>
                                        </form>
                                        @else
                                        <form action="{{ route('movies.addFavorite') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="movieId" value="{{ $movie->id }}">
                                            <button class="favorite-button1" type="submit"
                                                style=" background-image: url('{{ asset('images/white-heart.png') }}');
                                                            background-size: cover;
                                                            background-color: black;
                                                            width:30px;
                                                            height: 30px;"
                                                data-movie-id="{{ $movie->id }}">
                                            </button>
                                        </form>
                                        @endif
                                    </div>
                                @endif

                            </div>
                            <p>{{ $movie->description }}</p>
                            <div class="anime__details__widget">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <ul>
                                            <li><span>Type:</span> {{ $movie->type }}</li>
                                            <li><span>Released:</span> {{ $movie->release_year }}</li>
                                            <li><span>Genre:</span> {{ $genreName }}</li>
                                        </ul>
                                    </div>
                                    {{-- <div class="col-lg-6 col-md-6">
                                        <ul>
                                            <li><span>Scores:</span> 7.31 / 1,515</li>
                                            <li><span>Rating:</span> 8.5 / 161 times</li>
                                            <li><span>Duration:</span> 24 min/ep</li>
                                            <li><span>Quality:</span> HD</li>
                                            <li><span>Views:</span> 131,541</li>
                                        </ul>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="anime__details__btn">
                                {{-- <a href="#" class="follow-btn"><i class="fa fa-heart-o"></i> Follow</a> --}}
                                @if (Auth::user())
                                    @if (Auth::user()->type == 'free' || Auth::user()->type == 'pending')
                                        <a href="{{ route('user#payment') }}" class="watch-btn"><span>Download</span>
                                            <i class="fa fa-angle-right"></i></a>
                                    @endif
                                    @if (Auth::user()->type == 'premium')
                                        <a href="{{ $movie->movie_url }}" class="watch-btn"><span>Download</span> <i
                                                class="fa fa-angle-right"></i></a>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class=" col-lg-6">
                    <h3 class="text-white mb-5">Trailer</h3>
                    <video id="player" playsinline controls data-poster="">
                        <source src="{{ asset('storage/trailer/' . $movie->trailer) }}" type="video/mp4"
                            style="width: 100%;" />
                        <!-- Captions are optional -->
                        <track kind="captions" label="English captions" src="#" srclang="en" default />
                    </video>
                </div>
            </div>
            <div class="row mt-5">
                <div>
                    <h3 class="text-white mb-3">Comments</h3>
                    @if (Auth::user())
                        <form action="{{ route('user#postComment') }}" method="POST">
                            <div class="row">
                                @csrf
                                <input type="hidden" name="movieId" value="{{ $movie->id }}">
                                <div class="col-lg-6 col-md-6">
                                    <textarea name="comment" cols="50" rows="3" placeholder="Write your comment ..." class="form-control"></textarea>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <button type="submit" class="btn btn-danger">Post</button>
                                </div>

                            </div>
                        </form>
                    @endif

                </div>
            </div>
            <div class="row mt-5 border border-secondary rounded-lg p-3"
                style="height: 500px; background-color:rgb(43, 45, 46); overflow-y: scroll;">
                @foreach ($comments as $comment)
                    <div class="px-5 py-2 mb-2">
                        <h5>
                            @if ($comment->user_image != null)
                                <img src="{{ asset('storage/images/user/' . $comment->user_image) }}"
                                    style="width: 30px; height: 30px; border-radius:50%; margin-right:5px;"
                                    alt="">
                            @else
                                <img src="{{ asset('images/default.jpg') }}"
                                    style="width: 30px; height: 30px; border-radius:50%; margin-right:5px;"
                                    alt="">
                            @endif
                            <span class="text-white">{{ $comment->user_name }}</span>
                        </h5>
                        <p class="text-muted px-4 mt-2">{{ $comment->comment }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Anime Section End -->
</body>

<!-- JQUERY -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

{{-- <script>

    var favoriteHeartUrl = '{{ asset('images/white-heart.png') }}';
    var unfavoriteHeartUrl = '{{ asset('images/pink-heart.png') }}';


    $(document).ready(function() {
        $('.favorite-button1').click(function(event) {
            event.preventDefault();

            var button = $(this);
            var movieId = button.data('movie-id');
            var isFavorited = button.css('background-image').includes('pink-heart.png');
            var url = isFavorited ? 'user/movies/' + movieId + 'unfavorite' : 'user/movies/' +
                movieId +
                '/favorite';

            console.log(url);

            $.ajax({
                type: 'POST',
                url: url,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.status === 'favorited') {
                        button.css('background-image', 'url(' + unfavoriteHeartUrl + ')');
                    } else if (response.status === 'unfavorited') {
                        button.css('background-image', 'url(' + favoriteHeartUrl + ')');
                        // Optionally remove the button if unfavorited
                        // if (window.location.pathname === 'user/movies/favorites') {
                        //     console.log('hello');
                        //     button.closest('.col-md-3')
                        // .remove(); // Remove the movie card from the DOM
                        // }
                    }
                    // if (url.includes('unfavorite')) {
                    //     button.closest('.col-md-3')
                    // .remove(); // Remove the movie card from the DOM
                    // }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', status, error);
                }
            });
        });
    });
</script> --}}

</html>

</html>
