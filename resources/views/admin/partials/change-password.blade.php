@extends('admin.layouts.app')

@section('title', 'Change Password')
@section('page-title', 'Change Password')

@section('content')
  <div class="row justify-content-center">
    <div class="col-lg-7 col-xl-6">
      @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('error') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      @if ($errors->any())
        <div class="alert alert-danger">
          <ul class="mb-0 ps-3">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <div class="card border-0 shadow-sm">
        <div class="card-body p-4 p-md-5">
          <div class="text-center mb-4">
            <div class="mb-3">
              <span class="d-inline-flex align-items-center justify-content-center rounded-circle bg-light"
                style="width: 72px; height: 72px;">
                <i class="fas fa-key text-primary fs-3"></i>
              </span>
            </div>
            <h4 class="mb-2">Update Your Password</h4>
            <p class="text-muted mb-0">Account security ke liye apna current password verify karke naya password set karein.</p>
          </div>

          <form action="{{ route('admin.change-password.update') }}" method="POST">
            @csrf

            <div class="mb-3">
              <label for="current_password" class="form-label fw-semibold">Current Password</label>
              <input type="password" name="current_password" id="current_password"
                class="form-control @error('current_password') is-invalid @enderror"
                placeholder="Enter current password" required>
              @error('current_password')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="new_password" class="form-label fw-semibold">New Password</label>
              <input type="password" name="new_password" id="new_password"
                class="form-control @error('new_password') is-invalid @enderror"
                placeholder="Enter new password" required>
              @error('new_password')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
              <div class="form-text">Password kam se kam 8 characters ka rakhein.</div>
            </div>

            <div class="mb-4">
              <label for="new_password_confirmation" class="form-label fw-semibold">Confirm New Password</label>
              <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                class="form-control @error('new_password_confirmation') is-invalid @enderror"
                placeholder="Confirm new password" required>
              @error('new_password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="d-flex justify-content-end gap-2">
              <button type="reset" class="btn btn-outline-secondary">Reset</button>
              <button type="submit" class="btn btn-primary px-4">Change Password</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
