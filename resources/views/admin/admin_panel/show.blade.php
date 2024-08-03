<!-- resources/views/admin/SingleVideoPost.blade.php -->

@extends('admin.master')

@section('content')

    <style>
        .post-content {
            display: flex;
            flex-direction: column;
        }

        .post-content img, .post-content video {
            width: 320px;
            height: 240px;
            margin-bottom: 10px;
            object-fit: contain; /* Ensures the content is resized to fit within the box */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Adds a soft shadow to the media items */
            border-radius: 8px; /* Adds rounded corners to the media items */
        }

        .post-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .post-header h2 {
            margin: 0;
        }

        .post-details {
            margin: 10px 0;
        }

        .media-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px; /* Adjust the gap between images and videos */
        }

        .media-item {
            flex: 0 1 auto;
            margin-bottom: 20px; /* Consistent gap between rows of media items */
        }

        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Adds a shadow to the card */
            border-radius: 8px; /* Adds rounded corners to the card */
            overflow: hidden; /* Ensures that content inside the card respects the border radius */
        }

        .card-body {
            padding: 2rem;
        }

        .btn-primary {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Adds a shadow to the button */
            border-radius: 8px; /* Adds rounded corners to the button */
        }

        .badge {
            padding: 0.5em 1em;
            border-radius: 4px;
        }

        .container-fluid {
            padding: 2rem;
        }
    </style>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-body">
                        <div class="post-header">
                            <h2>Public User Post</h2>
                            <a href="{{ route('admin_panel.public_user_posts') }}" class="btn btn-primary">Back to Posts</a>
                        </div>
                        <div class="post-details">
                            <strong>Status:</strong>
                            <span class="badge {{ $post->status == 'approved' ? 'bg-success' : ($post->status == 'rejected' ? 'bg-danger' : 'bg-warning') }}">
                                    {{ ucfirst($post->status) }}
                                </span>
                        </div>


                        <div class="post-details">
                            <strong>Created Date & Time: </strong>
                            <span>{{ \Carbon\Carbon::parse($post->created_at)->format('d F Y g:i A') }}</span>
                        </div>
                        <div class="post-content mt-3">
                            <div class="post-details">
                                <strong>Content:</strong>
                                <p>{{ $post->idea }}</p>
                            </div>

                            <div class="post-details">
                                <strong>Photos:</strong>
                                <div class="media-container">

                                @if($post->photo)
                                    <img src="{{ asset('storage/' . $post->photo) }}" alt="Photo">
                                @else
                                    <div style="width: 320px; height: 240px; display: flex; align-items: center; justify-content: center; border: 1px solid #ccc;">
                                        Image Corrupted
                                    </div>
                                @endif
                            </div>
                            </div>



                            <div class="post-details">
                                <strong>Link: </strong>
                                @if($post->link)
                                    <a href="{{ $post->link }}" class="btn btn-primary" target="_blank">{{ $post->link }}</a>
                                @else
                                    No Link
                                @endif
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
