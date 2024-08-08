<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * Method to handle comment data from the form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Check if the user is logged in
        if (!auth()->check()) {
            // If not logged in, redirect to the login page with a message
            return view('auth.register')->with('error', 'Please login to comment.');
        }

        // Validate the data from the form
        $request->validate([
            'content' => 'required|string|max:255',
            'song_id' => 'required|exists:songs,id',
        ]);

        // Get the comment data from the form
        $commentText = $request->input('content');

        // Save the comment to the database
        $comment = new Comment();
        $comment->content = $commentText;
        $comment->song_id = $request->input('song_id');

        // Save the user_id of the logged-in user
        $comment->user_id = auth()->user()->id;

        $comment->save();

        // Redirect the user with a success message
        return redirect()->back()->with('success', 'Your comment has been submitted. Thank you!');
    }
}
