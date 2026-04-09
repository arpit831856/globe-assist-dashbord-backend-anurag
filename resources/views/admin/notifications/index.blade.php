@extends('admin.layouts.app')

@section('title', 'Notifications')

@section('content')

        <!-- Stats Cards -->
        <div class="row mb-4">
            <div class="col-md-6 col-lg-3 mb-3">
                <div class="card card-primary h-100">
                    <div class="card-body">
                        <div class="stat-card d-flex align-items-center">
                            <div class="icon primary me-3">
                                <i class="fas fa-bell"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Total Notifications</h6>
                                <h4 class="mb-0">{{ $totalNotifications }}</h4>
                                <small class="text-success"><i class="fas fa-arrow-up"></i> +12% from last month</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 mb-3">
                <div class="card card-primary h-100">
                    <div class="card-body">
                        <div class="stat-card d-flex align-items-center">
                            <div class="icon primary me-3">
                                <i class="fas fa-envelope-open-text"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Draft Notifications</h6>
                                <h4 class="mb-0">{{ $readNotifications }}</h4>
                                <small class="text-success"><i class="fas fa-arrow-up"></i> 8.3% from last month</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 mb-3">
                <div class="card card-secondary h-100">
                    <div class="card-body">
                        <div class="stat-card d-flex align-items-center">
                            <div class="icon secondary me-3">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Send Notifications</h6>
                                <h4 class="mb-0">{{ $unreadNotifications }}</h4>
                                <small class="text-danger"><i class="fas fa-arrow-down"></i> 3.1% from last month</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 mb-3">
                <div class="card card-secondary h-100">
                    <div class="card-body">
                        <div class="stat-card d-flex align-items-center">
                            <div class="icon secondary me-3">
                                <i class="fas fa-calendar-day"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Today’s Notifications</h6>
                                <h4 class="mb-0">{{ $todayNotifications }}</h4>
                                <small class="text-success"><i class="fas fa-arrow-up"></i> +2 from yesterday</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Notification Page -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Notifications</h2>
            <div>
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createNotificationModal">
                    <i class="fas fa-plus me-2"></i> Create Notification
                </a>
            </div>
        </div>

        <!--Search Bar and Export/Filter-->
        <div class="card mb-3">
            <div class="card-body">
                <div class="row g-3 align-items-center">

                    <!-- Search Bar -->
                    <div class="col-md-8">
                        <form action="{{ route('notifications.index') }}" method="GET" id="filterForm"
                            class="d-flex align-items-center gap-2">

                            <!-- Search -->
                            <div class="input-group me-3" style="width: 250px">
                                <input type="text" name="search" value="{{ request('search') }}"
                                    class="form-control form-control-sm" placeholder="Search..." />
                                <button class="btn btn-sm btn-outline-secondary" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>

                            <!-- Hidden Filter Fields (auto filled by modal) -->
                            <input type="hidden" name="recipient_code" value="{{ request('recipient_code') }}">
                        </form>
                    </div>

                    <!-- Export, Filter, Reset -->
                    <div class="col-md-4">
                        <div class="d-flex justify-content-end gap-2">

                            <!-- Export -->
                            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal"
                                data-bs-target="#exportModal">
                                <i class="fas fa-file-export me-1"></i> Export
                            </button>
                            <!-- Filter Modal Trigger -->
                            {{-- <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#filterNotificationModal">
                                <i class="fas fa-filter me-1"></i> Filter
                            </button> --}}
                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
        data-bs-target="#filterNotificationModal">
        <i class="fas fa-filter me-1"></i> Filter
    </button>


                            <!-- Reset Button -->
                            <a href="{{ route('notifications.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-sync-alt"></i>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Export Modal -->
        <div class="modal fade" id="exportModal" tabindex="-1" aria-labelledby="exportModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exportModalLabel">Export Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('manage_customer.export') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="exportFormat" class="form-label">Format</label>
                                <select class="form-select" id="exportFormat" name="format" required>
                                    <option value="csv">CSV</option>
                                    <option value="excel">Excel</option>
                                    <option value="pdf">PDF</option>
                                </select>
                            </div>
                            {{-- <div class="mb-3">
                                <label for="exportRange" class="form-label">Date Range</label>
                                <select class="form-select" id="exportRange" name="range">
                                    <option value="all">All Admins</option>
                                    <option value="last7">Last 7 Days</option>
                                    <option value="last30">Last 30 Days</option>
                                    <option value="custom">Custom Range</option>
                                </select>
                            </div> --}}
                            <div class="row mb-3" id="customDateRange" style="display: none">
                                <div class="col-md-6">
                                    <label for="startDate" class="form-label">From</label>
                                    <input type="date" class="form-control" id="startDate" name="start_date" />
                                </div>
                                <div class="col-md-6">
                                    <label for="endDate" class="form-label">To</label>
                                    <input type="date" class="form-control" id="endDate" name="end_date" />
                                </div>
                            </div>
                            {{-- <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="includeInactive" name="include_inactive"
                                    value="1" />
                                <label class="form-check-label" for="includeInactive">Include inactive admins</label>
                            </div> --}}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-download me-1"></i> Export
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div id="karigar-page" class="page-content">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="karigarTable">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Date & Time</th>
                                    <th>Image</th>
                                    <th>ID</th>
                                    <th>Recipient Type</th>
                                    <th>Title</th>
                                    <th>Message</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($notifications as $key => $notification)
                                    <tr>
                                        <td>{{ $notifications->firstItem() + $key }}</td>
                                        <td>{{ $notification->created_at->format('d M Y, h:i A') }}</td>
                                        <td>
                                            <img src="{{ asset('storage/' . $notification->image) }}" width="auto" height="30"
                                                class="rounded">

                                        </td>
                                        <td>{{ $notification->id }}</td>
                                        <td>{{ $notification->recipient_code }}</td>
                                        <td>{{ $notification->title }}</td>
                                        <td>{{ $notification->message }}</td>
                                        <td>
                                            <span class="badge bg-{{ $notification->status == 'unread' ? 'warning' : 'success' }}">
                                                {{ ucfirst($notification->status) }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-sm" data-bs-toggle="dropdown">
                                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ route('notifications.resend', $notification->id) }}">
                                                            <i class="fas fa-share-from-square me-2"></i> Resend
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <form method="POST"
                                                            action="{{ route('notifications.destroy', $notification->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="dropdown-item text-danger" type="submit">
                                                                <i class="fas fa-trash me-2"></i> Delete
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" class="text-center">No notifications found.</td>
                                    </tr>
                                @endforelse
                            </tbody>

                        </table>
                        {{-- <div class="mt-3">
                            {{ $notifications->links() }}
                        </div> --}}


                        <style>
                            .img-thumbnail {
                                border-radius: 6px;
                                object-fit: cover;
                            }
                        </style>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <!-- Create Notification Modal -->

        <div class="modal fade" id="createNotificationModal" tabindex="-1" aria-labelledby="createNotificationModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered">
                <div class="modal-content rounded-4 shadow">
                    <div class="modal-header gradient-bg text-white">
                        <h5 class="modal-title" id="createNotificationModalLabel">Create New Notification</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form action="{{ route('admin.notifications.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf


                            <!-- Recipient Type -->
                            <div class="mb-3">
                                <label for="recipientType" class="form-label">Recipient Type</label>
                                <select class="form-select" id="recipientType" name="recipient_code" required>
                                    <option value="" selected>Select recipient type</option>
                                    <option value="user">User</option>
                                    <option value="partner">Partner</option>
                                </select>
                            </div>

                            <!-- Specific Recipient -->
                            <div class="mb-3">
                                <label for="specificRecipient" class="form-label">Recipient</label>
                                <select class="form-select" id="specificRecipient" name="specific_recipient" disabled>
                                    <option value="" selected>Select recipient</option>
                                    <option value="all-users">All Users</option>
                                    <option value="user-1">User 1</option>
                                    <option value="user-2">User 2</option>
                                    <option value="user-3">User 3</option>
                                </select>
                            </div>

                            <!-- Customer ID -->
                            <div class="mb-3">
                                <div class="d-flex align-items-center justify-content-center my-3">
                                    <hr class="flex-grow-1 m-0" style="border-top: 1px solid #ccc;">
                                    <span class="px-3 text-muted fw-semibold">OR</span>
                                    <hr class="flex-grow-1 m-0" style="border-top: 1px solid #ccc;">
                                </div>
                                <label for="customerId" class="form-label">Customer ID</label>
                                <input type="text" class="form-control" id="customerId" name="customer_id" placeholder="Enter unique customer ID" />
                            </div>




                            <!-- Image Upload -->
                            <div class="mb-3">
                                <label for="notificationImage" class="form-label">Upload Image (Optional)</label>
                                <input type="file" class="form-control" id="notificationImage" name="image" accept="image/*" />
                            </div>

                            <!-- Notification Title -->
                            <div class="mb-3">
                                <label for="notificationTitle" class="form-label">Title</label>
                                <input type="text" class="form-control" id="notificationTitle" name="title"
                                    placeholder="Enter notification title" required />
                            </div>

                            <!-- Notification Description -->
                            <div class="mb-3">
                                <label for="notificationMessage" class="form-label">Description</label>
                                <textarea class="form-control" id="notificationMessage" name="message" rows="4"
                                    placeholder="Enter notification details..." required></textarea>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Send Notification</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>




        <style>
            .gradient-bg {
                background: linear-gradient(90deg, #007bff, #00c6ff);
            }
        </style>
        </div>


      <!-- Filter Notification Modal -->
    <div class="modal fade" id="filterNotificationModal" tabindex="-1" aria-labelledby="filterNotificationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content rounded-4 shadow">
                <!-- Header -->
                <div class="modal-header gradient-bg text-white">
                    <h5 class="modal-title fw-bold" id="filterNotificationModalLabel">
                        Filter Notifications
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Form -->
                <form action="{{ route('notifications.index') }}" method="GET" id="filterForm">
                    <div class="modal-body">
                        <!-- Recipient Type -->
                        <div class="mb-3">
                            <label for="filterRecipientType" class="form-label fw-semibold">Recipient Type</label>
                            <select class="form-select" id="filterRecipientType" name="recipient_type">
                                <option value="">All</option>
                                <option value="user" {{ request('recipient_type') == 'user' ? 'selected' : '' }}>User</option>
                                <option value="partner" {{ request('recipient_type') == 'partner' ? 'selected' : '' }}>Partner</option>
                            </select>
                        </div>

                        <!-- Specific Recipient -->
                        <div class="mb-3">
                            <label for="filterSpecificRecipient" class="form-label fw-semibold">Specific Recipient</label>
                            <select class="form-select" id="filterSpecificRecipient" name="specific_recipient"
                                {{ request('recipient_type') ? '' : 'disabled' }}>
                                @if(request('recipient_type') == 'user')
                                    <option value="U001" {{ request('specific_recipient') == 'U001' ? 'selected' : '' }}>U001</option>
                                    <option value="U002" {{ request('specific_recipient') == 'U002' ? 'selected' : '' }}>U002</option>
                                @elseif(request('recipient_type') == 'partner')
                                    <option value="P001" {{ request('specific_recipient') == 'P001' ? 'selected' : '' }}>P001</option>
                                    <option value="P002" {{ request('specific_recipient') == 'P002' ? 'selected' : '' }}>P002</option>
                                @else
                                    <option value="">Select recipient type first</option>
                                @endif
                            </select>
                        </div>

                        <!-- Customer ID -->
                        <div class="mb-3">
                            <label for="filterCustomerId" class="form-label fw-semibold">Customer ID</label>
                            <input type="text" class="form-control" id="filterCustomerId" name="customer_id"
                                placeholder="Enter unique customer ID"
                                value="{{ request('customer_id') }}">
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="modal-footer">
                        <a href="{{ route('notifications.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-undo me-1"></i> Reset
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-check me-1"></i> Apply Filters
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>



        <!-- Export Feedback Modal -->
        <div class="modal fade" id="exportFeedbackModal" tabindex="-1" aria-labelledby="exportFeedbackModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exportFeedbackModalLabel">
                            Export Feedback
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="export-form">
                            <div class="mb-3">
                                <label for="exportFormat" class="form-label">Format</label>
                                <select class="form-select" id="exportFormat">
                                    <option value="csv">CSV</option>
                                    <option value="excel">Excel</option>
                                    <option value="pdf">PDF</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exportRange" class="form-label">Date Range</label>
                                <select class="form-select" id="exportRange">
                                    <option value="all">All Feedback</option>
                                    <option value="last7">Last 7 Days</option>
                                    <option value="last30">Last 30 Days</option>
                                    <option value="custom">Custom Range</option>
                                </select>
                            </div>
                            <div class="row mb-3" id="customDateRange" style="display: none">
                                <div class="col-md-6">
                                    <label for="startDate" class="form-label">From</label>
                                    <input type="date" class="form-control" id="startDate" />
                                </div>
                                <div class="col-md-6">
                                    <label for="endDate" class="form-label">To</label>
                                    <input type="date" class="form-control" id="endDate" />
                                </div>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="includeResponses" />
                                <label class="form-check-label" for="includeResponses">Include our responses</label>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Cancel
                        </button>
                        <button type="button" class="btn btn-primary" id="confirmExport">
                            <i class="fas fa-download me-2"></i> Export
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Styles -->
        <style>
            .gradient-bg {
                background: linear-gradient(90deg, #0072ff, #00c6ff);
            }

            .modal-content {
                border: none;
            }

            .form-label {
                color: #333;
            }
        </style>


        <!-- Filter Modal -->
        <div class="modal fade" id="filterNotificationModal" tabindex="-1" aria-labelledby="filterNotificationModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="{{ route('notifications.index') }}" method="GET">

                        <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title" id="filterNotificationModalLabel">Filter Notifications</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <!-- Recipient Type -->
                            <div class="mb-3">
                                <label for="recipient_code" class="form-label">Recipient Type</label>
                                <select name="recipient_code" id="recipient_code" class="form-select">
                                    <option value="">All</option>
                                    <option value="user" {{ request('recipient_code') == 'user' ? 'selected' : '' }}>User</option>
                                    <option value="partner" {{ request('recipient_code') == 'partner' ? 'selected' : '' }}>Partner
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Apply Filter</button>
                        </div>
                    </form>

                </div>

            </div>

        </div>


@endsection

@push('scripts')
   

<script>
document.addEventListener("DOMContentLoaded", function () {
    // ========================================
    // CREATE NOTIFICATION MODAL - Dynamic Recipient Loading
    // ========================================
    const recipientType = document.getElementById("recipientType");
    const specificRecipient = document.getElementById("specificRecipient");
    const customerId = document.getElementById("customerId");

    if (recipientType && specificRecipient) {
        recipientType.addEventListener("change", function () {
            const type = this.value;
            
            if (!type) {
                specificRecipient.disabled = true;
                specificRecipient.innerHTML = '<option value="">Select recipient type first</option>';
                return;
            }

            // Show loading state
            specificRecipient.disabled = true;
            specificRecipient.innerHTML = "<option>Loading...</option>";

            // Fetch recipients from server
            fetch(`/admin/get-recipients/${type}`)
                .then(res => {
                    if (!res.ok) throw new Error('Failed to fetch recipients');
                    return res.json();
                })
                .then(data => {
                    specificRecipient.disabled = false;
                    specificRecipient.innerHTML = '<option value="">Select recipient</option>';
                    
                    data.forEach(item => {
                        const opt = document.createElement("option");
                        opt.value = item.id;
                        opt.textContent = item.name;
                        specificRecipient.appendChild(opt);
                    });
                })
                .catch(error => {
                    console.error('Error fetching recipients:', error);
                    specificRecipient.innerHTML = '<option value="">Error loading recipients</option>';
                });
        });

        // Disable specific recipient if customer ID is entered
        if (customerId) {
            customerId.addEventListener("input", function () {
                if (this.value.trim() !== '') {
                    specificRecipient.disabled = true;
                    specificRecipient.value = '';
                } else {
                    if (recipientType.value !== '') {
                        specificRecipient.disabled = false;
                    }
                }
            });

            // Disable customer ID if specific recipient is selected
            specificRecipient.addEventListener("change", function () {
                if (this.value !== '') {
                    customerId.disabled = true;
                    customerId.value = '';
                } else {
                    customerId.disabled = false;
                }
            });
        }
    }

    // ========================================
    // FILTER MODAL - Dynamic Recipient Loading
    // ========================================
    const filterRecipientType = document.getElementById('filterRecipientType');
    const filterSpecificRecipient = document.getElementById('filterSpecificRecipient');
    const filterCustomerId = document.getElementById('filterCustomerId');

    if (filterRecipientType && filterSpecificRecipient) {
        filterRecipientType.addEventListener('change', function () {
            const selectedType = this.value;
            
            filterSpecificRecipient.innerHTML = '';
            
            if (!selectedType) {
                filterSpecificRecipient.disabled = true;
                const opt = document.createElement('option');
                opt.textContent = 'Select recipient type first';
                filterSpecificRecipient.appendChild(opt);
                return;
            }

            // Show loading state
            filterSpecificRecipient.disabled = true;
            filterSpecificRecipient.innerHTML = '<option>Loading...</option>';

            // Fetch recipients from server
            fetch(`/admin/get-recipients/${selectedType}`)
                .then(res => {
                    if (!res.ok) throw new Error('Failed to fetch recipients');
                    return res.json();
                })
                .then(data => {
                    filterSpecificRecipient.disabled = false;
                    filterSpecificRecipient.innerHTML = '<option value="">All</option>';
                    
                    data.forEach(r => {
                        const opt = document.createElement('option');
                        opt.value = r.id;
                        opt.textContent = r.name;
                        filterSpecificRecipient.appendChild(opt);
                    });
                })
                .catch(error => {
                    console.error('Error fetching recipients:', error);
                    filterSpecificRecipient.innerHTML = '<option value="">Error loading recipients</option>';
                });
        });

        // Disable specific recipient if customer ID is entered
        if (filterCustomerId) {
            filterCustomerId.addEventListener('input', function () {
                if (this.value.trim() !== '') {
                    filterSpecificRecipient.disabled = true;
                    filterSpecificRecipient.value = '';
                } else {
                    if (filterRecipientType.value !== '') {
                        filterSpecificRecipient.disabled = false;
                    }
                }
            });
        }
    }

    // ========================================
    // EXPORT MODAL - Date Range Toggle
    // ========================================
    const exportRange = document.getElementById("exportRange");
    const customDateRange = document.getElementById("customDateRange");

    if (exportRange && customDateRange) {
        exportRange.addEventListener("change", function () {
            customDateRange.style.display = this.value === "custom" ? "flex" : "none";
        });
    }
});
</script>

@endpush