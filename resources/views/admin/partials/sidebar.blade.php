<div class="sidebar p-3" style="width: 250px">
  <div class="d-flex align-items-center mb-4 justify-content-center">
    <img src="{{ asset('assets/globe assist logo.png') }}" alt="logo" style="width: 100px" />
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
      <a class="nav-link {{ request()->is('admin/Admin*') ? '' : 'collapsed' }}" data-bs-toggle="collapse"
        href="#adminMenu" role="button" aria-expanded="{{ request()->is('admin/Admin*') ? 'true' : 'false' }}"
        aria-controls="adminMenu">
        <i class="fas fa-users"></i> Admin
        <i class="fas fa-chevron-down float-end mt-1" style="font-size: 12px" ::before></i>
      </a>
      <div class="collapse {{ request()->is('admin/Admin*') ? 'show' : '' }}" id="adminMenu">
        <ul class="nav flex-column ms-3">
          <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/manage-admin*') ? 'active' : '' }}"
              href="{{ url('admin/manage-admin') }}">
              <i class="fas fa-user-shield"></i>Manage Admin
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{ request()->is('roles*') ? 'active' : '' }}" href="{{ route('roles.index') }}">
              <i class="fas fa-user-cog"></i> Role
            </a>
          </li> 

        </ul>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link {{ request()->is('admin/paymenthistory*') ? 'active' : '' }}" href="{{ route('web.paymenthistory') }}">
        <i class="fa-solid fa-money-bill"></i> Payment History
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link {{ request()->is('admin/paymentstatus*') ? 'active' : '' }}" href="{{ route('web.paymentstatus') }}">
        <i class="fa-solid fa-dollar-sign"></i> Payment Status
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link {{ request()->is('admin/complaints*') ? 'active' : '' }}" href="{{ route('web.complaints') }}">
        <i class="fa-solid fa-anchor-circle-exclamation"></i> Complaints
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link {{ request()->is('admin/enquiry*') ? 'active' : '' }}" href="{{ route('web.enquiry') }}">
        <i class="fa-regular fa-circle-question"></i> Enquiry
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="#" data-action="change-password">
        <i class="fas fa-key"></i>
        <span>Change Password</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link {{ request()->is('admin/notifications*') ? 'active' : '' }}"
        href="{{ url('admin/notifications') }}">
        <i class="fas fa-bell"></i> Notification
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link {{ request()->is('admin/faqs*') ? 'active' : '' }}" href="{{ url('admin/faqs') }}">
        <i class="fas fa-question"></i> FAQs
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link {{ request()->is('admin/contacts*') ? 'active' : '' }}"
        href="{{ route('admin.contacts.index') }}">
        <i class="fas fa-envelope"></i> Contact
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link {{ request()->is('admin/add-links*') ? 'active' : '' }}"
        href="{{ route('add_links.index') }}">
        <i class="fas fa-link"></i> Add Link
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link {{ request()->is('admin/helpsupport*') ? 'active' : '' }}" href="{{ route('web.helpsupport') }}">
        <i class="fa-solid fa-bell-concierge"></i> Help & support
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('logout') }}" data-action="logout">
        <i class="fas fa-sign-out-alt"></i>
        <span>Logout</span>
      </a>
    </li>
  </ul>
</div>
