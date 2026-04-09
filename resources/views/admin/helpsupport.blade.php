@extends('admin.layouts.app')

@section('title', 'Help & Support')

@section('content')

<div class="page-content">

    <!-- Header -->
    <div class="content-header mb-4">
        <h2 class="fw-bold">Help & Support</h2>
        <p class="text-muted">We're here to help you. Reach out anytime.</p>
    </div>

    <div class="row g-4">

        <!-- LEFT: CONTACT INFO -->
        <div class="col-lg-4">
            <div class="card shadow-sm border-0 mb-3">
                <div class="card-body">
                    <h5 class="mb-2">📧 Email Support</h5>
                    <p class="mb-1">
                        <a href="mailto:support@globeassist.com">support@globeassist.com</a>
                    </p>
                    <small class="text-muted">Response within 24 hours</small>
                </div>
            </div>

            <div class="card shadow-sm border-0 mb-3">
                <div class="card-body">
                    <h5 class="mb-2">📞 Phone Support</h5>
                    <p class="mb-1">
                        <a href="tel:+919876543210">+91-9876543210</a>
                    </p>
                    <small class="text-muted">Mon–Fri, 9 AM – 6 PM</small>
                </div>
            </div>

            <div class="card shadow-sm border-0 mb-3">
                <div class="card-body">
                    <h5 class="mb-2">📍 Office</h5>
                    <p class="mb-0">
                        Globe Assist Inc.<br>
                        Dwarka, Delhi, India
                    </p>
                </div>
            </div>

            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="mb-2">🕐 Business Hours</h5>
                    <p class="mb-0">
                        Mon – Fri: 9:00 AM – 6:00 PM<br>
                        Sat – Sun: Closed
                    </p>
                </div>
            </div>
        </div>

        <!-- RIGHT: CONTACT FORM -->
        <div class="col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">

                    <h4 class="mb-3">Send us a Message</h4>

                    <form class="contact-form">

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Full Name *</label>
                                <input type="text" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email *</label>
                                <input type="email" class="form-control" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="tel" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Subject *</label>
                            <select class="form-select" required>
                                <option value="">Select a subject</option>
                                <option>Technical Support</option>
                                <option>Billing</option>
                                <option>Partnership</option>
                                <option>Feedback</option>
                                <option>Other</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Message *</label>
                            <textarea class="form-control" rows="5" placeholder="Tell us how we can help..." required></textarea>
                        </div>

                        <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input" id="subscribe">
                            <label for="subscribe" class="form-check-label">
                                Subscribe to newsletter
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary px-4">
                            Send Message
                        </button>

                    </form>

                </div>
            </div>
        </div>

    </div>

</div>

<!-- JS -->
<script>
document.querySelector('.contact-form').addEventListener('submit', function(e) {
    e.preventDefault();
    alert('Thank you! Our support team will contact you soon.');
    this.reset();
});
</script>

@endsection