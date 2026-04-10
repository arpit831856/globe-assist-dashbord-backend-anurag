<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GlobeAssist — Notifications</title>
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
      .notifications-container {
        background: var(--white);
        border-radius: var(--radius-lg);
        padding: 24px;
        box-shadow: var(--shadow-md);
        border: 1px solid var(--gray-200);
      }
      .notifications-filters {
        display: flex;
        gap: 8px;
        margin-bottom: 20px;
        flex-wrap: wrap;
      }
      .notifications-list {
        display: flex;
        flex-direction: column;
        gap: 12px;
      }
      .notif-card {
        display: flex;
        gap: 16px;
        padding: 18px;
        background: var(--gray-100);
        border-radius: var(--radius-md);
        border-left: 4px solid var(--gray-300);
        transition: all 0.3s;
        cursor: pointer;
        border: 1px solid var(--gray-200);
        border-left-width: 4px;
      }
      .notif-card:hover {
        box-shadow: var(--shadow-md);
        transform: translateX(4px);
      }
      .notif-card.unread {
        background: var(--blue-50);
        border-left-color: var(--blue-500);
      }
      .notif-card.hidden {
        display: none;
      }
      .notif-icon {
        width: 50px;
        height: 50px;
        border-radius: var(--radius-md);
        background: var(--blue-600);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 20px;
        flex-shrink: 0;
      }
      .notif-icon.payment {
        background: var(--success);
      }
      .notif-content {
        flex: 1;
        min-width: 0;
      }
      .notif-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 6px;
        gap: 10px;
      }
      .notif-title {
        font-family: var(--font-display);
        font-size: 14px;
        font-weight: 700;
        color: var(--blue-950);
      }
      .notif-time {
        font-size: 11px;
        color: var(--gray-400);
        text-transform: uppercase;
        letter-spacing: 0.3px;
        font-family: var(--font-mono);
        white-space: nowrap;
      }
      .notif-msg {
        font-size: 14px;
        color: var(--gray-500);
        line-height: 1.55;
        margin-bottom: 12px;
      }
      .notif-actions {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
      }
      .notif-btn {
        padding: 8px 14px;
        border: none;
        border-radius: 8px;
        font-size: 12px;
        font-weight: 700;
        cursor: pointer;
        transition: 0.2s;
        font-family: var(--font-display);
      }
      .notif-btn-primary {
        background: var(--blue-600);
        color: #fff;
      }
      .notif-btn-primary:hover {
        background: var(--accent-hover);
      }
      .notif-btn-secondary {
        background: var(--gray-200);
        color: var(--gray-500);
      }
      .notif-btn-secondary:hover {
        background: var(--gray-300);
      }
      @media (max-width: 599px) {
        .notif-card {
          flex-direction: column;
          gap: 12px;
        }
        .notifications-filters {
          gap: 6px;
        }
        .filter-btn {
          padding: 6px 12px;
          font-size: 11px;
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


      <div class="notifications-container">
        <div class="notifications-filters">
          <button
            class="filter-btn active"
            onclick="filterNotifications('all', this)"
          >
            All
          </button>
          <button
            class="filter-btn"
            onclick="filterNotifications('booking', this)"
          >
            Booking
          </button>
          <button
            class="filter-btn"
            onclick="filterNotifications('payment', this)"
          >
            Payment
          </button>
          <button
            class="filter-btn"
            onclick="filterNotifications('system', this)"
          >
            System
          </button>
          <button
            class="filter-btn"
            onclick="filterNotifications('unread', this)"
          >
            Unread
          </button>
        </div>
        <div class="notifications-list" id="notificationsList">
          <div class="notif-card unread" data-type="booking">
            <div class="notif-icon"><i class="fa fa-calendar-check"></i></div>
            <div class="notif-content">
              <div class="notif-header">
                <div class="notif-title">New Service Booking Request</div>
                <div class="notif-time">2 hrs ago</div>
              </div>
              <div class="notif-msg">
                You have received a new booking request for "Tour Management -
                Delhi Circuit" on March 15, 2026. Client is looking for
                professional guidance.
              </div>
              <div class="notif-actions">
                <button class="notif-btn notif-btn-primary">
                  <i class="fa fa-check"></i> Accept
                </button>
                <button class="notif-btn notif-btn-secondary">
                  <i class="fa fa-eye"></i> View Details
                </button>
              </div>
            </div>
          </div>
          <div class="notif-card unread" data-type="booking">
            <div class="notif-icon" style="background: #d97706">
              <i class="fa fa-star"></i>
            </div>
            <div class="notif-content">
              <div class="notif-header">
                <div class="notif-title">New 5-Star Rating Received</div>
                <div class="notif-time">1 day ago</div>
              </div>
              <div class="notif-msg">
                Great news! A client rated your service 5 stars and wrote:
                "Excellent service, very professional, highly recommended!"
              </div>
              <div class="notif-actions">
                <button class="notif-btn notif-btn-secondary">
                  <i class="fa fa-heart"></i> View Review
                </button>
              </div>
            </div>
          </div>
          <div class="notif-card" data-type="payment">
            <div class="notif-icon payment">
              <i class="fa fa-credit-card"></i>
            </div>
            <div class="notif-content">
              <div class="notif-header">
                <div class="notif-title">Payment Successfully Received</div>
                <div class="notif-time">3 days ago</div>
              </div>
              <div class="notif-msg">
                Payment of ₹12,500 has been successfully deposited to your
                wallet for completed "Event Coordination" service.
              </div>
              <div class="notif-actions">
                <button class="notif-btn notif-btn-secondary">
                  <i class="fa fa-receipt"></i> View Receipt
                </button>
              </div>
            </div>
          </div>
          <div class="notif-card" data-type="system">
            <div class="notif-icon"><i class="fa fa-calendar"></i></div>
            <div class="notif-content">
              <div class="notif-header">
                <div class="notif-title">Service Completion Reminder</div>
                <div class="notif-time">4 days ago</div>
              </div>
              <div class="notif-msg">
                Your service "Ground Staff - Conference" scheduled for March 10,
                2026 is completed. Please confirm completion status.
              </div>
              <div class="notif-actions">
                <button class="notif-btn notif-btn-primary">
                  <i class="fa fa-check"></i> Confirm
                </button>
              </div>
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
      function filterNotifications(type, btn) {
        document
          .querySelectorAll(".notifications-filters .filter-btn")
          .forEach(function (b) {
            b.classList.remove("active");
          });
        btn.classList.add("active");
        document.querySelectorAll(".notif-card").forEach(function (card) {
          card.classList.remove("hidden");
          if (type === "all") return;
          if (type === "unread") {
            if (!card.classList.contains("unread"))
              card.classList.add("hidden");
          } else {
            if (card.getAttribute("data-type") !== type)
              card.classList.add("hidden");
          }
        });
      }
    </script>
  </body>
</html>
