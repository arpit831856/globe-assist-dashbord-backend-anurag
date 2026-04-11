<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Notifications</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500;9..40,600;9..40,700&family=Playfair+Display:wght@600;700&family=JetBrains+Mono:wght@400;500&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    />
    <style>
      *,
      *::before,
      *::after {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
      }
      :root {
        --green: #148a3a;
        --green-light: #e8f5ee;
        --text: #1a1a1a;
        --text-muted: #6b7280;
        --border: #e5e7eb;
        --bg: #f7f8fa;
        --white: #ffffff;
        --shadow-sm: 0 1px 4px rgba(0, 0, 0, 0.07);
        --shadow-md: 0 4px 20px rgba(0, 0, 0, 0.08);
        --radius: 14px;
        --font-body: "DM Sans", sans-serif;
        --font-display: "Playfair Display", serif;
        --font-mono: "JetBrains Mono", monospace;
      }

      body {
        font-family: var(--font-body);
        background: var(--bg);
        color: var(--text);
        min-height: 100vh;
      }

      /* ── CENTER WRAPPER ── */
      .page-wrap {
        width: 100%;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: flex-start;
        padding: 32px 20px 48px;
      }

      .page {
        width: 100%;
        max-width: 720px;
      }

      .header-row {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        margin-bottom: 24px;
        gap: 12px;
        flex-wrap: wrap;
      }
      .page-title {
        font-family: var(--font-display);
        font-size: clamp(22px, 4vw, 28px);
        font-weight: 700;
        margin-bottom: 4px;
      }
      .page-sub {
        font-size: 14px;
        color: var(--text-muted);
      }

      .mark-read-btn {
        background: none;
        border: none;
        cursor: pointer;
        font-size: 13px;
        font-weight: 600;
        font-family: var(--font-body);
        color: var(--green);
        text-decoration: underline;
        padding: 2px 0;
        white-space: nowrap;
        margin-top: 4px;
        transition: color 0.2s;
      }
      .mark-read-btn:hover {
        color: #0f6b2c;
      }

      /* Filter tabs */
      .filter-tabs {
        display: flex;
        gap: 8px;
        margin-bottom: 24px;
        flex-wrap: wrap;
      }
      .tab-btn {
        padding: 7px 15px;
        border-radius: 50px;
        border: 1.5px solid var(--border);
        background: var(--white);
        font-family: var(--font-body);
        font-size: 13px;
        font-weight: 500;
        cursor: pointer;
        color: var(--text-muted);
        transition: all 0.2s;
      }
      .tab-btn.active {
        border-color: var(--green);
        background: var(--green);
        color: #fff;
      }
      .tab-btn:hover:not(.active) {
        border-color: var(--green);
        color: var(--green);
      }

      /* Section label */
      .section-label {
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 1px;
        text-transform: uppercase;
        color: var(--text-muted);
        margin-bottom: 10px;
        padding-left: 2px;
      }

      /* Notif card group */
      .notif-card {
        background: var(--white);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        overflow: hidden;
        margin-bottom: 20px;
        box-shadow: var(--shadow-sm);
      }

      .notif-item {
        display: flex;
        align-items: flex-start;
        gap: 13px;
        padding: 16px 18px;
        border-bottom: 1px solid var(--border);
        cursor: pointer;
        transition: background 0.15s;
        position: relative;
      }
      .notif-item:last-child {
        border-bottom: none;
      }
      .notif-item:hover {
        background: #fafcfa;
      }
      .notif-item.unread {
        background: #fafff9;
      }
      .notif-item.unread::before {
        content: "";
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 3px;
        background: var(--green);
        border-radius: 0 2px 2px 0;
      }

      .notif-icon {
        width: 42px;
        height: 42px;
        border-radius: 11px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 17px;
        flex-shrink: 0;
      }
      .notif-icon.service {
        background: var(--green-light);
        color: var(--green);
      }
      .notif-icon.payment {
        background: #eff6ff;
        color: #2563eb;
      }
      .notif-icon.alert {
        background: #fff7ed;
        color: #ea580c;
      }
      .notif-icon.promo {
        background: #f5f3ff;
        color: #7c3aed;
      }
      .notif-icon.info {
        background: #f0f9ff;
        color: #0284c7;
      }

      .notif-body {
        flex: 1;
        min-width: 0;
      }
      .notif-title {
        font-size: 14px;
        font-weight: 600;
        line-height: 1.4;
        margin-bottom: 4px;
      }
      .notif-desc {
        font-size: 13px;
        color: var(--text-muted);
        line-height: 1.55;
      }
      .notif-time {
        font-size: 11px;
        color: var(--text-muted);
        margin-top: 6px;
        font-family: var(--font-mono);
      }

      .notif-actions {
        display: flex;
        gap: 8px;
        margin-top: 10px;
        flex-wrap: wrap;
      }
      .na-btn {
        padding: 5px 13px;
        border-radius: 7px;
        font-size: 12px;
        font-weight: 500;
        font-family: var(--font-body);
        cursor: pointer;
        border: 1.5px solid var(--border);
        background: none;
        color: var(--text);
        transition: all 0.2s;
      }
      .na-btn.primary {
        background: var(--green);
        color: #fff;
        border-color: var(--green);
      }
      .na-btn:hover:not(.primary) {
        border-color: var(--green);
        color: var(--green);
      }
      .na-btn.primary:hover {
        background: #0f6b2c;
      }

      .unread-dot {
        width: 8px;
        height: 8px;
        background: var(--green);
        border-radius: 50%;
        flex-shrink: 0;
        margin-top: 7px;
      }

      /* Responsive */
      @media (max-width: 500px) {
        .page-wrap {
          padding: 20px 12px 40px;
        }
        .notif-item {
          padding: 13px 14px;
          gap: 10px;
        }
        .notif-icon {
          width: 36px;
          height: 36px;
          font-size: 15px;
        }
      }
    </style>
  </head>
  <body>
    <div class="page-wrap">
      <div class="page">
        <div class="header-row">
          <div>
            <h1 class="page-title">Notifications</h1>
            <p class="page-sub">3 unread notifications</p>
          </div>
          <button class="mark-read-btn">Mark all as read</button>
        </div>

        <div class="filter-tabs">
          <button class="tab-btn active">All</button>
          <button class="tab-btn">Services</button>
          <button class="tab-btn">Payments</button>
          <button class="tab-btn">Alerts</button>
          <button class="tab-btn">Promotions</button>
        </div>

        <!-- Today -->
        <div class="section-label">Today</div>
        <div class="notif-card">
          <div class="notif-item unread">
            <div class="notif-icon service">
              <i class="fas fa-user-check"></i>
            </div>
            <div class="notif-body">
              <div class="notif-title">Arjun Mehta Assigned — Tour Manager</div>
              <div class="notif-desc">
                Your Rajasthan Heritage Circuit request has been assigned to
                Arjun Mehta (Senior Tour Manager, ★ 4.9). Briefing scheduled on
                10 Mar 2026.
              </div>
              <div class="notif-actions">
                <button class="na-btn primary">View Request</button>
                <button class="na-btn">Chat with Arjun</button>
              </div>
              <div class="notif-time">Today, 11:30 AM</div>
            </div>
            <div class="unread-dot"></div>
          </div>

          <div class="notif-item unread">
            <div class="notif-icon alert"><i class="fas fa-file-alt"></i></div>
            <div class="notif-body">
              <div class="notif-title">
                Content Draft Submitted — Review Required
              </div>
              <div class="notif-desc">
                Sneha Verma has submitted the first draft for your Social Media
                Package (5 Reels + 3 Blogs). Please review and share feedback.
              </div>
              <div class="notif-actions">
                <button class="na-btn primary">Review Draft</button>
              </div>
              <div class="notif-time">Today, 4:20 PM</div>
            </div>
            <div class="unread-dot"></div>
          </div>

          <div class="notif-item unread">
            <div class="notif-icon payment">
              <i class="fas fa-rupee-sign"></i>
            </div>
            <div class="notif-body">
              <div class="notif-title">Payment Successful — ₹23,500</div>
              <div class="notif-desc">
                Invoice #GA-2026-0112 for Telecaller Package (Feb) has been paid
                successfully via VISA ****4521.
              </div>
              <div class="notif-time">Today, 9:00 AM</div>
            </div>
            <div class="unread-dot"></div>
          </div>
        </div>

        <!-- Yesterday -->
        <div class="section-label">Yesterday</div>
        <div class="notif-card">
          <div class="notif-item">
            <div class="notif-icon service">
              <i class="fas fa-phone-alt"></i>
            </div>
            <div class="notif-body">
              <div class="notif-title">
                Telecaller Team — Weekly Report Ready
              </div>
              <div class="notif-desc">
                Priya Sharma's team completed 180 calls this week with a 14%
                lead conversion rate. Download the full performance report.
              </div>
              <div class="notif-actions">
                <button class="na-btn primary">Download Report</button>
              </div>
              <div class="notif-time">Yesterday, 6:00 PM</div>
            </div>
          </div>

          <div class="notif-item">
            <div class="notif-icon promo"><i class="fas fa-tag"></i></div>
            <div class="notif-body">
              <div class="notif-title">
                Special Offer: 15% off Content Creator Package
              </div>
              <div class="notif-desc">
                Upgrade your Social Media Package to Premium this week and get
                15% off. Limited time offer for existing clients.
              </div>
              <div class="notif-actions">
                <button class="na-btn primary">Explore Offer</button>
              </div>
              <div class="notif-time">Yesterday, 2:00 PM</div>
            </div>
          </div>
        </div>

        <!-- Earlier -->
        <div class="section-label">Earlier</div>
        <div class="notif-card">
          <div class="notif-item">
            <div class="notif-icon service">
              <i class="fas fa-hard-hat"></i>
            </div>
            <div class="notif-body">
              <div class="notif-title">
                Kerala Ground Ops — Service Completed
              </div>
              <div class="notif-desc">
                Ravi Nair has successfully completed the Kerala Backwaters
                logistics assignment. Please share your rating and feedback.
              </div>
              <div class="notif-actions">
                <button class="na-btn primary">Rate Ravi Nair</button>
              </div>
              <div class="notif-time">08 Feb 2026</div>
            </div>
          </div>

          <div class="notif-item">
            <div class="notif-icon info">
              <i class="fas fa-info-circle"></i>
            </div>
            <div class="notif-body">
              <div class="notif-title">
                New Service Available — Visa Assistance
              </div>
              <div class="notif-desc">
                Globe Assist now offers end-to-end Visa Assistance for Schengen,
                USA & UK visas. Dedicated consultants assigned within 24 hours.
              </div>
              <div class="notif-actions">
                <button class="na-btn primary">Learn More</button>
              </div>
              <div class="notif-time">03 Feb 2026</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
