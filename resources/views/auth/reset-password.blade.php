<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { background-color: #f8f9fa; min-height: 100vh; display: flex; justify-content: center; align-items: center; }
        .login-container { background-color: white; border-radius: 1rem; box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15); max-width: 900px; padding: 0; overflow: hidden; }
        .form-side { padding: 3rem 2rem; }
        .btn-submit { padding: 12px 35px; background-color: rgb(108 186 12); border: none; color: white; border-radius: 10px; }
        .btn-submit:hover { background-color: rgb(90 150 10); color: white; }
        .alert-wrapper { position: fixed; top: 15px; left: 50%; transform: translateX(-50%); z-index: 9999; width: min(90vw, 520px); }
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
                <h2 class="mb-4">Reset Password</h2>
                <form action="{{ route('password.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="mb-3">
                        <label class="form-label small fw-bold">Email Address</label>
                        <input type="email" name="email" class="form-control" placeholder="Confirm your email" value="{{ old('email', $email) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold">New Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Min 8 characters" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label small fw-bold">Confirm New Password</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Repeat password" required>
                    </div>

                    <button type="submit" class="btn btn-submit w-100">Update Password</button>
                </form>
            </div>
            <div class="col-md-6 d-none d-md-flex justify-content-center align-items-center bg-light border-start p-4">
                <img src="{{ asset('assets/globe assist logo.png') }}" style="width: 200px; opacity: 0.5;" alt="Logo">
            </div>
        </div>
    </div>

</body>
</html>
