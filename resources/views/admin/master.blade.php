<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern,  html5, responsive">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield('title')</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin/img/favicon.png') }}">

    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/dataTables.bootstrap4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/plugins/select2/css/select2.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/plugins/owlcarousel/owl.carousel.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
</head>

<body>
    <div id="global-loader">
        <div class="whirly-loader"> </div>
    </div>

    <div class="main-wrapper">

        <div class="header">

            <div class="header-left active">
                <a href="{{ route('admin#dashboard') }}" class="logo">
                    <img src="{{ asset('admin/img/logo.png') }}" alt="">
                </a>
                <a href="{{ route('admin#dashboard') }}" class="logo-small">
                    <img src="{{ asset('admin/img/logo-small.png') }}" alt="">
                </a>
                <a id="toggle_btn" href="javascript:void(0);">
                </a>
            </div>

            <a id="mobile_btn" class="mobile_btn" href="#sidebar">
                <span class="bar-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>

            <ul class="nav user-menu">

                <li class="nav-item dropdown has-arrow main-drop">
                    <a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
                        <span class="user-img">
                            @if (Auth::user()->image != null)
                                <img src="{{ asset('storage/images/user/' . Auth::user()->image) }}" alt="">
                            @else
                                <img src="{{ asset('images/default.jpg') }}" alt="">
                            @endif
                            <span class="status online"></span>
                        </span>
                    </a>
                    <div class="dropdown-menu menu-drop-user">
                        <div class="profilename">
                            <div class="profileset">
                                <span class="user-img">
                                    @if (Auth::user()->image != null)
                                        <img src="{{ asset('storage/images/user/' . Auth::user()->image) }}"
                                            alt="">
                                    @else
                                        <img src="{{ asset('images/default.jpg') }}" alt="">
                                    @endif
                                    <span class="status online"></span>
                                </span>
                                <div class="profilesets">
                                    <h6>{{ Auth::user()->name }}</h6>
                                    <h5>{{ Auth::user()->email }}</h5>
                                </div>
                            </div>
                            <hr class="m-0">
                            <a class="dropdown-item" href="{{ route('admin#profile', Auth::user()->id) }}"> <i
                                    class="me-2" data-feather="user"></i>
                                My Profile</a>
                            {{-- <a class="dropdown-item" href="generalsettings.html"><i class="me-2"
                                    data-feather="settings"></i>Settings</a>
                            <hr class="m-0"> --}}
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="dropdown-item logout pb-0"><img
                                        src="{{ asset('admin/img/icons/log-out.svg') }}" class="me-2"
                                        alt="img">Logout</button>
                            </form>
                        </div>
                    </div>
                </li>
            </ul>


            <div class="dropdown mobile-user-menu">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{{ route('admin#profile', Auth::user()->id) }}">My Profile</a>
                    <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                </div>
            </div>

        </div>


        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="active">
                            <a href="{{ route('admin#dashboard') }}"><img
                                    src="{{ asset('admin/img/icons/dashboard.svg') }}" alt="img">
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="{{ asset('admin/img/icons/product.svg') }}"
                                    alt="img"><span>
                                    Lists</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ route('genre#list') }}">Genres List</a></li>
                                <li><a href="{{ route('movie#list') }}">Movies List</a></li>
                                <li><a href="{{ route('user#list') }}">User List</a></li>
                                {{-- <li><a href="categorylist.html">Category List</a></li>
                                <li><a href="addcategory.html">Add Category</a></li>
                                <li><a href="subcategorylist.html">Sub Category List</a></li>
                                <li><a href="subaddcategory.html">Add Sub Category</a></li>
                                <li><a href="brandlist.html">Brand List</a></li>
                                <li><a href="addbrand.html">Add Brand</a></li>
                                <li><a href="importproduct.html">Import Products</a></li>
                                <li><a href="barcode.html">Print Barcode</a></li> --}}
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="page-wrapper">
            <div class="content">
                @yield('content')
            </div>
        </div>
        @yield('model')
    </div>


    <script src="{{ asset('admin/js/jquery-3.6.0.min.js') }}"></script>

    <script src="{{ asset('admin/js/feather.min.js') }}"></script>

    <script src="{{ asset('admin/js/jquery.slimscroll.min.js') }}"></script>

    <script src="{{ asset('admin/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/js/dataTables.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('admin/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('admin/plugins/apexchart/apexcharts.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/apexchart/chart-data.js') }}"></script>

    <script src="{{ asset('admin/plugins/select2/js/select2.min.js') }}"></script>

    <script src="{{ asset('admin/plugins/sweetalert/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/sweetalert/sweetalerts.min.js') }}"></script>

    <script src="{{ asset('admin/plugins/owlcarousel/owl.carousel.min.js') }}"></script>

    <script src="{{ asset('admin/plugins/select2/js/select2.min.js') }}"></script>

    <script src="{{ asset('admin/js/script.js') }}"></script>
</body>

</html>
