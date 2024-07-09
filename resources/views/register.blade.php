<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Anime Template">
    <meta name="keywords" content="Anime, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Anime | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/plyr.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <a href="javascript:history.back()" class="site-btn" style="margin: 20px 0px 0px 20px;">Back</a>

    <!-- Normal Breadcrumb Begin -->
    <section class="normal-breadcrumb set-bg" data-setbg="img/normal-breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="normal__breadcrumb__text">
                        <h2>Sign Up</h2>
                        <p>Welcome to the official Anime blog.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Normal Breadcrumb End -->

    <!-- Signup Section Begin -->
    <section class="signup spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login__form">
                        <form action="{{ route('register') }}" method="post">
                            @csrf
                            @error('terms')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror

                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <div class="input__item">
                                <input type="email" name="email" placeholder="Email address">
                                <span class="icon_mail"></span>
                            </div>

                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <div class="input__item">
                                <input type="text" name="name" placeholder="Your Name">
                                <span class="icon_profile"></span>
                            </div>

                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <div class="input__item">
                                <input type="password" name="password" placeholder="Password">
                                <span class="icon_lock"></span>
                            </div>

                            @error('password_confirmation')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <div class="input__item">
                                <input type="password" placeholder="password_confirmation" name="password_confirmation">
                                <span class="icon_lock"></span>
                            </div>

                            @error('phone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <div class="input__item">
                                <input type="number" name="phone" placeholder="Phone number">
                                <span class="icon_profile"></span>
                            </div>

                            @error('address')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <div class="input__item">
                                <input type="text" name="address" placeholder="Address">
                                <span class="icon_profile"></span>
                            </div>

                            @error('gender')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <div class="text-muted">
                                <select name="gender" class="input__select" id="">
                                    <option value="">Choose Gender...</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>

                            </div>
                            <button type="submit" class="site-btn">Register</button>
                        </form>
                        {{-- <h5>Already have an account? <a href="#">Log In!</a></h5> --}}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login__register">
                        <h3>Already Have An Account?</h3>
                        <a href="{{ route('auth#loginPage') }}" class="primary-btn">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Signup Section End -->

    <!-- Js Plugins -->
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/player.js') }}"></script>
    <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('js/mixitup.min.js') }}"></script>
    <script src="{{ asset('js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
