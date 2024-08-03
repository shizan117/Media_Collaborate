<?php

namespace App\Http\Controllers;

use App\Models\UserIdea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserIdeaController extends Controller
{
    public function index()
    {
        $userIdeas = UserIdea::where('user_id', Auth::id())->orderByRaw("
            CASE
                WHEN status = 'pending' THEN 1
                WHEN status = 'approved' THEN 2
                WHEN status = 'rejected' THEN 3
                ELSE 4
            END
        ")
            ->orderBy('created_at', 'desc')
            ->get();

        return view('user_ideas.index', compact('userIdeas'));
    }


    public function create()
    {
        return view('user_ideas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'idea' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link' => 'nullable|url',
        ]);

        $photoPath = $request->file('photo') ? $request->file('photo')->store('user_ideas', 'public') : null;

        UserIdea::create([
            'user_id' => Auth::id(),
            'idea' => $request->idea,
            'photo' => $photoPath,
            'link' => $request->link,
            'status' => 'pending',
        ]);

        return redirect()->route('user_ideas.index')->with('success', 'Idea posted successfully.');
    }

    public function edit(UserIdea $userIdea)
    {
        return view('user_ideas.edit', compact('userIdea'));
    }

    public function update(Request $request, UserIdea $userIdea)
    {
        $request->validate([
            'idea' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link' => 'nullable|url',
        ]);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('user_ideas', 'public');
            $userIdea->photo = $photoPath;
        }

        $userIdea->idea = $request->idea;
        $userIdea->link = $request->link;
        $userIdea->save();

        return redirect()->route('user_ideas.index')->with('success', 'Idea updated successfully.');
    }

    public function destroy(UserIdea $userIdea)
    {
        $userIdea->delete();
        return redirect()->route('user_ideas.index')->with('success', 'Idea deleted successfully.');
    }
}
