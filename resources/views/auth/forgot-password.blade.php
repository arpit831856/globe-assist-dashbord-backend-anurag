<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="icon" type="image/png" href="{{ asset('assets/favicon.png') }}">
    <style>
        /* Aapka Original Style */
        body { background-color: #f8f9fa; min-height: 100vh; display: flex; justify-content: center; align-items: center; }
        .login-container { background-color: white; border-radius: 1rem; box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15); max-width: 900px; padding: 0; overflow: hidden; }
        .illustration-side { background-color: white; display: flex; justify-content: center; align-items: center; padding: 2rem; }
        .illustration-side img { max-width: 100%; max-height: 400px; height: auto; }
        .form-side { padding: 3rem 2rem; }
        .btn-login { padding: 12px 35px; background-color: #3a91cf; border-color: #3a91cf; color: white; border-radius: 10px; }
        .btn-login:hover { background-color: #2d85c3; border-color: #2d85c3; color: white; }
        .alert-wrapper { position: fixed; top: 15px; left: 50%; transform: translateX(-50%); z-index: 9999; }
    </style>
</head>
<body>

    <div class="alert-wrapper">
        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error) <div>{{ $error }}</div> @endforeach
            </div>
        @endif
    </div>

    <div class="container login-container">
        <div class="row g-0">
            <div class="col-md-6 form-side">
                <div class="text-left mb-4">
                    <img src="{{ asset('assets/globe assist logo.png') }}" alt="logo" style="width: 120px;">
                </div>
                <h2 class="mb-3">Forgot Password?</h2>
                <p class="text-muted mb-4">No worries! Enter your email and we'll send you a reset link.</p>
                
                <form action="{{ route('password.email') }}" method="POST">
                    @csrf
                    <div class="mb-4 input-group">
                        <span class="input-group-text bg-white border-end-0"><i class="fas fa-envelope"></i></span>
                        <input type="email" name="email" class="form-control border-start-0" placeholder="Enter Your Registered Email" value="{{ old('email') }}" required>
                    </div>

                    <div class="mb-4">
                        <button type="submit" class="btn btn-login w-100">Send Reset Link</button>
                    </div>
                </form>
                
                <div class="text-center">
                    <a href="{{ route('login') }}" class="text-decoration-none text-primary fw-bold">
                        <i class="fas fa-arrow-left me-2"></i>Back to Login
                    </a>
                </div>
            </div>
            <div class="col-md-6 d-none d-md-flex illustration-side border-start">
                <img src="{{ asset('assets/globeLogin.jpg') }}" alt="Illustration">
            </div>
        </div>
    </div>
</body>
</html>
