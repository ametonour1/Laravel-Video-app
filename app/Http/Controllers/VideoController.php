<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\videosDocument;

class VideoController extends Controller
{
    public function show($id)
    {
        $video = videosDocument::findOrFail($id); // Find the video by its ID
        $video->increment('views');
        return view('videos.show', compact('video')); // Pass the video to the detail view
    }
}
