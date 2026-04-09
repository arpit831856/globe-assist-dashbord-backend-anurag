@extends('admin.layouts.app')

@section('title', 'FAQs Management')

@section('content')
    <div id="faqs-page" class="page-content">
        <div class="page-header justify-content-between d-flex align-items-center mb-3">
            <h4 class="page-title">Customer Management</h4>

            <!-- Add FAQ Button -->
            <button type="button" class="btn bg-info text-white" data-bs-toggle="modal" data-bs-target="#addFaqModal">
                <i class="fas fa-star me-2"></i> Add FAQs
            </button>
        </div>

        <!-- Search / Reset -->
        <div class="card mb-3">
            <div class="card-body">
                <div class="row g-3 align-items-center">
                    <div class="col-md-8">
                        <div class="input-group me-3" style="width: 250px">
                            <input type="text" id="faqSearch" class="form-control form-control-sm" placeholder="Search...">
                            <button class="btn btn-sm btn-outline-secondary" type="button"><i
                                    class="fas fa-search"></i></button>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex justify-content-end gap-2">
                        <button class="btn btn-outline-secondary" id="resetFilters">
                            <i class="fas fa-sync-alt"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- FAQs Table -->
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="faqsTable">
                        <thead>
                            <tr class="text-center">
                                <th>Sr.No.</th>
                                <th>Date</th>
                                <th>Question</th>
                                <th>Answer</th>
                                <th>Edit / Delete</th>
                            </tr>

                        </thead>
                        <tbody>
                            @forelse($faqs as $index => $faq)
                                <tr class="text-center">
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $faq->created_at->format('d M Y') }}</td>
                                    <td>{{ $faq->question }}</td>
                                    <td>{{ $faq->answer }}</td>
                                    <td>
                                        <!-- Edit -->
                                        <button type="button" class="btn btn-warning btn-sm editFaqBtn" data-bs-toggle="modal"
                                            data-bs-target="#editFaqModal" data-id="{{ $faq->id }}"
                                            data-question="{{ $faq->question }}" data-answer="{{ $faq->answer }}">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>


                                        <!-- Delete -->
                                        <form action="{{ route('faqs.delete', $faq->id) }}" method="POST" class="d-inline"
                                            onsubmit="return confirm('Are you sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash me-1"></i> Delete
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">No FAQs found.</td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <div class="text-muted">
                            Page <strong>{{ $faqs->currentPage() }}</strong> of <strong>{{ $faqs->lastPage() }}</strong> —
                            Showing <strong>{{ $faqs->firstItem() }}–{{ $faqs->lastItem() }}</strong> of
                            <strong>{{ $faqs->total() }}</strong> entries
                        </div>
                        <nav aria-label="Page navigation">
                            <ul class="pagination mb-0 gap-1">
                                {{-- Prev button --}}
                                <li class="page-item {{ $faqs->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link px-3 rounded-pill" href="{{ $faqs->previousPageUrl() ?? '#' }}">
                                        <i class="bi bi-arrow-left-circle-fill me-1"></i> Prev
                                    </a>
                                </li>

                                {{-- Page numbers --}}
                                @foreach ($faqs->getUrlRange(1, $faqs->lastPage()) as $page => $url)
                                    <li class="page-item {{ $page == $faqs->currentPage() ? 'active' : '' }}">
                                        <a class="page-link px-3 rounded-pill" href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endforeach

                                {{-- Next button --}}
                                <li class="page-item {{ $faqs->hasMorePages() ? '' : 'disabled' }}">
                                    <a class="page-link px-3 rounded-pill" href="{{ $faqs->nextPageUrl() ?? '#' }}">
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

    {{-- Add FAQ Modal --}}
    <div class="modal fade" id="addFaqModal" tabindex="-1" aria-labelledby="addFaqModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="addFaqModalLabel">Add FAQ</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('faqs.store') }}" method="POST" id="addFaqForm">
                        @csrf
                        <div class="mb-3">
                            <label for="faqQuestion" class="form-label">Question</label>
                            <textarea name="question" class="form-control" id="faqQuestion" rows="3"
                                placeholder="Enter Your Question Here" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="faqAnswer" class="form-label"></label>
                            <textarea name="answer" class="form-control" id="faqAnswer" rows="5"
                                placeholder="Enter Your Anser Here" required></textarea>
                        </div>
                        <div class="text-end">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-question-circle me-2"></i> Add
                                FAQ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Edit FAQ Modal --}}
    <div class="modal fade" id="editFaqModal" tabindex="-1" aria-labelledby="editFaqModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="editFaqModalLabel">Edit FAQ</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="editFaqForm">
                        @csrf
                        <input type="hidden" id="editFaqId" name="id">

                        <div class="mb-3">
                            <label for="editFaqQuestion" class="form-label">Question</label>
                            <textarea name="question" class="form-control" id="editFaqQuestion" rows="3"
                                placeholder="Enter Your Question Here" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="editFaqAnswer" class="form-label">Answer</label>
                            <textarea name="answer" class="form-control" id="editFaqAnswer" rows="5"
                                placeholder="Enter Your Answer Here" required></textarea>
                        </div>

                        <div class="text-end">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-edit me-2"></i> Update FAQ
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const editFaqModal = document.getElementById('editFaqModal');
        editFaqModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;

            const id = button.getAttribute('data-id');
            const question = button.getAttribute('data-question');
            const answer = button.getAttribute('data-answer');

            document.getElementById('editFaqId').value = id;
            document.getElementById('editFaqQuestion').value = question;
            document.getElementById('editFaqAnswer').value = answer;

            // Update form action dynamically based on route pattern
            const form = document.getElementById('editFaqForm');
            form.action = `{{ url('admin/faqs/update') }}/${id}`;
        });
    </script>

@endsection