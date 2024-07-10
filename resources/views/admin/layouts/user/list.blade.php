@extends('admin.master') @section('title', 'User List')

@section('content')

    <div class="page-header">
        <div class="page-title">
            <h4>User List</h4>
        </div>
        <div class="page-btn">
        </div>
    </div>

    @if (session('deleteUserSuccess'))
        <div class="row">
            <div class="alert alert-danger alert-dismissible" role="alert">
                <strong><i class="fa-solid fa-circle-check me-2"></i>{{ session('deleteUserSuccess') }}</strong>
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
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Type </th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Gender</th>
                            <th>Role</th>
                            <th>Payment Status</th>
                            <th>Action</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="productimgname">
                                    <a href="javascript:void(0);" class="product-img">
                                        @if ($user->image != null)
                                            <img src="{{ asset('storage/images/user/' . $user->image) }}" alt="user image">
                                        @else
                                            <img src="{{ asset('images/default.jpg') }}" alt="user image">
                                        @endif
                                    </a>
                                    <a href="javascript:void(0);">{{ $user->name }}</a>
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->type }}</td>
                                <td>{{ $user->address }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->gender }}</td>
                                <td>{{ $user->role }}</td>
                                <td>
                                    @if ($user->type == 'free')
                                        <a href="" class="btn btn-success">Unpaid</a>
                                    @elseif ($user->type == 'pending')
                                        <a href="{{ route('user#checkPyament', $user->id) }}" class="btn btn-warning">Pending</a>
                                    @else
                                        <a href="" class="btn btn-danger">Paid</a>
                                    @endif
                                </td>
                                <td>
                                    @if (Auth::user()->email == 'admin@gmail.com')
                                        @if ($user->role == 'user')
                                            <form action="{{ route('user#promote') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $user->id }}">
                                                <button type="submit" class="btn btn-success">Promote to admin</button>
                                            </form>
                                        @else
                                            <form action="{{ route('user#demote') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $user->id }}">
                                                <button type="submit" class="btn btn-danger">Demote to user</button>
                                            </form>
                                        @endif
                                    @endif
                                </td>
                                <td>
                                    @if (Auth::user()->email == 'admin@gmail.com')
                                        <form action="{{ route('admin#deleteUser', $user->id) }}">
                                            @csrf
                                            <button class="btn btn-outline-danger" type="submit">
                                                <img src="{{ asset('admin/img/icons/delete.svg') }}" alt="img">
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
