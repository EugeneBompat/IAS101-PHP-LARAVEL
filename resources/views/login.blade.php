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
    <form action="{{route('logincheck')}}" method="post">
        @csrf
        <div>
            <label for="email">Email:</label><br>
            <input type="email" name="email" id="email" placeholder="Email" value="{{ old('email') }}" required><br>
        </div>
        <br>
        <div>
            <label for="password">Password:</label><br>
            <input type="password" name="password" id="password" placeholder="Password" required><br>
        </div>
        @error('email')
            <span style="color: red;">{{ $message }}</span><br>
        @enderror
        <br>
        <input type="submit" name="login" value="Login">
    </form>
</body>
</html>