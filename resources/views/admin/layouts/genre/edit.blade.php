@extends('admin.master') @section('title', 'Edit Category')
@section('content')

    <div class="page-header">
        <div class="page-title">
            <h4>Edit Genre</h4>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('genre#update') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <input type="hidden" name="genreId" value="{{ $items->id }}">
                            <label>Genre Name</label>
                            <input type="text" name='genreName' value="{{ old('genreName', $items->name) }}">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <button type="submit" href="javascript:void(0);" class="btn btn-submit me-2">Submit</button>
                        <a href="{{ route('genre#list') }}" class="btn btn-cancel">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
