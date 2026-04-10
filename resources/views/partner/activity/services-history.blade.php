<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GlobeAssist — My Services</title>
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
      /* ==================== SERVICES-SPECIFIC STYLES ==================== */
      .sv-setup {
        background: var(--white);
        border-radius: var(--radius-2xl);
        padding: 70px 40px;
        text-align: center;
        box-shadow: var(--shadow-md);
        border: 1px solid var(--gray-200);
      }
      .sv-setup-icon {
        width: 76px;
        height: 76px;
        background: var(--blue-50);
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        font-size: 32px;
        color: var(--blue-600);
        border: 1px solid var(--blue-100);
      }
      .sv-setup h2 {
        font-family: var(--font-display);
        font-size: 21px;
        color: var(--blue-950);
        margin-bottom: 10px;
        font-weight: 700;
      }
      .sv-setup p {
        color: var(--gray-400);
        font-size: 14px;
        margin: 0 auto 28px;
        max-width: 380px;
        line-height: 1.65;
      }
      .sv-setup-btn {
        background: var(--blue-600);
        color: #fff;
        border: none;
        padding: 14px 32px;
        border-radius: var(--radius-md);
        font-size: 15px;
        font-weight: 700;
        cursor: pointer;
        transition: 0.2s;
        font-family: var(--font-display);
      }
      .sv-setup-btn:hover {
        background: var(--accent-hover);
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(35, 64, 168, 0.3);
      }

      .sv-topbar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 20px;
        gap: 14px;
        flex-wrap: wrap;
      }
      .sv-topbar-left h2 {
        font-family: var(--font-display);
        font-size: 21px;
        color: var(--blue-950);
        font-weight: 700;
        letter-spacing: -0.3px;
      }
      .sv-topbar-left p {
        font-size: 13px;
        color: var(--gray-400);
        margin-top: 2px;
      }
      .sv-topbar-right {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
      }
      .sv-btn {
        padding: 10px 18px;
        border-radius: var(--radius-sm);
        border: none;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: 0.2s;
        display: flex;
        align-items: center;
        gap: 7px;
        font-family: var(--font-body);
      }
      .sv-btn-outline {
        background: var(--white);
        color: var(--gray-700);
        border: 1.5px solid var(--gray-200);
      }
      .sv-btn-outline:hover {
        border-color: var(--blue-400);
        color: var(--blue-600);
      }
      .sv-btn-primary {
        background: var(--blue-600);
        color: #fff;
      }
      .sv-btn-primary:hover {
        background: var(--accent-hover);
        transform: translateY(-1px);
        box-shadow: 0 6px 16px rgba(35, 64, 168, 0.3);
      }

      .sv-pcard {
        background: var(--white);
        border-radius: var(--radius-xl);
        box-shadow: var(--shadow-md);
        margin-bottom: 22px;
        overflow: hidden;
        border: 1px solid var(--gray-200);
      }
      .sv-pcard-top {
        padding: 24px 26px 20px;
        display: flex;
        align-items: flex-start;
        gap: 20px;
        border-bottom: 1px solid var(--gray-100);
        flex-wrap: wrap;
      }
      .sv-pcard-avatar {
        width: 82px;
        height: 82px;
        border-radius: var(--radius-md);
        object-fit: cover;
        border: 2px solid var(--blue-100);
        flex-shrink: 0;
      }
      .sv-pcard-avatar-ph {
        width: 82px;
        height: 82px;
        border-radius: var(--radius-md);
        background: var(--blue-50);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        color: var(--blue-500);
        flex-shrink: 0;
        border: 2px solid var(--blue-100);
      }
      .sv-pcard-info {
        flex: 1;
        min-width: 180px;
      }
      .sv-pcard-info h3 {
        font-family: var(--font-display);
        font-size: 18px;
        font-weight: 700;
        color: var(--blue-950);
        margin-bottom: 5px;
      }
      .sv-pcard-bio {
        font-size: 14px;
        color: var(--gray-500);
        line-height: 1.55;
        margin-bottom: 10px;
      }
      .sv-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 6px;
      }
      .sv-tag {
        background: var(--blue-50);
        color: var(--blue-600);
        padding: 4px 11px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        border: 1px solid var(--blue-100);
        font-family: var(--font-display);
      }
      .sv-pcard-rating {
        text-align: right;
        flex-shrink: 0;
      }
      .sv-rating-big {
        font-family: var(--font-display);
        font-size: 38px;
        font-weight: 800;
        color: var(--blue-950);
        line-height: 1;
        letter-spacing: -1px;
      }
      .sv-stars {
        color: #f59e0b;
        font-size: 14px;
        margin: 4px 0;
      }
      .sv-rating-count {
        font-size: 12px;
        color: var(--gray-400);
      }
      .sv-pcard-meta {
        display: grid;
        grid-template-columns: repeat(6, 1fr);
        gap: 0;
        border-top: 1px solid var(--gray-100);
      }
      .sv-meta-col {
        padding: 16px 14px;
        border-right: 1px solid var(--gray-100);
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        gap: 5px;
        transition: all 0.2s;
        background: var(--white);
      }
      .sv-meta-col:hover {
        background: var(--blue-50);
      }
      .sv-meta-col:last-child {
        border-right: none;
      }
      .sv-meta-col i {
        color: var(--blue-500);
        font-size: 18px;
        width: 24px;
        flex-shrink: 0;
      }
      .sv-meta-lbl {
        font-size: 10px;
        color: var(--gray-400);
        text-transform: uppercase;
        letter-spacing: 0.8px;
        font-weight: 700;
        font-family: var(--font-display);
      }
      .sv-meta-val {
        font-size: 13px;
        font-weight: 700;
        color: var(--blue-950);
        font-family: var(--font-display);
      }

      .sv-sec-hdr {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        margin-bottom: 14px;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 26px;
      }
      .sv-sec-title {
        font-family: var(--font-display);
        font-size: 17px;
        font-weight: 700;
        color: var(--blue-950);
      }
      .sv-sec-sub {
        font-size: 13px;
        color: var(--gray-400);
        margin-top: 2px;
      }
      .sv-link-btn {
        font-size: 14px;
        color: var(--blue-600);
        font-weight: 600;
        cursor: pointer;
        background: none;
        border: none;
        padding: 0;
        transition: 0.2s;
      }
      .sv-link-btn:hover {
        color: var(--accent-hover);
      }

      .sv-gallery {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 10px;
      }
      .sv-gitem {
        border-radius: var(--radius-md);
        overflow: hidden;
        aspect-ratio: 1;
        background: var(--gray-200);
        position: relative;
        cursor: pointer;
      }
      .sv-gitem img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: 0.3s;
      }
      .sv-gitem:hover img {
        transform: scale(1.08);
      }
      .sv-gitem-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.5), transparent);
        opacity: 0;
        transition: 0.3s;
        display: flex;
        align-items: flex-end;
        padding: 8px;
      }
      .sv-gitem:hover .sv-gitem-overlay {
        opacity: 1;
      }
      .sv-gitem-overlay span {
        color: #fff;
        font-size: 12px;
        font-weight: 600;
      }
      .sv-gitem-del {
        position: absolute;
        top: 6px;
        right: 6px;
        width: 24px;
        height: 24px;
        background: rgba(220, 38, 38, 0.85);
        border-radius: 6px;
        display: none;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 11px;
        cursor: pointer;
        z-index: 2;
      }
      .sv-gitem:hover .sv-gitem-del {
        display: flex;
      }
      .sv-gitem-overlay-count {
        position: absolute;
        inset: 0;
        background: rgba(14, 21, 71, 0.65);
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: var(--radius-md);
        cursor: pointer;
        color: #fff;
        font-size: 22px;
        font-weight: 800;
        flex-direction: column;
        gap: 4px;
        font-family: var(--font-display);
      }
      .sv-gitem-overlay-count span {
        font-size: 12px;
        font-weight: 500;
        opacity: 0.85;
      }
      .sv-gadd {
        border: 2px dashed var(--gray-300);
        border-radius: var(--radius-md);
        aspect-ratio: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 7px;
        cursor: pointer;
        color: var(--gray-400);
        font-size: 13px;
        transition: 0.22s;
        position: relative;
        overflow: hidden;
        font-family: var(--font-display);
      }
      .sv-gadd:hover {
        border-color: var(--blue-400);
        color: var(--blue-500);
        background: var(--blue-50);
      }
      .sv-gadd i {
        font-size: 22px;
      }
      .sv-gadd input {
        position: absolute;
        inset: 0;
        opacity: 0;
        cursor: pointer;
      }

      .sv-service-row {
        background: var(--white);
        border-radius: var(--radius-xl);
        box-shadow: var(--shadow-md);
        margin-bottom: 22px;
        overflow: hidden;
        transition:
          box-shadow 0.3s,
          transform 0.3s;
        border: 1px solid var(--gray-200);
      }
      .sv-service-row:hover {
        box-shadow: var(--shadow-xl);
        transform: translateY(-3px);
      }
      .sv-row-main {
        display: flex;
        min-height: 290px;
      }
      .sv-row-imgblock {
        width: 360px;
        flex-shrink: 0;
        position: relative;
        overflow: hidden;
        background: var(--blue-950);
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
      }
      .sv-row-imgblock img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        display: block;
      }
      .sv-row-imgblock:hover img {
        transform: scale(1.06);
      }
      .sv-row-imgblock .no-img-icon {
        font-size: 52px;
        color: rgba(255, 255, 255, 0.1);
      }
      .sv-row-img-grad {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 55%;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.7), transparent);
        pointer-events: none;
      }
      .sv-row-img-hover {
        position: absolute;
        inset: 0;
        background: rgba(14, 21, 71, 0.35);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s;
        color: #fff;
        gap: 8px;
      }
      .sv-row-img-hover i {
        font-size: 28px;
      }
      .sv-row-img-hover span {
        font-size: 13px;
        font-weight: 700;
        font-family: var(--font-display);
      }
      .sv-row-imgblock:hover .sv-row-img-hover {
        opacity: 1;
      }
      .sv-row-badges {
        position: absolute;
        top: 14px;
        left: 14px;
        right: 14px;
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
      }
      .sv-row-cat {
        background: rgba(14, 21, 71, 0.65);
        color: #fff;
        font-size: 11px;
        padding: 4px 12px;
        border-radius: 30px;
        font-weight: 700;
        backdrop-filter: blur(8px);
        font-family: var(--font-display);
      }
      .sv-row-status {
        padding: 4px 12px;
        border-radius: 30px;
        font-size: 11px;
        font-weight: 800;
        backdrop-filter: blur(8px);
        font-family: var(--font-display);
      }
      .sv-row-status.active {
        background: rgba(5, 150, 105, 0.9);
        color: #fff;
      }
      .sv-row-status.pending {
        background: rgba(217, 119, 6, 0.9);
        color: #fff;
      }
      .sv-row-img-count {
        position: absolute;
        bottom: 12px;
        left: 14px;
        background: rgba(14, 21, 71, 0.6);
        color: #fff;
        font-size: 11px;
        padding: 4px 10px;
        border-radius: 20px;
        font-weight: 600;
        backdrop-filter: blur(6px);
        display: flex;
        align-items: center;
        gap: 5px;
        font-family: var(--font-mono);
      }
      .sv-row-info {
        flex: 1;
        min-width: 0;
        display: flex;
        flex-direction: column;
      }
      .sv-row-info-body {
        flex: 1;
        padding: 24px 28px 18px;
        display: flex;
        flex-direction: column;
      }
      .sv-row-title-row {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 12px;
        margin-bottom: 10px;
      }
      .sv-row-info-body h3 {
        font-family: var(--font-display);
        font-size: 19px;
        font-weight: 800;
        color: var(--blue-950);
        line-height: 1.25;
        letter-spacing: -0.3px;
      }
      .sv-row-del-btn {
        width: 36px;
        height: 36px;
        border-radius: var(--radius-sm);
        border: none;
        background: var(--danger-bg);
        color: var(--danger);
        font-size: 13px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: 0.2s;
        flex-shrink: 0;
      }
      .sv-row-del-btn:hover {
        background: var(--danger);
        color: #fff;
      }
      .sv-row-desc {
        font-size: 14px;
        color: var(--gray-500);
        line-height: 1.7;
        margin-bottom: 18px;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
      }
      .sv-row-pills {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-bottom: 14px;
      }
      .sv-row-pill {
        display: flex;
        align-items: center;
        gap: 9px;
        background: var(--gray-100);
        border: 1px solid var(--gray-200);
        border-radius: var(--radius-sm);
        padding: 8px 13px;
        transition: 0.2s;
      }
      .sv-row-pill:hover {
        background: var(--blue-50);
        border-color: var(--blue-100);
      }
      .sv-row-pill-icon {
        width: 30px;
        height: 30px;
        border-radius: 7px;
        background: var(--blue-50);
        color: var(--blue-600);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
        flex-shrink: 0;
      }
      .sv-row-pill-lbl {
        font-size: 10px;
        color: var(--gray-400);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-weight: 700;
        font-family: var(--font-display);
      }
      .sv-row-pill-val {
        font-size: 13px;
        font-weight: 700;
        color: var(--blue-950);
        margin-top: 1px;
        font-family: var(--font-display);
      }
      .sv-row-highlights {
        display: flex;
        flex-wrap: wrap;
        gap: 7px;
        margin-bottom: 14px;
      }
      .sv-hl {
        background: var(--blue-50);
        color: var(--blue-700);
        padding: 5px 13px;
        border-radius: 30px;
        font-size: 12px;
        font-weight: 700;
        border: 1px solid var(--blue-100);
        font-family: var(--font-display);
      }
      .sv-row-info-footer {
        padding: 16px 28px;
        border-top: 1px solid var(--gray-100);
        background: var(--gray-100);
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 14px;
        flex-wrap: wrap;
      }
      .sv-row-price {
        font-family: var(--font-display);
        font-size: 27px;
        font-weight: 900;
        color: var(--blue-700);
        letter-spacing: -0.5px;
      }
      .sv-row-price-unit {
        font-size: 13px;
        color: var(--gray-400);
      }
      .sv-row-price-note {
        font-size: 11px;
        color: var(--gray-400);
        margin-top: 2px;
      }
      .sv-row-thumbs {
        padding: 13px 28px;
        border-top: 1px solid var(--gray-100);
        background: var(--white);
        display: flex;
        align-items: center;
        gap: 12px;
      }
      .sv-row-thumb-label {
        font-size: 10px;
        color: var(--gray-400);
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        flex-shrink: 0;
        font-family: var(--font-display);
      }
      .sv-row-thumbs-list {
        display: flex;
        gap: 7px;
        overflow-x: auto;
        flex: 1;
        padding-bottom: 2px;
      }
      .sv-row-thumbs-list::-webkit-scrollbar {
        height: 3px;
      }
      .sv-row-thumbs-list::-webkit-scrollbar-track {
        background: var(--gray-100);
      }
      .sv-row-thumbs-list::-webkit-scrollbar-thumb {
        background: var(--blue-300);
        border-radius: 10px;
      }
      .sv-row-thumb {
        width: 64px;
        height: 64px;
        border-radius: var(--radius-sm);
        object-fit: cover;
        cursor: pointer;
        transition: 0.25s;
        flex-shrink: 0;
        border: 2px solid transparent;
      }
      .sv-row-thumb:hover {
        border-color: var(--blue-500);
        transform: scale(1.08);
      }
      .sv-empty {
        text-align: center;
        padding: 52px 20px;
        color: var(--gray-400);
        background: var(--white);
        border-radius: var(--radius-lg);
        border: 1px solid var(--gray-200);
      }
      .sv-empty i {
        font-size: 42px;
        display: block;
        margin-bottom: 14px;
        color: var(--gray-300);
      }
      .sv-empty h4 {
        font-size: 15px;
        color: var(--gray-500);
        margin-bottom: 5px;
        font-family: var(--font-display);
        font-weight: 600;
      }

      /* Gallery All Modal */
      #galleryAllModal .modal-box {
        max-width: 860px;
      }
      .gallery-all-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        gap: 10px;
      }
      .gallery-all-item {
        border-radius: var(--radius-md);
        overflow: hidden;
        aspect-ratio: 1;
        background: var(--gray-200);
        cursor: pointer;
        position: relative;
      }
      .gallery-all-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: 0.3s;
      }
      .gallery-all-item:hover img {
        transform: scale(1.07);
      }
      .gallery-all-item-del {
        position: absolute;
        top: 6px;
        right: 6px;
        width: 24px;
        height: 24px;
        background: rgba(220, 38, 38, 0.85);
        border-radius: 6px;
        display: none;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 11px;
        cursor: pointer;
      }
      .gallery-all-item:hover .gallery-all-item-del {
        display: flex;
      }

      .img-prev {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-top: 12px;
      }
      .img-prev img {
        width: 62px;
        height: 62px;
        border-radius: var(--radius-sm);
        object-fit: cover;
      }

      @media (max-width: 1024px) {
        .sv-pcard-meta {
          grid-template-columns: repeat(3, 1fr);
        }
        .sv-gallery {
          grid-template-columns: repeat(4, 1fr);
        }
      }
      @media (max-width: 768px) {
        .sv-row-main {
          flex-direction: column;
        }
        .sv-row-imgblock {
          width: 100%;
          min-height: 210px;
        }
        .sv-pcard-top {
          flex-direction: column;
        }
        .sv-pcard-meta {
          grid-template-columns: repeat(3, 1fr);
        }
        .sv-gallery {
          grid-template-columns: repeat(3, 1fr);
        }
        .sv-topbar {
          flex-direction: column;
          align-items: flex-start;
          gap: 12px;
        }
        .sv-topbar-right {
          width: 100%;
        }
        .sv-btn {
          flex: 1;
          justify-content: center;
        }
      }
      @media (max-width: 599px) {
        .sv-setup {
          padding: 40px 22px;
        }
        .sv-pcard-meta {
          grid-template-columns: repeat(2, 1fr);
        }
        .sv-gallery {
          grid-template-columns: repeat(2, 1fr);
        }
        .sv-row-info-body {
          padding: 18px 16px 14px;
        }
        .sv-row-thumbs {
          padding: 12px 16px;
        }
        .sv-row-info-footer {
          padding: 14px 16px;
        }
        .sv-row-price {
          font-size: 22px;
        }
        .gallery-all-grid {
          grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
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


      <!-- Setup Screen -->
      <div id="svSetup" class="sv-setup">
        <div class="sv-setup-icon"><i class="fa fa-store"></i></div>
        <h2>Set Up Your Partner Profile</h2>
        <p>
          Tell clients who you are, what services you offer, where you work, and
          how much you charge — all in one professional dashboard.
        </p>
        <button class="sv-setup-btn" onclick="openProfileModal()">
          <i class="fa fa-plus"></i>&nbsp; Create Partner Profile
        </button>
      </div>

      <!-- Main Dashboard (hidden until profile saved) -->
      <div id="svDashboard" style="display: none">
        <div class="sv-topbar">
          <div class="sv-topbar-left">
            <h2 id="dash-name">Partner Dashboard</h2>
            <p id="dash-tagline">Your services at a glance</p>
          </div>
          <div class="sv-topbar-right">
            <button class="sv-btn sv-btn-outline" onclick="openProfileModal()">
              <i class="fa fa-pen"></i> Edit Profile
            </button>
            <button class="sv-btn sv-btn-primary" onclick="openServiceModal()">
              <i class="fa fa-plus"></i> Add Service
            </button>
          </div>
        </div>

        <div class="sv-pcard">
          <div class="sv-pcard-top">
            <div>
              <div class="sv-pcard-avatar-ph" id="pc-av-ph">
                <i class="fa fa-user"></i>
              </div>
              <img
                id="pc-av-img"
                class="sv-pcard-avatar"
                style="display: none"
                src=""
                alt=""
              />
            </div>
            <div class="sv-pcard-info">
              <h3 id="pc-name">-</h3>
              <p class="sv-pcard-bio" id="pc-bio">-</p>
              <div class="sv-tags" id="pc-tags"></div>
            </div>
            <div class="sv-pcard-rating">
              <div class="sv-rating-big" id="pc-rating">-</div>
              <div class="sv-stars">★★★★★</div>
              <div class="sv-rating-count" id="pc-reviews">-</div>
            </div>
          </div>
          <div class="sv-pcard-meta" id="pc-meta"></div>
        </div>

        <div class="sv-sec-hdr">
          <div>
            <div class="sv-sec-title">Past Work Gallery</div>
            <div class="sv-sec-sub">
              Photos from completed projects &amp; events
            </div>
          </div>
          <div
            style="
              display: flex;
              gap: 12px;
              align-items: center;
              flex-wrap: wrap;
            "
          >
            <button
              class="sv-link-btn"
              id="seeAllBtn"
              style="display: none"
              onclick="openGalleryAll()"
            >
              <i class="fa fa-th"></i> See All Photos
            </button>
            <button
              class="sv-link-btn"
              onclick="document.getElementById('galleryInput').click()"
            >
              <i class="fa fa-plus"></i> Add Photo
            </button>
          </div>
        </div>
        <div class="sv-gallery-wrap">
          <div class="sv-gallery" id="galleryGrid">
            <div class="sv-gadd">
              <i class="fa fa-cloud-upload-alt"></i><span>Upload Photos</span>
              <input
                type="file"
                id="galleryInput"
                multiple
                accept="image/*"
                onchange="addGalleryPhotos(event)"
              />
            </div>
          </div>
        </div>

        <div class="sv-sec-hdr">
          <div>
            <div class="sv-sec-title">My Services</div>
            <div class="sv-sec-sub">Full details of each service you offer</div>
          </div>
        </div>
        <div id="servicesContainer">
          <div class="sv-empty" id="svcEmpty">
            <i class="fa fa-inbox"></i>
            <h4>No services added yet</h4>
            <p>Click "Add Service" above to get started</p>
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

    <!-- PROFILE MODAL -->
    <div class="modal-bg" id="profileModal">
      <div class="modal-box md">
        <div class="modal-hdr">
          <h3>Partner Profile</h3>
          <button class="modal-close" onclick="closeProfileModal()">×</button>
        </div>
        <div class="modal-body">
          <form id="profileForm" onsubmit="saveProfile(event)">
            <div class="f-field">
              <label>Partner / Business Name</label
              ><input
                type="text"
                id="pName"
                placeholder="e.g. Rohit Chaudhary - Global Support"
                required
              />
            </div>
            <div class="f-field">
              <label>Bio / Tagline</label
              ><textarea
                id="pBio"
                rows="2"
                placeholder="Short description of your expertise..."
                required
              ></textarea>
            </div>
            <div class="f-row">
              <div class="f-field">
                <label>Years of Experience</label
                ><input type="text" id="pExp" placeholder="e.g. 5+ Years" />
              </div>
              <div class="f-field">
                <label>Projects Completed</label
                ><input type="text" id="pProjects" placeholder="e.g. 124" />
              </div>
            </div>
            <div class="f-row">
              <div class="f-field">
                <label>Service Areas</label
                ><input type="text" id="pAreas" placeholder="Delhi, Noida..." />
              </div>
              <div class="f-field">
                <label>Languages</label
                ><input type="text" id="pLangs" placeholder="Hindi, English" />
              </div>
            </div>
            <div class="f-row">
              <div class="f-field">
                <label>Phone Number</label
                ><input type="text" id="pPhone" placeholder="+91 9320583983" />
              </div>
              <div class="f-field">
                <label>Email Address</label
                ><input
                  type="email"
                  id="pEmail"
                  placeholder="rohit@gmail.com"
                />
              </div>
            </div>
            <div class="f-row">
              <div class="f-field">
                <label>Rating (out of 5)</label
                ><input
                  type="number"
                  id="pRating"
                  placeholder="4.8"
                  min="1"
                  max="5"
                  step="0.1"
                />
              </div>
              <div class="f-field">
                <label>No. of Reviews</label
                ><input type="text" id="pReviews" placeholder="218" />
              </div>
            </div>
            <div class="f-field">
              <label>Skill Tags (comma separated)</label
              ><input
                type="text"
                id="pTags"
                placeholder="Tour Manager, Ground Staff, Telecaller..."
              />
            </div>
            <div class="f-divider"></div>
            <div class="f-field">
              <label>Profile Photo</label>
              <div class="upload-zone">
                <i class="fa fa-camera"></i>Click to upload your profile
                photo<input
                  type="file"
                  id="pAvatarInput"
                  accept="image/*"
                  onchange="previewAvatar(event)"
                />
              </div>
              <img
                id="pAvatarPreview"
                style="
                  width: 80px;
                  height: 80px;
                  border-radius: var(--radius-md);
                  object-fit: cover;
                  margin-top: 12px;
                  display: none;
                  border: 2px solid var(--blue-200);
                "
                src=""
                alt=""
              />
            </div>
            <button type="submit" class="modal-submit">
              <i class="fa fa-check"></i> Save & Go to Dashboard
            </button>
          </form>
        </div>
      </div>
    </div>

    <!-- SERVICE MODAL -->
    <div class="modal-bg" id="serviceModal">
      <div class="modal-box md">
        <div class="modal-hdr">
          <h3>Add New Service</h3>
          <button class="modal-close" onclick="closeServiceModal()">×</button>
        </div>
        <div class="modal-body">
          <form id="serviceForm" onsubmit="saveService(event)">
            <div class="f-row">
              <div class="f-field">
                <label>Category</label>
                <select id="sCat" required>
                  <option value="">Select Category</option>
                  <option>Tour Manager</option>
                  <option>Ground Staff</option>
                  <option>Event Coordinator</option>
                  <option>Telecaller</option>
                  <option>Travel Support</option>
                  <option>Photography</option>
                  <option>Security Staff</option>
                  <option>Hospitality</option>
                  <option>Other</option>
                </select>
              </div>
              <div class="f-field">
                <label>Status</label>
                <select id="sStat">
                  <option value="active">Active</option>
                  <option value="pending">Pending</option>
                </select>
              </div>
            </div>
            <div class="f-field">
              <label>Service Title</label
              ><input
                type="text"
                id="sTitle"
                placeholder="e.g. Premium Tour Management"
                required
              />
            </div>
            <div class="f-field">
              <label>Description</label
              ><textarea
                id="sDesc"
                rows="3"
                placeholder="Describe what clients get..."
                required
              ></textarea>
            </div>
            <div class="f-divider"></div>
            <div class="f-row">
              <div class="f-field">
                <label>Charge / Rate</label
                ><input
                  type="text"
                  id="sPrice"
                  placeholder="e.g. Rs.5,000 / day"
                  required
                />
              </div>
              <div class="f-field">
                <label>Availability</label>
                <select id="sAvail">
                  <option>Full-Time</option>
                  <option>Part-Time</option>
                  <option>Weekends Only</option>
                  <option>On-Call</option>
                  <option>Contract Basis</option>
                </select>
              </div>
            </div>
            <div class="f-row">
              <div class="f-field">
                <label>Service Location / Area</label
                ><input
                  type="text"
                  id="sLoc"
                  placeholder="e.g. Delhi, Mumbai"
                />
              </div>
              <div class="f-field">
                <label>Experience (Years)</label
                ><input type="number" id="sExp" placeholder="e.g. 5" min="0" />
              </div>
            </div>
            <div class="f-row">
              <div class="f-field">
                <label>Team Size</label
                ><input
                  type="text"
                  id="sTeam"
                  placeholder="e.g. Up to 20 staff"
                />
              </div>
              <div class="f-field">
                <label>Languages Supported</label
                ><input
                  type="text"
                  id="sLang"
                  placeholder="e.g. Hindi, English"
                />
              </div>
            </div>
            <div class="f-field">
              <label>Highlights (comma separated)</label
              ><input
                type="text"
                id="sHL"
                placeholder="e.g. 24/7 Support, PAN India"
              />
            </div>
            <div class="f-divider"></div>
            <div class="f-field">
              <label>Service / Work Photos</label>
              <div class="upload-zone">
                <i class="fa fa-cloud-upload-alt"></i>Upload photos of this
                service or past work<input
                  type="file"
                  id="sImgsInput"
                  multiple
                  accept="image/*"
                  onchange="previewSvcImgs(event)"
                />
              </div>
              <div class="img-prev" id="sImgPrev"></div>
            </div>
            <button type="submit" class="modal-submit">
              <i class="fa fa-plus"></i> Add to Dashboard
            </button>
          </form>
        </div>
      </div>
    </div>

    <!-- GALLERY ALL MODAL -->
    <div class="modal-bg" id="galleryAllModal">
      <div class="modal-box" style="max-width: 860px">
        <div class="modal-hdr">
          <h3 id="galleryAllTitle">All Gallery Photos</h3>
          <button class="modal-close" onclick="closeGalleryAll()">×</button>
        </div>
        <div class="modal-body">
          <div class="gallery-all-grid" id="galleryAllGrid"></div>
        </div>
      </div>
    </div>

    <!-- LIGHTBOX -->
    <div id="lightbox" onclick="closeLightboxBg(event)">
      <button id="lightboxClose" onclick="closeLightboxBtn()">
        <i class="fa fa-times"></i>
      </button>
      <img id="lightboxImg" src="" alt="" />
      <div id="lightboxCaption"></div>
    </div>

    <script src="shared.js"></script>
    <script>
      function openProfileModal() {
        document.getElementById("profileModal").classList.add("open");
      }
      function closeProfileModal() {
        document.getElementById("profileModal").classList.remove("open");
      }
      function openServiceModal() {
        document.getElementById("serviceModal").classList.add("open");
      }
      function closeServiceModal() {
        document.getElementById("serviceModal").classList.remove("open");
      }
      function closeGalleryAll() {
        document.getElementById("galleryAllModal").classList.remove("open");
      }

      var avatarFile = null;
      function previewAvatar(e) {
        avatarFile = e.target.files[0];
        if (!avatarFile) return;
        var p = document.getElementById("pAvatarPreview");
        p.src = URL.createObjectURL(avatarFile);
        p.style.display = "block";
      }

      var partnerData = null;
      function saveProfile(e) {
        e.preventDefault();
        partnerData = {
          name: document.getElementById("pName").value,
          bio: document.getElementById("pBio").value,
          exp: document.getElementById("pExp").value,
          projects: document.getElementById("pProjects").value,
          areas: document.getElementById("pAreas").value,
          langs: document.getElementById("pLangs").value,
          phone: document.getElementById("pPhone").value,
          email: document.getElementById("pEmail").value,
          rating: document.getElementById("pRating").value,
          reviews: document.getElementById("pReviews").value,
          tags: document.getElementById("pTags").value,
          avatarURL: avatarFile ? URL.createObjectURL(avatarFile) : null,
        };
        renderPartnerCard();
        document.getElementById("svSetup").style.display = "none";
        document.getElementById("svDashboard").style.display = "block";
        closeProfileModal();
      }

      function renderPartnerCard() {
        var d = partnerData;
        document.getElementById("dash-name").textContent =
          d.name || "Partner Dashboard";
        document.getElementById("dash-tagline").textContent = d.bio || "";
        if (d.avatarURL) {
          document.getElementById("pc-av-ph").style.display = "none";
          var img = document.getElementById("pc-av-img");
          img.src = d.avatarURL;
          img.style.display = "block";
        } else {
          document.getElementById("pc-av-ph").style.display = "flex";
          document.getElementById("pc-av-img").style.display = "none";
        }
        document.getElementById("pc-name").textContent = d.name || "-";
        document.getElementById("pc-bio").textContent = d.bio || "-";
        var tagsEl = document.getElementById("pc-tags");
        tagsEl.innerHTML = "";
        (d.tags || "")
          .split(",")
          .map(function (t) {
            return t.trim();
          })
          .filter(Boolean)
          .forEach(function (t) {
            tagsEl.innerHTML += '<span class="sv-tag">' + t + "</span>";
          });
        document.getElementById("pc-rating").textContent = d.rating || "-";
        document.getElementById("pc-reviews").textContent = d.reviews
          ? d.reviews + " reviews"
          : "-";
        var metaData = [
          { icon: "fa-calendar-alt", label: "Experience", val: d.exp || "-" },
          {
            icon: "fa-map-marker-alt",
            label: "Service Areas",
            val: d.areas || "-",
          },
          { icon: "fa-language", label: "Languages", val: d.langs || "-" },
          {
            icon: "fa-project-diagram",
            label: "Projects",
            val: d.projects || "-",
          },
          { icon: "fa-phone", label: "Contact", val: d.phone || "-" },
          { icon: "fa-envelope", label: "Email", val: d.email || "-" },
        ];
        document.getElementById("pc-meta").innerHTML = metaData
          .map(function (m) {
            return (
              '<div class="sv-meta-col"><i class="fa ' +
              m.icon +
              '"></i><div><div class="sv-meta-lbl">' +
              m.label +
              '</div><div class="sv-meta-val">' +
              m.val +
              "</div></div></div>"
            );
          })
          .join("");
      }

      var galleryData = [];
      function addGalleryPhotos(e) {
        Array.from(e.target.files).forEach(function (file) {
          galleryData.push({
            src: URL.createObjectURL(file),
            caption: "Past Work",
          });
        });
        renderGallery();
        e.target.value = "";
      }
      function renderGallery() {
        var grid = document.getElementById("galleryGrid");
        grid.querySelectorAll(".sv-gitem").forEach(function (el) {
          el.remove();
        });
        var MAX = 5;
        var addBtn = grid.querySelector(".sv-gadd");
        galleryData.slice(0, MAX).forEach(function (item, i) {
          var tile = document.createElement("div");
          tile.className = "sv-gitem";
          if (i === MAX - 1 && galleryData.length > MAX) {
            tile.innerHTML =
              '<img src="' +
              item.src +
              '" alt=""><div class="sv-gitem-overlay-count" onclick="openGalleryAll()">+' +
              (galleryData.length - MAX + 1) +
              "<span>See All</span></div>";
          } else {
            tile.innerHTML =
              '<img src="' +
              item.src +
              '" alt="' +
              item.caption +
              '" onclick="openLightbox(\'' +
              item.src +
              "','" +
              item.caption +
              "')\">" +
              '<div class="sv-gitem-overlay"><span>' +
              item.caption +
              "</span></div>" +
              '<div class="sv-gitem-del" onclick="removeGalleryItem(' +
              i +
              ')"><i class="fa fa-times"></i></div>';
          }
          grid.insertBefore(tile, addBtn);
        });
        document.getElementById("seeAllBtn").style.display =
          galleryData.length > MAX ? "inline-flex" : "none";
      }
      function removeGalleryItem(idx) {
        galleryData.splice(idx, 1);
        renderGallery();
        if (
          document.getElementById("galleryAllModal").classList.contains("open")
        )
          openGalleryAll();
      }
      function openGalleryAll() {
        var grid = document.getElementById("galleryAllGrid");
        grid.innerHTML = "";
        galleryData.forEach(function (item, i) {
          var div = document.createElement("div");
          div.className = "gallery-all-item";
          div.innerHTML =
            '<img src="' +
            item.src +
            '" alt="' +
            item.caption +
            '" onclick="openLightbox(\'' +
            item.src +
            "','" +
            item.caption +
            "')\">" +
            '<div class="gallery-all-item-del" onclick="removeGalleryItem(' +
            i +
            ')"><i class="fa fa-times"></i></div>';
          grid.appendChild(div);
        });
        document.getElementById("galleryAllTitle").textContent =
          "All Photos (" + galleryData.length + ")";
        document.getElementById("galleryAllModal").classList.add("open");
      }

      var svcImages = [];
      function previewSvcImgs(e) {
        svcImages = Array.from(e.target.files);
        var p = document.getElementById("sImgPrev");
        p.innerHTML = "";
        svcImages.forEach(function (f) {
          var img = document.createElement("img");
          img.src = URL.createObjectURL(f);
          p.appendChild(img);
        });
      }

      function saveService(e) {
        e.preventDefault();
        var cat = document.getElementById("sCat").value,
          stat = document.getElementById("sStat").value;
        var title = document.getElementById("sTitle").value,
          desc = document.getElementById("sDesc").value;
        var price = document.getElementById("sPrice").value,
          avail = document.getElementById("sAvail").value;
        var loc = document.getElementById("sLoc").value,
          exp = document.getElementById("sExp").value;
        var team = document.getElementById("sTeam").value,
          lang = document.getElementById("sLang").value;
        var hl = document.getElementById("sHL").value;
        var empty = document.getElementById("svcEmpty");
        if (empty) empty.remove();
        var imgURLs = svcImages.map(function (f) {
          return URL.createObjectURL(f);
        });
        var coverSrc = imgURLs[0] || null;
        var statLabel = stat.charAt(0).toUpperCase() + stat.slice(1);
        var statColor = stat === "active" ? "var(--success)" : "var(--warning)";
        if (imgURLs.length > 0) {
          imgURLs.forEach(function (src) {
            galleryData.push({ src: src, caption: title });
          });
          renderGallery();
        }
        var pillDefs = [
          { icon: "fa-map-marker-alt", label: "Location", val: loc },
          { icon: "fa-calendar-check", label: "Availability", val: avail },
          {
            icon: "fa-briefcase",
            label: "Experience",
            val: exp ? exp + " Years" : "",
          },
          { icon: "fa-users", label: "Team Size", val: team },
          { icon: "fa-language", label: "Languages", val: lang },
        ].filter(function (p) {
          return p.val;
        });
        var pillsHTML = pillDefs
          .map(function (p) {
            return (
              '<div class="sv-row-pill"><div class="sv-row-pill-icon"><i class="fa ' +
              p.icon +
              '"></i></div><div><div class="sv-row-pill-lbl">' +
              p.label +
              '</div><div class="sv-row-pill-val">' +
              p.val +
              "</div></div></div>"
            );
          })
          .join("");
        var hlArr = hl
          .split(",")
          .map(function (h) {
            return h.trim();
          })
          .filter(Boolean);
        var hlHTML = hlArr.length
          ? '<div class="sv-row-highlights">' +
            hlArr
              .map(function (h) {
                return '<span class="sv-hl">✦ ' + h + "</span>";
              })
              .join("") +
            "</div>"
          : "";
        var imgBlock = coverSrc
          ? '<img src="' +
            coverSrc +
            '" alt="' +
            title +
            '"><div class="sv-row-img-grad"></div><div class="sv-row-img-hover"><i class="fa fa-expand-alt"></i><span>View Photo</span></div><div class="sv-row-badges"><span class="sv-row-cat">' +
            cat +
            '</span><span class="sv-row-status ' +
            stat +
            '">' +
            statLabel +
            "</span></div>" +
            (imgURLs.length > 1
              ? '<div class="sv-row-img-count"><i class="fa fa-images"></i> ' +
                imgURLs.length +
                " photos</div>"
              : "")
          : '<i class="fa fa-tools no-img-icon"></i><div class="sv-row-badges"><span class="sv-row-cat">' +
            cat +
            '</span><span class="sv-row-status ' +
            stat +
            '">' +
            statLabel +
            "</span></div>";
        var thumbsHTML =
          imgURLs.length > 0
            ? '<div class="sv-row-thumbs"><span class="sv-row-thumb-label"><i class="fa fa-images" style="margin-right:5px;"></i>Photos</span><div class="sv-row-thumbs-list">' +
              imgURLs
                .map(function (src, i) {
                  return (
                    '<img class="sv-row-thumb" src="' +
                    src +
                    '" onclick="openLightbox(\'' +
                    src +
                    "','" +
                    title +
                    " – Photo " +
                    (i + 1) +
                    "')\">"
                  );
                })
                .join("") +
              "</div></div>"
            : "";
        var row = document.createElement("div");
        row.className = "sv-service-row";
        row.innerHTML =
          '<div class="sv-row-main"><div class="sv-row-imgblock" onclick="openLightbox(\'' +
          (coverSrc || "") +
          "','" +
          title +
          "')\">" +
          imgBlock +
          '</div><div class="sv-row-info"><div class="sv-row-info-body"><div class="sv-row-title-row"><h3>' +
          title +
          '</h3><button class="sv-row-del-btn" onclick="deleteService(this)"><i class="fa fa-trash"></i></button></div><p class="sv-row-desc">' +
          desc +
          '</p><div class="sv-row-pills">' +
          pillsHTML +
          "</div>" +
          hlHTML +
          '</div><div class="sv-row-info-footer"><div><div style="display:flex;align-items:baseline;gap:5px;"><div class="sv-row-price">' +
          price +
          '</div><div class="sv-row-price-unit">/ service</div></div><div class="sv-row-price-note">Negotiable based on project scope</div></div><div style="text-align:right;"><div style="font-size:10px;color:var(--gray-400);text-transform:uppercase;letter-spacing:.8px;font-weight:700;margin-bottom:3px;font-family:var(--font-display);">Status</div><div style="font-size:14px;font-weight:800;color:' +
          statColor +
          ';font-family:var(--font-display);">● ' +
          statLabel +
          "</div></div></div></div></div>" +
          thumbsHTML;
        document.getElementById("servicesContainer").appendChild(row);
        closeServiceModal();
        document.getElementById("serviceForm").reset();
        document.getElementById("sImgPrev").innerHTML = "";
        svcImages = [];
      }

      function deleteService(btn) {
        if (confirm("Remove this service?")) {
          btn.closest(".sv-service-row").remove();
          if (!document.querySelector(".sv-service-row")) {
            var empty = document.createElement("div");
            empty.id = "svcEmpty";
            empty.className = "sv-empty";
            empty.innerHTML =
              '<i class="fa fa-inbox"></i><h4>No services yet</h4><p>Click "Add Service" to get started</p>';
            document.getElementById("servicesContainer").appendChild(empty);
          }
        }
      }
    </script>
  </body>
</html>
