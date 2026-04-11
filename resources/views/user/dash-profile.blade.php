<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Profile</title>
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
        --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.07);
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

      /* CENTER WRAPPER */
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
        max-width: 760px;
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

      /* Profile hero */
      .profile-hero {
        background: var(--white);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        padding: 24px 28px;
        box-shadow: var(--shadow-xs);
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 20px;
        flex-wrap: wrap;
      }
      .avatar-wrap {
        position: relative;
        flex-shrink: 0;
      }
      .avatar-img {
        width: 82px;
        height: 82px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid var(--green);
        display: block;
      }
      .avatar-edit {
        position: absolute;
        bottom: 0;
        right: 0;
        width: 26px;
        height: 26px;
        border-radius: 50%;
        background: var(--green);
        color: #fff;
        border: 2px solid #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 10px;
        cursor: pointer;
        transition: transform 0.2s;
      }
      .avatar-edit:hover {
        transform: scale(1.12);
      }

      .profile-info {
        flex: 1;
        min-width: 0;
      }
      .profile-name {
        font-family: var(--font-display);
        font-size: 20px;
        font-weight: 700;
        margin-bottom: 3px;
      }
      .profile-email {
        font-size: 13.5px;
        color: var(--text-muted);
        margin-bottom: 10px;
      }
      .profile-tags {
        display: flex;
        gap: 7px;
        flex-wrap: wrap;
      }
      .profile-tag {
        font-size: 12px;
        font-weight: 500;
        padding: 3px 10px;
        border-radius: 50px;
        background: var(--green-light);
        color: var(--green);
      }

      .save-btn {
        padding: 10px 22px;
        background: var(--green);
        color: #fff;
        border: none;
        border-radius: 50px;
        font-family: var(--font-body);
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.2s;
        white-space: nowrap;
        align-self: flex-start;
        flex-shrink: 0;
      }
      .save-btn:hover {
        background: var(--green-dark);
      }

      /* Form section */
      .form-section {
        background: var(--white);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        overflow: hidden;
        box-shadow: var(--shadow-xs);
        margin-bottom: 18px;
      }
      .fs-header {
        padding: 15px 22px;
        border-bottom: 1px solid var(--border);
        font-size: 15px;
        font-weight: 700;
      }
      .fs-body {
        padding: 20px 22px;
      }

      .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px;
      }
      @media (max-width: 520px) {
        .form-grid {
          grid-template-columns: 1fr;
        }
      }

      .form-group {
        display: flex;
        flex-direction: column;
        gap: 6px;
      }
      .form-full {
        grid-column: 1 / -1;
      }
      .form-label {
        font-size: 12px;
        font-weight: 600;
        color: var(--text-muted);
        letter-spacing: 0.3px;
      }
      .form-input,
      .form-select {
        padding: 10px 13px;
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
        width: 100%;
      }
      .form-input:focus,
      .form-select:focus {
        border-color: var(--green);
        background: var(--white);
      }
      .form-select {
        cursor: pointer;
      }

      .form-footer {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        padding: 14px 22px;
        border-top: 1px solid var(--border);
      }
      .cancel-btn {
        padding: 9px 20px;
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
        border-color: var(--text);
      }

      /* Business Info */
      .business-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 13px 22px;
        border-bottom: 1px solid var(--border);
        gap: 12px;
        flex-wrap: wrap;
      }
      .business-row:last-child {
        border-bottom: none;
      }
      .br-label strong {
        font-size: 14px;
        font-weight: 500;
        display: block;
      }
      .br-label small {
        font-size: 12px;
        color: var(--text-muted);
      }
      .br-value {
        font-size: 14px;
        font-weight: 600;
        color: var(--text);
        font-family: var(--font-mono);
      }

      /* Toggle */
      .pref-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 13px 22px;
        border-bottom: 1px solid var(--border);
        gap: 12px;
      }
      .pref-item:last-child {
        border-bottom: none;
      }
      .pref-label strong {
        font-size: 14px;
        font-weight: 500;
        display: block;
      }
      .pref-label small {
        font-size: 12px;
        color: var(--text-muted);
      }

      .toggle {
        position: relative;
        display: inline-block;
        width: 44px;
        height: 24px;
        flex-shrink: 0;
      }
      .toggle input {
        display: none;
      }
      .toggle-slider {
        position: absolute;
        inset: 0;
        background: var(--border);
        border-radius: 24px;
        cursor: pointer;
        transition: background 0.3s;
      }
      .toggle-slider::before {
        content: "";
        position: absolute;
        width: 18px;
        height: 18px;
        background: #fff;
        border-radius: 50%;
        top: 3px;
        left: 3px;
        transition: transform 0.3s;
        box-shadow: 0 1px 4px rgba(0, 0, 0, 0.15);
      }
      .toggle input:checked + .toggle-slider {
        background: var(--green);
      }
      .toggle input:checked + .toggle-slider::before {
        transform: translateX(20px);
      }

      @media (max-width: 500px) {
        .page-wrap {
          padding: 20px 12px 40px;
        }
        .profile-hero {
          padding: 18px 16px;
        }
        .fs-body {
          padding: 16px;
        }
      }
    </style>
  </head>
  <body>
    <div class="page-wrap">
      <div class="page">
        <h1 class="page-title">My Profile</h1>
        <p class="page-sub">Manage your personal and business information</p>

        <!-- Hero -->
        <div class="profile-hero">
          <div class="avatar-wrap">
            <img
              class="avatar-img"
              src="https://globeassist.in/assets/unsplash_ig.png"
              alt="Rahul Kumar"
              onerror="
                this.src =
                  'https://ui-avatars.com/api/?name=Rahul+Kumar&background=148a3a&color=fff&size=100'
              "
            />
            <div class="avatar-edit"><i class="fas fa-camera"></i></div>
          </div>
          <div class="profile-info">
            <div class="profile-name">Rahul Kumar</div>
            <div class="profile-email">rahul@travelease.in</div>
            <div class="profile-tags">
              <span class="profile-tag">🏢 TravelEase Pvt. Ltd.</span>
              <span class="profile-tag">📍 New Delhi</span>
              <span class="profile-tag">⭐ Premium Client</span>
            </div>
          </div>
          <button class="save-btn">Save Changes</button>
        </div>

        <!-- Personal Info -->
        <div class="form-section">
          <div class="fs-header">Personal Information</div>
          <div class="fs-body">
            <div class="form-grid">
              <div class="form-group">
                <label class="form-label">First Name</label>
                <input class="form-input" type="text" value="Rahul" />
              </div>
              <div class="form-group">
                <label class="form-label">Last Name</label>
                <input class="form-input" type="text" value="Kumar" />
              </div>
              <div class="form-group">
                <label class="form-label">Email Address</label>
                <input
                  class="form-input"
                  type="email"
                  value="rahul@travelease.in"
                />
              </div>
              <div class="form-group">
                <label class="form-label">Phone Number</label>
                <input class="form-input" type="tel" value="+91 9876543210" />
              </div>
              <div class="form-group">
                <label class="form-label">City</label>
                <input class="form-input" type="text" value="New Delhi" />
              </div>
              <div class="form-group">
                <label class="form-label">State</label>
                <input class="form-input" type="text" value="Delhi" />
              </div>
            </div>
          </div>
          <div class="form-footer">
            <button class="cancel-btn">Cancel</button>
            <button class="save-btn">Update Info</button>
          </div>
        </div>

        <!-- Business Info -->
        <div class="form-section">
          <div class="fs-header">Business Information</div>
          <div class="fs-body">
            <div class="form-grid">
              <div class="form-group">
                <label class="form-label">Company Name</label>
                <input
                  class="form-input"
                  type="text"
                  value="TravelEase Pvt. Ltd."
                />
              </div>
              <div class="form-group">
                <label class="form-label">GST Number</label>
                <input class="form-input" type="text" value="07AAACT2727Q1ZX" />
              </div>
              <div class="form-group">
                <label class="form-label">Business Type</label>
                <select class="form-select">
                  <option selected>Travel Agency</option>
                  <option>Tour Operator</option>
                  <option>Hotel / Resort</option>
                  <option>Corporate</option>
                  <option>Individual</option>
                </select>
              </div>
              <div class="form-group">
                <label class="form-label">Annual Budget</label>
                <select class="form-select">
                  <option>Under ₹1 Lakh</option>
                  <option selected>₹1L – ₹5L</option>
                  <option>₹5L – ₹20L</option>
                  <option>Above ₹20L</option>
                </select>
              </div>
              <div class="form-group form-full">
                <label class="form-label">Business Address</label>
                <input
                  class="form-input"
                  type="text"
                  value="14, Connaught Place, New Delhi – 110001"
                />
              </div>
            </div>
          </div>
          <div class="form-footer">
            <button class="cancel-btn">Cancel</button>
            <button class="save-btn">Update Business</button>
          </div>
        </div>

        <!-- Notification Preferences -->
        <div class="form-section">
          <div class="fs-header">Notification Preferences</div>
          <div class="pref-item">
            <div class="pref-label">
              <strong>Email Notifications</strong>
              <small>Service updates, assignments and invoices</small>
            </div>
            <label class="toggle"
              ><input type="checkbox" checked /><span
                class="toggle-slider"
              ></span
            ></label>
          </div>
          <div class="pref-item">
            <div class="pref-label">
              <strong>SMS Alerts</strong>
              <small>Important alerts on your mobile</small>
            </div>
            <label class="toggle"
              ><input type="checkbox" checked /><span
                class="toggle-slider"
              ></span
            ></label>
          </div>
          <div class="pref-item">
            <div class="pref-label">
              <strong>Payment Reminders</strong>
              <small>Get reminders before invoice due dates</small>
            </div>
            <label class="toggle"
              ><input type="checkbox" checked /><span
                class="toggle-slider"
              ></span
            ></label>
          </div>
          <div class="pref-item">
            <div class="pref-label">
              <strong>Promotional Offers</strong>
              <small>New services and exclusive client deals</small>
            </div>
            <label class="toggle"
              ><input type="checkbox" /><span class="toggle-slider"></span
            ></label>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
