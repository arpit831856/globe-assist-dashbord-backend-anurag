<div class="sidebar" id="sidebar">
  <div class="sidebar-header">
    <div class="sidebar-logo">Globe<span>Assist</span></div>
    <div class="sidebar-tagline">Partner Dashboard</div>
  </div>

  <div class="sidebar-profile">
    <img src="https://i.pravatar.cc/150?img=4" alt="" />
    <div>
      <h4>Verified Partner</h4>
      <p>Authorized Service Professional</p>
    </div>
  </div>

  <ul class="sidebar-menu">
    <li class="menu-section-label">Main</li>
    
    <li>
      <a href="{{ route('partner.dashboard') }}" target="contentFrame" class="{{ request()->routeIs('partner.home') ? 'active' : '' }}">
        <i class="fa fa-user"></i> Profile Details
      </a>
    </li>

    <li>
      <a href="{{ route('partner.services') }}" target="contentFrame" class="{{ request()->routeIs('partner.services') ? 'active' : '' }}">
        <i class="fa fa-briefcase"></i> My Services
      </a>
    </li>

    <li>
      <a href="{{ route('partner.show-links') }}" target="contentFrame" class="{{ request()->routeIs('partner.show-links') ? 'active' : '' }}">
        <i class="fa fa-link"></i> Show Links
      </a>
    </li>

    <li>
      <a href="{{ route('partner.timeSlot') }}" target="contentFrame" class="{{ request()->routeIs('partner.timeSlot') ? 'active' : '' }}">
        <i class="fa fa-clock"></i> Time Slot
      </a>
    </li>

    <li class="menu-section-label">Activity</li>
    
    <li>
      <a href="{{ route('partner.notifications') }}" target="contentFrame" class="{{ request()->routeIs('partner.notifications') ? 'active' : '' }}">
        <i class="fa fa-bell"></i> Notifications <span class="badge">3</span>
      </a>
    </li>

    <li>
      <a href="{{ route('partner.complaints') }}" target="contentFrame" class="{{ request()->routeIs('partner.complaints') ? 'active' : '' }}">
        <i class="fa fa-exclamation-circle"></i> Complaints
      </a>
    </li>

    <li>
      <a href="{{ route('partner.serviceHistory') }}" target="contentFrame" class="{{ request()->routeIs('partner.serviceHistory') ? 'active' : '' }}">
        <i class="fa fa-history"></i> Services History
      </a>
    </li>

    <li class="menu-section-label">Finance</li>
    
    <li>
      <a href="{{ route('partner.payments') }}" target="contentFrame" class="{{ request()->routeIs('partner.payments') ? 'active' : '' }}">
        <i class="fa fa-wallet"></i> Payment Status
      </a>
    </li>

    <li class="menu-section-label">Support</li>
    
    <li>
      <a href="{{ route('partner.help') }}" target="contentFrame" class="{{ request()->routeIs('partner.help') ? 'active' : '' }}">
        <i class="fa fa-headset"></i> Help & Support
      </a>
    </li>

    <li class="logout-item">
      <a href="{{ route('logout') }}" target="_top">
        <i class="fa fa-sign-out-alt"></i> Logout
      </a>
    </li>
  </ul>
</div>