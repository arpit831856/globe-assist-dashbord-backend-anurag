@extends('web.layouts.app')

@section('title', 'How It Works - Globe Assist')

@section('content')
    <!-- How it works section -->
  <div class="ga-workflow-container pt-5">
    <div class="ga-main-heading text-center">
        <h1>How <span class="brand-blue-color">Globe</span><span class="brand-green-color"> Assist</span> Works</h1>
        <img src="{{ asset('assets/Vector 1.svg') }}" alt="">
    </div>

    <p class="ga-subtitle pt-0 text-center">
        At Globe Assist, we simplify the process of finding and managing specialized professionals across travel, <br>events, and weddings — ensuring seamless collaboration and exceptional results.
    </p>

    <div class="ga-process-flow">
        
        <!-- Step 1 -->
        <div class="ga-step-wrapper">
            <div class="ga-step-card">
                <div class="ga-step-number">1</div>
                <div class="ga-icon-wrapper" style="color:#6cba0c; font-size:2.2rem;">
                    <i class="bi bi-ui-checks"></i>
                </div>
                <h3 class="ga-step-title">Submit Your Request</h3>
                <p class="ga-step-description">
                    Share your project requirements — type of professional, duration, location, and skill set needed. 
                    Our simple request form ensures we capture every detail accurately.
                </p>
            </div>
        </div>

        <div class="ga-curved-connector ga-curve-top"></div>

        <!-- Step 2 -->
        <div class="ga-step-wrapper">
            <div class="ga-step-card">
                <div class="ga-step-number">2</div>
                <div class="ga-icon-wrapper" style="color:#6cba0c; font-size:2.2rem;">
                    <i class="bi bi-people"></i>
                </div>
                <h3 class="ga-step-title">Customized Solutions</h3>
                <p class="ga-step-description">
                    Our team evaluates your needs and curates the perfect match from our verified network of 
                    telecallers, visa officers, tour managers, ground operators, and content creators.
                </p>
            </div>
        </div>

        <div class="ga-curved-connector ga-curve-bottom"></div>

        <!-- Step 3 -->
        <div class="ga-step-wrapper">
            <div class="ga-step-card">
                <div class="ga-step-number">3</div>
                <div class="ga-icon-wrapper" style="color:#6cba0c; font-size:2.2rem;">
                    <i class="bi bi-rocket-takeoff"></i>
                </div>
                <h3 class="ga-step-title">Deploy & Deliver</h3>
                <p class="ga-step-description">
                    Once approved, professionals are deployed and closely monitored. 
                    Regular updates ensure precision, accountability, and complete client satisfaction. 
                    <br><br><em>(Minimum 7 days’ lead time required for proper vetting and briefing.)</em>
                </p>
            </div>
        </div>

    </div>
</div>


<section class="industries py-5">
    <div class="container">
        <div class="row align-items-center">
            
            <!-- Left Content -->
            <div class="col-lg-6 col-md-12 mb-4 mb-lg-0">
                <div class="industries-content">
                    <div class="industries-container-heading mb-3">
                        <h2 class="industries-section-title">
                            Driven by Expertise, Defined by <span class="highlight-underline">Excellence</span>
                        </h2>
                        <img src="{{ asset('assets/Vector 1.svg') }}" alt="divider">
                    </div>
                    <p class="mt-3">
                        At Globe Assist, we go beyond conventional staffing — we deliver precision, reliability, and trust through a curated network of verified professionals. Our agile model ensures quick turnaround, transparent coordination, and consistent quality across every engagement. From travel to events and weddings, we simplify complex operations with expertise that adapts to your project needs, empowering your business to perform seamlessly and scale efficiently.
                    </p>

                    <!-- CTA Button -->
                    <a href="{{ url('/support') }}" class="btn rounded-4 mt-3 px-4 py-2 fw-light" 
                       style="background-color:#6cba0c; color:#fff; border:none;">
                        Let’s Connect <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>

            <!-- Right Image -->
            <div class="col-lg-6 col-md-12 text-center">
                <img src="https://www.mbaknol.com/wp-content/uploads/2014/03/competitive-advantage-mbaknol.jpg.webp" 
                     alt="Globe Assist Advantage" 
                     class="img-fluid rounded-4 shadow-sm">
            </div>

        </div>
    </div>
</section>





 <!-- Testimonials -->
<section class="testimonial-section py-5">
    <div class="container">
        <div class="service-testmonial-heading text-center mb-5">
            <h2 class="testimonial-heading">Client Success Stories</h2>
            <img src="{{ asset('/assets/vector1_blue_v2.svg') }}" alt="divider">
        </div>

        <div class="row g-4">
            <!-- Testimonial 1 -->
            <div class="col-lg-4 col-md-6">
                <div class="testimonial-card">
                    <div class="star-rating" style="color:#f5c518; font-size:1.2rem;">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <p class="testimonial-text">
                        "Globe Assist helped us manage our corporate group tour seamlessly. From ground support to on-trip coordination, everything was handled with remarkable professionalism."
                    </p>
                    <div class="client-profile">
                        <div class="client-avatar avatar-yellow">
                             <img src="{{ asset('/assets/testemonial2.png') }}" alt="">
                        </div>
                        <div class="client-info">
                            <div class="client-name">Ritika Sharma</div>
                            <div class="client-role">Travel Operations Head, TravoSphere</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div class="col-lg-4 col-md-6">
                <div class="testimonial-card">
                    <div class="star-rating" style="color:#f5c518; font-size:1.2rem;">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <p class="testimonial-text">
                        "Their telecallers and event support staff were outstanding. The response time, training, and attitude towards guests truly exceeded our expectations."
                    </p>
                    <div class="client-profile">
                        <div class="client-avatar avatar-yellow">
                                 <img src="{{ asset('assets/mantestemonial3.png') }}" alt="">
                            
                        </div>
                        <div class="client-info">
                            <div class="client-name">Arjun Mehta</div>
                            <div class="client-role">Founder, Eventura</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Testimonial 3 -->
            <div class="col-lg-4 col-md-6">
                <div class="testimonial-card">
                    <div class="star-rating" style="color:#f5c518; font-size:1.2rem;">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <p class="testimonial-text">
                        "Working with Globe Assist simplified our wedding logistics. Their ground operators and content team made our client experience truly effortless and delightful."
                    </p>
                    
                    <div class="client-profile">
                        <div class="client-avatar avatar-gray">
                            <img src="{{ asset('/assets/darktestemonial1.png') }}" alt="">
                          
                        </div>
                        <div class="client-info">
                            <div class="client-name">Neha Kapoor</div>
                            <div class="client-role">Wedding Planner, The Grand Affair Co.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

