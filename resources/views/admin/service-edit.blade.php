@extends('admin.layouts.app')

@section('title', 'Edit Service')
@section('page-title', 'Edit Service')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-7 col-xl-6">

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

                {{-- Header --}}
                <div class="text-center mb-4">
                    <div class="mb-3">
                        <span class="d-inline-flex align-items-center justify-content-center rounded-circle bg-light"
                              style="width:72px; height:72px;">
                            <i class="fas fa-edit text-primary fs-3"></i>
                        </span>
                    </div>

                    <h4 class="mb-2">Update Service Details</h4>
                    <p class="text-muted mb-0">
                        Service information update karein aur latest details save karein.
                    </p>
                </div>

                {{-- Form --}}
                <form action="{{ route('admin.services.update',$service->id) }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Service Name</label>
                        <input type="text" name="name"
                               class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name',$service->name) }}"
                               placeholder="Enter service name" required>

                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Base Price</label>
                        <input type="text" name="base_price"
                               class="form-control @error('base_price') is-invalid @enderror"
                               value="{{ old('base_price',$service->base_price) }}"
                               placeholder="Enter base price" required>

                        @error('base_price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Description</label>
                        <textarea name="short_description"
                                  rows="4"
                                  class="form-control @error('short_description') is-invalid @enderror"
                                  placeholder="Enter short description">{{ old('short_description',$service->short_description) }}</textarea>

                        @error('short_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Status</label>
                        <select name="status"
                                class="form-control @error('status') is-invalid @enderror">
                            <option value="1" {{ $service->status == 1 ? 'selected' : '' }}>
                                Active
                            </option>

                            <option value="0" {{ $service->status == 0 ? 'selected' : '' }}>
                                Inactive
                            </option>
                        </select>

                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Buttons --}}
                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('admin.service-list') }}" class="btn btn-outline-secondary">
                            Cancel
                        </a>

                        <button type="submit" class="btn btn-primary px-4">
                            Update Service
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
@endsection