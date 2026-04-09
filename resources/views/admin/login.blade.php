<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@7.1.0/css/fontawesome.min.css"
        integrity="sha256-G5bovI+uHM2gCO6EwO9PFQcclSBYzTaxY6DXks3YxBU=" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="{{ asset('assets/favicon.png') }}">
    <style>
        body {
            background-color: #f8f9fa;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            background-color: white;
            border-radius: 1rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            max-width: 900px;
            padding: 0;
        }

        .illustration-side {
            background-color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 2rem;
        }

        .illustration-side img {
            max-width: 100%;
            max-height: 400px;
            height: auto;
        }

        .form-side {
            padding: 3rem 2rem;
        }

        .social-icons a {
            font-size: 1.5rem;
            margin: 0 0.5rem;
        }

        .btn-login {
            padding: 15px 35px;
            background-color: #3a91cf;
            border-color: #3a91cf;
        }

        .btn-login:hover {
            background-color: #2d85c3;
            border-color: #2d85c3;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLMD5x90o1T+s5Xg0u7/N3W5p+c5nI0S8+V0I4W3a6s5h0I9S2+nE1B8W5Wq1wG2w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <div class="container login-container">
        <div class="row g-0">

            <!-- LEFT: Form side -->
            <div class="col-md-6 form-side">
                <h2 class="mb-5">LOGIN</h2>
                
                <form method="POST" action="{{ url('admin/login') }}">
                    @csrf

                    <!-- Email -->
                    <div class="mb-4 input-group">
                        <span class="input-group-text bg-white border-end-0"><i class="fas fa-user"></i></span>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control border-start-0"
                            placeholder="Enter Your Email">
                        <span class="input-group-text bg-white border-start-0"><i class="far fa-clipboard"></i></span>
                    </div>

                    @error('email')
                        <div class="alert alert-danger py-1">{{ $message }}</div>
                    @enderror

                    <!-- Password -->
                    <div class="mb-4 input-group">
                        <span class="input-group-text bg-white border-end-0">
                            <i class="fas fa-lock"></i>
                        </span>
                    
                        <input type="password" id="passwordField" name="password" class="form-control border-start-0 border-end-0"
                            placeholder="Enter Your Password" required>
                    
                        <span class="input-group-text bg-white border-start-0" style="cursor: pointer;" onclick="togglePassword()">
                            <i id="toggleIcon" class="fas fa-eye"></i>
                        </span>
                    </div>

                    @error('password')
                        <div class="alert alert-danger py-1">{{ $message }}</div>
                    @enderror

                    <!-- Custom error from controller -->
                    @if(session('error'))
                        <div class="alert alert-danger py-1">{{ session('error') }}</div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="mb-5 form-check">
                        <input type="checkbox" class="form-check-input" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>

                    <div class="mb-5">
                        <button type="submit" class="btn btn-primary btn-login">Log in</button>
                    </div>
                </form>

            </div>

            <!-- RIGHT: Illustration side -->
            <div class="col-md-6 d-none d-md-flex illustration-side border-start">
                <img src="{{ asset('assets/globeLogin.jpg') }}" srcset="{{ asset('assets/globeLogin.jpg')}}"
                    alt="Person working on a laptop sitting in a chair next to plants" class="img-fluid">
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@7.1.0/js/all.min.js"
        integrity="sha256-Z6/mj/QZDUfTjL6nkq7pwkHNZpkVY8Xk8Appn4bTLXs=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script>
        function togglePassword() {
            const passwordField = document.getElementById("passwordField");
            const toggleIcon = document.getElementById("toggleIcon");

            if (passwordField.type === "password") {
                passwordField.type = "text";
                toggleIcon.classList.remove("fa-eye");
                toggleIcon.classList.add("fa-eye-slash");
            } else {
                passwordField.type = "password";
                toggleIcon.classList.remove("fa-eye-slash");
                toggleIcon.classList.add("fa-eye");
            }
        }
    </script>
</body>

</html>