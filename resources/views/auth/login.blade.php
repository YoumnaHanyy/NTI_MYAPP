<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
        }
        .login-card {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 10px 15px rgba(0, 0, 0, 0.1);
        }
        .bg-custom-blue {
            background-color: #2F6DFF;
        }
        .bg-custom-cyan {
            background-color: #03E7E7;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center relative overflow-hidden">
    <!-- Background shapes from the image -->
    <div class="absolute inset-0 z-0">
        <div class="absolute w-[800px] h-[800px] bg-custom-blue rounded-full opacity-20 -left-64 -top-64 transform rotate-[30deg]"></div>
        <div class="absolute w-[600px] h-[600px] bg-custom-cyan rounded-full opacity-30 -right-64 -bottom-64 transform rotate-[45deg]"></div>
        <div class="absolute w-[500px] h-[500px] bg-custom-blue rounded-full opacity-20 top-0 left-0"></div>
        <div class="absolute w-[400px] h-[400px] border-4 border-yellow-300 rounded-full opacity-50 right-20 top-40 animate-spin-slow"></div>
    </div>
    
    <div class="bg-white p-8 rounded-3xl shadow-lg w-full max-w-sm z-10 login-card">
        <div class="text-center mb-6">
            <svg class="w-10 h-10 mx-auto text-custom-cyan mb-2" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zm-1.8 15.3l-5.5-5.5 1.5-1.5 4 4 7.5-7.5 1.5 1.5-9 9z"/>
            </svg>
            <h1 class="text-2xl font-semibold text-gray-800">Login</h1>
        </div>

        <!-- This section would handle form errors -->
        <div id="error-message" class="hidden bg-red-100 border-l-4 border-red-500 text-red-700 p-3 mb-4 rounded-md" role="alert">
            <p id="error-text" class="text-sm font-medium"></p>
        </div>

        <form action="{{ route('login.post') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="mb-4 relative">
                <label for="email" class="sr-only">Email address</label>
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884zM18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                    </svg>
                </div>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="audrey_weimann@anissa.org">
            </div>

            <div class="mb-6 relative">
                <label for="password" class="sr-only">Password</label>
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 2a5 5 0 00-5 5v2a2 2 0 00-2 2v5a2 2 0 002 2h10a2 2 0 002-2v-5a2 2 0 00-2-2V7a5 5 0 00-5-5zm-3 5a3 3 0 016 0v2H7V7z"/>
                    </svg>
                </div>
                <input id="password" name="password" type="password" required class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="password">
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 rounded-md hover:bg-blue-700 transition-colors">
                Login
            </button>
        </form>

        <div class="flex flex-col items-center mt-6 text-sm text-gray-500">
            <a href="#" class="text-blue-600 hover:underline mb-2">or Sign Up</a>
            <a href="#" class="hover:underline text-xs">forgot password?</a>
        </div>
    </div>
    
    <!-- Footer icon from the image -->
    <div class="absolute bottom-4 right-4">
        <svg class="w-8 h-8 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
            <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
            <path d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zm0 18a8 8 0 100-16 8 8 0 000 16z"/>
        </svg>
    </div>
</body>
</html>
