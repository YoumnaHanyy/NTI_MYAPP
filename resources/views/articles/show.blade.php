<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $article->title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="max-w-4xl mx-auto py-10 px-4">
        {{-- رجوع للداشبورد --}}
        <a href="{{ route('user.dashboard') }}" 
           class="inline-block mb-6 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
            ← Back
        </a>

        <div class="bg-white shadow-lg rounded-2xl overflow-hidden">
            @if($article->image)
                <img src="{{ asset('storage/'.$article->image) }}" 
                     class="w-full h-80 object-cover" 
                     alt="{{ $article->title }}">
            @endif

            <div class="p-8">
                <h1 class="text-4xl font-bold mb-4">{{ $article->title }}</h1>
                <p class="text-gray-500 text-sm mb-6">Posted {{ $article->created_at->diffForHumans() }}</p>
                <div class="text-gray-700 text-lg leading-relaxed whitespace-pre-line">
                    {{ $article->content }}
                </div>
            </div>
        </div>
    </div>
</body>
</html>
