@extends('admin.layouts.app')

@section('content')
    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-md-6 col-lg-3 mb-3">
            <div class="card card-primary h-100">
                <div class="card-body">
                    <div class="stat-card d-flex align-items-center">
                        <div class="icon primary me-3">
                            <i class="fas fa-user-shield"></i>
                        </div>
                        <div>
                            <h6 class="mb-1">Total Admins</h6>
                            <h4 class="mb-0">{{ $admins->total() }}</h4>
                            <small class="text-success"><i class="fas fa-arrow-up"></i> 1 new this month</small>
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
                            <i class="fas fa-circle-check"></i>
                        </div>
                        <div>
                            <h6 class="mb-1">Active Admins</h6>
                            <h4 class="mb-0">{{ $admins->where('status', 'active')->count() }}</h4>
                            <small class="text-success"><i class="fas fa-arrow-up"></i> 2 more than last month</small>
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
                            <i class="fas fa-user-slash"></i>
                        </div>
                        <div>
                            <h6 class="mb-1">Deactivated Admins</h6>
                            <h4 class="mb-0">{{ $admins->where('status', 'inactive')->count() }}</h4>
                            <small class="text-danger"><i class="fas fa-arrow-down"></i> 1 from last month</small>
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
                            <i class="fas fa-clock-rotate-left"></i>
                        </div>
                        <div>
                            <h6 class="mb-1">Last Login Activity</h6>
                            <h4 class="mb-0">5 hrs ago</h4>
                            <small class="text-success">Recent activity recorded</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Admin Users Page -->
    <div id="admin-users-page" class="page-content">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Admin User Management</h4>
            <a href="{{ route('manage_admin.create') }}" class="btn btn-primary">
                <i class="fas fa-user-plus me-1"></i> Add Admin
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!--Search Bar and Export/Filter-->
        <div class="card mb-3">
            <div class="card-body">
                <div class="row g-3 align-items-center">
                    <!-- Search Bar -->
                    <div class="col-md-8">
                        <form action="{{ route('manage_admin.index') }}" method="GET">
                            <div class="input-group" style="max-width: 300px">
                                <input type="text" name="search" class="form-control form-control-sm" 
                                       placeholder="Search by name or email..." 
                                       value="{{ request('search') }}" />
                                <button class="btn btn-sm btn-outline-secondary" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Export Button / Filter Button -->
                    <div class="col-md-4">
                        <div class="d-flex justify-content-end gap-2">
                            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal"
                                data-bs-target="#exportModal">
                                <i class="fas fa-file-export me-1"></i> Export
                            </button>
                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#adminFilterModal">
                                <i class="fas fa-filter me-1"></i> Filter
                            </button>
                            <a href="{{ route('manage_admin.index') }}" class="btn btn-outline-secondary" 
                               id="resetFilters" title="Reset Filters">
                                <i class="fas fa-sync-alt"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Admin Table -->
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered align-middle" id="adminUsersTable">
                        <thead class="table-light">
                            <tr>
                                
                                <th>Sr.No</th>
                                <th>ID</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Last Login</th>
                                <th>Status</th>
                                <th width="100">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($admins as $admin)
                                <tr>
                                    
                                    <td>{{ $loop->iteration }}</td>
                                    <th>{{ $admin->sr_no }}</th>
                                    {{-- <td>{{ $admin->id }}</td> --}}
                                    <td>
                                        @if($admin->photo)
                                            <img src="{{ asset('storage/' . $admin->photo) }}" alt="Photo" 
                                                 width="45" height="45" class="rounded-circle object-fit-cover">
                                        @else
                                            <img src="{{ asset('images/default-avatar.png') }}" alt="Photo" 
                                                 width="45" height="45" class="rounded-circle">
                                        @endif
                                    </td>
                                    <td>{{ $admin->name }}</td>
                                    <td>{{ $admin->email }}</td>
                                    {{-- <td><span class="badge bg-info"> --}}
                                      <td>{{ ucfirst($admin->role) }}</td>  
                        
                                    <td>{{ $admin->last_login ? $admin->last_login->format('d M Y, h:i A') : '—' }}</td>
                                    <td>
                                        <span class="badge bg-{{ $admin->status == 'active' ? 'success' : 'warning' }}">
                                            {{ ucfirst($admin->status) }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-light dropdown-toggle" type="button"
                                                id="actionMenu{{ $admin->id }}" data-bs-toggle="dropdown" 
                                                aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end" 
                                                aria-labelledby="actionMenu{{ $admin->id }}">
                                                <li>
                                                    <a class="dropdown-item" 
                                                       href="{{ route('manage_admin.edit', $admin->id) }}">
                                                        <i class="fas fa-edit me-2"></i> Edit
                                                    </a>
                                                </li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li>
                                                    <form action="{{ route('manage_admin.destroy', $admin->id) }}" 
                                                          method="POST" class="d-inline"
                                                          onsubmit="return confirm('Are you sure you want to delete this admin?');">
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
                                    <td colspan="8" class="text-center py-4">
                                        <i class="fas fa-inbox fa-3x text-muted mb-3 d-block"></i>
                                        <p class="text-muted">No admins found.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                {{-- <div class="mt-3 d-flex justify-content-between align-items-center">
                    <div class="text-muted">
                        Showing {{ $admins->firstItem() ?? 0 }} to {{ $admins->lastItem() ?? 0 }} 
                        of {{ $admins->total() }} entries
                    </div>
                    <div>
                        {{ $admins->links() }}
                    </div>
                </div> --}}
                <div class="d-flex justify-content-between align-items-center mt-4">
            <div class="text-muted">
              Page <strong>{{ $admins->currentPage() }}</strong> of <strong>{{ $admins->lastPage() }}</strong> —
              Showing <strong>{{ $admins->firstItem() }}–{{ $admins->lastItem() }}</strong> of
              <strong>{{ $admins->total() }}</strong> entries
            </div>
            <nav aria-label="Page navigation">
              <ul class="pagination mb-0 gap-1">
                {{-- Prev --}}
                <li class="page-item {{ $admins->onFirstPage() ? 'disabled' : '' }}">
                  <a class="page-link px-3 rounded-pill" href="{{ $admins->previousPageUrl() ?? '#' }}">
                    <i class="bi bi-arrow-left-circle-fill me-1"></i> Prev
                  </a>
                </li>

                {{-- Page numbers --}}
                @foreach ($admins->getUrlRange(1, $admins->lastPage()) as $page => $url)
                  <li class="page-item {{ $page == $admins->currentPage() ? 'active' : '' }}">
                    <a class="page-link px-3 rounded-pill" href="{{ $url }}">{{ $page }}</a>
                  </li>
                @endforeach

                {{-- Next --}}
                <li class="page-item {{ $admins->hasMorePages() ? '' : 'disabled' }}">
                  <a class="page-link px-3 rounded-pill" href="{{ $admins->nextPageUrl() ?? '#' }}">
                    Next <i class="bi bi-arrow-right-circle-fill ms-1"></i>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
                
            </div>
        </div>
    </div>

    <!-- Export Modal -->
    <div class="modal fade" id="exportModal" tabindex="-1" aria-labelledby="exportModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exportModalLabel">Export Admin Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('manage_admin.export') }}" method="POST">
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
                        <div class="mb-3">
                            <label for="exportRange" class="form-label">Date Range</label>
                            <select class="form-select" id="exportRange" name="range">
                                <option value="all">All Admins</option>
                                <option value="last7">Last 7 Days</option>
                                <option value="last30">Last 30 Days</option>
                                <option value="custom">Custom Range</option>
                            </select>
                        </div>
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
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="includeInactive" name="include_inactive" value="1" />
                            <label class="form-check-label" for="includeInactive">Include inactive admins</label>
                        </div>
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

    <!-- Admin Filter Modal -->
    <div class="modal fade" id="adminFilterModal" tabindex="-1" aria-labelledby="adminFilterModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="adminFilterModalLabel">Filter Admins</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('manage_admin.index') }}" method="GET" id="adminFilterForm">
                    <div class="modal-body">
                        <!-- Status -->
                        <div class="mb-4">
                            <h6 class="text-muted mb-3">Status</h6>
                            <div class="btn-group w-100" role="group">
                                <input type="radio" class="btn-check" name="status" id="adminStatusAll"
                                    autocomplete="off" value="" 
                                    {{ request('status') == '' ? 'checked' : '' }} />
                                <label class="btn btn-outline-secondary" for="adminStatusAll">All</label>

                                <input type="radio" class="btn-check" name="status" id="adminStatusActive"
                                    autocomplete="off" value="active" 
                                    {{ request('status') == 'active' ? 'checked' : '' }} />
                                <label class="btn btn-outline-success" for="adminStatusActive">Active</label>

                                <input type="radio" class="btn-check" name="status" id="adminStatusInactive"
                                    autocomplete="off" value="inactive" 
                                    {{ request('status') == 'inactive' ? 'checked' : '' }} />
                                <label class="btn btn-outline-warning" for="adminStatusInactive">Inactive</label>
                            </div>
                        </div>

                        <!-- Role -->
                        <div class="mb-4">
                            <h6 class="text-muted mb-3">Role</h6>
                            <select class="form-select" id="adminRoleFilter" name="role">
                                <option value="">All Roles</option>
                                <option value="super_admin" {{ request('role') == 'super_admin' ? 'selected' : '' }}>
                                    Super Admin
                                </option>
                                <option value="inventory_manager" {{ request('role') == 'inventory_manager' ? 'selected' : '' }}>
                                    Inventory Manager
                                </option>
                                <option value="sales_manager" {{ request('role') == 'sales_manager' ? 'selected' : '' }}>
                                    Sales Manager
                                </option>
                                <option value="customer_support" {{ request('role') == 'customer_support' ? 'selected' : '' }}>
                                    Customer Support
                                </option>
                            </select>
                        </div>

                        <!-- Date Range -->
                        <div class="mb-4">
                            <h6 class="text-muted mb-3">Date Created</h6>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="adminStartDate" class="form-label">From</label>
                                    <input type="date" class="form-control" id="adminStartDate" name="start_date"
                                        value="{{ request('start_date') }}" />
                                </div>
                                <div class="col-md-6">
                                    <label for="adminEndDate" class="form-label">To</label>
                                    <input type="date" class="form-control" id="adminEndDate" name="end_date"
                                        value="{{ request('end_date') }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ route('manage_admin.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-undo me-1"></i> Reset
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-check me-1"></i> Apply
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Export date range toggle
        document.getElementById('exportRange').addEventListener('change', function() {
            const customRange = document.getElementById('customDateRange');
            customRange.style.display = this.value === 'custom' ? 'block' : 'none';
        });

        // DataTables initialization (optional)
        $(document).ready(function() {
            if ($('#adminUsersTable tbody tr').length > 10) {
                $('#adminUsersTable').DataTable({
                    "paging": false,
                    "searching": false,
                    "info": false,
                    "ordering": true,
                    "order": [[0, "asc"]]
                });
            }
        });

        // Auto-hide alerts after 5 seconds
        setTimeout(function() {
            $('.alert').fadeOut('slow');
        }, 5000);
    </script>
@endpush