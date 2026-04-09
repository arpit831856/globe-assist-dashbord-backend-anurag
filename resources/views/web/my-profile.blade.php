@extends('web.layouts.app') 

@section('content')
<div class="container py-5">
    <div class="row">
        
        {{-- Profile Sidebar Navigation --}}
        <div class="col-md-4 col-lg-3 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-success text-white fw-bold">
                    Account Navigation
                </div>
                <div class="list-group list-group-flush">
                    <a href="{{ route('user.home') }}" class="list-group-item list-group-item-action active">
                        <i class="fas fa-user-circle me-2"></i> Profile Details
                    </a>
                    <a href="{{ route('web.services') }}" class="list-group-item list-group-item-action">
                        <i class="fas fa-cogs me-2"></i> My Services
                    </a>
                    <a href="{{ route('web.support') }}" class="list-group-item list-group-item-action">
                        <i class="fas fa-life-ring me-2"></i> Need Help
                    </a>
                    <a href="{{ route('logout') }}" class="list-group-item list-group-item-action text-danger">
                        <i class="fas fa-sign-out-alt me-2"></i> Logout
                    </a>
                </div>
            </div>
        </div>

        {{-- Main Profile Content Area --}}
        <div class="col-md-8 col-lg-9">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h2 class="card-title text-success mb-4">Profile Details</h2>

                    {{-- Ensure you have access to the authenticated user here --}}
                    @php
                        $user = Auth::guard('user')->user() ?? Auth::guard('partner')->user();
                        $name = $user->name ?? $user->full_name ?? 'User Name';
                        $email = $user->email ?? 'email@example.com';
                        $mobile = $user->mobile ?? '9876543210';
                    @endphp

                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="name" value="{{ $name }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" value="{{ $email }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="mobile" class="form-label">Mobile Number</label>
                            <input type="text" class="form-control" id="mobile" value="{{ $mobile }}" readonly>
                        </div>

                        <a href="#" class="btn btn-outline-success">Edit Profile</a>
                        <a href="#" class="btn btn-secondary ms-2">Change Password</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection