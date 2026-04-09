<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GlobeAssist - Show Links</title>
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
      .links-shell {
        display: flex;
        flex-direction: column;
        gap: 24px;
      }

      .links-hero {
        position: relative;
        overflow: hidden;
        border-radius: var(--radius-2xl);
        padding: 32px;
        background: linear-gradient(135deg, var(--blue-950) 0%, var(--blue-700) 55%, #4a6ee0 100%);
        color: var(--white);
        box-shadow: var(--shadow-xl);
      }

      .links-hero::before,
      .links-hero::after {
        content: "";
        position: absolute;
        border-radius: 999px;
        background: rgba(255, 255, 255, 0.08);
      }

      .links-hero::before {
        width: 220px;
        height: 220px;
        top: -80px;
        right: -40px;
      }

      .links-hero::after {
        width: 140px;
        height: 140px;
        bottom: -50px;
        left: 10%;
      }

      .links-hero-content {
        position: relative;
        z-index: 1;
        display: flex;
        justify-content: space-between;
        gap: 24px;
        align-items: end;
        flex-wrap: wrap;
      }

      .links-hero-copy h1 {
        margin: 0 0 10px;
        font-family: var(--font-display);
        font-size: 30px;
        line-height: 1.1;
        letter-spacing: -0.8px;
      }

      .links-hero-copy p {
        margin: 0;
        max-width: 620px;
        color: rgba(255, 255, 255, 0.85);
        font-size: 15px;
      }

      .links-count-card {
        min-width: 180px;
        padding: 18px 20px;
        border-radius: var(--radius-lg);
        background: rgba(255, 255, 255, 0.12);
        border: 1px solid rgba(255, 255, 255, 0.18);
        backdrop-filter: blur(10px);
      }

      .links-count-card .count-label {
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: rgba(255, 255, 255, 0.8);
        margin-bottom: 6px;
      }

      .links-count-card .count-value {
        font-family: var(--font-display);
        font-size: 34px;
        font-weight: 800;
      }

      .links-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 20px;
      }

      .link-card {
        background: var(--white);
        border: 1px solid var(--gray-200);
        border-radius: var(--radius-xl);
        box-shadow: var(--shadow-sm);
        overflow: hidden;
        transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
      }

      .link-card:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-lg);
        border-color: var(--blue-100);
      }

      .link-card-media {
        position: relative;
        height: 220px;
        overflow: hidden;
        background: linear-gradient(135deg, var(--blue-100), var(--blue-50));
      }

      .link-card-media img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
      }

      .link-card-badge {
        position: absolute;
        top: 14px;
        left: 14px;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 12px;
        border-radius: 999px;
        background: rgba(15, 23, 42, 0.72);
        color: var(--white);
        font-size: 12px;
        font-weight: 700;
      }

      .link-card-body {
        padding: 22px;
      }

      .link-card-meta {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 12px;
        color: var(--gray-500);
        margin-bottom: 12px;
      }

      .link-card-title {
        margin: 0 0 12px;
        font-family: var(--font-display);
        font-size: 22px;
        line-height: 1.2;
        color: var(--blue-950);
        letter-spacing: -0.4px;
      }

      .link-card-url {
        margin: 0 0 18px;
        color: var(--gray-500);
        font-size: 14px;
        line-height: 1.6;
        word-break: break-word;
      }

      .link-card-actions {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
      }

      .link-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        text-decoration: none;
        padding: 12px 16px;
        border-radius: 14px;
        font-weight: 700;
        transition: all 0.2s ease;
      }

      .link-btn-primary {
        background: #ff0016;
        color: var(--white);
        border: 1px solid #ffffff;
      }

      .link-btn-primary:hover {
        background: var(--blue-700);
      }

      .link-btn-secondary {
        background: var(--blue-50);
        color: var(--blue-700);
        border: 1px solid var(--blue-100);
      }

      .link-btn-secondary:hover {
        background: var(--blue-100);
      }

      .empty-state {
        background: var(--white);
        border: 1px dashed var(--blue-200);
        border-radius: var(--radius-xl);
        padding: 48px 28px;
        text-align: center;
        box-shadow: var(--shadow-sm);
      }

      .empty-state-icon {
        width: 72px;
        height: 72px;
        margin: 0 auto 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 20px;
        background: var(--blue-50);
        color: var(--blue-600);
        font-size: 28px;
      }

      .empty-state h3 {
        margin: 0 0 8px;
        font-family: var(--font-display);
        font-size: 24px;
        color: var(--blue-950);
      }

      .empty-state p {
        margin: 0;
        color: var(--gray-500);
      }

      @media (max-width: 768px) {
        .links-hero {
          padding: 24px;
        }

        .links-hero-copy h1 {
          font-size: 24px;
        }

        .link-card-media {
          height: 200px;
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
        <span class="bar"></span><span class="bar"></span><span class="bar"></span>
      </button>
      <div class="mobile-logo">Globe<span>Assist</span></div>
      <img
        src="https://i.pravatar.cc/150?img=4"
        class="mobile-user-avatar"
        alt=""
      />
    </div>

    @include('partner.layouts.sidebar')

    <div class="main">
      @include('partner.layouts.header')

      <div class="links-shell">
        <section class="links-hero">
          <div class="links-hero-content">
            <div class="links-hero-copy">
              <h1>Show Links</h1>
              <p>
                Admin panel se jo heading, image aur YouTube links add kiye gaye hain,
                un sab ko yahan partner dashboard style ke andar display kiya gaya hai.
              </p>
            </div>
            <div class="links-count-card">
              <div class="count-label">Total Links</div>
              <div class="count-value">{{ $addLinks->count() }}</div>
            </div>
          </div>
        </section>

        @if ($addLinks->count())
          <section class="links-grid">
            @foreach ($addLinks as $addLink)
              <article class="link-card">
                <div class="link-card-media">
                  <img
                    src="{{ asset('storage/' . $addLink->image) }}"
                    alt="{{ $addLink->heading }}"
                  />
                  <div class="link-card-badge">
                    <i class="fa-brands fa-youtube"></i> Featured Link
                  </div>
                </div>

                <div class="link-card-body">
                  <div class="link-card-meta">
                    <i class="fa-regular fa-calendar"></i>
                    <span>{{ $addLink->created_at?->format('d M Y') }}</span>
                  </div>

                  <h2 class="link-card-title">{{ $addLink->heading }}</h2>
                  <p class="link-card-url">{{ $addLink->youtube_link }}</p>

                  <div class="link-card-actions">
                    <a
                      href="{{ $addLink->youtube_link }}"
                      target="_blank"
                      rel="noopener noreferrer"
                      class="link-btn link-btn-primary"
                    >
                      <i class="fa-brands fa-youtube"></i> You Tube
                    </a>
                    <a
                      href="{{ $addLink->youtube_link }}"
                      target="_blank"
                      rel="noopener noreferrer"
                      class="link-btn link-btn-secondary"
                    >
                      <i class="fa-solid fa-arrow-up-right-from-square"></i> Open Link
                    </a>
                  </div>
                </div>
              </article>
            @endforeach
          </section>
        @else
          <section class="empty-state">
            <div class="empty-state-icon">
              <i class="fa fa-link"></i>
            </div>
            <h3>No links available</h3>
            <p>Admin side se links add hone ke baad yahan automatically show honge.</p>
          </section>
        @endif
      </div>
    </div>

    <script src="{{ asset('js/shared.js') }}"></script>
  </body>
</html>
