<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GlobeAssist - Change Password</title>
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
      .password-shell {
        display: grid;
        grid-template-columns: minmax(0, 1.15fr) minmax(280px, 0.85fr);
        gap: 22px;
      }
      .password-card,
      .password-tips {
        background: var(--white);
        border-radius: var(--radius-xl);
        border: 1px solid var(--gray-200);
        box-shadow: var(--shadow-md);
      }
      .password-card {
        overflow: hidden;
      }
      .password-card-top {
        padding: 22px 24px;
        background: linear-gradient(135deg, var(--blue-950), var(--blue-700));
        color: #fff;
      }
      .password-card-top h2 {
        font-family: var(--font-display);
        font-size: 24px;
        font-weight: 800;
        margin-bottom: 6px;
      }
      .password-card-top p {
        color: rgba(255, 255, 255, 0.78);
        font-size: 14px;
      }
      .password-form {
        padding: 24px;
      }
      .password-grid {
        display: grid;
        gap: 16px;
      }
      .password-input-wrap {
        position: relative;
      }
      .password-input-wrap input {
        padding-right: 44px;
      }
      .password-toggle {
        position: absolute;
        top: 50%;
        right: 14px;
        transform: translateY(-50%);
        border: none;
        background: transparent;
        color: var(--gray-400);
        cursor: pointer;
        font-size: 15px;
      }
      .password-actions {
        display: flex;
        gap: 12px;
        margin-top: 10px;
        flex-wrap: wrap;
      }
      .password-btn {
        border: none;
        border-radius: var(--radius-md);
        padding: 13px 18px;
        font-size: 14px;
        font-weight: 700;
        font-family: var(--font-display);
        cursor: pointer;
        transition: 0.2s;
      }
      .password-btn-primary {
        background: var(--blue-600);
        color: #fff;
      }
      .password-btn-primary:hover {
        background: var(--accent-hover);
      }
      .password-btn-secondary {
        background: var(--gray-100);
        color: var(--gray-600);
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
      }
      .password-btn-secondary:hover {
        background: var(--gray-200);
      }
      .password-tips {
        padding: 24px;
      }
      .tips-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: var(--blue-50);
        color: var(--blue-700);
        border: 1px solid var(--blue-100);
        border-radius: 999px;
        padding: 8px 14px;
        font-size: 12px;
        font-weight: 700;
        font-family: var(--font-display);
        margin-bottom: 16px;
      }
      .password-tips h3 {
        font-family: var(--font-display);
        font-size: 20px;
        color: var(--blue-950);
        margin-bottom: 10px;
      }
      .password-tips p {
        color: var(--gray-500);
        line-height: 1.6;
        margin-bottom: 18px;
      }
      .tips-list {
        display: grid;
        gap: 12px;
      }
      .tip-item {
        display: flex;
        gap: 12px;
        align-items: flex-start;
        background: var(--gray-100);
        border: 1px solid var(--gray-200);
        border-radius: var(--radius-md);
        padding: 14px;
      }
      .tip-item i {
        width: 34px;
        height: 34px;
        border-radius: 10px;
        background: var(--success-bg);
        color: var(--success);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
      }
      .tip-item strong {
        display: block;
        color: var(--blue-950);
        font-size: 14px;
        margin-bottom: 4px;
      }
      .tip-item span {
        color: var(--gray-500);
        font-size: 13px;
        line-height: 1.5;
      }
      .flash-message {
        padding: 14px 16px;
        border-radius: var(--radius-md);
        font-size: 14px;
        margin-bottom: 16px;
      }
      .flash-success {
        background: var(--success-bg);
        color: var(--success);
        border: 1px solid rgba(5, 150, 105, 0.2);
      }
      .flash-error {
        background: var(--danger-bg);
        color: var(--danger);
        border: 1px solid rgba(220, 38, 38, 0.18);
      }
      .field-error {
        display: block;
        color: var(--danger);
        font-size: 12px;
        margin-top: 6px;
      }
      @media (max-width: 980px) {
        .password-shell {
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

    @include('partner.layouts.sidebar')

    <div class="main">
      <div class="page-header">
        <div class="page-header-left">
          <h1><i class="fa fa-key"></i> Change Password</h1>
          <p>Keep your partner account secure with a strong new password.</p>
        </div>
        <span class="page-header-badge">Partner Security</span>
      </div>

      <div class="password-shell">
        <div class="password-card">
          <div class="password-card-top">
            <h2>Update Your Password</h2>
            <p>
              Enter your current password and choose a new password with at least
              8 characters.
            </p>
          </div>

          <form
            action="{{ route('partner.change-password.update') }}"
            method="POST"
            class="password-form"
          >
            @csrf

            @if (session('success'))
              <div class="flash-message flash-success">
                {{ session('success') }}
              </div>
            @endif

            @if ($errors->any())
              <div class="flash-message flash-error">
                Please fix the highlighted fields and try again.
              </div>
            @endif

            <div class="password-grid">
              <div class="f-field">
                <label for="current_password">Current Password</label>
                <div class="password-input-wrap">
                  <input
                    id="current_password"
                    name="current_password"
                    type="password"
                    placeholder="Enter current password"
                    required
                  />
                  <button type="button" class="password-toggle" onclick="togglePassword('current_password', this)">
                    <i class="fa fa-eye"></i>
                  </button>
                </div>
                @error('current_password')
                  <span class="field-error">{{ $message }}</span>
                @enderror
              </div>

              <div class="f-field">
                <label for="password">New Password</label>
                <div class="password-input-wrap">
                  <input
                    id="password"
                    name="password"
                    type="password"
                    placeholder="Enter new password"
                    required
                  />
                  <button type="button" class="password-toggle" onclick="togglePassword('password', this)">
                    <i class="fa fa-eye"></i>
                  </button>
                </div>
                @error('password')
                  <span class="field-error">{{ $message }}</span>
                @enderror
              </div>

              <div class="f-field">
                <label for="password_confirmation">Confirm New Password</label>
                <div class="password-input-wrap">
                  <input
                    id="password_confirmation"
                    name="password_confirmation"
                    type="password"
                    placeholder="Re-enter new password"
                    required
                  />
                  <button type="button" class="password-toggle" onclick="togglePassword('password_confirmation', this)">
                    <i class="fa fa-eye"></i>
                  </button>
                </div>
              </div>
            </div>

            <div class="password-actions">
              <button type="submit" class="password-btn password-btn-primary">
                <i class="fa fa-shield-halved"></i> Update Password
              </button>
              <a href="{{ route('partner.dashboard') }}" class="password-btn password-btn-secondary">
                <i class="fa fa-arrow-left"></i> Back to Dashboard
              </a>
            </div>
          </form>
        </div>

        <aside class="password-tips">
          <span class="tips-badge">
            <i class="fa fa-lock"></i> Security Tips
          </span>
          <h3>Make It Strong</h3>
          <p>
            A secure password helps protect your partner profile, service data,
            and payment-related information.
          </p>

          <div class="tips-list">
            <div class="tip-item">
              <i class="fa fa-check"></i>
              <div>
                <strong>Use at least 8 characters</strong>
                <span>Longer passwords are harder to guess and safer for login security.</span>
              </div>
            </div>

            <div class="tip-item">
              <i class="fa fa-check"></i>
              <div>
                <strong>Mix letters, numbers, and symbols</strong>
                <span>A combination improves password strength and reduces common attacks.</span>
              </div>
            </div>

            <div class="tip-item">
              <i class="fa fa-check"></i>
              <div>
                <strong>Avoid reusing old passwords</strong>
                <span>Choose a fresh password that you do not use on other websites.</span>
              </div>
            </div>
          </div>
        </aside>
      </div>
    </div>

    <script src="{{ asset('js/shared.js') }}"></script>
    <script>
      function togglePassword(fieldId, button) {
        var input = document.getElementById(fieldId);
        var icon = button.querySelector("i");
        if (input.type === "password") {
          input.type = "text";
          icon.className = "fa fa-eye-slash";
        } else {
          input.type = "password";
          icon.className = "fa fa-eye";
        }
      }
    </script>
  </body>
</html>
