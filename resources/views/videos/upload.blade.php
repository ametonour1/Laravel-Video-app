<x-app-layout>
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Upload Video</h1>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('videos.handleUpload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium">Title</label>
            <input type="text" name="title" id="title" class="border rounded w-full p-2" value="{{ old('title') }}" required>
            @error('title')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium">Description</label>
            <textarea name="description" id="description" class="border rounded w-full p-2">{{ old('description') }}</textarea>
            @error('description')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="video" class="block text-sm font-medium">Video File</label>
            <input type="file" name="video" id="video" class="border rounded w-full p-2" required>
            @error('video')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="thumbnail" class="block text-sm font-medium">Thumbnail</label>
            <input type="file" name="thumbnail" id="thumbnail" class="border rounded w-full p-2" required>
            @error('thumbnail')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="bg-blue-500 btn-outline-primary text-black px-4 py-2 rounded">Upload</button>
    </form>
</div>
</x-app-layout>