<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>My Services</title>
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
        --green-pale: #f4fbf6;
        --accent: #6cba0c;
        --text: #1a1a1a;
        --text-muted: #6b7280;
        --border: #e5e7eb;
        --border-soft: #f0f2f5;
        --bg: #f7f8fa;
        --white: #ffffff;
        --shadow-xs: 0 1px 3px rgba(0, 0, 0, 0.06);
        --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.07);
        --shadow-md: 0 6px 24px rgba(0, 0, 0, 0.09);
        --radius: 16px;
        --font-body: "DM Sans", sans-serif;
        --font-display: "Playfair Display", serif;
        --font-mono: "JetBrains Mono", monospace;
      }
      body {
        font-family: var(--font-body);
        background: var(--bg);
        color: var(--text);
      }
      .page {
        padding: 28px 32px 48px;
        max-width: 1060px;
      }

      /* ── PAGE TOP ── */
      .page-top {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        margin-bottom: 22px;
        gap: 16px;
        flex-wrap: wrap;
      }
      .page-title {
        font-family: var(--font-display);
        font-size: 26px;
        font-weight: 700;
      }
      .page-sub {
        font-size: 14px;
        color: var(--text-muted);
        margin-top: 4px;
      }

      .new-req-btn {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 10px 22px;
        background: var(--green);
        color: #fff;
        border: none;
        border-radius: 50px;
        cursor: pointer;
        font-family: var(--font-body);
        font-size: 14px;
        font-weight: 600;
        transition: background 0.2s;
        white-space: nowrap;
        flex-shrink: 0;
      }
      .new-req-btn:hover {
        background: #0f6b2c;
      }

      /* ── FILTER TABS ── */
      .filter-row {
        display: flex;
        gap: 8px;
        margin-bottom: 24px;
        flex-wrap: wrap;
      }
      .fr-tab {
        padding: 7px 16px;
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
      .fr-tab.active {
        border-color: var(--green);
        background: var(--green);
        color: #fff;
      }
      .fr-tab:hover:not(.active) {
        border-color: var(--green);
        color: var(--green);
      }

      /* ── ACTIVE FILTER BANNER ── */
      .filter-banner {
        display: none;
        align-items: center;
        gap: 10px;
        background: var(--green-light);
        border: 1px solid rgba(20, 138, 58, 0.2);
        border-radius: 10px;
        padding: 10px 16px;
        margin-bottom: 18px;
        font-size: 13.5px;
        color: var(--green);
        font-weight: 500;
      }
      .filter-banner.visible {
        display: flex;
      }
      .filter-banner i {
        font-size: 13px;
      }
      .fb-clear {
        margin-left: auto;
        background: none;
        border: none;
        font-size: 12px;
        color: var(--green);
        cursor: pointer;
        font-weight: 600;
        font-family: var(--font-body);
        text-decoration: underline;
        padding: 0;
      }

      /* ── EMPTY STATE ── */
      .empty-state {
        display: none;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 60px 24px;
      }
      .empty-state.visible {
        display: flex;
      }
      .empty-emoji {
        font-size: 52px;
        margin-bottom: 16px;
      }
      .empty-title {
        font-size: 18px;
        font-weight: 700;
        margin-bottom: 6px;
      }
      .empty-sub {
        font-size: 14px;
        color: var(--text-muted);
        max-width: 320px;
        line-height: 1.6;
      }
      .empty-btn {
        margin-top: 20px;
        padding: 10px 24px;
        background: var(--green);
        color: #fff;
        border: none;
        border-radius: 50px;
        font-family: var(--font-body);
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
      }
      .empty-btn:hover {
        background: #0f6b2c;
      }

      /* ── SERVICES GRID ── */
      .services-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(288px, 1fr));
        gap: 18px;
      }

      .svc-card {
        background: var(--white);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        overflow: hidden;
        box-shadow: var(--shadow-xs);
        transition:
          transform 0.22s,
          box-shadow 0.22s;
      }
      .svc-card:hover {
        transform: translateY(-3px);
        box-shadow: var(--shadow-md);
      }
      .svc-card[data-hidden="true"] {
        display: none;
      }

      /* Card image band */
      .svc-band {
        height: 112px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 46px;
        position: relative;
      }
      .svc-band.telecaller {
        background: linear-gradient(135deg, #e8f5ee, #d4eddf);
      }
      .svc-band.tour-manager {
        background: linear-gradient(135deg, #eff6ff, #dbeafe);
      }
      .svc-band.ground-operator {
        background: linear-gradient(135deg, #f5f3ff, #ddd6fe);
      }
      .svc-band.content-creator {
        background: linear-gradient(135deg, #fff7ed, #fed7aa);
      }
      .svc-band.visa {
        background: linear-gradient(135deg, #fefce8, #fde68a);
      }

      .svc-status-badge {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 11px;
        font-weight: 600;
        padding: 3px 10px;
        border-radius: 50px;
      }
      .svc-status-badge.active {
        background: #dcfce7;
        color: #166534;
      }
      .svc-status-badge.pending {
        background: #fef9c3;
        color: #854d0e;
      }
      .svc-status-badge.briefing {
        background: #eff6ff;
        color: #1d4ed8;
      }
      .svc-status-badge.review {
        background: #fff7ed;
        color: #c2410c;
      }
      .svc-status-badge.completed {
        background: #f3f4f6;
        color: #6b7280;
      }

      .svc-body {
        padding: 16px 18px;
      }

      .svc-type-row {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.7px;
        text-transform: uppercase;
        color: var(--text-muted);
        margin-bottom: 7px;
      }
      .svc-type-row i {
        font-size: 11px;
      }

      .svc-name {
        font-size: 15px;
        font-weight: 700;
        line-height: 1.4;
        margin-bottom: 12px;
        color: var(--text);
      }

      .svc-meta {
        display: flex;
        flex-direction: column;
        gap: 5px;
        margin-bottom: 14px;
      }
      .svc-meta-row {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 12.5px;
        color: var(--text-muted);
      }
      .svc-meta-row i {
        width: 14px;
        color: var(--green);
        font-size: 11px;
        text-align: center;
        flex-shrink: 0;
      }

      .svc-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-top: 12px;
        border-top: 1px solid var(--border-soft);
        gap: 8px;
      }
      .svc-price {
        font-family: var(--font-mono);
        font-size: 16px;
        font-weight: 700;
        color: var(--green);
      }
      .svc-price-lbl {
        font-size: 10.5px;
        color: var(--text-muted);
        display: block;
        margin-top: 1px;
        font-weight: 400;
      }

      .svc-actions {
        display: flex;
        gap: 7px;
      }
      .svc-btn {
        padding: 6px 13px;
        border: 1.5px solid var(--border);
        border-radius: 8px;
        background: none;
        font-family: var(--font-body);
        font-size: 12.5px;
        font-weight: 500;
        cursor: pointer;
        color: var(--text);
        transition: all 0.2s;
        white-space: nowrap;
      }
      .svc-btn:hover {
        border-color: var(--green);
        color: var(--green);
        background: var(--green-light);
      }
      .svc-btn.primary {
        background: var(--green);
        color: #fff;
        border-color: var(--green);
      }
      .svc-btn.primary:hover {
        background: #0f6b2c;
      }

      /* ── PRO CHIP ── */
      .pro-chip {
        display: flex;
        align-items: center;
        gap: 7px;
        padding: 5px 10px 5px 5px;
        background: var(--green-pale);
        border: 1px solid rgba(20, 138, 58, 0.15);
        border-radius: 50px;
        margin-bottom: 12px;
      }
      .pro-chip-avatar {
        width: 26px;
        height: 26px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 10px;
        font-weight: 700;
        background: var(--green-light);
        color: var(--green);
        flex-shrink: 0;
      }
      .pro-chip-name {
        font-size: 12px;
        font-weight: 600;
        color: var(--text);
      }
      .pro-chip-role {
        font-size: 10.5px;
        color: var(--text-muted);
      }
      .pro-chip-rating {
        font-size: 11px;
        color: #f59e0b;
        font-weight: 600;
        margin-left: auto;
      }

      @media (max-width: 600px) {
        .page {
          padding: 20px 16px 40px;
        }
      }
    </style>
  </head>
  <body>
    <div class="page">
      <div class="page-top">
        <div>
          <h1 class="page-title">My Services</h1>
          <p class="page-sub" id="pageSubtext">
            Manage all your active and past service requests
          </p>
        </div>
        <button class="new-req-btn">
          <i class="fas fa-plus"></i> New Request
        </button>
      </div>

      <!-- Status filter tabs -->
      <div class="filter-row">
        <button class="fr-tab active" onclick="filterStatus(this, 'all')">
          All
        </button>
        <button class="fr-tab" onclick="filterStatus(this, 'active')">
          Active
        </button>
        <button class="fr-tab" onclick="filterStatus(this, 'pending')">
          Pending
        </button>
        <button class="fr-tab" onclick="filterStatus(this, 'completed')">
          Completed
        </button>
      </div>

      <!-- Active type filter banner -->
      <div class="filter-banner" id="filterBanner">
        <i class="fas fa-filter"></i>
        <span id="filterBannerText">Showing: All</span>
        <button class="fb-clear" onclick="clearTypeFilter()">
          ✕ Clear filter
        </button>
      </div>

      <!-- Empty state -->
      <div class="empty-state" id="emptyState">
        <div class="empty-emoji">🔍</div>
        <div class="empty-title">No services found</div>
        <div class="empty-sub">
          No services match this filter. Try a different category or request a
          new service.
        </div>
        <button class="empty-btn" onclick="clearTypeFilter()">
          Clear Filter
        </button>
      </div>

      <!-- Cards Grid -->
      <div class="services-grid" id="servicesGrid">
        <!-- TELECALLER 1 -->
        <div class="svc-card" data-type="telecaller" data-status="active">
          <div class="svc-band telecaller">
            📞
            <span class="svc-status-badge active">Active</span>
          </div>
          <div class="svc-body">
            <div class="svc-type-row">
              <i class="fas fa-phone-alt" style="color: var(--green)"></i>
              Telecaller
            </div>
            <div class="svc-name">Inbound Lead Handling — 3 Agents</div>
            <div class="pro-chip">
              <div class="pro-chip-avatar">PS</div>
              <div>
                <div class="pro-chip-name">Priya Sharma +2</div>
                <div class="pro-chip-role">Team Lead</div>
              </div>
              <span class="pro-chip-rating">★ 4.8</span>
            </div>
            <div class="svc-meta">
              <div class="svc-meta-row">
                <i class="fas fa-calendar"></i> Started 01 Feb 2026
              </div>
              <div class="svc-meta-row">
                <i class="fas fa-clock"></i> 30 Days · Ends 02 Mar 2026
              </div>
              <div class="svc-meta-row">
                <i class="fas fa-users"></i> 3 Agents assigned
              </div>
            </div>
            <div class="svc-footer">
              <div>
                <span class="svc-price">₹18,000</span>
                <span class="svc-price-lbl">/ month</span>
              </div>
              <div class="svc-actions">
                <button class="svc-btn">Chat</button>
                <button class="svc-btn primary">Details</button>
              </div>
            </div>
          </div>
        </div>

        <!-- TOUR MANAGER -->
        <div class="svc-card" data-type="tour-manager" data-status="briefing">
          <div class="svc-band tour-manager">
            🗺️
            <span class="svc-status-badge briefing">Briefing</span>
          </div>
          <div class="svc-body">
            <div class="svc-type-row">
              <i class="fas fa-map-marked-alt" style="color: #2563eb"></i> Tour
              Manager
            </div>
            <div class="svc-name">Rajasthan Heritage Circuit — 8-Day Tour</div>
            <div
              class="pro-chip"
              style="background: #f0f7ff; border-color: rgba(37, 99, 235, 0.15)"
            >
              <div
                class="pro-chip-avatar"
                style="background: #eff6ff; color: #2563eb"
              >
                AM
              </div>
              <div>
                <div class="pro-chip-name">Arjun Mehta</div>
                <div class="pro-chip-role">Senior Tour Manager</div>
              </div>
              <span class="pro-chip-rating">★ 4.9</span>
            </div>
            <div class="svc-meta">
              <div class="svc-meta-row">
                <i class="fas fa-calendar"></i> Tour starts 15 Mar 2026
              </div>
              <div class="svc-meta-row">
                <i class="fas fa-clock"></i> 8 Days · Jaipur, Jodhpur, Udaipur
              </div>
              <div class="svc-meta-row">
                <i class="fas fa-users"></i> 24 Guests
              </div>
            </div>
            <div class="svc-footer">
              <div>
                <span class="svc-price">₹28,000</span>
                <span class="svc-price-lbl">for 8 days</span>
              </div>
              <div class="svc-actions">
                <button class="svc-btn">Itinerary</button>
                <button class="svc-btn primary">Details</button>
              </div>
            </div>
          </div>
        </div>

        <!-- CONTENT CREATOR -->
        <div class="svc-card" data-type="content-creator" data-status="review">
          <div class="svc-band content-creator">
            🎬
            <span class="svc-status-badge review">In Review</span>
          </div>
          <div class="svc-body">
            <div class="svc-type-row">
              <i class="fas fa-camera" style="color: #ea580c"></i> Content
              Creator
            </div>
            <div class="svc-name">Social Media Package — Reels + Blog</div>
            <div
              class="pro-chip"
              style="background: #fff9f5; border-color: rgba(234, 88, 12, 0.15)"
            >
              <div
                class="pro-chip-avatar"
                style="background: #fff7ed; color: #ea580c"
              >
                SV
              </div>
              <div>
                <div class="pro-chip-name">Sneha Verma</div>
                <div class="pro-chip-role">Travel Content Specialist</div>
              </div>
              <span class="pro-chip-rating">★ 4.7</span>
            </div>
            <div class="svc-meta">
              <div class="svc-meta-row">
                <i class="fas fa-calendar"></i> Started 20 Feb 2026
              </div>
              <div class="svc-meta-row">
                <i class="fas fa-clock"></i> 15 Days · 5 Reels + 3 Blogs
              </div>
              <div class="svc-meta-row">
                <i class="fas fa-file-alt"></i> Draft submitted — awaiting
                review
              </div>
            </div>
            <div class="svc-footer">
              <div>
                <span class="svc-price">₹9,500</span>
                <span class="svc-price-lbl">full package</span>
              </div>
              <div class="svc-actions">
                <button class="svc-btn">Review Draft</button>
                <button class="svc-btn primary">Details</button>
              </div>
            </div>
          </div>
        </div>

        <!-- GROUND OPERATOR (completed) -->
        <div
          class="svc-card"
          data-type="ground-operator"
          data-status="completed"
        >
          <div class="svc-band ground-operator">
            🏕️
            <span class="svc-status-badge completed">Completed</span>
          </div>
          <div class="svc-body">
            <div class="svc-type-row">
              <i class="fas fa-hard-hat" style="color: #7c3aed"></i> Ground
              Operator
            </div>
            <div class="svc-name">Kerala Backwaters Logistics — 10 Days</div>
            <div
              class="pro-chip"
              style="
                background: #fdf4ff;
                border-color: rgba(124, 58, 237, 0.15);
              "
            >
              <div
                class="pro-chip-avatar"
                style="background: #f5f3ff; color: #7c3aed"
              >
                RN
              </div>
              <div>
                <div class="pro-chip-name">Ravi Nair</div>
                <div class="pro-chip-role">Ground Operations Lead</div>
              </div>
              <span class="pro-chip-rating">★ 5.0</span>
            </div>
            <div class="svc-meta">
              <div class="svc-meta-row">
                <i class="fas fa-calendar"></i> 05–15 Jan 2026
              </div>
              <div class="svc-meta-row">
                <i class="fas fa-map-marker-alt"></i> Alleppey, Kumarakom,
                Munnar
              </div>
              <div class="svc-meta-row">
                <i class="fas fa-star" style="color: #f59e0b"></i> You rated ★
                5.0
              </div>
            </div>
            <div class="svc-footer">
              <div>
                <span class="svc-price">₹22,000</span>
                <span class="svc-price-lbl">10 days</span>
              </div>
              <div class="svc-actions">
                <button class="svc-btn">Invoice</button>
                <button class="svc-btn primary">Details</button>
              </div>
            </div>
          </div>
        </div>

        <!-- TELECALLER 2 (completed) -->
        <div class="svc-card" data-type="telecaller" data-status="completed">
          <div class="svc-band telecaller">
            📞
            <span class="svc-status-badge completed">Completed</span>
          </div>
          <div class="svc-body">
            <div class="svc-type-row">
              <i class="fas fa-phone-alt" style="color: var(--green)"></i>
              Telecaller
            </div>
            <div class="svc-name">Outbound Campaign — Goa Winter Package</div>
            <div class="pro-chip">
              <div class="pro-chip-avatar">MK</div>
              <div>
                <div class="pro-chip-name">Mohit Kapoor</div>
                <div class="pro-chip-role">Telecaller Agent</div>
              </div>
              <span class="pro-chip-rating">★ 4.6</span>
            </div>
            <div class="svc-meta">
              <div class="svc-meta-row">
                <i class="fas fa-calendar"></i> Dec 2025 · 15 Days
              </div>
              <div class="svc-meta-row">
                <i class="fas fa-chart-line"></i> 320 calls · 42 leads converted
              </div>
              <div class="svc-meta-row">
                <i class="fas fa-star" style="color: #f59e0b"></i> You rated ★
                4.6
              </div>
            </div>
            <div class="svc-footer">
              <div>
                <span class="svc-price">₹9,000</span>
                <span class="svc-price-lbl">15 days</span>
              </div>
              <div class="svc-actions">
                <button class="svc-btn">Report</button>
                <button class="svc-btn primary">Details</button>
              </div>
            </div>
          </div>
        </div>

        <!-- VISA -->
        <div class="svc-card" data-type="visa" data-status="active">
          <div class="svc-band visa">
            📋
            <span class="svc-status-badge active">Active</span>
          </div>
          <div class="svc-body">
            <div class="svc-type-row">
              <i class="fas fa-passport" style="color: #ca8a04"></i> Visa
              Assistance
            </div>
            <div class="svc-name">Schengen Visa — Italy (Group of 8)</div>
            <div
              class="pro-chip"
              style="background: #fefce8; border-color: rgba(202, 138, 4, 0.2)"
            >
              <div
                class="pro-chip-avatar"
                style="background: #fef9c3; color: #ca8a04"
              >
                DG
              </div>
              <div>
                <div class="pro-chip-name">Deepa Gupta</div>
                <div class="pro-chip-role">Visa Consultant</div>
              </div>
              <span class="pro-chip-rating">★ 4.9</span>
            </div>
            <div class="svc-meta">
              <div class="svc-meta-row">
                <i class="fas fa-calendar"></i> Applied 28 Feb 2026
              </div>
              <div class="svc-meta-row">
                <i class="fas fa-clock"></i> Processing · 8 Applicants
              </div>
              <div class="svc-meta-row">
                <i class="fas fa-info-circle"></i> Documents verified ✓
              </div>
            </div>
            <div class="svc-footer">
              <div>
                <span class="svc-price">₹12,000</span>
                <span class="svc-price-lbl">8 applicants</span>
              </div>
              <div class="svc-actions">
                <button class="svc-btn">Track</button>
                <button class="svc-btn primary">Details</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /services-grid -->
    </div>

    <script>
      // ── State ──
      let activeTypeFilter = "all";
      let activeStatusFilter = "all";

      // ── Filter by STATUS tab ──
      function filterStatus(btn, status) {
        document
          .querySelectorAll(".fr-tab")
          .forEach((t) => t.classList.remove("active"));
        btn.classList.add("active");
        activeStatusFilter = status;
        applyFilters();
      }

      // ── Filter by TYPE (from header pill via postMessage or hash) ──
      function applyTypeFilter(type) {
        activeTypeFilter = type;
        const labels = {
          all: "All Services",
          telecaller: "Telecaller",
          "tour-manager": "Tour Manager",
          "ground-operator": "Ground Operator",
          "content-creator": "Content Creator",
          visa: "Visa Assistance",
        };
        const banner = document.getElementById("filterBanner");
        const bannerText = document.getElementById("filterBannerText");

        if (type && type !== "all") {
          bannerText.textContent = "Showing: " + (labels[type] || type);
          banner.classList.add("visible");
        } else {
          banner.classList.remove("visible");
        }
        applyFilters();
      }

      function clearTypeFilter() {
        applyTypeFilter("all");
        // Notify parent to reset pill
        try {
          window.parent.postMessage({ clearFilter: true }, "*");
        } catch (e) {}
      }

      // ── Core filter logic ──
      function applyFilters() {
        const cards = document.querySelectorAll(".svc-card");
        let visible = 0;

        cards.forEach((card) => {
          const typeMatch =
            activeTypeFilter === "all" ||
            card.dataset.type === activeTypeFilter;
          const statusMatch =
            activeStatusFilter === "all" ||
            card.dataset.status === activeStatusFilter ||
            (activeStatusFilter === "active" &&
              ["active", "briefing", "review"].includes(card.dataset.status));
          const show = typeMatch && statusMatch;
          card.style.display = show ? "" : "none";
          if (show) visible++;
        });

        // Show empty state if nothing visible
        const emptyState = document.getElementById("emptyState");
        const grid = document.getElementById("servicesGrid");
        if (visible === 0) {
          emptyState.classList.add("visible");
          grid.style.display = "none";
        } else {
          emptyState.classList.remove("visible");
          grid.style.display = "";
        }
      }

      // ── Listen for postMessage from parent (dashboard.html) ──
      window.addEventListener("message", (e) => {
        if (e.data && e.data.filterType) {
          applyTypeFilter(e.data.filterType);
        }
        if (e.data && e.data.clearFilter) {
          applyTypeFilter("all");
        }
      });

      // ── Also read hash from URL (fallback) ──
      function readHashFilter() {
        const hash = window.location.hash.replace("#", "");
        if (hash && hash !== "all") {
          applyTypeFilter(hash);
        }
      }

      // Init
      readHashFilter();
    </script>
  </body>
</html>
