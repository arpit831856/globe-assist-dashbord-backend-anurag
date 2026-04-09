@extends('admin.layouts.app')

@section('title', 'Add Link Management')

@section('content')
    <div class="page-content">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="page-title mb-0">Add Link Management</h4>
            <button type="button" class="btn bg-info text-white" data-bs-toggle="modal" data-bs-target="#addLinkModal">
                <i class="fas fa-plus me-2"></i>Add Link
            </button>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr class="text-center">
                                <th>Sr.No.</th>
                                <th>Date</th>
                                <th>Heading</th>
                                <th>Image</th>
                                <th>YouTube Link</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($addLinks as $index => $addLink)
                                <tr class="text-center">
                                    <td>{{ $addLinks->firstItem() + $index }}</td>
                                    <td>{{ $addLink->created_at?->format('d M Y') }}</td>
                                    <td>{{ $addLink->heading }}</td>
                                    <td>
                                        @if ($addLink->image)
                                            <img src="{{ asset('storage/' . $addLink->image) }}" alt="{{ $addLink->heading }}"
                                                style="width: 70px; height: 70px; object-fit: cover; border-radius: 8px;">
                                        @else
                                            <span class="text-muted">No image</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ $addLink->youtube_link }}" target="_blank" rel="noopener noreferrer">
                                            View Link
                                        </a>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-warning btn-sm editAddLinkBtn"
                                            data-bs-toggle="modal" data-bs-target="#editAddLinkModal"
                                            data-id="{{ $addLink->id }}" data-heading="{{ $addLink->heading }}"
                                            data-youtube-link="{{ $addLink->youtube_link }}">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>

                                        <form action="{{ route('add_links.delete', $addLink->id) }}" method="POST"
                                            class="d-inline" onsubmit="return confirm('Are you sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted">No records found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-between align-items-center mt-4">
                    <div class="text-muted">
                        Page <strong>{{ $addLinks->currentPage() }}</strong> of <strong>{{ $addLinks->lastPage() }}</strong>
                    </div>
                    <div>
                        {{ $addLinks->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addLinkModal" tabindex="-1" aria-labelledby="addLinkModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="addLinkModalLabel">Add Link</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('add_links.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="heading" class="form-label">Heading</label>
                            <input type="text" name="heading" id="heading" class="form-control"
                                value="{{ old('heading') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" name="image" id="image" class="form-control" accept="image/*" required>
                        </div>

                        <div class="mb-3">
                            <label for="youtube_link" class="form-label">YouTube Link</label>
                            <input type="url" name="youtube_link" id="youtube_link" class="form-control"
                                value="{{ old('youtube_link') }}" placeholder="https://www.youtube.com/watch?v=..."
                                required>
                        </div>

                        <div class="text-end">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editAddLinkModal" tabindex="-1" aria-labelledby="editAddLinkModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="editAddLinkModalLabel">Edit Link</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="editAddLinkForm" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="edit_heading" class="form-label">Heading</label>
                            <input type="text" name="heading" id="edit_heading" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="edit_image" class="form-label">Image</label>
                            <input type="file" name="image" id="edit_image" class="form-control" accept="image/*">
                            <small class="text-muted">Agar image change nahi karni ho to is field ko empty chhod dein.</small>
                        </div>

                        <div class="mb-3">
                            <label for="edit_youtube_link" class="form-label">YouTube Link</label>
                            <input type="url" name="youtube_link" id="edit_youtube_link" class="form-control" required>
                        </div>

                        <div class="text-end">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const editAddLinkModal = document.getElementById('editAddLinkModal');

        editAddLinkModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const id = button.getAttribute('data-id');
            const heading = button.getAttribute('data-heading');
            const youtubeLink = button.getAttribute('data-youtube-link');

            document.getElementById('edit_heading').value = heading;
            document.getElementById('edit_youtube_link').value = youtubeLink;
            document.getElementById('editAddLinkForm').action = `{{ url('admin/add-links/update') }}/${id}`;
        });
    </script>
@endsection
