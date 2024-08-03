@extends('admin.master')

@section('content')
    <div>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Idea</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Idea</li>
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
                                <h3 class="card-title">Edit Your Idea</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('user_ideas.update', $userIdea->id) }}" method="POST" enctype="multipart/form-data" id="quickForm">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="idea">Idea</label>
                                        <textarea name="idea" class="form-control" id="idea" required style="height: 206px;">{{ $userIdea->idea }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="photo">Photo</label>
                                        <input type="file" name="photo" class="form-control" id="photo" onchange="previewImage(event)">
                                        @if($userIdea->photo)
                                            <img id="photo-preview" src="{{ asset('storage/' . $userIdea->photo) }}" alt="Idea Photo" style="width: 100px;" class="mt-2">
                                        @else
                                            <img id="photo-preview" alt="Idea Photo" style="width: 100px;" class="mt-2" style="display: none;">
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="link">Link</label>
                                        <input type="url" name="link" class="form-control" id="link" value="{{ $userIdea->link }}">
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update Idea</button>
                                </div>
                            </form>
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
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('photo-preview');
                output.src = reader.result;
                output.style.display = 'block';
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection
