<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GlobeAssist — Help & Support</title>
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
      .help-container {
        display: flex;
        flex-direction: column;
        gap: 24px;
      }
      .help-hero {
        background: linear-gradient(135deg, var(--blue-900), var(--blue-800));
        color: #fff;
        padding: 36px;
        border-radius: var(--radius-lg);
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 20px;
      }
      .help-hero h2 {
        font-family: var(--font-display);
        font-size: 22px;
        font-weight: 800;
        letter-spacing: -0.4px;
      }
      .help-hero p {
        font-size: 14px;
        opacity: 0.8;
        margin-top: 5px;
      }
      .support-badge {
        background: rgba(255, 255, 255, 0.15);
        color: #fff;
        padding: 11px 22px;
        border-radius: 30px;
        font-weight: 800;
        font-size: 12px;
        font-family: var(--font-display);
        letter-spacing: 1px;
        text-transform: uppercase;
        border: 1px solid rgba(255, 255, 255, 0.2);
        white-space: nowrap;
      }
      .help-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
      }
      .help-card {
        background: var(--white);
        padding: 24px;
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-md);
        border: 1px solid var(--gray-200);
        border-top: 4px solid var(--blue-600);
      }
      .help-card h3 {
        font-family: var(--font-display);
        font-size: 16px;
        font-weight: 700;
        color: var(--blue-950);
        margin-bottom: 18px;
      }
      .contact-item {
        display: flex;
        gap: 13px;
        margin-bottom: 18px;
      }
      .contact-item i {
        font-size: 17px;
        color: var(--blue-500);
        margin-top: 2px;
        flex-shrink: 0;
      }
      .clabel {
        font-size: 11px;
        color: var(--gray-400);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-weight: 700;
        font-family: var(--font-display);
      }
      .clabel + p {
        font-size: 14px;
        color: var(--blue-950);
        font-weight: 600;
        margin-top: 3px;
      }
      .form-group {
        margin-bottom: 14px;
      }
      .form-group label {
        font-size: 12px;
        display: block;
        margin-bottom: 6px;
        font-weight: 700;
        color: var(--gray-500);
        text-transform: uppercase;
        letter-spacing: 0.4px;
        font-family: var(--font-display);
      }
      .form-group input,
      .form-group textarea {
        width: 100%;
        padding: 12px 14px;
        border: 1.5px solid var(--gray-200);
        border-radius: var(--radius-sm);
        outline: none;
        transition: 0.2s;
        font-size: 14px;
        color: var(--blue-950);
        font-family: var(--font-body);
        background: var(--white);
      }
      .form-group input:focus,
      .form-group textarea:focus {
        border-color: var(--blue-400);
        box-shadow: 0 0 0 3px rgba(35, 64, 168, 0.08);
      }
      .form-group textarea {
        resize: vertical;
        min-height: 100px;
      }
      .submit-btn-help {
        width: 100%;
        padding: 14px;
        background: var(--blue-600);
        border: none;
        color: #fff;
        border-radius: var(--radius-md);
        cursor: pointer;
        font-weight: 700;
        transition: 0.3s;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.4px;
        font-family: var(--font-display);
      }
      .submit-btn-help:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(35, 64, 168, 0.3);
        background: var(--accent-hover);
      }
      .quick-help-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 16px;
      }
      .quick-card {
        background: var(--white);
        padding: 24px;
        border-radius: var(--radius-md);
        text-align: center;
        box-shadow: var(--shadow-sm);
        transition: all 0.3s;
        border: 1px solid var(--gray-200);
        border-top: 3px solid var(--blue-600);
      }
      .quick-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-lg);
      }
      .quick-card i {
        font-size: 30px;
        color: var(--blue-500);
        margin-bottom: 12px;
        display: block;
      }
      .quick-card h4 {
        font-family: var(--font-display);
        font-size: 14px;
        font-weight: 700;
        color: var(--blue-950);
        margin-bottom: 8px;
      }
      .quick-card p {
        font-size: 13px;
        color: var(--gray-400);
        line-height: 1.55;
      }
      @media (max-width: 768px) {
        .help-hero {
          flex-direction: column;
        }
        .help-grid {
          grid-template-columns: 1fr;
        }
      }
      @media (max-width: 599px) {
        .quick-help-grid {
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
                @include('partner.layouts.header');

      <div class="help-container">
        <div class="help-hero">
          <div>
            <h2>
              <i class="fa fa-life-ring"></i> Need Help? We're Here For You!
            </h2>
            <p>
              Our 24/7 support team is ready to assist you with any questions or
              issues.
            </p>
          </div>
          <div class="support-badge">24/7 Support</div>
        </div>
        <div class="help-grid">
          <div class="help-card">
            <h3>
              <i
                class="fa fa-phone-alt"
                style="color: var(--blue-500); margin-right: 8px"
              ></i>
              Contact Information
            </h3>
            <div class="contact-item">
              <i class="fa fa-envelope"></i>
              <div>
                <p class="clabel">Email Address</p>
                <p>support@partnerhub.com</p>
              </div>
            </div>
            <div class="contact-item">
              <i class="fa fa-phone"></i>
              <div>
                <p class="clabel">Phone Number</p>
                <p>+91 9876543210</p>
              </div>
            </div>
            <div class="contact-item">
              <i class="fa fa-map-marker-alt"></i>
              <div>
                <p class="clabel">Office Location</p>
                <p>Connaught Place, New Delhi</p>
              </div>
            </div>
            <div class="contact-item">
              <i class="fa fa-clock"></i>
              <div>
                <p class="clabel">Business Hours</p>
                <p>Monday - Sunday, 24/7</p>
              </div>
            </div>
          </div>
          <div class="help-card">
            <h3>
              <i
                class="fa fa-paper-plane"
                style="color: var(--blue-500); margin-right: 8px"
              ></i>
              Send Us a Message
            </h3>
            <form onsubmit="handleHelpSubmit(event)">
              <div class="form-group">
                <label>Your Name</label
                ><input
                  type="text"
                  placeholder="Enter your full name"
                  required
                />
              </div>
              <div class="form-group">
                <label>Email Address</label
                ><input
                  type="email"
                  placeholder="your.email@example.com"
                  required
                />
              </div>
              <div class="form-group">
                <label>Subject</label
                ><input
                  type="text"
                  placeholder="What is this regarding?"
                  required
                />
              </div>
              <div class="form-group">
                <label>Message</label
                ><textarea
                  placeholder="Write your message here..."
                  required
                ></textarea>
              </div>
              <button type="submit" class="submit-btn-help">
                <i class="fa fa-paper-plane"></i> Send Message
              </button>
            </form>
          </div>
        </div>
        <div>
          <h3
            style="
              font-family: var(--font-display);
              font-size: 17px;
              font-weight: 700;
              color: var(--blue-950);
              margin-bottom: 16px;
            "
          >
            <i
              class="fa fa-question-circle"
              style="color: var(--blue-500); margin-right: 8px"
            ></i>
            Quick Help Topics
          </h3>
          <div class="quick-help-grid">
            <div class="quick-card">
              <i class="fa fa-lock"></i>
              <h4>Account Security</h4>
              <p>
                Forgot password? Two-factor authentication? Reset your account
                instantly with our secure process.
              </p>
            </div>
            <div class="quick-card">
              <i class="fa fa-credit-card"></i>
              <h4>Payment Issues</h4>
              <p>
                Payment failed? Payment pending? Get help with wallet,
                withdrawals, and transactions.
              </p>
            </div>
            <div class="quick-card">
              <i class="fa fa-wrench"></i>
              <h4>Technical Support</h4>
              <p>
                Facing bugs? Dashboard not loading? Report technical issues and
                get quick resolution.
              </p>
            </div>
            <div class="quick-card">
              <i class="fa fa-book"></i>
              <h4>Guides & Tutorials</h4>
              <p>
                Learn how to use dashboard features, add services, and manage
                your profile effectively.
              </p>
            </div>
            <div class="quick-card">
              <i class="fa fa-briefcase"></i>
              <h4>Services Help</h4>
              <p>
                How to create service listings? Manage bookings? Handle
                complaints? Get detailed guides.
              </p>
            </div>
            <div class="quick-card">
              <i class="fa fa-chart-bar"></i>
              <h4>Analytics & Reports</h4>
              <p>
                Understanding your statistics? Track performance? Analyze your
                earnings and growth.
              </p>
            </div>
          </div>
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

    <script src="shared.js"></script>
    <script>
      function handleHelpSubmit(event) {
        event.preventDefault();
        alert(
          "Thank you! Your message has been sent. We will respond within 2 hours.",
        );
        event.target.reset();
      }
    </script>
  </body>
</html>
