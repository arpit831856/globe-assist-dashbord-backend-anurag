<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Overview — Globe Assist</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700&family=Playfair+Display:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap"
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
        --green-dark: #0f6b2c;
        --green-mid: #1fa84f;
        --green-light: #e8f5ee;
        --green-pale: #f4fbf6;
        --accent: #6cba0c;
        --text: #1a1a1a;
        --text-muted: #6b7280;
        --text-soft: #9ca3af;
        --border: #e5e7eb;
        --border-soft: #f0f2f5;
        --bg: #f7f8fa;
        --white: #ffffff;
        --shadow-xs: 0 1px 3px rgba(0, 0, 0, 0.06);
        --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.07);
        --shadow-md: 0 6px 24px rgba(0, 0, 0, 0.09);
        --shadow-green: 0 8px 24px rgba(20, 138, 58, 0.18);
        --radius: 16px;
        --radius-sm: 10px;
        --font-body: "DM Sans", sans-serif;
        --font-display: "Playfair Display", serif;
        --font-mono: "JetBrains Mono", monospace;
      }

      body {
        font-family: var(--font-body);
        background: var(--bg);
        color: var(--text);
        overflow-x: hidden;
      }
      .page {
        padding: 28px 32px 48px;
        max-width: 1140px;
      }

      /* ── WELCOME BANNER ── */
      .welcome-banner {
        background: linear-gradient(
          118deg,
          #0c5c25 0%,
          #148a3a 45%,
          #1fa84f 75%,
          #5cb80a 100%
        );
        border-radius: 22px;
        padding: 36px 40px;
        color: #fff;
        position: relative;
        overflow: hidden;
        margin-bottom: 28px;
        box-shadow: var(--shadow-green);
      }
      .wb-blobs {
        position: absolute;
        inset: 0;
        pointer-events: none;
        overflow: hidden;
        border-radius: 22px;
      }
      .wb-blob {
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.06);
      }
      .wb-blob-1 {
        width: 260px;
        height: 260px;
        right: -40px;
        top: -60px;
      }
      .wb-blob-2 {
        width: 180px;
        height: 180px;
        right: 140px;
        bottom: -70px;
      }
      .wb-blob-3 {
        width: 80px;
        height: 80px;
        right: 320px;
        top: 20px;
        background: rgba(255, 255, 255, 0.04);
      }

      .wb-inner {
        position: relative;
        z-index: 1;
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 24px;
        flex-wrap: wrap;
      }
      .wb-greeting {
        font-size: 13px;
        font-weight: 500;
        opacity: 0.78;
        letter-spacing: 0.4px;
        margin-bottom: 5px;
      }
      .wb-name {
        font-family: var(--font-display);
        font-size: clamp(24px, 3.2vw, 34px);
        font-weight: 700;
        line-height: 1.15;
        margin-bottom: 10px;
      }
      .wb-subtitle {
        font-size: 14px;
        opacity: 0.82;
        line-height: 1.65;
        max-width: 400px;
        margin-bottom: 22px;
      }
      .wb-chips {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
      }
      .wb-chip {
        display: flex;
        align-items: center;
        gap: 6px;
        background: rgba(255, 255, 255, 0.14);
        border: 1px solid rgba(255, 255, 255, 0.22);
        border-radius: 50px;
        padding: 5px 13px;
        font-size: 12.5px;
        font-weight: 500;
      }
      .wb-chip i {
        font-size: 11px;
        opacity: 0.85;
      }

      .wb-right {
        display: flex;
        gap: 14px;
        flex-wrap: wrap;
        align-items: flex-start;
      }
      .wb-stat-box {
        background: rgba(255, 255, 255, 0.12);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 14px;
        padding: 16px 22px;
        text-align: center;
        min-width: 90px;
      }
      .wb-stat-val {
        font-family: var(--font-mono);
        font-size: 26px;
        font-weight: 700;
        line-height: 1;
      }
      .wb-stat-lbl {
        font-size: 11px;
        opacity: 0.72;
        margin-top: 5px;
        letter-spacing: 0.3px;
      }

      /* ── CTA STRIP ── */
      .cta-strip {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 14px;
        margin-bottom: 28px;
      }
      @media (max-width: 900px) {
        .cta-strip {
          grid-template-columns: repeat(2, 1fr);
        }
      }
      @media (max-width: 500px) {
        .cta-strip {
          grid-template-columns: 1fr 1fr;
        }
      }

      .cta-card {
        background: var(--white);
        border: 1.5px solid var(--border);
        border-radius: var(--radius);
        padding: 20px 18px;
        cursor: pointer;
        transition:
          transform 0.2s,
          box-shadow 0.2s,
          border-color 0.2s;
        box-shadow: var(--shadow-xs);
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;
      }
      .cta-card:hover {
        transform: translateY(-3px);
        box-shadow: var(--shadow-md);
        border-color: var(--green);
      }
      .cta-icon {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        flex-shrink: 0;
      }
      .cta-icon.g {
        background: var(--green-light);
        color: var(--green);
      }
      .cta-icon.b {
        background: #eff6ff;
        color: #2563eb;
      }
      .cta-icon.o {
        background: #fff7ed;
        color: #ea580c;
      }
      .cta-icon.p {
        background: #f5f3ff;
        color: #7c3aed;
      }
      .cta-label {
        font-size: 14px;
        font-weight: 600;
        color: var(--text);
        line-height: 1.3;
      }
      .cta-sub {
        font-size: 12px;
        color: var(--text-muted);
        line-height: 1.4;
      }

      /* ── SECTION HEADER ── */
      .sec-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 14px;
      }
      .sec-title {
        font-size: 16px;
        font-weight: 700;
        color: var(--text);
      }
      .sec-link {
        font-size: 13px;
        color: var(--green);
        font-weight: 500;
        text-decoration: none;
      }
      .sec-link:hover {
        text-decoration: underline;
      }

      /* ── REQUESTS TABLE ── */
      .requests-table {
        background: var(--white);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        overflow: hidden;
        box-shadow: var(--shadow-xs);
        margin-bottom: 28px;
      }
      .rt-row {
        display: grid;
        grid-template-columns: 2.2fr 1.4fr 1.2fr 1fr 1.1fr 0.6fr;
        align-items: center;
        padding: 0 22px;
        min-height: 58px;
        border-bottom: 1px solid var(--border-soft);
        gap: 12px;
        transition: background 0.15s;
      }
      .rt-row:last-child {
        border-bottom: none;
      }
      .rt-row.hdr {
        background: #fafafa;
        min-height: 44px;
        border-bottom: 1px solid var(--border);
      }
      .rt-row:not(.hdr):hover {
        background: var(--green-pale);
      }

      .rt-head {
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.7px;
        text-transform: uppercase;
        color: var(--text-soft);
      }
      .rt-cell {
        font-size: 13.5px;
        color: var(--text);
      }
      .rt-cell.muted {
        color: var(--text-muted);
        font-size: 12.5px;
      }
      .rt-cell.mono {
        font-family: var(--font-mono);
        font-size: 12px;
      }

      .svc-name-main {
        font-weight: 600;
        font-size: 13.5px;
        display: flex;
        align-items: center;
        gap: 6px;
      }
      .svc-sub {
        font-size: 11.5px;
        color: var(--text-muted);
        margin-top: 3px;
      }

      .status-dot {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 12px;
        font-weight: 600;
        padding: 4px 10px;
        border-radius: 50px;
      }
      .status-dot::before {
        content: "";
        width: 6px;
        height: 6px;
        border-radius: 50%;
        flex-shrink: 0;
      }
      .status-dot.active {
        background: #dcfce7;
        color: #166534;
      }
      .status-dot.active::before {
        background: #22c55e;
      }
      .status-dot.pending {
        background: #fef9c3;
        color: #854d0e;
      }
      .status-dot.pending::before {
        background: #eab308;
      }
      .status-dot.briefing {
        background: #eff6ff;
        color: #1d4ed8;
      }
      .status-dot.briefing::before {
        background: #3b82f6;
      }
      .status-dot.completed {
        background: #f3f4f6;
        color: #6b7280;
      }
      .status-dot.completed::before {
        background: #9ca3af;
      }

      .rt-action {
        background: none;
        border: 1.5px solid var(--border);
        border-radius: 8px;
        padding: 5px 12px;
        font-size: 12px;
        font-weight: 500;
        font-family: var(--font-body);
        color: var(--text);
        cursor: pointer;
        transition: all 0.18s;
        white-space: nowrap;
      }
      .rt-action:hover {
        border-color: var(--green);
        color: var(--green);
        background: var(--green-light);
      }

      /* ── LOWER GRID ── */
      .lower-grid {
        display: grid;
        grid-template-columns: 1fr 320px;
        gap: 20px;
        margin-bottom: 28px;
      }
      @media (max-width: 900px) {
        .lower-grid {
          grid-template-columns: 1fr;
        }
      }

      /* ── CARD ── */
      .card {
        background: var(--white);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        overflow: hidden;
        box-shadow: var(--shadow-xs);
      }
      .card-hdr {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 16px 22px;
        border-bottom: 1px solid var(--border);
      }
      .card-hdr-title {
        font-size: 15px;
        font-weight: 700;
      }
      .card-hdr-link {
        font-size: 12.5px;
        color: var(--green);
        font-weight: 500;
        text-decoration: none;
      }
      .card-hdr-link:hover {
        text-decoration: underline;
      }

      /* PROS LIST */
      .pro-item {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 13px 22px;
        border-bottom: 1px solid var(--border-soft);
        transition: background 0.15s;
      }
      .pro-item:last-child {
        border-bottom: none;
      }
      .pro-item:hover {
        background: var(--green-pale);
      }

      .pro-avatar {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        object-fit: cover;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 15px;
        font-weight: 700;
        background: var(--green-light);
        color: var(--green);
        border: 2px solid rgba(20, 138, 58, 0.15);
      }
      .pro-info {
        flex: 1;
        min-width: 0;
      }
      .pro-name {
        font-size: 14px;
        font-weight: 600;
      }
      .pro-role {
        font-size: 12px;
        color: var(--text-muted);
        margin-top: 2px;
      }
      .pro-meta {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-top: 4px;
      }
      .pro-rating {
        font-size: 12px;
        color: #f59e0b;
        font-weight: 600;
      }
      .pro-since {
        font-size: 11px;
        color: var(--text-soft);
        font-family: var(--font-mono);
      }
      .pro-badge {
        font-size: 11px;
        font-weight: 600;
        padding: 3px 9px;
        border-radius: 50px;
        flex-shrink: 0;
      }
      .pro-badge.active {
        background: #dcfce7;
        color: #166534;
      }
      .pro-badge.briefing {
        background: #eff6ff;
        color: #1d4ed8;
      }
      .pro-badge.review {
        background: #fef9c3;
        color: #854d0e;
      }
      .pro-badge.done {
        background: #f3f4f6;
        color: #6b7280;
      }

      /* BILLING */
      .pay-due-banner {
        background: linear-gradient(
          120deg,
          var(--green-dark),
          var(--green-mid)
        );
        border-radius: 12px;
        padding: 14px 18px;
        margin: 14px 22px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
      }
      .pdb-text {
        font-size: 13px;
        color: #fff;
        font-weight: 500;
      }
      .pdb-text strong {
        display: block;
        font-size: 18px;
        font-family: var(--font-mono);
        font-weight: 700;
        letter-spacing: 0.5px;
      }
      .pdb-btn {
        background: #fff;
        color: var(--green);
        border: none;
        border-radius: 8px;
        padding: 9px 18px;
        font-size: 13px;
        font-weight: 700;
        font-family: var(--font-body);
        cursor: pointer;
        white-space: nowrap;
        transition:
          transform 0.15s,
          box-shadow 0.15s;
      }
      .pdb-btn:hover {
        transform: scale(1.04);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
      }

      .bill-body {
        padding: 16px 22px;
      }
      .bill-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 9px 0;
        border-bottom: 1px solid var(--border-soft);
      }
      .bill-row:last-child {
        border-bottom: none;
      }
      .bill-label {
        font-size: 13px;
        color: var(--text-muted);
      }
      .bill-val {
        font-family: var(--font-mono);
        font-size: 14px;
        font-weight: 700;
        color: var(--text);
      }
      .bill-val.green {
        color: var(--green);
      }
      .bill-val.red {
        color: #dc2626;
      }

      /* ACTIVITY */
      .act-item {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        padding: 13px 22px;
        border-bottom: 1px solid var(--border-soft);
        transition: background 0.15s;
      }
      .act-item:last-child {
        border-bottom: none;
      }
      .act-item:hover {
        background: var(--green-pale);
      }
      .act-icon {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        flex-shrink: 0;
        margin-top: 1px;
      }
      .act-icon.g {
        background: var(--green-light);
        color: var(--green);
      }
      .act-icon.b {
        background: #eff6ff;
        color: #2563eb;
      }
      .act-icon.o {
        background: #fff7ed;
        color: #ea580c;
      }
      .act-icon.y {
        background: #fefce8;
        color: #ca8a04;
      }
      .act-body {
        flex: 1;
      }
      .act-text {
        font-size: 13px;
        color: var(--text);
        line-height: 1.55;
      }
      .act-time {
        font-size: 11px;
        color: var(--text-soft);
        margin-top: 4px;
        font-family: var(--font-mono);
      }

      /* EXPLORE SERVICES */
      .qs-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 14px;
        margin-bottom: 28px;
      }
      @media (max-width: 700px) {
        .qs-grid {
          grid-template-columns: repeat(2, 1fr);
        }
      }

      .qs-card {
        background: var(--white);
        border: 1.5px solid var(--border);
        border-radius: 14px;
        padding: 20px 16px 18px;
        text-align: center;
        cursor: pointer;
        transition: all 0.22s;
        box-shadow: var(--shadow-xs);
        position: relative;
        overflow: hidden;
      }
      .qs-card::after {
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: var(--green);
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.25s;
      }
      .qs-card:hover {
        border-color: var(--green);
        transform: translateY(-3px);
        box-shadow: var(--shadow-md);
      }
      .qs-card:hover::after {
        transform: scaleX(1);
      }

      .qs-emoji {
        font-size: 30px;
        margin-bottom: 10px;
        display: block;
      }
      .qs-name {
        font-size: 14px;
        font-weight: 700;
        margin-bottom: 5px;
        color: var(--text);
      }
      .qs-desc {
        font-size: 12px;
        color: var(--text-muted);
        line-height: 1.5;
      }
      .qs-tag {
        display: inline-block;
        margin-top: 10px;
        font-size: 10.5px;
        font-weight: 600;
        padding: 3px 9px;
        border-radius: 50px;
        background: var(--green-light);
        color: var(--green);
      }

      /* RESPONSIVE */
      @media (max-width: 900px) {
        .rt-row {
          grid-template-columns: 2fr 1fr 1fr;
        }
        .rt-row > *:nth-child(4),
        .rt-row > *:nth-child(5) {
          display: none;
        }
      }
      @media (max-width: 768px) {
        .page {
          padding: 20px 16px 40px;
        }
        .welcome-banner {
          padding: 24px 22px;
        }
        .wb-right {
          display: none;
        }
      }
      @media (max-width: 540px) {
        .rt-row {
          grid-template-columns: 2fr 1fr;
        }
        .rt-row > *:nth-child(3) {
          display: none;
        }
      }
    </style>
  </head>
  <body>
    <div class="page">
      <!-- ── WELCOME BANNER ── -->
      <div class="welcome-banner">
        <div class="wb-blobs">
          <div class="wb-blob wb-blob-1"></div>
          <div class="wb-blob wb-blob-2"></div>
          <div class="wb-blob wb-blob-3"></div>
        </div>
        <div class="wb-inner">
          <div class="wb-left">
            <div class="wb-greeting">👋 Welcome back,</div>
            <div class="wb-name">Rahul Kumar</div>
            <div class="wb-subtitle">
              You have <strong>2 active service requests</strong> in progress
              right now.<br />
              Your Globe Assist team is on the job!
            </div>
            <div class="wb-chips">
              <span class="wb-chip"
                ><i class="fas fa-building"></i> TravelEase Pvt. Ltd.</span
              >
              <span class="wb-chip"
                ><i class="fas fa-map-marker-alt"></i> New Delhi</span
              >
              <span class="wb-chip"
                ><i class="fas fa-calendar-check"></i> Member since Jan
                2025</span
              >
            </div>
          </div>
          <div class="wb-right">
            <div class="wb-stat-box">
              <div class="wb-stat-val">05</div>
              <div class="wb-stat-lbl">Total Requests</div>
            </div>
            <div class="wb-stat-box">
              <div class="wb-stat-val">02</div>
              <div class="wb-stat-lbl">Active Now</div>
            </div>
            <div class="wb-stat-box">
              <div class="wb-stat-val">12</div>
              <div class="wb-stat-lbl">Pros Hired</div>
            </div>
          </div>
        </div>
      </div>

      <!-- ── QUICK ACTION CTAs ── -->
      <div class="cta-strip">
        <div class="cta-card">
          <div class="cta-icon g"><i class="fas fa-plus"></i></div>
          <div>
            <div class="cta-label">New Request</div>
            <div class="cta-sub">Hire a professional for your business</div>
          </div>
        </div>
        <div class="cta-card">
          <div class="cta-icon b"><i class="fas fa-users"></i></div>
          <div>
            <div class="cta-label">My Team</div>
            <div class="cta-sub">View all assigned professionals</div>
          </div>
        </div>
        <div class="cta-card">
          <div class="cta-icon o">
            <i class="fas fa-file-invoice-dollar"></i>
          </div>
          <div>
            <div class="cta-label">Invoices</div>
            <div class="cta-sub">Download billing &amp; invoices</div>
          </div>
        </div>
        <div class="cta-card">
          <div class="cta-icon p"><i class="fas fa-headset"></i></div>
          <div>
            <div class="cta-label">Support</div>
            <div class="cta-sub">Talk to your account manager</div>
          </div>
        </div>
      </div>

      <!-- ── ACTIVE REQUESTS TABLE ── -->
      <div class="sec-header">
        <span class="sec-title">Active Service Requests</span>
        <a href="#" class="sec-link">View all requests →</a>
      </div>

      <div class="requests-table">
        <div class="rt-row hdr">
          <span class="rt-head">Service</span>
          <span class="rt-head">Assigned Professional</span>
          <span class="rt-head">Start Date</span>
          <span class="rt-head">Duration</span>
          <span class="rt-head">Status</span>
          <span class="rt-head"></span>
        </div>

        <div class="rt-row">
          <div class="rt-cell">
            <div class="svc-name-main">
              <i
                class="fas fa-phone-alt"
                style="color: #148a3a; font-size: 12px"
              ></i>
              Telecaller
            </div>
            <div class="svc-sub">Inbound Lead Handling · 3 Agents</div>
          </div>
          <div class="rt-cell">
            <div style="font-weight: 600; font-size: 13px">Priya Sharma +2</div>
            <div style="font-size: 11.5px; color: var(--text-muted)">
              Team of 3 agents
            </div>
          </div>
          <div class="rt-cell mono muted">01 Feb 2026</div>
          <div class="rt-cell muted">30 Days</div>
          <div class="rt-cell">
            <span class="status-dot active">Active</span>
          </div>
          <div class="rt-cell"><button class="rt-action">Details</button></div>
        </div>

        <div class="rt-row">
          <div class="rt-cell">
            <div class="svc-name-main">
              <i
                class="fas fa-map-marked-alt"
                style="color: #2563eb; font-size: 12px"
              ></i>
              Tour Manager
            </div>
            <div class="svc-sub">Rajasthan Circuit · 8-Day Tour</div>
          </div>
          <div class="rt-cell">
            <div style="font-weight: 600; font-size: 13px">Arjun Mehta</div>
            <div style="font-size: 11.5px; color: var(--text-muted)">
              Senior Tour Manager
            </div>
          </div>
          <div class="rt-cell mono muted">15 Mar 2026</div>
          <div class="rt-cell muted">8 Days</div>
          <div class="rt-cell">
            <span class="status-dot briefing">Briefing</span>
          </div>
          <div class="rt-cell"><button class="rt-action">Details</button></div>
        </div>

        <div class="rt-row">
          <div class="rt-cell">
            <div class="svc-name-main">
              <i
                class="fas fa-camera"
                style="color: #ea580c; font-size: 12px"
              ></i>
              Content Creator
            </div>
            <div class="svc-sub">Reels + Blog · Social Media Pack</div>
          </div>
          <div class="rt-cell">
            <div style="font-weight: 600; font-size: 13px">Sneha Verma</div>
            <div style="font-size: 11.5px; color: var(--text-muted)">
              Travel Content Specialist
            </div>
          </div>
          <div class="rt-cell mono muted">20 Feb 2026</div>
          <div class="rt-cell muted">15 Days</div>
          <div class="rt-cell">
            <span class="status-dot pending">In Review</span>
          </div>
          <div class="rt-cell"><button class="rt-action">Details</button></div>
        </div>

        <div class="rt-row">
          <div class="rt-cell">
            <div class="svc-name-main">
              <i
                class="fas fa-hard-hat"
                style="color: #7c3aed; font-size: 12px"
              ></i>
              Ground Operator
            </div>
            <div class="svc-sub">Kerala Backwaters · Logistics</div>
          </div>
          <div class="rt-cell">
            <div style="font-weight: 600; font-size: 13px">Ravi Nair</div>
            <div style="font-size: 11.5px; color: var(--text-muted)">
              Ground Operations Lead
            </div>
          </div>
          <div class="rt-cell mono muted">05 Jan 2026</div>
          <div class="rt-cell muted">10 Days</div>
          <div class="rt-cell">
            <span class="status-dot completed">Completed</span>
          </div>
          <div class="rt-cell"><button class="rt-action">Rate</button></div>
        </div>
      </div>

      <!-- ── LOWER SECTION ── -->
      <div class="lower-grid">
        <!-- Assigned Professionals -->
        <div class="card">
          <div class="card-hdr">
            <span class="card-hdr-title">Assigned Professionals</span>
            <a href="#" class="card-hdr-link">View all →</a>
          </div>

          <div class="pro-item">
            <div class="pro-avatar">PS</div>
            <div class="pro-info">
              <div class="pro-name">Priya Sharma</div>
              <div class="pro-role">Telecaller · Inbound Sales</div>
              <div class="pro-meta">
                <span class="pro-rating">★ 4.8</span>
                <span class="pro-since">Since 01 Feb</span>
              </div>
            </div>
            <span class="pro-badge active">Active</span>
          </div>

          <div class="pro-item">
            <div class="pro-avatar" style="background: #eff6ff; color: #2563eb">
              AM
            </div>
            <div class="pro-info">
              <div class="pro-name">Arjun Mehta</div>
              <div class="pro-role">Tour Manager · Senior</div>
              <div class="pro-meta">
                <span class="pro-rating">★ 4.9</span>
                <span class="pro-since">Starts 15 Mar</span>
              </div>
            </div>
            <span class="pro-badge briefing">Briefing</span>
          </div>

          <div class="pro-item">
            <div class="pro-avatar" style="background: #fff7ed; color: #ea580c">
              SV
            </div>
            <div class="pro-info">
              <div class="pro-name">Sneha Verma</div>
              <div class="pro-role">Content Creator · Travel &amp; Social</div>
              <div class="pro-meta">
                <span class="pro-rating">★ 4.7</span>
                <span class="pro-since">Since 20 Feb</span>
              </div>
            </div>
            <span class="pro-badge review">In Review</span>
          </div>

          <div class="pro-item">
            <div class="pro-avatar" style="background: #f5f3ff; color: #7c3aed">
              RN
            </div>
            <div class="pro-info">
              <div class="pro-name">Ravi Nair</div>
              <div class="pro-role">Ground Operator · Kerala</div>
              <div class="pro-meta">
                <span class="pro-rating">★ 5.0</span>
                <span class="pro-since">Completed</span>
              </div>
            </div>
            <span class="pro-badge done">Done</span>
          </div>
        </div>

        <!-- Right column: Billing + Activity -->
        <div style="display: flex; flex-direction: column; gap: 16px">
          <!-- Billing Summary -->
          <div class="card">
            <div class="card-hdr">
              <span class="card-hdr-title">Billing Summary</span>
              <a href="#" class="card-hdr-link">Invoices</a>
            </div>
            <div class="pay-due-banner">
              <div class="pdb-text">
                Amount Due
                <strong>₹18,500</strong>
              </div>
              <button class="pdb-btn">Pay Now</button>
            </div>
            <div class="bill-body">
              <div class="bill-row">
                <span class="bill-label">This Month (Feb)</span>
                <span class="bill-val">₹42,000</span>
              </div>
              <div class="bill-row">
                <span class="bill-label">Paid</span>
                <span class="bill-val green">₹23,500</span>
              </div>
              <div class="bill-row">
                <span class="bill-label">Pending</span>
                <span class="bill-val red">₹18,500</span>
              </div>
              <div class="bill-row">
                <span class="bill-label">Due Date</span>
                <span class="bill-val" style="font-size: 12.5px"
                  >15 Mar 2026</span
                >
              </div>
            </div>
          </div>

          <!-- Recent Activity -->
          <div class="card">
            <div class="card-hdr">
              <span class="card-hdr-title">Recent Activity</span>
            </div>
            <div class="act-item">
              <div class="act-icon g"><i class="fas fa-user-check"></i></div>
              <div class="act-body">
                <div class="act-text">
                  <strong>Arjun Mehta</strong> assigned to your Rajasthan Tour
                  request
                </div>
                <div class="act-time">Today, 11:30 AM</div>
              </div>
            </div>
            <div class="act-item">
              <div class="act-icon y"><i class="fas fa-file-alt"></i></div>
              <div class="act-body">
                <div class="act-text">
                  Sneha submitted content draft —
                  <strong>pending your review</strong>
                </div>
                <div class="act-time">Yesterday, 4:20 PM</div>
              </div>
            </div>
            <div class="act-item">
              <div class="act-icon b"><i class="fas fa-rupee-sign"></i></div>
              <div class="act-body">
                <div class="act-text">
                  Invoice ₹23,500 paid · Telecaller package Feb
                </div>
                <div class="act-time">2 days ago</div>
              </div>
            </div>
            <div class="act-item">
              <div class="act-icon o"><i class="fas fa-star"></i></div>
              <div class="act-body">
                <div class="act-text">
                  You rated Ravi Nair ★ 5.0 · Kerala Ground Ops
                </div>
                <div class="act-time">08 Feb 2026</div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- ── EXPLORE MORE SERVICES ── -->
      <div class="sec-header">
        <span class="sec-title">Explore More Services</span>
        <a href="#" class="sec-link">Browse all →</a>
      </div>
      <div class="qs-grid">
        <div class="qs-card">
          <span class="qs-emoji">📞</span>
          <div class="qs-name">Telecaller</div>
          <div class="qs-desc">
            Trained agents handling inbound &amp; outbound travel leads
          </div>
          <span class="qs-tag">Most Popular</span>
        </div>
        <div class="qs-card">
          <span class="qs-emoji">🗺️</span>
          <div class="qs-name">Tour Manager</div>
          <div class="qs-desc">
            On-ground management for domestic &amp; international circuits
          </div>
          <span class="qs-tag">Available Now</span>
        </div>
        <div class="qs-card">
          <span class="qs-emoji">🏕️</span>
          <div class="qs-name">Ground Operator</div>
          <div class="qs-desc">
            Local logistics, coordination &amp; guest management at destination
          </div>
          <span class="qs-tag">Pan India</span>
        </div>
        <div class="qs-card">
          <span class="qs-emoji">🎬</span>
          <div class="qs-name">Content Creator</div>
          <div class="qs-desc">
            Reels, blogs &amp; social media content for your travel brand
          </div>
          <span class="qs-tag">New</span>
        </div>
      </div>
    </div>
  </body>
</html>
