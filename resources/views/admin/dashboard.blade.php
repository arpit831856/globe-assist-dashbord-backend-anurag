@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
  <!-- Stats Cards -->
  <div class="row mb-4">
    <div class="col-md-6 col-lg-3 mb-3">
      <div class="card card-primary h-100">
        <div class="card-body">
          <div class="stat-card d-flex align-items-center">
            <div class="icon primary me-3">
              <i class="fas fa-users"></i>
            </div>
            <div>
              <h6 class="mb-1">Total Users</h6>
              <h4 class="mb-0">{{ number_format($totalUsers) }}</h4>
              <small class="text-success">
                <i class="fas fa-arrow-up"></i> 10% from last month
              </small>
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
              <i class="fas fa-handshake"></i>
            </div>
            <div>
              <h6 class="mb-1">Total Partners</h6>
              <h4 class="mb-0">{{ number_format($totalPartners) }}</h4>
              <small class="text-success">
                <i class="fas fa-arrow-up"></i> 5% from last month
              </small>
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
              <i class="fas fa-user-plus"></i>
            </div>
            <div>
              <h6 class="mb-1">New Users</h6>
              <h4 class="mb-0">{{ number_format($newUsers) }}</h4>
              <small class="text-success">
                <i class="fas fa-arrow-up"></i> 12% from last month
              </small>
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
              <i class="fas fa-star"></i>
            </div>
            <div>
              <h6 class="mb-1">Active Partners</h6>
              <h4 class="mb-0">{{ number_format($activePartners) }}</h4>
              <small class="text-success">
                <i class="fas fa-arrow-up"></i> 7% from last month
              </small>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- Charts Row -->
  <div class="row mb-4">
    <div class="col-lg-8 mb-3">
      <div class="card h-100">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h6 class="card-title m-0">User Growth Overview</h6>
            <div class="dropdown">
              {{-- <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="userGrowthDropdown"
                data-bs-toggle="dropdown">
                This Month
              </button> --}}
              <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="userGrowthDropdown"
                data-bs-toggle="dropdown">
                {{ $periods[$selectedPeriod] }}
              </button>

              {{-- <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userGrowthDropdown">
                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Week</a></li>
                <li>
                  <a class="dropdown-item" href="#">This Month</a>
                </li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul> --}}
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userGrowthDropdown">
                @foreach ($periods as $key => $label)
                  <li>
                    <a class="dropdown-item {{ $selectedPeriod === $key ? 'active' : '' }}"
                      href="{{ route('admin.dashboard', ['period' => $key]) }}">
                      {{ $label }}
                    </a>
                  </li>
                @endforeach
              </ul>

            </div>
          </div>
          <div class="chart-container">
            <canvas id="userGrowthChart"></canvas>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 mb-3">
      <div class="card h-100">
        <div class="card-body">
          <h6 class="card-title mb-3">Partners by Company Type</h6>
          <div class="chart-container">
            <canvas id="partnerCategoryChart"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Progress and Top Contributors -->
  <div class="row mb-4">
    <div class="col-lg-6 mb-3">
      <div class="card h-100">
        <div class="card-body">
          <h6 class="card-title mb-3">User Engagement Targets</h6>
          <div class="mb-3">
            <div class="d-flex justify-content-between mb-1">
              <span>Monthly Target</span>
              <span>900 / 1,200</span>
            </div>
            <div class="progress">
              <div class="progress-bar" role="progressbar" style="width: 75%"></div>
            </div>
          </div>
          <div class="mb-3">
            <div class="d-flex justify-content-between mb-1">
              <span>Quarterly Target</span>
              <span>2,500 / 3,000</span>
            </div>
            <div class="progress">
              <div class="progress-bar" role="progressbar" style="width: 83%"></div>
            </div>
          </div>
          <div>
            <div class="d-flex justify-content-between mb-1">
              <span>Annual Target</span>
              <span>10,500 / 12,000</span>
            </div>
            <div class="progress">
              <div class="progress-bar" role="progressbar" style="width: 87%"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 mb-3">
      <div class="card h-100">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h6 class="card-title m-0">Top Partners</h6>
            {{-- <button class="btn btn-sm btn-outline-primary">
              View All
            </button> --}}
          </div>
          <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action border-0 top-partner-item">
              <div class="d-flex align-items-center">
                {{-- <img src="{{ asset('assets/profile-pic.png') }}" alt="Partner" class="rounded me-3"
                  style="width: 60px; height: 60px" /> --}}
                <div class="flex-grow-1">
                  <h6 class="mb-0">ABC Enterprises</h6>
                  <small class="text-muted">Company Type: Private Ltd</small>
                </div>
                <div class="text-end">
                  <h6 class="mb-0">Active</h6>
                  <small class="text-success">24 Projects</small>
                </div>
              </div>
            </a>
            <a href="#" class="list-group-item list-group-item-action border-0 top-partner-item">
              <div class="d-flex align-items-center">
                {{-- <img src="./asset/image/profile-pic.png" alt="Partner" class="rounded me-3"
                  style="width: 60px; height: 60px" /> --}}
                <div class="flex-grow-1">
                  <h6 class="mb-0">XYZ Solutions</h6>
                  <small class="text-muted">Company Type: Startup</small>
                </div>
                <div class="text-end">
                  <h6 class="mb-0">Active</h6>
                  <small class="text-success">18 Projects</small>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Recent Users and Partners -->
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">

          <div class="d-flex justify-content-between align-items-center mb-3">
            <h6 class="card-title m-0">Recent Users & Partners</h6>

            @if ($viewMode !== 'all')
              <a href="{{ route('admin.dashboard', ['view' => 'all']) }}" class="btn btn-sm btn-outline-primary">
                View All
              </a>
            @else
              <a href="{{ route('admin.dashboard') }}" class="btn btn-sm btn-outline-secondary">
                Show Less
              </a>
            @endif
          </div>

          <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
              <thead class="table-light">
                <tr>
                  <th>Name</th>
                  <th>Email / Mobile</th>
                  <th>Company</th>
                  <th>Type</th>
                  <th>Status</th>
                  <th class="text-end">Action</th>
                </tr>
              </thead>

              <tbody>
                {{-- USERS --}}
                @forelse ($recentUsers as $user)
                  <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }} / {{ $user->mobile ?? 'N/A' }}</td>
                    <td>{{ $user->company ?? 'N/A' }}</td>
                    <td>{{ $user->type ?? 'N/A' }}</td>
                    <td>
                      <span class="badge bg-warning text-dark">Pending</span>
                    </td>

                    <td class="text-end">
                      <a href="{{ route('users.index') }}" class="btn btn-sm btn-outline-secondary">
                        View
                      </a>
                    </td>
                  </tr>
                @empty
                @endforelse

                {{-- PARTNERS --}}
                @forelse ($recentPartners as $partner)
                  <tr>
                    <td>{{ $partner->full_name }}</td>
                    <td>{{ $partner->email }} / {{ $partner->mobile ?? 'N/A' }}</td>
                    <td>{{ $partner->company ?? 'N/A' }}</td>
                    <td>{{ $partner->type ?? 'N/A' }}</td>
                    <td>
                      <span class="badge bg-warning text-dark">Pending</span>
                    </td>
                    <td class="text-end">
                      <a href="{{ route('partner.index') }}" class="btn btn-sm btn-outline-secondary">
                        View
                      </a>
                    </td>
                  </tr>
                @empty
                  @if ($recentUsers->isEmpty())
                    <tr>
                      <td colspan="6" class="text-center text-muted">
                        No recent users or partners
                      </td>
                    </tr>
                  @endif
                @endforelse
              </tbody>

            </table>
            {{-- <div class="d-flex justify-content-end mt-3">
              {{ $recentUsers->links('pagination::bootstrap-5') }}
            </div>

            <div class="d-flex justify-content-end mt-2">
              {{ $recentPartners->links('pagination::bootstrap-5') }}
            </div> --}}

          </div>

        </div>
      </div>
    </div>
  </div>


@endsection