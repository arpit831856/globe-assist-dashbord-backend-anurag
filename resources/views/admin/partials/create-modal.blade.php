{{-- @extends('partials.navbar')
@extends('partials.sidebar') --}}
@extends('admin.layouts.app')
@section('title', 'Create Notification')
@section('content')
<div class="modal fade" id="createNotificationModal" tabindex="-1" aria-labelledby="createNotificationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header gradient-bg">
                <h5 class="modal-title">Create New Notification</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="notificationForm">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="recipientType" class="form-label">Recipient Type</label>
                            <select class="form-select" id="recipientType" required>
                                <option value="" disabled selected>Select recipient type</option>
                                <option value="customer">Customer</option>
                                <option value="karigar">Karigar</option>
                                <option value="admin">Admin</option>
                                <option value="all">All Users</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Specific Recipient</label>
                            <select class="form-select" id="specificRecipient" disabled>
                                <option value="">Select recipient first</option>
                            </select>
                        </div>
                    </div>
                    <!-- Other fields same as HTML -->
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control" id="notificationTitle" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Message</label>
                        <textarea class="form-control" id="notificationMessage" rows="3" required></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" id="sendNotificationBtn">Send</button>
            </div>
        </div>
    </div>
</div>
@endsection