@extends('web.layouts.app')

@section('title', 'Terms and Conditions - Globe Assist')

@section('content')

    <!-- Hero Section -->
    <section class="tm-hero">
        <div class="container tm-hero-content text-center">
            <h1>Terms and Conditions</h1>
            <div class="tm-underline"></div>
            <p class="lead">Please read these terms carefully before using Globe Assist services</p>
            <p class="mb-0"><small>Last Updated: October 2025</small></p>
        </div>
    </section>

    <!-- Main Content -->
    <section class="tm-content-section">
        <div class="container">
            <!-- Introduction -->
            <div class="tm-card">
                <h2 class="tm-section-title">1. Introduction & Acceptance</h2>
                <p>Welcome to Globe Assist. By accessing or using our platform and services, you agree to be bound by these
                    Terms and Conditions. These terms govern your use of our flexi-workforce and content creation services
                    designed for the travel, events, and wedding industries.</p>

                <div class="tm-highlight-box">
                    <strong><i class="fas fa-info-circle"></i> Important:</strong> If you do not agree with any part of
                    these terms, please do not use our services. Your continued use of Globe Assist constitutes acceptance
                    of these terms.
                </div>
            </div>

            <!-- Definitions -->
            <div class="tm-card">
                <h2 class="tm-section-title">2. Definitions</h2>
                <div class="tm-subsection-title">
                    <i class="fas fa-book"></i>
                    Key Terms
                </div>
                <ul class="tm-list">
                    <li><strong>"Platform"</strong> refers to Globe Assist's website, mobile applications, and all
                        associated services</li>
                    <li><strong>"Client"</strong> refers to businesses or individuals who book professionals through Globe
                        Assist</li>
                    <li><strong>"Partner"</strong> or <strong>"Professional"</strong> refers to verified freelancers
                        registered on our platform</li>
                    <li><strong>"Services"</strong> include telecalling, tour management, ground operations, and content
                        creation</li>
                    <li><strong>"Project"</strong> refers to any assignment or engagement facilitated through Globe Assist
                    </li>
                    <li><strong>"Agreement"</strong> means the contractual relationship between parties using our platform
                    </li>
                </ul>
            </div>

            <!-- Eligibility -->
            <div class="tm-card">
                <h2 class="tm-section-title">3. Eligibility & Registration</h2>
                <div class="tm-subsection-title">
                    <i class="fas fa-user-check"></i>
                    Who Can Use Globe Assist
                </div>
                <p>To use Globe Assist services, you must:</p>
                <ul class="tm-list">
                    <li>Be at least 18 years of age</li>
                    <li>Have the legal capacity to enter into binding contracts</li>
                    <li>Represent a legitimate business entity (for clients) or be a qualified professional (for partners)
                    </li>
                    <li>Provide accurate, complete, and current information during registration</li>
                    <li>Maintain the confidentiality of your account credentials</li>
                    <li>Comply with all applicable laws and regulations in India</li>
                </ul>

                <div class="tm-important-note">
                    <strong><i class="fas fa-exclamation-triangle"></i> Note:</strong> Globe Assist reserves the right to
                    suspend or terminate accounts that provide false information or violate these terms.
                </div>
            </div>

            <!-- Services Overview -->
            <div class="tm-card">
                <h2 class="tm-section-title">4. Services Provided</h2>
                <div class="tm-subsection-title">
                    <i class="fas fa-briefcase"></i>
                    Our Offerings
                </div>
                <p>Globe Assist provides access to verified professionals across four key categories:</p>

                <table class="tm-table">
                    <thead>
                        <tr>
                            <th>Service Category</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Telecallers</strong></td>
                            <td>Lead follow-ups, inquiry management, appointment scheduling</td>
                        </tr>
                        <tr>
                            <td><strong>Tour Managers</strong></td>
                            <td>Group handling, destination expertise, client engagement</td>
                        </tr>
                        <tr>
                            <td><strong>Ground Operators</strong></td>
                            <td>Airport assistance, hotel coordination, guest management</td>
                        </tr>
                        <tr>
                            <td><strong>Content Creators</strong></td>
                            <td>Photography, videography, reels, and social media content</td>
                        </tr>
                    </tbody>
                </table>

                <div class="tm-highlight-box">
                    <strong>Minimum Lead Time:</strong> All projects require a minimum 7-day advance booking to ensure
                    proper vetting, briefing, and deployment of professionals.
                </div>
            </div>

            <!-- Booking Process -->
            <div class="tm-card">
                <h2 class="tm-section-title">5. Booking & Engagement Process</h2>
                <div class="tm-subsection-title">
                    <i class="fas fa-clipboard-list"></i>
                    How It Works
                </div>
                <ol style="padding-left: 1.5rem;">
                    <li><strong>Consultation:</strong> Initial discussion via email or WhatsApp to understand requirements
                    </li>
                    <li><strong>Assessment:</strong> Client shares detailed project specifications and requirements</li>
                    <li><strong>Proposal:</strong> Globe Assist provides customized solution with transparent pricing</li>
                    <li><strong>Agreement:</strong> Formal sign-off and confirmation of engagement terms</li>
                    <li><strong>Execution:</strong> Professionals deployed with continuous monitoring and support</li>
                </ol>

                <div class="tm-important-note">
                    <strong><i class="fas fa-clock"></i> Cancellation Policy:</strong> Cancellations made less than 3 days
                    before the project start date may incur a 25% cancellation fee. Cancellations within 24 hours are
                    subject to a 50% fee.
                </div>
            </div>

            <!-- Payment Terms -->
            <div class="tm-card">
                <h2 class="tm-section-title">6. Payment Terms</h2>
                <div class="tm-subsection-title">
                    <i class="fas fa-credit-card"></i>
                    Pricing & Payments
                </div>
                <ul class="tm-list">
                    <li>All pricing is quoted in Indian Rupees (INR) and is exclusive of applicable taxes</li>
                    <li>Payment terms will be specified in the project proposal and agreement</li>
                    <li>Advance payment of 50% is required to confirm booking</li>
                    <li>Balance payment must be completed before or upon project completion</li>
                    <li>Accepted payment methods: Bank transfer, UPI, online payment gateways</li>
                    <li>Late payments may result in suspension of services and additional charges</li>
                    <li>No refunds will be issued once professionals are deployed</li>
                </ul>

                <div class="tm-highlight-box">
                    <strong>GST:</strong> All invoices will include applicable GST as per Indian tax regulations. Please
                    provide your GSTIN for input tax credit.
                </div>
            </div>

            <!-- Client Responsibilities -->
            <div class="tm-card">
                <h2 class="tm-section-title">7. Client Responsibilities</h2>
                <div class="tm-subsection-title">
                    <i class="fas fa-tasks"></i>
                    Your Obligations
                </div>
                <p>Clients using Globe Assist services agree to:</p>
                <ul class="tm-list">
                    <li>Provide accurate project details, timelines, and expectations</li>
                    <li>Ensure a safe working environment for deployed professionals</li>
                    <li>Treat professionals with respect and professionalism</li>
                    <li>Provide necessary tools, equipment, or access required for service delivery</li>
                    <li>Make timely payments as per agreed terms</li>
                    <li>Provide feedback and report any issues promptly</li>
                    <li>Not solicit professionals for direct hiring without Globe Assist's consent</li>
                    <li>Maintain confidentiality of sensitive business information</li>
                </ul>

                <div class="tm-important-note">
                    <strong><i class="fas fa-ban"></i> Non-Solicitation:</strong> Direct hiring or engagement of Globe
                    Assist professionals without platform involvement is prohibited and may result in legal action and
                    penalty fees.
                </div>
            </div>

            <!-- Professional Responsibilities -->
            <div class="tm-card">
                <h2 class="tm-section-title">8. Professional/Partner Responsibilities</h2>
                <div class="tm-subsection-title">
                    <i class="fas fa-user-tie"></i>
                    Partner Obligations
                </div>
                <p>Professionals registered on Globe Assist must:</p>
                <ul class="tm-list">
                    <li>Maintain accurate profile information, skills, and availability</li>
                    <li>Deliver services professionally and meet agreed quality standards</li>
                    <li>Adhere to project timelines and client expectations</li>
                    <li>Maintain proper conduct and represent Globe Assist positively</li>
                    <li>Report any issues or concerns immediately to Globe Assist</li>
                    <li>Protect client confidentiality and proprietary information</li>
                    <li>Not engage in direct transactions with clients outside the platform</li>
                    <li>Comply with all applicable laws and industry regulations</li>
                </ul>
            </div>

            <!-- Intellectual Property -->
            <div class="tm-card">
                <h2 class="tm-section-title">9. Intellectual Property & Content Rights</h2>
                <div class="tm-subsection-title">
                    <i class="fas fa-copyright"></i>
                    Ownership & Usage
                </div>
                <p><strong>Platform Content:</strong> All content on the Globe Assist platform, including logos, designs,
                    text, and software, is owned by Globe Assist and protected by intellectual property laws.</p>

                <p><strong>Content Created by Professionals:</strong></p>
                <ul class="tm-list">
                    <li>Photos, videos, and creative content produced during projects belong to the client upon full payment
                    </li>
                    <li>Globe Assist retains the right to use project content for marketing purposes with client consent
                    </li>
                    <li>Professionals retain portfolio rights unless otherwise agreed</li>
                    <li>Any pre-existing intellectual property remains with its original owner</li>
                </ul>

                <div class="tm-highlight-box">
                    <strong>Marketing Usage:</strong> By using Globe Assist, clients consent to potential case study
                    creation and testimonial usage for promotional purposes, with identifiable information shared only with
                    explicit permission.
                </div>
            </div>

            <!-- Liability & Disclaimers -->
            <div class="tm-card">
                <h2 class="tm-section-title">10. Liability & Disclaimers</h2>
                <div class="tm-subsection-title">
                    <i class="fas fa-shield-alt"></i>
                    Limitations of Liability
                </div>
                <p>Globe Assist operates as a platform connecting clients with professionals. We:</p>
                <ul class="tm-list">
                    <li>Conduct thorough vetting but cannot guarantee professional performance in all circumstances</li>
                    <li>Are not liable for direct engagements between clients and professionals outside our platform</li>
                    <li>Do not assume responsibility for third-party service failures or force majeure events</li>
                    <li>Limit liability to the value of services provided for the specific project</li>
                    <li>Are not responsible for damages resulting from client misuse of services</li>
                </ul>

                <div class="tm-important-note">
                    <strong><i class="fas fa-info-circle"></i> Quality Assurance:</strong> While we monitor and ensure
                    quality standards, Globe Assist is not liable for subjective dissatisfaction unless clear contractual
                    obligations are breached.
                </div>
            </div>

            <!-- Privacy & Data Protection -->
            <div class="tm-card">
                <h2 class="tm-section-title">11. Privacy & Data Protection</h2>
                <div class="tm-subsection-title">
                    <i class="fas fa-lock"></i>
                    Your Data Security
                </div>
                <p>Globe Assist is committed to protecting your privacy:</p>
                <ul class="tm-list">
                    <li>Personal data is collected and processed in accordance with applicable data protection laws</li>
                    <li>We use industry-standard security measures to protect your information</li>
                    <li>Data is used only for service delivery, communication, and platform improvement</li>
                    <li>We do not sell or share personal data with third parties for marketing purposes</li>
                    <li>Users have the right to access, correct, or delete their personal information</li>
                </ul>

                <p>For complete details, please refer to our <a href="{{ route('web.privacy-policy') }}"
                        style="color: var(--tm-primary); font-weight: 600;">
                        Privacy Policy
                    </a>.</p>
            </div>

            <!-- Dispute Resolution -->
            <div class="tm-card">
                <h2 class="tm-section-title">12. Dispute Resolution</h2>
                <div class="tm-subsection-title">
                    <i class="fas fa-balance-scale"></i>
                    Handling Conflicts
                </div>
                <p>In case of disputes:</p>
                <ul class="tm-list">
                    <li>Parties agree to first attempt resolution through direct negotiation</li>
                    <li>If unresolved, disputes will be escalated to Globe Assist mediation</li>
                    <li>Mediation decisions by Globe Assist are binding unless legally challenged</li>
                    <li>All disputes are subject to the jurisdiction of courts in Delhi, India</li>
                    <li>These terms are governed by the laws of India</li>
                </ul>
            </div>

            <!-- Modifications -->
            <div class="tm-card">
                <h2 class="tm-section-title">13. Modifications to Terms</h2>
                <div class="tm-subsection-title">
                    <i class="fas fa-edit"></i>
                    Updates & Changes
                </div>
                <p>Globe Assist reserves the right to modify these Terms and Conditions at any time. Changes will be:</p>
                <ul class="tm-list">
                    <li>Posted on our website with an updated "Last Modified" date</li>
                    <li>Communicated to registered users via email when substantial</li>
                    <li>Effective immediately upon posting unless otherwise stated</li>
                    <li>Applicable to all future transactions and engagements</li>
                </ul>

                <p>Continued use of our services after modifications constitutes acceptance of updated terms.</p>
            </div>

            <!-- Termination -->
            <div class="tm-card">
                <h2 class="tm-section-title">14. Termination</h2>
                <div class="tm-subsection-title">
                    <i class="fas fa-sign-out-alt"></i>
                    Account Suspension & Closure
                </div>
                <p>Globe Assist may suspend or terminate accounts that:</p>
                <ul class="tm-list">
                    <li>Violate these Terms and Conditions</li>
                    <li>Engage in fraudulent or illegal activities</li>
                    <li>Provide false or misleading information</li>
                    <li>Misuse the platform or harm other users</li>
                    <li>Fail to make payments as agreed</li>
                </ul>

                <p>Users may also request account deletion by contacting support. Upon termination, all outstanding
                    obligations remain enforceable.</p>
            </div>

            <!-- Contact Information -->
            <div class="tm-card">
                <h2 class="tm-section-title">15. Contact Information</h2>
                <div class="tm-subsection-title">
                    <i class="fas fa-envelope"></i>
                    Get in Touch
                </div>
                <p>For questions, concerns, or clarifications regarding these Terms and Conditions, please contact us:</p>

                <div class="row mt-4">
                    <div class="col-md-4 mb-3">
                        <div class="text-center">
                            <i class="fas fa-envelope fa-2x" style="color: var(--tm-primary);"></i>
                            <p class="mt-2 mb-0"><strong>Email</strong></p>
                            <a href="mailto:connect@globeassist.in" class="text-decoration-none" style="color: inherit;">
                                connect@globeassist.in
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="text-center">
                            <i class="fas fa-globe fa-2x" style="color: var(--tm-primary);"></i>
                            <p class="mt-2 mb-0"><strong>Website</strong></p>
                            <a href="https://www.globeassist.in" target="_blank" class="text-decoration-none"
                                style="color: inherit;">
                                www.globeassist.in
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="text-center">
                            <i class="fab fa-whatsapp fa-2x" style="color: var(--tm-primary);"></i>
                            <p class="mt-2 mb-0"><strong>WhatsApp</strong></p>
                            <p>Available for consultation</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Acknowledgment -->
            <div class="tm-card"
                style="background: linear-gradient(135deg, #e3f2fd 0%, #f1f8e9 100%); border: 2px solid var(--tm-primary);">
                <h2 class="tm-section-title">16. Acknowledgment</h2>
                <p class="mb-0">By using Globe Assist services, you acknowledge that you have read, understood, and agree to
                    be bound by these Terms and Conditions. You also acknowledge that these terms constitute a legally
                    binding agreement between you and Globe Assist.</p>
            </div>
        </div>
    </section>
    <!-- Back to Top Button -->
    <div class="tm-back-to-top" id="backToTop">
        <i class="fas fa-arrow-up"></i>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Back to Top Button
        const backToTop = document.getElementById('backToTop');

        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                backToTop.style.display = 'flex';
            } else {
                backToTop.style.display = 'none';
            }
        });

        backToTop.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>


@endsection

@push('scripts')
    <script>
        // Back to Top Button
        const backToTop = document.getElementById('backToTop');
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) backToTop.style.display = 'flex';
            else backToTop.style.display = 'none';
        });
        backToTop.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            });
        });
    </script>
@endpush