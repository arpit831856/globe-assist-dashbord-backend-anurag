
    @extends('user.dashboard') {{-- Ye layout file ko connect karega --}}

@section('content')
    <div class="page">
      <!-- ── WELCOME BANNER ── -->
      <div class="welcome-banner">
        <div class="wb-blobs">
          <div class="wb-blob wb-blob-1"></div>
          <div class="wb-blob wb-blob-2"></div>
          <div class="wb-blob wb-blob-3"></div>
        </div>
        <div class="wb-inner">
          <div class="wb-left">
            <div class="wb-greeting">👋 Welcome back,</div>
            <div class="wb-name">Rahul Kumar</div>
            <div class="wb-subtitle">
              You have <strong>2 active service requests</strong> in progress
              right now.<br />
              Your Globe Assist team is on the job!
            </div>
            <div class="wb-chips">
              <span class="wb-chip"
                ><i class="fas fa-building"></i> TravelEase Pvt. Ltd.</span
              >
              <span class="wb-chip"
                ><i class="fas fa-map-marker-alt"></i> New Delhi</span
              >
              <span class="wb-chip"
                ><i class="fas fa-calendar-check"></i> Member since Jan
                2025</span
              >
            </div>
          </div>
          <div class="wb-right">
            <div class="wb-stat-box">
              <div class="wb-stat-val">05</div>
              <div class="wb-stat-lbl">Total Requests</div>
            </div>
            <div class="wb-stat-box">
              <div class="wb-stat-val">02</div>
              <div class="wb-stat-lbl">Active Now</div>
            </div>
            <div class="wb-stat-box">
              <div class="wb-stat-val">12</div>
              <div class="wb-stat-lbl">Pros Hired</div>
            </div>
          </div>
        </div>
      </div>

      <!-- ── QUICK ACTION CTAs ── -->
      <div class="cta-strip">
        <div class="cta-card">
          <div class="cta-icon g"><i class="fas fa-plus"></i></div>
          <div>
            <div class="cta-label">New Request</div>
            <div class="cta-sub">Hire a professional for your business</div>
          </div>
        </div>
        <div class="cta-card">
          <div class="cta-icon b"><i class="fas fa-users"></i></div>
          <div>
            <div class="cta-label">My Team</div>
            <div class="cta-sub">View all assigned professionals</div>
          </div>
        </div>
        <div class="cta-card">
          <div class="cta-icon o">
            <i class="fas fa-file-invoice-dollar"></i>
          </div>
          <div>
            <div class="cta-label">Invoices</div>
            <div class="cta-sub">Download billing &amp; invoices</div>
          </div>
        </div>
        <div class="cta-card">
          <div class="cta-icon p"><i class="fas fa-headset"></i></div>
          <div>
            <div class="cta-label">Support</div>
            <div class="cta-sub">Talk to your account manager</div>
          </div>
        </div>
      </div>

      <!-- ── ACTIVE REQUESTS TABLE ── -->
      <div class="sec-header">
        <span class="sec-title">Active Service Requests</span>
        <a href="#" class="sec-link">View all requests →</a>
      </div>

      <div class="requests-table">
        <div class="rt-row hdr">
          <span class="rt-head">Service</span>
          <span class="rt-head">Assigned Professional</span>
          <span class="rt-head">Start Date</span>
          <span class="rt-head">Duration</span>
          <span class="rt-head">Status</span>
          <span class="rt-head"></span>
        </div>

        <div class="rt-row">
          <div class="rt-cell">
            <div class="svc-name-main">
              <i
                class="fas fa-phone-alt"
                style="color: #148a3a; font-size: 12px"
              ></i>
              Telecaller
            </div>
            <div class="svc-sub">Inbound Lead Handling · 3 Agents</div>
          </div>
          <div class="rt-cell">
            <div style="font-weight: 600; font-size: 13px">Priya Sharma +2</div>
            <div style="font-size: 11.5px; color: var(--text-muted)">
              Team of 3 agents
            </div>
          </div>
          <div class="rt-cell mono muted">01 Feb 2026</div>
          <div class="rt-cell muted">30 Days</div>
          <div class="rt-cell">
            <span class="status-dot active">Active</span>
          </div>
          <div class="rt-cell"><button class="rt-action">Details</button></div>
        </div>

        <div class="rt-row">
          <div class="rt-cell">
            <div class="svc-name-main">
              <i
                class="fas fa-map-marked-alt"
                style="color: #2563eb; font-size: 12px"
              ></i>
              Tour Manager
            </div>
            <div class="svc-sub">Rajasthan Circuit · 8-Day Tour</div>
          </div>
          <div class="rt-cell">
            <div style="font-weight: 600; font-size: 13px">Arjun Mehta</div>
            <div style="font-size: 11.5px; color: var(--text-muted)">
              Senior Tour Manager
            </div>
          </div>
          <div class="rt-cell mono muted">15 Mar 2026</div>
          <div class="rt-cell muted">8 Days</div>
          <div class="rt-cell">
            <span class="status-dot briefing">Briefing</span>
          </div>
          <div class="rt-cell"><button class="rt-action">Details</button></div>
        </div>

        <div class="rt-row">
          <div class="rt-cell">
            <div class="svc-name-main">
              <i
                class="fas fa-camera"
                style="color: #ea580c; font-size: 12px"
              ></i>
              Content Creator
            </div>
            <div class="svc-sub">Reels + Blog · Social Media Pack</div>
          </div>
          <div class="rt-cell">
            <div style="font-weight: 600; font-size: 13px">Sneha Verma</div>
            <div style="font-size: 11.5px; color: var(--text-muted)">
              Travel Content Specialist
            </div>
          </div>
          <div class="rt-cell mono muted">20 Feb 2026</div>
          <div class="rt-cell muted">15 Days</div>
          <div class="rt-cell">
            <span class="status-dot pending">In Review</span>
          </div>
          <div class="rt-cell"><button class="rt-action">Details</button></div>
        </div>

        <div class="rt-row">
          <div class="rt-cell">
            <div class="svc-name-main">
              <i
                class="fas fa-hard-hat"
                style="color: #7c3aed; font-size: 12px"
              ></i>
              Ground Operator
            </div>
            <div class="svc-sub">Kerala Backwaters · Logistics</div>
          </div>
          <div class="rt-cell">
            <div style="font-weight: 600; font-size: 13px">Ravi Nair</div>
            <div style="font-size: 11.5px; color: var(--text-muted)">
              Ground Operations Lead
            </div>
          </div>
          <div class="rt-cell mono muted">05 Jan 2026</div>
          <div class="rt-cell muted">10 Days</div>
          <div class="rt-cell">
            <span class="status-dot completed">Completed</span>
          </div>
          <div class="rt-cell"><button class="rt-action">Rate</button></div>
        </div>
      </div>

      <!-- ── LOWER SECTION ── -->
      <div class="lower-grid">
        <!-- Assigned Professionals -->
        <div class="card">
          <div class="card-hdr">
            <span class="card-hdr-title">Assigned Professionals</span>
            <a href="#" class="card-hdr-link">View all →</a>
          </div>

          <div class="pro-item">
            <div class="pro-avatar">PS</div>
            <div class="pro-info">
              <div class="pro-name">Priya Sharma</div>
              <div class="pro-role">Telecaller · Inbound Sales</div>
              <div class="pro-meta">
                <span class="pro-rating">★ 4.8</span>
                <span class="pro-since">Since 01 Feb</span>
              </div>
            </div>
            <span class="pro-badge active">Active</span>
          </div>

          <div class="pro-item">
            <div class="pro-avatar" style="background: #eff6ff; color: #2563eb">
              AM
            </div>
            <div class="pro-info">
              <div class="pro-name">Arjun Mehta</div>
              <div class="pro-role">Tour Manager · Senior</div>
              <div class="pro-meta">
                <span class="pro-rating">★ 4.9</span>
                <span class="pro-since">Starts 15 Mar</span>
              </div>
            </div>
            <span class="pro-badge briefing">Briefing</span>
          </div>

          <div class="pro-item">
            <div class="pro-avatar" style="background: #fff7ed; color: #ea580c">
              SV
            </div>
            <div class="pro-info">
              <div class="pro-name">Sneha Verma</div>
              <div class="pro-role">Content Creator · Travel &amp; Social</div>
              <div class="pro-meta">
                <span class="pro-rating">★ 4.7</span>
                <span class="pro-since">Since 20 Feb</span>
              </div>
            </div>
            <span class="pro-badge review">In Review</span>
          </div>

          <div class="pro-item">
            <div class="pro-avatar" style="background: #f5f3ff; color: #7c3aed">
              RN
            </div>
            <div class="pro-info">
              <div class="pro-name">Ravi Nair</div>
              <div class="pro-role">Ground Operator · Kerala</div>
              <div class="pro-meta">
                <span class="pro-rating">★ 5.0</span>
                <span class="pro-since">Completed</span>
              </div>
            </div>
            <span class="pro-badge done">Done</span>
          </div>
        </div>

        <!-- Right column: Billing + Activity -->
        <div style="display: flex; flex-direction: column; gap: 16px">
          <!-- Billing Summary -->
          <div class="card">
            <div class="card-hdr">
              <span class="card-hdr-title">Billing Summary</span>
              <a href="#" class="card-hdr-link">Invoices</a>
            </div>
            <div class="pay-due-banner">
              <div class="pdb-text">
                Amount Due
                <strong>₹18,500</strong>
              </div>
              <button class="pdb-btn">Pay Now</button>
            </div>
            <div class="bill-body">
              <div class="bill-row">
                <span class="bill-label">This Month (Feb)</span>
                <span class="bill-val">₹42,000</span>
              </div>
              <div class="bill-row">
                <span class="bill-label">Paid</span>
                <span class="bill-val green">₹23,500</span>
              </div>
              <div class="bill-row">
                <span class="bill-label">Pending</span>
                <span class="bill-val red">₹18,500</span>
              </div>
              <div class="bill-row">
                <span class="bill-label">Due Date</span>
                <span class="bill-val" style="font-size: 12.5px"
                  >15 Mar 2026</span
                >
              </div>
            </div>
          </div>

          <!-- Recent Activity -->
          <div class="card">
            <div class="card-hdr">
              <span class="card-hdr-title">Recent Activity</span>
            </div>
            <div class="act-item">
              <div class="act-icon g"><i class="fas fa-user-check"></i></div>
              <div class="act-body">
                <div class="act-text">
                  <strong>Arjun Mehta</strong> assigned to your Rajasthan Tour
                  request
                </div>
                <div class="act-time">Today, 11:30 AM</div>
              </div>
            </div>
            <div class="act-item">
              <div class="act-icon y"><i class="fas fa-file-alt"></i></div>
              <div class="act-body">
                <div class="act-text">
                  Sneha submitted content draft —
                  <strong>pending your review</strong>
                </div>
                <div class="act-time">Yesterday, 4:20 PM</div>
              </div>
            </div>
            <div class="act-item">
              <div class="act-icon b"><i class="fas fa-rupee-sign"></i></div>
              <div class="act-body">
                <div class="act-text">
                  Invoice ₹23,500 paid · Telecaller package Feb
                </div>
                <div class="act-time">2 days ago</div>
              </div>
            </div>
            <div class="act-item">
              <div class="act-icon o"><i class="fas fa-star"></i></div>
              <div class="act-body">
                <div class="act-text">
                  You rated Ravi Nair ★ 5.0 · Kerala Ground Ops
                </div>
                <div class="act-time">08 Feb 2026</div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- ── EXPLORE MORE SERVICES ── -->
      <div class="sec-header">
        <span class="sec-title">Explore More Services</span>
        <a href="#" class="sec-link">Browse all →</a>
      </div>
      <div class="qs-grid">
        <div class="qs-card">
          <span class="qs-emoji">📞</span>
          <div class="qs-name">Telecaller</div>
          <div class="qs-desc">
            Trained agents handling inbound &amp; outbound travel leads
          </div>
          <span class="qs-tag">Most Popular</span>
        </div>
        <div class="qs-card">
          <span class="qs-emoji">🗺️</span>
          <div class="qs-name">Tour Manager</div>
          <div class="qs-desc">
            On-ground management for domestic &amp; international circuits
          </div>
          <span class="qs-tag">Available Now</span>
        </div>
        <div class="qs-card">
          <span class="qs-emoji">🏕️</span>
          <div class="qs-name">Ground Operator</div>
          <div class="qs-desc">
            Local logistics, coordination &amp; guest management at destination
          </div>
          <span class="qs-tag">Pan India</span>
        </div>
        <div class="qs-card">
          <span class="qs-emoji">🎬</span>
          <div class="qs-name">Content Creator</div>
          <div class="qs-desc">
            Reels, blogs &amp; social media content for your travel brand
          </div>
          <span class="qs-tag">New</span>
        </div>
      </div>
    </div>
    @endsection
  
