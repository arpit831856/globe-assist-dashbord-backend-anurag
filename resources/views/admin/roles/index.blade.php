{{-- <!-- resources/views/roles/index.blade.php -->

@extends('admin.layouts.app')
@section('content')
<div class="container mt-4">
  <h3>Roles List</h3>
  <p>Total Roles: {{ $stats['total_roles'] ?? 0 }}</p>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Role Name</th>
        <th>Status</th>
        <th>Description</th>
      </tr>
    </thead>
    <tbody>
      @forelse($roles as $role)
      <tr>
        <td>{{ $role->display_name }}</td>
        <td>{{ ucfirst($role->status) }}</td>
        <td>{{ $role->description ?? 'N/A' }}</td>
      </tr>
      @empty
      <tr>
        <td colspan="3">No roles found.</td>
      </tr>
      @endforelse
    </tbody>
  </table>

  {{ $roles->links() }}
</div>
@endsection --}}


@extends('admin.layouts.app')

@section('content')
  <!-- Stats Cards -->
  <div class="row mb-4">
    <div class="col-md-6 col-lg-3 mb-3">
      <div class="card card-primary h-100">
        <div class="card-body">
          <div class="stat-card d-flex align-items-center">
            <div class="icon primary me-3">
              <i class="fas fa-id-badge"></i>
            </div>
            <div>
              <h6 class="mb-1">Total Roles</h6>
              <h4 class="mb-0">{{ $stats['total_roles'] }}</h4>
              <small class="text-success"><i class="fas fa-arrow-up"></i> Active roles</small>
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
              <i class="fas fa-users-gear"></i>
            </div>
            <div>
              <h6 class="mb-1">Avg Permissions</h6>
              <h4 class="mb-0">{{ $stats['avg_permissions'] }}</h4>
              <small class="text-success">Per role average</small>
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
              <i class="fas fa-lock-open"></i>
            </div>
            <div>
              <h6 class="mb-1">Active Roles</h6>
              <h4 class="mb-0">{{ $stats['active_roles'] }}</h4>
              <small class="text-success">Currently in use</small>
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
              <i class="fas fa-ban"></i>
            </div>
            <div>
              <h6 class="mb-1">Inactive Roles</h6>
              <h4 class="mb-0">{{ $stats['inactive_roles'] }}</h4>
              <small class="text-danger">Disabled</small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Role Management Page -->
  <div id="role-page" class="page-content">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h4 class="mb-0">Admin Role Management</h4>
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAdminRoleModal">
        <i class="fas fa-user-plus me-1"></i> Add Role
      </button>
    </div>

    @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    @endif

    @if(session('error'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    @endif

    <!--Search Bar and Export/Filter-->
    <div class="card mb-3">
      <div class="card-body">
        <div class="row g-3 align-items-center">
          <!-- Search Bar -->
          <div class="col-md-8">
            <form action="{{ route('roles.index') }}" method="GET">
              <div class="input-group" style="max-width: 300px">
                <input type="text" name="search" class="form-control form-control-sm" placeholder="Search roles..."
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
                data-bs-target="#roleFilterModal">
                <i class="fas fa-filter me-1"></i> Filter
              </button>
              <a href="{{ route('roles.index') }}" class="btn btn-outline-secondary" title="Reset Filters">
                <i class="fas fa-sync-alt"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Roles Table -->
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-hover table-bordered align-middle" id="rolesTable">
            <thead class="table-light">
              <tr>
                <th width="5%">Sr.No.</th>
                <th>Role</th>
                <th>Permissions</th>
                <th width="10%">Status</th>
                <th width="10%" class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
              @forelse($roles as $role)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>
                    <strong>{{ $role->display_name }}</strong>
                    @if($role->description)
                      <br><small class="text-muted">{{ Str::limit($role->description, 50) }}</small>
                    @endif
                  </td>
                  <td>
                    @if(is_array($role->permissions) && count($role->permissions) > 0)
                                  <span class="badge bg-info">{{ count($role->permissions) }} permissions</span>
                                  <br>
                                  <small class="text-muted">
                                    {{ implode(', ', array_slice(array_map(function ($p) {
                        return ucwords(str_replace('_', ' ', $p));
                      }, $role->permissions), 0, 3)) }}
                                    @if(count($role->permissions) > 3)
                                                  <span class="text-primary" style="cursor: pointer" data-bs-toggle="tooltip" title="{{ implode(', ', array_map(function ($p) {
                                        return ucwords(str_replace('_', ' ', $p));
                                      }, $role->permissions)) }}">
                                                    +{{ count($role->permissions) - 3 }} more
                                                  </span>
                                    @endif
                                  </small>
                    @else
                      <span class="text-muted">No permissions assigned</span>
                    @endif
                  </td>
                  <td>
                    <span class="badge bg-{{ $role->status == 'active' ? 'success' : 'danger' }}">
                      {{ ucfirst($role->status) }}
                    </span>
                  </td>
                  <td class="text-center">
                    <div class="dropdown">
                      <button class="btn btn-sm btn-light dropdown-toggle" type="button" id="actionMenu{{ $role->id }}"
                        data-bs-toggle="dropdown">
                        <i class="fas fa-ellipsis-v"></i>
                      </button>
                      <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                          <a class="dropdown-item edit-role-btn" href="javascript:void(0)" data-role-id="{{ $role->id }}">
                            <i class="fas fa-edit me-2"></i> Edit
                          </a>
                        </li>
                        <li>
                          <hr class="dropdown-divider">
                        </li>
                        <li>
                          <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Are you sure you want to delete this role?');">
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
                  <td colspan="5" class="text-center py-4">
                    <i class="fas fa-inbox fa-3x text-muted mb-3 d-block"></i>
                    <p class="text-muted">No roles found.</p>
                  </td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>

        <!-- Pagination -->
        <div class="mt-3 d-flex justify-content-between align-items-center">
          <div class="text-muted">
            Showing {{ $roles->firstItem() ?? 0 }} to {{ $roles->lastItem() ?? 0 }}
            of {{ $roles->total() }} entries
          </div>
          <div>
            {{-- {{ $roles->links() }} --}}
          </div>
        </div>
      </div>
    </div>
    {{--
  </div>

  {{--
  @include('admin.roles.partials.add_modal')
  @include('admin.roles.partials.edit_modal')
  @include('admin.roles.partials.export_modal')
  @include('admin.roles.partials.filter_modal') --}}
@endsection
<!-- Add Admin Role Modal -->
<div class="modal fade" id="addAdminRoleModal" tabindex="-1" aria-labelledby="addAdminRoleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addAdminRoleModalLabel">
          Add New Admin Role
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        {{-- <form id="addAdminRoleForm" action="{{ route('roles.store') }}" method="POST">
          <!-- Role Selection -->
          <div class="mb-3">
            <label for="adminRoleSelect" class="form-label">Select Role*</label>
            <select class="form-select" id="adminRoleSelect" required>
              <option value="" selected disabled>Choose a role</option>
              <option value="super_admin">Super Admin</option>
              <option value="inventory_manager">Inventory Manager</option>
              <option value="sales_manager">Sales Manager</option>
              <option value="customer_support">Customer Support</option>
              <option value="content_manager">Content Manager</option>
              <option value="custom">Custom Role</option>
            </select>
          </div>

          <!-- Custom Role Name -->
          <div class="mb-3" id="customRoleNameField" style="display: none">
            <label for="customRoleName" class="form-label">Custom Role Name*</label>
            <input type="text" class="form-control" id="customRoleName" placeholder="Enter role name" />
          </div>

          <!-- NEW: Status Dropdown -->
          <div class="mb-3">
            <label for="roleStatusSelect" class="form-label">Status*</label>
            <select class="form-select" id="roleStatusSelect" required>
              <option value="active" selected>Active</option>
              <option value="inactive">Inactive</option>
            </select>
          </div>

          <!-- NEW: Description Textbox -->
          <div class="mb-3">
            <label for="roleDescription" class="form-label">Description</label>
            <textarea class="form-control" id="roleDescription" rows="3"
              placeholder="Describe the purpose and permissions of this role"></textarea>
          </div>

          <!-- Permissions Section -->
          <div class="mb-3">
            <h6 class="text-muted mb-3">Permissions</h6>
            <div class="border p-3" style="max-height: 300px; overflow-y: auto">
              <!-- Dashboard -->
              <div class="form-check mb-2">
                <input class="form-check-input permission-check" type="checkbox" id="permDashboard" checked disabled />
                <label class="form-check-label" for="permDashboard">
                  <strong>Dashboard Access</strong>
                </label>
              </div>

              <!-- Products Section -->
              <div class="ms-4 mb-3">
                <div class="form-check mb-2">
                  <input class="form-check-input permission-check" type="checkbox" id="permViewProducts" />
                  <label class="form-check-label" for="permViewProducts">View Products</label>
                </div>
                <div class="form-check mb-2">
                  <input class="form-check-input permission-check" type="checkbox" id="permAddProducts" />
                  <label class="form-check-label" for="permAddProducts">Add Products</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input permission-check" type="checkbox" id="permEditProducts" />
                  <label class="form-check-label" for="permEditProducts">Edit Products</label>
                </div>
              </div>

              <!-- Orders Section -->
              <div class="ms-4 mb-3">
                <div class="form-check mb-2">
                  <input class="form-check-input permission-check" type="checkbox" id="permViewOrders" />
                  <label class="form-check-label" for="permViewOrders">View Orders</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input permission-check" type="checkbox" id="permProcessOrders" />
                  <label class="form-check-label" for="permProcessOrders">Process Orders</label>
                </div>
              </div>

              <!-- Reports -->
              <div class="form-check mb-2">
                <input class="form-check-input permission-check" type="checkbox" id="permViewReports" />
                <label class="form-check-label" for="permViewReports">
                  <strong>View Reports</strong>
                </label>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
              Cancel
            </button>
            <button type="submit" class="btn btn-primary" id="saveAdminRoleBtn">
              Save Role
            </button>
          </div>
        </form> --}}
        <form id="addAdminRoleForm" action="{{ route('roles.store') }}" method="POST">
          @csrf

          <!-- Role Selection -->
          <div class="mb-3">
            <label for="adminRoleSelect" class="form-label">Select Role*</label>
            <select class="form-select" id="adminRoleSelect" name="role_type" required>
              <option value="" selected disabled>Choose a role</option>
              <option value="super_admin">Super Admin</option>
              <option value="inventory_manager">Inventory Manager</option>
              <option value="sales_manager">Sales Manager</option>
              <option value="customer_support">Customer Support</option>
              <option value="content_manager">Content Manager</option>
              <option value="custom">Custom Role</option>
            </select>
          </div>

          <!-- Custom Role Name -->
          <div class="mb-3" id="customRoleNameField" style="display: none">
            <label for="customRoleName" class="form-label">Custom Role Name*</label>
            <input type="text" class="form-control" id="customRoleName" name="custom_name"
              placeholder="Enter role name" />
          </div>

          <!-- Status -->
          <div class="mb-3">
            <label for="roleStatusSelect" class="form-label">Status*</label>
            <select class="form-select" id="roleStatusSelect" name="status" required>
              <option value="active" selected>Active</option>
              <option value="inactive">Inactive</option>
            </select>
          </div>

          <!-- Description -->
          <div class="mb-3">
            <label for="roleDescription" class="form-label">Description</label>
            <textarea class="form-control" id="roleDescription" name="description" rows="3"
              placeholder="Describe the purpose and permissions of this role"></textarea>
          </div>

          <!-- Permissions -->
          <div class="mb-3">
            <h6 class="text-muted mb-3">Permissions</h6>
            <div class="border p-3" style="max-height: 300px; overflow-y: auto">
              <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" id="permDashboard" name="permissions[dashboard_access]"
                  checked disabled />
                <label class="form-check-label" for="permDashboard">
                  <strong>Dashboard Access</strong>
                </label>
              </div>

              <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" id="permViewProducts"
                  name="permissions[view_products]" />
                <label class="form-check-label" for="permViewProducts">
                  View Products
                </label>
              </div>
              <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" id="permAddProducts" name="permissions[add_products]" />
                <label class="form-check-label" for="permAddProducts">
                  Add Products
                </label>
              </div>

              <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" id="permEditProducts"
                  name="permissions[edit_products]" />
                <label class="form-check-label" for="permEditProducts">
                  Edit Products
                </label>
              </div>

              <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" id="permViewOrders" name="permissions[view_orders]" />
                <label class="form-check-label" for="permViewOrders">
                  View Orders
                </label>
              </div>

              <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" id="permProcessOrders"
                  name="permissions[process_orders]" />
                <label class="form-check-label" for="permProcessOrders">
                  Process Orders
                </label>
              </div>
            </div>
          </div>
          <!-- Reports -->
          <div class="form-check mb-2">
            <input class="form-check-input permission-check" type="checkbox" id="permViewReports" />
            <label class="form-check-label" for="permViewReports">
              <strong>View Reports</strong>
            </label>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
              Cancel
            </button>
            <button type="submit" class="btn btn-primary" id="saveAdminRoleBtn">
              Save Role
            </button>
          </div>
        </form>

      </div>

    </div>
  </div>
</div>


<!-- Edit Role Modal -->
<div class="modal fade" id="editRoleModal" tabindex="-1" aria-labelledby="editRoleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editRoleModalLabel">
          Edit Admin Role
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="editRoleForm">
          <input type="hidden" id="editRoleId"/>

          <!-- Role Name -->
          <div class="mb-3">
            <label for="editRoleName" class="form-label">Role Name*</label>
            <input type="text" class="form-control" id="editRoleName" required />
          </div>

          <!-- Status Dropdown -->
          <div class="mb-3">
            <label for="editRoleStatus" class="form-label">Status*</label>
            <select class="form-select" id="editRoleStatus" required>
              <option value="active">Active</option>
              <option value="inactive">Inactive</option>
            </select>
          </div>

          <!-- Description -->
          <div class="mb-3">
            <label for="editRoleDescription" class="form-label">Description</label>
            <textarea class="form-control" id="editRoleDescription" rows="3"></textarea>
          </div>

          <!-- Permissions -->
          <div class="mb-3">
            <h6 class="text-muted mb-3">Permissions</h6>
            <div class="border p-3" style="max-height: 300px; overflow-y: auto">
              <!-- Dashboard -->
              <div class="form-check mb-2">
                <input class="form-check-input edit-permission-check" type="checkbox" id="editPermDashboard" checked
                  disabled />
                <label class="form-check-label" for="editPermDashboard">
                  <strong>Dashboard Access</strong>
                </label>
              </div>

              <!-- Products -->
              <div class="ms-4 mb-3">
                <div class="form-check mb-2">
                  <input class="form-check-input edit-permission-check" type="checkbox" id="editPermViewProducts" />
                  <label class="form-check-label" for="editPermViewProducts">View Products</label>
                </div>
                <div class="form-check mb-2">
                  <input class="form-check-input edit-permission-check" type="checkbox" id="editPermAddProducts" />
                  <label class="form-check-label" for="editPermAddProducts">Add Products</label>
                </div>
                <div class="form-check mb-2">
                  <input class="form-check-input edit-permission-check" type="checkbox" id="editPermEditProducts" />
                  <label class="form-check-label" for="editPermEditProducts">Edit Products</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input edit-permission-check" type="checkbox" id="editPermDeleteProducts" />
                  <label class="form-check-label" for="editPermDeleteProducts">Delete Products</label>
                </div>
              </div>

              <!-- Categories -->
              <div class="ms-4 mb-3">
                <div class="form-check mb-2">
                  <input class="form-check-input edit-permission-check" type="checkbox" id="editPermViewCategories" />
                  <label class="form-check-label" for="editPermViewCategories">View Categories</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input edit-permission-check" type="checkbox" id="editPermManageCategories" />
                  <label class="form-check-label" for="editPermManageCategories">Manage Categories</label>
                </div>
              </div>

              <!-- Orders -->
              <div class="ms-4 mb-3">
                <div class="form-check mb-2">
                  <input class="form-check-input edit-permission-check" type="checkbox" id="editPermViewOrders" />
                  <label class="form-check-label" for="editPermViewOrders">View Orders</label>
                </div>
                <div class="form-check mb-2">
                  <input class="form-check-input edit-permission-check" type="checkbox" id="editPermProcessOrders" />
                  <label class="form-check-label" for="editPermProcessOrders">Process Orders</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input edit-permission-check" type="checkbox" id="editPermCancelOrders" />
                  <label class="form-check-label" for="editPermCancelOrders">Cancel Orders</label>
                </div>
              </div>

              <!-- Customers -->
              <div class="ms-4 mb-3">
                <div class="form-check mb-2">
                  <input class="form-check-input edit-permission-check" type="checkbox" id="editPermViewCustomers" />
                  <label class="form-check-label" for="editPermViewCustomers">View Customers</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input edit-permission-check" type="checkbox" id="editPermEditCustomers" />
                  <label class="form-check-label" for="editPermEditCustomers">Edit Customers</label>
                </div>
              </div>

              <!-- Reports -->
              <div class="form-check mb-2">
                <input class="form-check-input edit-permission-check" type="checkbox" id="editPermViewReports" />
                <label class="form-check-label" for="editPermViewReports">
                  <strong>View Reports</strong>
                </label>
              </div>

              <!-- Settings -->
              <div class="form-check">
                <input class="form-check-input edit-permission-check" type="checkbox" id="editPermSystemSettings" />
                <label class="form-check-label" for="editPermSystemSettings">
                  <strong>System Settings</strong>
                </label>
              </div>
              <div class="modal-footer">
            <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">
              Cancel
            </button>
            <button type="submit" class="btn btn-primary" id="updateRoleBtn">
              Update Role
            </button>
          </div>
            </div>
          </div>
          
        </form>
      </div>

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

<!-- Role Filter Modal -->
<div class="modal fade" id="roleFilterModal" tabindex="-1" aria-labelledby="roleFilterModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="roleFilterModalLabel">
          Filter Roles
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="roleFilterForm">
          <!-- Status -->
          <div class="mb-4">
            <h6 class="text-muted mb-3">Status</h6>
            <div class="btn-group w-100" role="group">
              <input type="radio" class="btn-check" name="roleStatus" id="roleStatusAll" autocomplete="off" checked />
              <label class="btn btn-outline-secondary" for="roleStatusAll">All</label>

              <input type="radio" class="btn-check" name="roleStatus" id="roleStatusActive" autocomplete="off"
                value="active" />
              <label class="btn btn-outline-success" for="roleStatusActive">Active</label>

              <input type="radio" class="btn-check" name="roleStatus" id="roleStatusInactive" autocomplete="off"
                value="inactive" />
              <label class="btn btn-outline-danger" for="roleStatusInactive">Inactive</label>
            </div>
          </div>

          <!-- Permission Level -->
          <div class="mb-4">
            <h6 class="text-muted mb-3">Permission Level</h6>
            <select class="form-select" id="permissionLevelFilter">
              <option value="" selected>All Levels</option>
              <option value="full">Full Access</option>
              <option value="partial">Partial Access</option>
              <option value="limited">Limited Access</option>
            </select>
          </div>

          <!-- Last Updated -->
          <div class="mb-4">
            <h6 class="text-muted mb-3">Last Updated</h6>
            <div class="row g-3">
              <div class="col-md-6">
                <label for="roleStartDate" class="form-label">From</label>
                <input type="date" class="form-control" id="roleStartDate" />
              </div>
              <div class="col-md-6">
                <label for="roleEndDate" class="form-label">To</label>
                <input type="date" class="form-control" id="roleEndDate" />
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" id="resetRoleFiltersBtn">
          <i class="fas fa-undo me-1"></i> Reset
        </button>
        <button type="button" class="btn btn-primary" id="applyRoleFiltersBtn">
          <i class="fas fa-check me-1"></i> Apply
        </button>
      </div>
    </div>
  </div>
</div>
</div>

<script>
  // Role Filter Controller
  if (typeof window.roleFilters === "undefined") {
    window.roleFilters = {
      init: function () {
        // Reset filters
        document
          .getElementById("resetRoleFiltersBtn")
          .addEventListener("click", function () {
            document.getElementById("roleFilterForm").reset();
          });

        // Apply filters
        document
          .getElementById("applyRoleFiltersBtn")
          .addEventListener("click", function () {
            const filters = {
              status: document.querySelector(
                'input[name="roleStatus"]:checked'
              ).value,
              permissionLevel: document.getElementById(
                "permissionLevelFilter"
              ).value,
              dateRange: {
                start: document.getElementById("roleStartDate").value,
                end: document.getElementById("roleEndDate").value,
              },
            };

            console.log("Applying role filters:", filters);
            bootstrap.Modal.getInstance(
              document.getElementById("roleFilterModal")
            ).hide();
          });
      },
    };

    document.addEventListener("DOMContentLoaded", function () {
      window.roleFilters.init();
    });
  }
</script>

{{--
<script>
  // Updated JavaScript with new fields
  if (typeof window.adminRoleModal === "undefined") {
    window.adminRoleModal = {
      init: function () {
        // Role type change handler
        document.getElementById("adminRoleSelect").addEventListener(
          "change",
          function () {
            const showCustomName = this.value === "custom";
            document.getElementById("customRoleNameField").style.display =
              showCustomName ? "block" : "none";
            if (!showCustomName) this.autoSetPermissions(this.value);
          }.bind(this)
        );

        // Save handler
        document.getElementById("saveAdminRoleBtn").addEventListener(
          "click",
          function () {
            const form = document.getElementById("addAdminRoleForm");
            if (form.checkValidity()) {
              const roleData = {
                roleType: document.getElementById("adminRoleSelect").value,
                customName:
                  document.getElementById("adminRoleSelect").value ===
                    "custom"
                    ? document.getElementById("customRoleName").value
                    : null,
                status: document.getElementById("roleStatusSelect").value,
                description:
                  document.getElementById("roleDescription").value,
                permissions: this.getSelectedPermissions(),
              };
              console.log("Saving role:", roleData);
              bootstrap.Modal.getInstance(
                document.getElementById("addAdminRoleModal")
              ).hide();
              alert("Role saved successfully!");
            } else {
              form.classList.add("was-validated");
            }
          }.bind(this)
        );
      },

      autoSetPermissions: function (roleType) {
        // ... (same permission auto-setting logic as before)
      },

      getSelectedPermissions: function () {
        const permissions = {};
        document
          .querySelectorAll(".permission-check")
          .forEach((checkbox) => {
            permissions[checkbox.id] = checkbox.checked;
          });
        return permissions;
      },
    };

    document.addEventListener("DOMContentLoaded", function () {
      window.adminRoleModal.init();
    });
  }
</script> --}}

<script>
  // Edit Role Modal Controller
  if (typeof window.editRoleModal === "undefined") {
    window.editRoleModal = {
      init: function () {
        const editModal = document.getElementById("editRoleModal");

        // Modal show event
        editModal.addEventListener("show.bs.modal", function (event) {
          const button = event.relatedTarget;
          const roleId = button.getAttribute("data-role-id");

          // In real app, fetch role data via AJAX
          console.log("Editing role ID:", roleId);

          // Demo data - replace with actual API call
          const roleData = {
            id: roleId,
            name: "Inventory Manager",
            status: "active",
            description:
              "Can manage products and categories but not orders or customers",
            permissions: {
              dashboard: true,
              viewProducts: true,
              addProducts: true,
              editProducts: true,
              deleteProducts: false,
              viewCategories: true,
              manageCategories: true,
              viewOrders: false,
              processOrders: false,
              cancelOrders: false,
              viewCustomers: false,
              editCustomers: false,
              viewReports: false,
              systemSettings: false,
            },
          };

          // Populate form
          document.getElementById("editRoleId").value = roleData.id;
          document.getElementById("editRoleName").value = roleData.name;
          document.getElementById("editRoleStatus").value = roleData.status;
          document.getElementById("editRoleDescription").value =
            roleData.description;

          // Set permissions
          document.getElementById("editPermDashboard").checked =
            roleData.permissions.dashboard;
          document.getElementById("editPermViewProducts").checked =
            roleData.permissions.viewProducts;
          document.getElementById("editPermAddProducts").checked =
            roleData.permissions.addProducts;
          document.getElementById("editPermEditProducts").checked =
            roleData.permissions.editProducts;
          document.getElementById("editPermDeleteProducts").checked =
            roleData.permissions.deleteProducts;
          document.getElementById("editPermViewCategories").checked =
            roleData.permissions.viewCategories;
          document.getElementById("editPermManageCategories").checked =
            roleData.permissions.manageCategories;
          document.getElementById("editPermViewOrders").checked =
            roleData.permissions.viewOrders;
          document.getElementById("editPermProcessOrders").checked =
            roleData.permissions.processOrders;
          document.getElementById("editPermCancelOrders").checked =
            roleData.permissions.cancelOrders;
          document.getElementById("editPermViewCustomers").checked =
            roleData.permissions.viewCustomers;
          document.getElementById("editPermEditCustomers").checked =
            roleData.permissions.editCustomers;
          document.getElementById("editPermViewReports").checked =
            roleData.permissions.viewReports;
          document.getElementById("editPermSystemSettings").checked =
            roleData.permissions.systemSettings;
        });

        // Update role handler
        document.getElementById("updateRoleBtn").addEventListener(
          "click",
          function () {
            const form = document.getElementById("editRoleForm");

            if (form.checkValidity()) {
              const roleData = {
                id: document.getElementById("editRoleId").value,
                name: document.getElementById("editRoleName").value,
                status: document.getElementById("editRoleStatus").value,
                description: document.getElementById("editRoleDescription")
                  .value,
                permissions: this.getSelectedPermissions(),
              };

              // In real app, update the role via API
              console.log("Updating role:", roleData);

              // Close modal
              bootstrap.Modal.getInstance(editModal).hide();

              // Show success
              alert("Role updated successfully!");
            } else {
              form.classList.add("was-validated");
            }
          }.bind(this)
        );
      },

      getSelectedPermissions: function () {
        const permissions = {};
        document
          .querySelectorAll(".edit-permission-check")
          .forEach((checkbox) => {
            permissions[checkbox.id.replace("editPerm", "").toLowerCase()] =
              checkbox.checked;
          });
        return permissions;
      },
    };

    // Initialize when DOM is loaded
    document.addEventListener("DOMContentLoaded", function () {
      window.editRoleModal.init();
    });
  }
</script>

@push('scripts')
  <script>
    // Enable tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl)
    });

    // Edit role click handler
    document.querySelectorAll('.edit-role-btn').forEach(btn => {
      btn.addEventListener('click', function () {
        const roleId = this.getAttribute('data-role-id');

        // Fetch role data
        fetch(`/admin/roles/${roleId}`)
          .then(response => response.json())
          .then(role => {
            // Populate edit modal
            document.getElementById('editRoleId').value = role.id;
            document.getElementById('editRoleName').value = role.display_name;
            document.getElementById('editRoleStatus').value = role.status;
            document.getElementById('editRoleDescription').value = role.description || '';

            // Reset all checkboxes first
            document.querySelectorAll('.edit-permission-check').forEach(checkbox => {
              checkbox.checked = false;
            });

            // Check permissions
            if (role.permissions && Array.isArray(role.permissions)) {
              role.permissions.forEach(permission => {
                const checkbox = document.querySelector(`#editPerm${permission.charAt(0).toUpperCase() + permission.slice(1).replace(/_/g, '')}`);
                if (checkbox) {
                  checkbox.checked = true;
                }
              });
            }

            // Show modal
            new bootstrap.Modal(document.getElementById('editRoleModal')).show();
          })
          .catch(error => {
            console.error('Error:', error);
            alert('Failed to load role data');
          });
      });
    });

    // Auto-hide alerts
    setTimeout(function () {
      $('.alert').fadeOut('slow');
    }, 5000);
  </script>
@endpush



{{--
<script>
  document.getElementById('saveAdminRoleBtn').addEventListener('click', function () {
    const role = document.getElementById('adminRoleSelect').value;
    const customRoleName = document.getElementById('customRoleName').value;
    const status = document.getElementById('roleStatusSelect').value;
    const description = document.getElementById('roleDescription').value;

    // Collect permissions
    const permissions = [];
    document.querySelectorAll('.permission-check:checked').forEach((checkbox) => {
      permissions.push(checkbox.id);
    });

    // Debug (check in console)
    console.log({
      role, customRoleName, status, description, permissions
    });

    // Now send to backend
    fetch("{{ route('roles.store') }}", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        "X-CSRF-TOKEN": "{{ csrf_token() }}"
      },
      body: JSON.stringify({
        role,
        customRoleName,
        status,
        description,
        permissions
      }),
    })
      .then(res => res.json())
      .then(data => {
        console.log(data);
        alert('Role saved successfully!');
        // Optionally close modal
        const modal = bootstrap.Modal.getInstance(document.getElementById('addAdminRoleModal'));
        modal.hide();
      })
      .catch(err => {
        console.error(err);
        alert('Error saving role.');
      });
  });
</script> --}}