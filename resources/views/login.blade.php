<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <h1>Login</h1>
    
    @if ($errors->any())
        <div style="color: red; margin-bottom: 15px;">
            <ul style="list-style: none; padding: 0;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('logincheck')}}" method="post">
        @csrf
        <div>
            <label for="email">Email:</label><br>
            <input type="email" name="email" id="email" placeholder="Email" value="{{ old('email') }}" required><br>
            @error('email')
                <span style="color: red;">{{ $message }}</span><br>
            @enderror
        </div>
        <br>
        <div>
            <label for="password">Password:</label><br>
            <input type="password" name="password" id="password" placeholder="Password" required><br>
            @error('password')
                <span style="color: red;">{{ $message }}</span><br>
            @enderror
        </div>
        <br>
        <input type="submit" name="login" value="Login">
    </form>
</body>
</html>