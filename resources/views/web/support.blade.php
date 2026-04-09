@extends('web.layouts.app')

@section('title', 'GlobeAssist - Support')

@section('content')

    {{-- @if(session('success'))
    <div id="successAlert" class="alert alert-success text-left position-fixed mt-3 ms-3"
        style="z-index: 1050; width: 300px; top: 0; left: 0; opacity: 1; transition: opacity 0.5s;">
        {{ session('success') }}
    </div>

    <script>
        setTimeout(() => {
            const alert = document.getElementById('successAlert');
            if (alert) {
                alert.style.transition = 'opacity 0.5s';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            }
        }, 3000); // Hide after 3 seconds
    </script>
    @endif --}}

    <!-- Hero Section -->
    <div class="help-hero-section">
        <div class="help-hero">
            <h1 class="help-hero-title1">Let’s Collaborate to Drive Excellence</h1>
            <img src="{{ asset('assets/Globe Assist Home Page Assets/Vector 2.svg') }}" alt="">
        </div>
        <p class="help-hero-subtitle1 pt-3">
            At Globe Assist, we believe meaningful partnerships begin with a conversation. <br>
            Whether you’re seeking specialized workforce solutions, strategic collaborations, <br>
            or tailored project support — our team is ready to engage with precision and professionalism. <br>
            Let’s shape success — together.
        </p>

    </div>
    <!-- Main Content -->
    <div class="help-main-container">
        <div class="help-content-wrapper">

            <!-- Contact Form Section -->
            <div class="help-contact-section">
                <div class="contact-heading-marker">
                    <h2 class="help-section-title">We’re Just a Message Away</h2>
                </div>
                <p class="help-section-description">
                    Our team is here to assist you with workforce solutions, partnerships, or general inquiries.
                </p>

                <div class="help-success-message" id="successMessage">
                    <i class="fas fa-check-circle"></i> Thank you! Your message has been sent successfully.
                </div>

                {{-- <form id="contactForm" class="help-contact-form">
                    <div class="help-form-group">
                        <input type="text" class="help-form-input" placeholder="Name" required>
                    </div>
                    <div class="help-form-group">
                        <input type="email" class="help-form-input" placeholder="Email" required>
                    </div>
                    <div class="help-form-group">
                        <input type="tel" class="help-form-input" placeholder="Phone no." required>
                    </div>
                    <div class="help-form-group">
                        <textarea class="help-form-input help-form-textarea" placeholder="Message" required></textarea>
                    </div>
                    <button type="submit" class="help-submit-btn">Submit</button>
                </form> --}}

                <form id="contactForm" class="help-contact-form" action="{{ route('web.contact.store') }}" method="POST">
                    @csrf
                    <div class="help-form-group">
                        <input type="text" name="name" class="help-form-input" placeholder="Name" required>
                    </div>
                    <div class="help-form-group">
                        <input type="email" name="email" class="help-form-input" placeholder="Email" required>
                    </div>
                    <div class="help-form-group">
                        <input type="tel" name="phone" class="help-form-input" placeholder="Phone no." required>
                    </div>
                    <div class="help-form-group">
                        <textarea name="message" class="help-form-input help-form-textarea" placeholder="Message"
                            required></textarea>
                    </div>
                    <button type="submit" class="help-submit-btn">Submit</button>
                </form>

            </div>

            <!-- Vertical Divider -->
            <div class="help-vertical-divider"></div>

            <!-- Support & Social Section -->
            <div class="help-support-section">
                <h2 class="help-section-title">Support</h2>

                <div class="help-info-item">
                    <img src="{{ asset('assets/ic_round-email.png') }}" alt="">
                    <div class="help-info-text">
                        <strong>Email:</strong>
                        <a href="mailto:connect@globeassist.in" class="help-info-link">connect@globeassist.in</a>
                    </div>
                </div>

                <div class="help-info-item">
                    <img src="{{ asset('assets/streamline_web-solid.png') }}" alt="">
                    <div class="help-info-text">
                        <strong>Website:</strong>
                        <a href="http://www.globeassist.in" target="_blank" class="help-info-link">www.globeassist.in</a>
                    </div>
                </div>



                <!-- Social Media Section -->
                <div class="help-social-section">
                    <h2 class="help-section-title">Follow us</h2>

                    <div class="help-social-item">
                        <a href="https://www.facebook.com/profile.php?id=61578756719974" target="_blank">
                            <img src="{{ asset('assets/ic_baseline-facebook.svg') }}" class="green-icon" alt="">
                        </a>

                        <a href="https://www.facebook.com/profile.php?id=61578756719974" target="_blank"
                            class="help-social-handle">
                            @GlobeAssistIndia
                        </a>
                    </div>

                    <div class="help-social-item">
                        <a href="https://www.instagram.com/globeassist_?igsh=MW9lejBuazQxNzBoYQ==" target="_blank">
                            <img src="{{ asset('assets/line-md_instagram.svg') }}" class="green-icon" alt="">
                        </a>

                        <a href="https://www.instagram.com/globeassist_?igsh=MW9lejBuazQxNzBoYQ==" target="_blank"
                            class="help-social-handle">
                            @GlobeAssistIndia
                        </a>
                    </div>

                    <div class="help-social-item">
                        <a href="https://www.linkedin.com/company/globeassist/" target="_blank">
                            <img src="{{ asset('assets/entypo-social_linkedin-with-circle.svg') }}" class="green-icon"
                                alt="">
                        </a>

                        <a href="https://www.linkedin.com/company/globeassist/" target="_blank" class="help-social-handle">
                            @GlobeAssistIndia
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <!-- FAQ Section -->
    <div id="faq-page" class="ga-page py-0">
        <section class="ga-hero text-center mb-2 pt-0">
            <div class="container">
                <h1 class="fw-bold mb-3">Frequently Asked Questions</h1>
                <p class="text-muted">
                    Everything you need to know about Globe Assist — from how we work to how you can join our network.
                </p>
            </div>
        </section>

        {{-- <section class="ga-faq-container mb-5">
            <div class="container">
                <div class="accordion" id="faqAccordion"> --}}
                    {{-- FAQ Items --}}
                    {{-- @php
                        $faqs = [
                            ['question' => 'What is Globe Assist?', 'answer' => 'Globe Assist is India\'s first curated flexible workforce solution designed exclusively for the travel, events, and wedding industries. We connect businesses with verified, skilled freelance professionals including telecallers, tour managers, ground operators, and content creators—without the overhead of full-time staffing.'],
                            ['question' => 'What services does Globe Assist provide?', 'answer' => 'We provide four main categories of professionals: Telecallers (lead follow-ups, inquiry management), Tour Managers (group handling, client engagement), Ground Operators (airport assistance, guest management), and Content Creators (photography, reels, highlight videos for events and tours).'],
                            ['question' => 'How does Globe Assist verify professionals?', 'answer' => 'Every professional on our platform undergoes a thorough vetting process including background verification, skill assessment, reference checks, and industry experience validation. We also collect client reviews after each project to maintain quality standards.'],
                            ['question' => 'How much can I save compared to full-time staffing?', 'answer' => 'Our clients typically report 25–40% cost savings compared to traditional staffing models. You save on infrastructure costs, training expenses, benefits, and idle time—paying only for the expertise you need, when you need it.'],
                            ['question' => 'Can freelancers join Globe Assist?', 'answer' => 'Absolutely! If you\'re an experienced professional in travel, events, or weddings, you can apply to join our curated network. We offer genuine projects, transparent payments, reputation building through reviews, and repeat opportunities to grow your career.'],
                        ];
                    @endphp --}}

                    {{-- @foreach($faqs as $index => $faq)
                        <div class="accordion-item mb-3">
                            <h2 class="accordion-header" id="heading{{ $index }}">
                                <button class="accordion-button {{ $index === 0 ? '' : 'collapsed' }}" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}"
                                    aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $index }}">
                                    {{ $faq['question'] }}
                                </button>
                            </h2>
                            <div id="collapse{{ $index }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}"
                                aria-labelledby="heading{{ $index }}" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    {!! $faq['answer'] !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section> --}}

        <section class="ga-faq-container mb-5">
    <div class="container">
        <div class="accordion" id="faqAccordion">

            @forelse($faqs as $index => $faq)
                <div class="accordion-item mb-3">
                    <h2 class="accordion-header" id="heading{{ $index }}">
                        <button
                            class="accordion-button {{ $index === 0 ? '' : 'collapsed' }}"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#collapse{{ $index }}"
                            aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                            aria-controls="collapse{{ $index }}">

                            {{ $faq->question }}
                        </button>
                    </h2>

                    <div
                        id="collapse{{ $index }}"
                        class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}"
                        aria-labelledby="heading{{ $index }}"
                        data-bs-parent="#faqAccordion">

                        <div class="accordion-body">
                            {!! nl2br(e($faq->answer)) !!}
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center text-muted">No FAQs available.</p>
            @endforelse

        </div>
    </div>
</section>

    </div>

@endsection