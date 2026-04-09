@extends('admin.layouts.app')

@section('content')
<div class="container mt-4">
    <h4>Edit Admin</h4>
    <a href="{{ route('manage_admin.index') }}" class="btn btn-secondary mb-3">← Back</a>

    <div class="card">
        <div class="card-body">
<form action="{{ route('manage_admin.update', $manageAdmin->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
                {{-- @csrf
                @method('PUT') --}}

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $manageAdmin->name) }}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $manageAdmin->email) }}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>New Password (optional)</label>
                        <input type="password" name="password" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Role</label>
                        <select name="role" class="form-select" required>
                            <option value="superadmin" {{ $manageAdmin->role == 'superadmin' ? 'selected' : '' }}>Super Admin</option>
                            <option value="manager" {{ $manageAdmin->role == 'manager' ? 'selected' : '' }}>Manager</option>
                            <option value="staff" {{ $manageAdmin->role == 'staff' ? 'selected' : '' }}>Staff</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Status</label>
                        <select name="status" class="form-select" required>
                            <option value="active" {{ $manageAdmin->status == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ $manageAdmin->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            <option value="pending" {{ $manageAdmin->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="suspended" {{ $manageAdmin->status == 'suspended' ? 'selected' : '' }}>Suspended</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Profile Photo</label><br>
                        @if($manageAdmin->photo)
                            <img src="{{ asset('storage/' . $manageAdmin->photo) }}" width="60" height="60" class="rounded mb-2">
                        @endif
                        <input type="file" name="photo" class="form-control">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-2">Update Admin</button>
            </form>
        </div>
    </div>
</div>
@endsection
