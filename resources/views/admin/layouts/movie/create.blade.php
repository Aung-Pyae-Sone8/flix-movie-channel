@extends('admin.master') @section('title', 'Create Movie')

@section('content')
    <div class="page-header">
        <div class="page-title">
            <h4>Movie Add</h4>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('movie#create') }}" method="post" enctype="multipart/form-data" novalidate='novalidate'>
                @csrf
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Movie Name</label>
                            <input type="text" name="movieName">
                            @error('movieName')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Genre</label>
                            <select class="select" name="genreId">
                                <option value="">Choose Genre</option>
                                @foreach ($genres as $genre)
                                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                                @endforeach
                            </select>
                            @error('genreId')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Type</label>
                            <select class="select" name="type">
                                <option value="">Choose Type</option>
                                <option value="movie">Movie</option>
                                <option value="series">Series</option>
                                <option value="cartoon">Cartoon</option>
                            </select>
                            @error('type')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Released Year</label>
                            <input type="text" name="releasedYear" placeholder="eg.2024">
                            @error('releasedYear')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Director</label>
                            <input type="text" name="director">
                            @error('director')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Rating</label>
                            <input type="text" name="rating">
                            @error('rating')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Movie URL</label>
                            <input type="text" name="movieUrl">
                            @error('movieUrl')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="description"></textarea>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Movie Image</label>
                            <div class="image-upload">
                                <input type="file" name="movieImage">
                                <div class="image-uploads">
                                    <img src="{{ asset('storage/admin/img/icons/upload.svg') }}" alt="img">
                                    <h4>Drag and drop a file to upload</h4>
                                </div>
                            </div>
                            @error('movieImage')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Trailer Video</label>
                            <div class="image-upload">
                                <input type="file" name="trailer">
                                <div class="image-uploads">
                                    <img src="{{ asset('storage/admin/img/icons/upload.svg') }}" alt="img">
                                    <h4>Drag and drop a file to upload</h4>
                                </div>
                            </div>
                            @error('trailer')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <button type="submit" href="javascript:void(0);" class="btn btn-submit me-2">Submit</button>
                        {{-- <a href="productlist.html" class="btn btn-cancel">Cancel</a> --}}
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
