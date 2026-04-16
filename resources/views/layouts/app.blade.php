<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script src="https://code.jquery.com/jquery-4.0.0.min.js"></script> -->
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/methods.js'])
    <title>@yield('title', 'Notes')</title>
    
</head>
<body class="min-h-screen flex bg-white font-mono">
    <main class="flex mx-auto mt-10 h-max max-w-6xl px-4 py-10 border-2 border-pink-700/50 bg-white">
        @yield('content')
    </main>
</body>
</html>