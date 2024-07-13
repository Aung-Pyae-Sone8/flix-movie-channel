@extends('admin.master') @section('title', 'Profile')

@section('content')
    <div class="page-header">
        <div class="page-title">
            <h4>Profile</h4>
            <h6>User Profile</h6>
        </div>
    </div>

    @if (session('passwordChangeSuccess'))
        <div class="row">
            <div class="alert alert-success alert-dismissible" role="alert">
                <strong><i class="fa-solid fa-circle-check me-2"></i>{{ session('passwordChangeSuccess') }}</strong>
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

    <form action="{{ route('admin#update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="profile-set">
                    <div class="profile-head">
                    </div>
                    <div class="profile-top">
                        <div class="profile-content">
                            <div class="profile-contentimg">
                                @if ($data->image != null)
                                    <img src="{{ asset('storage/images/user/' . $data->image) }}" alt="img"
                                        id="blah">
                                @else
                                    <img src="{{ asset('images/default.jpg') }}" alt="img" id="blah">
                                @endif
                                <div class="profileupload">
                                    <input type="file" id="imgInp" name="image">
                                    <a href="javascript:void(0);"><img
                                            src="{{ asset('admin/img/icons/edit-set.svg') }}" alt="img"></a>
                                </div>
                            </div>
                            <div class="profile-contentname">
                                <h2>{{ $data->name }}</h2>
                                <h4>Updates Your Photo and Personal Details.</h4>
                            </div>
                        </div>
                    </div>
                    @error('image')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" value="{{ old('name', $data->name) }}" class="@error('name') is-invalid @enderror">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" value="{{ old('email', $data->email) }}" class="@error('email') is-invalid @enderror">
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" value="{{ old('address', $data->address) }}" class="@error('address') is-invalid @enderror">
                            @error('address')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="phone" value="{{ old('phone', $data->phone) }}" class="@error('phone') is-invalid @enderror">
                            @error('phone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label>Gender</label>
                            <select name="gender" class="form-control">
                                <option value="male" @if ($data->gender == 'male') selected @endif>Male</option>
                                <option value="female" @if ($data->gender == 'female') selected @endif>Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-submit me-2">Submit</button>
                        <a href="javascript:void(0);" class="btn btn-cancel">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="page-header">
        <div class="page-title">
            <h4>Change Password</h4>
        </div>
    </div>

    <form action="{{ route('admin#changePassword') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Current Password</label>
                                <input type="password" name="currentPassword"
                                    class="@error('currentPassword') is-invalid @enderror">
                                @error('currentPassword')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                @if (session('passwordNotMatch'))
                                    <small class="text-danger">{{ session('passwordNotMatch') }}</small>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>New Password</label>
                                <input type="password" name="newPassword"
                                    class="@error('newPassword') is-invalid @enderror">
                                @error('newPassword')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Confirm New Password</label>
                                <input type="password" name="confirmPassword"
                                    class="@error('confirmPassword') is-invalid @enderror">
                                @error('confirmPassword')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-submit me-2">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
