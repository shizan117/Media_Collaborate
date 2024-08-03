@extends('admin.master')

@section('content')

    <style>
        .card-header {
            background-color: #007bff;
            color: white;
        }

        .img-thumbnail {
            max-width: 100%;
            height: auto;

            border: 2px solid #ddd;
            padding: 5px;
        }

        .form-control-plaintext {
            font-size: 1.1rem;
            font-weight: 500;
            color: #333;
            margin-bottom: 0;
        }

        .form-group label {
            font-weight: bold;
        }

        .content-header h1 {
            font-size: 2rem;
            font-weight: bold;
        }

        .breadcrumb {
            background: none;
            padding: 0;
            margin-bottom: 0;
        }

        .breadcrumb-item + .breadcrumb-item::before {
            content: ">";
        }

        .btn-warning {
            background-color: #ffc107;
            border: none;
            color: #fff;
        }

        .btn-warning:hover {
            background-color: #e0a800;
            color: #fff;
        }
    </style>


    @if (session('success'))
        <h3 style="margin-left: inherit;     color: #0fe20f;">Profile updated successfully</h3>
    @endif
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                       </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h3 class="card-title">Profile Information</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 text-center">
                                    <img src="{{ asset('storage/' . $user->photo) }}" alt="User Photo" class="img-fluid img-thumbnail mb-3">
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="name">Name:</label>
                                        <p class="form-control-plaintext">{{ $user->name }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone:</label>
                                        <p class="form-control-plaintext">{{ $user->phone }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address:</label>
                                        <p class="form-control-plaintext">{{ $user->address }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password:</label>
                                        <p class="form-control-plaintext">**********</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ route('profile.edit') }}" class="btn btn-warning">Edit Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
