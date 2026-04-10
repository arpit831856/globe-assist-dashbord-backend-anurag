<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GlobeAssist — Payment Status</title>
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
      .payment-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 22px;
        margin-bottom: 24px;
      }
      .payment-card {
        background: var(--white);
        border-radius: var(--radius-lg);
        padding: 26px;
        box-shadow: var(--shadow-md);
        border: 1px solid var(--gray-200);
        border-top: 4px solid var(--blue-600);
        position: relative;
        overflow: hidden;
      }
      .payment-card::before {
        content: "";
        position: absolute;
        top: 0;
        right: 0;
        width: 100px;
        height: 100px;
        background: radial-gradient(
          circle,
          rgba(35, 64, 168, 0.06) 0%,
          transparent 70%
        );
        border-radius: 50%;
      }
      .payment-header {
        display: flex;
        align-items: center;
        gap: 18px;
        margin-bottom: 22px;
        position: relative;
        z-index: 1;
      }
      .payment-icon {
        width: 58px;
        height: 58px;
        border-radius: var(--radius-md);
        background: var(--blue-50);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--blue-600);
        font-size: 26px;
        border: 1px solid var(--blue-100);
      }
      .payment-info h3 {
        font-size: 11px;
        color: var(--gray-400);
        text-transform: uppercase;
        letter-spacing: 0.8px;
        font-weight: 700;
        margin-bottom: 6px;
        font-family: var(--font-display);
      }
      .payment-amount {
        font-family: var(--font-display);
        font-size: 31px;
        font-weight: 900;
        color: var(--blue-950);
        line-height: 1;
        letter-spacing: -1px;
      }
      .payment-subtitle {
        font-size: 12px;
        color: var(--gray-400);
        margin-top: 4px;
      }
      .payment-details {
        background: var(--gray-100);
        border-radius: var(--radius-md);
        padding: 18px;
        margin-bottom: 20px;
        border: 1px solid var(--gray-200);
      }
      .detail-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 0;
        border-bottom: 1px solid var(--gray-200);
        font-size: 14px;
      }
      .detail-row:last-child {
        border-bottom: none;
      }
      .detail-label {
        color: var(--gray-500);
        font-weight: 500;
      }
      .detail-value {
        color: var(--blue-950);
        font-weight: 700;
        font-family: var(--font-display);
      }
      .payment-actions {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 10px;
      }
      .payment-btn {
        padding: 13px 14px;
        border: none;
        border-radius: var(--radius-md);
        font-size: 13px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        text-transform: uppercase;
        letter-spacing: 0.4px;
        font-family: var(--font-display);
      }
      .payment-btn-primary {
        background: var(--blue-600);
        color: #fff;
      }
      .payment-btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(35, 64, 168, 0.3);
        background: var(--accent-hover);
      }
      .payment-btn-secondary {
        background: var(--blue-50);
        color: var(--blue-600);
        border: 1px solid var(--blue-100);
      }
      .payment-btn-secondary:hover {
        background: var(--blue-100);
      }

      /* Payment Details Modal */
      .pay-modal-header {
        background: linear-gradient(135deg, var(--blue-900), var(--blue-700));
        padding: 26px 28px 22px;
        border-radius: var(--radius-lg) var(--radius-lg) 0 0;
        color: #fff;
      }
      .pay-modal-header .pm-type-badge {
        font-family: var(--font-mono);
        font-size: 10px;
        color: rgba(255, 255, 255, 0.5);
        text-transform: uppercase;
        letter-spacing: 1.2px;
        margin-bottom: 6px;
      }
      .pay-modal-header h2 {
        font-family: var(--font-display);
        font-size: 20px;
        font-weight: 800;
        letter-spacing: -0.3px;
        margin-bottom: 14px;
      }
      .pay-modal-summary {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
      }
      .pay-modal-summary-tile {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.15);
        border-radius: var(--radius-md);
        padding: 12px 18px;
        flex: 1;
        min-width: 110px;
      }
      .pay-modal-summary-tile .lbl {
        font-size: 10px;
        color: rgba(255, 255, 255, 0.5);
        text-transform: uppercase;
        letter-spacing: 0.8px;
        font-weight: 700;
        font-family: var(--font-display);
        margin-bottom: 5px;
      }
      .pay-modal-summary-tile .val {
        font-family: var(--font-display);
        font-size: 20px;
        font-weight: 900;
        color: #fff;
        letter-spacing: -0.5px;
      }
      .pay-modal-summary-tile .val.green {
        color: #6ee7b7;
      }
      .pay-modal-summary-tile .sub {
        font-size: 11px;
        color: rgba(255, 255, 255, 0.4);
        margin-top: 2px;
      }
      .pay-modal-body {
        padding: 22px 24px 26px;
      }
      .pay-modal-section-title {
        font-family: var(--font-display);
        font-size: 12px;
        font-weight: 700;
        color: var(--blue-950);
        text-transform: uppercase;
        letter-spacing: 0.6px;
        display: flex;
        align-items: center;
        gap: 8px;
        padding-bottom: 10px;
        border-bottom: 2px solid var(--gray-200);
        margin-bottom: 14px;
      }
      .pay-modal-section-title i {
        color: var(--blue-500);
        font-size: 13px;
      }
      .pay-table-wrap {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        border-radius: var(--radius-md);
        border: 1px solid var(--gray-200);
      }
      .pay-services-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 520px;
      }
      .pay-services-table thead {
        background: var(--gray-100);
        border-bottom: 2px solid var(--gray-200);
      }
      .pay-services-table th {
        padding: 12px 14px;
        text-align: left;
        font-size: 11px;
        font-weight: 700;
        color: var(--gray-500);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-family: var(--font-display);
        white-space: nowrap;
      }
      .pay-services-table td {
        padding: 14px 14px;
        border-bottom: 1px solid var(--gray-100);
        font-size: 13px;
        color: var(--gray-700);
        vertical-align: middle;
      }
      .pay-services-table tbody tr:hover {
        background: var(--blue-50);
      }
      .pay-services-table tbody tr:last-child td {
        border-bottom: none;
      }
      .pay-svc-name {
        font-weight: 700;
        color: var(--blue-950);
        font-family: var(--font-display);
        font-size: 13px;
      }
      .pay-svc-client {
        font-size: 11px;
        color: var(--gray-400);
        margin-top: 3px;
      }
      .pay-svc-amount {
        font-weight: 800;
        color: var(--blue-700);
        font-family: var(--font-mono);
        font-size: 14px;
        white-space: nowrap;
      }
      .pay-svc-date {
        font-family: var(--font-mono);
        font-size: 12px;
        color: var(--gray-500);
        white-space: nowrap;
      }
      .pay-svc-category {
        display: inline-block;
        background: var(--blue-50);
        color: var(--blue-600);
        font-size: 10px;
        font-weight: 700;
        padding: 3px 9px;
        border-radius: 20px;
        font-family: var(--font-display);
        border: 1px solid var(--blue-100);
        white-space: nowrap;
      }
      .pay-status-dot {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        font-size: 11px;
        font-weight: 700;
        font-family: var(--font-display);
        white-space: nowrap;
      }
      .pay-status-dot::before {
        content: "";
        width: 7px;
        height: 7px;
        border-radius: 50%;
        display: inline-block;
        flex-shrink: 0;
      }
      .pay-status-dot.received {
        color: var(--success);
      }
      .pay-status-dot.received::before {
        background: var(--success);
      }
      .pay-status-dot.pending {
        color: var(--warning);
      }
      .pay-status-dot.pending::before {
        background: var(--warning);
      }
      .pay-total-bar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        background: var(--blue-950);
        border-radius: var(--radius-md);
        padding: 16px 22px;
        margin-top: 16px;
        flex-wrap: wrap;
        gap: 10px;
      }
      .pay-total-bar .label {
        font-family: var(--font-display);
        font-size: 13px;
        font-weight: 700;
        color: rgba(255, 255, 255, 0.7);
        display: flex;
        align-items: center;
        gap: 8px;
      }
      .pay-total-bar .label i {
        color: var(--blue-300);
      }
      .pay-total-bar .amount {
        font-family: var(--font-display);
        font-size: 24px;
        font-weight: 900;
        color: #fff;
        letter-spacing: -0.5px;
      }
      .pay-empty {
        text-align: center;
        padding: 44px 20px;
        color: var(--gray-400);
      }
      .pay-empty i {
        font-size: 38px;
        display: block;
        margin-bottom: 12px;
        color: var(--gray-300);
      }
      .pay-empty p {
        font-size: 14px;
        font-family: var(--font-display);
        font-weight: 600;
        color: var(--gray-500);
        margin-top: 4px;
      }
      .pay-note-bar {
        background: var(--blue-50);
        border: 1px solid var(--blue-100);
        border-radius: var(--radius-md);
        padding: 12px 16px;
        font-size: 13px;
        color: var(--blue-700);
        margin-bottom: 16px;
        display: flex;
        align-items: center;
        gap: 10px;
      }
      .pay-note-bar i {
        color: var(--blue-500);
        flex-shrink: 0;
        font-size: 15px;
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
        .payment-container {
          grid-template-columns: 1fr;
        }
      }
      @media (max-width: 599px) {
        .payment-actions {
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

      <div class="payment-container">
        <div class="payment-card">
          <div class="payment-header">
            <div class="payment-icon"><i class="fa fa-wallet"></i></div>
            <div class="payment-info">
              <h3>Available Balance</h3>
              <div class="payment-amount">₹28,450</div>
              <div class="payment-subtitle">In your wallet</div>
            </div>
          </div>
          <div class="payment-details">
            <div class="detail-row">
              <span class="detail-label">Total Earned</span
              ><span class="detail-value">₹1,45,000</span>
            </div>
            <div class="detail-row">
              <span class="detail-label">This Month</span
              ><span class="detail-value">₹28,450</span>
            </div>
            <div class="detail-row">
              <span class="detail-label">Pending Payments</span
              ><span class="detail-value">₹5,200</span>
            </div>
            <div class="detail-row">
              <span class="detail-label">Last Updated</span
              ><span class="detail-value">Today, 2:30 PM</span>
            </div>
          </div>
          <div class="payment-actions">
            <button
              class="payment-btn payment-btn-primary"
              onclick="
                alert(
                  'Withdrawal initiated! You will receive ₹28,450 within 2-3 business days.',
                )
              "
            >
              <i class="fa fa-download"></i> Withdraw
            </button>
            <button
              class="payment-btn payment-btn-secondary"
              onclick="openPaymentDetailsModal('available')"
            >
              <i class="fa fa-eye"></i> Details
            </button>
          </div>
        </div>
        <div class="payment-card" style="border-top-color: var(--blue-400)">
          <div class="payment-header">
            <div
              class="payment-icon"
              style="background: var(--blue-100); color: var(--blue-700)"
            >
              <i class="fa fa-chart-line"></i>
            </div>
            <div class="payment-info">
              <h3>Total Earnings</h3>
              <div class="payment-amount">₹1,45,000</div>
              <div class="payment-subtitle">All-time earnings</div>
            </div>
          </div>
          <div class="payment-details">
            <div class="detail-row">
              <span class="detail-label">Last Month</span
              ><span class="detail-value">₹32,100</span>
            </div>
            <div class="detail-row">
              <span class="detail-label">Completed Services</span
              ><span class="detail-value">24 Services</span>
            </div>
            <div class="detail-row">
              <span class="detail-label">Avg Income/Service</span
              ><span class="detail-value">₹6,042</span>
            </div>
            <div class="detail-row">
              <span class="detail-label">Success Rate</span
              ><span class="detail-value">96% · Excellent</span>
            </div>
          </div>
          <div class="payment-actions">
            <button
              class="payment-btn payment-btn-primary"
              onclick="
                alert(
                  'Money Request initiated for ₹5,200. This will be transferred within 1-2 business days.',
                )
              "
            >
              <i class="fa fa-arrow-up"></i> Request Money
            </button>
            <button
              class="payment-btn payment-btn-secondary"
              onclick="openPaymentDetailsModal('total')"
            >
              <i class="fa fa-history"></i> History
            </button>
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

    <!-- PAYMENT DETAILS MODAL -->
    <div class="modal-bg" id="paymentDetailsModal">
      <div class="modal-box lg">
        <div class="modal-hdr">
          <h3 id="pdm-title">Payment Details</h3>
          <button class="modal-close" onclick="closePaymentDetailsModal()">
            ×
          </button>
        </div>
        <div class="modal-body" style="padding: 0">
          <div class="pay-modal-header">
            <div class="pm-type-badge" id="pdm-badge">
              Available Balance · Breakdown
            </div>
            <h2 id="pdm-heading">Services — Received Payments</h2>
            <div class="pay-modal-summary">
              <div class="pay-modal-summary-tile">
                <div class="lbl">Total Amount</div>
                <div class="val green" id="pdm-total-amount">₹0</div>
                <div class="sub" id="pdm-total-sub">Received till date</div>
              </div>
              <div class="pay-modal-summary-tile">
                <div class="lbl">Services</div>
                <div class="val" id="pdm-service-count">0</div>
                <div class="sub">Transactions</div>
              </div>
              <div class="pay-modal-summary-tile">
                <div class="lbl">Last Payment</div>
                <div
                  class="val"
                  id="pdm-last-date"
                  style="font-size: 14px; margin-top: 4px"
                >
                  —
                </div>
                <div class="sub">Date received</div>
              </div>
            </div>
          </div>
          <div class="pay-modal-body">
            <div class="pay-note-bar" id="pdm-note-bar">
              <i class="fa fa-circle-info"></i><span id="pdm-note-text"></span>
            </div>
            <div class="pay-modal-section-title">
              <i class="fa fa-list-ul"></i
              ><span id="pdm-section-label"
                >Service-wise Payment Breakdown</span
              >
            </div>
            <div class="pay-table-wrap">
              <table class="pay-services-table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Service Name & Client</th>
                    <th>Category</th>
                    <th>Date</th>
                    <th>Payment Date</th>
                    <th>Amount</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody id="pdm-table-body"></tbody>
              </table>
            </div>
            <div class="pay-empty" id="pdm-empty" style="display: none">
              <i class="fa fa-inbox"></i>
              <p>No payment records found</p>
            </div>
            <div class="pay-total-bar" id="pdm-total-bar">
              <div class="label">
                <i class="fa fa-calculator"></i
                ><span id="pdm-bar-label">Total Available Balance</span>
              </div>
              <div class="amount" id="pdm-bar-amount">₹0</div>
            </div>
            <button
              class="detail-close-btn"
              onclick="closePaymentDetailsModal()"
            >
              <i class="fa fa-times" style="margin-right: 8px"></i>Close
            </button>
          </div>
        </div>
      </div>
    </div>

    <script src="shared.js"></script>
    <script>
      var paymentData = [
        {
          service: "Tour Management - Delhi",
          client: "Sharma Family",
          category: "Tour Manager",
          serviceDate: "Mar 05, 2026",
          paymentDate: "Mar 07, 2026",
          amount: 8500,
          amountStr: "₹8,500",
          status: "received",
          withdrawn: true,
        },
        {
          service: "Ground Staff - Conference",
          client: "ABC Corporation",
          category: "Ground Staff",
          serviceDate: "Mar 02, 2026",
          paymentDate: "Mar 04, 2026",
          amount: 5200,
          amountStr: "₹5,200",
          status: "received",
          withdrawn: false,
        },
        {
          service: "Photography - Corporate Event",
          client: "XYZ Industries Ltd",
          category: "Photography",
          serviceDate: "Feb 28, 2026",
          paymentDate: "Mar 01, 2026",
          amount: 12000,
          amountStr: "₹12,000",
          status: "received",
          withdrawn: false,
        },
        {
          service: "Travel Support - Group Tour",
          client: "Adventure Club India",
          category: "Travel Support",
          serviceDate: "Feb 20, 2026",
          paymentDate: "Feb 22, 2026",
          amount: 7500,
          amountStr: "₹7,500",
          status: "received",
          withdrawn: false,
        },
        {
          service: "Event Coordination - Annual Meet",
          client: "Reliance Corp",
          category: "Event Coordinator",
          serviceDate: "Jan 28, 2026",
          paymentDate: "Jan 30, 2026",
          amount: 22000,
          amountStr: "₹22,000",
          status: "received",
          withdrawn: true,
        },
        {
          service: "Ground Staff - Trade Expo",
          client: "Delhi Trade Pvt Ltd",
          category: "Ground Staff",
          serviceDate: "Jan 15, 2026",
          paymentDate: "Jan 17, 2026",
          amount: 9800,
          amountStr: "₹9,800",
          status: "received",
          withdrawn: true,
        },
        {
          service: "Tour Management - Agra",
          client: "Singh Family",
          category: "Tour Manager",
          serviceDate: "Dec 20, 2025",
          paymentDate: "Dec 22, 2025",
          amount: 11500,
          amountStr: "₹11,500",
          status: "received",
          withdrawn: true,
        },
        {
          service: "Photography - Wedding",
          client: "Mehta & Family",
          category: "Photography",
          serviceDate: "Dec 10, 2025",
          paymentDate: "Dec 12, 2025",
          amount: 18000,
          amountStr: "₹18,000",
          status: "received",
          withdrawn: true,
        },
        {
          service: "Security Staff - Concert",
          client: "Music Events India",
          category: "Security Staff",
          serviceDate: "Nov 30, 2025",
          paymentDate: "Dec 01, 2025",
          amount: 14500,
          amountStr: "₹14,500",
          status: "received",
          withdrawn: true,
        },
        {
          service: "Telecalling - Product Campaign",
          client: "StartFast Solutions",
          category: "Telecaller",
          serviceDate: "Nov 15, 2025",
          paymentDate: "Nov 17, 2025",
          amount: 6000,
          amountStr: "₹6,000",
          status: "received",
          withdrawn: true,
        },
      ];

      function fmt(n) {
        return "₹" + n.toLocaleString("en-IN");
      }

      function openPaymentDetailsModal(type) {
        var isAvailable = type === "available";
        var rows = isAvailable
          ? paymentData.filter(function (p) {
              return p.status === "received" && !p.withdrawn;
            })
          : paymentData.filter(function (p) {
              return p.status === "received";
            });
        var totalAmount = rows.reduce(function (sum, r) {
          return sum + r.amount;
        }, 0);
        var lastDate = rows.length > 0 ? rows[0].paymentDate : "—";

        if (isAvailable) {
          document.getElementById("pdm-title").textContent =
            "Available Balance — Details";
          document.getElementById("pdm-badge").textContent =
            "Available Balance · Breakdown";
          document.getElementById("pdm-heading").textContent =
            "Payments Received — Withdrawal Pending";
          document.getElementById("pdm-total-sub").textContent =
            "Ready to withdraw";
          document.getElementById("pdm-note-text").textContent =
            "Services where payment has been received from the client but you have not yet withdrawn to your bank account.";
          document.getElementById("pdm-section-label").textContent =
            "Service-wise Breakdown (Not Yet Withdrawn)";
          document.getElementById("pdm-bar-label").textContent =
            "Total Available Balance";
        } else {
          document.getElementById("pdm-title").textContent =
            "Total Earnings — Full History";
          document.getElementById("pdm-badge").textContent =
            "Total Earnings · All Time History";
          document.getElementById("pdm-heading").textContent =
            "Complete Payment History — All Services";
          document.getElementById("pdm-total-sub").textContent =
            "All-time earnings";
          document.getElementById("pdm-note-text").textContent =
            "Complete history of all payments received across all completed services, including withdrawn and available amounts.";
          document.getElementById("pdm-section-label").textContent =
            "All Service Payments (Complete History)";
          document.getElementById("pdm-bar-label").textContent =
            "Total Earnings (All Time)";
        }

        document.getElementById("pdm-total-amount").textContent =
          fmt(totalAmount);
        document.getElementById("pdm-service-count").textContent = rows.length;
        document.getElementById("pdm-last-date").textContent = lastDate;
        document.getElementById("pdm-bar-amount").textContent =
          fmt(totalAmount);

        var tbody = document.getElementById("pdm-table-body");
        var emptyEl = document.getElementById("pdm-empty");
        var totalBar = document.getElementById("pdm-total-bar");

        if (rows.length === 0) {
          tbody.innerHTML = "";
          emptyEl.style.display = "block";
          totalBar.style.display = "none";
        } else {
          emptyEl.style.display = "none";
          totalBar.style.display = "flex";
          tbody.innerHTML = rows
            .map(function (r, i) {
              var wb =
                !isAvailable && r.withdrawn
                  ? '<span style="display:inline-block;background:var(--gray-100);color:var(--gray-500);font-size:10px;font-weight:700;padding:2px 8px;border-radius:20px;font-family:var(--font-display);border:1px solid var(--gray-200);margin-left:6px;">Withdrawn</span>'
                  : "";
              return (
                '<tr><td style="color:var(--gray-400);font-family:var(--font-mono);font-size:12px;font-weight:600;">' +
                String(i + 1).padStart(2, "0") +
                "</td>" +
                '<td><div class="pay-svc-name">' +
                r.service +
                wb +
                '</div><div class="pay-svc-client"><i class="fa fa-user" style="margin-right:4px;"></i>' +
                r.client +
                "</div></td>" +
                '<td><span class="pay-svc-category">' +
                r.category +
                "</span></td>" +
                '<td><div class="pay-svc-date"><i class="fa fa-calendar" style="margin-right:5px;color:var(--gray-400);"></i>' +
                r.serviceDate +
                "</div></td>" +
                '<td><div class="pay-svc-date" style="color:var(--success);"><i class="fa fa-circle-check" style="margin-right:5px;"></i>' +
                r.paymentDate +
                "</div></td>" +
                '<td class="pay-svc-amount">' +
                r.amountStr +
                "</td>" +
                '<td><span class="pay-status-dot received">Received</span></td></tr>'
              );
            })
            .join("");
        }
        document.getElementById("paymentDetailsModal").classList.add("open");
      }
      function closePaymentDetailsModal() {
        document.getElementById("paymentDetailsModal").classList.remove("open");
      }
    </script>
  </body>
</html>
