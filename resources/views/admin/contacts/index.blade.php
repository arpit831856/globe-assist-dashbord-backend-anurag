@extends('admin.layouts.app') {{-- or your admin layout --}}

@section('content')
<div class="container mt-4">
    {{-- <h4 class="mb-3">Contact Submissions</h4> --}}

    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Message</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($contacts as $contact)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->phone ?? '-' }}</td>
                            <td>{{ $contact->message }}</td>
                            <td>{{ $contact->created_at->format('d M Y, h:i A') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No messages yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{-- {{ $contacts->links() }} --}}
              <div class="d-flex justify-content-between align-items-center mt-4">
                        <div class="text-muted">
                            Page <strong>{{ $contacts->currentPage() }}</strong> of <strong>{{ $contacts->lastPage() }}</strong> —
                            Showing <strong>{{ $contacts->firstItem() }}–{{ $contacts->lastItem() }}</strong> of
                            <strong>{{ $contacts->total() }}</strong> entries
                        </div>
                        <nav aria-label="Page navigation">
                            <ul class="pagination mb-0 gap-1">
                                {{-- Prev button --}}
                                <li class="page-item {{ $contacts->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link px-3 rounded-pill" href="{{ $contacts->previousPageUrl() ?? '#' }}">
                                        <i class="bi bi-arrow-left-circle-fill me-1"></i> Prev
                                    </a>
                                </li>

                                {{-- Page numbers --}}
                                @foreach ($contacts->getUrlRange(1, $contacts->lastPage()) as $page => $url)
                                    <li class="page-item {{ $page == $contacts->currentPage() ? 'active' : '' }}">
                                        <a class="page-link px-3 rounded-pill" href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endforeach

                                {{-- Next button --}}
                                <li class="page-item {{ $contacts->hasMorePages() ? '' : 'disabled' }}">
                                    <a class="page-link px-3 rounded-pill" href="{{ $contacts->nextPageUrl() ?? '#' }}">
                                        Next <i class="bi bi-arrow-right-circle-fill ms-1"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
    <script>
        document.getElementById('contactForm').addEventListener('submit', function (e) {
            e.preventDefault();
            const successMessage = document.getElementById('successMessage');
            successMessage.classList.add('show');
            this.reset();
            setTimeout(() => successMessage.classList.remove('show'), 5000);
        });

        const formInputs = document.querySelectorAll('.help-form-input');
        formInputs.forEach(input => {
            input.addEventListener('focus', function () { this.style.borderBottomColor = '#1abc9c'; });
            input.addEventListener('blur', function () { if (!this.value) this.style.borderBottomColor = '#ddd'; });
        });

    //     // FAQ Accordion
    //     document.querySelectorAll('.ga-accordion-header').forEach(header => {
    //         header.addEventListener('click', function () {
    //             const item = this.parentElement;
    //             const body = item.querySelector('.ga-accordion-body');
    //             const content = body.querySelector('.ga-accordion-content');
    //             document.querySelectorAll('.ga-accordion-item').forEach(otherItem => {
    //                 if (otherItem !== item && otherItem.classList.contains('active')) {
    //                     otherItem.querySelector('.ga-accordion-body').style.maxHeight = null;
    //                     otherItem.classList.remove('active');
    //                 }
    //             });
    //             if (item.classList.contains('active')) {
    //                 body.style.maxHeight = null;
    //                 item.classList.remove('active');
    //             } else {
    //                 body.style.maxHeight = content.scrollHeight + 'px';
    //                 item.classList.add('active');
    //             }
    //         });
    //     });
     </script>
@endsection