<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <h1>Admin Dashboard</h1>
    
    @auth
        <p>Welcome, {{ e(Auth::user()->name) }}!</p>
        <p>Email: {{ e(Auth::user()->email) }}</p>
    @endauth
    
    <a href="{{route('logout')}}">Logout</a>
</body>
</html>