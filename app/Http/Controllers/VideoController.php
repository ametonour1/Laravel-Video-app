<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\videosDocument;
use FFMpeg\FFMpeg;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Exception;


class VideoController extends Controller
{

  

    public function show($id)
    {
        
        $video = videosDocument::findOrFail($id); // Find the video by its ID
        $video->increment('views');
        return view('videos.show', compact('video')); // Pass the video to the detail view
        
    }

    public function showUploadForm()
    {
        return view('videos.upload');
        
    }

    public function handleUpload(Request $request)
    {
        try {
            $userId = $request->user()->id;

            //dd($request->all());

    
            $request->validate([
                'video' => 'required|mimes:mp4,mov,avi,flv|max:102400', // Max 100 MB
                'thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Max 2 MB
                'title' => 'required|string|max:255',
                'description' => 'nullable|string|max:1000',
            ]);
    
            // Store the files in the public disk
            $videoPath = $request->file('video')->store('videos', 'public');
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
    
            $ffprobe = \FFMpeg\FFProbe::create();
            $duration = $ffprobe->format(storage_path("app/public/$videoPath"))->get('duration');
            
            Log::info('Video upload started', [
                'user_id' => $userId,
                'video_path' => $videoPath,
                'thumbnail_path' => $thumbnailPath,
                'duration' => $duration
            ]);
    
            // Convert seconds to a more human-readable format (optional)
            $minutes = floor($duration / 60);
            $seconds = $duration % 60;
            $formattedDuration = sprintf('%02d:%02d', $minutes, $seconds);
    
            // Save the record in the database
            $video = videosDocument::create([
                'user_id' => $userId,
                'file_path' => $videoPath,
                'thumbnail' => $thumbnailPath,
                'title' => $request->title,
                'description' => $request->description,
                'duration' => $formattedDuration,
            ]);
    
            Log::info('Video uploaded successfully', ['video_id' => $video->id]);
    
            return redirect()->route('videos.upload')->with('success', 'Video uploaded successfully!');
            
        } catch (Exception $e) {
            Log::error('Video upload failed', [
                'error_message' => $e->getMessage(),
                'stack_trace' => $e->getTraceAsString()
            ]);
    
            return redirect()->route('videos.upload')->with('error', 'Video upload failed!');
        }
    }
}
