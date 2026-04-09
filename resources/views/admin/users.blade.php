@extends('admin.layouts.app')
@section('title', ' Find & Hire Verified Professionals | Globe Assist')
@section('content')

  <style>
    .bg-conic-gradient {
      background: conic-gradient(from 260deg at 50% 50%, #e7f5e9 0deg, #d3ebd7 120deg, #f5f2fa 240deg, #e7f5e9 360deg);
    }

    .btn-submit {
      background-color: rgb(108 186 12) !important;
    }

    .form-label {
      margin-bottom: 5px;
      margin-left: 5px;
    }

    input::placeholder {
      font-size: 14px;
      color: #999;
    }

    .form-select.rounded-4,
    .form-control.rounded-4 {
      box-shadow: inset 1px 1px 2px rgba(0, 0, 0, 0.2);
    }
  </style>

  <!-- Stats Cards -->
  <div class="row mb-4">
    <!-- Total Users -->
    <div class="col-md-6 col-lg-3 mb-3">
      <div class="card card-primary h-100">
        <div class="card-body">
          <div class="stat-card d-flex align-items-center">
            <div class="icon primary me-3">
              <i class="fas fa-users"></i>
            </div>
            <div>
              <h6 class="mb-1">Total Users</h6>
              <h4 class="mb-0">{{ $users->total() ?? $users->count() }}</h4>
              <small class="text-success"><i class="fas fa-arrow-up"></i> 5 new this month</small>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Active Users -->
    <div class="col-md-6 col-lg-3 mb-3">
      <div class="card card-primary h-100">
        <div class="card-body">
          <div class="stat-card d-flex align-items-center">
            <div class="icon primary me-3">
              <i class="fas fa-user-check"></i>
            </div>
            <div>
              <h6 class="mb-1">Active Users</h6>
              <h4 class="mb-0">{{ $users->where('status', 'active')->count() }}</h4>
              <small class="text-success"><i class="fas fa-arrow-up"></i> More than last month</small>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Inactive Users -->
    <div class="col-md-6 col-lg-3 mb-3">
      <div class="card card-secondary h-100">
        <div class="card-body">
          <div class="stat-card d-flex align-items-center">
            <div class="icon secondary me-3">
              <i class="fas fa-user-slash"></i>
            </div>
            <div>
              <h6 class="mb-1">Inactive Users</h6>
              <h4 class="mb-0">{{ $users->where('status', 'inactive')->count() }}</h4>
              <small class="text-danger"><i class="fas fa-arrow-down"></i> Slight drop this month</small>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Last Login Activity -->
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
              {{-- <h4 class="mb-0">
                @if($lastLogin = $users->sortByDesc('last_login')->first())
                {{ $lastLogin->last_login->diffForHumans() }}
                @else
                N/A
                @endif
              </h4> --}}
              <small class="text-success">Recent activity recorded</small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Admin Users Page -->
  <div id="admin-users-page" class="page-content">
    <div class="page-header">
      <h4 class="page-title">User Management</h4>
      <!-- Trigger Button -->
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
        <i class="fas fa-user-plus me-1"></i> Add Users
      </button>
    </div>

    <!--Search Bar and Export/Filter-->
    <div class="card mb-3">
      <div class="card-body">
        <div class="row g-3 align-items-center">
          <!-- Search Bar -->
          <div class="col-md-8">
            <form action="{{ url('/admin/users') }}" method="GET">
              <div class="input-group" style="max-width: 300px">
                <input type="text" name="search" class="form-control form-control-sm"
                  placeholder="Search by name, email, or company..." value="{{ request('search') }}" />
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
                data-bs-target="#exportUserModal">
                <i class="fas fa-file-export me-1"></i> Export
              </button>
              <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                data-bs-target="#userFilterModal">
                <i class="fas fa-filter me-1"></i> Filter
              </button>
              <a href="{{ url('/admin/users') }}" class="btn btn-outline-secondary" id="resetFilters"
                title="Reset Filters">
                <i class="fas fa-sync-alt"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Admin Users Table -->
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-hover" id="adminUsersTable">
            <thead>
              <tr>
                <th>Sr.No.</th>
                <th>Date</th>
                <th>ID</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Mobile Number</th>
                <th>Email</th>
                <th>Company Name</th>
                <th>Company Type</th>
                <th>Location</th>
                <th>Country</th>
                {{-- <th>Status</th> --}}
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($users as $index => $user)
                <tr>
                  {{-- @dd($users) --}}
                  <td>{{ $index + 1 }}</td>
                  <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d M Y') }}</td>
                  <td>{{ $user->user_id }}</td>
                  {{-- @dd($user->user_id) --}}
                  <td>
                    <img src="{{ $user->image ? asset('storage/' . $user->image) : asset('asset/image/profile-pic.png') }}"
                      class="customer-img" width="40" height="40" alt="User">
                  </td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->mobile }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->company }}</td>
                  <td>{{ $user->type }}</td>
                  <td>{{ $user->location }}</td>
                  <td>{{ $user->country }}</td>
                  {{-- <td>
                    @if($user->status == 'Active')
                    <span class="badge bg-success">Active</span>
                    @else
                    <span class="badge bg-danger">Inactive</span>
                    @endif
                  </td> --}}
                  <td class="text-center">
                    <div class="dropdown">
                      <button class="btn btn-sm" type="button" data-bs-toggle="dropdown">
                        <i class="fas fa-ellipsis-v"></i>
                      </button>
                      <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                          <a class="dropdown-item view-user-btn" href="#" data-bs-toggle="modal"
                            data-bs-target="#viewUserModal"
                            data-photo="{{ $user->image ? asset('storage/' . $user->image) : asset('asset/image/profile-pic.png') }}"
                            data-name="{{ $user->name }}" data-mobile="{{ $user->mobile }}" data-email="{{ $user->email }}"
                            data-date="{{ \Carbon\Carbon::parse($user->created_at)->format('d M Y') }}"
                            data-company="{{ $user->company }}" data-type="{{ $user->type }}"
                            data-location="{{ $user->location }}" data-country="{{ $user->country }}"
                            data-status="{{ $user->status ?? 'Active' }}"
                            data-description="{{ $user->description ?? 'No description available' }}">
                            <i class="fas fa-eye me-2"></i> View
                          </a>

                        </li>
                        <li>
                          <a class="dropdown-item edit-user-btn" href="#" data-bs-toggle="modal"
                            data-bs-target="#editUserModal" data-id="{{ $user->id }}"
                            data-photo="{{ $user->image ? asset('storage/' . $user->image) : asset('asset/image/profile-pic.png') }}"
                            data-name="{{ $user->name }}" data-mobile="{{ $user->mobile }}" data-email="{{ $user->email }}"
                            data-date="{{ \Carbon\Carbon::parse($user->created_at)->format('Y-m-d') }}"
                            data-company="{{ $user->company }}" data-type="{{ $user->type }}"
                            data-location="{{ $user->location }}" data-country="{{ $user->country }}"
                            data-status="{{ $user->status ?? 'active' }}" data-description="{{ $user->description ?? '' }}">
                            <i class="fas fa-edit me-2"></i> Edit
                          </a>
                        </li>
                        <li>
                          <hr class="dropdown-divider">
                        </li>
                        <li>
                          {{-- @dd($user) --}}
                          <form id="deleteUserForm{{ $user->id }}" action="{{ route('users.destroy', $user->id) }}"
                            method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <a href="#" class="dropdown-item text-danger"
                              onclick="if(confirm('Are you sure you want to delete this user?')) { document.getElementById('deleteUserForm{{ $user->id }}').submit(); }">
                              <i class="fas fa-trash me-2"></i> Delete
                            </a>
                          </form>
                        </li>

                      </ul>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          <div class="d-flex justify-content-between align-items-center mt-4">
            <div class="text-muted">
              Page <strong>{{ $users->currentPage() }}</strong> of <strong>{{ $users->lastPage() }}</strong> —
              Showing <strong>{{ $users->firstItem() }}–{{ $users->lastItem() }}</strong> of
              <strong>{{ $users->total() }}</strong> entries
            </div>
            <nav aria-label="Page navigation">
              <ul class="pagination mb-0 gap-1">
                {{-- Prev --}}
                <li class="page-item {{ $users->onFirstPage() ? 'disabled' : '' }}">
                  <a class="page-link px-3 rounded-pill" href="{{ $users->previousPageUrl() ?? '#' }}">
                    <i class="bi bi-arrow-left-circle-fill me-1"></i> Prev
                  </a>
                </li>

                {{-- Page numbers --}}
                @foreach ($users->getUrlRange(1, $users->lastPage()) as $page => $url)
                  <li class="page-item {{ $page == $users->currentPage() ? 'active' : '' }}">
                    <a class="page-link px-3 rounded-pill" href="{{ $url }}">{{ $page }}</a>
                  </li>
                @endforeach

                {{-- Next --}}
                <li class="page-item {{ $users->hasMorePages() ? '' : 'disabled' }}">
                  <a class="page-link px-3 rounded-pill" href="{{ $users->nextPageUrl() ?? '#' }}">
                    Next <i class="bi bi-arrow-right-circle-fill ms-1"></i>
                  </a>
                </li>
              </ul>
            </nav>
          </div>

        </div>
      </div>
    </div>

  </div>

  </div>


  <!-- Add User Modal -->
  <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content bg-conic-gradient">
        <div class="modal-header mx-4 border-0 mt-4">
          <h5 class="modal-title" id="addUserModalLabel">Add New User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>


        <!-- User Modal Form -->
        <div class="modal-body mx-4 small">
          <form id="addUserForm" action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
              <!-- Name -->
              <div class="col-md-6 mb-3">
                <label class="form-label">Full Name*</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control rounded-4"
                  placeholder="Enter full name" required />
              </div>

              <!-- Mobile -->
              <div class="col-md-6 mb-3">
                <label class="form-label">Mobile Number*</label>
                <input type="tel" name="mobile" value="{{ old('mobile') }}" class="form-control rounded-4"
                  placeholder="Enter mobile number" required />
              </div>
            </div>

            <div class="row">
              <!-- Email -->
              <div class="col-md-6 mb-3">
                <label class="form-label">Email*</label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control rounded-4"
                  placeholder="Enter email" required />
              </div>

              <!-- Company Name -->
              <div class="col-md-6 mb-3">
                <label class="form-label">Company Name*</label>
                <input type="text" name="company_name" value="{{ old('company_name') }}" class="form-control rounded-4"
                  placeholder="Enter company name" required />
              </div>
            </div>

            <div class="row">
              <!-- Company Type -->
              <div class="col-md-6 mb-3">
                <label class="form-label">Company Type*</label>
                <select name="company_type" class="form-select rounded-4" required>
                  <option value="" disabled {{ old('company_type') ? '' : 'selected' }}>Select type
                  </option>
                  <option value="Private Ltd" {{ old('company_type') == 'Private Ltd' ? 'selected' : '' }}>
                    Private Ltd</option>
                  <option value="Public Ltd" {{ old('company_type') == 'Public Ltd' ? 'selected' : '' }}>
                    Public Ltd</option>
                  <option value="Partnership" {{ old('company_type') == 'Partnership' ? 'selected' : '' }}>
                    Partnership</option>
                  <option value="Proprietorship" {{ old('company_type') == 'Proprietorship' ? 'selected' : '' }}>
                    Proprietorship</option>
                  <option value="Startup" {{ old('company_type') == 'Startup' ? 'selected' : '' }}>Startup
                  </option>
                </select>
              </div>

              <!-- Location -->
              <div class="col-md-6 mb-3">
                <label class="form-label">Location / Address*</label>
                <input type="text" name="location" value="{{ old('location') }}" class="form-control rounded-4"
                  placeholder="Enter city / state" required />
              </div>
            </div>

            <div class="row">
              <!-- Country -->
              <div class="col-md-6">
                <label class="form-label">Country*</label>
                <select name="country" id="countrySelect" class="form-select rounded-4" required>
                  <option value="" disabled selected>Loading countries...</option>
                </select>
              </div>

              <!-- Image -->
              <div class="col-md-6 mb-3">
                <label class="form-label">Image*</label>
                {{-- <input type="file" name="image" class="form-control rounded-4" value="{{ old('image') }}" />
                @error('image')
                <span class="text-danger">{{ $message }}</span>
                @enderror --}}

                <input type="file" id="fileInput" name="image" class="form-control rounded-4" multiple accept="image/*"
                  value="{{ old('image') }}" required>
                <div id="errorMsg" class="text-danger"></div>
                <script>
                  const fileInput = document.getElementById("fileInput");
                  const errorMsg = document.getElementById("errorMsg");

                  const MAX_SIZE = 2 * 1024 * 1024; // 2 MB

                  fileInput.addEventListener("change", function () {
                    errorMsg.textContent = ""; // clear old error

                    if (fileInput.files.length > 0) {
                      const oversizedFiles = [];

                      for (let file of fileInput.files) {
                        if (file.size > MAX_SIZE) {
                          oversizedFiles.push(file.name);
                        }
                      }

                      if (oversizedFiles.length > 0) {
                        errorMsg.textContent =
                          "These files exceed 2 MB: " + oversizedFiles.join(", ");
                        fileInput.value = ""; // clear file input
                      }
                    }
                  });
                </script>
              </div>
              <!-- Status -->
              <!-- <div class="col-md-6 mb-3">
                                                                                                <label class="form-label">Status*</label>
                                                                                         <select name="status" class="form-select rounded-4" required>
                                                                                                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                                                                                                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive
                                                                                                    </option>
                                                                                                    <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending
                                                                                                    </option>
                                                                                                </select>
                                                                                            </div> -->
            </div>

            <!-- Description -->
            <div class="mb-3">
              <label class="form-label">Description</label>
              <textarea name="description" class="form-control rounded-4" rows="2">{{ old('description') }}</textarea>
            </div>

            {{-- <div class="modal-footer border-0">
              <button type="button" class="btn btn-outline-dark rounded-4" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-submit rounded-4">Save User</button>
            </div> --}}
            <!-- Modal Footer -->
            <div class="modal-footer border-0 d-flex justify-content-start">
              <button type="submit" class="btn btn-submit rounded-4">Submit</button>
            </div>

          </form>
        </div>

      </div>
    </div>
  </div>

  <!--view user modal-->
  <div class="modal fade" id="viewUserModal" tabindex="-1" aria-labelledby="viewUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header border-bottom">
          <h5 class="modal-title" id="viewUserModalLabel">User Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <!-- Top Section: Photo & Basic Info -->
          <div class="d-flex align-items-center mb-4">
            <div class="me-4 text-center">
              <img id="viewUserPhoto" src="./assets/globe assist logo.png" class="rounded-circle border" width="120"
                height="120" alt="User Photo" />
            </div>
            <div class="flex-grow-1">
              <h4 id="viewUserName">John Doe</h4>
              <p class="mb-1">
                <strong>Mobile:</strong>
                <span id="viewUserMobile">+91 9876543210</span>
              </p>
              <p class="mb-1">
                <strong>Email:</strong>
                <span id="viewUserEmail">john@example.com</span>
              </p>
              <p class="mb-0">
                <strong>Date Joined:</strong>
                <span id="viewUserDate">15 May 2023</span>
              </p>
            </div>
          </div>

          <hr />

          <!-- Company Info -->
          <h6 class="text-uppercase text-muted mb-2">Company Details</h6>
          <div class="row mb-3">
            <div class="col-md-6">
              <div class="p-3 border rounded mb-2">
                <strong>Company Name:</strong>
                <p id="viewCompanyName" class="mb-0">JewelryPro Pvt Ltd</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="p-3 border rounded mb-2">
                <strong>Company Type:</strong>
                <p id="viewCompanyType" class="mb-0">Private Ltd</p>
              </div>
            </div>
          </div>

          <!-- Location Info -->
          <h6 class="text-uppercase text-muted mb-2">Location</h6>
          <div class="row mb-3">
            <div class="col-md-6">
              <div class="p-3 border rounded mb-2">
                <strong>City / State:</strong>
                <p id="viewUserLocation" class="mb-0">New Delhi</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="p-3 border rounded mb-2">
                <strong>Country:</strong>
                <p id="viewUserCountry" class="mb-0">India</p>
              </div>
            </div>
          </div>

          <!-- Status & Description -->
          <h6 class="text-uppercase text-muted mb-2">
            Status & Description
          </h6>
          <div class="row">
            <div class="col-md-6">
              <div class="p-3 border rounded mb-2">
                <strong>Status:</strong>
                <p id="viewUserStatus" class="mb-0">
                  <span class="badge bg-success">Active</span>
                </p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="p-3 border rounded mb-2">
                <strong>Description:</strong>
                <p id="viewUserDescription" class="mb-0">
                  This is a sample user description.
                </p>
              </div>
            </div>
          </div>
        </div>

        <div class="modal-footer border-top">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            Close
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Edit User Modal -->
  <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          
          <form id="editUserForm" action="{{ route('admin.users.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Laravel PUT for updates -->

            <input type="hidden" name="id" id="editUserId" />

            <!-- User Photo -->
            <div class="mb-3 text-center">
              <div class="position-relative d-inline-block">
                <img id="editUserPhotoPreview" src="https://via.placeholder.com/150" class="rounded-circle border"
                  width="120" height="120" alt="User photo" />
                <label for="editUserPhoto" class="btn btn-sm btn-primary position-absolute bottom-0 end-0 rounded-circle">
                  <i class="fas fa-camera"></i>
                  <input type="file" name="image" id="editUserPhoto" accept="image/*" class="d-none" />
                </label>
              </div>
            </div>

            <div class="row">
              <!-- Name -->
              <div class="col-md-6 mb-3">
                <label for="editUserName" class="form-label">Full Name*</label>
                <input type="text" class="form-control" name="name" id="editUserName" required />
              </div>

              <!-- Mobile -->
              <div class="col-md-6 mb-3">
                <label for="editUserMobile" class="form-label">Mobile Number*</label>
                <input type="tel" class="form-control" name="mobile" id="editUserMobile" required />
              </div>
            </div>

            <div class="row">
              <!-- Email -->
              <div class="col-md-6 mb-3">
                <label for="editUserEmail" class="form-label">Email*</label>
                <input type="email" class="form-control" name="email" id="editUserEmail" required />
              </div>

              <!-- Company Name -->
              <div class="col-md-6 mb-3">
                <label for="editCompanyName" class="form-label">Company Name*</label>
                <input type="text" class="form-control" name="company" id="editCompanyName" required />
              </div>
            </div>

            <div class="row">
              <!-- Company Type -->
              <div class="col-md-6 mb-3">
                <label for="editCompanyType" class="form-label">Company Type*</label>
                <select class="form-select" name="type" id="editCompanyType" required>
                  <option value="" disabled>Select type</option>
                  <option value="Private Ltd">Private Ltd</option>
                  <option value="Public Ltd">Public Ltd</option>
                  <option value="Partnership">Partnership</option>
                  <option value="Proprietorship">Proprietorship</option>
                  <option value="Startup">Startup</option>
                </select>
              </div>

              <!-- Location -->
              <div class="col-md-6 mb-3">
                <label for="editLocation" class="form-label">Location / Address*</label>
                <input type="text" class="form-control" name="location" id="editLocation" required />
              </div>
            </div>

            <div class="row">
              <!-- Country -->
              <div class="col-md-6">
                <label class="form-label">Country*</label>
                <select name="country" id="editCountry" class="form-select rounded-4" required>
                  <option value="" disabled >Select country</option>
                  <option value="India">India</option>
                  <option value="Afghanistan">Afghanistan</option>
                  <option value="Albania">Albania</option>
                  <option value="Algeria">Algeria</option>
                  <option value="Andorra">Andorra</option>
                  <option value="Angola">Angola</option>
                  <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                  <option value="Argentina">Argentina</option>
                  <option value="Armenia">Armenia</option>
                  <option value="Australia">Australia</option>
                  <option value="Austria">Austria</option>
                  <option value="Azerbaijan">Azerbaijan</option>
                  <option value="Bahamas">Bahamas</option>
                  <option value="Bahrain">Bahrain</option>
                  <option value="Bangladesh">Bangladesh</option>
                  <option value="Barbados">Barbados</option>
                  <option value="Belarus">Belarus</option>
                  <option value="Belgium">Belgium</option>
                  <option value="Belize">Belize</option>
                  <option value="Benin">Benin</option>
                  <option value="Bhutan">Bhutan</option>
                  <option value="Bolivia">Bolivia</option>
                  <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                  <option value="Botswana">Botswana</option>
                  <option value="Brazil">Brazil</option>
                  <option value="Brunei">Brunei</option>
                  <option value="Bulgaria">Bulgaria</option>
                  <option value="Burkina Faso">Burkina Faso</option>
                  <option value="Burundi">Burundi</option>
                  <option value="Cambodia">Cambodia</option>
                  <option value="Cameroon">Cameroon</option>
                  <option value="Canada">Canada</option>
                  <option value="Cape Verde">Cape Verde</option>
                  <option value="Central African Republic">Central African Republic</option>
                  <option value="Chad">Chad</option>
                  <option value="Chile">Chile</option>
                  <option value="China">China</option>
                  <option value="Colombia">Colombia</option>
                  <option value="Comoros">Comoros</option>
                  <option value="Congo (Brazzaville)">Congo (Brazzaville)</option>
                  <option value="Congo (Kinshasa)">Congo (Kinshasa)</option>
                  <option value="Costa Rica">Costa Rica</option>
                  <option value="Croatia">Croatia</option>
                  <option value="Cuba">Cuba</option>
                  <option value="Cyprus">Cyprus</option>
                  <option value="Czech Republic">Czech Republic</option>
                  <option value="Denmark">Denmark</option>
                  <option value="Djibouti">Djibouti</option>
                  <option value="Dominica">Dominica</option>
                  <option value="Dominican Republic">Dominican Republic</option>
                  <option value="Ecuador">Ecuador</option>
                  <option value="Egypt">Egypt</option>
                  <option value="El Salvador">El Salvador</option>
                  <option value="Equatorial Guinea">Equatorial Guinea</option>
                  <option value="Eritrea">Eritrea</option>
                  <option value="Estonia">Estonia</option>
                  <option value="Eswatini">Eswatini</option>
                  <option value="Ethiopia">Ethiopia</option>
                  <option value="Fiji">Fiji</option>
                  <option value="Finland">Finland</option>
                  <option value="France">France</option>
                  <option value="Gabon">Gabon</option>
                  <option value="Gambia">Gambia</option>
                  <option value="Georgia">Georgia</option>
                  <option value="Germany">Germany</option>
                  <option value="Ghana">Ghana</option>
                  <option value="Greece">Greece</option>
                  <option value="Grenada">Grenada</option>
                  <option value="Guatemala">Guatemala</option>
                  <option value="Guinea">Guinea</option>
                  <option value="Guinea-Bissau">Guinea-Bissau</option>
                  <option value="Guyana">Guyana</option>
                  <option value="Haiti">Haiti</option>
                  <option value="Honduras">Honduras</option>
                  <option value="Hungary">Hungary</option>
                  <option value="Iceland">Iceland</option>
                  <option value="Indonesia">Indonesia</option>
                  <option value="Iran">Iran</option>
                  <option value="Iraq">Iraq</option>
                  <option value="Ireland">Ireland</option>
                  <option value="Israel">Israel</option>
                  <option value="Italy">Italy</option>
                  <option value="Jamaica">Jamaica</option>
                  <option value="Japan">Japan</option>
                  <option value="Jordan">Jordan</option>
                  <option value="Kazakhstan">Kazakhstan</option>
                  <option value="Kenya">Kenya</option>
                  <option value="Kiribati">Kiribati</option>
                  <option value="Kuwait">Kuwait</option>
                  <option value="Kyrgyzstan">Kyrgyzstan</option>
                  <option value="Laos">Laos</option>
                  <option value="Latvia">Latvia</option>
                  <option value="Lebanon">Lebanon</option>
                  <option value="Lesotho">Lesotho</option>
                  <option value="Liberia">Liberia</option>
                  <option value="Libya">Libya</option>
                  <option value="Liechtenstein">Liechtenstein</option>
                  <option value="Lithuania">Lithuania</option>
                  <option value="Luxembourg">Luxembourg</option>
                  <option value="Madagascar">Madagascar</option>
                  <option value="Malawi">Malawi</option>
                  <option value="Malaysia">Malaysia</option>
                  <option value="Maldives">Maldives</option>
                  <option value="Mali">Mali</option>
                  <option value="Malta">Malta</option>
                  <option value="Marshall Islands">Marshall Islands</option>
                  <option value="Mauritania">Mauritania</option>
                  <option value="Mauritius">Mauritius</option>
                  <option value="Mexico">Mexico</option>
                  <option value="Micronesia">Micronesia</option>
                  <option value="Moldova">Moldova</option>
                  <option value="Monaco">Monaco</option>
                  <option value="Mongolia">Mongolia</option>
                  <option value="Montenegro">Montenegro</option>
                  <option value="Morocco">Morocco</option>
                  <option value="Mozambique">Mozambique</option>
                  <option value="Myanmar (Burma)">Myanmar (Burma)</option>
                  <option value="Namibia">Namibia</option>
                  <option value="Nauru">Nauru</option>
                  <option value="Nepal">Nepal</option>
                  <option value="Netherlands">Netherlands</option>
                  <option value="New Zealand">New Zealand</option>
                  <option value="Nicaragua">Nicaragua</option>
                  <option value="Niger">Niger</option>
                  <option value="Nigeria">Nigeria</option>
                  <option value="North Korea">North Korea</option>
                  <option value="North Macedonia">North Macedonia</option>
                  <option value="Norway">Norway</option>
                  <option value="Oman">Oman</option>
                  <option value="Pakistan">Pakistan</option>
                  <option value="Palau">Palau</option>
                  <option value="Palestine">Palestine</option>
                  <option value="Panama">Panama</option>
                  <option value="Papua New Guinea">Papua New Guinea</option>
                  <option value="Paraguay">Paraguay</option>
                  <option value="Peru">Peru</option>
                  <option value="Philippines">Philippines</option>
                  <option value="Poland">Poland</option>
                  <option value="Portugal">Portugal</option>
                  <option value="Qatar">Qatar</option>
                  <option value="Romania">Romania</option>
                  <option value="Russia">Russia</option>
                  <option value="Rwanda">Rwanda</option>
                  <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                  <option value="Saint Lucia">Saint Lucia</option>
                  <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                  <option value="Samoa">Samoa</option>
                  <option value="San Marino">San Marino</option>
                  <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                  <option value="Saudi Arabia">Saudi Arabia</option>
                  <option value="Senegal">Senegal</option>
                  <option value="Serbia">Serbia</option>
                  <option value="Seychelles">Seychelles</option>
                  <option value="Sierra Leone">Sierra Leone</option>
                  <option value="Singapore">Singapore</option>
                  <option value="Slovakia">Slovakia</option>
                  <option value="Slovenia">Slovenia</option>
                  <option value="Solomon Islands">Solomon Islands</option>
                  <option value="Somalia">Somalia</option>
                  <option value="South Africa">South Africa</option>
                  <option value="South Korea">South Korea</option>
                  <option value="Spain">Spain</option>
                  <option value="Sri Lanka">Sri Lanka</option>
                  <option value="Sudan">Sudan</option>
                  <option value="Suriname">Suriname</option>
                  <option value="Sweden">Sweden</option>
                  <option value="Switzerland">Switzerland</option>
                  <option value="Syria">Syria</option>
                  <option value="Taiwan">Taiwan</option>
                  <option value="Tajikistan">Tajikistan</option>
                  <option value="Tanzania">Tanzania</option>
                  <option value="Thailand">Thailand</option>
                  <option value="Togo">Togo</option>
                  <option value="Tonga">Tonga</option>
                  <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                  <option value="Tunisia">Tunisia</option>
                  <option value="Turkey">Turkey</option>
                  <option value="Turkmenistan">Turkmenistan</option>
                  <option value="Tuvalu">Tuvalu</option>
                  <option value="Uganda">Uganda</option>
                  <option value="Ukraine">Ukraine</option>
                  <option value="United Arab Emirates">United Arab Emirates</option>
                  <option value="United Kingdom">United Kingdom</option>
                  <option value="United States">United States</option>
                  <option value="Uruguay">Uruguay</option>
                  <option value="Uzbekistan">Uzbekistan</option>
                  <option value="Vanuatu">Vanuatu</option>
                  <option value="Vatican City">Vatican City</option>
                  <option value="Venezuela">Venezuela</option>
                  <option value="Vietnam">Vietnam</option>
                  <option value="Yemen">Yemen</option>
                  <option value="Zambia">Zambia</option>
                  <option value="Zimbabwe">Zimbabwe</option>
                </select>
              </div>

              <!-- Date -->
              <div class="col-md-6 mb-3">
                <label for="editUserDate" class="form-label">Joined Date*</label>
                <input type="date" class="form-control" name="joined_at" id="editUserDate" required />
              </div>
            </div>

            <div class="row">
              <!-- Status -->
              <div class="col-md-6 mb-3">
                <label for="editUserStatus" class="form-label">Status*</label>
                <select class="form-select" name="status" id="editUserStatus" required>
                  <option value="active">Active</option>
                  <option value="inactive">Inactive</option>
                  <option value="pending">Pending</option>
                </select>
              </div>

              <!-- Description -->
              <div class="col-md-6 mb-3">
                <label for="editUserDescription" class="form-label">Description</label>
                <textarea name="description" id="editUserDescription" class="form-control" rows="2"
                  placeholder="Enter description"></textarea>
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary">Update User</button>
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
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                Cancel
              </button>
              <button type="button" class="btn btn-primary" id="confirmExport">
                <i class="fas fa-download me-2"></i> Export
              </button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>

  <!-- User Filter Modal -->
  <div class="modal fade" id="userFilterModal" tabindex="-1" aria-labelledby="userFilterModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="userFilterModalLabel">Filter Users</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ url('/admin/users') }}" method="GET">
          @csrf
          <div class="modal-body">
            <!-- Preserve search query -->
            @if(request('search'))
              <input type="hidden" name="search" value="{{ request('search') }}">
            @endif

            <div class="mb-3">
              <label for="filterType" class="form-label">Company Type</label>
              <select class="form-select" id="filterType" name="type">
                <option value="">All Types</option>
                <option value="Manufacturer" {{ request('type') == 'Manufacturer' ? 'selected' : '' }}>Manufacturer</option>
                <option value="Distributor" {{ request('type') == 'Distributor' ? 'selected' : '' }}>Distributor</option>
                <option value="Retailer" {{ request('type') == 'Retailer' ? 'selected' : '' }}>Retailer</option>
                <!-- Add more types as needed -->
              </select>
            </div>

            <div class="mb-3">
              <label for="filterCountry" class="form-label">Country</label>
              <input type="text" class="form-control" id="filterCountry" name="country" value="{{ request('country') }}"
                placeholder="Enter country">
            </div>

            <div class="mb-3">
              <label for="filterLocation" class="form-label">Location</label>
              <input type="text" class="form-control" id="filterLocation" name="location"
                value="{{ request('location') }}" placeholder="Enter location">
            </div>

            <div class="mb-3">
              <label for="filterDateFrom" class="form-label">Date From</label>
              <input type="date" class="form-control" id="filterDateFrom" name="date_from"
                value="{{ request('date_from') }}">
            </div>

            <div class="mb-3">
              <label for="filterDateTo" class="form-label">Date To</label>
              <input type="date" class="form-control" id="filterDateTo" name="date_to" value="{{ request('date_to') }}">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Apply Filters</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Export User Modal -->
  <div class="modal fade" id="exportUserModal" tabindex="-1" aria-labelledby="exportUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exportUserModalLabel">Export Users</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('users.export') }}" method="GET">
          <div class="modal-body">
            <div class="mb-3">
              <label for="exportFormat" class="form-label">Export Format</label>
              <select class="form-select" id="exportFormat" name="format" required>
                <option value="">Select Format</option>
                <option value="csv">CSV</option>
                <option value="excel">Excel</option>
                <option value="pdf">PDF</option>
              </select>
            </div>

            <div class="mb-3">
              <label for="exportRange" class="form-label">Date Range</label>
              <select class="form-select" id="exportRange" name="range" required>
                <option value="all">All Records</option>
                <option value="last7">Last 7 Days</option>
                <option value="last30">Last 30 Days</option>
                <option value="custom">Custom Range</option>
              </select>
            </div>

            <div id="customDateRange" style="display: none;">
              <div class="mb-3">
                <label for="exportStartDate" class="form-label">Start Date</label>
                <input type="date" class="form-control" id="exportStartDate" name="start_date">
              </div>

              <div class="mb-3">
                <label for="exportEndDate" class="form-label">End Date</label>
                <input type="date" class="form-control" id="exportEndDate" name="end_date">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">
              <i class="fas fa-download me-1"></i> Export
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    // Show/hide custom date range fields
    document.getElementById('exportRange').addEventListener('change', function () {
      const customRange = document.getElementById('customDateRange');
      if (this.value === 'custom') {
        customRange.style.display = 'block';
        document.getElementById('exportStartDate').required = true;
        document.getElementById('exportEndDate').required = true;
      } else {
        customRange.style.display = 'none';
        document.getElementById('exportStartDate').required = false;
        document.getElementById('exportEndDate').required = false;
      }
    });
  </script>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const viewButtons = document.querySelectorAll(".view-user-btn");

      viewButtons.forEach(button => {
        button.addEventListener("click", function () {

          // Fetch all data attributes
          const photo = this.getAttribute("data-photo");
          const name = this.getAttribute("data-name");
          const mobile = this.getAttribute("data-mobile");
          const email = this.getAttribute("data-email");
          const date = this.getAttribute("data-date");
          const company = this.getAttribute("data-company");
          const type = this.getAttribute("data-type");
          const location = this.getAttribute("data-location");
          const country = this.getAttribute("data-country");
          const status = this.getAttribute("data-status");
          const description = this.getAttribute("data-description");

          // Populate modal fields (no UI change)
          document.getElementById("viewUserPhoto").src = photo;
          document.getElementById("viewUserName").textContent = name;
          document.getElementById("viewUserMobile").textContent = mobile;
          document.getElementById("viewUserEmail").textContent = email;
          document.getElementById("viewUserDate").textContent = date;
          document.getElementById("viewCompanyName").textContent = company;
          document.getElementById("viewCompanyType").textContent = type;
          document.getElementById("viewUserLocation").textContent = location;
          document.getElementById("viewUserCountry").textContent = country;
          document.getElementById("viewUserDescription").textContent = description;

          // Status badge update
          const statusElement = document.getElementById("viewUserStatus");
          if (status && status.toLowerCase() === "active") {
            statusElement.innerHTML = '<span class="badge bg-success">Active</span>';
          } else {
            statusElement.innerHTML = '<span class="badge bg-danger">Inactive</span>';
          }
        });
      });
    });
  </script>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const editButtons = document.querySelectorAll(".edit-user-btn");

      editButtons.forEach(button => {
        button.addEventListener("click", function () {
          // Get all values from data attributes
          const id = this.getAttribute("data-id");
          const photo = this.getAttribute("data-photo");
          const name = this.getAttribute("data-name");
          const mobile = this.getAttribute("data-mobile");
          const email = this.getAttribute("data-email");
          const date = this.getAttribute("data-date");
          const company = this.getAttribute("data-company");
          const type = this.getAttribute("data-type");
          const location = this.getAttribute("data-location");
          const country = this.getAttribute("data-country");
          const status = this.getAttribute("data-status");
          const description = this.getAttribute("data-description");

          // Populate the modal fields
          document.getElementById("editUserId").value = id;
          document.getElementById("editUserPhotoPreview").src = photo;
          document.getElementById("editUserName").value = name;
          document.getElementById("editUserMobile").value = mobile;
          document.getElementById("editUserEmail").value = email;
          document.getElementById("editUserDate").value = date;
          document.getElementById("editCompanyName").value = company;
          document.getElementById("editCompanyType").value = type;
          document.getElementById("editLocation").value = location;
          document.getElementById("editCountry").value = country;
          // document.getElementById("editUserCountryValue").value = country;
          document.getElementById("editUserStatus").value = status;
          document.getElementById("editUserDescription").value = description;
        });
      });

      // Preview selected image instantly (optional but useful)
      const editUserPhoto = document.getElementById("editUserPhoto");
      const preview = document.getElementById("editUserPhotoPreview");
      if (editUserPhoto) {
        editUserPhoto.addEventListener("change", function (e) {
          const file = e.target.files[0];
          if (file) {
            preview.src = URL.createObjectURL(file);
          }
        });
      }
    });
  </script>




@endsection

<script>
  // Fetch countries from API and populate dropdown
  fetch('https://restcountries.com/v3.1/all?fields=name')
    .then(response => response.json())
    .then(countries => {
      const select = document.getElementById('countrySelect');

      // Clear loading message
      select.innerHTML = '<option value="" disabled selected>Select country</option>';

      // Sort countries alphabetically
      countries.sort((a, b) => a.name.common.localeCompare(b.name.common));

      // Add all countries to dropdown
      countries.forEach(country => {
        const option = document.createElement('option');
        option.value = country.name.common;
        option.textContent = country.name.common;
        select.appendChild(option);
      });
    })
    .catch(error => {
      console.error('Error loading countries:', error);
      // Fallback to your original countries if API fails
      const select = document.getElementById('countrySelect');
      select.innerHTML = `
            <option value="" disabled selected>Select country</option>
            <option value="India">India</option>
            <option value="USA">USA</option>
            <option value="UK">UK</option>
            <option value="Australia">Australia</option>
            <option value="Canada">Canada</option>
        `;
    });
</script>

<script>
  // Fetch countries from API and populate dropdown
  fetch('https://restcountries.com/v3.1/all?fields=name')
    .then(response => response.json())
    .then(countries => {
      const select = document.getElementById('countrySelect1');

      // Clear loading message
      select.innerHTML = '<option value="" disabled selected>Select country</option>';

      // Sort countries alphabetically
      countries.sort((a, b) => a.name.common.localeCompare(b.name.common));

      // Add all countries to dropdown
      countries.forEach(country => {
        const option = document.createElement('option');
        option.value = country.name.common;
        option.textContent = country.name.common;
        select.appendChild(option);
      });
    })
    .catch(error => {
      console.error('Error loading countries:', error);
      // Fallback to your original countries if API fails
      const select = document.getElementById('countrySelect1');
      select.innerHTML = `
            <option value="" disabled selected>Select country</option>
            <option value="India">India</option>
            <option value="USA">USA</option>
            <option value="UK">UK</option>
            <option value="Australia">Australia</option>
            <option value="Canada">Canada</option>
        `;
    });
</script>