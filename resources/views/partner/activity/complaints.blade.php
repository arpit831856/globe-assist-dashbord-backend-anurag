<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GlobeAssist — Complaints</title>
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
      .complaints-container {
        background: var(--white);
        border-radius: var(--radius-lg);
        padding: 24px;
        box-shadow: var(--shadow-md);
        border: 1px solid var(--gray-200);
      }
      .complaints-stats {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
        gap: 14px;
        margin-bottom: 22px;
      }
      .stat-box {
        background: var(--gray-100);
        padding: 18px;
        border-radius: var(--radius-md);
        border-left: 4px solid var(--blue-600);
        text-align: center;
        border: 1px solid var(--gray-200);
        border-left-width: 4px;
      }
      .stat-num {
        font-family: var(--font-display);
        font-size: 26px;
        font-weight: 900;
        color: var(--blue-700);
      }
      .stat-label {
        font-size: 11px;
        color: var(--gray-400);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-top: 5px;
        font-family: var(--font-display);
        font-weight: 700;
      }
      .complaints-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 16px;
      }
      .complaint-card {
        background: var(--white);
        border: 1px solid var(--gray-200);
        border-radius: var(--radius-md);
        padding: 20px;
        transition: all 0.3s;
      }
      .complaint-card:hover {
        border-color: var(--blue-300);
        box-shadow: var(--shadow-md);
        transform: translateY(-3px);
      }
      .complaint-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 12px;
        gap: 8px;
      }
      .complaint-id {
        font-family: var(--font-mono);
        font-size: 11px;
        font-weight: 600;
        color: var(--blue-600);
        text-transform: uppercase;
        background: var(--blue-50);
        padding: 4px 10px;
        border-radius: 6px;
        border: 1px solid var(--blue-100);
        white-space: nowrap;
      }
      .complaint-status {
        font-size: 11px;
        padding: 5px 12px;
        border-radius: 20px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.3px;
        font-family: var(--font-display);
        white-space: nowrap;
      }
      .complaint-status.open {
        background: var(--danger-bg);
        color: var(--danger);
      }
      .complaint-status.resolved {
        background: var(--success-bg);
        color: var(--success);
      }
      .complaint-status.pending {
        background: var(--warning-bg);
        color: var(--warning);
      }
      .complaint-title {
        font-family: var(--font-display);
        font-size: 15px;
        font-weight: 700;
        color: var(--blue-950);
        margin-bottom: 7px;
      }
      .complaint-desc {
        font-size: 13px;
        color: var(--gray-500);
        line-height: 1.55;
        margin-bottom: 11px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
      }
      .complaint-date {
        font-size: 12px;
        color: var(--gray-400);
        margin-bottom: 14px;
        font-family: var(--font-mono);
      }
      .complaint-actions {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 8px;
      }
      .complaint-btn {
        padding: 10px;
        border: none;
        border-radius: var(--radius-sm);
        font-size: 13px;
        font-weight: 700;
        cursor: pointer;
        transition: 0.2s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        font-family: var(--font-display);
      }
      .complaint-btn-primary {
        background: var(--blue-600);
        color: #fff;
      }
      .complaint-btn-primary:hover {
        background: var(--accent-hover);
      }
      .complaint-btn-secondary {
        background: var(--gray-100);
        color: var(--gray-500);
      }
      .complaint-btn-secondary:hover {
        background: var(--gray-200);
      }
      @media (max-width: 768px) {
        .complaints-grid {
          grid-template-columns: 1fr;
        }
      }
      @media (max-width: 599px) {
        .complaints-stats {
          grid-template-columns: repeat(3, 1fr);
          gap: 10px;
        }
        .complaints-stats .stat-box {
          padding: 14px;
        }
        .stat-num {
          font-size: 22px;
        }
        .complaint-actions {
          grid-template-columns: 1fr;
        }
      }
      @media (max-width: 380px) {
        .complaints-stats {
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

      <div class="complaints-container">
        <div class="complaints-stats">
          <div class="stat-box">
            <div class="stat-num">2</div>
            <div class="stat-label">Open Issues</div>
          </div>
          <div class="stat-box">
            <div class="stat-num">8</div>
            <div class="stat-label">Resolved</div>
          </div>
          <div class="stat-box">
            <div class="stat-num">92%</div>
            <div class="stat-label">Satisfaction Rate</div>
          </div>
        </div>
        <div class="complaints-grid">
          <div class="complaint-card">
            <div class="complaint-header">
              <div class="complaint-id">#CPM-2026-001</div>
              <div class="complaint-status open">
                <i class="fa fa-clock"></i> Open
              </div>
            </div>
            <div class="complaint-title">
              Client was not satisfied with timing
            </div>
            <div class="complaint-desc">
              Client mentioned that staff arrived 15 minutes late. This affected
              their event schedule and they want compensation.
            </div>
            <div class="complaint-date">Reported on: March 09, 2026</div>
            <div class="complaint-actions">
              <button class="complaint-btn complaint-btn-primary">
                <i class="fa fa-reply"></i> Respond
              </button>
              <button class="complaint-btn complaint-btn-secondary">
                <i class="fa fa-eye"></i> View
              </button>
            </div>
          </div>
          <div class="complaint-card">
            <div class="complaint-header">
              <div class="complaint-id">#CPM-2026-002</div>
              <div class="complaint-status pending">
                <i class="fa fa-hourglass-end"></i> Pending
              </div>
            </div>
            <div class="complaint-title">Communication issue with client</div>
            <div class="complaint-desc">
              Client reports they were not updated about service schedule
              changes. They were expecting updates via SMS and email.
            </div>
            <div class="complaint-date">Reported on: March 08, 2026</div>
            <div class="complaint-actions">
              <button class="complaint-btn complaint-btn-primary">
                <i class="fa fa-reply"></i> Respond
              </button>
              <button class="complaint-btn complaint-btn-secondary">
                <i class="fa fa-eye"></i> View
              </button>
            </div>
          </div>
          <div class="complaint-card">
            <div class="complaint-header">
              <div class="complaint-id">#CPM-2026-003</div>
              <div class="complaint-status resolved">
                <i class="fa fa-check-circle"></i> Resolved
              </div>
            </div>
            <div class="complaint-title">Missing equipment during service</div>
            <div class="complaint-desc">
              One staff member forgot to bring required equipment. Issue was
              resolved by providing alternative solution and client was
              satisfied.
            </div>
            <div class="complaint-date">Resolved on: March 05, 2026</div>
            <div class="complaint-actions">
              <button
                class="complaint-btn complaint-btn-secondary"
                style="grid-column: 1/-1"
              >
                <i class="fa fa-eye"></i> View Details
              </button>
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
  </body>
</html>
