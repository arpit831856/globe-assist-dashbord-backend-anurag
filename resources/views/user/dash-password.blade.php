<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Change Password</title>
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
        --green-dark: #0f6b2c;
        --text: #1a1a1a;
        --text-muted: #6b7280;
        --border: #e5e7eb;
        --bg: #f7f8fa;
        --white: #ffffff;
        --shadow-xs: 0 1px 3px rgba(0, 0, 0, 0.06);
        --radius: 16px;
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
        max-width: 520px;
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
        margin-bottom: 24px;
      }

      .card {
        background: var(--white);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        overflow: hidden;
        box-shadow: var(--shadow-xs);
        margin-bottom: 18px;
      }
      .card-header {
        padding: 18px 22px;
        border-bottom: 1px solid var(--border);
      }
      .card-title {
        font-size: 15px;
        font-weight: 700;
      }
      .card-sub {
        font-size: 13px;
        color: var(--text-muted);
        margin-top: 3px;
      }
      .card-body {
        padding: 22px;
        display: flex;
        flex-direction: column;
        gap: 20px;
      }

      .form-group {
        display: flex;
        flex-direction: column;
        gap: 6px;
      }
      .form-label {
        font-size: 12px;
        font-weight: 600;
        color: var(--text-muted);
        letter-spacing: 0.3px;
      }

      .input-wrap {
        position: relative;
      }
      .form-input {
        width: 100%;
        padding: 11px 44px 11px 14px;
        border: 1.5px solid var(--border);
        border-radius: 10px;
        font-family: var(--font-body);
        font-size: 14px;
        color: var(--text);
        background: var(--bg);
        outline: none;
        transition:
          border-color 0.2s,
          background 0.2s;
      }
      .form-input:focus {
        border-color: var(--green);
        background: var(--white);
      }

      .toggle-eye {
        position: absolute;
        right: 13px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        cursor: pointer;
        color: var(--text-muted);
        font-size: 14px;
        transition: color 0.2s;
      }
      .toggle-eye:hover {
        color: var(--green);
      }

      /* Strength meter */
      .strength-wrap {
        margin-top: 10px;
      }
      .strength-bar {
        display: flex;
        gap: 4px;
        margin-bottom: 6px;
      }
      .strength-seg {
        height: 4px;
        flex: 1;
        border-radius: 2px;
        background: var(--border);
        transition: background 0.3s;
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

      /* Requirements checklist */
      .req-list {
        display: flex;
        flex-direction: column;
        gap: 6px;
        margin-top: 10px;
      }
      .req-item {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 13px;
        color: var(--text-muted);
        transition: color 0.2s;
      }
      .req-item i {
        font-size: 12px;
        width: 14px;
        flex-shrink: 0;
      }
      .req-item.ok {
        color: var(--green);
      }

      .card-footer {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        padding: 14px 22px;
        border-top: 1px solid var(--border);
      }
      .cancel-btn {
        padding: 10px 20px;
        background: none;
        border: 1.5px solid var(--border);
        border-radius: 50px;
        font-family: var(--font-body);
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
        color: var(--text);
        transition: all 0.2s;
      }
      .cancel-btn:hover {
        border-color: #999;
      }
      .save-btn {
        padding: 10px 24px;
        background: var(--green);
        color: #fff;
        border: none;
        border-radius: 50px;
        font-family: var(--font-body);
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.2s;
      }
      .save-btn:hover {
        background: var(--green-dark);
      }
      .save-btn:disabled {
        background: var(--border);
        color: var(--text-muted);
        cursor: not-allowed;
      }

      /* Security tips */
      .tips-card {
        background: var(--green-light);
        border: 1px solid rgba(20, 138, 58, 0.18);
        border-radius: var(--radius);
        padding: 20px 22px;
      }
      .tips-title {
        font-size: 14px;
        font-weight: 700;
        color: var(--green);
        margin-bottom: 12px;
        display: flex;
        align-items: center;
        gap: 8px;
      }
      .tips-list {
        display: flex;
        flex-direction: column;
        gap: 7px;
        list-style: none;
      }
      .tips-list li {
        font-size: 13px;
        color: #2d6a3f;
        padding-left: 16px;
        position: relative;
        line-height: 1.5;
      }
      .tips-list li::before {
        content: "•";
        position: absolute;
        left: 0;
        color: var(--green);
      }

      @media (max-width: 500px) {
        .page-wrap {
          padding: 20px 12px 40px;
        }
        .card-body {
          padding: 16px;
        }
        .card-footer {
          padding: 12px 16px;
        }
      }
    </style>
  </head>
  <body>
    <div class="page-wrap">
      <div class="page">
        <h1 class="page-title">Change Password</h1>
        <p class="page-sub">Keep your account secure with a strong password</p>

        <div class="card">
          <div class="card-header">
            <div class="card-title">Update Password</div>
            <div class="card-sub">Last changed 3 months ago</div>
          </div>

          <div class="card-body">
            <div class="form-group">
              <label class="form-label">Current Password</label>
              <div class="input-wrap">
                <input
                  class="form-input"
                  type="password"
                  id="currentPwd"
                  placeholder="Enter current password"
                />
                <button
                  class="toggle-eye"
                  onclick="togglePwd('currentPwd', this)"
                >
                  <i class="fas fa-eye"></i>
                </button>
              </div>
            </div>

            <div class="form-group">
              <label class="form-label">New Password</label>
              <div class="input-wrap">
                <input
                  class="form-input"
                  type="password"
                  id="newPwd"
                  placeholder="Enter new password"
                  oninput="checkStrength(this.value)"
                />
                <button class="toggle-eye" onclick="togglePwd('newPwd', this)">
                  <i class="fas fa-eye"></i>
                </button>
              </div>
              <div class="strength-wrap">
                <div class="strength-bar">
                  <div class="strength-seg" id="seg1"></div>
                  <div class="strength-seg" id="seg2"></div>
                  <div class="strength-seg" id="seg3"></div>
                  <div class="strength-seg" id="seg4"></div>
                </div>
                <span class="strength-label" id="strengthLabel"
                  >Enter a password</span
                >
              </div>
              <div class="req-list">
                <div class="req-item" id="req-len">
                  <i class="fas fa-circle"></i> At least 8 characters
                </div>
                <div class="req-item" id="req-upper">
                  <i class="fas fa-circle"></i> One uppercase letter
                </div>
                <div class="req-item" id="req-num">
                  <i class="fas fa-circle"></i> One number
                </div>
                <div class="req-item" id="req-special">
                  <i class="fas fa-circle"></i> One special character
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="form-label">Confirm New Password</label>
              <div class="input-wrap">
                <input
                  class="form-input"
                  type="password"
                  id="confirmPwd"
                  placeholder="Re-enter new password"
                />
                <button
                  class="toggle-eye"
                  onclick="togglePwd('confirmPwd', this)"
                >
                  <i class="fas fa-eye"></i>
                </button>
              </div>
            </div>
          </div>

          <div class="card-footer">
            <button class="cancel-btn">Cancel</button>
            <button class="save-btn" onclick="updatePassword()">
              Update Password
            </button>
          </div>
        </div>

        <!-- Security Tips -->
        <div class="tips-card">
          <div class="tips-title">
            <i class="fas fa-shield-alt"></i> Security Tips
          </div>
          <ul class="tips-list">
            <li>Use a unique password not used on any other site</li>
            <li>Mix uppercase, lowercase, numbers and special characters</li>
            <li>Avoid personal info like names or birthdays</li>
            <li>Consider using a trusted password manager</li>
          </ul>
        </div>
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

        const score = [hasLen, hasUpper, hasNum, hasSpecial].filter(
          Boolean,
        ).length;
        ["seg1", "seg2", "seg3", "seg4"].forEach((id, i) => {
          const el = document.getElementById(id);
          el.className = "strength-seg";
          if (i < score) {
            if (score <= 1) el.classList.add("weak");
            else if (score <= 2) el.classList.add("medium");
            else el.classList.add("strong");
          }
        });

        const lbl = document.getElementById("strengthLabel");
        lbl.className = "strength-label";
        if (!pwd) {
          lbl.textContent = "Enter a password";
          return;
        }
        if (score <= 1) {
          lbl.textContent = "Weak";
          lbl.classList.add("weak");
        } else if (score <= 2) {
          lbl.textContent = "Fair";
          lbl.classList.add("medium");
        } else if (score === 3) {
          lbl.textContent = "Good";
          lbl.classList.add("strong");
        } else {
          lbl.textContent = "Strong 💪";
          lbl.classList.add("strong");
        }
      }

      function setReq(id, ok) {
        const el = document.getElementById(id);
        el.className = "req-item" + (ok ? " ok" : "");
        el.querySelector("i").className = ok
          ? "fas fa-check-circle"
          : "fas fa-circle";
      }

      function updatePassword() {
        const cur = document.getElementById("currentPwd").value;
        const nw = document.getElementById("newPwd").value;
        const cnf = document.getElementById("confirmPwd").value;
        if (!cur || !nw || !cnf) {
          alert("Please fill in all fields.");
          return;
        }
        if (nw !== cnf) {
          alert("New passwords do not match.");
          return;
        }
        if (nw.length < 8) {
          alert("Password must be at least 8 characters.");
          return;
        }
        alert("✅ Password updated successfully!");
      }
    </script>
  </body>
</html>
