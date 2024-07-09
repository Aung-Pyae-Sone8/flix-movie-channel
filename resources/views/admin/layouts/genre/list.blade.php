@extends('admin.master') @section('title', 'Genres List')
@section('content')
    <div class="page-header">
        <div class="page-title">
            <h4>Genres List</h4>
        </div>
        <div class="page-btn">
            <a class="btn btn-added" data-bs-toggle="modal" data-bs-target="#addpayment">
                <img src="{{ asset('storage/admin/img/icons/plus.svg') }}" alt="img" class="me-1">Add New Genre
            </a>
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

    @if (session('updateSuccess'))
        <div class="row">
            <div class="alert alert-success alert-dismissible" role="alert">
                <strong><i class="fa-solid fa-circle-check me-2"></i>{{ session('updateSuccess') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                {{-- <div class="card-header">
                    <h4 class="card-title">Default Datatable</h4>
                    <p class="card-text">
                        This is the most basic example of the datatables with zero configuration. Use the
                        <code>.datatable</code> class to initialize datatables.
                    </p>
                </div> --}}

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table  datanew ">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $d)
                                    <tr>
                                        <td>{{ $d->id }}</td>
                                        <td>{{ $d->name }}</td>
                                        <td>{{ $d->created_at->format('Y/m/d') }}</td>
                                        <td>
                                            <a class="me-3" href="{{ route('genre#edit', $d->id) }}">
                                                <img src="{{ asset('storage/admin/img/icons/edit.svg') }}" alt="img">
                                            </a>
                                            <a class="me-3" href="{{ route('genre#delete', $d->id) }}">
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
        </div>
    </div>
@endsection

@section('model')
    <form action="{{ route('genre#create') }}" method="post">
        @csrf
        <div class="modal fade" id="addpayment" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add TAX </h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Genre Name<span class="manitory">*</span></label>
                                    <input type="text" name="genreName">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-submit">Confirm</button>
                        <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <h4>
                                <label>Are you sure want to delete?</label>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-submit">Update</button>
                    <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
@endsection
