<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Playfair+Display:wght@700&display=swap');

        :root {
            --primary-color: #4A90E2;
            --secondary-color: #3B5998;
            --text-dark: #1A202C;
            --text-light: #5A6A85;
            --bg-light: #F8F9FA;
            --card-bg: #FFFFFF;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-light);
            color: var(--text-dark);
        }

        .header-bg {
            background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.6)), url('/images/2.jpg');
            background-size: cover;
            background-position: center;
        }

        .header-title {
            font-family: 'Playfair Display', serif;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .card-image {
            height: 200px; /* Fixed height for consistency */
        }
        
        .card {
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background-color: var(--primary-color);
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: var(--secondary-color);
        }
    </style>
</head>
<body class="min-h-screen">

<nav class="bg-white shadow-lg">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <div class="flex items-center">
                <a href="#" class="flex-shrink-0 text-3xl font-bold text-gray-900 tracking-wider">ECHOIZ</a>
            </div>
            <div class="hidden md:flex items-center space-x-6">
                <a href="#" class="text-gray-600 hover:text-gray-900 transition-colors font-medium">HOME</a>
                <a href="#" class="text-gray-600 hover:text-gray-900 transition-colors font-medium">GET STARTED</a>
                <a href="#" class="text-gray-600 hover:text-gray-900 transition-colors font-medium">BUSINESS</a>
                <a href="#" class="text-gray-600 hover:text-gray-900 transition-colors font-medium">LIFESTYLE</a>
                <a href="#" class="text-gray-600 hover:text-gray-900 transition-colors font-medium">TECHNOLOGY</a>
            </div>
            <div class="flex items-center space-x-4">
                <a href="{{ route('articles.create') }}" class="px-6 py-3 btn-primary text-white font-semibold rounded-full shadow-md hover:shadow-lg transition-all duration-300">New Article</a>
                
                <form method="POST" action="{{ route('logout') }}" class="inline-block">
                    @csrf
                    <button type="submit" class="px-6 py-3 border border-gray-300 rounded-full text-gray-700 font-semibold hover:bg-gray-100 transition-colors duration-300">Logout</button>
                </form>
            </div>
        </div>
    </div>
</nav>

<header class="header-bg py-24 px-4 sm:px-6 lg:px-8 flex flex-col items-center justify-center text-center">
    <h1 class="header-title text-5xl sm:text-6xl font-extrabold mb-4 animate-fadeIn">Latest News & Article</h1>
    <p class="text-white text-lg sm:text-xl font-light opacity-80 animate-fadeIn delay-100">Exploring the world, one story at a time.</p>
</header>

<div class="container mx-auto py-12 px-4 sm:px-6 lg:px-8">

    <div class="flex flex-col sm:flex-row justify-between items-center mb-10">
        <h1 class="text-4xl font-extrabold text-gray-800 mb-4 sm:mb-0 border-b-4 border-primary-color inline-block pb-2">All Articles</h1>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-8 rounded-lg shadow-md" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
    @forelse($articles as $article)
        <a href="{{ route('articles.show', $article->id) }}" class="bg-card-bg rounded-2xl card overflow-hidden block">
            @if($article->image)
                <img src="{{ asset('storage/'.$article->image) }}" 
                     class="w-full card-image object-cover" 
                     alt="{{ $article->title }}">
            @endif
            <div class="p-6">
                <h5 class="text-xl font-bold mb-2 text-text-dark">{{ $article->title }}</h5>
                <p class="text-gray-500 text-sm line-clamp-3 mb-4">{{ $article->content }}</p>
                <p class="text-gray-400 text-xs font-light">Posted {{ $article->created_at->diffForHumans() }}</p>
            </div>
        </a>
    @empty
        <p class="col-span-full text-center text-gray-500 text-xl py-20">
            No articles have been posted yet. Time to create one! 📝
        </p>
    @endforelse
</div>


</div>
</body>
</html>