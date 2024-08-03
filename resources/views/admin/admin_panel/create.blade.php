@extends('admin.master')

@section('content')
    <div class="container">
        <h1>Create New Post</h1>
        <form action="{{ route('video_man_posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="content">Content:</label>
                <textarea name="content" class="form-control" required  style="height: 206px;"></textarea>
            </div>

            <div class="form-group">
                <label for="photos">Photos:</label>
                <div id="photos-container" class="input-container">
                    <div class="input-group">
                        <input type="file" name="photos[]" class="form-control photo-input" accept="image/*" onchange="previewFile(this)">
                        <button type="button" class="btn btn-secondary" onclick="addPhotoInput()">+</button>
                    </div>
                    <!-- Initial photo inputs will be added here -->
                </div>
                <div id="photos-preview" class="preview-container"></div>
            </div>

            <div class="form-group">
                <label for="videos">Videos:</label>
                <div id="videos-container" class="input-container">
                    <div class="input-group">
                        <input type="file" name="videos[]" class="form-control video-input" accept="video/*" onchange="previewFile(this)">
                        <button type="button" class="btn btn-secondary" onclick="addVideoInput()">+</button>
                    </div>
                    <!-- Initial video inputs will be added here -->
                </div>
                <div id="videos-preview" class="preview-container"></div>
            </div>

            <div class="form-group">
                <label for="link">Link:</label>
                <input type="url" name="link" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Post</button>
        </form>
    </div>

    <style>
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
        .preview-container img, .preview-container video {
            max-width: 150px;
            max-height: 150px;
        }
        .btn-danger {
            margin-left: 5px;
        }
    </style>

    <script>
        function addPhotoInput() {
            const container = document.getElementById('photos-container');
            const newInputGroup = document.createElement('div');
            newInputGroup.className = 'input-group';
            newInputGroup.innerHTML = `
                <input type="file" name="photos[]" class="form-control photo-input" accept="image/*" onchange="previewFile(this)">
                <button type="button" class="btn btn-danger" onclick="removeInput(this)">x</button>
            `;
            container.appendChild(newInputGroup);
        }

        function addVideoInput() {
            const container = document.getElementById('videos-container');
            const newInputGroup = document.createElement('div');
            newInputGroup.className = 'input-group';
            newInputGroup.innerHTML = `
                <input type="file" name="videos[]" class="form-control video-input" accept="video/*" onchange="previewFile(this)">
                <button type="button" class="btn btn-danger" onclick="removeInput(this)">x</button>
            `;
            container.appendChild(newInputGroup);
        }

        function removeInput(button) {
            button.parentElement.remove();
        }

        function previewFile(input) {
            const previewContainer = input.parentElement.nextElementSibling;
            const file = input.files[0];
            const fileReader = new FileReader();

            fileReader.onload = function(e) {
                const previewElement = file.type.startsWith('image/') ? document.createElement('img') : document.createElement('video');
                previewElement.src = e.target.result;
                if (file.type.startsWith('video/')) {
                    previewElement.controls = true;
                }
                previewContainer.appendChild(previewElement);
            };

            fileReader.readAsDataURL(file);
        }
    </script>
@endsection
