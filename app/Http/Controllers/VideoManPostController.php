<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use ZipArchive;
use App\Models\User;
use App\Models\UserIdea;
use App\Models\VideoManPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class VideoManPostController extends Controller
{



    public function downloadAll(Request $request)
    {
        $request->validate([
            'videos' => 'required|array',
            'videos.*' => 'required|url',
        ]);

        $videos = $request->input('videos', []);

        $zip = new \ZipArchive();
        $zipFileName = 'videos.zip';
        $zipFilePath = storage_path($zipFileName);

        if ($zip->open($zipFilePath, \ZipArchive::CREATE | \ZipArchive::OVERWRITE) === TRUE) {
            foreach ($videos as $videoUrl) {
                $videoPath = parse_url($videoUrl, PHP_URL_PATH);
                $videoName = basename($videoPath);
                $fullPath = public_path('storage/' . ltrim($videoPath, '/storage'));

                if (file_exists($fullPath)) {
                    $zip->addFile($fullPath, $videoName);
                } else {
                    Log::error("File not found: $fullPath");
                }
            }
            $zip->close();
        } else {
            Log::error("Failed to create zip file at $zipFilePath");
        }

        if (file_exists($zipFilePath)) {
            return response()->download($zipFilePath)->deleteFileAfterSend(true);
        } else {
            return response()->json(['error' => 'File not found'], 404);
        }
    }

    public function downloadAllPhotos(Request $request)
    {
        $request->validate([
            'photos' => 'required|array',
            'photos.*' => 'required|string'
        ]);

        $photos = $request->input('photos', []);
        $zip = new \ZipArchive();
        $zipFileName = 'photos.zip';
        $zipFilePath = storage_path('app/public/' . $zipFileName);

        if ($zip->open($zipFilePath, \ZipArchive::CREATE | \ZipArchive::OVERWRITE) === TRUE) {
            foreach ($photos as $photoUrl) {
                $photoPath = parse_url($photoUrl, PHP_URL_PATH);
                $photoName = basename($photoPath);
                $fullPath = public_path('storage/' . ltrim($photoPath, '/storage'));

                if (file_exists($fullPath)) {
                    $zip->addFile($fullPath, $photoName);
                } else {
                    Log::error("File not found: $fullPath");
                }
            }
            $zip->close();
        } else {
            Log::error("Failed to create zip file at $zipFilePath");
        }

        if (file_exists($zipFilePath)) {
            return response()->download($zipFilePath)->deleteFileAfterSend(true);
        } else {
            return back()->with('error', 'Failed to create ZIP file.');
        }
    }

    public function removeFile(Request $request)
    {
        $filePath = $request->input('filePath');

        if (Storage::exists('public/' . $filePath)) {
            Storage::delete('public/' . $filePath);
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 400);
    }

    public function changeStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|in:pending,approved,rejected'
        ]);

        $post = VideoManPost::findOrFail($id);
        $post->status = $request->status;
        $post->save();

        return redirect()->route('video_man_posts.index')->with('success', 'Status updated successfully.');
    }


    public function index()
    {
        $posts = VideoManPost::where('user_id', Auth::id())
            ->orderByRaw("
        CASE
            WHEN status = 'pending' THEN 1
            WHEN status = 'approved' THEN 2
            WHEN status = 'rejected' THEN 3
            ELSE 4
        END
    ")
            ->orderBy('created_at', 'desc')
            ->get();

        // Convert videos property to Collection if it's an array
        $posts->each(function ($post) {
            $post->videos = collect($post->videos);
        });

        return view('admin.video_man_posts.index', compact('posts'));
    }


    public function create()
    {
        return view('admin.video_man_posts.create');
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'content' => 'required|string',
            'photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'videos.*' => 'nullable|mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime|max:50000',
            'link' => 'nullable|url',
        ]);

        // Initialize arrays for storing file paths
        $photos = $videos = [];

        // Handle photo uploads
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $photos[] = $photo->store('video_man_photos', 'public');
            }
        }

        // Handle video uploads
        if ($request->hasFile('videos')) {
            foreach ($request->file('videos') as $video) {
                $videos[] = $video->store('video_man_videos', 'public');
            }
        }

        // Create a new VideoManPost
        VideoManPost::create([
            'user_id' => Auth::id(),
            'content' => $request->content,
            'photos' => $photos,
            'videos' => $videos,
            'link' => $request->link,
            'status' => 'pending',
        ]);

        // Redirect with success message
        return redirect()->route('video_man_posts.index')->with('success', 'Post created successfully.');
    }


    public function edit(VideoManPost $videoManPost)
    {
        return view('admin.video_man_posts.edit', compact('videoManPost'));
    }

    public function update(Request $request, VideoManPost $videoManPost)
    {
        $request->validate([
            'content' => 'required|string',
            'photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'videos.*' => 'nullable|mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime|max:50000',
            'link' => 'nullable|url',
            'status' => 'nullable|string'
        ]);

        // Get current photos and videos
        $photos = $videoManPost->photos ?? [];
        $videos = $videoManPost->videos ?? [];

        // Handle new photo uploads
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $photos[] = $photo->store('video_man_photos', 'public');
            }
        }

        // Handle new video uploads
        if ($request->hasFile('videos')) {
            foreach ($request->file('videos') as $video) {
                $videos[] = $video->store('video_man_videos', 'public');
            }
        }

        // Handle removed photos
        $removedPhotos = explode(',', $request->input('removed_photos', ''));
        foreach ($removedPhotos as $removedPhoto) {
            if (Storage::exists('public/' . $removedPhoto)) {
                Storage::delete('public/' . $removedPhoto);
            }
            $photos = array_filter($photos, fn($photo) => $photo !== $removedPhoto);
        }

        // Handle removed videos
        $removedVideos = explode(',', $request->input('removed_videos', ''));
        foreach ($removedVideos as $removedVideo) {
            if (Storage::exists('public/' . $removedVideo)) {
                Storage::delete('public/' . $removedVideo);
            }
            $videos = array_filter($videos, fn($video) => $video !== $removedVideo);
        }

        // Update the video man post
        $videoManPost->update([
            'content' => $request->content,
            'photos' => $photos,
            'videos' => $videos,
            'link' => $request->link,
            'status' => $request->status ?? 'pending',
        ]);

        return redirect()->route('video_man_posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy(VideoManPost $videoManPost)
    {
        $videoManPost->delete();
        return redirect()->route('video_man_posts.index')->with('success', 'Post deleted successfully.');
    }

    public function publicUserPosts(Request $request)
    {
        $query = UserIdea::join('users', 'user_ideas.user_id', '=', 'users.id')
            ->select('user_ideas.*')
            ->where('users.role', 'public');


        if ($request->has('user_id') && $request->user_id != '') {
            $query->where('user_ideas.user_id', $request->user_id);
        }

        $publicUserPosts = $query->orderByRaw("
        CASE
            WHEN user_ideas.status = 'pending' THEN 1
            WHEN user_ideas.status = 'paid' THEN 2
            WHEN user_ideas.status = 'approved' THEN 3
            WHEN user_ideas.status = 'rejected' THEN 4
            ELSE 5
        END
    ")
            ->orderBy('user_ideas.created_at', 'desc')
            ->get();

        $users = User::where('role', 'public')->get(); // Only fetch users with 'public' role

        return view('admin.video_man_posts.public_user_posts', compact('publicUserPosts', 'users'));
    }

    public function updateStatus(Request $request, UserIdea $userIdea)
    {
        $request->validate([
            'status' => 'required|string',
        ]);

        $userIdea->update([
            'status' => $request->status,
        ]);

        return redirect()->route('video_man_posts.public_user_posts')->with('success', 'Status updated successfully.');
    }

    public function completedVideos()
    {
        $posts = VideoManPost::where('user_id', Auth::id())
            ->where('status', 'approved')
            ->orderBy('updated_at', 'desc')
            ->get();


        // Convert videos property to Collection if it's an array
        $posts->each(function ($post) {
            $post->videos = collect($post->videos);
        });
      //  $completedVideos = VideoManPost::where('user_id', Auth::id())->where('status', 'Approved')->get();
        return view('admin.video_man_posts.completed_videos', compact('posts'));
    }

    // In PublicUserPostController.php
    public function show($id)
    {
        $post = UserIdea::findOrFail($id);
        return view('admin.video_man_posts.show', compact('post'));
    }


    public function PostShow($id)
    {
        $post = VideoManPost::findOrFail($id);
        return view('admin.video_man_posts.SingleVideoPost', compact('post'));
    }

}
