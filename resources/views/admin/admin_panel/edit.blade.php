@extends('admin.master')

@section('content')
    <div class="container">
        <div class="post-header">
            <h1>Edit Post</h1>
            <a href="{{ route('admin_panel.index') }}" class="btn btn-primary">Back to Posts</a>
        </div>
        <form id="post-form" action="{{ route('admin_panel.update', $videoManPost->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="content">Content:</label>
                <textarea name="content" class="form-control" required style="height: 206px;">{{ $videoManPost->content }}</textarea>
            </div>

            <div class="form-group">
                <label for="photos">Photos:</label>
                <div id="photos-container" class="input-container">
                    <div class="input-group">
                        <input type="file" name="photos[]" class="form-control photo-input" accept="image/*" onchange="previewFile(this, 'photo')">
                        <button type="button" class="btn btn-secondary" onclick="addPhotoInput()">+</button>
                    </div>
                    <div id="photos-preview" class="preview-container">
                        @if($videoManPost->photos)
                            @foreach($videoManPost->photos as $photo)
                                <div class="preview-item">
                                    <img src="{{ asset('storage/' . $photo) }}" alt="Photo" style="width: 100px;">
                                    <input type="hidden" name="existing_photos[]" value="{{ $photo }}">
                                    <button type="button" class="icon cross" onclick="removePreview(this, '{{ $photo }}')">x</button>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="edited_photos">Edited Photos:</label>
                <div id="photos-container" class="input-container">
                    <div class="input-group">
                        <input type="file" name="edited_photos[]" class="form-control photo-input" accept="image/*" onchange="previewFile(this, 'photo')">
                        <button type="button" class="btn btn-secondary" onclick="addPhotoInput()">+</button>
                    </div>
                    <div id="photos-preview" class="preview-container">
                        @if($videoManPost->edited_photos)
                            @foreach($videoManPost->edited_photos as $photo)
                                <div class="preview-item">
                                    <img src="{{ asset('storage/' . $photo) }}" alt="Photo" style="width: 100px;">
                                    <input type="hidden" name="existing_photos[]" value="{{ $photo }}">
                                    <button type="button" class="icon cross" onclick="removePreview(this, '{{ $photo }}')">x</button>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="videos">Videos:</label>
                <div id="videos-container" class="input-container">
                    <div class="input-group">
                        <input type="file" name="videos[]" class="form-control video-input" accept="video/*" multiple>
                        <button type="button" class="btn btn-secondary" onclick="addVideoInput()">+</button>
                    </div>
                    <div id="videos-preview" class="preview-container">
                        @foreach($videoManPost->videos as $video)
                            <div class="preview-item">
                                <video width="320" height="240" controls>
                                    <source src="{{ asset('storage/' . $video) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                                <input type="hidden" name="existing_videos[]" value="{{ $video }}">
                                <button type="button" class="icon cross" onclick="removePreview(this, '{{ $video }}')">x</button>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>



            <div class="form-group">
                <label for="videos">Edited Videos:</label>
                <div id="videos-container" class="input-container">
                    <div class="input-group">
                        <input type="file" name="edited_videos[]" class="form-control video-input" accept="video/*" onchange="previewFile(this, 'video')">
                        <button type="button" class="btn btn-secondary" onclick="addVideoInput()">+</button>
                    </div>
                    <div id="videos-preview" class="preview-container">
                        @if($videoManPost->edited_videos)
                            @foreach($videoManPost->edited_videos as $video)
                                <div class="preview-item">
                                    <video width="320" height="240" controls>
                                        <source src="{{ asset('storage/' . $video) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                    <input type="hidden" name="existing_videos[]" value="{{ $video }}">
                                    <button type="button" class="icon cross" onclick="removePreview(this, '{{ $video }}')">x</button>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>





            <div class="form-group">
                <label for="link">Link:</label>
                <input type="url" name="link" class="form-control" value="{{ $videoManPost->link }}">
            </div>

            <!-- Hidden fields for removed files -->
            <input type="hidden" id="removed_photos" name="removed_photos" value="">
            <input type="hidden" id="removed_videos" name="removed_videos" value="">

            <button type="submit" class="btn btn-primary">Update Post</button>
        </form>


    </div>

    <style>
        .post-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .input-container {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-bottom: 10px;
        }
        .input-group {
            display: flex;
            align-items: center;
        }
        .input-group input {
            flex: 1;
        }
        .input-group .btn-secondary {
            margin-left: 10px;
        }
        .preview-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 10px;
        }
        .preview-container .preview-item {
            position: relative;
            max-width: 150px;
            max-height: 150px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .preview-container img, .preview-container video {
            max-width: 100%;
            max-height: 100%;
        }
        .icon {
            position: absolute;
            background: rgba(0,0,0,0.5);
            color: #fff;
            border: none;
            cursor: pointer;
            padding: 5px;
            border-radius: 50%;
        }
        .icon.cross {
            top: 5px;
            right: 5px;
        }
    </style>

    <script>
        function addPhotoInput() {
            const container = document.getElementById('photos-container');
            const newInputGroup = document.createElement('div');
            newInputGroup.className = 'input-group';
            newInputGroup.innerHTML = `
                <input type="file" name="photos[]" class="form-control photo-input" accept="image/*" onchange="previewFile(this, 'photo')">
                <button type="button" class="btn btn-danger" onclick="removeInput(this)">x</button>
            `;
            container.appendChild(newInputGroup);
        }

        function addVideoInput() {
            const container = document.getElementById('videos-container');
            const newInputGroup = document.createElement('div');
            newInputGroup.className = 'input-group';
            newInputGroup.innerHTML = `
                <input type="file" name="videos[]" class="form-control video-input" accept="video/*" onchange="previewFile(this, 'video')">
                <button type="button" class="btn btn-danger" onclick="removeInput(this)">x</button>
            `;
            container.appendChild(newInputGroup);
        }

        function removeInput(button) {
            button.parentElement.remove();
        }

        function removePreview(button, filePath) {
            // Remove from UI
            const previewItem = button.parentElement;
            previewItem.remove();

            // Update hidden input fields
            const removedFilesInput = filePath.endsWith('.jpg') || filePath.endsWith('.png') || filePath.endsWith('.gif') ? 'removed_photos' : 'removed_videos';
            const removedFilesInputElement = document.getElementById(removedFilesInput);
            let removedFiles = removedFilesInputElement.value.split(',');
            removedFiles.push(filePath);
            removedFilesInputElement.value = removedFiles.join(',');

            // Send AJAX request to remove file on server
            fetch('{{ route('admin_panel.removeFile') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ filePath: filePath })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        console.log('File successfully removed from server.');
                    } else {
                        console.error('Failed to remove file from server.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }

        function previewFile(input, type) {
            const previewContainer = document.getElementById(type + '-preview');
            const file = input.files[0];
            if (!file) return;

            const fileReader = new FileReader();

            fileReader.onload = function(e) {
                const previewItem = document.createElement('div');
                previewItem.className = 'preview-item';

                const previewElement = type === 'photo' ? document.createElement('img') : document.createElement('video');
                previewElement.src = e.target.result;
                if (type === 'video') {
                    previewElement.controls = true;
                }
                previewItem.appendChild(previewElement);

                // Create and add the cross icon
                const crossIcon = document.createElement('button');
                crossIcon.className = 'icon cross';
                crossIcon.innerHTML = 'x';
                crossIcon.onclick = function() {
                    previewItem.remove();
                };
                previewItem.appendChild(crossIcon);

                // Append the new preview item to the preview container
                previewContainer.appendChild(previewItem);
            };

            fileReader.readAsDataURL(file);
        }
    </script>
@endsection
