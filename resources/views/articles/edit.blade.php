<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Article</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white shadow-lg rounded-2xl p-8 w-full max-w-lg">
        <h1 class="text-2xl font-bold mb-6">Edit Article</h1>

        @if($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block font-semibold">Title</label>
                <input type="text" name="title" value="{{ old('title', $article->title) }}" 
                       class="w-full border rounded-lg px-3 py-2" required>
            </div>

            <div>
                <label class="block font-semibold">Content</label>
                <textarea name="content" rows="5" 
                          class="w-full border rounded-lg px-3 py-2" required>{{ old('content', $article->content) }}</textarea>
            </div>

            <div>
                <label class="block font-semibold">Image (optional)</label>
                <input type="file" name="image" class="w-full border rounded-lg px-3 py-2">
                @if($article->image)
                    <div class="mt-2">
                        <p class="text-sm text-gray-500">Current Image:</p>
                        <img src="{{ asset('storage/'.$article->image) }}" class="h-32 rounded-lg mt-2 shadow">
                    </div>
                @endif
            </div>

            <div class="flex justify-between items-center mt-6">
                <a href="{{ route('admin.dashboard') }}" 
                   class="px-4 py-2 bg-gray-300 text-gray-800 rounded-lg hover:bg-gray-400">
                    Cancel
                </a>
                <button type="submit" 
                        class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    Update
                </button>
            </div>
        </form>
    </div>
</body>
</html>
