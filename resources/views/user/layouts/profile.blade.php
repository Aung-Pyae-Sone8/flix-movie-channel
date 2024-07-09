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
    {{-- <link rel="stylesheet" href="all{{ asset('css/bootstrap.min.css') }}"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
            <div class="anime__details__btn mb-5" style="margin-bottom: 20px;">
                {{-- <a href="#" class="follow-btn"><i class="fa fa-heart-o"></i> Follow</a> --}}
                <a href="javascript:history.back()" class="watch-btn"><span>Back</span></a>
            </div>
            @if (session('updateSuccess'))
                <div class="row">
                    <div class="alert alert-success alert-dismissible col-12" role="alert">
                        <strong><i class="fa-solid fa-circle-check me-2"></i>{{ session('updateSuccess') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
            @if (session('changeSuccess'))
            <div class="row">
                <div class="alert alert-success alert-dismissible col-12" role="alert">
                    <strong><i class="fa-solid fa-circle-check me-2"></i>{{ session('changeSuccess') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
            <div class="row justify-center text-white">

                <div class="col-lg-10 ">
                    <h2 class="px-4 border-danger border-left mb-5">Profile @if (Auth::user()->type == 'free')
                            <a href="{{ route('user#paymentPage') }}" class="btn btn-warning"><i
                                    class="fa-solid fa-plus"></i> Upgrade to Premium <small>15000mmk</small></a>
                        @endif
                    </h2>

                    <div class="row mb-5">
                        <div class="col-lg-5 mb-5">
                            <div class="mb-5">
                                <div style="height: 205px; width: 200px; border: 3px solid red; border-radius: 50%;">
                                    @if (Auth::user()->image == null)
                                        <img class="" style="height: 200px; width: 200px; border-radius: 50%;"
                                            src="{{ asset('storage/images/user/default.jpg') }}" alt="profile picture">
                                    @else
                                        <img class="" style="height: 200px; width: 200px; border-radius: 50%;"
                                            src="{{ asset('storage/images/user/' . Auth::user()->image) }}"
                                            alt="profile picture">
                                    @endif
                                </div>
                            </div>
                            <div>
                                @if (Auth::user()->type == 'free')
                                    <span class="mb-3 d-block text-center fw-bold"
                                        style="font-size: small; background-color:green; padding: 3px 5px 3px 5px;">Free
                                        User</span>
                                @endif
                                @if (Auth::user()->type == 'pending')
                                    <span class="mb-3 d-block text-center fw-bold"
                                        style="font-size: small; background-color:orange; padding: 3px 5px 3px 5px;">Pending</span>
                                @endif
                                @if (Auth::user()->type == 'premium')
                                    <span class="mb-3 d-block text-center fw-bold"
                                        style="font-size: small; background-color:red; padding: 3px 5px 3px 5px;">Premium
                                        User</span>
                                @endif
                                <table style="width: 100%; font-weight:bold; font-size:large">
                                    <tr>
                                        <td>Name :</td>
                                        <td>{{ Auth::user()->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Email :</td>
                                        <td>{{ Auth::user()->email }} </td>
                                    </tr>
                                    <tr>
                                        <td>Gender :</td>
                                        <td>{{ Auth::user()->gender }}</td>
                                    </tr>
                                    <tr>
                                        <td>Address :</td>
                                        <td>{{ Auth::user()->address }}</td>
                                    </tr>
                                    <tr>
                                        <td>Phone :</td>
                                        <td>{{ Auth::user()->phone }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-6 offset-lg-1 p-3 rounded mb-5" style="background-color: rgb(44, 42, 42)">
                            <h4 class="mb-5">Update your profile</h4>
                            <form action="{{ route('user#updateProfile') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            value="{{ old('name', Auth::user()->name) }}">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <input type="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            value="{{ old('email', Auth::user()->email) }}">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <input type="text" name="address"
                                            class="form-control @error('address') is-invalid @enderror"
                                            value="{{ old('address', Auth::user()->address) }}">
                                        @error('address')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <input type="text" name="phone"
                                            class="form-control @error('phone') is-invalid @enderror"
                                            value="{{ old('phone', Auth::user()->phone) }}">
                                        @error('phone')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-8">
                                        <select name="gender"
                                            class="form-control @error('gender') is-invalid @enderror">
                                            <option value="male"
                                                {{ Auth::user()->gender == 'male' ? 'selected' : '' }}>Male
                                            </option>
                                            <option value="female"
                                                {{ Auth::user()->gender == 'female' ? 'selected' : '' }}>Female
                                            </option>
                                        </select>
                                        @error('gender')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-8">
                                        <label for="image">Update Profile Image</label>
                                        <input type="file" name="image"
                                            class="form-control @error('image') is-invalid @enderror">
                                        @error('image')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-1">
                                        <button class="btn btn-danger">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <form action="{{ route('user#changePassword') }}" method="post">
                        @csrf
                        <div class="row my-5">
                            <div class="col-lg-6 p-3">
                                <h4 class="mb-5 border-left border-danger px-4">Change password</h4>
                                <div class="row mb-4">
                                    <div class="col-12 mb-3">
                                        <input type="password" name="oldPassword"
                                            class="form-control @error('oldPassword') is-invalid @enderror"
                                            placeholder="Current password">
                                        @error('oldPassword')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        @if(session('notMatch'))
                                            <small class="text-danger">
                                                {{ session('notMatch') }}
                                            </small>
                                        @endif
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="password" name="newPassword"
                                            class="form-control @error('newPassword') is-invalid @enderror"
                                            placeholder="New password">
                                        @error('newPassword')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <input type="password" name="confirmPassword"
                                            class="form-control @error('confirmPassword') is-invalid @enderror"
                                            placeholder="Confirm new password">
                                        @error('confirmPassword')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-1">
                                        <button type="submit" class="btn btn-danger">Change</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Anime Section End -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>


    {{-- <script src="{{ asset('js/bootstrap.min.js') }}"></script> --}}


    {{-- <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/mixitup.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/player.js') }}"></script> --}}
    <script>
        console.log('helo');
    </script>

</body>

</html>

</html>
