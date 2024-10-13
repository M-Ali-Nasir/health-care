<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoryController extends Controller
{
    //store the Story of the user
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'story' => 'required|string',
        ]);

        Story::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'story' => $request->story,
        ]);

        return redirect()->route('read-story')->with('success', 'Story added successfully.');
    }

    //Delete Story 
    public function deleteStory($id)
    {
        $story = Story::findOrFail($id);
        $story->delete();

        return redirect()->back()->with('success', 'Story deleted successfully.');
    }


    //update story

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'story' => 'required|string',
        ]);

        $story = Story::findOrFail($id);
        $story->update([
            'title' => $request->title,
            'story' => $request->story,
        ]);

        return redirect()->back()->with('success', 'Story updated successfully.');
    }
}
