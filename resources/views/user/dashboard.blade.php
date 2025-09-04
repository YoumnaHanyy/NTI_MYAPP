<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
        }
        .header-bg {
            background-image: url('/images/2.jpg');
            background-size: cover;
            background-position: center;
        }
        .card-image {
            height: 200px; /* Fixed height for consistency */
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen">

<!-- Top Navigation Bar -->
<nav class="bg-white shadow-md">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <div class="flex items-center">
                <a href="#" class="flex-shrink-0 text-xl font-bold text-gray-800">ECHOIZ</a>
            </div>
            <div class="flex items-center space-x-4">
                <a href="#" class="text-gray-600 hover:text-gray-900 transition-colors">HOME</a>
                <a href="#" class="text-gray-600 hover:text-gray-900 transition-colors">GET STARTED</a>
                <a href="#" class="text-gray-600 hover:text-gray-900 transition-colors">BUSINESS</a>
                <a href="#" class="text-gray-600 hover:text-gray-900 transition-colors">LIFESTYLE</a>
                <a href="#" class="text-gray-600 hover:text-gray-900 transition-colors">TECHNOLOGY</a>
            </div>
            <div class="flex items-center space-x-4">
                <!-- زرار New Article -->
                <a href="{{ route('articles.create') }}" class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-full hover:bg-blue-700 transition-colors">New Article</a>
                
                <!-- زرار Logout -->
                <form method="POST" action="{{ route('logout') }}" class="inline-block">
                    @csrf
                    <button type="submit" class="px-6 py-2 border border-gray-300 rounded-full text-gray-700 font-semibold hover:bg-gray-100 transition-colors">Logout</button>
                </form>
            </div>
        </div>
    </div>
</nav>

<!-- Main Header Section with image -->
<header class="header-bg py-20 px-4 sm:px-6 lg:px-8 flex flex-col items-center justify-center text-center">
    <h1 class="text-4xl font-bold text-gray-900 mb-2">Latest News & Article</h1>
    <p class="text-gray-600">Archives</p>
</header>

<div class="container mx-auto py-8 px-4 sm:px-6 lg:px-8">

    <div class="flex flex-col sm:flex-row justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-4 sm:mb-0">Articles</h1>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($articles as $article)
            <div class="bg-white rounded-3xl shadow-lg overflow-hidden transition-transform duration-300 hover:scale-105">
                @if($article->image)
                    <img src="{{ asset('storage/'.$article->image) }}" class="w-full h-48 object-cover" alt="{{ $article->title }}">
                @endif
                <div class="p-6">
                    <h5 class="text-xl font-bold mb-2">{{ $article->title }}</h5>
                    <p class="text-gray-600 text-sm line-clamp-3 mb-4">{{ $article->content }}</p>
                    <p class="text-gray-400 text-xs">Posted {{ $article->created_at->diffForHumans() }}</p>
                </div>
            </div>
        @empty
            <p class="col-span-full text-center text-gray-500">No articles yet.</p>
        @endforelse
    </div>

</div>
</body>
</html>
