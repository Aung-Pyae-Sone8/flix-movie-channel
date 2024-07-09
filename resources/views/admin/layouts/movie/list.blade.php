@extends('admin.master') @section('title', 'Movies list')

@section('content')
    <div class="page-header">
        <div class="page-title">
            <h4>Movie List</h4>
        </div>
        <div class="page-btn">
            <a href="{{ route('movie#createPage') }}" class="btn btn-added"><img
                    src="{{ asset('storage/admin/img/icons/plus.svg') }}" alt="img" class="me-1">Add New Movie</a>
        </div>
    </div>

    @if (session('createSuccess'))
        <div class="row">
            <div class="alert alert-success alert-dismissible" role="alert">
                <strong><i class="fa-solid fa-circle-check me-2"></i>{{ session('createSuccess') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    @if (session('deleteSuccess'))
        <div class="row">
            <div class="alert alert-danger alert-dismissible" role="alert">
                <strong><i class="fa-solid fa-circle-check me-2"></i>{{ session('deleteSuccess') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="table-top">
                <div class="search-set">
                    {{-- <div class="search-path">
                        <a class="btn btn-filter" id="filter_search">
                            <img src="{{ asset('storage/admin/img/icons/filter.svg') }}" alt="img">
                            <span><img src="{{ asset('storage/admin/img/icons/closes.svg') }}" alt="img"></span>
                        </a>
                    </div> --}}
                    <div class="search-input">
                        <a class="btn btn-searchset"><img src="{{ asset('storage/admin/img/icons/search-white.svg') }}"
                                alt="img"></a>
                    </div>
                </div>
                {{-- <div class="wordset">
                    <ul>
                        <li>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img
                                    src="{{ asset('storage/admin/img/icons/pdf.svg') }}" alt="img"></a>
                        </li>
                        <li>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img
                                    src="assets/img/icons/excel.svg" alt="img"></a>
                        </li>
                        <li>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img
                                    src="assets/img/icons/printer.svg" alt="img"></a>
                        </li>
                    </ul>
                </div> --}}
            </div>

            {{-- <div class="card mb-0" id="filter_inputs">
                <div class="card-body pb-0">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <div class="row">
                                <div class="col-lg col-sm-6 col-12">
                                    <div class="form-group">
                                        <select class="select">
                                            <option>Choose Product</option>
                                            <option>Macbook pro</option>
                                            <option>Orange</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg col-sm-6 col-12">
                                    <div class="form-group">
                                        <select class="select">
                                            <option>Choose Category</option>
                                            <option>Computers</option>
                                            <option>Fruits</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg col-sm-6 col-12">
                                    <div class="form-group">
                                        <select class="select">
                                            <option>Choose Sub Category</option>
                                            <option>Computer</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg col-sm-6 col-12">
                                    <div class="form-group">
                                        <select class="select">
                                            <option>Brand</option>
                                            <option>N/D</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg col-sm-6 col-12 ">
                                    <div class="form-group">
                                        <select class="select">
                                            <option>Price</option>
                                            <option>150.00</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-1 col-sm-6 col-12">
                                    <div class="form-group">
                                        <a class="btn btn-filters ms-auto"><img src="assets/img/icons/search-whites.svg"
                                                alt="img"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

            <div class="table-responsive">
                <table class="table  datanew">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Movie Name</th>
                            <th>Released Year</th>
                            <th>Genre</th>
                            <th>Type</th>
                            <th>Director</th>
                            <th>Description</th>
                            <th>Trailer</th>
                            <th>Movie URL</th>
                            <th>Rating</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($movies as $movie)
                            <tr>
                                <td>{{ $movie->id }}</td>
                                <td class="productimgname">
                                    <a href="javascript:void(0);" class="product-img">
                                        <img src="{{ asset('storage/images/movies/' . $movie->image) }}" alt="product">
                                    </a>
                                    <a href="javascript:void(0);">{{ $movie->name }}</a>
                                </td>
                                <td>{{ $movie->release_year }}</td>
                                <td>{{ $movie->genre_name }}</td>
                                <td>{{ $movie->type }}</td>
                                <td>{{ $movie->director }}</td>
                                <td>{{ $movie->description }}</td>
                                <td>{{ $movie->trailer }}</td>
                                <td>{{ $movie->movie_url }}</td>
                                <td>{{ $movie->rating }}</td>
                                <td>
                                    <a class="me-3" href="{{ route('movie#detail', $movie->id) }}">
                                        <img src="{{ asset('storage/admin/img/icons/eye.svg') }}" alt="img">
                                    </a>
                                    <a class="me-3" href="{{ route('movie#edit', $movie->id) }}">
                                        <img src="{{ asset('storage/admin/img/icons/edit.svg') }}" alt="img">
                                    </a>
                                    <a class="" href="{{ route('movie#delete', $movie->id) }}">
                                        <img src="{{ asset('storage/admin/img/icons/delete.svg') }}" alt="img">
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
