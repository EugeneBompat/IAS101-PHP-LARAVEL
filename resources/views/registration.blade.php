<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/password-meter.js'])
</head>
<body>
    <h1>Sign Up</h1>
    
    @if ($errors->any())
        <div style="color: red; margin-bottom: 15px;">
            <ul style="list-style: none; padding: 0;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('registercheck')}}" method="post">
        @csrf
        <div>
            <label for="name">Name:</label><br>
            <input type="text" name="name" id="name" placeholder="Name" value="{{ old('name') }}" required><br>
            @error('name')
                <span style="color: red;">{{ $message }}</span><br>
            @enderror
        </div>
        <br>
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
            <small>Password must be at least 8 characters and contain uppercase, lowercase, number, and special character.</small><br>
            
            <div id="password-meter-container" style="display: none; margin-top: 5px; margin-bottom: 10px;">
                <meter max="4" id="password-meter" style="width: 200px;"></meter>
                <div id="password-text" style="font-size: 12px; font-weight: bold;"></div>
            </div>
            
            @error('password')
                <span style="color: red;">{{ $message }}</span><br>
            @enderror
        </div>
        <br>
        <div>
            <label for="password_confirmation">Confirm Password:</label><br>
            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" required><br>
            @error('password_confirmation')
                <span style="color: red;">{{ $message }}</span><br>
            @enderror
        </div>
        <br>
        <input type="submit" name="signup" value="Sign Up">
    </form>

</body>
</html>