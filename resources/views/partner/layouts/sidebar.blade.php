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
          <a href="index.html" data-page="index.html" class="active"
            ><i class="fa fa-user"></i> Profile Details</a
          >
        </li>
        <li>
          <a href="services.html" data-page="services.html" 
            ><i class="fa fa-briefcase"></i> My Services</a
          >
        </li>
        <li>
          <a href="{{ route('partner.show-links') }}" class="{{ request()->routeIs('partner.show-links') ? 'active' : '' }}"
            ><i class="fa fa-link"></i> Show Links</a
          >
        </li>
        <li>
          <a href="timeslot.html" data-page="timeslot.html"
            ><i class="fa fa-briefcase"></i> Time Slot</a
          >
        </li>
        <li class="menu-section-label">Activity</li>
        <li>
          <a href="notifications.html" data-page="notifications.html"
            ><i class="fa fa-bell"></i> Notifications<span class="badge"
              >3</span
            ></a
          >
        </li>
        <li>
          <a href="complaints.html" data-page="complaints.html"
            ><i class="fa fa-exclamation-circle"></i> Complaints</a
          >
        </li>
        <li>
          <a href="history.html" data-page="history.html"
            ><i class="fa fa-history"></i> Services History</a
          >
        </li>
        <li class="menu-section-label">Finance</li>
        <li>
          <a href="payment.html" data-page="payment.html"
            ><i class="fa fa-wallet"></i> Payment Status</a
          >
        </li>
        <li class="menu-section-label">Support</li>
        <li>
          <a href="help.html" data-page="help.html"
            ><i class="fa fa-headset"></i> Help & Support</a
          >
        </li>
        <li class="logout-item">
          <a onclick="openLogoutModal()" style="cursor: pointer"
            ><i class="fa fa-sign-out-alt"></i> Logout</a
          >
        </li>
      </ul>
    </div>
