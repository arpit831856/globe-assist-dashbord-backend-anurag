@php
    // User Lookup Logic (Same as before)
    $guards = ['admin', 'user', 'partner'];
    $authUser = null;
    $activeGuard = null;

    foreach ($guards as $guard) {
        if (Auth::guard($guard)->check()) {
            $authUser = Auth::guard($guard)->user();
            $activeGuard = $guard; 
            break; 
        }
    }

    $name = $authUser ? ($authUser->name ?? $authUser->full_name) : null;
    $mobile = $authUser->mobile ?? 'N/A';
    $profileImage = $authUser 
        ? ($authUser->image ? asset('storage/' . $authUser->image) : asset('assets/unsplash_ig.png'))
        : 'https://globeassist.in/assets/ix_user-profile-filled.svg'; // Default icon for guest
@endphp

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


<nav class="navbar navbar-expand-lg sticky-top bg-light border-bottom">
    <div class="container-fluid px-4">

        <a class="navbar-brand" href="https://www.globeassist.in" target="_blank">
            <img src="{{ asset('assets/globe assist logo.png') }}" alt="Logo" height="55">
        </a>

        <div class="collapse navbar-collapse d-none d-lg-flex justify-content-center">
            <ul class="navbar-nav gap-4">
                <li class="nav-item"><a class="nav-link" href="{{ route('web.services') }}">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('web.how-it-works') }}">How it Works</a></li>
                <li class="nav-item"><a class="nav-link" href="/about">About Us</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('web.support') }}">Support</a></li>
            </ul>
        </div>

        <div class="d-flex align-items-center gap-3 ms-auto">

            {{-- PROFILE OFFCANVAS TRIGGER --}}
            <a href="#" class="text-decoration-none" 
               data-bs-toggle="offcanvas" data-bs-target="#offcanvasProfile" 
               aria-controls="offcanvasProfile">

                @if ($authUser)
                    <img src="{{ $profileImage }}" class="rounded-circle" 
                         style="height:40px;width:40px;object-fit:cover" alt="Profile">
                @else
                    <img src="{{ $profileImage }}" class="green-icon" height="40" alt="Profile">
                @endif
            </a>


            <button class="navbar-toggler d-lg-none border-0 bg-light shadow-none" type="button" 
                    data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" 
                    aria-controls="offcanvasNavbar">
                <i class="bi bi-list fs-1"></i>
            </button>

        </div>
    </div>
</nav>

{{-- ================================================================= --}}
{{-- 1. DEDICATED PROFILE OFFCANVAS (Side Drawer) --}}
{{-- ================================================================= --}}
@if ($activeGuard !== 'admin')
<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1"
    id="offcanvasProfile" aria-labelledby="offcanvasProfileLabel">
    
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasProfileLabel">
            @if ($authUser)
                Account Menu
            @else
                Welcome
            @endif
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body">
        @if (!$authUser)
            {{-- GUEST VIEW --}}
            <div class="text-center p-3">
                <img src="{{ $profileImage }}" class="green-icon mb-3" height="60" alt="Profile">
                <p class="fw-semibold mb-3">Login to access your services.</p>
                <a href="{{ route('login') }}" class="btn btn-success w-100">Login</a>
            </div>

        @else
            {{-- LOGGED IN USER VIEW --}}
            <div class="d-flex align-items-center mb-4 pb-3 border-bottom">
                <img src="{{ $profileImage }}" class="rounded-circle me-3" 
                     style="height:60px;width:60px;object-fit:cover" alt="Profile">
                <div>
                    <div class="fw-bold fs-5">{{ $name }}</div>
                    <small class="text-muted">{{ $mobile }}</small>
                </div>
            </div>

            <div class="list-group list-group-flush">
                {{-- Profile Link based on Guard --}}
                @if ($activeGuard === 'user')
                    <a href="#" class="list-group-item list-group-item-action">
                        {{-- <a href="{{ route('user.home') }}" class="list-group-item list-group-item-action"></a> --}}
                        <i class="fas fa-user me-3 icon-green"></i>Profile Details
                    </a>
                @elseif ($activeGuard === 'partner')
                    <a href="#" class="list-group-item list-group-item-action">
                        {{-- <a href="{{ route('partner.home') }}" class="list-group-item list-group-item-action"></a> --}}
                        <i class="fas fa-user-tie me-3 icon-green"></i>Profile Details
                    </a>
                
                @elseif ($activeGuard === 'admin')
                     <a href="{{ route('admin.dashboard') }}" class="list-group-item list-group-item-action">
                        <i class="fas fa-chart-line me-3 icon-green"></i>Admin Dashboard
                    </a>
                @endif
                
                <a href="#" class="list-group-item list-group-item-action">
                    {{-- <a href="{{ route('web.services') }}" class="list-group-item list-group-item-action"></a> --}}
                    <i class="fas fa-cogs me-3 icon-green"></i> My Services
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    {{-- <a href="{{ route('web.support') }}" class="list-group-item list-group-item-action"></a> --}}
                    <i class="fas fa-life-ring me-3 icon-green"></i> Need Help
                </a>
                
                <a href="{{ route('logout') }}" class="list-group-item list-group-item-action text-danger mt-3">
                    <i class="fas fa-sign-out-alt me-3"></i> Logout
                </a>
            </div>
        @endif
    </div>
</div>
@endif


{{-- ================================================================= --}}
{{-- 2. MAIN NAVIGATION OFFCANVAS (Mobile Menu) (Same as before, but with new ID) --}}
{{-- ================================================================= --}}
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" 
    aria-labelledby="offcanvasNavbarLabel" data-bs-scroll="true" data-bs-backdrop="false">
    <div class="offcanvas-header">
        <img src="{{ asset('assets/globe assist logo.png') }}" height="40">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>

    <div class="offcanvas-body">
        <ul class="navbar-nav text-left">
            <li class="nav-item"><a class="nav-link" href="{{ route('web.services') }}">Services</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('web.how-it-works') }}">How it Works</a></li>
            <li class="nav-item"><a class="nav-link" href="/about">About Us</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('web.support') }}">Support</a></li>
        </ul>
    </div>
</div>


<style>
.navbar .nav-link.active {
   color: #6cba0c !important;
 font-weight: 600;
}

.navbar .nav-link:hover {
  color: #148a3a !important;
 }
  
  .icon-green {
      color: #148a3a;
  }
</style>