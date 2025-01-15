
<x-app-layout>
<h1>All Videos</h1>

@if (isset($videos) && $videos->isNotEmpty())
    <ul>
        @foreach ($videos as $video)
<div class="video-item" style="border: solid black 1px">
    <!-- Video Thumbnail -->
    <img style="height: 200px" src="{{ asset('thumbnails/' . $video->thumbnail) }}" alt="Thumbnail" class="video-thumbnail">
    
    <!-- Video Title and Views -->
    <h3>{{ $video->title }}</h3>
    <p>Views: {{ $video->views }}</p>

    <!-- Link to Video Detail Page -->
    <a href="{{ route('videos.show', $video->id) }}" class="btn btn-primary">View Video</a>
</div>
@endforeach

    </ul>
@else
    <p>No videos available.</p>
@endif
</x-app-layout>
