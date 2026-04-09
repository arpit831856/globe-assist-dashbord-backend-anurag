@extends('admin.layouts.app')

@section('title', 'Complaints')

@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap');

    .comp-page * { font-family: 'Inter', sans-serif; box-sizing: border-box; }

    /* ── KPI CARDS ── */
    .kpi-card {
        border-radius: 12px;
        padding: 20px 22px;
        background: #fff;
        border: 1px solid #e9ecef;
        box-shadow: 0 1px 4px rgba(0,0,0,.06);
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    .kpi-top  { display: flex; align-items: center; justify-content: space-between; }
    .kpi-label { font-size: 12px; font-weight: 500; letter-spacing: .5px; text-transform: uppercase; color: #6c757d; }
    .kpi-icon  { width: 36px; height: 36px; border-radius: 9px; display: grid; place-items: center; }
    .kpi-amount { font-size: 28px; font-weight: 700; letter-spacing: -.5px; font-family: 'JetBrains Mono', monospace; color: #1e293b; }
    .kpi-footer { display: flex; align-items: center; gap: 8px; font-size: 12px; color: #6c757d; }
    .kpi-pill   { font-size: 11px; font-weight: 600; padding: 2px 8px; border-radius: 20px; display: inline-flex; align-items: center; }

    .pill-green { background: #d1fae5; color: #065f46; }
    .pill-amber { background: #fef3c7; color: #92400e; }
    .pill-red   { background: #fee2e2; color: #991b1b; }
    .pill-blue  { background: #dbeafe; color: #1e40af; }

    .kpi-bar-track { height: 4px; background: #f1f3f5; border-radius: 4px; overflow: hidden; }
    .kpi-bar-fill  { height: 100%; border-radius: 4px; }

    .icon-total    { background: #dbeafe; color: #2563eb; }
    .icon-open     { background: #fee2e2; color: #dc2626; }
    .icon-progress { background: #fef3c7; color: #d97706; }
    .icon-resolved { background: #d1fae5; color: #16a34a; }

    .bar-total    { background: #3b82f6; width: 100%; }
    .bar-open     { background: #ef4444; width: 40%; }
    .bar-progress { background: #f59e0b; width: 35%; }
    .bar-resolved { background: #22c55e; width: 25%; }

    /* ── TABLE CARD ── */
    .comp-card {
        background: #fff;
        border: 1px solid #e9ecef;
        border-radius: 14px;
        box-shadow: 0 1px 4px rgba(0,0,0,.06);
        overflow: hidden;
    }

    /* ── TOOLBAR ── */
    .comp-toolbar {
        padding: 18px 22px;
        border-bottom: 1px solid #f1f3f5;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 14px;
    }
    .comp-toolbar-title { font-size: 15px; font-weight: 600; color: #1e293b; margin: 0; }
    .comp-toolbar-sub   { font-size: 12px; color: #6c757d; margin-top: 2px; }
    .comp-controls { display: flex; align-items: center; gap: 8px; flex-wrap: wrap; }

    /* Search */
    .comp-search { position: relative; }
    .comp-search svg {
        position: absolute; left: 10px; top: 50%; transform: translateY(-50%);
        width: 14px; height: 14px; color: #adb5bd; pointer-events: none;
    }
    .comp-search input {
        border: 1px solid #dee2e6; border-radius: 8px;
        padding: 7px 12px 7px 32px; font-size: 13px;
        font-family: 'Inter', sans-serif; width: 210px;
        outline: none; color: #1e293b; background: #f8f9fa;
        transition: border-color .2s, background .2s;
    }
    .comp-search input:focus { border-color: #0d6efd; background: #fff; }
    .comp-search input::placeholder { color: #adb5bd; }

    .comp-select, .comp-date {
        border: 1px solid #dee2e6; border-radius: 8px;
        padding: 7px 11px; font-size: 13px;
        font-family: 'Inter', sans-serif; color: #495057;
        background: #f8f9fa; outline: none; cursor: pointer;
        transition: border-color .2s;
    }
    .comp-select:focus, .comp-date:focus { border-color: #0d6efd; background: #fff; }

    /* Status pills */
    .status-pills { display: flex; gap: 5px; }
    .s-pill {
        font-size: 12px; font-weight: 500; padding: 5px 13px;
        border-radius: 20px; border: 1px solid #dee2e6;
        background: transparent; color: #6c757d;
        cursor: pointer; font-family: 'Inter', sans-serif; transition: all .15s;
    }
    .s-pill:hover { background: #f8f9fa; color: #212529; }
    .sp-all      { background: #e8eaff; color: #3730a3; border-color: #c7d2fe; }
    .sp-open     { background: #fee2e2; color: #991b1b; border-color: #fca5a5; }
    .sp-progress { background: #fef3c7; color: #92400e; border-color: #fde68a; }
    .sp-resolved { background: #d1fae5; color: #065f46; border-color: #a7f3d0; }

    .btn-export {
        border: 1px solid #dee2e6; background: #fff; color: #495057;
        border-radius: 8px; padding: 7px 14px; font-size: 13px;
        font-family: 'Inter', sans-serif; font-weight: 500;
        cursor: pointer; display: inline-flex; align-items: center;
        gap: 6px; transition: all .18s;
    }
    .btn-export:hover { background: #f8f9fa; border-color: #adb5bd; }
    .btn-export svg { width: 14px; height: 14px; }

    /* ── TABLE ── */
    .comp-table { width: 100%; border-collapse: collapse; font-size: 13.5px; }
    .comp-table thead tr { background: #f8f9fa; border-bottom: 1px solid #e9ecef; }
    .comp-table thead th {
        padding: 12px 18px; text-align: left;
        font-size: 11px; font-weight: 600; letter-spacing: .6px;
        text-transform: uppercase; color: #6c757d; white-space: nowrap;
    }
    .comp-table thead th.sortable { cursor: pointer; }
    .comp-table thead th.sortable:hover { color: #212529; }
    .comp-table tbody tr { border-bottom: 1px solid #f1f3f5; transition: background .12s; }
    .comp-table tbody tr:last-child { border-bottom: none; }
    .comp-table tbody tr:hover { background: #f8f9fa; }
    .comp-table td { padding: 14px 18px; vertical-align: middle; }

    .cell-serial { color: #adb5bd; font-size: 12px; font-family: 'JetBrains Mono', monospace; }
    .cell-compid { font-family: 'JetBrains Mono', monospace; font-size: 13px; color: #2563eb; font-weight: 500; }

    /* User cell */
    .user-cell   { display: flex; align-items: center; gap: 10px; }
    .user-avatar { width: 34px; height: 34px; border-radius: 50%; display: grid; place-items: center; font-size: 12px; font-weight: 700; flex-shrink: 0; }
    .user-name   { font-size: 13.5px; font-weight: 500; color: #1e293b; line-height: 1.3; }
    .user-email  { font-size: 11.5px; color: #6c757d; line-height: 1.3; }

    /* Subject cell */
    .cell-subject { font-size: 13.5px; font-weight: 500; color: #1e293b; line-height: 1.3; max-width: 220px; }
    .cell-desc    { font-size: 11.5px; color: #6c757d; margin-top: 2px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 220px; }

    /* Category badge */
    .cat-badge {
        display: inline-flex; align-items: center; gap: 5px;
        font-size: 12px; font-weight: 500; padding: 4px 10px;
        border-radius: 6px; background: #f8f9fa;
        border: 1px solid #e9ecef; color: #495057;
        white-space: nowrap;
    }

    /* Priority badge */
    .priority-badge {
        display: inline-flex; align-items: center; gap: 4px;
        font-size: 11px; font-weight: 600; padding: 3px 9px;
        border-radius: 5px; white-space: nowrap;
    }
    .pri-high   { background: #fee2e2; color: #991b1b; }
    .pri-medium { background: #fef3c7; color: #92400e; }
    .pri-low    { background: #d1fae5; color: #065f46; }

    /* Assigned cell */
    .assigned-cell { display: flex; align-items: center; gap: 8px; }
    .assigned-avatar {
        width: 26px; height: 26px; border-radius: 50%;
        display: grid; place-items: center;
        font-size: 10px; font-weight: 700; flex-shrink: 0;
        background: #e0e7ff; color: #3730a3;
    }
    .assigned-name { font-size: 13px; color: #495057; }

    /* Date cell */
    .cell-date { font-size: 13px; color: #495057; white-space: nowrap; }
    .cell-time { font-size: 11px; color: #adb5bd; display: block; margin-top: 2px; }

    /* Status badge */
    .status-badge {
        display: inline-flex; align-items: center; gap: 5px;
        font-size: 12px; font-weight: 500;
        padding: 4px 11px; border-radius: 20px; white-space: nowrap;
    }
    .status-badge .dot { width: 6px; height: 6px; border-radius: 50%; flex-shrink: 0; }

    .badge-open     { background: #fee2e2; color: #991b1b; }
    .badge-open .dot { background: #dc2626; animation: blink 1.4s infinite; }
    .badge-progress { background: #fef3c7; color: #92400e; }
    .badge-progress .dot { background: #d97706; animation: blink 1.8s infinite; }
    .badge-resolved { background: #d1fae5; color: #065f46; }
    .badge-resolved .dot { background: #16a34a; }
    .badge-closed   { background: #f1f3f5; color: #6c757d; }
    .badge-closed .dot { background: #adb5bd; }

    @keyframes blink { 0%,100%{opacity:1} 50%{opacity:.25} }

    /* Action buttons */
    .action-btn {
        background: #fff; border: 1px solid #e9ecef; color: #6c757d;
        width: 30px; height: 30px; border-radius: 7px;
        display: inline-grid; place-items: center; cursor: pointer;
        transition: all .15s; margin-right: 3px;
    }
    .action-btn:hover { background: #f8f9fa; color: #212529; border-color: #adb5bd; }
    .action-btn svg { width: 13px; height: 13px; }

    /* ── FOOTER ── */
    .comp-footer {
        padding: 14px 22px; border-top: 1px solid #f1f3f5;
        display: flex; align-items: center;
        justify-content: space-between; flex-wrap: wrap; gap: 10px;
    }
    .comp-footer-info { font-size: 12.5px; color: #6c757d; }
    .comp-pagination  { display: flex; gap: 4px; list-style: none; margin: 0; padding: 0; }
    .comp-pagination li a,
    .comp-pagination li span {
        display: grid; place-items: center; width: 30px; height: 30px;
        border-radius: 7px; font-size: 13px; color: #495057;
        background: #fff; border: 1px solid #dee2e6;
        text-decoration: none; transition: all .15s;
    }
    .comp-pagination li a:hover { background: #f8f9fa; border-color: #adb5bd; }
    .comp-pagination li.active span { background: #0d6efd; color: #fff; border-color: #0d6efd; font-weight: 600; }
    .comp-pagination li.disabled a { opacity: .4; pointer-events: none; }
</style>

<div class="page-content comp-page">

    {{-- ── HEADER ── --}}
    <div class="content-header mb-4 d-flex justify-content-between align-items-center flex-wrap gap-2">
        <div>
            <h2 class="fw-bold mb-1">Complaints</h2>
            <p class="text-muted mb-0">Track, assign and resolve all customer complaints</p>
        </div>
        <div class="d-flex gap-2">
            <button class="btn-export">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1M12 12V4m0 8l-3-3m3 3l3-3"/></svg>
                Export CSV
            </button>
        </div>
    </div>

    {{-- ── KPI CARDS ── --}}
    <div class="row g-3 mb-4">

        <div class="col-md-3 col-sm-6">
            <div class="kpi-card">
                <div class="kpi-top">
                    <span class="kpi-label">Total Complaints</span>
                    <div class="kpi-icon icon-total">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                    </div>
                </div>
                <div class="kpi-amount">128</div>
                <div class="kpi-footer">
                    <span class="kpi-pill pill-red">↑ 8.2%</span>
                    <span>vs last month</span>
                </div>
                <div class="kpi-bar-track"><div class="kpi-bar-fill bar-total"></div></div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="kpi-card">
                <div class="kpi-top">
                    <span class="kpi-label">Open</span>
                    <div class="kpi-icon icon-open">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/></svg>
                    </div>
                </div>
                <div class="kpi-amount" style="color:#dc2626;">51</div>
                <div class="kpi-footer">
                    <span class="kpi-pill pill-red">40%</span>
                    <span>of total · needs action</span>
                </div>
                <div class="kpi-bar-track"><div class="kpi-bar-fill bar-open"></div></div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="kpi-card">
                <div class="kpi-top">
                    <span class="kpi-label">In Progress</span>
                    <div class="kpi-icon icon-progress">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                </div>
                <div class="kpi-amount" style="color:#d97706;">45</div>
                <div class="kpi-footer">
                    <span class="kpi-pill pill-amber">35%</span>
                    <span>of total · being handled</span>
                </div>
                <div class="kpi-bar-track"><div class="kpi-bar-fill bar-progress"></div></div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="kpi-card">
                <div class="kpi-top">
                    <span class="kpi-label">Resolved</span>
                    <div class="kpi-icon icon-resolved">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                </div>
                <div class="kpi-amount" style="color:#16a34a;">32</div>
                <div class="kpi-footer">
                    <span class="kpi-pill pill-green">25%</span>
                    <span>of total · avg 2.4 days</span>
                </div>
                <div class="kpi-bar-track"><div class="kpi-bar-fill bar-resolved"></div></div>
            </div>
        </div>

    </div>

    {{-- ── COMPLAINTS TABLE ── --}}
    <div class="comp-card">

        {{-- Toolbar --}}
        <div class="comp-toolbar">
            <div>
                <p class="comp-toolbar-title">Complaint Records</p>
                <p class="comp-toolbar-sub">Showing 128 complaints · March 2026</p>
            </div>
            <div class="comp-controls">

                <div class="comp-search">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path stroke-linecap="round" d="M21 21l-4.35-4.35"/></svg>
                    <input type="text" placeholder="Search ID or complainant…">
                </div>

                <input type="date" class="comp-date" value="2026-03-01">
                <input type="date" class="comp-date" value="2026-03-25">

                <select class="comp-select">
                    <option value="">All Categories</option>
                    <option>Payment Issue</option>
                    <option>Delivery</option>
                    <option>Product Quality</option>
                    <option>Refund</option>
                    <option>Service</option>
                    <option>Other</option>
                </select>

                <div class="status-pills">
                    <button class="s-pill sp-all">All</button>
                    <button class="s-pill sp-open">Open</button>
                    <button class="s-pill sp-progress">In Progress</button>
                    <button class="s-pill sp-resolved">Resolved</button>
                </div>

            </div>
        </div>

        {{-- Table --}}
        <div class="table-responsive">
            <table class="comp-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th class="sortable">Complaint ID ↕</th>
                        <th>Complainant</th>
                        <th>Subject & Description</th>
                        <th>Category</th>
                        <th>Priority</th>
                        <th>Assigned To</th>
                        <th class="sortable">Raised On ↕</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    {{-- Row 1 --}}
                    <tr>
                        <td class="cell-serial">01</td>
                        <td class="cell-compid">#CMP10041</td>
                        <td>
                            <div class="user-cell">
                                <div class="user-avatar" style="background:#e0e7ff;color:#3730a3;">RS</div>
                                <div>
                                    <div class="user-name">Rahul Sharma</div>
                                    <div class="user-email">rahul.sharma@email.com</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="cell-subject">Payment deducted, order not placed</div>
                            <div class="cell-desc">Amount of ₹5,000 debited but order confirmation not received.</div>
                        </td>
                        <td><span class="cat-badge">💳 Payment Issue</span></td>
                        <td><span class="priority-badge pri-high">● High</span></td>
                        <td>
                            <div class="assigned-cell">
                                <div class="assigned-avatar">AK</div>
                                <span class="assigned-name">Amit Kumar</span>
                            </div>
                        </td>
                        <td class="cell-date">25 Mar 2026<span class="cell-time">10:15 AM</span></td>
                        <td><span class="status-badge badge-open"><span class="dot"></span>Open</span></td>
                        <td>
                            <button class="action-btn" title="View Details">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            </button>
                            <button class="action-btn" title="Assign">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            </button>
                            <button class="action-btn" title="Resolve">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                            </button>
                        </td>
                    </tr>

                    {{-- Row 2 --}}
                    <tr>
                        <td class="cell-serial">02</td>
                        <td class="cell-compid">#CMP10042</td>
                        <td>
                            <div class="user-cell">
                                <div class="user-avatar" style="background:#fef3c7;color:#92400e;">AV</div>
                                <div>
                                    <div class="user-name">Anjali Verma</div>
                                    <div class="user-email">anjali.verma@email.com</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="cell-subject">Order delivered in damaged condition</div>
                            <div class="cell-desc">Product packaging was torn and item was broken on arrival.</div>
                        </td>
                        <td><span class="cat-badge">📦 Delivery</span></td>
                        <td><span class="priority-badge pri-medium">● Medium</span></td>
                        <td>
                            <div class="assigned-cell">
                                <div class="assigned-avatar" style="background:#fef3c7;color:#92400e;">SP</div>
                                <span class="assigned-name">Sunita Patel</span>
                            </div>
                        </td>
                        <td class="cell-date">24 Mar 2026<span class="cell-time">02:30 PM</span></td>
                        <td><span class="status-badge badge-progress"><span class="dot"></span>In Progress</span></td>
                        <td>
                            <button class="action-btn" title="View Details">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            </button>
                            <button class="action-btn" title="Reassign">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            </button>
                            <button class="action-btn" title="Resolve">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                            </button>
                        </td>
                    </tr>

                    {{-- Row 3 --}}
                    <tr>
                        <td class="cell-serial">03</td>
                        <td class="cell-compid">#CMP10043</td>
                        <td>
                            <div class="user-cell">
                                <div class="user-avatar" style="background:#fee2e2;color:#991b1b;">VS</div>
                                <div>
                                    <div class="user-name">Vikas Singh</div>
                                    <div class="user-email">vikas.singh@email.com</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="cell-subject">Refund not processed after 7 days</div>
                            <div class="cell-desc">Cancellation was approved but refund of ₹7,000 still pending.</div>
                        </td>
                        <td><span class="cat-badge">💰 Refund</span></td>
                        <td><span class="priority-badge pri-high">● High</span></td>
                        <td>
                            <div class="assigned-cell">
                                <div class="assigned-avatar" style="background:#fee2e2;color:#991b1b;">RJ</div>
                                <span class="assigned-name">Ravi Joshi</span>
                            </div>
                        </td>
                        <td class="cell-date">23 Mar 2026<span class="cell-time">11:00 AM</span></td>
                        <td><span class="status-badge badge-open"><span class="dot"></span>Open</span></td>
                        <td>
                            <button class="action-btn" title="View Details">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            </button>
                            <button class="action-btn" title="Assign">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            </button>
                            <button class="action-btn" title="Resolve">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                            </button>
                        </td>
                    </tr>

                    {{-- Row 4 --}}
                    <tr>
                        <td class="cell-serial">04</td>
                        <td class="cell-compid">#CMP10044</td>
                        <td>
                            <div class="user-cell">
                                <div class="user-avatar" style="background:#d1fae5;color:#065f46;">PM</div>
                                <div>
                                    <div class="user-name">Priya Mehta</div>
                                    <div class="user-email">priya.mehta@email.com</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="cell-subject">Wrong product received</div>
                            <div class="cell-desc">Ordered Blue XL shirt but received Red M shirt instead.</div>
                        </td>
                        <td><span class="cat-badge">🛍️ Product Quality</span></td>
                        <td><span class="priority-badge pri-medium">● Medium</span></td>
                        <td>
                            <div class="assigned-cell">
                                <div class="assigned-avatar" style="background:#d1fae5;color:#065f46;">NK</div>
                                <span class="assigned-name">Neha Kapoor</span>
                            </div>
                        </td>
                        <td class="cell-date">22 Mar 2026<span class="cell-time">04:45 PM</span></td>
                        <td><span class="status-badge badge-resolved"><span class="dot"></span>Resolved</span></td>
                        <td>
                            <button class="action-btn" title="View Details">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            </button>
                            <button class="action-btn" title="Download Report">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1M12 12V4m0 8l-3-3m3 3l3-3"/></svg>
                            </button>
                        </td>
                    </tr>

                    {{-- Row 5 --}}
                    <tr>
                        <td class="cell-serial">05</td>
                        <td class="cell-compid">#CMP10045</td>
                        <td>
                            <div class="user-cell">
                                <div class="user-avatar" style="background:#ede9fe;color:#5b21b6;">DK</div>
                                <div>
                                    <div class="user-name">Deepak Khanna</div>
                                    <div class="user-email">deepak.khanna@email.com</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="cell-subject">Customer support not responding</div>
                            <div class="cell-desc">Raised 3 tickets in last 10 days, no response received from team.</div>
                        </td>
                        <td><span class="cat-badge">🎧 Service</span></td>
                        <td><span class="priority-badge pri-low">● Low</span></td>
                        <td>
                            <div class="assigned-cell">
                                <div class="assigned-avatar" style="background:#ede9fe;color:#5b21b6;">MS</div>
                                <span class="assigned-name">Mohan Sharma</span>
                            </div>
                        </td>
                        <td class="cell-date">21 Mar 2026<span class="cell-time">09:20 AM</span></td>
                        <td><span class="status-badge badge-closed"><span class="dot"></span>Closed</span></td>
                        <td>
                            <button class="action-btn" title="View Details">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            </button>
                            <button class="action-btn" title="Reopen">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                            </button>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

        {{-- Footer --}}
        <div class="comp-footer">
            <div class="comp-footer-info">Showing <strong>1–10</strong> of <strong>128</strong> complaints</div>
            <ul class="comp-pagination">
                <li class="disabled"><a href="#">‹</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">…</a></li>
                <li><a href="#">13</a></li>
                <li><a href="#">›</a></li>
            </ul>
        </div>

    </div>{{-- /comp-card --}}

</div>{{-- /page-content --}}

@endsection