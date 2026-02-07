<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/password-meter.js'])
</head>
<body>
    <h1>Sign Up</h1>
    <form action="{{route('registercheck')}}" method="post">
        @csrf
        <input type="text" name="name" placeholder="Name"><br>
        <input type="email" name="email" placeholder="Email"><br>
        <input type="password" name="password" id="password" placeholder="Password"><br>

        <div id="password-meter-container" style="display: none; margin-top: 5px; margin-bottom: 10px;">
            <meter max="4" id="password-meter" style="width: 200px;"></meter>
            <div id="password-text" style="font-size: 12px; font-weight: bold;"></div>
        </div>

        <input type="submit" name="signup" value="Sign Up">
    </form>

</body>
</html>