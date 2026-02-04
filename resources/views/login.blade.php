<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <h1>Login</h1>
    <form action="{{route('logincheck')}}" method="post">
        @csrf
        <input type="email" name="email" placeholder="Email"><br>
        <input type="password" name="password" placeholder="Password"><br>
        <input type="submit" name="login" value="login">
    </form>
</body>
</html>