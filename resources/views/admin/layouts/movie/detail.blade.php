@extends('admin.master') @section('title', 'Movie Details')

@section('content')
    <div class="page-header">
        <div class="page-title">
            <h4>Movie Details</h4>
            {{-- <h6>Full details of a product</h6> --}}
        </div>
    </div>

    @if (session('updateSuccess'))
        <div class="row">
            <div class="alert alert-success alert-dismissible" role="alert">
                <strong><i class="fa-solid fa-circle-check me-2"></i>{{ session('updateSuccess') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="fw-blod">{{ $data->name }} ({{ $data->release_year }})</h1>
                    <div class="row mb-5">
                        <div class="bar-code-view col-4">
                            <img src="{{ asset('storage/images/movies/' .  $data->image )}}" style="width: 300px; height:200px;"
                                alt="img">
                        </div>
                        <div class="col-8 text-center">
                            <h3 class="text-start" style="margin-left: 10%">Trailer</h3>
                            <video class="border border-3" id="player" playsinline controls data-poster="./videos/anime-watch.jpg" style="width: 80%; height:300px">
                                <source src="{{ asset('storage/trailer/' . $data->trailer) }}" type="video/mp4" />
                                <!-- Captions are optional -->
                                <track kind="captions" label="English captions" src="#" srclang="en" default />
                            </video>
                        </div>
                    </div>
                    <div class="productdetails">
                        <ul class="product-bar">
                            <li>
                                <h4>Movie Name</h4>
                                <h6>{{ $data->name}}</h6>
                            </li>
                            <li>
                                <h4>Genre</h4>
                                <h6>{{ $data->genre_id }}</h6>
                            </li>
                            <li>
                                <h4>Type</h4>
                                <h6>{{ $data->type }}</h6>
                            </li>
                            <li>
                                <h4>Director</h4>
                                <h6>{{ $data->director }}</h6>
                            </li>
                            <li>
                                <h4>Description</h4>
                                <h6>{{ $data->description }}</h6>
                            </li>
                            <li>
                                <h4>Released-Year</h4>
                                <h6>{{ $data->release_year }}</h6>
                            </li>
                            <li>
                                <h4>Movie URL</h4>
                                <h6>{{ $data->movie_url }}</h6>
                            </li>
                            <li>
                                <h4>Rating</h4>
                                <h6>{{ $data->rating }}</h6>
                            </li>
                            <li>
                                <h4>Created At</h4>
                                <h6>{{ $data->created_at }}</h6>
                            </li>
                            <li>
                                <h4>Updated At</h4>
                                <h6>{{ $data->updated_at }}</h6>
                            </li>
                        </ul>
                        <div class="col-12 text-end">
                            <a href="{{ route('movie#edit', $data->id) }}" class="btn btn-primary mt-3 px-3">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
