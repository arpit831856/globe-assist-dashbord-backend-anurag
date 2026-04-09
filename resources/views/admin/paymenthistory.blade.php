@extends('admin.layouts.app')

@section('title', 'Partner Payments')

@section('content')

<style>
    /* ── KPI CARDS ── */
    .kpi-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 14px; margin-bottom: 28px; }
    @media(max-width:900px){ .kpi-grid { grid-template-columns: repeat(2,1fr); } }

    .kpi-card {
        background: #fff;
        border: 0;
        border-radius: .375rem;
        padding: 18px 20px;
        box-shadow: 0 .125rem .25rem rgba(0,0,0,.075);
        display: flex; flex-direction: column; gap: 10px;
    }
    .kpi-top { display: flex; align-items: center; justify-content: space-between; }
    .kpi-label { font-size: 11px; font-weight: 600; letter-spacing: .4px; text-transform: uppercase; color: #6c757d; }
    .kpi-icon { width: 36px; height: 36px; border-radius: 9px; display: grid; place-items: center; }
    .kpi-val { font-size: 24px; font-weight: 700; }
    .kpi-sub { font-size: 12px; color: #6c757d; display: flex; align-items: center; gap: 6px; }
    .kpi-pill { font-size: 11px; font-weight: 600; padding: 2px 8px; border-radius: 20px; }

    /* same bootstrap-style colors */
    .pill-g { background:#d1e7dd; color:#0f5132; }
    .pill-a { background:#fff3cd; color:#664d03; }
    .pill-b { background:#cfe2ff; color:#084298; }
    .pill-p { background:#e2d9f3; color:#432874; }

    .icon-blue   { background:#cfe2ff; color:#0d6efd; }
    .icon-green  { background:#d1e7dd; color:#198754; }
    .icon-amber  { background:#fff3cd; color:#ffc107; }
    .icon-purple { background:#e2d9f3; color:#6f42c1; }
    .val-blue   { color:#0d6efd; }
    .val-green  { color:#198754; }
    .val-amber  { color:#ffc107; }
    .val-purple { color:#6f42c1; }

    /* ── MAIN CARD ── */
    .main-card {
        background: #fff;
        border: 0;
        border-radius: .375rem;
        box-shadow: 0 .125rem .25rem rgba(0,0,0,.075);
        overflow: hidden;
    }

    .card-toolbar {
        padding: 16px 20px;
        border-bottom: 1px solid #dee2e6;
        display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 12px;
    }
    .card-title { font-size: 15px; font-weight: 600; color: #212529; margin: 0; }
    .card-sub   { font-size: 12px; color: #6c757d; margin-top: 2px; }

    .toolbar-right { display: flex; align-items: center; gap: 8px; flex-wrap: wrap; }

    .t-search { position: relative; }
    .t-search svg { position: absolute; left: 9px; top: 50%; transform: translateY(-50%); width: 14px; height: 14px; color: #6c757d; pointer-events: none; }
    .t-search input {
        border: 1px solid #dee2e6;
        border-radius: .375rem;
        padding: .375rem .75rem .375rem 30px;
        font-size: .875rem;
        width: 200px;
        outline: none;
        color: #212529;
        background: #fff;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }
    .t-search input:focus {
        border-color: #86b7fe;
        box-shadow: 0 0 0 .25rem rgba(13,110,253,.25);
    }
    .t-search input::placeholder { color: #6c757d; }

    /* ── TABLE ── */
    .p-table { width: 100%; border-collapse: collapse; font-size: 13px; }
    .p-table thead tr { background: #f8f9fa; border-bottom: 1px solid #dee2e6; }
    .p-table thead th {
        padding: 11px 16px; text-align: left;
        font-size: 13px; font-weight: 600;
        color: #212529; white-space: nowrap;
    }
    .p-table thead th.th-center { text-align: center; }
    .p-table tbody tr { border-bottom: 1px solid #dee2e6; transition: background .12s; }
    .p-table tbody tr:last-child { border-bottom: none; }
    .p-table tbody tr:hover { background: #f8f9fa; }
    .p-table td { padding: 14px 16px; vertical-align: middle; }
    .p-table td.td-center { text-align: center; }

    .cell-sr { font-size: 12px; color: #6c757d; }

    .partner-cell { display: flex; align-items: center; gap: 10px; }
    .p-avatar {
        width: 38px; height: 38px; border-radius: 50%;
        display: grid; place-items: center; font-size: 13px; font-weight: 700; flex-shrink: 0;
    }
    .p-name  { font-size: 13.5px; font-weight: 600; color: #212529; line-height: 1.3; }
    .p-email { font-size: 11.5px; color: #6c757d; }

    .mono { font-size: 13.5px; font-weight: 600; }
    .amt-green  { color: #198754; }
    .amt-amber  { color: #ffc107; }
    .amt-gray   { color: #6c757d; }

    /* Request badge — using Bootstrap badge style */
    .req-badge {
        display: inline-flex; align-items: center; gap: 5px;
        font-size: 12px; font-weight: 600; padding: 4px 11px; border-radius: 20px; white-space: nowrap;
    }
    .req-badge .rdot { width: 6px; height: 6px; border-radius: 50%; flex-shrink: 0; }
    .rb-pending  { background: #fff3cd; color: #664d03; }
    .rb-pending .rdot  { background: #ffc107; animation: blink 1.4s infinite; }
    .rb-approved { background: #d1e7dd; color: #0f5132; }
    .rb-approved .rdot { background: #198754; }
    .rb-rejected { background: #f8d7da; color: #842029; }
    .rb-rejected .rdot { background: #dc3545; }
    .rb-none     { background: #f8f9fa; color: #6c757d; }
    .rb-none .rdot { background: #adb5bd; }

    @keyframes blink { 0%,100%{opacity:1} 50%{opacity:.3} }

    /* Action buttons */
    .act-btn {
        height: 32px; border-radius: .375rem; font-size: 12px; font-weight: 600;
        border: 1px solid; cursor: pointer;
        display: inline-flex; align-items: center; gap: 5px; padding: 0 12px;
        transition: all .15s; white-space: nowrap;
    }
    .act-btn svg { width: 12px; height: 12px; }
    .btn-view    { background: #fff; color: #6c757d; border-color: #dee2e6; }
    .btn-view:hover    { background: #f8f9fa; color: #212529; }
    .btn-wallet  { background: #e2d9f3; color: #432874; border-color: #d3c6f0; }
    .btn-wallet:hover  { background: #d3c6f0; }

    /* ── MODALS ── */
    .modal-overlay {
        position: fixed; inset: 0; background: rgba(0,0,0,.5);
        z-index: 10000; display: none;
        align-items: center; justify-content: center;
    }
    .modal-overlay.show { display: flex; }
    .modal-box {
        background: #fff;
        border-radius: .5rem;
        width: 450px; max-width: 90vw;
        box-shadow: 0 .5rem 1rem rgba(0,0,0,.15);
        animation: modalIn .22s ease;
    }
    @keyframes modalIn { from{transform:translateY(16px);opacity:0} to{transform:translateY(0);opacity:1} }

    .mb-header {
        padding: 16px 20px;
        border-bottom: 1px solid #dee2e6;
        display: flex; align-items: center; justify-content: space-between;
    }
    .mb-title { font-size: 15px; font-weight: 600; color: #212529; }
    .mb-close {
        width: 30px; height: 30px; border-radius: .375rem; border: 1px solid #dee2e6;
        background: #fff; color: #6c757d; cursor: pointer;
        display: grid; place-items: center;
    }
    .mb-close:hover { background: #f8f9fa; color: #212529; }
    .mb-close svg { width: 13px; height: 13px; }

    .mb-body { padding: 18px 22px; display: flex; flex-direction: column; gap: 14px; }

    .req-info-block {
        background: #f8f9fa; border: 1px solid #dee2e6; border-radius: .375rem;
        padding: 14px; display: flex; flex-direction: column; gap: 8px;
    }
    .rib-row { display: flex; justify-content: space-between; align-items: center; font-size: 13px; }
    .rib-label { color: #6c757d; font-weight: 500; }
    .rib-val   { font-weight: 600; color: #212529; }
    .rib-val.big { font-size: 18px; color: #6f42c1; }
    .rib-val.status { font-size: 12px; padding: 3px 8px; border-radius: 12px; display: inline-flex; align-items: center; gap: 5px; }
    .rib-val.status.pending  { background: #fff3cd; color: #664d03; }
    .rib-val.status.approved { background: #d1e7dd; color: #0f5132; }
    .rib-val.status.rejected { background: #f8d7da; color: #842029; }
    .rib-val.status.norequest{ background: #f8f9fa; color: #6c757d; }

    .mb-footer { padding: 14px 22px; border-top: 1px solid #dee2e6; display: flex; gap: 8px; }
    .mf-cancel {
        flex: 1; padding: 8px 0; border-radius: .375rem; font-size: 13.5px; font-weight: 600;
        background: #fff; color: #6c757d; border: 1px solid #dee2e6; cursor: pointer;
    }
    .mf-cancel:hover { background: #f8f9fa; }
    .mf-approve {
        background: #198754; color: #fff; border: none; cursor: pointer;
    }
    .mf-approve:hover { background: #157347; }
    .mf-reject {
        background: #dc3545; color: #fff; border: none; cursor: pointer;
    }
    .mf-reject:hover { background: #bb2d3b; }

    /* ── WALLET MODAL ── */
    .wallet-stats {
        display: grid; grid-template-columns: repeat(3, 1fr);
        gap: 0; border-bottom: 1px solid #dee2e6;
    }
    .ws-stat {
        padding: 13px 16px; border-right: 1px solid #dee2e6; text-align: center;
    }
    .ws-stat:last-child { border-right: none; }
    .ws-label { font-size: 10px; font-weight: 700; text-transform: uppercase; letter-spacing: .5px; color: #6c757d; margin-bottom: 5px; }
    .ws-val   { font-size: 16px; font-weight: 700; color: #6f42c1; }

    .wallet-body { max-height: 400px; overflow-y: auto; }

    .history-item {
        display: flex; align-items: center; gap: 12px;
        padding: 13px 0; border-bottom: 1px solid #dee2e6;
    }
    .history-item:last-child { border-bottom: none; }

    .hi-icon {
        width: 36px; height: 36px; border-radius: .375rem;
        display: grid; place-items: center; flex-shrink: 0;
    }
    .hi-icon.approved { background: #d1e7dd; color: #198754; }
    .hi-icon.pending  { background: #fff3cd; color: #ffc107; }
    .hi-icon.rejected { background: #f8d7da; color: #dc3545; }
    .hi-icon svg { width: 16px; height: 16px; }

    .hi-info { flex: 1; }
    .hi-title { font-size: 13px; font-weight: 600; color: #212529; }
    .hi-meta  { font-size: 11.5px; color: #6c757d; margin-top: 2px; }

    .hi-right { text-align: right; }
    .hi-amt  { font-size: 14px; font-weight: 700; color: #dc3545; }
    .hi-amt.out { color: #198754; }
    .hi-status { font-size: 11px; font-weight: 600; margin-top: 2px; }
    .hi-status.approved { color: #198754; }
    .hi-status.pending  { color: #ffc107; }
    .hi-status.rejected { color: #dc3545; }

    .empty-state { text-align: center; padding: 40px 20px; color: #6c757d; }
    .empty-state svg { width: 40px; height: 40px; margin-bottom: 12px; opacity: .4; }
    .empty-state p { font-size: 14px; font-weight: 500; margin: 0; }

    /* ── TOAST ── */
    #toastWrap { position: fixed; bottom: 24px; right: 24px; z-index: 20000; display: flex; flex-direction: column; gap: 8px; }
    .toast {
        background: #212529; color: #fff; border-radius: .375rem; padding: 12px 16px;
        font-size: 13px; font-weight: 500; display: flex; align-items: center; gap: 9px;
        box-shadow: 0 .5rem 1rem rgba(0,0,0,.15); animation: toastIn .22s ease; min-width: 240px;
    }
    .toast.ok  { background: #0f5132; }
    .toast.err { background: #842029; }
    @keyframes toastIn { from{transform:translateX(20px);opacity:0} to{transform:translateX(0);opacity:1} }

    /* ── FOOTER ── */
    .tbl-footer {
        padding: 13px 20px; border-top: 1px solid #dee2e6;
        display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 8px;
    }
    .tf-info { font-size: 12.5px; color: #6c757d; }
    .tf-pages { display: flex; gap: 4px; list-style: none; margin: 0; padding: 0; }
    .tf-pages li a, .tf-pages li span {
        display: grid; place-items: center; width: 30px; height: 30px; border-radius: .375rem;
        font-size: 13px; color: #495057; background: #fff; border: 1px solid #dee2e6;
        text-decoration: none; transition: all .15s;
    }
    .tf-pages li.active span { background: #0d6efd; color: #fff; border-color: #0d6efd; font-weight: 600; }
    .tf-pages li.disabled a { opacity: .4; pointer-events: none; }
</style>

<div class="page-content">

    {{-- HEADER --}}
    <div class="content-header mb-4 d-flex justify-content-between align-items-center flex-wrap gap-2">
        <div>
            <h2 class="fw-bold">Partner Payments</h2>
            <p class="text-muted">Sabhi partners ki withdrawal requests aur wallet history</p>
        </div>
        <button style="border:1px solid #dee2e6;background:#fff;color:#6c757d;border-radius:.375rem;padding:8px 16px;font-size:13px;font-weight:600;cursor:pointer;display:inline-flex;align-items:center;gap:6px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1M12 12V4m0 8l-3-3m3 3l3-3"/></svg>
            Export
        </button>
    </div>

    {{-- KPI CARDS --}}
    <div class="kpi-grid">
        <div class="kpi-card">
            <div class="kpi-top">
                <span class="kpi-label">Total Partners</span>
                <div class="kpi-icon icon-blue"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg></div>
            </div>
            <div class="kpi-val val-blue">04</div>
            <div class="kpi-sub"><span class="kpi-pill pill-b">3 Active</span></div>
        </div>
        <div class="kpi-card">
            <div class="kpi-top">
                <span class="kpi-label">Total Withdrawn</span>
                <div class="kpi-icon icon-green"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2z"/></svg></div>
            </div>
            <div class="kpi-val val-green">₹39,000</div>
            <div class="kpi-sub"><span class="kpi-pill pill-g">All time</span></div>
        </div>
        <div class="kpi-card">
            <div class="kpi-top">
                <span class="kpi-label">Pending Requests</span>
                <div class="kpi-icon icon-amber"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg></div>
            </div>
            <div class="kpi-val val-amber">03</div>
            <div class="kpi-sub"><span class="kpi-pill pill-a">₹8,200 total</span></div>
        </div>
        <div class="kpi-card">
            <div class="kpi-top">
                <span class="kpi-label">Total Wallet Balance</span>
                <div class="kpi-icon icon-purple"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg></div>
            </div>
            <div class="kpi-val val-purple">₹58,500</div>
            <div class="kpi-sub"><span class="kpi-pill pill-p">Combined</span></div>
        </div>
    </div>

    {{-- MAIN TABLE CARD --}}
    <div class="main-card">

        <div class="card-toolbar">
            <div>
                <p class="card-title">Partner List</p>
                <p class="card-sub">Withdrawal requests, wallet balance aur history</p>
            </div>
            <div class="toolbar-right">
                <div class="t-search">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path stroke-linecap="round" d="M21 21l-4.35-4.35"/></svg>
                    <input type="text" placeholder="Partner naam ya ID…">
                </div>
                <select class="form-select form-select-sm" style="width:auto;">
                    <option value="">All Requests</option>
                    <option>Pending</option>
                    <option>Approved</option>
                    <option>Rejected</option>
                    <option>No Request</option>
                </select>
            </div>
        </div>

        <div class="table-responsive">
            <table class="p-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Partner</th>
                        <th class="th-center">Total Withdrawn</th>
                        <th class="th-center">Pending Amount</th>
                        <th class="th-center">Wallet Balance</th>
                        <th class="th-center">Request Status</th>
                        <th class="th-center">Request</th>
                        <th class="th-center">Wallet</th>
                    </tr>
                </thead>
                <tbody>

                    {{-- Row 1 --}}
                    <tr>
                        <td class="cell-sr">1</td>
                        <td>
                            <div class="partner-cell">
                                <div class="p-avatar" style="background:#e0e7ff;color:#3730a3;">RS</div>
                                <div>
                                    <div class="p-name">Rahul Sharma</div>
                                    <div class="p-email">PRT-001 · rahul@email.com</div>
                                </div>
                            </div>
                        </td>
                        <td class="td-center"><span class="mono amt-green">₹12,500</span></td>
                        <td class="td-center"><span class="mono amt-amber">₹2,500</span></td>
                        <td class="td-center"><span class="mono val-purple">₹22,500</span></td>
                        <td class="td-center">
                            <span class="badge bg-warning text-dark">Pending</span>
                        </td>
                        <td class="td-center">
                            <button class="act-btn btn-view" onclick="openRequestModal('Rahul Sharma','PRT-001','₹5,000','25 Mar 2026','10:42 AM','pending')">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                Request
                            </button>
                        </td>
                        <td class="td-center">
                            <button class="act-btn btn-wallet" onclick="openWalletModal('RS','Rahul Sharma','PRT-001','22500','12500','2500')">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                                Wallet
                            </button>
                        </td>
                    </tr>

                    {{-- Row 2 --}}
                    <tr>
                        <td class="cell-sr">2</td>
                        <td>
                            <div class="partner-cell">
                                <div class="p-avatar" style="background:#fff3cd;color:#664d03;">AV</div>
                                <div>
                                    <div class="p-name">Anjali Verma</div>
                                    <div class="p-email">PRT-002 · anjali@email.com</div>
                                </div>
                            </div>
                        </td>
                        <td class="td-center"><span class="mono amt-green">₹10,000</span></td>
                        <td class="td-center"><span class="mono amt-amber">₹3,200</span></td>
                        <td class="td-center"><span class="mono val-purple">₹14,000</span></td>
                        <td class="td-center">
                            <span class="badge bg-success">Approved</span>
                        </td>
                        <td class="td-center">
                            <button class="act-btn btn-view" onclick="openRequestModal('Anjali Verma','PRT-002','₹4,000','24 Mar 2026','03:15 PM','approved')">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                Request
                            </button>
                        </td>
                        <td class="td-center">
                            <button class="act-btn btn-wallet" onclick="openWalletModal('AV','Anjali Verma','PRT-002','14000','10000','3200')">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                                Wallet
                            </button>
                        </td>
                    </tr>

                    {{-- Row 3 --}}
                    <tr>
                        <td class="cell-sr">3</td>
                        <td>
                            <div class="partner-cell">
                                <div class="p-avatar" style="background:#f8d7da;color:#842029;">VS</div>
                                <div>
                                    <div class="p-name">Vikas Singh</div>
                                    <div class="p-email">PRT-003 · vikas@email.com</div>
                                </div>
                            </div>
                        </td>
                        <td class="td-center"><span class="mono amt-green">₹10,000</span></td>
                        <td class="td-center"><span class="mono amt-gray">₹0</span></td>
                        <td class="td-center"><span class="mono val-purple">₹8,500</span></td>
                        <td class="td-center">
                            <span class="badge bg-secondary">No Request</span>
                        </td>
                        <td class="td-center">
                            <button class="act-btn btn-view" onclick="openRequestModal('Vikas Singh','PRT-003','—','—','—','norequest')">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                Request
                            </button>
                        </td>
                        <td class="td-center">
                            <button class="act-btn btn-wallet" onclick="openWalletModal('VS','Vikas Singh','PRT-003','8500','10000','0')">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                                Wallet
                            </button>
                        </td>
                    </tr>

                    {{-- Row 4 --}}
                    <tr>
                        <td class="cell-sr">4</td>
                        <td>
                            <div class="partner-cell">
                                <div class="p-avatar" style="background:#d1e7dd;color:#0f5132;">PM</div>
                                <div>
                                    <div class="p-name">Priya Mehta</div>
                                    <div class="p-email">PRT-004 · priya@email.com</div>
                                </div>
                            </div>
                        </td>
                        <td class="td-center"><span class="mono amt-green">₹16,500</span></td>
                        <td class="td-center"><span class="mono amt-amber">₹2,500</span></td>
                        <td class="td-center"><span class="mono val-purple">₹13,500</span></td>
                        <td class="td-center">
                            <span class="badge bg-warning text-dark">Pending</span>
                        </td>
                        <td class="td-center">
                            <button class="act-btn btn-view" onclick="openRequestModal('Priya Mehta','PRT-004','₹3,200','25 Mar 2026','08:30 AM','pending')">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                Request
                            </button>
                        </td>
                        <td class="td-center">
                            <button class="act-btn btn-wallet" onclick="openWalletModal('PM','Priya Mehta','PRT-004','13500','16500','2500')">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                                Wallet
                            </button>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

        <div class="tbl-footer">
            <div class="tf-info">Showing <strong>4</strong> of <strong>4</strong> partners</div>
            <ul class="tf-pages">
                <li class="disabled"><a href="#">‹</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">›</a></li>
            </ul>
        </div>
    </div>

</div>


{{-- ══════════ REQUEST DETAILS MODAL ══════════ --}}
<div class="modal-overlay" id="requestModal" onclick="closeRequestModal(event)">
    <div class="modal-box" onclick="event.stopPropagation()">
        <div class="mb-header">
            <span class="mb-title">Request Details</span>
            <button class="mb-close" onclick="closeRequestModal()"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg></button>
        </div>
        <div class="mb-body">
            <div class="req-info-block">
                <div class="rib-row">
                    <span class="rib-label">Partner Name</span>
                    <span class="rib-val" id="r-pname">—</span>
                </div>
                <div class="rib-row">
                    <span class="rib-label">Partner ID</span>
                    <span class="rib-val" id="r-pid">—</span>
                </div>
                <div class="rib-row">
                    <span class="rib-label">Requested Amount</span>
                    <span class="rib-val big" id="r-amt">—</span>
                </div>
                <div class="rib-row">
                    <span class="rib-label">Date & Time</span>
                    <span class="rib-val" id="r-datetime">—</span>
                </div>
                <div class="rib-row">
                    <span class="rib-label">Status</span>
                    <span class="rib-val status pending" id="r-status">—</span>
                </div>
            </div>
        </div>
        <div class="mb-footer">
            <button class="mf-cancel" onclick="closeRequestModal()">Close</button>
            <button class="mf-approve" onclick="acceptRequest()" style="flex:1.5;background:#198754;color:#fff;border:none;padding:10px 0;border-radius:.375rem;font-size:13.5px;font-weight:600;cursor:pointer;display:inline-flex;align-items:center;justify-content:center;gap:7px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                Accept
            </button>
            <button class="mf-reject" onclick="rejectRequest()" style="flex:1.5;background:#dc3545;color:#fff;border:none;padding:10px 0;border-radius:.375rem;font-size:13.5px;font-weight:600;cursor:pointer;display:inline-flex;align-items:center;justify-content:center;gap:7px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                Reject
            </button>
        </div>
    </div>
</div>


{{-- ══════════ WALLET MODAL ══════════ --}}
<div class="modal-overlay" id="walletModal" onclick="closeWalletModal(event)">
    <div class="modal-box" onclick="event.stopPropagation()">
        <div class="mb-header">
            <div>
                <div class="mb-title">Wallet History</div>
                <div style="font-size:12px;color:#6c757d;margin-top:4px;"><span id="w-pname">—</span> (<span id="w-pid">—</span>)</div>
            </div>
            <button class="mb-close" onclick="closeWalletModal()"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg></button>
        </div>

        <div class="wallet-stats">
            <div class="ws-stat">
                <div class="ws-label">Balance</div>
                <div class="ws-val" id="w-bal">₹0</div>
            </div>
            <div class="ws-stat">
                <div class="ws-label">Withdrawn</div>
                <div class="ws-val" id="w-with">₹0</div>
            </div>
            <div class="ws-stat">
                <div class="ws-label">Pending</div>
                <div class="ws-val" id="w-pend">₹0</div>
            </div>
        </div>

        <div class="mb-body wallet-body" id="walletBody">
            {{-- Filled by JS --}}
        </div>

        <div class="mb-footer">
            <button class="mf-cancel" onclick="closeWalletModal()">Close</button>
        </div>
    </div>
</div>

<div id="toastWrap"></div>

<script>
// ── Wallet History Data ──
const walletHistories = {
    'PRT-001': [
        { date:'25 Mar 2026', time:'10:42 AM', label:'Withdrawal Requested', amt:'₹5,000', status:'pending' },
        { date:'18 Mar 2026', time:'02:15 PM', label:'Withdrawal Approved',  amt:'₹7,500', status:'approved' },
        { date:'10 Mar 2026', time:'11:00 AM', label:'Withdrawal Approved',  amt:'₹5,000', status:'approved' },
    ],
    'PRT-002': [
        { date:'24 Mar 2026', time:'03:15 PM', label:'Withdrawal Approved',  amt:'₹4,000', status:'approved' },
        { date:'15 Mar 2026', time:'09:45 AM', label:'Withdrawal Rejected',  amt:'₹6,000', status:'rejected' },
        { date:'05 Mar 2026', time:'12:30 PM', label:'Withdrawal Approved',  amt:'₹4,000', status:'approved' },
    ],
    'PRT-003': [],
    'PRT-004': [
        { date:'25 Mar 2026', time:'08:30 AM', label:'Withdrawal Requested', amt:'₹3,200', status:'pending' },
        { date:'12 Mar 2026', time:'01:20 PM', label:'Withdrawal Approved',  amt:'₹8,000', status:'approved' },
        { date:'28 Feb 2026', time:'10:00 AM', label:'Withdrawal Approved',  amt:'₹8,500', status:'approved' },
    ],
};

const statusIcons = {
    approved: `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>`,
    pending:  `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>`,
    rejected: `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>`,
};

// ── REQUEST MODAL ──
function openRequestModal(name, pid, amt, date, time, status) {
    document.getElementById('r-pname').textContent = name;
    document.getElementById('r-pid').textContent = pid;
    document.getElementById('r-amt').textContent = amt;
    document.getElementById('r-datetime').textContent = date === '—' ? '—' : date + ' · ' + time;
    
    const statusEl = document.getElementById('r-status');
    statusEl.className = 'rib-val status ' + status;
    statusEl.innerHTML = {
        'pending':   '<span class="rdot" style="background:#ffc107;width:6px;height:6px;border-radius:50%;flex-shrink:0;"></span>Pending',
        'approved':  '<span class="rdot" style="background:#198754;width:6px;height:6px;border-radius:50%;flex-shrink:0;"></span>Approved',
        'rejected':  '<span class="rdot" style="background:#dc3545;width:6px;height:6px;border-radius:50%;flex-shrink:0;"></span>Rejected',
        'norequest': 'No Request'
    }[status] || '-';
    
    document.getElementById('requestModal').classList.add('show');
}

function closeRequestModal(e) {
    if(e && e.target.id !== 'requestModal') return;
    document.getElementById('requestModal').classList.remove('show');
}

// ── REQUEST ACCEPT/REJECT ──
function acceptRequest() {
    const name = document.getElementById('r-pname').textContent;
    const amt = document.getElementById('r-amt').textContent;
    closeRequestModal();
    showToast('ok', amt + ' withdrawal accepted for ' + name);
}

function rejectRequest() {
    const name = document.getElementById('r-pname').textContent;
    const amt = document.getElementById('r-amt').textContent;
    closeRequestModal();
    showToast('err', amt + ' withdrawal rejected for ' + name);
}

// ── WALLET MODAL ──
function openWalletModal(initials, name, pid, bal, withdrawn, pending) {
    document.getElementById('w-pname').textContent = name;
    document.getElementById('w-pid').textContent = pid;
    document.getElementById('w-bal').textContent = '₹' + Number(bal).toLocaleString('en-IN');
    document.getElementById('w-with').textContent = '₹' + Number(withdrawn).toLocaleString('en-IN');
    document.getElementById('w-pend').textContent = '₹' + Number(pending).toLocaleString('en-IN');

    const history = walletHistories[pid] || [];
    const body = document.getElementById('walletBody');
    
    if (history.length === 0) {
        body.innerHTML = `<div class="empty-state">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
            <p>Abhi tak koi withdrawal nahi hui</p>
        </div>`;
    } else {
        body.innerHTML = history.map(h => `
            <div class="history-item">
                <div class="hi-icon ${h.status}">${statusIcons[h.status]}</div>
                <div class="hi-info">
                    <div class="hi-title">${h.label}</div>
                    <div class="hi-meta">${h.date} · ${h.time}</div>
                </div>
                <div class="hi-right">
                    <div class="hi-amt ${h.status === 'approved' ? 'out' : ''}">${h.status === 'approved' ? '-' : ''}${h.amt}</div>
                    <div class="hi-status ${h.status}">${h.status.charAt(0).toUpperCase() + h.status.slice(1)}</div>
                </div>
            </div>
        `).join('');
    }

    document.getElementById('walletModal').classList.add('show');
}

function closeWalletModal(e) {
    if(e && e.target.id !== 'walletModal') return;
    document.getElementById('walletModal').classList.remove('show');
}

// ── TOAST ──
function showToast(type, msg) {
    const wrap = document.getElementById('toastWrap');
    const t = document.createElement('div');
    t.className = 'toast ' + (type === 'ok' ? 'ok' : type === 'err' ? 'err' : '');
    t.innerHTML = (type==='ok' ? '✓ ' : type==='err' ? '✕ ' : 'ℹ ') + msg;
    wrap.appendChild(t);
    setTimeout(() => { t.style.opacity='0'; t.style.transform='translateX(20px)'; t.style.transition='.3s'; setTimeout(()=>t.remove(),350); }, 3200);
}
</script>

@endsection