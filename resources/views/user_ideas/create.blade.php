@extends('admin.master')

@section('content')
    <div class="container">
        <h1>Post New Idea</h1>
        <form action="{{ route('user_ideas.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="idea">Idea:</label>
                <textarea name="idea" class="form-control" required style="height: 206px;"></textarea>
            </div>
            <div class="form-group">
                <label for="photo">Photo:</label>
                <input type="file" name="photo" class="form-control" style="height: calc(2.25rem + 8px)!important;">
            </div>
            <div class="form-group">
                <label for="link">Link:</label>
                <input type="url" name="link" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Post Idea</button>
        </form>
    </div>
@endsection
