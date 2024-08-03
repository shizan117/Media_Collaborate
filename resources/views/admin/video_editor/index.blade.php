@extends('admin.master')

@section('content')

    <style>
        .status-change-form {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .status-change-form select,
        .status-change-form button {
            margin-bottom: 0;
        }
        .download-all-btn {
            margin-top: 10px;
            display: block;
        }
    </style>

    <div>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Video Man Posts</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Video Man Posts</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- jquery validation -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Your Can Download Files and Upload Files</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- table start -->
                            <div class="card-body">
                                @if($posts->isEmpty())
                                    <p>No posts available.</p>
                                @else
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Content</th>
                                            <th>Photos</th>
                                            <th>Edited Photos</th>
                                            <th>Videos</th>
                                            <th>Edited Videos</th>
                                            <th>Link</th>
                                            <th>Editor Status</th>
                                            <th>Created Data & Time</th>
                                            <th>Actions</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($posts as $index => $post)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td><a href="{{ route('video_editor.show', $post->id) }}">{{ $post->content }}</a></td>
                                                <td>
                                                    @if(!empty($post->photos))
                                                        @foreach($post->photos as $photo)
                                                            @if(\Storage::disk('public')->exists($photo))
                                                                <img src="{{ asset('storage/' . $photo) }}" alt="Photo" style="width: 100px;">
                                                            @else
                                                                Image Corrupted
                                                            @endif
                                                        @endforeach
                                                        <button class="download-all-btn" onclick="downloadAllPhotos({{ $post->id }})" style="padding: 0; margin-top: 10px;">Download All</button>
                                                    @else
                                                        No Photos
                                                    @endif
                                                </td>
                                                <td style="width: auto; height: auto; overflow: hidden; text-align: center;">
                                                    @if(!empty($post->edited_photos))
                                                        @foreach($post->edited_photos as $photo)
                                                            @if(\Storage::disk('public')->exists($photo))
                                                                <img src="{{ asset('storage/' . $photo) }}" alt="Edited Photo" style="width: 100px;">
                                                            @else
                                                                Image Corrupted
                                                            @endif
                                                        @endforeach
                                                        <button class="download-all-btn" onclick="downloadAllEditedPhotos({{ $post->id }})" style="padding: 0; margin-top: 10px;">Download All</button>
                                                    @else
                                                        Not Uploaded Yet
                                                    @endif
                                                </td>
                                                <td style="width: auto; height: auto; overflow: hidden; text-align: center;">
                                                    @if(!empty($post->videos))
                                                        <div style="display: flex; flex-wrap: wrap; gap: 5px; justify-content: center;">
                                                            @foreach($post->videos as $video)
                                                                @if(\Storage::disk('public')->exists($video))
                                                                    <video width="100" height="200" controls style="display: block;">
                                                                        <source src="{{ asset('storage/' . $video) }}" type="video/mp4">
                                                                        Your browser does not support the video tag.
                                                                    </video>
                                                                @else
                                                                    <div style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                                                        Video Corrupted
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                            <button class="download-all-btn" onclick="downloadAllVideos({{ $post->id }})" style="padding: 0; margin-top: 10px;">Download All</button>
                                                        </div>
                                                    @else
                                                        No Videos
                                                    @endif
                                                </td>
                                                <td style="width: auto; height: auto; overflow: hidden; text-align: center;">
                                                    @if(!empty($post->edited_videos))
                                                        @foreach($post->edited_videos as $video)
                                                            @if(\Storage::disk('public')->exists($video))
                                                                <video width="100" height="200" controls style="display: block;">
                                                                    <source src="{{ asset('storage/' . $video) }}" type="video/mp4">
                                                                    Your browser does not support the video tag.
                                                                </video>
                                                            @else
                                                                Video Corrupted
                                                            @endif
                                                        @endforeach
                                                        <button class="download-all-btn" onclick="downloadAllEditedVideos({{ $post->id }})" style="padding: 0; margin-top: 10px;">Download All</button>
                                                    @else
                                                        Not Uploaded Yet
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($post->link)
                                                        <a href="{{ $post->link }}" target="_blank">View Link</a>
                                                    @else
                                                        No Link
                                                    @endif
                                                </td>
                                                <td>
                                                    <span class="badge {{ $post->status == 'approved' ? 'bg-success' : ($post->status == 'rejected' ? 'bg-danger' : 'bg-warning') }}">
                                                        {{ ucfirst($post->status) }}
                                                    </span>
                                                </td>
                                                <td>
                                                    {{ \Carbon\Carbon::parse($post->created_at)->format('d F Y') }}<br>
                                                    {{ \Carbon\Carbon::parse($post->created_at)->format('g:iA') }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('video_editor.edit', $post->id) }}" class="btn btn-primary">Upload</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <script>
        const posts = @json($posts);

        function createDownloadForm(actionUrl, fileUrls, inputName) {
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = actionUrl;
            form.style.display = 'none';

            const csrfToken = document.createElement('input');
            csrfToken.type = 'hidden';
            csrfToken.name = '_token';
            csrfToken.value = '{{ csrf_token() }}';
            form.appendChild(csrfToken);

            fileUrls.forEach(url => {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = inputName;
                input.value = url;
                form.appendChild(input);
            });

            document.body.appendChild(form);
            form.submit();
        }

        function downloadAllVideos(postId) {
            const post = posts.find(p => p.id === postId);
            if (!post || !Array.isArray(post.videos)) {
                return;
            }

            const videoUrls = post.videos.map(video => '{{ asset('storage') }}/' + video);
            createDownloadForm('{{ route('video_editor.downloadAllVideos') }}', videoUrls, 'videos[]');
        }

        function downloadAllPhotos(postId) {
            const post = posts.find(p => p.id === postId);
            if (!post || !Array.isArray(post.photos)) {
                return;
            }

            const photoUrls = post.photos.map(photo => '{{ asset('storage') }}/' + photo);
            createDownloadForm('{{ route('video_editor.downloadAllPhotos') }}', photoUrls, 'photos[]');
        }

        function downloadAllEditedPhotos(postId) {
            const post = posts.find(p => p.id === postId);
            if (!post || !Array.isArray(post.edited_photos)) {
                return;
            }

            const photoUrls = post.edited_photos.map(photo => '{{ asset('storage') }}/' + photo);
            createDownloadForm('{{ route('video_editor.downloadAllPhotos') }}', photoUrls, 'photos[]');
        }

        function downloadAllEditedVideos(postId) {
            const post = posts.find(p => p.id === postId);
            if (!post || !Array.isArray(post.edited_videos)) {
                return;
            }

            const videoUrls = post.edited_videos.map(video => '{{ asset('storage') }}/' + video);
            createDownloadForm('{{ route('video_editor.downloadAllVideos') }}', videoUrls, 'videos[]');
        }
    </script>


@endsection
