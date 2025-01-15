<!-- resources/views/videos/show.blade.php -->


<x-app-layout>
    <div class="video-detail">
        <h2>{{ $video->title }}</h2>
        <p>{{ $video->description }}</p>
        <p>Views: {{ $video->views }}</p>

        <!-- Video Player -->
        <video width="100%" controls>
            <source src="{{ asset($video->file_path) }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
</x-app-layout>
