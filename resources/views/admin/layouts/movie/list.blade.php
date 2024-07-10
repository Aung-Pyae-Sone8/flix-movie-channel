@extends('admin.master') @section('title', 'Movies list')

@section('content')
    <div class="page-header">
        <div class="page-title">
            <h4>Movie List</h4>
        </div>
        <div class="page-btn">
            <a href="{{ route('movie#createPage') }}" class="btn btn-added"><img
                    src="{{ asset('admin/img/icons/plus.svg') }}" alt="img" class="me-1">Add New Movie</a>
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
                    <div class="search-input">
                        <a class="btn btn-searchset"><img src="{{ asset('admin/img/icons/search-white.svg') }}"
                                alt="img"></a>
                    </div>
                </div>
            </div>

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
                                        <img src="{{ asset('admin/img/icons/eye.svg') }}" alt="img">
                                    </a>
                                    <a class="me-3" href="{{ route('movie#edit', $movie->id) }}">
                                        <img src="{{ asset('admin/img/icons/edit.svg') }}" alt="img">
                                    </a>
                                    <a class="" href="{{ route('movie#delete', $movie->id) }}">
                                        <img src="{{ asset('admin/img/icons/delete.svg') }}" alt="img">
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
