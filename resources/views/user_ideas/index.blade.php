@extends('admin.master')

@section('content')
    <div class="container">
        <h1>User Ideas</h1>
        <a href="{{ route('user_ideas.create') }}" class="btn btn-primary mb-3">Post New Idea</a>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Idea</th>
                <th>Photo</th>
                <th>Link</th>
                <th>Status</th>
                <th>Created Date & Time</th>
                <th>Actions</th>

            </tr>
            </thead>
            <tbody>
            @foreach($userIdeas as $index => $idea)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $idea->idea }}</td>
                    <td>
                        @if($idea->photo)
                            <img src="{{ asset('storage/' . $idea->photo) }}" alt="Idea Photo" style="width: 100px;">
                        @else
                            No Photo
                        @endif
                    </td>
                    <td>
                        @if($idea->link)
                            <a href="{{ $idea->link }}" target="_blank">View Link</a>
                        @else
                            No Link
                        @endif
                    </td>
                    <td>
                    <td>
    <span class="badge {{ in_array($idea->status, ['approved', 'paid']) ? 'bg-success' : ($idea->status == 'rejected' ? 'bg-danger' : 'bg-warning') }}">
        {{ ucfirst($idea->status) }}
    </span>
                    </td>

                    </td>
                    <td>
                        {{ \Carbon\Carbon::parse($idea->created_at)->format('d F Y') }}<br>
                        {{ \Carbon\Carbon::parse($idea->created_at)->format('g:iA') }}
                    </td>
                    <td>
                        @if($idea->status != 'approved' && $idea->status != 'paid')
                            <a href="{{ route('user_ideas.edit', $idea->id) }}" class="btn btn-warning">Edit</a>

                            <form action="{{ route('user_ideas.destroy', $idea->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>


                    @else
                            <button class="btn btn-warning" disabled>Edit</button>
                            <button type="submit" class="btn btn-danger" disabled>Delete</button>
                        @endif
                    </td>


                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
