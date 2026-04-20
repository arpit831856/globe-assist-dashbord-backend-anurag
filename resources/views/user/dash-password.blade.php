<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Globe Assist - Change Password</title>
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
        --green: #148a3a;
        --green-light: #e8f5ee;
        --green-mid: #1fa84f;
        --accent: #6cba0c;
        --text: #1a1a1a;
        --text-muted: #6b7280;
        --border: #e5e7eb;
        --bg: #f7f8fa;
        --white: #ffffff;
        --danger: #dc2626;
        --danger-bg: #fef2f2;
        --shadow-sm: 0 1px 4px rgba(0, 0, 0, 0.07);
        --shadow-md: 0 4px 20px rgba(0, 0, 0, 0.09);
        --radius: 14px;
        --transition: 0.28s cubic-bezier(0.4, 0, 0.2, 1);
        --font-body: "DM Sans", sans-serif;
        --font-display: "Playfair Display", serif;
        --font-mono: "JetBrains Mono", monospace;
      }

      body {
        font-family: var(--font-body);
        background: linear-gradient(180deg, #f4fbf6 0%, var(--bg) 180px);
        color: var(--text);
        min-height: 100vh;
        padding: 28px;
      }

      .password-shell {
        max-width: 1100px;
        margin: 0 auto;
      }

      .hero {
        background:
          radial-gradient(circle at top right, rgba(108, 186, 12, 0.18), transparent 28%),
          linear-gradient(135deg, #0d6d2f 0%, #148a3a 48%, #1fa84f 100%);
        color: #fff;
        border-radius: 24px;
        padding: 28px 30px;
        box-shadow: 0 18px 40px rgba(20, 138, 58, 0.18);
        margin-bottom: 22px;
        position: relative;
        overflow: hidden;
      }

      .hero::after {
        content: "";
        position: absolute;
        inset: auto -40px -60px auto;
        width: 220px;
        height: 220px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.08);
      }

      .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 14px;
        border-radius: 999px;
        background: rgba(255, 255, 255, 0.14);
        border: 1px solid rgba(255, 255, 255, 0.2);
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 0.4px;
        margin-bottom: 14px;
      }

      .hero h1 {
        font-family: var(--font-display);
        font-size: clamp(28px, 4vw, 38px);
        font-weight: 700;
        margin-bottom: 8px;
      }

      .hero p {
        max-width: 620px;
        color: rgba(255, 255, 255, 0.9);
        font-size: 15px;
        line-height: 1.6;
      }

      .layout {
        display: grid;
        grid-template-columns: minmax(0, 1.2fr) minmax(300px, 0.8fr);
        gap: 22px;
      }

      .card {
        background: var(--white);
        border: 1px solid var(--border);
        border-radius: 24px;
        box-shadow: var(--shadow-md);
      }

      .form-card {
        overflow: hidden;
      }

      .card-header {
        padding: 22px 24px;
        border-bottom: 1px solid var(--border);
        display: flex;
        justify-content: space-between;
        gap: 12px;
        align-items: center;
        flex-wrap: wrap;
      }

      .card-title {
        font-size: 20px;
        font-weight: 700;
      }

      .card-sub {
        font-size: 13px;
        color: var(--text-muted);
        margin-top: 4px;
      }

      .card-chip {
        background: var(--green-light);
        color: var(--green);
        border: 1px solid rgba(20, 138, 58, 0.14);
        border-radius: 999px;
        padding: 8px 12px;
        font-size: 12px;
        font-weight: 700;
        white-space: nowrap;
      }

      .card-body {
        padding: 24px;
      }

      .flash {
        border-radius: 14px;
        padding: 13px 15px;
        font-size: 14px;
        margin-bottom: 16px;
      }

      .flash-success {
        background: var(--green-light);
        color: var(--green);
        border: 1px solid rgba(20, 138, 58, 0.14);
      }

      .flash-error {
        background: var(--danger-bg);
        color: var(--danger);
        border: 1px solid rgba(220, 38, 38, 0.14);
      }

      .form-grid {
        display: grid;
        gap: 18px;
      }

      .form-group {
        display: flex;
        flex-direction: column;
        gap: 8px;
      }

      .form-label {
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: var(--text-muted);
      }

      .input-wrap {
        position: relative;
      }

      .form-input {
        width: 100%;
        padding: 13px 46px 13px 15px;
        border: 1.5px solid var(--border);
        border-radius: 14px;
        font-family: var(--font-body);
        font-size: 14px;
        color: var(--text);
        background: #fbfcfd;
        outline: none;
        transition:
          border-color var(--transition),
          box-shadow var(--transition),
          background var(--transition);
      }

      .form-input:focus {
        border-color: var(--green);
        background: var(--white);
        box-shadow: 0 0 0 4px rgba(20, 138, 58, 0.08);
      }

      .toggle-eye {
        position: absolute;
        top: 50%;
        right: 15px;
        transform: translateY(-50%);
        border: none;
        background: transparent;
        color: var(--text-muted);
        cursor: pointer;
        font-size: 14px;
      }

      .field-error {
        font-size: 12px;
        color: var(--danger);
      }

      .strength-wrap {
        margin-top: 12px;
      }

      .strength-bar {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 6px;
        margin-bottom: 8px;
      }

      .strength-seg {
        height: 5px;
        border-radius: 999px;
        background: var(--border);
        transition: background 0.3s ease;
      }

      .strength-seg.weak {
        background: #ef4444;
      }

      .strength-seg.medium {
        background: #f59e0b;
      }

      .strength-seg.strong {
        background: var(--green);
      }

      .strength-label {
        font-size: 12px;
        color: var(--text-muted);
      }

      .strength-label.weak {
        color: #ef4444;
      }

      .strength-label.medium {
        color: #f59e0b;
      }

      .strength-label.strong {
        color: var(--green);
      }

      .req-list {
        display: grid;
        gap: 8px;
        margin-top: 12px;
      }

      .req-item {
        display: flex;
        align-items: center;
        gap: 9px;
        font-size: 13px;
        color: var(--text-muted);
      }

      .req-item.ok {
        color: var(--green);
      }

      .req-item i {
        width: 14px;
        font-size: 12px;
        flex-shrink: 0;
      }

      .actions {
        display: flex;
        gap: 12px;
        margin-top: 8px;
        flex-wrap: wrap;
      }

      .btn {
        border: none;
        border-radius: 999px;
        padding: 12px 20px;
        font-size: 14px;
        font-weight: 700;
        cursor: pointer;
        transition: var(--transition);
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
      }

      .btn-primary {
        background: linear-gradient(135deg, var(--green), var(--green-mid));
        color: #fff;
        box-shadow: 0 10px 20px rgba(20, 138, 58, 0.18);
      }

      .btn-primary:hover {
        transform: translateY(-1px);
      }

      .btn-secondary {
        background: #f4f6f8;
        color: var(--text);
        border: 1px solid var(--border);
      }

      .tips-card {
        padding: 24px;
        display: flex;
        flex-direction: column;
        gap: 16px;
      }

      .tips-top {
        padding: 18px;
        border-radius: 18px;
        background: linear-gradient(135deg, #effaf2, #f9fff7);
        border: 1px solid rgba(20, 138, 58, 0.12);
      }

      .tips-top h3 {
        font-size: 18px;
        font-weight: 700;
        margin-bottom: 8px;
        color: var(--green);
      }

      .tips-top p {
        font-size: 14px;
        color: var(--text-muted);
        line-height: 1.6;
      }

      .tip-list {
        display: grid;
        gap: 12px;
      }

      .tip-item {
        display: flex;
        gap: 12px;
        align-items: flex-start;
        padding: 14px;
        border-radius: 16px;
        background: #fafbfc;
        border: 1px solid var(--border);
      }

      .tip-icon {
        width: 38px;
        height: 38px;
        border-radius: 12px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: var(--green-light);
        color: var(--green);
        flex-shrink: 0;
      }

      .tip-copy strong {
        display: block;
        font-size: 14px;
        margin-bottom: 4px;
      }

      .tip-copy span {
        font-size: 13px;
        color: var(--text-muted);
        line-height: 1.5;
      }

      @media (max-width: 960px) {
        body {
          padding: 18px;
        }

        .layout {
          grid-template-columns: 1fr;
        }
      }

      @media (max-width: 540px) {
        body {
          padding: 12px;
        }

        .hero,
        .card-header,
        .card-body,
        .tips-card {
          padding-left: 16px;
          padding-right: 16px;
        }

        .actions {
          flex-direction: column;
        }

        .btn {
          width: 100%;
        }
      }
    </style>
  </head>
  <body>
    <div class="password-shell">
      <section class="hero">
        <span class="hero-badge">
          <i class="fas fa-shield-halved"></i> Account Security
        </span>
        <h1>Change Your Password</h1>
        <p>
          Protect your user account with a stronger password. Use a new password
          that is hard to guess and easy for you to remember.
        </p>
      </section>

      <div class="layout">
        <section class="card form-card">
          <div class="card-header">
            <div>
              <div class="card-title">Password Settings</div>
              <div class="card-sub">
                Update your login password for the Globe Assist user panel.
              </div>
            </div>
            <span class="card-chip">User Panel</span>
          </div>

          <div class="card-body">
            <form action="{{ route('user.change-password.update') }}" method="POST">
              @csrf

              @if (session('success'))
                <div class="flash flash-success">{{ session('success') }}</div>
              @endif

              @if ($errors->any())
                <div class="flash flash-error">
                  Please correct the highlighted fields and try again.
                </div>
              @endif

              <div class="form-grid">
                <div class="form-group">
                  <label class="form-label" for="current_password">Current Password</label>
                  <div class="input-wrap">
                    <input
                      class="form-input"
                      type="password"
                      id="current_password"
                      name="current_password"
                      placeholder="Enter current password"
                      required
                    />
                    <button
                      class="toggle-eye"
                      type="button"
                      onclick="togglePwd('current_password', this)"
                    >
                      <i class="fas fa-eye"></i>
                    </button>
                  </div>
                  @error('current_password')
                    <span class="field-error">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label class="form-label" for="password">New Password</label>
                  <div class="input-wrap">
                    <input
                      class="form-input"
                      type="password"
                      id="password"
                      name="password"
                      placeholder="Enter new password"
                      oninput="checkStrength(this.value)"
                      required
                    />
                    <button
                      class="toggle-eye"
                      type="button"
                      onclick="togglePwd('password', this)"
                    >
                      <i class="fas fa-eye"></i>
                    </button>
                  </div>
               

                  

                 
                </div>

                <div class="form-group">
                  <label class="form-label" for="password_confirmation">
                    Confirm New Password
                  </label>
                  <div class="input-wrap">
                    <input
                      class="form-input"
                      type="password"
                      id="password_confirmation"
                      name="password_confirmation"
                      placeholder="Re-enter new password"
                      required
                    />
                    <button
                      class="toggle-eye"
                      type="button"
                      onclick="togglePwd('password_confirmation', this)"
                    >
                      <i class="fas fa-eye"></i>
                    </button>
                  </div>
                </div>
              </div>

              <div class="actions">
                <button class="btn btn-primary" type="submit">
                  <i class="fas fa-key"></i> Update Password
                </button>
                <a href="{{ route('user.profile') }}" class="btn btn-secondary">
                  <i class="fas fa-arrow-left"></i> Back to Profile
                </a>
              </div>
            </form>
          </div>
        </section>

        <aside class="card tips-card">
          <div class="tips-top">
            <h3>Keep Your Account Safe</h3>
            <p>
              Strong passwords help protect your bookings, profile details,
              support messages, and payment activity inside the user dashboard.
            </p>
          </div>

          <div class="tip-list">
            <div class="tip-item">
              <span class="tip-icon"><i class="fas fa-lock"></i></span>
              <div class="tip-copy">
                <strong>Use a unique password</strong>
                <span>Do not reuse the same password from other websites or apps.</span>
              </div>
            </div>

            <div class="tip-item">
              <span class="tip-icon"><i class="fas fa-wand-magic-sparkles"></i></span>
              <div class="tip-copy">
                <strong>Mix character types</strong>
                <span>Use uppercase, lowercase, numbers, and symbols for better strength.</span>
              </div>
            </div>

            <div class="tip-item">
              <span class="tip-icon"><i class="fas fa-user-shield"></i></span>
              <div class="tip-copy">
                <strong>Avoid personal details</strong>
                <span>Skip names, birthdays, and obvious words that others can guess.</span>
              </div>
            </div>
          </div>
        </aside>
      </div>
    </div>

    <script>
      function togglePwd(id, btn) {
        const input = document.getElementById(id);
        const isText = input.type === "text";
        input.type = isText ? "password" : "text";
        btn.querySelector("i").className = isText
          ? "fas fa-eye"
          : "fas fa-eye-slash";
      }

      function checkStrength(pwd) {
        const hasLen = pwd.length >= 8;
        const hasUpper = /[A-Z]/.test(pwd);
        const hasNum = /[0-9]/.test(pwd);
        const hasSpecial = /[^A-Za-z0-9]/.test(pwd);

        setReq("req-len", hasLen);
        setReq("req-upper", hasUpper);
        setReq("req-num", hasNum);
        setReq("req-special", hasSpecial);

        const score = [hasLen, hasUpper, hasNum, hasSpecial].filter(Boolean).length;

        ["seg1", "seg2", "seg3", "seg4"].forEach((id, i) => {
          const el = document.getElementById(id);
          el.className = "strength-seg";
          if (i < score) {
            if (score <= 1) el.classList.add("weak");
            else if (score <= 2) el.classList.add("medium");
            else el.classList.add("strong");
          }
        });

        const label = document.getElementById("strengthLabel");
        label.className = "strength-label";

        if (!pwd) {
          label.textContent = "Enter a password";
          return;
        }

        if (score <= 1) {
          label.textContent = "Weak password";
          label.classList.add("weak");
        } else if (score <= 2) {
          label.textContent = "Fair password";
          label.classList.add("medium");
        } else if (score === 3) {
          label.textContent = "Good password";
          label.classList.add("strong");
        } else {
          label.textContent = "Strong password";
          label.classList.add("strong");
        }
      }

      function setReq(id, ok) {
        const el = document.getElementById(id);
        el.className = "req-item" + (ok ? " ok" : "");
        el.querySelector("i").className = ok
          ? "fas fa-check-circle"
          : "fas fa-circle";
      }
    </script>
  </body>
</html>
