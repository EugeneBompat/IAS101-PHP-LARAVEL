<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-sm p-4 bg-white" style="max-width: 400px; width: 100%; border-radius: 10px;">
        <h3 class="text-center mb-4">Login</h3>

        <form action="{{ route('logincheck') }}" method="post">
            @csrf
            <!-- Email -->
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter your email" required>
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter your password" required>
            </div>

            @error('email') 
                <span style="color: red;">{{ $message }}</span><br> 
            @enderror

            <!-- Submit -->
            <button type="submit" class="btn btn-primary w-100">
                Login
            </button>
        </form>

        <div class="text-center mt-3">
            <small>Don't have an account? <a href="{{ route('register') }}">Sign Up</a></small>
        </div>
    </div>
</div>

</body>
</html>
