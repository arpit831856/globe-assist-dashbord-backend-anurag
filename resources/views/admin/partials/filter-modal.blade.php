{{-- @extends('partials.navbar')
@extends('partials.sidebar') --}}
@extends('admin.layouts.app')
@section('title', 'Notifications')

@section('content')
<div class="modal fade" id="filterNotificationModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header gradient-bg">
                <h5 class="modal-title">Filter Notifications</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="filterForm">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Recipient Type</label>
                            <select class="form-select" id="filterRecipientType">
                                <option value="">All</option>
                                <option value="customer">Customer</option>
                                <option value="karigar">Karigar</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Notification Type</label>
                            <select class="form-select" id="filterNotificationType">
                                <option value="">All</option>
                                <option value="order">Order Update</option>
                                <option value="inventory">Inventory Alert</option>
                                <option value="promotion">Promotion</option>
                                <option value="system">System</option>
                            </select>
                        </div>
                    </div>
                    <!-- Other filter fields same -->
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" id="resetFilterBtn">Reset</button>
                <button class="btn btn-primary" id="applyFilterBtn">Apply</button>
            </div>
        </div>
    </div>
</div>
@endsection