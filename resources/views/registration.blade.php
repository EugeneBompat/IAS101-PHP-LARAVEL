<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/password-meter.js'])
</head>
<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-sm p-4 bg-white" style="max-width: 450px; width: 100%; border-radius: 10px;">
        <h3 class="text-center mb-4">Create Account</h3>

        <form action="{{ route('registercheck') }}" method="post">
            @csrf

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Enter your name" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter your email" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password"class="form-control @error('password') is-invalid @enderror"name="password" id="password" placeholder="Enter password" required>

                <small class="text-muted d-block mt-2">Password must:</small>
                <ul class="small text-muted mb-2">
                    <li>Be at least 8 characters</li>
                    <li>Include uppercase & lowercase letters</li>
                    <li>Include a number and special character</li>
                </ul>
                <div id="password-meter-container" class="mb-2" style="display:none;">
                    <meter max="4" id="password-meter" class="w-100"></meter>
                    <div id="password-text" class="small fw-bold"></div>
                </div>

                @error('password')
                    <div class="invalid-feedback d-block">{{ $message }}</div> <br>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label">Confirm Password</label>
                <input type="password"
                       class="form-control @error('password_confirmation') is-invalid @enderror"
                       name="password_confirmation"
                       placeholder="Confirm password"
                       required>
                @error('password_confirmation')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" name="signup" class="btn btn-primary w-100" value="Sign Up">
                Sign Up
            </button>
        </form>
    </div>
</div>

</body>
</html>
