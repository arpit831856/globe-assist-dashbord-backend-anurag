  <div class="topbar">
        <div class="topbar-left">
          <h2>User Profile</h2>
          <p>Manage your profile and account settings</p>
        </div>
        <div class="user-menu">
          <img
            src="https://i.pravatar.cc/150?img=4"
            class="user-avatar"
            onclick="toggleDD()"
            alt=""
          />
          <div class="dropdown" id="ddMenu">
            <a href="index.html">My Profile</a>
            <a href="payment.html">Settings</a>
            <a href="help.html">Account</a>
            <hr
              style="margin: 0; border: none; border-top: 1px solid #f1f5f9"
            />
            <a onclick="openLogoutModal()" class="logout-dd">Logout</a>
          </div>
        </div>
      </div>