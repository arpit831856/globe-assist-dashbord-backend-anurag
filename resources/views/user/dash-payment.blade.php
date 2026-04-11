<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Payment</title>
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
        max-width: 860px;
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
        margin-bottom: 28px;
      }

      /* Summary cards */
      .summary-row {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 14px;
        margin-bottom: 24px;
      }
      @media (max-width: 600px) {
        .summary-row {
          grid-template-columns: 1fr 1fr;
        }
      }
      @media (max-width: 380px) {
        .summary-row {
          grid-template-columns: 1fr;
        }
      }

      .sum-card {
        background: var(--white);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        padding: 18px 20px;
        box-shadow: var(--shadow-xs);
        transition:
          transform 0.2s,
          box-shadow 0.2s;
      }
      .sum-card:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-md);
      }
      .sum-icon {
        font-size: 22px;
        margin-bottom: 10px;
      }
      .sum-val {
        font-family: var(--font-mono);
        font-size: 22px;
        font-weight: 700;
        color: var(--text);
      }
      .sum-lbl {
        font-size: 12.5px;
        color: var(--text-muted);
        margin-top: 4px;
      }

      /* Due banner */
      .due-banner {
        background: linear-gradient(118deg, var(--green-dark), #1fa84f);
        border-radius: var(--radius);
        padding: 18px 24px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 14px;
        margin-bottom: 24px;
        flex-wrap: wrap;
        box-shadow: 0 6px 20px rgba(20, 138, 58, 0.22);
      }
      .due-left {
      }
      .due-label {
        font-size: 12px;
        color: rgba(255, 255, 255, 0.8);
        font-weight: 500;
        margin-bottom: 3px;
      }
      .due-amount {
        font-family: var(--font-mono);
        font-size: 28px;
        font-weight: 700;
        color: #fff;
        line-height: 1;
      }
      .due-date {
        font-size: 12px;
        color: rgba(255, 255, 255, 0.72);
        margin-top: 5px;
      }
      .due-pay-btn {
        background: #fff;
        color: var(--green);
        border: none;
        border-radius: 50px;
        padding: 11px 28px;
        font-family: var(--font-body);
        font-size: 14px;
        font-weight: 700;
        cursor: pointer;
        transition:
          transform 0.15s,
          box-shadow 0.15s;
        white-space: nowrap;
        flex-shrink: 0;
      }
      .due-pay-btn:hover {
        transform: scale(1.04);
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.18);
      }

      /* Two col */
      .two-col {
        display: grid;
        grid-template-columns: 1fr 300px;
        gap: 18px;
      }
      @media (max-width: 780px) {
        .two-col {
          grid-template-columns: 1fr;
        }
      }

      .card {
        background: var(--white);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        overflow: hidden;
        box-shadow: var(--shadow-xs);
      }
      .card-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 15px 20px;
        border-bottom: 1px solid var(--border);
      }
      .card-title {
        font-size: 15px;
        font-weight: 700;
      }
      .card-action {
        background: none;
        border: none;
        cursor: pointer;
        font-size: 12.5px;
        color: var(--green);
        font-weight: 500;
        font-family: var(--font-body);
        transition: color 0.2s;
      }
      .card-action:hover {
        color: var(--green-dark);
        text-decoration: underline;
      }

      /* Transactions */
      .txn-item {
        display: flex;
        align-items: center;
        gap: 13px;
        padding: 13px 20px;
        border-bottom: 1px solid var(--border-soft);
        transition: background 0.15s;
      }
      .txn-item:last-child {
        border-bottom: none;
      }
      .txn-item:hover {
        background: #fafafa;
      }

      .txn-icon {
        width: 38px;
        height: 38px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        flex-shrink: 0;
      }
      .txn-icon.debit {
        background: #fee2e2;
        color: #dc2626;
      }
      .txn-icon.credit {
        background: #dcfce7;
        color: #166534;
      }

      .txn-info {
        flex: 1;
        min-width: 0;
      }
      .txn-name {
        font-size: 13.5px;
        font-weight: 500;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
      }
      .txn-date {
        font-size: 11.5px;
        color: var(--text-muted);
        margin-top: 2px;
        font-family: var(--font-mono);
      }

      .txn-amount {
        font-family: var(--font-mono);
        font-size: 14px;
        font-weight: 700;
        flex-shrink: 0;
      }
      .txn-amount.debit {
        color: #dc2626;
      }
      .txn-amount.credit {
        color: var(--green);
      }

      /* Invoice list */
      .inv-item {
        display: flex;
        align-items: center;
        gap: 13px;
        padding: 13px 20px;
        border-bottom: 1px solid var(--border-soft);
        transition: background 0.15s;
      }
      .inv-item:last-child {
        border-bottom: none;
      }
      .inv-item:hover {
        background: #fafafa;
      }

      .inv-icon {
        width: 36px;
        height: 36px;
        border-radius: 9px;
        background: var(--green-light);
        color: var(--green);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        flex-shrink: 0;
      }
      .inv-info {
        flex: 1;
        min-width: 0;
      }
      .inv-name {
        font-size: 13px;
        font-weight: 600;
      }
      .inv-date {
        font-size: 11px;
        color: var(--text-muted);
        margin-top: 2px;
        font-family: var(--font-mono);
      }
      .inv-amount {
        font-family: var(--font-mono);
        font-size: 13px;
        font-weight: 700;
        color: var(--text);
        flex-shrink: 0;
        text-align: right;
      }
      .inv-status {
        font-size: 10.5px;
        font-weight: 600;
        margin-top: 2px;
      }
      .inv-status.paid {
        color: var(--green);
      }
      .inv-status.pending {
        color: #ca8a04;
      }

      /* Payment methods */
      .pm-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 13px 20px;
        border-bottom: 1px solid var(--border-soft);
      }
      .pm-item:last-child {
        border-bottom: none;
      }

      .pm-chip {
        width: 46px;
        height: 30px;
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 10px;
        font-weight: 800;
        flex-shrink: 0;
        letter-spacing: 0.5px;
      }
      .pm-chip.visa {
        background: #1a1f71;
        color: #fff;
      }
      .pm-chip.rupay {
        background: var(--green-light);
        color: var(--green);
        font-size: 9px;
      }
      .pm-chip.upi {
        background: #fff7ed;
        color: #ea580c;
        font-size: 15px;
      }

      .pm-info {
        flex: 1;
      }
      .pm-name {
        font-size: 13.5px;
        font-weight: 500;
      }
      .pm-num {
        font-size: 11.5px;
        color: var(--text-muted);
        font-family: var(--font-mono);
        margin-top: 2px;
      }
      .pm-default {
        font-size: 10.5px;
        font-weight: 700;
        padding: 2px 8px;
        border-radius: 50px;
        background: var(--green-light);
        color: var(--green);
        flex-shrink: 0;
      }

      .add-method-btn {
        display: flex;
        align-items: center;
        gap: 9px;
        padding: 13px 20px;
        background: none;
        border: none;
        border-top: 1.5px dashed var(--border);
        cursor: pointer;
        font-family: var(--font-body);
        font-size: 13.5px;
        font-weight: 500;
        color: var(--green);
        width: 100%;
        text-align: left;
        transition: background 0.15s;
      }
      .add-method-btn:hover {
        background: var(--green-light);
      }

      @media (max-width: 500px) {
        .page-wrap {
          padding: 20px 12px 40px;
        }
      }
    </style>
  </head>
  <body>
    <div class="page-wrap">
      <div class="page">
        <h1 class="page-title">Payment</h1>
        <p class="page-sub">Manage your service payments and billing</p>

        <!-- Summary -->
        <div class="summary-row">
          <div class="sum-card">
            <div class="sum-icon">💰</div>
            <div class="sum-val">₹71,500</div>
            <div class="sum-lbl">Total Paid (All Time)</div>
          </div>
          <div class="sum-card">
            <div class="sum-icon">⏳</div>
            <div class="sum-val">₹18,500</div>
            <div class="sum-lbl">Due This Month</div>
          </div>
          <div class="sum-card">
            <div class="sum-icon">📄</div>
            <div class="sum-val">06</div>
            <div class="sum-lbl">Total Invoices</div>
          </div>
        </div>

        <!-- Due Now Banner -->
        <div class="due-banner">
          <div class="due-left">
            <div class="due-label">Amount Due</div>
            <div class="due-amount">₹18,500</div>
            <div class="due-date">
              Due by 15 March 2026 · Invoice #GA-2026-0118
            </div>
          </div>
          <button class="due-pay-btn">
            <i class="fas fa-arrow-right"></i> Pay Now
          </button>
        </div>

        <div class="two-col">
          <!-- Transactions -->
          <div>
            <div class="card" style="margin-bottom: 18px">
              <div class="card-header">
                <span class="card-title">Transaction History</span>
                <button class="card-action">
                  <i class="fas fa-download"></i> Download PDF
                </button>
              </div>

              <div class="txn-item">
                <div class="txn-icon debit"><i class="fas fa-minus"></i></div>
                <div class="txn-info">
                  <div class="txn-name">Telecaller Package — Feb 2026</div>
                  <div class="txn-date">09 Mar 2026 · UPI</div>
                </div>
                <div class="txn-amount debit">−₹18,000</div>
              </div>

              <div class="txn-item">
                <div class="txn-icon debit"><i class="fas fa-minus"></i></div>
                <div class="txn-info">
                  <div class="txn-name">
                    Content Creator — Social Media Pack
                  </div>
                  <div class="txn-date">20 Feb 2026 · VISA ****4521</div>
                </div>
                <div class="txn-amount debit">−₹9,500</div>
              </div>

              <div class="txn-item">
                <div class="txn-icon debit"><i class="fas fa-minus"></i></div>
                <div class="txn-info">
                  <div class="txn-name">Tour Manager — Rajasthan Advance</div>
                  <div class="txn-date">15 Feb 2026 · VISA ****4521</div>
                </div>
                <div class="txn-amount debit">−₹14,000</div>
              </div>

              <div class="txn-item">
                <div class="txn-icon credit"><i class="fas fa-plus"></i></div>
                <div class="txn-info">
                  <div class="txn-name">Refund — Cancelled Telecaller Slot</div>
                  <div class="txn-date">10 Feb 2026 · Bank Transfer</div>
                </div>
                <div class="txn-amount credit">+₹3,000</div>
              </div>

              <div class="txn-item">
                <div class="txn-icon debit"><i class="fas fa-minus"></i></div>
                <div class="txn-info">
                  <div class="txn-name">
                    Ground Operator — Kerala Backwaters
                  </div>
                  <div class="txn-date">05 Jan 2026 · RuPay ****8832</div>
                </div>
                <div class="txn-amount debit">−₹22,000</div>
              </div>

              <div class="txn-item">
                <div class="txn-icon debit"><i class="fas fa-minus"></i></div>
                <div class="txn-info">
                  <div class="txn-name">Telecaller Package — Jan 2026</div>
                  <div class="txn-date">01 Jan 2026 · UPI</div>
                </div>
                <div class="txn-amount debit">−₹18,000</div>
              </div>
            </div>

            <!-- Invoices -->
            <div class="card">
              <div class="card-header">
                <span class="card-title">Recent Invoices</span>
              </div>

              <div class="inv-item">
                <div class="inv-icon"><i class="fas fa-file-invoice"></i></div>
                <div class="inv-info">
                  <div class="inv-name">Telecaller Package — Feb</div>
                  <div class="inv-date">#GA-2026-0112 · 01 Feb 2026</div>
                </div>
                <div>
                  <div class="inv-amount">₹18,000</div>
                  <div class="inv-status paid">✓ Paid</div>
                </div>
              </div>

              <div class="inv-item">
                <div class="inv-icon"><i class="fas fa-file-invoice"></i></div>
                <div class="inv-info">
                  <div class="inv-name">Tour Manager — Rajasthan</div>
                  <div class="inv-date">#GA-2026-0118 · 15 Mar 2026</div>
                </div>
                <div>
                  <div class="inv-amount">₹28,000</div>
                  <div class="inv-status pending">⏳ Due</div>
                </div>
              </div>

              <div class="inv-item">
                <div class="inv-icon"><i class="fas fa-file-invoice"></i></div>
                <div class="inv-info">
                  <div class="inv-name">Content Creator Pack</div>
                  <div class="inv-date">#GA-2026-0109 · 20 Feb 2026</div>
                </div>
                <div>
                  <div class="inv-amount">₹9,500</div>
                  <div class="inv-status paid">✓ Paid</div>
                </div>
              </div>
            </div>
          </div>

          <!-- Right: Payment Methods -->
          <div>
            <div class="card">
              <div class="card-header">
                <span class="card-title">Payment Methods</span>
              </div>

              <div class="pm-item">
                <div class="pm-chip visa">VISA</div>
                <div class="pm-info">
                  <div class="pm-name">VISA Credit Card</div>
                  <div class="pm-num">**** **** **** 4521</div>
                </div>
                <span class="pm-default">Default</span>
              </div>

              <div class="pm-item">
                <div class="pm-chip rupay">RuPay</div>
                <div class="pm-info">
                  <div class="pm-name">RuPay Debit Card</div>
                  <div class="pm-num">**** **** **** 8832</div>
                </div>
              </div>

              <div class="pm-item">
                <div class="pm-chip upi"><i class="fas fa-mobile-alt"></i></div>
                <div class="pm-info">
                  <div class="pm-name">UPI</div>
                  <div class="pm-num">rahul@paytm</div>
                </div>
              </div>

              <button class="add-method-btn">
                <i class="fas fa-plus-circle"></i> Add New Method
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
