@php
  if (Auth::guard('admin')->check()) {
    $logoutRoute = url('admin/logout');
  } elseif (Auth::guard('user')->check()) {
    $logoutRoute = url('user/logout');
  } elseif (Auth::guard('partner')->check()) {
    $logoutRoute = url('partner/logout');
  } else {
    $logoutRoute = '#';
  }
@endphp

<nav class="navbar navbar-expand-lg rounded-3 mb-4">
  <div class="container-fluid">
    <div class="d-flex align-items-center">
      <button class="btn btn-sm me-3 d-lg-none">
        <i class="fas fa-bars"></i>
      </button>
      <h5 class="m-0">@yield('page-title', 'Dashboard Overview')</h5>
    </div>
    <div class="d-flex align-items-center">
      <div class="dropdown me-3">
        <a class="btn btn-sm btn-light rounded-pill" href="{{ url('admin/notifications') }}">
          <i class="fas fa-bell"></i>
          <span class="badge bg-danger rounded-pill">3</span>
        </a>
      </div>
      <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-decoration-none" id="userDropdown" data-bs-toggle="dropdown">
          <img src="{{ asset('assets/unsplash_C8.png') }}" alt="User" class="rounded-circle me-2"
            style="height: 40px; width: 40px" />
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
          {{-- <li><a class="dropdown-item" href="#">Profile</a></li>
          <li> --}}
            {{-- <hr class="dropdown-divider" />
          </li> --}}
          <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
        </ul>

      </div>
    </div>
  </div>
</nav>