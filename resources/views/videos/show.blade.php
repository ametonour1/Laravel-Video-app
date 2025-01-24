<!-- resources/views/videos/show.blade.php -->


<x-app-layout>
    <div class="video-detail">
        <h2>{{ $video->title }}</h2>
        <p>{{ $video->description }}</p>
        <p>Views: {{ $video->views }}</p>

        <!-- Video Player -->
        <video width="100%" controls>
            <source src="{{ asset('storage/'.$video->file_path) }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
    <div>
        <h2>Comments</h2>
@foreach ($comments as $comment)
    <div>
        <strong>{{ $comment->user->name }}</strong> said:
        <p>{{ $comment->content }}</p>
    </div>
@endforeach

<form action="{{ route('comments.store', $video->id) }}" method="POST">
    @csrf
    <textarea name="content" placeholder="Write a comment..." required></textarea>
    <button type="submit">Submit</button>
</form>
    </div>
</x-app-layout>
