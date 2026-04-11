<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Support</title>
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
        max-width: 820px;
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

      /* Search Hero */
      .search-hero {
        background: linear-gradient(118deg, var(--green-dark), #1fa84f);
        border-radius: var(--radius);
        padding: 32px 28px;
        margin-bottom: 26px;
        text-align: center;
        box-shadow: 0 6px 24px rgba(20, 138, 58, 0.2);
      }
      .search-hero h2 {
        font-family: var(--font-display);
        font-size: clamp(18px, 3vw, 22px);
        font-weight: 700;
        color: #fff;
        margin-bottom: 6px;
      }
      .search-hero p {
        font-size: 14px;
        color: rgba(255, 255, 255, 0.82);
        margin-bottom: 20px;
      }
      .search-row {
        display: flex;
        background: #fff;
        border-radius: 50px;
        overflow: hidden;
        max-width: 480px;
        margin: 0 auto;
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.12);
      }
      .search-input {
        flex: 1;
        border: none;
        padding: 12px 18px;
        font-family: var(--font-body);
        font-size: 14px;
        color: var(--text);
        outline: none;
        min-width: 0;
      }
      .search-btn {
        padding: 12px 20px;
        background: var(--green);
        color: #fff;
        border: none;
        cursor: pointer;
        font-family: var(--font-body);
        font-size: 14px;
        font-weight: 600;
        flex-shrink: 0;
        transition: background 0.2s;
      }
      .search-btn:hover {
        background: var(--green-dark);
      }

      /* Section title */
      .section-title {
        font-size: 16px;
        font-weight: 700;
        margin-bottom: 14px;
      }

      /* Contact channels */
      .channels-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 14px;
        margin-bottom: 26px;
      }
      @media (max-width: 600px) {
        .channels-grid {
          grid-template-columns: 1fr;
        }
      }
      @media (max-width: 800px) and (min-width: 601px) {
        .channels-grid {
          grid-template-columns: 1fr 1fr;
        }
      }

      .channel-card {
        background: var(--white);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        padding: 22px 18px;
        box-shadow: var(--shadow-xs);
        cursor: pointer;
        text-align: center;
        transition:
          transform 0.2s,
          box-shadow 0.2s;
      }
      .channel-card:hover {
        transform: translateY(-3px);
        box-shadow: var(--shadow-md);
      }
      .ch-icon {
        width: 52px;
        height: 52px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        margin: 0 auto 12px;
      }
      .ch-icon.chat {
        background: var(--green-light);
        color: var(--green);
      }
      .ch-icon.phone {
        background: #eff6ff;
        color: #2563eb;
      }
      .ch-icon.email {
        background: #fff7ed;
        color: #ea580c;
      }
      .ch-title {
        font-size: 15px;
        font-weight: 700;
        margin-bottom: 4px;
      }
      .ch-desc {
        font-size: 12.5px;
        color: var(--text-muted);
        line-height: 1.55;
      }
      .ch-avail {
        font-size: 11px;
        font-weight: 600;
        margin-top: 10px;
      }
      .ch-avail.online {
        color: var(--green);
      }
      .ch-avail.offline {
        color: #f59e0b;
      }

      /* FAQ */
      .faq-card {
        background: var(--white);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        overflow: hidden;
        box-shadow: var(--shadow-xs);
        margin-bottom: 26px;
      }
      .faq-item {
        border-bottom: 1px solid var(--border);
      }
      .faq-item:last-child {
        border-bottom: none;
      }

      .faq-q {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 16px 20px;
        cursor: pointer;
        font-size: 14.5px;
        font-weight: 500;
        transition: background 0.15s;
        gap: 12px;
      }
      .faq-q:hover {
        background: #fafafa;
      }
      .faq-q i {
        font-size: 11px;
        color: var(--text-muted);
        flex-shrink: 0;
        transition: transform 0.25s;
      }
      .faq-a {
        font-size: 13.5px;
        color: var(--text-muted);
        line-height: 1.7;
        padding: 0 20px 16px;
        display: none;
      }
      .faq-item.open .faq-q i {
        transform: rotate(180deg);
      }
      .faq-item.open .faq-q {
        color: var(--green);
      }
      .faq-item.open .faq-a {
        display: block;
      }

      /* Ticket form */
      .form-card {
        background: var(--white);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        overflow: hidden;
        box-shadow: var(--shadow-xs);
      }
      .form-header {
        padding: 18px 22px;
        border-bottom: 1px solid var(--border);
      }
      .form-title {
        font-size: 15px;
        font-weight: 700;
      }
      .form-sub {
        font-size: 13px;
        color: var(--text-muted);
        margin-top: 3px;
      }
      .form-body {
        padding: 22px;
        display: flex;
        flex-direction: column;
        gap: 16px;
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

      .form-input,
      .form-select,
      .form-textarea {
        padding: 10px 14px;
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
      .form-select:focus,
      .form-textarea:focus {
        border-color: var(--green);
        background: var(--white);
      }
      .form-select {
        cursor: pointer;
      }
      .form-textarea {
        min-height: 110px;
        resize: vertical;
      }

      .form-grid-2 {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 14px;
      }
      @media (max-width: 520px) {
        .form-grid-2 {
          grid-template-columns: 1fr;
        }
      }

      .form-footer {
        padding: 14px 22px;
        border-top: 1px solid var(--border);
        display: flex;
        justify-content: flex-end;
      }
      .submit-btn {
        padding: 11px 26px;
        background: var(--green);
        color: #fff;
        border: none;
        border-radius: 50px;
        font-family: var(--font-body);
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.2s;
        display: flex;
        align-items: center;
        gap: 8px;
      }
      .submit-btn:hover {
        background: var(--green-dark);
      }

      @media (max-width: 500px) {
        .page-wrap {
          padding: 20px 12px 40px;
        }
        .search-hero {
          padding: 24px 16px;
        }
        .faq-q {
          padding: 14px 16px;
          font-size: 13.5px;
        }
        .faq-a {
          padding: 0 16px 14px;
        }
        .form-body {
          padding: 16px;
        }
      }
    </style>
  </head>
  <body>
    <div class="page-wrap">
      <div class="page">
        <h1 class="page-title">Support</h1>
        <p class="page-sub">We're here to help you 24/7</p>

        <!-- Search Hero -->
        <div class="search-hero">
          <h2>How can we help you?</h2>
          <p>Search our knowledge base or get in touch with our team</p>
          <div class="search-row">
            <input
              class="search-input"
              type="text"
              placeholder="Search for answers…"
            />
            <button class="search-btn">
              <i class="fas fa-search"></i> Search
            </button>
          </div>
        </div>

        <!-- Contact Channels -->
        <div class="section-title">Get In Touch</div>
        <div class="channels-grid">
          <div class="channel-card">
            <div class="ch-icon chat"><i class="fas fa-comments"></i></div>
            <div class="ch-title">Live Chat</div>
            <div class="ch-desc">
              Chat with our service experts in real time
            </div>
            <div class="ch-avail online">● Online Now</div>
          </div>
          <div class="channel-card">
            <div class="ch-icon phone"><i class="fas fa-phone-alt"></i></div>
            <div class="ch-title">Call Us</div>
            <div class="ch-desc">+91 1800-123-4567 · Toll Free</div>
            <div class="ch-avail online">● Available 9AM–9PM</div>
          </div>
          <div class="channel-card">
            <div class="ch-icon email"><i class="fas fa-envelope"></i></div>
            <div class="ch-title">Email</div>
            <div class="ch-desc">
              support@globeassist.in · Reply within 24 hrs
            </div>
            <div class="ch-avail offline">● Usually 24h response</div>
          </div>
        </div>

        <!-- FAQ -->
        <div class="section-title">Frequently Asked Questions</div>
        <div class="faq-card">
          <div class="faq-item open">
            <div class="faq-q" onclick="toggleFaq(this)">
              How do I request a new service or professional?
              <i class="fas fa-chevron-down"></i>
            </div>
            <div class="faq-a">
              Click "New Request" on the Services page or Overview dashboard.
              Choose your service type (Telecaller, Tour Manager, Ground
              Operator, or Content Creator), fill in your requirements, and our
              team will assign the best-matched professional within 24 hours.
            </div>
          </div>

          <div class="faq-item">
            <div class="faq-q" onclick="toggleFaq(this)">
              How can I communicate with my assigned professional?
              <i class="fas fa-chevron-down"></i>
            </div>
            <div class="faq-a">
              Once a professional is assigned to your request, a dedicated chat
              thread is created. You can access it via the Messages icon in the
              header or directly from the Services page by clicking "Chat" on
              the relevant service card.
            </div>
          </div>

          <div class="faq-item">
            <div class="faq-q" onclick="toggleFaq(this)">
              Can I replace or change my assigned professional?
              <i class="fas fa-chevron-down"></i>
            </div>
            <div class="faq-a">
              Yes. Go to the relevant service in My Services, click "Details",
              and use the "Request Replacement" option. Our team will review and
              assign a new professional within 24–48 hours. This is available
              once per service request at no extra cost.
            </div>
          </div>

          <div class="faq-item">
            <div class="faq-q" onclick="toggleFaq(this)">
              What payment methods are accepted?
              <i class="fas fa-chevron-down"></i>
            </div>
            <div class="faq-a">
              We accept VISA, Mastercard, RuPay (debit/credit), all major UPI
              apps (Google Pay, PhonePe, Paytm), and net banking from major
              Indian banks. All transactions are secured with 256-bit SSL
              encryption.
            </div>
          </div>

          <div class="faq-item">
            <div class="faq-q" onclick="toggleFaq(this)">
              How do I cancel a service and get a refund?
              <i class="fas fa-chevron-down"></i>
            </div>
            <div class="faq-a">
              Cancellations can be made from the Services page up to 48 hours
              before the service start date for a full refund. After that, a 20%
              cancellation fee applies. Refunds are processed within 5–7
              business days to your original payment method.
            </div>
          </div>

          <div class="faq-item">
            <div class="faq-q" onclick="toggleFaq(this)">
              Is my business data safe with Globe Assist?
              <i class="fas fa-chevron-down"></i>
            </div>
            <div class="faq-a">
              Absolutely. We follow GDPR-compliant data practices and use
              enterprise-grade encryption. Your business information and client
              data are never shared with third parties. All professionals sign
              NDAs before being assigned to your account.
            </div>
          </div>
        </div>

        <!-- Support Ticket -->
        <div class="section-title">Submit a Support Ticket</div>
        <div class="form-card">
          <div class="form-header">
            <div class="form-title">Can't find what you need?</div>
            <div class="form-sub">We'll get back to you within 24 hours</div>
          </div>
          <div class="form-body">
            <div class="form-grid-2">
              <div class="form-group">
                <label class="form-label">Issue Type</label>
                <select class="form-select">
                  <option>Service Request Issue</option>
                  <option>Professional Assignment</option>
                  <option>Payment Problem</option>
                  <option>Refund Request</option>
                  <option>Account Access</option>
                  <option>Other</option>
                </select>
              </div>
              <div class="form-group">
                <label class="form-label"
                  >Service Reference (if applicable)</label
                >
                <input
                  class="form-input"
                  type="text"
                  placeholder="e.g. GA-2026-00124"
                />
              </div>
            </div>
            <div class="form-group">
              <label class="form-label">Subject</label>
              <input
                class="form-input"
                type="text"
                placeholder="Brief description of your issue"
              />
            </div>
            <div class="form-group">
              <label class="form-label">Describe your issue</label>
              <textarea
                class="form-textarea"
                placeholder="Please provide as much detail as possible…"
              ></textarea>
            </div>
          </div>
          <div class="form-footer">
            <button class="submit-btn">
              <i class="fas fa-paper-plane"></i> Submit Ticket
            </button>
          </div>
        </div>
      </div>
    </div>

    <script>
      function toggleFaq(el) {
        el.parentElement.classList.toggle("open");
      }
    </script>
  </body>
</html>
