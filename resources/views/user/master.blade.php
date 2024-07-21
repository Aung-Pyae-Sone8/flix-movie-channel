<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    <!-- APP CSS -->
    <link rel="stylesheet" href="{{ asset('css/grid.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>

<body>

    <!-- NAV -->
    <div class="nav-wrapper">
        <div class="container">
            <div class="nav">
                <a href="{{ route('user#home') }}" class="logo">
                    <i class='bx bx-movie-play bx-tada main-color'></i>Fl<span class="main-color">i</span>x
                </a>

                <ul class="nav-menu" id="nav-menu">
                    <form action="{{ route('user#all') }}" class="search-box" method="GET">
                        @csrf
                        <div class="search ">
                            <input type="text" placeholder="Search ..." name="key" value="{{ request('key') }}">
                        </div>
                        <div class="src-btn">
                            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </form>
                    <li><a href="{{ route('user#home') }}">Home</a></li>
                    <li><a href="{{ route('user#all') }}">All</a></li>
                    <li><a href="{{ route('user#cartoon') }}">Cartoon</a></li>
                    <li><a href="{{ route('user#movie') }}">Movies</a></li>
                    <li><a href="{{ route('user#series') }}">Series</a></li>
                    @if (Auth::user())
                        <li><a href="{{ route('movies.favorites') }}">Favorites</a></li>
                    @endif
                    <li>
                        @if (Auth::user())
                            <a href="{{ route('user#profile') }}">
                                @if (Auth::user()->image != null)
                                    <img src="{{ asset('storage/images/user/' . Auth::user()->image) }}"
                                        style="height: 40px; width: 40px; border-radius: 50%;" alt="">
                                @else
                                    <img src="{{ asset('images/default.jpg') }}"
                                        style="height: 40px; width: 40px; border-radius: 50%;" alt="">
                                @endif
                            </a>
                        @else
                            <a href="{{ route('auth#loginPage') }}" class="btn btn-hover">
                                <span>Sign in</span>
                            </a>
                        @endif
                    </li>
                </ul>
                <!-- MOBILE MENU TOGGLE -->
                <div class="hamburger-menu" id="hamburger-menu">
                    <div class="hamburger"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- END NAV -->

    @yield('content')

    <!-- FOOTER SECTION -->
    <footer class="section">
        <div class="container">
            <div class="row">
                <div class="col-4 col-md-6 col-sm-12">
                    <div class="content">
                        <a href="#" class="logo">
                            <i class='bx bx-movie-play bx-tada main-color'></i>Fl<span class="main-color">i</span>x
                        </a>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut veniam ex quos hic id nobis
                            beatae earum sapiente! Quod ipsa exercitationem officiis non error illum minima iusto et.
                            Dolores, quibusdam?
                        </p>
                        <div class="social-list">
                            <a href="#" class="social-item">
                                <i class="bx bxl-facebook"></i>
                            </a>
                            <a href="#" class="social-item">
                                <i class="bx bxl-twitter"></i>
                            </a>
                            <a href="#" class="social-item">
                                <i class="bx bxl-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-8 col-md-6 col-sm-12">
                    <div class="row">
                        <div class="col-3 col-md-6 col-sm-6">
                            <div class="content">
                                <p><b>Flix</b></p>
                                <ul class="footer-menu">
                                    <li><a href="#">About us</a></li>
                                    <li><a href="#">My profile</a></li>
                                    <li><a href="#">Pricing plans</a></li>
                                    <li><a href="#">Contacts</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-3 col-md-6 col-sm-6">
                            <div class="content">
                                <p><b>Browse</b></p>
                                <ul class="footer-menu">
                                    <li><a href="#">About us</a></li>
                                    <li><a href="#">My profile</a></li>
                                    <li><a href="#">Pricing plans</a></li>
                                    <li><a href="#">Contacts</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-3 col-md-6 col-sm-6">
                            <div class="content">
                                <p><b>Help</b></p>
                                <ul class="footer-menu">
                                    <li><a href="#">About us</a></li>
                                    <li><a href="#">My profile</a></li>
                                    <li><a href="#">Pricing plans</a></li>
                                    <li><a href="#">Contacts</a></li>
                                </ul>
                            </div>
                        </div>
                        {{-- <div class="col-3 col-md-6 col-sm-6">
                            <div class="content">
                                <p><b>Download app</b></p>
                                <ul class="footer-menu">
                                    <li>
                                        <a href="#">
                                            <img src="./images/google-play.png" alt="">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="./images/app-store.png" alt="">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- END FOOTER SECTION -->

    <!-- COPYRIGHT SECTION -->
    <div class="copyright">
        Copyright 2021 <a href="https://www.youtube.com/channel/UCnNgtK4tGlWcceXVzoyTg8Q" target="_blank">
            Tuat Tran Anh</a>
    </div>
    <!-- END COPYRIGHT SECTION -->

    <!-- SCRIPT -->
    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3./jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    <!-- OWL CAROUSEL -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous"></script>
    <!-- APP SCRIPT -->
    <script src="{{ asset('js/app.js') }}"></script>

    {{-- <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/mixitup.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/player.js') }}"></script> --}}

</body>
@yield('scriptSource')
<script>
    // $(document).ready(function() {
    //     $('.addFavourate').click(function() {
    //         console.log('hello world');
    //         event.preventDefault();
    //         $source = {
    //             // 'userId': $(this).closest('.col-3').find('.userId').val(),
    //             'movieId': $(this).closest('.col-3').find('.movieId').val(),
    //             'status': true,
    //         };
    //         console.log($source);

    //         $.ajax({
    //             type: 'GET',
    //             url: 'http://127.0.0.1:8000/user/ajax/addFavourate',
    //             // headers: {
    //             //     'Authorization': 'Bearer YOUR_API_TOKEN'
    //             // },
    //             data: $source,
    //             dataType: 'json'
    //         })
    //     })
    // })

    var favoriteHeartUrl = '{{ asset('images/white-heart.png') }}';
    var unfavoriteHeartUrl = '{{ asset('images/pink-heart.png') }}';


    $(document).ready(function() {
        $('.favorite-button').click(function(event) {
            event.preventDefault();

            var button = $(this);
            var movieId = button.data('movie-id');
            var isFavorited = button.css('background-image').includes('pink-heart.png');
            var url = isFavorited ? 'user/movies/' + movieId + '/unfavorite' : 'user/movies/' +
                movieId +
                '/favorite';

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
</script>

</html>

</html>
