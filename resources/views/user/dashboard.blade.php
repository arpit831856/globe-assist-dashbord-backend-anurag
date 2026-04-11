<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Globe Assist — Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;1,9..40,400&family=Playfair+Display:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap"
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
        --sidebar-w: 260px;
        --sidebar-collapsed: 72px;
        --header-h: 64px;
        --green: #148a3a;
        --green-light: #e8f5ee;
        --green-mid: #1fa84f;
        --accent: #6cba0c;
        --text: #1a1a1a;
        --text-muted: #6b7280;
        --border: #e5e7eb;
        --bg: #f7f8fa;
        --white: #ffffff;
        --shadow-sm: 0 1px 4px rgba(0, 0, 0, 0.07);
        --shadow-md: 0 4px 20px rgba(0, 0, 0, 0.09);
        --shadow-lg: 0 8px 40px rgba(0, 0, 0, 0.13);
        --shadow-xl: 0 20px 60px rgba(0, 0, 0, 0.16);
        --radius: 14px;
        --transition: 0.28s cubic-bezier(0.4, 0, 0.2, 1);
        --font-body: "DM Sans", sans-serif;
        --font-display: "Playfair Display", serif;
        --font-mono: "JetBrains Mono", monospace;
      }

      body {
        font-family: var(--font-body);
        background: var(--bg);
        color: var(--text);
        overflow: hidden;
        height: 100vh;
      }

      /* ─── SIDEBAR ─── */
      .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        bottom: 0;
        width: var(--sidebar-w);
        background: var(--white);
        border-right: 1px solid var(--border);
        display: flex;
        flex-direction: column;
        z-index: 500;
        transition:
          width var(--transition),
          transform var(--transition);
        overflow: hidden;
      }
      .sidebar.collapsed {
        width: var(--sidebar-collapsed);
      }

      @media (max-width: 768px) {
        .sidebar {
          width: var(--sidebar-w);
          transform: translateX(-100%);
          box-shadow: var(--shadow-lg);
        }
        .sidebar.mobile-open {
          transform: translateX(0);
        }
      }

      .sb-logo {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 0 20px;
        height: var(--header-h);
        border-bottom: 1px solid var(--border);
        flex-shrink: 0;
        overflow: hidden;
        white-space: nowrap;
      }
      .sb-logo-icon {
        width: 36px;
        height: 36px;
        background: linear-gradient(135deg, var(--green), var(--accent));
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        font-size: 18px;
        color: #fff;
      }
      .sb-logo-text {
        font-family: var(--font-display);
        font-size: 18px;
        font-weight: 600;
        color: var(--green);
        transition:
          opacity var(--transition),
          width var(--transition);
      }
      .sidebar.collapsed .sb-logo-text {
        opacity: 0;
        width: 0;
        pointer-events: none;
      }

      .sb-nav {
        flex: 1;
        overflow-y: auto;
        overflow-x: hidden;
        padding: 16px 0;
      }
      .sb-nav::-webkit-scrollbar {
        width: 4px;
      }
      .sb-nav::-webkit-scrollbar-thumb {
        background: var(--border);
        border-radius: 2px;
      }

      .sb-section-label {
        font-size: 10px;
        font-weight: 600;
        letter-spacing: 1.2px;
        text-transform: uppercase;
        color: var(--text-muted);
        padding: 16px 20px 6px;
        white-space: nowrap;
        transition: opacity var(--transition);
      }
      .sidebar.collapsed .sb-section-label {
        opacity: 0;
      }

      .sb-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 11px 20px;
        cursor: pointer;
        transition:
          background var(--transition),
          color var(--transition);
        color: var(--text-muted);
        font-size: 14.5px;
        font-weight: 500;
        white-space: nowrap;
        position: relative;
        text-decoration: none;
        border: none;
        background: none;
        width: 100%;
        text-align: left;
      }
      .sb-item:hover {
        background: var(--green-light);
        color: var(--green);
      }
      .sb-item.active {
        background: var(--green-light);
        color: var(--green);
        font-weight: 600;
      }
      .sb-item.active::before {
        content: "";
        position: absolute;
        left: 0;
        top: 6px;
        bottom: 6px;
        width: 3px;
        background: var(--green);
        border-radius: 0 3px 3px 0;
      }
      .sb-item-icon {
        width: 36px;
        height: 36px;
        border-radius: 9px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 15px;
        flex-shrink: 0;
        background: transparent;
        transition: background var(--transition);
      }
      .sb-item:hover .sb-item-icon,
      .sb-item.active .sb-item-icon {
        background: rgba(20, 138, 58, 0.12);
        color: var(--green);
      }
      .sb-item-label {
        flex: 1;
        transition:
          opacity var(--transition),
          width var(--transition);
      }
      .sidebar.collapsed .sb-item-label {
        opacity: 0;
        width: 0;
        overflow: hidden;
      }

      .sb-badge {
        background: var(--green);
        color: #fff;
        font-size: 10px;
        font-weight: 700;
        padding: 2px 6px;
        border-radius: 50px;
        font-family: var(--font-mono);
        flex-shrink: 0;
        transition: opacity var(--transition);
      }
      .sidebar.collapsed .sb-badge {
        opacity: 0;
      }

      .sb-toggle {
        border-top: 1px solid var(--border);
        padding: 14px 20px;
        flex-shrink: 0;
      }
      .sb-toggle-btn {
        display: flex;
        align-items: center;
        gap: 10px;
        background: var(--green-light);
        border: none;
        border-radius: 10px;
        padding: 10px 14px;
        cursor: pointer;
        font-size: 13.5px;
        font-weight: 500;
        font-family: var(--font-body);
        color: var(--green);
        width: 100%;
        transition: background var(--transition);
        white-space: nowrap;
        overflow: hidden;
      }
      .sb-toggle-btn:hover {
        background: #d4eddf;
      }
      .sb-toggle-btn i {
        font-size: 14px;
        flex-shrink: 0;
        transition: transform var(--transition);
      }
      .sidebar.collapsed .sb-toggle-btn i {
        transform: rotate(180deg);
      }
      .sb-toggle-label {
        transition: opacity var(--transition);
      }
      .sidebar.collapsed .sb-toggle-label {
        opacity: 0;
        width: 0;
        overflow: hidden;
      }

      /* ─── HEADER ─── */
      .header {
        position: fixed;
        top: 0;
        left: var(--sidebar-w);
        right: 0;
        height: var(--header-h);
        background: var(--white);
        border-bottom: 1px solid var(--border);
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 20px;
        z-index: 400;
        transition: left var(--transition);
        gap: 12px;
      }
      .sidebar.collapsed ~ .header {
        left: var(--sidebar-collapsed);
      }
      @media (max-width: 768px) {
        .header {
          left: 0 !important;
        }
      }

      /* Service pills */
      .header-services {
        display: flex;
        align-items: center;
        gap: 7px;
        flex: 1;
        overflow-x: auto;
        scrollbar-width: none;
        min-width: 0;
      }
      .header-services::-webkit-scrollbar {
        display: none;
      }

      .svc-pill {
        display: flex;
        align-items: center;
        gap: 5px;
        padding: 6px 13px;
        border-radius: 50px;
        border: 1.5px solid var(--border);
        background: var(--white);
        font-size: 13px;
        font-weight: 500;
        color: var(--text);
        cursor: pointer;
        white-space: nowrap;
        transition: all 0.2s;
        text-decoration: none;
        flex-shrink: 0;
      }
      .svc-pill:hover {
        border-color: var(--green);
        color: var(--green);
        background: var(--green-light);
      }
      .svc-pill.active {
        border-color: var(--green);
        background: var(--green);
        color: #fff;
      }
      .svc-pill i {
        font-size: 11px;
      }

      /* Header right */
      .header-right {
        display: flex;
        align-items: center;
        gap: 8px;
        flex-shrink: 0;
      }

      .hdr-icon-btn {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        border: 1.5px solid var(--border);
        background: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 15px;
        color: var(--text-muted);
        position: relative;
        transition: all 0.2s;
      }
      .hdr-icon-btn:hover {
        border-color: var(--green);
        color: var(--green);
        background: var(--green-light);
      }

      .hdr-badge {
        position: absolute;
        top: 4px;
        right: 4px;
        width: 8px;
        height: 8px;
        border-radius: 50%;
        border: 2px solid #fff;
      }
      .hdr-badge.red {
        background: #ef4444;
      }
      .hdr-badge.green {
        background: #22c55e;
      }

      .hdr-menu-btn {
        display: none;
        width: 38px;
        height: 38px;
        border-radius: 10px;
        border: 1.5px solid var(--border);
        background: none;
        cursor: pointer;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        color: var(--text);
      }
      @media (max-width: 768px) {
        .hdr-menu-btn {
          display: flex;
        }
      }

      /* ─── PROFILE DROPDOWN ─── */
      .hdr-profile-wrap {
        position: relative;
      }

      .hdr-profile {
        display: flex;
        align-items: center;
        gap: 9px;
        cursor: pointer;
        padding: 4px 10px 4px 4px;
        border-radius: 50px;
        border: 1.5px solid var(--border);
        transition: all 0.2s;
        user-select: none;
      }
      .hdr-profile:hover {
        border-color: var(--green);
        background: var(--green-light);
      }
      .hdr-profile.open {
        border-color: var(--green);
        background: var(--green-light);
      }

      .hdr-avatar {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid var(--green-light);
        flex-shrink: 0;
      }
      .hdr-profile-info {
        display: flex;
        flex-direction: column;
      }
      .hdr-profile-name {
        font-size: 13px;
        font-weight: 600;
        color: var(--text);
        line-height: 1.2;
      }
      .hdr-profile-role {
        font-size: 11px;
        color: var(--text-muted);
      }
      .hdr-profile-chevron {
        font-size: 10px;
        color: var(--text-muted);
        transition: transform 0.22s;
      }
      .hdr-profile.open .hdr-profile-chevron {
        transform: rotate(180deg);
      }
      @media (max-width: 480px) {
        .hdr-profile-info {
          display: none;
        }
      }

      /* Profile Dropdown Modal */
      .profile-dropdown {
        position: absolute;
        top: calc(100% + 10px);
        right: 0;
        width: 230px;
        background: var(--white);
        border: 1px solid var(--border);
        border-radius: 16px;
        box-shadow: var(--shadow-xl);
        z-index: 9999;
        overflow: hidden;
        opacity: 0;
        visibility: hidden;
        transform: translateY(-8px) scale(0.97);
        transition:
          opacity 0.2s,
          transform 0.2s,
          visibility 0.2s;
        pointer-events: none;
      }
      .profile-dropdown.open {
        opacity: 1;
        visibility: visible;
        transform: translateY(0) scale(1);
        pointer-events: auto;
      }
      /* Arrow */
      .profile-dropdown::before {
        content: "";
        position: absolute;
        top: -6px;
        right: 18px;
        width: 12px;
        height: 12px;
        background: var(--white);
        border-left: 1px solid var(--border);
        border-top: 1px solid var(--border);
        transform: rotate(45deg);
        border-radius: 2px;
      }

      .pd-header {
        display: flex;
        align-items: center;
        gap: 11px;
        padding: 16px 16px 14px;
        background: linear-gradient(135deg, #f4fbf6, #e8f5ee);
        border-bottom: 1px solid var(--border);
      }
      .pd-avatar {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid var(--green);
        flex-shrink: 0;
      }
      .pd-name {
        font-size: 14px;
        font-weight: 700;
        color: var(--text);
        line-height: 1.3;
      }
      .pd-email {
        font-size: 11.5px;
        color: var(--text-muted);
        margin-top: 2px;
      }

      .pd-body {
        padding: 6px 0;
      }

      .pd-item {
        display: flex;
        align-items: center;
        gap: 11px;
        padding: 10px 16px;
        color: #333;
        font-size: 14px;
        text-decoration: none;
        font-family: var(--font-body);
        cursor: pointer;
        border: none;
        background: none;
        width: 100%;
        text-align: left;
        transition:
          background 0.15s,
          padding-left 0.15s;
      }
      .pd-item:hover {
        background: #f5fdf7;
        padding-left: 20px;
        color: var(--green);
      }
      .pd-item:hover .pd-icon {
        color: var(--green);
      }

      .pd-icon {
        width: 30px;
        height: 30px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
        flex-shrink: 0;
        transition: background 0.15s;
      }
      .pd-icon.g {
        background: var(--green-light);
        color: var(--green);
      }
      .pd-icon.b {
        background: #eff6ff;
        color: #2563eb;
      }
      .pd-icon.o {
        background: #fff7ed;
        color: #ea580c;
      }
      .pd-icon.p {
        background: #f5f3ff;
        color: #7c3aed;
      }

      .pd-divider {
        height: 1px;
        background: var(--border);
        margin: 4px 0;
      }

      .pd-item.logout {
        color: #dc2626;
      }
      .pd-item.logout:hover {
        background: #fff5f5;
        color: #dc2626;
      }
      .pd-item.logout .pd-icon {
        background: #fee2e2;
        color: #dc2626;
      }

      /* ─── NOTIFICATION PANEL ─── */
      .notif-panel {
        position: absolute;
        top: calc(100% + 10px);
        right: 0;
        width: 340px;
        background: var(--white);
        border: 1px solid var(--border);
        border-radius: 16px;
        box-shadow: var(--shadow-xl);
        z-index: 9999;
        overflow: hidden;
        opacity: 0;
        visibility: hidden;
        transform: translateY(-8px) scale(0.97);
        transition:
          opacity 0.2s,
          transform 0.2s,
          visibility 0.2s;
        pointer-events: none;
      }
      .notif-panel.open {
        opacity: 1;
        visibility: visible;
        transform: translateY(0) scale(1);
        pointer-events: auto;
      }
      .notif-panel::before {
        content: "";
        position: absolute;
        top: -6px;
        right: 14px;
        width: 12px;
        height: 12px;
        background: var(--white);
        border-left: 1px solid var(--border);
        border-top: 1px solid var(--border);
        transform: rotate(45deg);
        border-radius: 2px;
      }

      .np-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 14px 16px 12px;
        border-bottom: 1px solid var(--border);
      }
      .np-title {
        font-size: 15px;
        font-weight: 700;
      }
      .np-mark {
        font-size: 12px;
        color: var(--green);
        font-weight: 500;
        cursor: pointer;
        background: none;
        border: none;
        font-family: var(--font-body);
      }
      .np-mark:hover {
        text-decoration: underline;
      }

      .np-item {
        display: flex;
        gap: 11px;
        align-items: flex-start;
        padding: 13px 16px;
        border-bottom: 1px solid #f5f5f5;
        transition: background 0.15s;
        cursor: pointer;
      }
      .np-item:last-child {
        border-bottom: none;
      }
      .np-item:hover {
        background: #fafcfa;
      }
      .np-item.unread {
        background: #fafff9;
      }

      .np-dot {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: var(--green);
        flex-shrink: 0;
        margin-top: 6px;
      }
      .np-dot.read {
        background: #d1d5db;
      }

      .np-icon {
        width: 34px;
        height: 34px;
        border-radius: 9px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        flex-shrink: 0;
      }
      .np-icon.g {
        background: var(--green-light);
        color: var(--green);
      }
      .np-icon.b {
        background: #eff6ff;
        color: #2563eb;
      }
      .np-icon.o {
        background: #fff7ed;
        color: #ea580c;
      }

      .np-text {
        font-size: 13px;
        line-height: 1.5;
        color: var(--text);
        flex: 1;
      }
      .np-time {
        font-size: 10.5px;
        color: var(--text-muted);
        margin-top: 3px;
        font-family: var(--font-mono);
      }

      .np-footer {
        padding: 11px 16px;
        border-top: 1px solid var(--border);
        text-align: center;
      }
      .np-footer a {
        font-size: 13px;
        color: var(--green);
        font-weight: 500;
        text-decoration: none;
      }
      .np-footer a:hover {
        text-decoration: underline;
      }

      /* ─── CHAT PANEL ─── */
      .chat-panel-wrap {
        position: relative;
      }

      .chat-panel {
        position: absolute;
        top: calc(100% + 10px);
        right: 0;
        width: 320px;
        background: var(--white);
        border: 1px solid var(--border);
        border-radius: 16px;
        box-shadow: var(--shadow-xl);
        z-index: 9999;
        overflow: hidden;
        opacity: 0;
        visibility: hidden;
        transform: translateY(-8px) scale(0.97);
        transition:
          opacity 0.2s,
          transform 0.2s,
          visibility 0.2s;
        pointer-events: none;
      }
      .chat-panel.open {
        opacity: 1;
        visibility: visible;
        transform: translateY(0) scale(1);
        pointer-events: auto;
      }
      .chat-panel::before {
        content: "";
        position: absolute;
        top: -6px;
        right: 14px;
        width: 12px;
        height: 12px;
        background: var(--white);
        border-left: 1px solid var(--border);
        border-top: 1px solid var(--border);
        transform: rotate(45deg);
        border-radius: 2px;
      }

      .cp-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 14px 16px 12px;
        border-bottom: 1px solid var(--border);
      }
      .cp-title {
        font-size: 15px;
        font-weight: 700;
      }
      .cp-sub {
        font-size: 11px;
        color: var(--text-muted);
        margin-top: 2px;
      }

      .cp-item {
        display: flex;
        gap: 11px;
        align-items: center;
        padding: 12px 16px;
        border-bottom: 1px solid #f5f5f5;
        cursor: pointer;
        transition: background 0.15s;
      }
      .cp-item:last-child {
        border-bottom: none;
      }
      .cp-item:hover {
        background: #fafcfa;
      }

      .cp-avatar {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        font-weight: 700;
        flex-shrink: 0;
        background: var(--green-light);
        color: var(--green);
        position: relative;
      }
      .cp-online {
        position: absolute;
        bottom: 1px;
        right: 1px;
        width: 9px;
        height: 9px;
        background: #22c55e;
        border-radius: 50%;
        border: 1.5px solid #fff;
      }
      .cp-info {
        flex: 1;
        min-width: 0;
      }
      .cp-name {
        font-size: 13.5px;
        font-weight: 600;
      }
      .cp-msg {
        font-size: 12px;
        color: var(--text-muted);
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        margin-top: 2px;
      }
      .cp-time {
        font-size: 10.5px;
        color: var(--text-soft, #9ca3af);
        font-family: var(--font-mono);
        flex-shrink: 0;
      }
      .cp-unread-badge {
        background: var(--green);
        color: #fff;
        font-size: 10px;
        font-weight: 700;
        min-width: 18px;
        height: 18px;
        border-radius: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0 5px;
        font-family: var(--font-mono);
      }

      .cp-footer {
        padding: 11px 16px;
        border-top: 1px solid var(--border);
        text-align: center;
      }
      .cp-footer a {
        font-size: 13px;
        color: var(--green);
        font-weight: 500;
        text-decoration: none;
      }
      .cp-footer a:hover {
        text-decoration: underline;
      }

      /* ─── CONTENT AREA ─── */
      .content-area {
        position: fixed;
        top: var(--header-h);
        left: var(--sidebar-w);
        right: 0;
        bottom: 0;
        transition: left var(--transition);
        overflow: hidden;
      }
      .sidebar.collapsed ~ .header ~ .content-area {
        left: var(--sidebar-collapsed);
      }
      @media (max-width: 768px) {
        .content-area {
          left: 0 !important;
        }
      }

      .content-frame {
        width: 100%;
        height: 100%;
        border: none;
        background: var(--bg);
      }

      /* MOBILE OVERLAY */
      .mob-overlay {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.4);
        z-index: 499;
        backdrop-filter: blur(2px);
      }
      .mob-overlay.active {
        display: block;
      }
    </style>
  </head>
  <body>
    <!-- ─── SIDEBAR ─── -->
    <aside class="sidebar" id="sidebar">
      <div class="sb-logo">
        <div class="sb-logo-icon"><i class="fas fa-globe"></i></div>
        <span class="sb-logo-text">Globe Assist</span>
      </div>

      <nav class="sb-nav">
        <div class="sb-section-label">Main</div>

        <button
          class="sb-item active"
          onclick="loadPage('{{ route('user.overview') }}', this)"
          title="Overview"
        >
          <span class="sb-item-icon"><i class="fas fa-home"></i></span>
          <span class="sb-item-label">Overview</span>
        </button>

       <button
    class="sb-item"
    onclick="loadPage('{{ route('user.services') }}', this)"
    title="Services"
>
    <span class="sb-item-icon"><i class="fas fa-concierge-bell"></i></span>
    <span class="sb-item-label">Services</span>
</button>

        <button
          class="sb-item"
          onclick="loadPage('{{ route('user.notifications') }}', this)"
          title="Notifications"
        >
          <span class="sb-item-icon"><i class="fas fa-bell"></i></span>
          <span class="sb-item-label">Notifications</span>
          <span class="sb-badge">3</span>
        </button>
        <button
          class="sb-item"
          onclick="loadPage('{{ route('user.payments') }}', this)"
          title="Payment"
        >
          <span class="sb-item-icon"><i class="fas fa-credit-card"></i></span>
          <span class="sb-item-label">Payment</span>
        </button>

        <div class="sb-section-label">Account</div>

        <button
          class="sb-item"
          onclick="loadPage('{{ route('user.profile') }}', this)"
          title="Profile"
        >
          <span class="sb-item-icon"><i class="fas fa-user-circle"></i></span>
          <span class="sb-item-label">Profile</span>
        </button>

        <button
          class="sb-item"
          onclick="loadPage('{{ route('user.change-password') }}', this)"
          title="Change Password"
        >
          <span class="sb-item-icon"><i class="fas fa-lock"></i></span>
          <span class="sb-item-label">Change Password</span>
        </button>

        <button
          class="sb-item"
          onclick="loadPage('{{ route('user.support') }}', this)"
          title="Support"
        >
          <span class="sb-item-icon"><i class="fas fa-life-ring"></i></span>
          <span class="sb-item-label">Support</span>
        </button>
      </nav>

      <div class="sb-toggle">
        <button
          class="sb-toggle-btn"
          id="sidebarToggle"
          onclick="toggleSidebar()"
        >
          <i class="fas fa-chevron-left"></i>
          <span class="sb-toggle-label">Collapse</span>
        </button>
      </div>
    </aside>

    <!-- ─── HEADER ─── -->
    <header class="header" id="header">
      <button class="hdr-menu-btn" onclick="toggleMobileSidebar()">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Service Pills -->
      <div class="header-services">
        <a
          href="#"
          class="svc-pill active"
          data-filter="all"
          onclick="
            handlePill(this, 'all', '{{ route('user.overview') }}');
            return false;
          "
        >
          <i class="fas fa-th-large"></i> All Services
        </a>
        <a
          href="#"
          class="svc-pill"
          data-filter="telecaller"
        
          onclick="handlePill(this, 'telecaller', '{{ route('user.services') }}'); return false;"
        >
          <i class="fas fa-phone-alt"></i> Telecaller
        </a>
        <a
          href="#"
          class="svc-pill"
          data-filter="tour-manager"
          onclick="
            handlePill(this, 'tour-manager');
            return false;
          "
        >
          <i class="fas fa-map-marked-alt"></i> Tour Manager
        </a>
        <a
          href="#"
          class="svc-pill"
          data-filter="ground-operator"
          onclick="
            handlePill(this, 'ground-operator');
            return false;
          "
        >
          <i class="fas fa-hard-hat"></i> Ground Operator
        </a>
        <a
          href="#"
          class="svc-pill"
          data-filter="content-creator"
          onclick="
            handlePill(this, 'content-creator');
            return false;
          "
        >
          <i class="fas fa-camera"></i> Content Creator
        </a>
        <a
          href="#"
          class="svc-pill"
          data-filter="visa"
          onclick="
            handlePill(this, 'visa');
            return false;
          "
        >
          <i class="fas fa-passport"></i> Visa Assistance
        </a>
      </div>

      <!-- Right Controls -->
      <div class="header-right">
        <!-- Chat Button -->
        <div class="chat-panel-wrap" id="chatWrap">
          <button
            class="hdr-icon-btn"
            title="Messages"
            onclick="togglePanel('chat')"
          >
            <i class="fas fa-comment-dots"></i>
            <span class="hdr-badge green"></span>
          </button>

          <!-- Chat Dropdown -->
          <div class="chat-panel" id="chatPanel">
            <div class="cp-header">
              <div>
                <div class="cp-title">Messages</div>
                <div class="cp-sub">2 active conversations</div>
              </div>
            </div>

            <div class="cp-item">
              <div class="cp-avatar">
                PS
                <span class="cp-online"></span>
              </div>
              <div class="cp-info">
                <div class="cp-name">Priya Sharma</div>
                <div class="cp-msg">
                  Call logs for today have been updated...
                </div>
              </div>
              <div
                style="
                  display: flex;
                  flex-direction: column;
                  align-items: flex-end;
                  gap: 5px;
                "
              >
                <span class="cp-time">11:32</span>
                <span class="cp-unread-badge">2</span>
              </div>
            </div>

            <div class="cp-item">
              <div
                class="cp-avatar"
                style="background: #eff6ff; color: #2563eb"
              >
                AM
              </div>
              <div class="cp-info">
                <div class="cp-name">Arjun Mehta</div>
                <div class="cp-msg">
                  Rajasthan itinerary shared, please review
                </div>
              </div>
              <div
                style="
                  display: flex;
                  flex-direction: column;
                  align-items: flex-end;
                  gap: 5px;
                "
              >
                <span class="cp-time">09:15</span>
                <span class="cp-unread-badge">1</span>
              </div>
            </div>

            <div class="cp-item">
              <div
                class="cp-avatar"
                style="background: #fff7ed; color: #ea580c"
              >
                GA
              </div>
              <div class="cp-info">
                <div class="cp-name">Globe Assist Support</div>
                <div class="cp-msg">Your request has been assigned!</div>
              </div>
              <div>
                <span class="cp-time">Yesterday</span>
              </div>
            </div>

            <div class="cp-footer">
              <a href="#">Open all messages →</a>
            </div>
          </div>
        </div>

        <!-- Notification Button -->
        <div style="position: relative" id="notifWrap">
          <button
            class="hdr-icon-btn"
            title="Notifications"
            onclick="togglePanel('notif')"
          >
            <i class="fas fa-bell"></i>
            <span class="hdr-badge red"></span>
          </button>

          <!-- Notification Dropdown -->
          <div class="notif-panel" id="notifPanel">
            <div class="np-header">
              <span class="np-title">Notifications</span>
              <button class="np-mark">Mark all read</button>
            </div>

            <div class="np-item unread">
              <div class="np-dot"></div>
              <div class="np-icon g"><i class="fas fa-user-check"></i></div>
              <div>
                <div class="np-text">
                  <strong>Arjun Mehta</strong> assigned to your Rajasthan Tour
                  request
                </div>
                <div class="np-time">Today, 11:30 AM</div>
              </div>
            </div>

            <div class="np-item unread">
              <div class="np-dot"></div>
              <div class="np-icon o"><i class="fas fa-file-alt"></i></div>
              <div>
                <div class="np-text">
                  Sneha submitted a content draft —
                  <strong>awaiting your review</strong>
                </div>
                <div class="np-time">Yesterday, 4:20 PM</div>
              </div>
            </div>

            <div class="np-item unread">
              <div class="np-dot"></div>
              <div class="np-icon b"><i class="fas fa-rupee-sign"></i></div>
              <div>
                <div class="np-text">
                  Invoice ₹23,500 paid · Telecaller package
                </div>
                <div class="np-time">2 days ago</div>
              </div>
            </div>

            <div class="np-item">
              <div class="np-dot read"></div>
              <div class="np-icon g"><i class="fas fa-star"></i></div>
              <div>
                <div class="np-text">
                  Ravi Nair completed Kerala Ground Ops ★ 5.0
                </div>
                <div class="np-time">08 Feb 2026</div>
              </div>
            </div>

            <div class="np-footer">
              <a
                href="#"
                onclick="
                  loadPage('dash-notifications.html', null);
                  closeAllPanels();
                  return false;
                "
              >
                View all notifications →
              </a>
            </div>
          </div>
        </div>

        <!-- Profile -->
        <div class="hdr-profile-wrap" id="profileWrap">
          <div
            class="hdr-profile"
            id="profileTrigger"
            onclick="togglePanel('profile')"
          >
            <img
              class="hdr-avatar"
              src="https://globeassist.in/assets/unsplash_ig.png"
              alt="Rahul Kumar"
              onerror="
                this.src =
                  'https://ui-avatars.com/api/?name=Rahul+Kumar&background=148a3a&color=fff'
              "
            />
            <div class="hdr-profile-info">
              <span class="hdr-profile-name">Rahul Kumar</span>
              <span class="hdr-profile-role">Client</span>
            </div>
            <i class="fas fa-chevron-down hdr-profile-chevron"></i>
          </div>

          <!-- Profile Dropdown -->
          <div class="profile-dropdown" id="profileDropdown">
            <div class="pd-header">
              <img
                class="pd-avatar"
                src="https://globeassist.in/assets/unsplash_ig.png"
                alt="Rahul Kumar"
                onerror="
                  this.src =
                    'https://ui-avatars.com/api/?name=Rahul+Kumar&background=148a3a&color=fff'
                "
              />
              <div>
                <div class="pd-name">Rahul Kumar</div>
                <div class="pd-email">rahul@travelease.in</div>
              </div>
            </div>

            <div class="pd-body">
              <button
                class="pd-item"
                onclick="loadPageFromDropdown('{{ route('user.profile') }}')"
              >
                <span class="pd-icon g"
                  ><i class="fas fa-user-circle"></i
                ></span>
                My Profile
              </button>
              <button
                class="pd-item"
                onclick="loadPageFromDropdown('{{ route('user.services') }}')"
              >
                <span class="pd-icon b"
                  ><i class="fas fa-concierge-bell"></i
                ></span>
                My Services
              </button>
              <button
                class="pd-item"
                onclick="loadPageFromDropdown('{{ route('user.payments') }}')"
              >
                <span class="pd-icon o"
                  ><i class="fas fa-credit-card"></i
                ></span>
                Billing & Payments
              </button>
              <button
                class="pd-item"
                onclick="loadPageFromDropdown('{{ route('user.support') }}')"
              >
                <span class="pd-icon p"><i class="fas fa-headset"></i></span>
                Support
              </button>

              <div class="pd-divider"></div>

              <button
                class="pd-item logout"
                onclick="window.location.href = '{{ route('logout') }}'"
              >
                <span
                  class="pd-icon"
                  style="background: #fee2e2; color: #dc2626"
                  ><i class="fas fa-sign-out-alt"></i
                ></span>
                Logout
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- /header-right -->
    </header>

    <!-- ─── CONTENT FRAME ─── -->
    <div class="content-area" id="contentArea">
      <iframe
        class="content-frame"
        id="contentFrame"
        src="{{ route('user.overview') }}"
        title="Dashboard Content"
      ></iframe>
    </div>

    <!-- Mobile Overlay -->
    <div
      class="mob-overlay"
      id="mobOverlay"
      onclick="toggleMobileSidebar()"
    ></div>

    <script>
      /* ── SIDEBAR ── */
      const sidebar = document.getElementById("sidebar");
      const contentArea = document.getElementById("contentArea");
      let isCollapsed = false;

      function toggleSidebar() {
        isCollapsed = !isCollapsed;
        sidebar.classList.toggle("collapsed", isCollapsed);
        contentArea.style.left = isCollapsed
          ? "var(--sidebar-collapsed)"
          : "var(--sidebar-w)";
        document.getElementById("header").style.left = isCollapsed
          ? "var(--sidebar-collapsed)"
          : "var(--sidebar-w)";
      }

      function toggleMobileSidebar() {
        sidebar.classList.toggle("mobile-open");
        document.getElementById("mobOverlay").classList.toggle("active");
        document.body.style.overflow = sidebar.classList.contains("mobile-open")
          ? "hidden"
          : "";
      }

      /* ── PAGE LOAD ── */
      function loadPage(url, btn) {
        document.getElementById("contentFrame").src = url;
        if (btn) {
          document
            .querySelectorAll(".sb-item")
            .forEach((i) => i.classList.remove("active"));
          btn.classList.add("active");
        }
        if (window.innerWidth <= 768) {
          sidebar.classList.remove("mobile-open");
          document.getElementById("mobOverlay").classList.remove("active");
          document.body.style.overflow = "";
        }
        closeAllPanels();
      }

      function loadPageFromDropdown(url) {
        document.getElementById("contentFrame").src = url;
        // Sync sidebar active state
        const map = {
          "dash-profile.html": 4,
          "dash-services.html": 1,
          "dash-payment.html": 3,
          "dash-support.html": 6,
        };
        const items = document.querySelectorAll(".sb-item");
        items.forEach((i) => i.classList.remove("active"));
        const idx = map[url];
        if (idx !== undefined && items[idx]) items[idx].classList.add("active");
        closeAllPanels();
      }

      /* ── SERVICE PILL → FILTER ── */
     function handlePill(element, filter, url) {
    // 1. Iframe ka source change karein
    if(url) {
        document.getElementById('contentFrame').src = url;
    }

    // 2. Pill ka active class manage karein
    document.querySelectorAll('.svc-pill').forEach(pill => pill.classList.remove('active'));
    element.classList.add('active');

    // 3. Agar aapka koi filtering logic hai toh wo yahan aayega
    console.log("Filtering for: " + filter);
}

      /* ── PANELS (chat, notif, profile) ── */
      let openPanel = null;

      function togglePanel(name) {
        const ids = {
          chat: { panel: "chatPanel", trigger: null },
          notif: { panel: "notifPanel", trigger: null },
          profile: { panel: "profileDropdown", trigger: "profileTrigger" },
        };

        const all = ["chatPanel", "notifPanel", "profileDropdown"];

        if (openPanel === name) {
          closeAllPanels();
          return;
        }

        // Close all first
        all.forEach((id) => {
          document.getElementById(id).classList.remove("open");
        });
        document.getElementById("profileTrigger").classList.remove("open");

        // Open target
        document.getElementById(ids[name].panel).classList.add("open");
        if (name === "profile") {
          document.getElementById("profileTrigger").classList.add("open");
        }
        openPanel = name;
      }

      function closeAllPanels() {
        ["chatPanel", "notifPanel", "profileDropdown"].forEach((id) => {
          document.getElementById(id).classList.remove("open");
        });
        document.getElementById("profileTrigger").classList.remove("open");
        openPanel = null;
      }

      // Close on outside click
      document.addEventListener("click", (e) => {
        const containers = ["chatWrap", "notifWrap", "profileWrap"];
        const clickedInside = containers.some((id) =>
          document.getElementById(id).contains(e.target),
        );
        if (!clickedInside) closeAllPanels();
      });

      // Resize handler
      window.addEventListener("resize", () => {
        if (window.innerWidth > 768) {
          sidebar.classList.remove("mobile-open");
          document.getElementById("mobOverlay").classList.remove("active");
          document.body.style.overflow = "";
        }
      });
    </script>
  </body>
</html>
