@extends('admin.layouts.app')

@section('content')
<div class="container mt-4">
    <h4>Add New Admin</h4>
    {{-- <a href="{{ route('admin.manage_admin.index') }}" class="btn btn-secondary mb-3">← Back</a> --}}
<a href="{{ route('manage_admin.index') }}" class="btn btn-secondary mb-3">← Back</a>

    <div class="card">
        <div class="card-body">
            {{-- <form action="{{ route('admin.manage_admin.store') }}" method="POST" enctype="multipart/form-data"> --}}
                <form action="{{ route('manage_admin.store') }}" method="POST" enctype="multipart/form-data">

                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                        @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                        @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Role</label>
                        <select name="role" class="form-select" required>
                            <option value="">Select Role</option>
                            <option value="superadmin">Super Admin</option>
                            <option value="manager">Manager</option>
                            <option value="staff">Staff</option>
                        </select>
                        @error('role') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Status</label>
                        <select name="status" class="form-select" required>
                            <option value="active" selected>Active</option>
                            <option value="inactive">Inactive</option>
                            <option value="pending">Pending</option>
                            <option value="suspended">Suspended</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Profile Photo</label>
                        <input type="file" name="photo" class="form-control">
                    </div>
                </div>

                <button type="submit" class="btn btn-success mt-2">Create Admin</button>
            </form>
        </div>
    </div>
</div>
@endsection
