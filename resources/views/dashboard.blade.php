<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="bg-light">

    <header class="p-3 mb-4 border-bottom bg-white">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="brand-placeholder">
                <!--<h5 class="mb-0">{{ config('app.name') }}</h5>-->
                <h5 class="mb-0">Company</h5>
            </div>

            <a href="{{ route('logout') }}" class="btn btn-danger btn-lg">Logout</a>
        </div>
    </header>
    <div class="text-center">
    <h1>User Dashboard</h1>
    
    @auth
        <p>Welcome, {{ e(Auth::user()->name) }}!</p>
        <p>Email: {{ e(Auth::user()->email) }}</p>
    @endauth
</body>
</html>