<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GlobeAssist — Profile</title>
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;0,9..40,800;1,9..40,400&family=Sora:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{ asset('css/shared.css') }}" />
    <style>
      /* ==================== PROFILE-SPECIFIC STYLES ==================== */
      .profile-hero {
        position: relative;
        border-radius: var(--radius-2xl);
        margin-bottom: 0;
        box-shadow: var(--shadow-xl);
      }
      .profile-hero-banner {
        height: 160px;
        background: linear-gradient(
          125deg,
          var(--blue-950) 0%,
          var(--blue-800) 40%,
          var(--blue-600) 75%,
          #4a6ee0 100%
        );
        position: relative;
        overflow: hidden;
        border-radius: var(--radius-2xl) var(--radius-2xl) 0 0;
      }
      .profile-hero-banner::before {
        content: "";
        position: absolute;
        inset: 0;
        background-image:
          radial-gradient(
            circle at 20% 50%,
            rgba(74, 110, 224, 0.35) 0%,
            transparent 50%
          ),
          radial-gradient(
            circle at 80% 20%,
            rgba(123, 150, 235, 0.25) 0%,
            transparent 40%
          );
      }
      .profile-hero-banner::after {
        content: "";
        position: absolute;
        bottom: -1px;
        left: 0;
        right: 0;
        height: 50px;
        background: var(--white);
        clip-path: ellipse(55% 100% at 50% 100%);
      }
      .profile-hero-dots {
        position: absolute;
        inset: 0;
        background-image: radial-gradient(
          circle,
          rgba(255, 255, 255, 0.08) 1px,
          transparent 1px
        );
        background-size: 28px 28px;
      }
      .profile-hero-edit-btn {
        position: absolute;
        top: 16px;
        right: 16px;
        background: rgba(255, 255, 255, 0.15);
        border: 1px solid rgba(255, 255, 255, 0.25);
        color: #fff;
        padding: 8px 16px;
        border-radius: 30px;
        font-size: 12px;
        font-weight: 700;
        font-family: var(--font-display);
        cursor: pointer;
        backdrop-filter: blur(8px);
        transition: all 0.25s;
        display: flex;
        align-items: center;
        gap: 7px;
        z-index: 2;
      }
      .profile-hero-edit-btn:hover {
        background: rgba(255, 255, 255, 0.28);
        transform: translateY(-1px);
      }
      .profile-hero-body {
        background: var(--white);
        padding: 0 32px 28px;
        border-radius: 0 0 var(--radius-2xl) var(--radius-2xl);
        border: 1px solid var(--gray-200);
        border-top: none;
      }
      .profile-hero-identity {
        display: flex;
        align-items: flex-end;
        gap: 24px;
        margin-top: -52px;
        margin-bottom: 22px;
        flex-wrap: wrap;
        position: relative;
        z-index: 2;
      }
      .profile-avatar-wrap {
        position: relative;
        flex-shrink: 0;
      }
      .profile-img {
        width: 110px;
        height: 110px;
        border-radius: 22px;
        object-fit: cover;
        border: 4px solid var(--white);
        box-shadow: 0 8px 32px rgba(14, 21, 71, 0.22);
        display: block;
      }
      .profile-avatar-online {
        position: absolute;
        bottom: 8px;
        right: -4px;
        width: 18px;
        height: 18px;
        background: var(--success);
        border: 3px solid var(--white);
        border-radius: 50%;
      }
      .profile-identity-info {
        flex: 1;
        padding-top: 56px;
        padding-bottom: 4px;
        min-width: 200px;
      }
      .profile-identity-info h2 {
        font-family: var(--font-display);
        font-size: 26px;
        font-weight: 800;
        color: var(--blue-950);
        letter-spacing: -0.6px;
        line-height: 1.15;
        margin-bottom: 5px;
      }
      .profile-identity-info .profile-role {
        font-size: 14px;
        color: var(--gray-500);
        margin-bottom: 10px;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 8px;
      }
      .profile-identity-info .profile-role::before {
        content: "";
        width: 6px;
        height: 6px;
        background: var(--blue-400);
        border-radius: 50%;
        flex-shrink: 0;
      }
      .profile-badges-row {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
      }
      .badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 14px;
        background: var(--success-bg);
        color: var(--success);
        font-size: 12px;
        border-radius: 30px;
        font-weight: 700;
        font-family: var(--font-display);
        border: 1px solid rgba(5, 150, 105, 0.2);
      }
      .profile-badge-partner {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 14px;
        background: var(--blue-50);
        color: var(--blue-700);
        font-size: 12px;
        border-radius: 30px;
        font-weight: 700;
        font-family: var(--font-display);
        border: 1px solid var(--blue-100);
      }
      .profile-badge-location {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 14px;
        background: var(--gray-100);
        color: var(--gray-600);
        font-size: 12px;
        border-radius: 30px;
        font-weight: 600;
        font-family: var(--font-body);
        border: 1px solid var(--gray-200);
      }

      .profile-stats-strip {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1px;
        background: var(--gray-200);
        border-radius: var(--radius-lg);
        overflow: hidden;
        border: 1px solid var(--gray-200);
      }
      .profile-stat-tile {
        background: var(--white);
        padding: 16px 14px;
        text-align: center;
        transition: all 0.2s;
      }
      .profile-stat-tile:hover {
        background: var(--blue-50);
      }
      .profile-stat-tile:hover .profile-stat-num {
        color: var(--blue-600);
      }
      .profile-stat-num {
        font-family: var(--font-display);
        font-size: 22px;
        font-weight: 900;
        color: var(--blue-950);
        letter-spacing: -0.5px;
        line-height: 1;
        margin-bottom: 5px;
        transition: color 0.2s;
      }
      .profile-stat-label {
        font-size: 11px;
        color: var(--gray-400);
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.6px;
        font-family: var(--font-display);
      }
      .profile-stat-icon {
        font-size: 10px;
        color: var(--blue-400);
        margin-bottom: 6px;
      }

      .profile-activity-strip {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 12px;
        margin-top: 22px;
      }
      .profile-activity-card {
        background: var(--white);
        border: 1px solid var(--gray-200);
        border-radius: var(--radius-md);
        padding: 16px 18px;
        display: flex;
        align-items: center;
        gap: 14px;
        transition: all 0.22s;
      }
      .profile-activity-card:hover {
        border-color: var(--blue-200);
        box-shadow: var(--shadow-md);
        transform: translateY(-2px);
      }
      .profile-activity-card-icon {
        width: 42px;
        height: 42px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        flex-shrink: 0;
      }
      .pac-blue {
        background: var(--blue-50);
        color: var(--blue-600);
        border: 1px solid var(--blue-100);
      }
      .pac-green {
        background: var(--success-bg);
        color: var(--success);
        border: 1px solid rgba(5, 150, 105, 0.2);
      }
      .pac-yellow {
        background: var(--warning-bg);
        color: var(--warning);
        border: 1px solid rgba(217, 119, 6, 0.2);
      }
      .act-num {
        font-family: var(--font-display);
        font-size: 20px;
        font-weight: 900;
        color: var(--blue-950);
        letter-spacing: -0.4px;
        line-height: 1;
      }
      .act-label {
        font-size: 11px;
        color: var(--gray-400);
        font-weight: 700;
        font-family: var(--font-display);
        text-transform: uppercase;
        letter-spacing: 0.4px;
        margin-top: 3px;
      }

      .profile-section-hdr {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin: 28px 0 16px;
        gap: 12px;
      }
      .profile-section-hdr-left {
        display: flex;
        align-items: center;
        gap: 12px;
      }
      .profile-section-icon {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        background: var(--blue-600);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 14px;
        flex-shrink: 0;
      }
      .profile-section-title-text h3 {
        font-family: var(--font-display);
        font-size: 16px;
        font-weight: 800;
        color: var(--blue-950);
        letter-spacing: -0.2px;
        line-height: 1;
        margin-bottom: 3px;
      }
      .profile-section-title-text p {
        font-size: 12px;
        color: var(--gray-400);
      }

      .profile-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 12px;
      }
      .info-card {
        background: var(--white);
        padding: 18px 20px;
        border-radius: var(--radius-md);
        box-shadow: var(--shadow-sm);
        border: 1px solid var(--gray-200);
        transition: all 0.22s;
        position: relative;
        overflow: hidden;
      }
      .info-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, var(--blue-600), var(--blue-400));
        border-radius: 3px 3px 0 0;
      }
      .info-card:hover {
        box-shadow: var(--shadow-md);
        transform: translateY(-3px);
        border-color: var(--blue-100);
      }
      .info-card-icon-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 10px;
      }
      .info-card-icon {
        width: 32px;
        height: 32px;
        border-radius: 8px;
        background: var(--blue-50);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
        color: var(--blue-600);
        border: 1px solid var(--blue-100);
      }
      .info-card h4 {
        font-size: 10px;
        color: var(--gray-400);
        margin-bottom: 6px;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 700;
        font-family: var(--font-display);
      }
      .info-card p {
        font-size: 15px;
        font-weight: 700;
        color: var(--blue-950);
        font-family: var(--font-display);
      }
      .info-card-desc p {
        font-size: 14px;
        font-weight: 400;
        color: var(--gray-600);
        line-height: 1.65;
        font-family: var(--font-body);
      }
      .full-width {
        grid-column: 1 / -1;
      }

      .doc-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(175px, 1fr));
        gap: 14px;
      }
      .doc-card {
        background: var(--white);
        padding: 24px 20px 20px;
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-sm);
        border: 1px solid var(--gray-200);
        transition: all 0.28s;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        position: relative;
        overflow: hidden;
      }
      .doc-card::after {
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, var(--blue-600), var(--blue-300));
        transform: scaleX(0);
        transition: transform 0.3s;
        transform-origin: left;
      }
      .doc-card:hover::after {
        transform: scaleX(1);
      }
      .doc-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-lg);
        border-color: var(--blue-100);
      }
      .doc-card-icon-wrap {
        width: 58px;
        height: 58px;
        border-radius: 16px;
        background: linear-gradient(135deg, var(--blue-50), var(--blue-100));
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 14px;
        border: 1px solid var(--blue-100);
        transition: all 0.28s;
      }
      .doc-card:hover .doc-card-icon-wrap {
        background: linear-gradient(135deg, var(--blue-600), var(--blue-500));
        border-color: var(--blue-600);
      }
      .doc-card:hover .doc-card-icon-wrap i {
        color: #fff;
      }
      .doc-card i {
        font-size: 24px;
        color: var(--blue-500);
        transition: color 0.28s;
      }
      .doc-card p {
        font-size: 13px;
        font-weight: 700;
        color: var(--blue-950);
        margin-bottom: 14px;
        font-family: var(--font-display);
      }
      .doc-card-status {
        font-size: 10px;
        color: var(--success);
        font-weight: 700;
        font-family: var(--font-display);
        background: var(--success-bg);
        padding: 3px 10px;
        border-radius: 20px;
        border: 1px solid rgba(5, 150, 105, 0.2);
        margin-bottom: 12px;
        display: flex;
        align-items: center;
        gap: 5px;
      }
      .doc-card a {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 8px 18px;
        background: var(--blue-50);
        color: var(--blue-600);
        border-radius: var(--radius-sm);
        text-decoration: none;
        font-weight: 700;
        transition: all 0.22s;
        font-size: 12px;
        border: 1px solid var(--blue-100);
        font-family: var(--font-display);
        width: 100%;
        justify-content: center;
      }
      .doc-card a:hover {
        background: var(--blue-600);
        color: #fff;
        border-color: var(--blue-600);
        transform: translateY(-1px);
      }

      /* Edit Profile modal specific */
      .avatar-prev {
        width: 80px;
        height: 80px;
        border-radius: var(--radius-md);
        object-fit: cover;
        margin-top: 12px;
        display: none;
        border: 2px solid var(--blue-200);
      }

      @media (max-width: 768px) {
        .profile-hero-body {
          padding: 0 18px 22px;
        }
        .profile-hero-identity {
          gap: 16px;
          margin-top: -48px;
        }
        .profile-stats-strip {
          grid-template-columns: repeat(2, 1fr);
        }
        .profile-activity-strip {
          grid-template-columns: 1fr;
        }
        .profile-identity-info h2 {
          font-size: 21px;
        }
        .profile-grid {
          grid-template-columns: 1fr 1fr;
        }
        .doc-grid {
          grid-template-columns: repeat(2, 1fr);
        }
      }
      @media (max-width: 600px) {
        .profile-hero-banner {
          height: 120px;
        }
        .profile-img {
          width: 88px;
          height: 88px;
        }
        .profile-stats-strip {
          grid-template-columns: repeat(2, 1fr);
        }
        .profile-activity-strip {
          grid-template-columns: repeat(2, 1fr);
        }
      }
      @media (max-width: 599px) {
        .profile-grid {
          grid-template-columns: 1fr;
        }
      }
      @media (max-width: 380px) {
        .profile-stats-strip {
          grid-template-columns: repeat(2, 1fr);
        }
        .profile-activity-strip {
          grid-template-columns: 1fr;
        }
        .doc-grid {
          grid-template-columns: 1fr;
        }
      }
    </style>
  </head>
  <body>
    <div
      class="sidebar-overlay"
      id="sidebarOverlay"
      onclick="closeSidebar()"
    ></div>

    <div class="mobile-topbar">
      <button
        class="hamburger-btn"
        id="hamburgerBtn"
        onclick="toggleSidebar()"
        aria-label="Menu"
      >
        <span class="bar"></span><span class="bar"></span
        ><span class="bar"></span>
      </button>
      <div class="mobile-logo">Globe<span>Assist</span></div>
      <img
        src="https://i.pravatar.cc/150?img=4"
        class="mobile-user-avatar"
        alt=""
      />
    </div>

    @include('partner.layouts.sidebar');

    <div class="main">
    
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
      <!-- Hero Card -->
      <div class="profile-hero">
        <div class="profile-hero-banner">
          <div class="profile-hero-dots"></div>
          <button
            class="profile-hero-edit-btn"
            onclick="openEditProfileModal()"
          >
            <i class="fa fa-pen"></i> Edit Profile
          </button>
        </div>
        <div class="profile-hero-body">
          <div class="profile-hero-identity">
            <div class="profile-avatar-wrap">
              <img
                src="https://i.pravatar.cc/150?img=4"
                class="profile-img"
                id="profileAvatar"
                alt="Rohit Chaudhary"
              />
              <div class="profile-avatar-online"></div>
            </div>
            <div class="profile-identity-info">
              <h2 id="profileName">Rohit Chaudhary</h2>
              <p class="profile-role" id="profileRole">
                Operations & Service Management Expert
              </p>
              <div class="profile-badges-row">
                <span class="badge"
                  ><i class="fa fa-circle-check"></i> Verified Partner</span
                >
                <span class="profile-badge-partner"
                  ><i class="fa fa-briefcase"></i> Active Partner</span
                >
                <span class="profile-badge-location" id="profileLocation"
                  ><i class="fa fa-map-marker-alt"></i> Delhi, India</span
                >
              </div>
            </div>
          </div>
          <div class="profile-stats-strip">
            <div class="profile-stat-tile">
              <div class="profile-stat-icon">
                <i class="fa fa-briefcase"></i>
              </div>
              <div class="profile-stat-num" id="statServices">24</div>
              <div class="profile-stat-label">Services Done</div>
            </div>
            <div class="profile-stat-tile">
              <div class="profile-stat-icon"><i class="fa fa-star"></i></div>
              <div class="profile-stat-num" id="statRating">4.8</div>
              <div class="profile-stat-label">Rating</div>
            </div>
            <div class="profile-stat-tile">
              <div class="profile-stat-icon">
                <i class="fa fa-calendar-alt"></i>
              </div>
              <div class="profile-stat-num" id="statExp">5+</div>
              <div class="profile-stat-label">Years Exp.</div>
            </div>
            <div class="profile-stat-tile">
              <div class="profile-stat-icon">
                <i class="fa fa-indian-rupee-sign"></i>
              </div>
              <div class="profile-stat-num" id="statEarned">1.45L</div>
              <div class="profile-stat-label">Total Earned</div>
            </div>
          </div>
        </div>
      </div>

      <!-- Quick Activity -->
      <div class="profile-activity-strip">
        <div class="profile-activity-card">
          <div class="profile-activity-card-icon pac-blue">
            <i class="fa fa-bell"></i>
          </div>
          <div>
            <div class="act-num">3</div>
            <div class="act-label">Unread Alerts</div>
          </div>
        </div>
        <div class="profile-activity-card">
          <div class="profile-activity-card-icon pac-green">
            <i class="fa fa-wallet"></i>
          </div>
          <div>
            <div class="act-num">₹28,450</div>
            <div class="act-label">Available Balance</div>
          </div>
        </div>
        <div class="profile-activity-card">
          <div class="profile-activity-card-icon pac-yellow">
            <i class="fa fa-exclamation-circle"></i>
          </div>
          <div>
            <div class="act-num">2</div>
            <div class="act-label">Open Complaints</div>
          </div>
        </div>
      </div>

      <!-- Personal Information -->
      <div class="profile-section-hdr" style="margin-top: 28px">
        <div class="profile-section-hdr-left">
          <div class="profile-section-icon"><i class="fa fa-user"></i></div>
          <div class="profile-section-title-text">
            <h3>Personal Information</h3>
            <p>Your contact details and account info</p>
          </div>
        </div>
      </div>
      <div class="profile-grid">
        <div class="info-card">
          <div class="info-card-icon-row">
            <div class="info-card-icon"><i class="fa fa-phone"></i></div>
          </div>
          <h4>Mobile Number</h4>
          <p id="infoPhone">+91 9320583983</p>
        </div>
        <div class="info-card">
          <div class="info-card-icon-row">
            <div class="info-card-icon"><i class="fa fa-envelope"></i></div>
          </div>
          <h4>Email Address</h4>
          <p id="infoEmail">rohit@gmail.com</p>
        </div>
        <div class="info-card">
          <div class="info-card-icon-row">
            <div class="info-card-icon"><i class="fa fa-flag"></i></div>
          </div>
          <h4>Country</h4>
          <p id="infoCountry">India</p>
        </div>
        <div class="info-card">
          <div class="info-card-icon-row">
            <div class="info-card-icon">
              <i class="fa fa-map-marker-alt"></i>
            </div>
          </div>
          <h4>Location</h4>
          <p id="infoCity">Delhi, India</p>
        </div>
        <div class="info-card">
          <div class="info-card-icon-row">
            <div class="info-card-icon"><i class="fa fa-lock"></i></div>
          </div>
          <h4>Password</h4>
          <p>••••••••</p>
        </div>
        <div class="info-card full-width info-card-desc">
          <div class="info-card-icon-row">
            <div class="info-card-icon"><i class="fa fa-align-left"></i></div>
          </div>
          <h4>About Me</h4>
          <p id="infoDesc">
            Experienced professional with 5+ years of expertise in operations
            and service management. Skilled in event coordination, team
            management, and client relations. Delivering high-quality results
            across Delhi NCR and PAN India projects.
          </p>
        </div>
      </div>

      <!-- Uploaded Documents -->
      <div class="profile-section-hdr" style="margin-top: 28px">
        <div class="profile-section-hdr-left">
          <div class="profile-section-icon" style="background: var(--blue-700)">
            <i class="fa fa-folder-open"></i>
          </div>
          <div class="profile-section-title-text">
            <h3>Uploaded Documents</h3>
            <p>Verified identity & credential files</p>
          </div>
        </div>
      </div>
      <div class="doc-grid">
        <div class="doc-card">
          <div class="doc-card-icon-wrap"><i class="fa fa-id-card"></i></div>
          <p>Aadhar Card</p>
          <div class="doc-card-status">
            <i class="fa fa-circle-check"></i> Verified
          </div>
          <a href="#"><i class="fa fa-eye"></i> View File</a>
        </div>
        <div class="doc-card">
          <div class="doc-card-icon-wrap">
            <i class="fa fa-credit-card"></i>
          </div>
          <p>PAN Card</p>
          <div class="doc-card-status">
            <i class="fa fa-circle-check"></i> Verified
          </div>
          <a href="#"><i class="fa fa-eye"></i> View File</a>
        </div>
        <div class="doc-card">
          <div class="doc-card-icon-wrap"><i class="fa fa-file-lines"></i></div>
          <p>CV / Resume</p>
          <div class="doc-card-status">
            <i class="fa fa-circle-check"></i> Uploaded
          </div>
          <a href="#"><i class="fa fa-download"></i> Download</a>
        </div>
        <div class="doc-card">
          <div class="doc-card-icon-wrap"><i class="fa fa-briefcase"></i></div>
          <p>Previous Work</p>
          <div class="doc-card-status">
            <i class="fa fa-circle-check"></i> Uploaded
          </div>
          <a href="#"><i class="fa fa-eye"></i> View File</a>
        </div>
      </div>
    </div>

    <!-- LOGOUT MODAL -->
    <div class="modal-bg" id="logoutModal">
      <div class="modal-box md">
        <div class="modal-hdr">
          <h3>Confirm Logout</h3>
          <button class="modal-close" onclick="closeLogoutModal()">×</button>
        </div>
        <div class="modal-body modal-danger">
          <div class="modal-icon"><i class="fa fa-sign-out-alt"></i></div>
          <h3 class="modal-title">Are you sure you want to logout?</h3>
          <p class="modal-desc">
            You will be logged out of your account. Make sure to save any
            pending work.
          </p>
          <div class="modal-actions">
            <button
              class="modal-btn modal-btn-danger"
              onclick="
                alert('Logged out!');
                location.href = 'index.html';
              "
            >
              <i class="fa fa-check"></i> Yes, Logout
            </button>
            <button
              class="modal-btn modal-btn-secondary"
              onclick="closeLogoutModal()"
            >
              <i class="fa fa-times"></i> Cancel
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- EDIT PROFILE MODAL -->
    <div class="modal-bg" id="editProfileModal">
      <div class="modal-box md">
        <div class="modal-hdr">
          <h3>
            <i
              class="fa fa-user-pen"
              style="color: var(--blue-500); margin-right: 8px"
            ></i
            >Edit Profile Details
          </h3>
          <button class="modal-close" onclick="closeEditProfileModal()">
            ×
          </button>
        </div>
        <div class="modal-body">
          <form id="editProfileForm" onsubmit="saveEditProfile(event)">
            <div
              style="
                background: var(--blue-50);
                border: 1px solid var(--blue-100);
                border-radius: var(--radius-md);
                padding: 12px 16px;
                margin-bottom: 18px;
                display: flex;
                align-items: center;
                gap: 10px;
              "
            >
              <i
                class="fa fa-circle-info"
                style="color: var(--blue-500); font-size: 15px; flex-shrink: 0"
              ></i>
              <span style="font-size: 13px; color: var(--blue-700)"
                >Changes will update your profile display immediately.</span
              >
            </div>
            <div class="f-field" style="margin-bottom: 16px">
              <label>Profile Photo</label>
              <div
                style="
                  display: flex;
                  align-items: center;
                  gap: 16px;
                  flex-wrap: wrap;
                "
              >
                <img
                  id="epAvatarPreview"
                  src="https://i.pravatar.cc/150?img=4"
                  style="
                    width: 72px;
                    height: 72px;
                    border-radius: 16px;
                    object-fit: cover;
                    border: 3px solid var(--blue-100);
                    box-shadow: var(--shadow-md);
                  "
                  alt=""
                />
                <div class="upload-zone" style="flex: 1; min-width: 180px">
                  <i class="fa fa-camera"></i>Click to change photo<input
                    type="file"
                    id="epAvatarInput"
                    accept="image/*"
                    onchange="previewEpAvatar(event)"
                  />
                </div>
              </div>
            </div>
            <div class="f-divider"></div>
            <div class="f-row">
              <div class="f-field">
                <label>Full Name</label
                ><input type="text" id="epName" required />
              </div>
              <div class="f-field">
                <label>Role / Title</label><input type="text" id="epRole" />
              </div>
            </div>
            <div class="f-row">
              <div class="f-field">
                <label>Mobile Number</label><input type="text" id="epPhone" />
              </div>
              <div class="f-field">
                <label>Email Address</label><input type="email" id="epEmail" />
              </div>
            </div>
            <div class="f-row">
              <div class="f-field">
                <label>Country</label><input type="text" id="epCountry" />
              </div>
              <div class="f-field">
                <label>City / Location</label
                ><input type="text" id="epLocation" />
              </div>
            </div>
            <div class="f-field">
              <label>About Me</label><textarea id="epDesc" rows="3"></textarea>
            </div>
            <div class="f-divider"></div>
            <button type="submit" class="modal-submit">
              <i class="fa fa-check"></i> Save Changes
            </button>
          </form>
        </div>
      </div>
    </div>

    <script src="{{ asset('js/shared.js') }}"></script>
    <script>
      var profileState = {
        name: "Rohit Chaudhary",
        role: "Operations & Service Management Expert",
        phone: "+91 9320583983",
        email: "rohit@gmail.com",
        country: "India",
        location: "Delhi, India",
        desc: "Experienced professional with 5+ years of expertise in operations and service management. Skilled in event coordination, team management, and client relations. Delivering high-quality results across Delhi NCR and PAN India projects.",
        exp: "5+",
        services: "24",
        rating: "4.8",
        earned: "1.45L",
        avatarURL: "https://i.pravatar.cc/150?img=4",
      };
      var epAvatarFile = null;

      function openEditProfileModal() {
        var s = profileState;
        document.getElementById("epName").value = s.name;
        document.getElementById("epRole").value = s.role;
        document.getElementById("epPhone").value = s.phone;
        document.getElementById("epEmail").value = s.email;
        document.getElementById("epCountry").value = s.country;
        document.getElementById("epLocation").value = s.location;
        document.getElementById("epDesc").value = s.desc;
        document.getElementById("epAvatarPreview").src = s.avatarURL;
        epAvatarFile = null;
        document.getElementById("editProfileModal").classList.add("open");
      }
      function closeEditProfileModal() {
        document.getElementById("editProfileModal").classList.remove("open");
      }
      function previewEpAvatar(e) {
        epAvatarFile = e.target.files[0];
        if (!epAvatarFile) return;
        document.getElementById("epAvatarPreview").src =
          URL.createObjectURL(epAvatarFile);
      }
      function saveEditProfile(e) {
        e.preventDefault();
        profileState.name =
          document.getElementById("epName").value.trim() || profileState.name;
        profileState.role =
          document.getElementById("epRole").value.trim() || profileState.role;
        profileState.phone =
          document.getElementById("epPhone").value.trim() || profileState.phone;
        profileState.email =
          document.getElementById("epEmail").value.trim() || profileState.email;
        profileState.country =
          document.getElementById("epCountry").value.trim() ||
          profileState.country;
        profileState.location =
          document.getElementById("epLocation").value.trim() ||
          profileState.location;
        profileState.desc =
          document.getElementById("epDesc").value.trim() || profileState.desc;
        if (epAvatarFile)
          profileState.avatarURL = URL.createObjectURL(epAvatarFile);
        updateProfileDisplay();
        closeEditProfileModal();
      }
      function updateProfileDisplay() {
        var s = profileState;
        document
          .querySelectorAll(
            ".profile-img, .sidebar-profile img, .user-avatar, .mobile-user-avatar",
          )
          .forEach(function (img) {
            img.src = s.avatarURL;
          });
        document.getElementById("profileName").textContent = s.name;
        document.getElementById("profileRole").textContent = s.role;
        document.getElementById("profileLocation").innerHTML =
          '<i class="fa fa-map-marker-alt"></i> ' + s.location;
        document.getElementById("infoPhone").textContent = s.phone;
        document.getElementById("infoEmail").textContent = s.email;
        document.getElementById("infoCountry").textContent = s.country;
        document.getElementById("infoCity").textContent = s.location;
        document.getElementById("infoDesc").textContent = s.desc;
        document.querySelector(".sidebar-profile h4").textContent = s.name;
      }
    </script>
  </body>
</html>
