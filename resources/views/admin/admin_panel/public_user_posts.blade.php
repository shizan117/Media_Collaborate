@extends('admin.master')

@section('content')
    <div class="container">
        <div class="container-fluid">
            <h1>Public User Posts</h1>

            <!-- User Filter Dropdown -->
            <div class="mb-3">
                <form action="{{ route('admin_panel.public_user_posts') }}" method="GET" class="form-inline">
                    <label for="userFilter" class="mr-2">Filter by User:</label>
                    <select name="user_id" id="userFilter" class="form-control mr-2">
                        <option value="">All Users</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ request('user_id') == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary">Filter</button>
                </form>
            </div>

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Content</th>
                    <th>Photos</th>
                    <th>Link</th>
                    <th>Status</th>
                    <th>Created Date & Time</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($publicUserPosts as $index => $post)
                    <tr>

                        <td>{{ $index + 1 }}</td> <!-- Displaying row number -->
                        <td><a href="{{ route('admin_panel.public_user_posts.show', $post->id) }}">{{ $post->idea }}</a></td>
                        <td>
                            @if($post->photo)
                                <a href="{{ route('admin_panel.public_user_posts.show', $post->id) }}">
                                    <img id="photo-preview" src="{{ asset('storage/' . $post->photo) }}" alt="Idea Photo" style="width: 100px;" class="mt-2">
                                </a>
                            @else
                                <img id="photo-preview" alt="Idea Photo" style="width: 100px;" class="mt-2" style="display: none;">
                            @endif
                        </td>
                        <td><a href="{{ $post->link }}">{{ $post->link }}</a></td>
                        <td>
                            <span class="badge {{ in_array($post->status, ['approved', 'paid']) ? 'bg-success' : ($post->status == 'rejected' ? 'bg-danger' : 'bg-warning') }}">
                                {{ ucfirst($post->status) }}
                            </span>
                        </td>
                        <td>
                            {{ \Carbon\Carbon::parse($post->created_at)->format('d F Y') }}<br>
                            {{ \Carbon\Carbon::parse($post->created_at)->format('g:iA') }}
                        </td>
                        <td>
                            <form action="{{ route('admin_panel.update_status', $post->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <select name="status" class="form-control">
                                    <option value="pending" @if($post->status == 'pending') selected @endif>Pending</option>
                                    <option value="approved" @if($post->status == 'approved') selected @endif>Approved</option>
                                    <option value="rejected" @if($post->status == 'rejected') selected @endif>Rejected</option>
                                    <option value="paid" @if($post->status == 'paid') selected @endif>Paid</option>
                                </select>
                                <button type="submit" class="btn btn-primary mt-2">Update Status</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
