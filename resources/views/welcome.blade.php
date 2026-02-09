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
                <nav class="nav">
                    @auth <!--Authentication if the user if logged in and it will show the dashboard button-->
                        <a href="{{ url('/dashboard') }}" class="btn btn-outline-primary btn-sm">
                            Dashboard
                        </a>
                    @else<!--It will show Login or register button if the user is not logged-->
                        <a href="{{ route('login') }}" class="nav-link btn btn-secondary text-dark me-2">
                            Log in
                        </a>
                            <a href="{{ route('register') }}" class="btn btn-primary btn-lg">
                                Register
                            </a>
                    @endauth
                </nav>
        </div>
    </header>

    <main class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8 text-center">
                <h1 class="display-4 fw-bold">Company Announcement Portal</h1>
                <p class="lead text-secondary">
                </p>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>