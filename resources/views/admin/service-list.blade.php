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

    .service-action-toggle {
        width: 34px;
        height: 34px;
        border: 1px solid #e9ecef;
        border-radius: 8px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: #475569;
        background: #fff;
    }
    .service-action-toggle:hover,
    .service-action-toggle:focus,
    .service-action-toggle.show {
        background: #f8fafc !important;
        border-color: #cbd5e1 !important;
        color: #0f172a !important;
    }
    .service-action-toggle::after {
        display: none;
    }
    .service-action-icon {
        width: 16px;
        height: 16px;
    }
    .service-dropdown {
        min-width: 150px;
        border: 1px solid #e9ecef;
        border-radius: 10px;
        padding: 6px;
    }
    .service-dropdown .dropdown-item {
        border-radius: 8px;
        padding: 8px 10px;
        font-size: 13px;
    }
    .service-dropdown .dropdown-item:hover {
        background: #f8fafc;
    }
    .service-dropdown-icon {
        width: 14px;
        height: 14px;
        flex-shrink: 0;
    }

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
<style>
#toastContainer{
    position: fixed;
    top: 20px;
    right: 20px;
    z-index: 99999;
}

.page-alert{
    min-width: 320px;
    max-width: 420px;
    padding: 14px 16px;
    border-radius: 12px;
    color: #fff;
    display: flex;
    align-items: center;
    gap: 12px;
    box-shadow: 0 10px 25px rgba(0,0,0,.18);
    animation: slideIn .4s ease;
    font-size: 14px;
}

.success-alert{
    background: linear-gradient(135deg,#0f172a,#1d4ed8);
}

.error-alert{
    background: linear-gradient(135deg,#991b1b,#ef4444);
}

.page-alert button{
    margin-left:auto;
    background:none;
    border:none;
    color:#fff;
    font-size:20px;
    cursor:pointer;
}

@keyframes slideIn{
    from{
        opacity:0;
        transform:translateX(100%);
    }
    to{
        opacity:1;
        transform:translateX(0);
    }
}
</style>
<div class="page-content comp-page">

    {{-- ── HEADER ── --}}
    <div class="content-header mb-4 d-flex justify-content-between align-items-center flex-wrap gap-2">
        <div>
            <h2 class="fw-bold mb-1">Serives-List</h2>
        </div>
       <div class="d-flex gap-2">
    <a href="{{ route('admin.add-service') }}" class="btn btn-primary">
        Add Service
    </a>
</div>
    </div>

    {{-- ── KPI CARDS ── --}}
    {{-- <div class="row g-3 mb-4">

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

    </div> --}}

    {{-- ── COMPLAINTS TABLE ── --}}
    <div class="comp-card">

        {{-- Toolbar --}}
        <div class="comp-toolbar">

    <div>
        <p class="comp-toolbar-title">Service Records</p>
        <p class="comp-toolbar-sub">
            Showing {{ $services->total() }} services
        </p>
    </div>

    <form method="GET" action="{{ route('admin.service-list') }}">
        <div class="comp-controls">

            {{-- Search --}}
            <div class="comp-search">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <circle cx="11" cy="11" r="8"/>
                    <path stroke-linecap="round" d="M21 21l-4.35-4.35"/>
                </svg>
                <input type="text" name="search"
                       value="{{ request('search') }}"
                       placeholder="Search ID or service name...">
            </div>

            {{-- Date --}}
            <input type="date" name="from_date"
                   value="{{ request('from_date') }}"
                   class="comp-date">

            <input type="date" name="to_date"
                   value="{{ request('to_date') }}"
                   class="comp-date">

            {{-- Category --}}
            {{-- <select name="category" class="comp-select">
                <option value="">All Categories</option>
                <option value="Wedding" {{ request('category')=='Wedding' ? 'selected' : '' }}>Wedding</option>
                <option value="Event" {{ request('category')=='Event' ? 'selected' : '' }}>Event</option>
                <option value="Tour" {{ request('category')=='Tour' ? 'selected' : '' }}>Tour</option>
                <option value="Media" {{ request('category')=='Media' ? 'selected' : '' }}>Media</option>
                <option value="Support" {{ request('category')=='Support' ? 'selected' : '' }}>Support</option>
            </select> --}}

            {{-- Status --}}
            <select name="status" class="comp-select">
                <option value="">All Status</option>
                <option value="1" {{ request('status')==='1' ? 'selected' : '' }}>Active</option>
                <option value="0" {{ request('status')==='0' ? 'selected' : '' }}>Inactive</option>
            </select>

            <button type="submit" class="btn btn-primary">Filter</button>

            <a href="{{ route('admin.service-list') }}" class="btn btn-secondary">
                Reset
            </a>

        </div>
    </form>

</div>
        {{-- Table --}}
        <div class="table-responsive">
            <table class="comp-table">
    <thead>
        <tr>
            <th>#</th>
            <th>Service ID</th>
            <th>Service Name</th>
            <th>Base Price</th>
            <th>Description</th>
            <th>Created On</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @forelse($services as $key => $service)
        <tr>
            <td class="cell-serial">{{ $key + 1 }}</td>

            <td class="cell-compid">
                #SRV{{ str_pad($service->id, 4, '0', STR_PAD_LEFT) }}
            </td>

            <td>
                <div class="user-cell">
                    <div class="user-avatar" style="background:#e0e7ff;color:#3730a3;">
                        {{ strtoupper(substr($service->name,0,2)) }}
                    </div>
                    <div>
                        <div class="user-name">{{ $service->name }}</div>
                    </div>
                </div>
            </td>


            <td>₹{{ number_format($service->base_price,2) }}</td>


            <td>
                <div class="cell-desc">
                    {{ \Illuminate\Support\Str::limit($service->short_description, 50) }}
                </div>
            </td>

            <td class="cell-date">
                {{ date('d M Y', strtotime($service->created_at)) }}
                <span class="cell-time">
                    {{ date('h:i A', strtotime($service->created_at)) }}
                </span>
            </td>

            <td>
                @if($service->status == 1)
                    <span class="status-badge badge-resolved">
                        <span class="dot"></span>Active
                    </span>
                @else
                    <span class="status-badge badge-closed">
                        <span class="dot"></span>Inactive
                    </span>
                @endif
            </td>

          <td class="text-center">
    <div class="dropdown">
        <button class="btn btn-sm shadow-none dropdown-toggle service-action-toggle"
                type="button"
                data-bs-toggle="dropdown"
                title="Open actions"
                aria-expanded="false">
            <svg class="service-action-icon" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                <circle cx="12" cy="5" r="2"></circle>
                <circle cx="12" cy="12" r="2"></circle>
                <circle cx="12" cy="19" r="2"></circle>
            </svg>
        </button>

        <ul class="dropdown-menu dropdown-menu-end shadow-sm service-dropdown">

            <li>
                <a class="dropdown-item d-flex align-items-center gap-2"
                   href="{{ route('admin.services.edit', $service->id) }}">
                    <svg class="service-dropdown-icon text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 3.487a2.1 2.1 0 1 1 2.97 2.97L8.58 17.71 4 19l1.29-4.58L16.862 3.487z"></path>
                    </svg>
                    <span>Edit</span>
                </a>
            </li>

            <li><hr class="dropdown-divider"></li>

            <li>
                <form action="{{ route('admin.services.delete', $service->id) }}"
                      method="POST"
                      onsubmit="return confirm('Delete this service?')">

                    @csrf

                    <button type="submit"
                        class="dropdown-item d-flex align-items-center gap-2 text-danger border-0 bg-transparent w-100">
                        <svg class="service-dropdown-icon text-danger" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 6h18"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 6V4h8v2"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 6l-1 14H6L5 6"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 11v6M14 11v6"></path>
                        </svg>
                        <span>Delete</span>
                    </button>
                </form>
            </li>

        </ul>
    </div>
</td>
        </tr>
        @empty
        <tr>
            <td colspan="10" class="text-center py-4">
                No services found.
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
        </div>

        {{-- Footer --}}
       <div class="comp-footer">

    <div class="comp-footer-info">
        Showing
        <strong>{{ $services->firstItem() ?? 0 }}–{{ $services->lastItem() ?? 0 }}</strong>
        of
        <strong>{{ $services->total() }}</strong>
        services
    </div>

    <ul class="comp-pagination">

        {{-- Previous --}}
        @if ($services->onFirstPage())
            <li class="disabled"><span>‹</span></li>
        @else
            <li>
                <a href="{{ $services->previousPageUrl() }}">‹</a>
            </li>
        @endif

        {{-- Page Numbers --}}
        @foreach ($services->getUrlRange(1, $services->lastPage()) as $page => $url)

            @if ($page == $services->currentPage())
                <li class="active"><span>{{ $page }}</span></li>
            @else
                <li><a href="{{ $url }}">{{ $page }}</a></li>
            @endif

        @endforeach

        {{-- Next --}}
        @if ($services->hasMorePages())
            <li>
                <a href="{{ $services->nextPageUrl() }}">›</a>
            </li>
        @else
            <li class="disabled"><span>›</span></li>
        @endif

    </ul>
</div>

    </div>{{-- /comp-card --}}

</div>{{-- /page-content --}}
@if(session('success'))
<div class="page-alert success-alert" id="flashMessage">
    <i class="fas fa-check-circle"></i>
    <span>{{ session('success') }}</span>
    <button onclick="closeFlashMessage()">×</button>
</div>
@endif

@if(session('error'))
<div class="page-alert error-alert" id="flashMessage">
    <i class="fas fa-times-circle"></i>
    <span>{{ session('error') }}</span>
    <button onclick="closeFlashMessage()">×</button>
</div>
@endif

<div id="toastContainer"></div>
<script>
document.addEventListener("DOMContentLoaded", function () {

    const flash = document.getElementById("flashMessage");

    if (flash) {
        document.getElementById("toastContainer").appendChild(flash);

        setTimeout(() => {
            flash.style.transition = "0.4s";
            flash.style.opacity = "0";
            flash.style.transform = "translateX(100%)";

            setTimeout(() => flash.remove(), 400);
        }, 3000);
    }

});

function closeFlashMessage() {
    let flash = document.getElementById("flashMessage");
    if (flash) flash.remove();
}
</script>
@endsection
