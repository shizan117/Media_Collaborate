<?php

namespace App\Http\Controllers;
use ZipArchive;
use App\Models\VideoManPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class VideoEditorController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function downloadAll(Request $request)
    {
        $request->validate([
            'videos' => 'required|array',
            'videos.*' => 'required|url',
        ]);

        $videos = $request->input('videos', []);

        $zip = new ZipArchive();
        $zipFileName = 'videos.zip';
        $zipFilePath = storage_path($zipFileName);

        if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
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
        $zip = new ZipArchive();
        $zipFileName = 'photos.zip';
        $zipFilePath = storage_path('app/public/' . $zipFileName);

        if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
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
    public function index()
    {
        $posts = VideoManPost::orderByRaw("
            CASE
                WHEN status = 'pending' THEN 1
                WHEN status = 'approved' THEN 2
                WHEN status = 'rejected' THEN 3
                ELSE 4
            END
        ")
            ->orderBy('created_at', 'desc')
            ->get();


        return view('admin.video_editor.index', compact('posts'));
    }
    public function edit($id)
    {
        $videoManPost = VideoManPost::findOrFail($id);

        return view('admin.video_editor.edit', compact('videoManPost'));
    }

    // Update the specified resource in storage
    public function update(Request $request, $id)
    {
        $videoManPost = VideoManPost::findOrFail($id);

        // Validate the request data
        $request->validate([
            'edited_photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'edited_videos.*' => 'nullable|mimes:mp4,avi,mkv|max:20480',
        ]);

        // Initialize arrays for existing and new photos/videos
        $photos = $videoManPost->photos ?? [];
        $videos = $videoManPost->videos ?? [];
        $editedPhotos = $videoManPost->edited_photos ?? [];
        $editedVideos = $videoManPost->edited_videos ?? [];

        // Handle new photos
        if ($request->hasFile('edited_photos')) {
            foreach ($request->file('edited_photos') as $photo) {
                $path = $photo->store('photos', 'public');
                $editedPhotos[] = $path;
            }
        }

        // Handle new videos
        if ($request->hasFile('edited_videos')) {
            foreach ($request->file('edited_videos') as $video) {
                $path = $video->store('videos', 'public');
                $editedVideos[] = $path;
            }
        }

        // Handle removed photos
        if ($request->has('removed_photos')) {
            $removedPhotos = explode(',', $request->input('removed_photos'));
            foreach ($removedPhotos as $photo) {
                Storage::disk('public')->delete($photo);
                // Remove from existing photos
                $photos = array_diff($photos, [$photo]);
                // Remove from edited photos
                $editedPhotos = array_diff($editedPhotos, [$photo]);
            }
        }

        // Handle removed videos
        if ($request->has('removed_videos')) {
            $removedVideos = explode(',', $request->input('removed_videos'));
            foreach ($removedVideos as $video) {
                Storage::disk('public')->delete($video);
                // Remove from existing videos
                $videos = array_diff($videos, [$video]);
                // Remove from edited videos
                $editedVideos = array_diff($editedVideos, [$video]);
            }
        }

        // Update the videoManPost with the new data
        $videoManPost->photos = array_values($photos);
        $videoManPost->videos = array_values($videos);
        $videoManPost->edited_photos = array_values($editedPhotos);
        $videoManPost->edited_videos = array_values($editedVideos);
        $videoManPost->save();

        return redirect()->route('video_editor.index')->with('success', 'Post updated successfully');
    }

public function show($id){
    $post = VideoManPost::findOrFail($id);
    return view('admin.video_editor.show', compact('post'));
}
}
