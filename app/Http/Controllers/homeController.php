<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\videosDocument;


class HomeController extends Controller
{
    public function index()
    {
        // Fetch all videos
        $videos = videosDocument::all();

        // Pass videos to the homepage view
        return view('home', compact('videos'));
    }
}
