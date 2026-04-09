<div class="sidebar p-3" style="width: 250px">
  <div class="d-flex align-items-center mb-4 justify-content-center">
    <img src="{{ asset('assets/globe assist logo.png') }}" alt="logo" style="width: 100px"/>
  </div>

  <hr class="text-light" />

  <ul class="nav flex-column">
    <li class="nav-item">
      <a class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}" href="{{ url('admin/dashboard') }}">
        <i class="fas fa-home"></i> Dashboard
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link {{ request()->is('admin/users*') ? 'active' : '' }}" href="{{ url('admin/users') }}">
        <i class="fas fa-user"></i> User
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link {{ request()->is('admin/partner*') ? 'active' : '' }}" href="{{ url('admin/partner') }}">
        <i class="fas fa-users"></i> Partner
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link {{ request()->is('admin/logout*') ? 'active' : '' }}" href="{{ route('admin.logout') }}">
        <i class="fas fa-sign-out-alt"></i> Logout
      </a>
    </li>
  </ul>
</div>
