<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Journal;
use Illuminate\Routing\Controller as BaseController;  // Correct import here

class JournalController extends BaseController  // Make sure it's extending BaseController
{
    public function __construct()
    {
        $this->middleware('auth');  // Apply the auth middleware
    }

    // Show form to create journal entry
    public function create()
    {
        return view('journals.create');
    }

    // Store a new journal entry
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'entry' => 'required',
            'mood' => 'required',
        ]);

        // Create the journal entry
        Journal::create([
            'entry' => $request->entry,
            'mood' => $request->mood,
            'user_id' => auth()->id(),  // Ensure user_id is set to the logged-in user's ID
        ]);

        // Redirect back to the journal index page
        return redirect()->route('journals.index');
    }

    // Display list of journal entries
    public function index()
    {
        $journals = Journal::where('user_id', auth()->id())->get();
        return view('journals.index', compact('journals'));
    }

    // Mood analytics
    public function moodAnalytics()
    {
        $happyCount = Journal::where('user_id', auth()->id())->where('mood', 'happy')->count();
        $sadCount = Journal::where('user_id', auth()->id())->where('mood', 'sad')->count();
        $neutralCount = Journal::where('user_id', auth()->id())->where('mood', 'neutral')->count();

        return view('journals.analytics', compact('happyCount', 'sadCount', 'neutralCount'));
    }
}
