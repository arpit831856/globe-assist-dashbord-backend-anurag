@extends('web.layouts.app')

@section('title', 'Contact Us - Global Assist')

@section('content')
   <section class="py-5 contact-section">
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="fw-bold mb-3">Let’s Collaborate to Drive Excellence</h1>
            <p class="lead mx-auto" style="max-width: 800px;">
                At Globe Assist, we believe meaningful partnerships begin with a conversation. <br>
                Whether you’re seeking specialized workforce solutions, strategic collaborations, <br>
                or tailored project support — our team is ready to engage with precision and professionalism. <br>
                Let’s shape success — together.
            </p>
        </div>

        <div class="row align-items-start g-5">
            <!-- Contact Info -->
            <div class="col-md-5">
                <div class="contact-info p-4 bg-light rounded-4 shadow-sm">
                    <h4 class="mb-4 fw-semibold">
                        <i class="bi bi-geo-alt-fill text-success me-2"></i>Our Office
                    </h4>
                    <p class="mb-3">
                        <i class="bi bi-geo-alt text-success me-2"></i>123 Business Street, New Delhi, India
                    </p>
                    <p class="mb-3">
                        <i class="bi bi-telephone-fill text-success me-2"></i>+91 98765 43210
                    </p>
                    <p class="mb-3">
                        <i class="bi bi-envelope-fill text-success me-2"></i>support@globeassist.in
                    </p>
                    <p class="mb-0">
                        <i class="bi bi-clock-fill text-success me-2"></i>Mon - Sat: 9:00 AM – 7:00 PM
                    </p>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="col-md-7">
                <div class="p-4 bg-white rounded-4 shadow-sm">
                    <h4 class="fw-semibold mb-4">
                        <i class="bi bi-chat-dots-fill text-success me-2"></i>Send Us a Message
                    </h4>
                    <form action="#" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Your Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Your Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="4" placeholder="Write your message..." required></textarea>
                        </div>
                        <button type="submit" class="btn btn-dark px-4 py-2 rounded-3">
                            Send Message <i class="bi bi-arrow-up-right ms-2"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
