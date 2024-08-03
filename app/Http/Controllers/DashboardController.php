<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserIdea;
use App\Models\VideoEditor;
use App\Models\VideoManPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index(){
        $public_ideas = UserIdea::all();
        $users= User::all();
       // dd($users);
        $video_man_posts = VideoManPost::all();
        $video_editor_posts = VideoManPost::all();

        return view('admin.dashboard.home', compact('public_ideas','video_man_posts','video_editor_posts','users'));
    }
    public function showProfile()
    {
        $user = Auth::user();
        return view('admin.profile.show', compact('user'));
    }
    public function editProfile()
    {
        $user = Auth::user();
        return view('admin.profile.edit', compact('user'));
    }

    public function updateProfile(Request $request){
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'photo' => 'nullable|image|max:2048',
            'password' => 'nullable|string|confirmed',

        ]);
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($user->photo && Storage::exists('public/' . $user->photo)) {
                Storage::delete('public/' . $user->photo);
            }

            $fileName = time() . '_' . $request->file('photo')->getClientOriginalName();
            $filePath = $request->file('photo')->storeAs('photos', $fileName, 'public');
            $user->photo = $filePath;
        }

        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully.');
    }

}
