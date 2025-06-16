<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>@yield('title', 'Todo App')</title>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <!-- Vite -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="bg-dark text-white" style="font-family: 'Inter', sans-serif;">
    <div id="app" class="container py-4">
        @yield('content')
    </div>
</body>
</html>
