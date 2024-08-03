@extends('admin.master')

@section('content')
    <style>
        .card-header {
            background-color: #007bff;
            color: white;
        }

        .img-thumbnail {
            max-width: 100%;
            height: 50%;
            border: 2px solid #ddd;
            padding: 5px;
            display: block;
            margin: 0 auto 10px;
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

        .password-toggle {
            position: relative;
        }

        .password-toggle .toggle-password {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
        }

        .error-message {
            color: red;
            font-size: 0.9rem;
            margin-top: 0.5rem;
        }

        .custom-file-input {
            display: none;
        }



        .custom-file-label:hover {
            background-color: #0056b3;
        }

        .custom-file-label::after {
            content: "Choose Image";
        }
    </style>

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Profile</li>
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
                        <div class="card-header bg-warning text-white">
                            <h3 class="card-title">Edit Profile Information</h3>
                        </div>
                        <div class="card-body">
                            <form id="profileForm" action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-4 text-center">
                                        <img id="preview" src="{{ asset('storage/' . $user->photo) }}" alt="User Photo" class="img-fluid img-thumbnail">
                                        <div class="form-group mt-3">
                                            <input type="file" name="photo" id="photo" class="custom-file-input" onchange="previewImage(event)" style="display: none;">
                                            <a href="javascript:void(0);" class="btn btn-primary" onclick="document.getElementById('photo').click();">Update Image</a>
                                        </div>

                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">Name:</label>
                                            <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Phone:</label>
                                            <input type="text" name="phone" class="form-control" value="{{ $user->phone }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Address:</label>
                                            <input type="text" name="address" class="form-control" value="{{ $user->address }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="d-flex align-items-center">
                                                Update Password:
                                                <p class="ml-2 mb-0" style="    color: cornflowerblue;">Leave blank to keep current password</p>
                                            </label>
                                            <div class="password-toggle">
                                                <input type="password" name="password" id="password" class="form-control" placeholder="Leave blank to keep current password">
                                                <span class="toggle-password" onclick="togglePassword('password')">&#x1F441;</span>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label for="password_confirmation">Confirm Password:</label>
                                            <div class="password-toggle">
                                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm new password">
                                                <span class="toggle-password" onclick="togglePassword('password_confirmation')">&#x1F441;</span>
                                            </div>
                                            <div class="error-message" id="passwordError" style="display: none;">
                                                Passwords do not match.
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Update Profile</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ route('profile.show') }}" class="btn btn-secondary">Back to Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePassword(fieldId) {
            const passwordField = document.getElementById(fieldId);
            const toggleButton = passwordField.nextElementSibling;

            if (passwordField.type === "password") {
                passwordField.type = "text";
                toggleButton.innerHTML = "&#x1F441;"; // Eye icon
            } else {
                passwordField.type = "password";
                toggleButton.innerHTML = "&#x1F441;"; // Eye icon
            }
        }

        document.getElementById('profileForm').addEventListener('submit', function (event) {
            const password = document.getElementById('password').value;
            const passwordConfirmation = document.getElementById('password_confirmation').value;
            const passwordError = document.getElementById('passwordError');

            if (password !== passwordConfirmation) {
                event.preventDefault();
                passwordError.style.display = 'block';
            } else {
                passwordError.style.display = 'none';
            }
        });

        function previewImage(event) {
            const file = event.target.files[0];
            const reader = new FileReader();
            const preview = document.getElementById('preview');
            const label = document.querySelector('.custom-file-label');

            reader.onload = function() {
                preview.src = reader.result;
                label.innerHTML = 'Update Image';
            };

            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
