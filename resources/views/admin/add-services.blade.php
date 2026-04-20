@extends('admin.layouts.app')

@section('title', 'Add Service')
@section('page-title', 'Add Service')

@section('content')
<div class="row justify-content-center">
  <div class="col-lg-10 col-xl-9">
    @if (session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    @endif

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0 ps-3">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <div class="card border-0 shadow-sm">
      <div class="card-body p-4 p-md-5">
        <div class="text-center mb-4">
          <div class="mb-3">
            <span class="d-inline-flex align-items-center justify-content-center rounded-circle bg-light" style="width:72px;height:72px;">
              <i class="fas fa-concierge-bell text-primary fs-3"></i>
            </span>
          </div>
          <h4 class="mb-2">Create New Service</h4>
          <p class="text-muted mb-0">Website aur user panel ke liye nayi service add karein.</p>
        </div>

        <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label fw-semibold">Service Name</label>
              <input type="text" name="name" class="form-control" placeholder="Enter service name" required>
            </div>
            {{-- <div class="col-md-6">
              <label class="form-label fw-semibold">Category</label>
              <select name="category" class="form-select">
                <option value="">Select Category</option>
                <option>Wedding</option>
                <option>Event</option>
                <option>Tour</option>
                <option>Media</option>
                <option>Support</option>
              </select>
            </div> --}}
            <div class="col-md-6">
              <label class="form-label fw-semibold">Price Type</label>
              <select name="price_type" class="form-select">
                <option>Fixed</option>
                <option>Per Day</option>
                <option>Per Hour</option>
                <option>Custom Quote</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold">Base Price</label>
              <input type="number" step="0.01" name="base_price" class="form-control" placeholder="0.00">
            </div>
            {{-- <div class="col-md-6">
              <label class="form-label fw-semibold">Icon Class</label>
              <input type="text" name="icon" class="form-control" placeholder="fas fa-users">
            </div> --}}
            {{-- <div class="col-md-6">
              <label class="form-label fw-semibold">Banner Image</label>
              <input type="file" name="image" class="form-control">
            </div> --}}
            {{-- <div class="col-md-6">
  <label class="form-label fw-semibold">Location Coverage</label>
  <input type="text" name="location_coverage" class="form-control" placeholder="Delhi, Mumbai, Goa, Worldwide">
</div> --}}
            <div class="col-md-6">
              <label class="form-label fw-semibold">Status</label>
              <select name="status" class="form-select">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
              </select>
            </div>
            {{-- <div class="col-md-6"> 
              <label class="form-label fw-semibold">Featured</label>
              <select name="featured" class="form-select">
                <option value="0">No</option>
                <option value="1">Yes</option>
              </select>
            </div> --}}
            <div class="col-12">
              <label class="form-label fw-semibold">Description</label>
              <textarea name="short_description" rows="2" class="form-control" placeholder="Short service description"></textarea>
            </div>
            {{-- <div class="col-12">
              <label class="form-label fw-semibold">Full Description</label>
              <textarea name="description" rows="5" class="form-control" placeholder="Detailed service description"></textarea>
            </div> --}}
          </div>
          <div class="d-flex justify-content-end gap-2 mt-4">
            <button type="submit" class="btn btn-primary px-4">Save Service</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection