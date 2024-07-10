@extends('admin.master') @section('title', 'User List')

@section('content')

    <div class="page-header">
        <div class="page-title">
            <h4>Check Pyament</h4>
        </div>
        <div class="page-btn">
        </div>
    </div>

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

            <div class="row">
                <div class="col-5">
                    <img src="{{ asset('storage/images/payment/' . $data->screen_shot) }}" alt="" style="width: 400px; height: 600px;">
                </div>
                <div class="col-6">
                    <table>
                        <tr>
                            <td><h4>User's Account Name </h4></td>
                            <td style="padding: 10px"> - </td>
                            <td><h3>{{ $data->user_name }}</h3></td>
                        </tr>
                        <tr>
                            <td><h4>Transaction ID </h4></td>
                            <td style="padding: 10px"> - </td>
                            <td><h3>{{ $data->transaction_id }}</h3></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="row">
                                    <div class="col-6">
                                        <form action="{{ route('user#accept') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="userId" value="{{ $data->user_id }}">
                                            <button class="btn btn-success">Accept</button>
                                        </form>
                                    </div>
                                    <div class="col-6">
                                        <form action="{{ route('user#reject') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="userId" value="{{ $data->user_id }}">
                                            <button class="btn btn-danger">Reject</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                            <td></td>
                            <td>

                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
