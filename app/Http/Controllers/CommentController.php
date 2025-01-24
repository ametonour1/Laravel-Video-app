<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\videosDocument;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|string|max:500',
        ]);
    
        $video = videosDocument::findOrFail($id);
    
        $comment = new Comment();
        $comment->content = $request->input('content');
        $comment->user_id = auth()->id();
        $comment->videos_document_id = $video->id;
        $comment->save();
    
        return redirect()->route('videos.show', $video->id)
            ->with('success', 'Comment added successfully!');
    }

    public function index($id)
    {
        // Fetch all comments for the given video
        $video = videosDocument::findOrFail($id);
        $comments = $video->comments()->with('user')->latest()->get();
    
        return view('videos.show', compact('video', 'comments'));
    }
}