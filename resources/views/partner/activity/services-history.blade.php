<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GlobeAssist — Services History</title>
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
      .history-container {
        background: var(--white);
        border-radius: var(--radius-lg);
        padding: 24px;
        box-shadow: var(--shadow-md);
        border: 1px solid var(--gray-200);
      }
      .history-filters {
        display: flex;
        gap: 8px;
        margin-bottom: 20px;
        flex-wrap: wrap;
      }
      .table-responsive {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
      }
      .history-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 580px;
      }
      .history-table thead {
        background: var(--gray-100);
        border-bottom: 2px solid var(--gray-200);
      }
      .history-table th {
        padding: 14px 16px;
        text-align: left;
        font-size: 12px;
        font-weight: 700;
        color: var(--gray-500);
        text-transform: uppercase;
        letter-spacing: 0.6px;
        font-family: var(--font-display);
        white-space: nowrap;
      }
      .history-table td {
        padding: 15px 16px;
        border-bottom: 1px solid var(--gray-100);
        font-size: 14px;
        color: var(--gray-700);
      }
      .history-table tbody tr:hover {
        background: var(--blue-50);
      }
      .history-table tbody tr.hidden {
        display: none;
      }
      .service-name {
        font-weight: 700;
        color: var(--blue-950);
        font-family: var(--font-display);
      }
      .service-amount {
        font-weight: 800;
        color: var(--blue-700);
        font-family: var(--font-mono);
      }
      .status-badge {
        display: inline-block;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        font-family: var(--font-display);
        white-space: nowrap;
      }
      .status-badge.completed {
        background: var(--success-bg);
        color: var(--success);
      }
      .status-badge.pending {
        background: var(--warning-bg);
        color: var(--warning);
      }
      .status-badge.cancelled {
        background: var(--danger-bg);
        color: var(--danger);
      }
      .action-link {
        color: var(--blue-600);
        cursor: pointer;
        font-weight: 700;
        transition: 0.2s;
        font-family: var(--font-display);
        font-size: 13px;
        white-space: nowrap;
      }
      .action-link:hover {
        text-decoration: underline;
      }

      /* Detail Modal */
      .detail-modal-header {
        background: linear-gradient(135deg, var(--blue-900), var(--blue-800));
        padding: 24px;
        border-radius: var(--radius-lg) var(--radius-lg) 0 0;
        color: #fff;
      }
      .detail-modal-header .svc-id {
        font-family: var(--font-mono);
        font-size: 11px;
        color: rgba(255, 255, 255, 0.5);
        margin-bottom: 6px;
        letter-spacing: 1px;
        text-transform: uppercase;
      }
      .detail-modal-header h2 {
        font-family: var(--font-display);
        font-size: 20px;
        font-weight: 800;
        letter-spacing: -0.3px;
        margin-bottom: 10px;
      }
      .detail-modal-header .status-row {
        display: flex;
        align-items: center;
        gap: 10px;
        flex-wrap: wrap;
      }
      .detail-status-pill {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 5px 14px;
        border-radius: 30px;
        font-size: 12px;
        font-weight: 800;
        font-family: var(--font-display);
        letter-spacing: 0.3px;
        text-transform: uppercase;
      }
      .detail-status-pill.completed {
        background: rgba(5, 150, 105, 0.2);
        color: #6ee7b7;
        border: 1px solid rgba(5, 150, 105, 0.3);
      }
      .detail-status-pill.pending {
        background: rgba(217, 119, 6, 0.2);
        color: #fcd34d;
        border: 1px solid rgba(217, 119, 6, 0.3);
      }
      .detail-status-pill.cancelled {
        background: rgba(220, 38, 38, 0.2);
        color: #fca5a5;
        border: 1px solid rgba(220, 38, 38, 0.3);
      }
      .detail-date-pill {
        font-family: var(--font-mono);
        font-size: 12px;
        color: rgba(255, 255, 255, 0.5);
      }
      .detail-modal-body {
        padding: 24px;
      }
      .detail-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 14px;
        margin-bottom: 20px;
      }
      .detail-tile {
        background: var(--gray-100);
        border: 1px solid var(--gray-200);
        border-radius: var(--radius-md);
        padding: 16px;
        transition: 0.2s;
      }
      .detail-tile:hover {
        border-color: var(--blue-200);
        background: var(--blue-50);
      }
      .detail-tile.full {
        grid-column: 1 / -1;
      }
      .detail-tile.highlight {
        border-left: 4px solid var(--blue-600);
      }
      .detail-tile-label {
        font-size: 11px;
        color: var(--gray-400);
        text-transform: uppercase;
        letter-spacing: 0.8px;
        font-weight: 700;
        font-family: var(--font-display);
        display: flex;
        align-items: center;
        gap: 6px;
        margin-bottom: 7px;
      }
      .detail-tile-label i {
        color: var(--blue-500);
        font-size: 13px;
      }
      .detail-tile-value {
        font-size: 15px;
        font-weight: 700;
        color: var(--blue-950);
        font-family: var(--font-display);
      }
      .detail-tile-value.amount-big {
        font-size: 28px;
        font-weight: 900;
        color: var(--blue-700);
        letter-spacing: -1px;
      }
      .detail-tile-sub {
        font-size: 12px;
        color: var(--gray-400);
        margin-top: 4px;
      }
      .detail-section-title {
        font-family: var(--font-display);
        font-size: 13px;
        font-weight: 700;
        color: var(--blue-950);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin: 20px 0 12px;
        display: flex;
        align-items: center;
        gap: 8px;
        padding-bottom: 10px;
        border-bottom: 1px solid var(--gray-200);
      }
      .detail-section-title i {
        color: var(--blue-500);
      }
      .payment-status-strip {
        border-radius: var(--radius-md);
        padding: 16px 20px;
        display: flex;
        align-items: center;
        gap: 14px;
        margin-bottom: 14px;
        border: 1px solid;
      }
      .payment-status-strip.paid {
        background: var(--success-bg);
        border-color: rgba(5, 150, 105, 0.2);
      }
      .payment-status-strip.pending {
        background: var(--warning-bg);
        border-color: rgba(217, 119, 6, 0.2);
      }
      .payment-status-strip.notpaid {
        background: var(--danger-bg);
        border-color: rgba(220, 38, 38, 0.15);
      }
      .payment-status-strip-icon {
        font-size: 26px;
      }
      .payment-status-strip.paid .payment-status-strip-icon {
        color: var(--success);
      }
      .payment-status-strip.pending .payment-status-strip-icon {
        color: var(--warning);
      }
      .payment-status-strip.notpaid .payment-status-strip-icon {
        color: var(--danger);
      }
      .payment-status-strip-text strong {
        font-family: var(--font-display);
        font-size: 15px;
        font-weight: 700;
        display: block;
        color: var(--blue-950);
      }
      .payment-status-strip-text span {
        font-size: 13px;
        color: var(--gray-500);
      }
      .complaint-strip {
        border-radius: var(--radius-md);
        padding: 16px 20px;
        display: flex;
        align-items: flex-start;
        gap: 14px;
        border: 1px solid;
      }
      .complaint-strip.has-complaint {
        background: var(--danger-bg);
        border-color: rgba(220, 38, 38, 0.15);
      }
      .complaint-strip.no-complaint {
        background: var(--success-bg);
        border-color: rgba(5, 150, 105, 0.15);
      }
      .complaint-strip-icon {
        font-size: 22px;
        margin-top: 1px;
      }
      .complaint-strip.has-complaint .complaint-strip-icon {
        color: var(--danger);
      }
      .complaint-strip.no-complaint .complaint-strip-icon {
        color: var(--success);
      }
      .complaint-strip-text strong {
        font-family: var(--font-display);
        font-size: 14px;
        font-weight: 700;
        display: block;
        color: var(--blue-950);
        margin-bottom: 4px;
      }
      .complaint-strip-text p {
        font-size: 13px;
        color: var(--gray-500);
        line-height: 1.55;
      }
      .detail-close-btn {
        width: 100%;
        padding: 13px;
        background: var(--blue-600);
        color: #fff;
        border: none;
        border-radius: var(--radius-md);
        font-size: 15px;
        font-weight: 700;
        cursor: pointer;
        transition: 0.2s;
        margin-top: 22px;
        font-family: var(--font-display);
      }
      .detail-close-btn:hover {
        background: var(--accent-hover);
        box-shadow: 0 6px 18px rgba(35, 64, 168, 0.3);
      }

      @media (max-width: 768px) {
        .detail-grid {
          grid-template-columns: 1fr;
        }
      }
      @media (max-width: 599px) {
        .history-table th,
        .history-table td {
          padding: 12px 10px;
          font-size: 13px;
        }
        .detail-modal-header {
          padding: 18px;
        }
        .detail-modal-header h2 {
          font-size: 17px;
        }
        .detail-modal-body {
          padding: 16px;
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
      <div class="page-header">
        <div class="page-header-left">
          <h1><i class="fa fa-history"></i> Services History</h1>
          <p>Complete record of your completed and ongoing services</p>
        </div>
        <span class="page-header-badge">6 Records</span>
      </div>
      <div class="history-container">
        <div class="history-filters">
          <button
            class="filter-btn active"
            onclick="filterHistory('all', this)"
          >
            All
          </button>
          <button class="filter-btn" onclick="filterHistory('completed', this)">
            Completed
          </button>
          <button class="filter-btn" onclick="filterHistory('pending', this)">
            Pending
          </button>
          <button class="filter-btn" onclick="filterHistory('cancelled', this)">
            Cancelled
          </button>
        </div>
        <div class="table-responsive">
          <table class="history-table">
            <thead>
              <tr>
                <th>Service Name</th>
                <th>Client Name</th>
                <th>Date</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody id="historyTableBody">
              <tr
                class="history-row"
                data-status="completed"
                data-service="Tour Management - Delhi"
                data-client="Sharma Family"
                data-date="Mar 05, 2026"
                data-amount="₹8,500"
                data-location="Delhi, Agra Circuit"
                data-payment-status="paid"
                data-payment-date="Mar 07, 2026"
                data-complaint="none"
                data-description="Full-day tour management including airport pickup, guided sightseeing at India Gate, Qutub Minar, Humayun's Tomb, and drop-back. Included 2 professional guides and a luxury coach."
                data-duration="1 Day (8 Hours)"
                data-invoice="INV-2026-0312"
              >
                <td class="service-name">Tour Management - Delhi</td>
                <td>Sharma Family</td>
                <td>Mar 05, 2026</td>
                <td class="service-amount">₹8,500</td>
                <td><span class="status-badge completed">Completed</span></td>
                <td>
                  <span class="action-link" onclick="openHistoryDetail(this)"
                    ><i class="fa fa-eye"></i> View</span
                  >
                </td>
              </tr>
              <tr
                class="history-row"
                data-status="pending"
                data-service="Event Coordination - Wedding"
                data-client="Patel Events Pvt Ltd"
                data-date="Mar 10, 2026"
                data-amount="₹15,000"
                data-location="The Grand Hotel, Connaught Place, Delhi"
                data-payment-status="pending"
                data-payment-date="—"
                data-complaint="has-complaint"
                data-complaint-id="#CPM-2026-002"
                data-complaint-title="Communication issue with client"
                data-description="Wedding coordination for 200+ guests. Responsibilities include guest management, stage setup, catering liaison, and photography direction."
                data-team="8 Staff Members"
                data-duration="2 Days"
                data-invoice="INV-2026-0318"
              >
                <td class="service-name">Event Coordination - Wedding</td>
                <td>Patel Events Pvt Ltd</td>
                <td>Mar 10, 2026</td>
                <td class="service-amount">₹15,000</td>
                <td><span class="status-badge pending">Pending</span></td>
                <td>
                  <span class="action-link" onclick="openHistoryDetail(this)"
                    ><i class="fa fa-eye"></i> View</span
                  >
                </td>
              </tr>
              <tr
                class="history-row"
                data-status="completed"
                data-service="Ground Staff - Conference"
                data-client="ABC Corporation"
                data-date="Mar 02, 2026"
                data-amount="₹5,200"
                data-location="Aerocity Conference Hall, New Delhi"
                data-payment-status="paid"
                data-payment-date="Mar 04, 2026"
                data-complaint="none"
                data-description="Corporate conference ground staff for a 150-person technology summit. Handled registration, badge management, and VIP guest assistance."
                data-team="6 Staff Members"
                data-duration="1 Day (10 Hours)"
                data-invoice="INV-2026-0298"
              >
                <td class="service-name">Ground Staff - Conference</td>
                <td>ABC Corporation</td>
                <td>Mar 02, 2026</td>
                <td class="service-amount">₹5,200</td>
                <td><span class="status-badge completed">Completed</span></td>
                <td>
                  <span class="action-link" onclick="openHistoryDetail(this)"
                    ><i class="fa fa-eye"></i> View</span
                  >
                </td>
              </tr>
              <tr
                class="history-row"
                data-status="completed"
                data-service="Photography - Corporate Event"
                data-client="XYZ Industries Ltd"
                data-date="Feb 28, 2026"
                data-amount="₹12,000"
                data-location="Taj Palace Hotel, Delhi"
                data-payment-status="paid"
                data-payment-date="Mar 01, 2026"
                data-complaint="none"
                data-description="Full event photography for a corporate gala dinner and awards ceremony. Included candid shots, executive portraits, and a same-day photo highlight reel."
                data-team="2 Photographers + 1 Editor"
                data-duration="6 Hours"
                data-invoice="INV-2026-0287"
              >
                <td class="service-name">Photography - Corporate Event</td>
                <td>XYZ Industries Ltd</td>
                <td>Feb 28, 2026</td>
                <td class="service-amount">₹12,000</td>
                <td><span class="status-badge completed">Completed</span></td>
                <td>
                  <span class="action-link" onclick="openHistoryDetail(this)"
                    ><i class="fa fa-eye"></i> View</span
                  >
                </td>
              </tr>
              <tr
                class="history-row"
                data-status="cancelled"
                data-service="Event Management - Product Launch"
                data-client="Tech Startup Company"
                data-date="Feb 25, 2026"
                data-amount="₹18,000"
                data-location="Cyberhub, Gurugram"
                data-payment-status="notpaid"
                data-payment-date="—"
                data-complaint="none"
                data-description="Product launch event cancelled by client 48 hours before. Cancellation was due to internal funding delays. Cancellation fee of ₹3,000 was charged."
                data-team="N/A (Cancelled)"
                data-duration="N/A (Cancelled)"
                data-invoice="INV-2026-0271"
              >
                <td class="service-name">Event Management - Product Launch</td>
                <td>Tech Startup Company</td>
                <td>Feb 25, 2026</td>
                <td class="service-amount">₹18,000</td>
                <td><span class="status-badge cancelled">Cancelled</span></td>
                <td>
                  <span class="action-link" onclick="openHistoryDetail(this)"
                    ><i class="fa fa-eye"></i> View</span
                  >
                </td>
              </tr>
              <tr
                class="history-row"
                data-status="completed"
                data-service="Travel Support - Group Tour"
                data-client="Adventure Club India"
                data-date="Feb 20, 2026"
                data-amount="₹7,500"
                data-location="Manali, Himachal Pradesh"
                data-payment-status="paid"
                data-payment-date="Feb 22, 2026"
                data-complaint="none"
                data-description="Group travel support for a 25-person adventure tour to Manali. Included vehicle coordination, accommodation check-ins, activity scheduling, and emergency on-call support."
                data-team="3 Staff Members"
                data-duration="3 Days"
                data-invoice="INV-2026-0261"
              >
                <td class="service-name">Travel Support - Group Tour</td>
                <td>Adventure Club India</td>
                <td>Feb 20, 2026</td>
                <td class="service-amount">₹7,500</td>
                <td><span class="status-badge completed">Completed</span></td>
                <td>
                  <span class="action-link" onclick="openHistoryDetail(this)"
                    ><i class="fa fa-eye"></i> View</span
                  >
                </td>
              </tr>
            </tbody>
          </table>
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

    <!-- HISTORY DETAIL MODAL -->
    <div class="modal-bg" id="historyDetailModal">
      <div class="modal-box lg">
        <div class="modal-hdr">
          <h3>Service Details</h3>
          <button class="modal-close" onclick="closeHistoryDetail()">×</button>
        </div>
        <div class="modal-body" style="padding: 0">
          <div class="detail-modal-header">
            <div class="svc-id" id="hd-invoice">INV-2026-0000</div>
            <h2 id="hd-service-name">Service Name</h2>
            <div class="status-row">
              <span class="detail-status-pill" id="hd-status-pill">Status</span>
              <span class="detail-date-pill" id="hd-date"
                ><i class="fa fa-calendar" style="margin-right: 5px"></i
                >Date</span
              >
            </div>
          </div>
          <div class="detail-modal-body">
            <div class="detail-grid">
              <div class="detail-tile highlight">
                <div class="detail-tile-label">
                  <i class="fa fa-indian-rupee-sign"></i> Service Amount
                </div>
                <div class="detail-tile-value amount-big" id="hd-amount">
                  ₹0
                </div>
                <div class="detail-tile-sub">Total billed amount</div>
              </div>
              <div class="detail-tile">
                <div class="detail-tile-label">
                  <i class="fa fa-user"></i> Client Name
                </div>
                <div class="detail-tile-value" id="hd-client">—</div>
                <div class="detail-tile-sub">Service recipient</div>
              </div>
              <div class="detail-tile">
                <div class="detail-tile-label">
                  <i class="fa fa-map-marker-alt"></i> Service Location
                </div>
                <div class="detail-tile-value" id="hd-location">—</div>
              </div>
              <div class="detail-tile">
                <div class="detail-tile-label">
                  <i class="fa fa-clock"></i> Duration
                </div>
                <div class="detail-tile-value" id="hd-duration">—</div>
              </div>
              <div class="detail-tile full">
                <div class="detail-tile-label">
                  <i class="fa fa-align-left"></i> Service Description
                </div>
                <div
                  class="detail-tile-value"
                  id="hd-description"
                  style="
                    font-size: 14px;
                    font-weight: 500;
                    color: var(--gray-600);
                    line-height: 1.7;
                    font-family: var(--font-body);
                  "
                >
                  —
                </div>
              </div>
            </div>
            <div class="detail-section-title">
              <i class="fa fa-wallet"></i> Payment Information
            </div>
            <div id="hd-payment-strip" class="payment-status-strip">
              <div class="payment-status-strip-icon">
                <i class="fa fa-circle-check"></i>
              </div>
              <div class="payment-status-strip-text">
                <strong id="hd-payment-label">Payment Received</strong>
                <span id="hd-payment-detail">Payment date details</span>
              </div>
            </div>
            <div class="detail-section-title">
              <i class="fa fa-exclamation-triangle"></i> Complaint Status
            </div>
            <div id="hd-complaint-strip" class="complaint-strip">
              <div class="complaint-strip-icon">
                <i id="hd-complaint-icon" class="fa fa-check-circle"></i>
              </div>
              <div class="complaint-strip-text">
                <strong id="hd-complaint-title">No Complaints</strong>
                <p id="hd-complaint-detail">
                  No complaints were filed for this service.
                </p>
              </div>
            </div>
            <button class="detail-close-btn" onclick="closeHistoryDetail()">
              <i class="fa fa-times" style="margin-right: 8px"></i>Close Details
            </button>
          </div>
        </div>
      </div>
    </div>

    <script src="shared.js"></script>
    <script>
      function filterHistory(status, btn) {
        document
          .querySelectorAll(".history-filters .filter-btn")
          .forEach(function (b) {
            b.classList.remove("active");
          });
        btn.classList.add("active");
        document.querySelectorAll(".history-row").forEach(function (row) {
          row.classList.remove("hidden");
          if (status !== "all" && row.getAttribute("data-status") !== status)
            row.classList.add("hidden");
        });
      }

      function openHistoryDetail(el) {
        var row = el.closest("tr");
        var d = row.dataset;
        document.getElementById("hd-invoice").textContent =
          d.invoice || "INV-2026-0000";
        document.getElementById("hd-service-name").textContent =
          d.service || "Service";
        document.getElementById("hd-date").innerHTML =
          '<i class="fa fa-calendar" style="margin-right:5px;"></i>' +
          (d.date || "—");
        document.getElementById("hd-amount").textContent = d.amount || "₹0";
        document.getElementById("hd-client").textContent = d.client || "—";
        document.getElementById("hd-location").textContent = d.location || "—";
        document.getElementById("hd-duration").textContent = d.duration || "—";
        document.getElementById("hd-description").textContent =
          d.description || "—";

        var statusPill = document.getElementById("hd-status-pill");
        statusPill.className =
          "detail-status-pill " + (d.status || "completed");
        var statusLabels = {
          completed: "✓ Completed",
          pending: "⏳ In Progress",
          cancelled: "✕ Cancelled",
        };
        statusPill.textContent = statusLabels[d.status] || d.status;

        var payStrip = document.getElementById("hd-payment-strip");
        payStrip.className = "payment-status-strip";
        var ps = d.paymentStatus;
        if (ps === "paid") {
          payStrip.classList.add("paid");
          payStrip.querySelector(".payment-status-strip-icon").innerHTML =
            '<i class="fa fa-circle-check"></i>';
          document.getElementById("hd-payment-label").textContent =
            "Payment Received ✓";
          document.getElementById("hd-payment-detail").textContent =
            "Amount of " + d.amount + " received on " + d.paymentDate + ".";
        } else if (ps === "pending") {
          payStrip.classList.add("pending");
          payStrip.querySelector(".payment-status-strip-icon").innerHTML =
            '<i class="fa fa-hourglass-half"></i>';
          document.getElementById("hd-payment-label").textContent =
            "Payment Pending";
          document.getElementById("hd-payment-detail").textContent =
            "Payment of " + d.amount + " is yet to be received.";
        } else {
          payStrip.classList.add("notpaid");
          payStrip.querySelector(".payment-status-strip-icon").innerHTML =
            '<i class="fa fa-circle-xmark"></i>';
          document.getElementById("hd-payment-label").textContent =
            "Payment Not Received";
          document.getElementById("hd-payment-detail").textContent =
            "Service was cancelled. Only cancellation charges apply.";
        }

        var cStrip = document.getElementById("hd-complaint-strip");
        cStrip.className = "complaint-strip";
        var cIcon = document.getElementById("hd-complaint-icon");
        if (d.complaint === "has-complaint") {
          cStrip.classList.add("has-complaint");
          cIcon.className = "fa fa-triangle-exclamation";
          document.getElementById("hd-complaint-title").textContent =
            "Complaint Filed – " + (d.complaintId || "");
          document.getElementById("hd-complaint-detail").textContent =
            d.complaintTitle
              ? '"' + d.complaintTitle + '" — This complaint is currently open.'
              : "A complaint has been filed.";
        } else {
          cStrip.classList.add("no-complaint");
          cIcon.className = "fa fa-check-circle";
          document.getElementById("hd-complaint-title").textContent =
            "No Complaints Filed";
          document.getElementById("hd-complaint-detail").textContent =
            "No complaints were raised by the client for this service. Great work!";
        }
        document.getElementById("historyDetailModal").classList.add("open");
      }
      function closeHistoryDetail() {
        document.getElementById("historyDetailModal").classList.remove("open");
      }
    </script>
  </body>
</html>
