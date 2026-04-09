{{-- @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}


@extends('web.layouts.app')

@section('title', 'Globe Assist | India’s First Curated Flexi Workforce for Travel & Events')

@section('content')

    <!-- hero section -->
    <section class="text-center py-5">
        <div class="container">
            <div class="d-flex flex-column align-items-center green-container">
                <h3 class="mb-5 col-lg-12 lexend-font position-relative z-1">
                    <span class="blue-text">Globe</span><span class="green-text"> Assist <br></span>
                    <span>Curated Workforce. Seamless Execution. <br> Elevated Guest Experience.</span>
                    <img class="position-absolute bottom-0 start-0 img-fluid" src="{{ asset('assets/vector1.svg') }}"
                        alt="">
                </h3>

                <p class="hero-subtitle col-lg-9">
                    Globe Assist is a specialised flexi-workforce platform for luxury weddings, events and experiential
                    travel — offering trained, verified and guest-centric professionals on-demand, across India and
                    worldwide.
                </p>
                
                @guest
                  <div class="d-flex gap-3">

                    <a href="#" class="btn custom-btn2 rounded-4" data-bs-toggle="modal" data-bs-target="#addUserModal">
                        Explore Talent Pool <i class="bi bi-arrow-up-right ms-2"></i>
                    </a>

                    <a href="#" class="btn btn-outline-dark custom-btn rounded-4" data-bs-toggle="modal"
                        data-bs-target="#addPartnerModal">
                        Partner With Us <i class="bi bi-arrow-up-right ms-2"></i>
                    </a>

                </div>  
                @endguest
                


            </div>

            <div class="row g-lg-5 mt-lg-0 mt-4">
                <!-- Left column images -->
                <div class="col-lg-4 d-none d-lg-flex flex-column gap-4">
                    <img class="object-fit-contain"
                        src="{{ asset('assets/crouching-young-man-taking-picture-flowing-river 1.png') }}" alt="">
                    <img class="object-fit-contain me-5" src="{{ asset('assets/front-view-man-taking-photos 1.png') }}"
                        alt="">
                </div>

                <!-- Center image -->
                <div class="col-lg-4 d-none d-lg-flex align-items-end h-100">
                    <img class="col-12 object-fit-contain rounded-4"
                        src="{{ asset('https://sallydavisberry.com/wp-content/uploads/2017/09/meet-and-greet.jpg') }}"
                        alt="">
                </div>

                <!-- Right column images -->
                <div class="col-lg-4 d-none d-lg-flex flex-column gap-5">
                    <img class="object-fit-contain mx-lg-5 mx-4 rounded-4 mb-5 mt-4"
                        src="{{ asset('assets/c84721aab96dde91f085012da7758b1a0ddee49f.png') }}" alt="">
                    <img class="object-fit-contain mb-4 rounded-4"
                        src="{{ asset('assets/750dfacf3ffebec1f23a4b63b7c4a31a1d60265f.png') }}" alt="">
                </div>

                <!-- Mobile version -->
                <div class="col-12 d-flex d-lg-none flex-column gap-4">
                    <img class="object-fit-contain mx-auto"
                        src="{{ asset('https://www.globeassist.in/assets/crouching-young-man-taking-picture-flowing-river%201.png') }}"
                        alt="">
                    <img class="object-fit-contain mx-auto"
                        src="{{ asset('https://www.globeassist.in/assets/front-view-man-taking-photos%201.png') }}" alt="">
                    <img class="object-fit-contain mx-auto"
                        src="{{ asset('https://sallydavisberry.com/wp-content/uploads/2017/09/meet-and-greet.jpg') }}"
                        alt="">
                    <img class="object-fit-contain mx-auto"
                        src="{{ asset('assets/c84721aab96dde91f085012da7758b1a0ddee49f.png') }}" alt="">
                    <img class="object-fit-contain mx-auto"
                        src="{{ asset('assets/750dfacf3ffebec1f23a4b63b7c4a31a1d60265f.png') }}" alt="">
                </div>
            </div>
        </div>
    </section>






    <!-- about us -->
    <section class="text-center pb-5">
        <div class="container">
            <div class="about-container w-100 h-100 rounded-5 p-4 text-start d-flex flex-column justify-content-between"
                style="scrollbar-width: none;">
                <div class="position-relative col-lg-8 col-12 pb-3">
                    <h2 class="fs-1 fw-bold lexend-font green-text">About Us</h2>
                    <h4 class="fs-1 position-relative z-1">Verified Experts, Flexible Solutions</h4>
                    <img class="position-absolute bottom-0 end-0 img-fluid" src="{{ asset('assets/vector1.svg') }}" alt="">
                </div>

                <p class="para-font" style="line-height:30px;">
                    At Globe Assist, we understand that people define experiences.In luxury events and destination weddings,
                    it’s the warmth of a welcome, the efficiency of coordination, and the finesse of guest handling that
                    truly sets the tone.
                    Our role is to ensure that every celebration, every journey, and every gathering is supported by a team
                    that reflects the same elegance, energy and attention to detail that you promise your clients.
                    We provide curated, professionally trained, and experience-led teams for on-ground execution — allowing
                    planners and agencies to scale seamlessly, without compromising quality or identity.<br>
                    <b> We don’t just staff events. We uphold experiences.</b>
                </p>

                <div class="d-flex gap-4 justify-content-between">
                    <div class="d-flex flex-column">
                        <div class="d-flex gap-3">
                            <h4 class="counter blue-text" data-target="2000" data-format="k+">0</h4>
                            <div class="customer-img">
                                <img class="rounded-circle" src="{{ asset('assets/ellipse3.jpg') }}" height="34" alt="">
                                <img class="rounded-circle" src="{{ asset('assets/ellipse35.jpg') }}" height="34" alt="">
                                <img class="rounded-circle" src="{{ asset('assets/ellipse54.jpg') }}" height="34" alt="">
                                <img class="rounded-circle" src="{{ asset('assets/ellipse76.jpg') }}" height="34" alt="">
                            </div>
                        </div>
                        <h4 class="fs-5">Professionals</h4>
                    </div>

                    <div class="d-flex flex-column">
                        <div class="d-flex gap-3">
                            <h4 class="counter blue-text" data-target="1000" data-format="k+">0</h4>
                        </div>
                        <h4 class="fs-5">Secure transaction</h4>
                    </div>

                    <div class="d-flex flex-column">
                        <div class="d-flex gap-3">
                            <h4 class="counter blue-text" data-target="90" data-format="%">0</h4>
                        </div>
                        <h4 class="fs-5">Positive reviews</h4>
                    </div>
                </div>

                <a href="{{ url('/about') }}" class="btn fs-5 custom-btn2 rounded-4 mt-3" role="button">
                    Know More <i class="bi bi-arrow-up-right ms-2"></i>
                </a>

            </div>
        </div>
    </section>

    <!-- services -->
    <section class="destinations py-3 text-center">
        <div class="container">
            <h2 class="our-services-heading mb-5 lexend-font">
                <span class="blue-text">Our Services</span>
            </h2>
            <div class="row g-4">
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="service-card">
                        <div class="icon-container">
                            <div class="icon-container">
                                <i class="fa-solid fa-headset fs-1" style="color: #ffffff;"></i>
                            </div>
                        </div>
                        <h5 class="service-title">Telecallers</h5>
                        <p class="para-font">Lead follow-ups, inquiry management, appointment scheduling, and
                            post-event/trip calls.</p>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="service-card">
                        <div class="icon-container">
                            <img src="{{ asset('assets/tour-manager-removebg-preview.png') }}" alt="Tour Manager"
                                class="service-icon">
                        </div>
                        <h5 class="service-title">Tour Managers</h5>
                        <p class="para-font">Group handling, client engagement, destination expertise, and brand
                            representation.
                        </p>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="service-card">
                        <div class="icon-container">
                            <img src="{{ asset('assets/ground-removebg-preview.png') }}" alt="Ground Operators"
                                class="service-icon">
                        </div>
                        <h5 class="service-title">Ground Operators</h5>
                        <p class="para-font"> Airport assistance, hotel check-ins, guest management, and transfers.
                        </p>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="service-card">
                        <div class="icon-container">
                            <img src="{{ asset('assets/reelographer-icon.png') }}" alt="Reelographers" class="service-icon">
                        </div>
                        <h5 class="service-title">Content Creators</h5>
                        <p class="para-font">On-trip/event reelography,highlight videos, testimonials, and social-ready
                            content for group tours, FITs, MICE events, weddings, and corporate gatherings.
                        </p>
                    </div>
                </div>
            </div>

        </div>
        <!-- how globe  -->
        <section class="how-it-works  text-center">
            <div class="container">
                <h2 class="how-globe mb-5 lexend-font">How
                    <span class="blue-text">Globe </span><span class="green-text">Assist</span> Works
                </h2>

                <div class="row justify-content-center g-4">
                    <!-- Step 1 -->
                    <div class="col-12 col-md-4">
                        <div class="step-card p-4 bg-white  shadow-sm">
                            <div class="step-icon mb-3">
                                <img src="{{('/assets/search_and_browse@2x.png')}}" alt="Search Icon" width="150">
                            </div>
                            <h5 class="step-title mb-2">Submit Your Request</h5>
                            <p class="para-font ">Share your project requirements—type of professional, duration, location,
                                and skill set needed. Our simple request form ensures we capture every detail.</p>
                        </div>
                    </div>
                    <!-- Step 2 -->
                    <div class="col-12 col-md-4">
                        <div class="step-card p-4 bg-white  shadow-sm">
                            <div class="step-icon mb-3">
                                <img src="{{('/assets/book_and_confirm@2x (1).png')}}" alt="Book Icon" width="150">
                            </div>
                            <h5 class="step-title mb-2">Customized Solutions</h5>
                            <p class="para-font">Our team evaluates your needs and curates the right match from our verified
                                network of telecallers, visa officers, tour managers, ground operators, and content
                                creators.</p>
                        </div>
                    </div>
                    <!-- Step 3 -->
                    <div class="col-12 col-md-4">
                        <div class="step-card p-4 bg-white  shadow-sm">
                            <div class="step-icon mb-3">
                                <img src="{{('/assets/experience_&_enjoy@2x (1).png')}}" alt="Experience Icon" width="110">
                            </div>
                            <h5 class="step-title mb-2">Deploy & Deliver</h5>
                            <p class="para-font">Upon approval, professionals are deployed and closely monitored. Regular
                                updates and check-ins ensure quality, accountability, and client satisfaction.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- for users section -->
        @guest
            <section class="user-partner-section py-5">
            <div class="container">
                <div class="row justify-content-center align-items-start text-center position-relative">

                    <!-- For Users -->
                    <div class="col-md-6 mb-4 mb-md-0 border-end border-1 border-dark">
                        <h3 class="section-heading blue-text text-center">Trusted Solutions</h3>
                        <h5 class="section-subheading">Delivering Verified Expertise, On Demand</h5>
                        <p class="para-font ">
                            Globe Assist connects businesses with trained, verified professionals, providing scalable,
                            flexible workforce solutions for efficient, high-quality project execution.
                        </p>
                        <a href="{{ url('user-page') }}" class="btn btn-green btn-small">
                            Users / Businesses <i class="bi bi-arrow-up-right"></i>
                        </a>

                    </div>

                    <!-- For Partners -->
                    <div class="col-md-6">
                        <h3 class="section-heading text-center">Expert Network</h3>
                        <h5 class="section-subheading">Collaborate. Contribute. Grow Professionally.</h5>
                        <p class="para-font ">
                            Join Globe Assist’s curated network of certified professionals and access structured,
                            project-based opportunities designed for sustainable growth and consistent excellence.
                        </p>

                        <a href="{{ url('partner-page') }}" class="btn btn-dark btn-small">
                            Professionals <i class="bi bi-arrow-up-right"></i>
                        </a>
                    </div>

                </div>
            </div>
        </section>
        @endguest
        

        <!-- why us section new -->
        <section class="py-5 py-lg-6 bg-white">
            <div class="container">
                <div class="row gx-5 gy-5">

                    <div class="col-lg-6 text-start">
                        <h2 class="mb-3 lexend-font green-text">The Difference We Deliver</h2>
                        <p class="para-font mb-4 h6">The modern solution for specialized staffing and content creation.</p>

                        <ul class="list-unstyled">
                            <li class="d-flex align-items-start mb-3">
                                <i class="bi bi-person-check-fill fs-4 text-primary me-3 flex-shrink-0"></i>
                                <div>
                                    <h5 class="mb-0">Verified Experts</h5>
                                    <p class="text-muted small mb-0">Thoroughly vetted industry professionals for peace of
                                        mind.</p>
                                </div>
                            </li>

                            <li class="d-flex align-items-start mb-3">
                                <i class="bi bi-calendar-check-fill fs-4 text-primary me-3 flex-shrink-0"></i>
                                <div>
                                    <h5 class="mb-0">Easy to Book</h5>
                                    <p class="text-muted small mb-0">Simple, transparent, and efficient process from start
                                        to finish.</p>
                                </div>
                            </li>

                            <li class="d-flex align-items-start mb-3">
                                <i class="bi bi-lock-fill fs-4 text-primary me-3 flex-shrink-0"></i>
                                <div>
                                    <h5 class="mb-0">Secure Payments</h5>
                                    <p class="text-muted small mb-0">Clear, upfront pricing with no hidden costs or
                                        surprises.</p>
                                </div>
                            </li>

                            <li class="d-flex align-items-start mb-3">
                                <i class="bi bi-currency-dollar fs-4 text-primary me-3 flex-shrink-0"></i>
                                <div>
                                    <h5 class="mb-0">No Infrastructure & Training Costs</h5>
                                    <p class="text-muted small mb-0">Pay only for what you need—eliminate overhead expenses.
                                    </p>
                                </div>
                            </li>

                            <li class="d-flex align-items-start mb-3">
                                <i class="bi bi-star-fill fs-4 text-primary me-3 flex-shrink-0"></i>
                                <div>
                                    <h5 class="mb-0">Real Reviews</h5>
                                    <p class="text-muted small mb-0">Authentic client feedback builds trust and confidence.
                                    </p>
                                </div>
                            </li>

                            <li class="d-flex align-items-start mb-3">
                                <i class="bi bi-globe2 fs-4 text-primary me-3 flex-shrink-0"></i>
                                <div>
                                    <h5 class="mb-0">Industry Focused</h5>
                                    <p class="text-muted small mb-0">Exclusive specialization in travel, events & weddings.
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-6">
                        <div class="card p-4 p-md-5 h-100 border-0 shadow-lg bg-light-subtle">
                            <div class="card-body d-flex flex-column justify-content-center">

                                <span class="blue-text display-4 mb-3" aria-hidden="true">&ldquo;</span>

                                <p class="h3 fw-light mb-4">
                                    Our clients report **25&ndash;40% cost savings** compared to traditional staffing, along
                                    with improved service delivery and stronger marketing outcomes through our content
                                    creation services.
                                </p>

                                <div class="mt-auto">
                                    <span class="d-block fw-bold text-dark">Proven Results</span>
                                    <span class="text-muted small">Based on 2025 Client Survey Data</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- end -->


        <!-- testimonial section -->
        <div class="container testimonial-container py-5">

            <div class="row text-center">
                <h5 class="mb-4 col-lg-12 blue-text lexend-font fs-2 position-relative z-1">
                    Our Amazing Client Words
                    <img class="position-absolute bottom-0 start-0 img-fluid"
                        src="{{('/assets/globe_assist_home_page_assets/vector1.svg')}}" alt="">
                </h5>

                <p class="para-font">
                    Our clients and partners are the foundation of our credibility. Their experiences reflect Globe Assist’s
                    dedication to professionalism, reliability, <br>and excellence in every collaboration we deliver.
                </p>

                <!-- Testimonial 1 -->
                <div class="col-md-4 mb-4 testimonial pt-3">
                    <p class=" para-font">
                        Partnering with Globe Assist opened doors to amazing projects across India. The team values
                        professionalism and ensures smooth communication and timely payments.
                    </p>
                    <div class="stars mb-2" style="color: #f5c518;">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>

                    <div class="fw-normal name">Aarav Mehta</div>
                    <small class=" d-block mb-2"> Event Director</small>
                    <img src="{{('/assets/unsplash_ig.png')}}" alt="John Watts" class="rounded-circle avatar-img">
                </div>

                <!-- Testimonial 2 -->
                <div class="col-md-4 mb-4 testimonial border-md-x pt-3">
                    <p class=" para-font">
                        Finding experienced tour managers during peak season was always tough. With Globe Assist, we got
                        verified experts within hours. Truly a game-changer.
                    </p>
                    <div class="stars mb-2" style="color: #f5c518;">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>

                    <div class="fw-normal name">Rahul sharma</div>
                    <small class=" d-block mb-2">Tour Manager & Partner Expert</small>
                    <img src="{{('/assets/unsplash_d.png')}}" alt="Rahul Sharma" class="rounded-circle avatar-img">
                </div>



                <!-- Testimonial 3 -->
                <div class="col-md-4 mb-4 testimonial pt-3">
                    <p class=" para-font">
                        Globe Assist made our event operations effortless. Their on-demand professionals were skilled,
                        punctual, and represented our brand perfectly. Highly reliable service!
                    </p>
                    <div class="stars mb-2" style="color: #f5c518;">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>

                    <div class="fw-normal name">Nisha Kapoor</div>
                    <small class=" d-block mb-2">Operations Head</small>
                    <img src="{{('/assets/unsplash_0Z.png')}}" alt="Emily Woods" class="rounded-circle avatar-img">
                </div>

            </div>
        </div>

        <!-- ready to start -->
        <section class="pb-2">
            <div class="container">
                <div class="ready-container d-flex flex-md-row flex-column px-4 py-5 rounded-5 gap-4 text-start">
                    <div class="column-5">
                        <div class="position-relative pb-4">
                            <h2 class=" position-relative z-1 lexend-font green-text">Find Experts in <br> Minutes</h2>
                            <img class="position-absolute vector-position" src="{{('/assets/vector1_blue_v2.svg')}}" alt="">
                        </div>
                        <p class="para-font mb-4">Globe Assist makes expert hiring effortless. Access a curated network of
                            trained, verified, and industry-certified professionals across travel, events, and weddings —
                            anytime you need them. Whether you require tour managers, telecallers, ground operators, or
                            creative talent, our platform instantly connects you with the right expertise to ensure smooth
                            operations, exceptional service quality, and cost efficiency — all within minutes.</p>
                        <a href="/support" class="btn btn-dark rounded-3 px-4 py-2 fw-light">
                            Find Your Expert <i class="bi bi-arrow-up-right"></i>
                        </a>

                    </div>
                    <div class="column-7">
                        <div class="position-relative ready-img">
                            <img class="position-absolute" src="{{('/assets/why_choose_us@2x (1).png')}}" alt="Find Experts">
                            <img class="position-absolute" src="{{('/assets/group12.svg')}}" alt="">

                            <div class="position-absolute bg-light px-4 py-3 rounded-4">
                                <div class="customer-img mb-2">
                                    <img class="rounded-circle" src="{{('/assets/unsplash_C8.png')}}" alt="" height="34">
                                    <img class="rounded-circle" src="{{('/assets/unsplash_QX.png')}}" alt="" height="34">
                                    <img class="rounded-circle" src="{{('/assets/unsplash_7Y.png')}}" alt="" height="34">
                                    <img class="rounded-circle" src="{{('/assets/unsplash_mE.png')}}" alt="" height="34">
                                </div>
                                <h6 class="green-text">2k+ Users</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
    <!-- Modal -->
    <!-- Popup Modal -->
    <!-- Add User Modal -->
    <style>
        .bg-conic-gradient {
            background: conic-gradient(from 260deg at 50% 50%, #e7f5e9 0deg, #d3ebd7 120deg, #f5f2fa 240deg, #e7f5e9 360deg);
        }

        .btn-submit {
            background-color: rgb(108 186 12) !important;
        }

        .form-label {
            margin-bottom: 5px;
            margin-left: 5px;
        }

        input::placeholder {
            font-size: 14px;
            color: #999;
        }

        .form-select.rounded-4,
        .form-control.rounded-4 {
            box-shadow: inset 1px 1px 2px rgba(0, 0, 0, 0.2);
        }
    </style>
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content bg-conic-gradient">
                <div class="modal-header mx-4 border-0 mt-4">
                    <h5 class="modal-title" id="addUserModalLabel">Register here</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>


                <!-- User Modal Form -->
                <div class="modal-body mx-4 small">
                    <form id="addUserForm" action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <!-- Name -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Full Name*</label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control rounded-4"
                                    placeholder="Enter full name" required />
                            </div>

                            <!-- Mobile -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Mobile Number*</label>
                                <input type="tel" name="mobile" value="{{ old('mobile') }}" class="form-control rounded-4"
                                    placeholder="Enter mobile number" required />
                            </div>
                        </div>

                        <div class="row">
                            <!-- Email -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email*</label>
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control rounded-4"
                                    placeholder="Enter email" required />
                            </div>

                            <!-- Company Name -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Company Name*</label>
                                <input type="text" name="company_name" value="{{ old('company_name') }}"
                                    class="form-control rounded-4" placeholder="Enter company name" required />
                            </div>
                        </div>

                        <div class="row">
                            <!-- Company Type -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Company Type*</label>
                                <select name="company_type" class="form-select rounded-4" required>
                                    <option value="" disabled {{ old('company_type') ? '' : 'selected' }}>Select type
                                    </option>
                                    <option value="Private Ltd" {{ old('company_type') == 'Private Ltd' ? 'selected' : '' }}>
                                        Private Ltd</option>
                                    <option value="Public Ltd" {{ old('company_type') == 'Public Ltd' ? 'selected' : '' }}>
                                        Public Ltd</option>
                                    <option value="Partnership" {{ old('company_type') == 'Partnership' ? 'selected' : '' }}>
                                        Partnership</option>
                                    <option value="Proprietorship" {{ old('company_type') == 'Proprietorship' ? 'selected' : '' }}>Proprietorship</option>
                                    <option value="Startup" {{ old('company_type') == 'Startup' ? 'selected' : '' }}>Startup
                                    </option>
                                </select>
                            </div>

                            <!-- Location -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Location / Address*</label>
                                <input type="text" name="location" value="{{ old('location') }}"
                                    class="form-control rounded-4" placeholder="Enter city / state" required />
                            </div>
                        </div>
                        
                        <!-- Country -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Country*</label>
                                <select name="country" class="form-select rounded-4" required>
                                    <option value="" disabled selected>Select country</option>
                                    <option value="India">India</option>
                                    <option value="Afghanistan">Afghanistan</option>
                                    <option value="Albania">Albania</option>
                                    <option value="Algeria">Algeria</option>
                                    <option value="Andorra">Andorra</option>
                                    <option value="Angola">Angola</option>
                                    <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                    <option value="Argentina">Argentina</option>
                                    <option value="Armenia">Armenia</option>
                                    <option value="Australia">Australia</option>
                                    <option value="Austria">Austria</option>
                                    <option value="Azerbaijan">Azerbaijan</option>
                                    <option value="Bahamas">Bahamas</option>
                                    <option value="Bahrain">Bahrain</option>
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="Barbados">Barbados</option>
                                    <option value="Belarus">Belarus</option>
                                    <option value="Belgium">Belgium</option>
                                    <option value="Belize">Belize</option>
                                    <option value="Benin">Benin</option>
                                    <option value="Bhutan">Bhutan</option>
                                    <option value="Bolivia">Bolivia</option>
                                    <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                    <option value="Botswana">Botswana</option>
                                    <option value="Brazil">Brazil</option>
                                    <option value="Brunei">Brunei</option>
                                    <option value="Bulgaria">Bulgaria</option>
                                    <option value="Burkina Faso">Burkina Faso</option>
                                    <option value="Burundi">Burundi</option>
                                    <option value="Cambodia">Cambodia</option>
                                    <option value="Cameroon">Cameroon</option>
                                    <option value="Canada">Canada</option>
                                    <option value="Cape Verde">Cape Verde</option>
                                    <option value="Central African Republic">Central African Republic</option>
                                    <option value="Chad">Chad</option>
                                    <option value="Chile">Chile</option>
                                    <option value="China">China</option>
                                    <option value="Colombia">Colombia</option>
                                    <option value="Comoros">Comoros</option>
                                    <option value="Congo (Brazzaville)">Congo (Brazzaville)</option>
                                    <option value="Congo (Kinshasa)">Congo (Kinshasa)</option>
                                    <option value="Costa Rica">Costa Rica</option>
                                    <option value="Croatia">Croatia</option>
                                    <option value="Cuba">Cuba</option>
                                    <option value="Cyprus">Cyprus</option>
                                    <option value="Czech Republic">Czech Republic</option>
                                    <option value="Denmark">Denmark</option>
                                    <option value="Djibouti">Djibouti</option>
                                    <option value="Dominica">Dominica</option>
                                    <option value="Dominican Republic">Dominican Republic</option>
                                    <option value="Ecuador">Ecuador</option>
                                    <option value="Egypt">Egypt</option>
                                    <option value="El Salvador">El Salvador</option>
                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                    <option value="Eritrea">Eritrea</option>
                                    <option value="Estonia">Estonia</option>
                                    <option value="Eswatini">Eswatini</option>
                                    <option value="Ethiopia">Ethiopia</option>
                                    <option value="Fiji">Fiji</option>
                                    <option value="Finland">Finland</option>
                                    <option value="France">France</option>
                                    <option value="Gabon">Gabon</option>
                                    <option value="Gambia">Gambia</option>
                                    <option value="Georgia">Georgia</option>
                                    <option value="Germany">Germany</option>
                                    <option value="Ghana">Ghana</option>
                                    <option value="Greece">Greece</option>
                                    <option value="Grenada">Grenada</option>
                                    <option value="Guatemala">Guatemala</option>
                                    <option value="Guinea">Guinea</option>
                                    <option value="Guinea-Bissau">Guinea-Bissau</option>
                                    <option value="Guyana">Guyana</option>
                                    <option value="Haiti">Haiti</option>
                                    <option value="Honduras">Honduras</option>
                                    <option value="Hungary">Hungary</option>
                                    <option value="Iceland">Iceland</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="Iran">Iran</option>
                                    <option value="Iraq">Iraq</option>
                                    <option value="Ireland">Ireland</option>
                                    <option value="Israel">Israel</option>
                                    <option value="Italy">Italy</option>
                                    <option value="Jamaica">Jamaica</option>
                                    <option value="Japan">Japan</option>
                                    <option value="Jordan">Jordan</option>
                                    <option value="Kazakhstan">Kazakhstan</option>
                                    <option value="Kenya">Kenya</option>
                                    <option value="Kiribati">Kiribati</option>
                                    <option value="Kuwait">Kuwait</option>
                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                    <option value="Laos">Laos</option>
                                    <option value="Latvia">Latvia</option>
                                    <option value="Lebanon">Lebanon</option>
                                    <option value="Lesotho">Lesotho</option>
                                    <option value="Liberia">Liberia</option>
                                    <option value="Libya">Libya</option>
                                    <option value="Liechtenstein">Liechtenstein</option>
                                    <option value="Lithuania">Lithuania</option>
                                    <option value="Luxembourg">Luxembourg</option>
                                    <option value="Madagascar">Madagascar</option>
                                    <option value="Malawi">Malawi</option>
                                    <option value="Malaysia">Malaysia</option>
                                    <option value="Maldives">Maldives</option>
                                    <option value="Mali">Mali</option>
                                    <option value="Malta">Malta</option>
                                    <option value="Marshall Islands">Marshall Islands</option>
                                    <option value="Mauritania">Mauritania</option>
                                    <option value="Mauritius">Mauritius</option>
                                    <option value="Mexico">Mexico</option>
                                    <option value="Micronesia">Micronesia</option>
                                    <option value="Moldova">Moldova</option>
                                    <option value="Monaco">Monaco</option>
                                    <option value="Mongolia">Mongolia</option>
                                    <option value="Montenegro">Montenegro</option>
                                    <option value="Morocco">Morocco</option>
                                    <option value="Mozambique">Mozambique</option>
                                    <option value="Myanmar (Burma)">Myanmar (Burma)</option>
                                    <option value="Namibia">Namibia</option>
                                    <option value="Nauru">Nauru</option>
                                    <option value="Nepal">Nepal</option>
                                    <option value="Netherlands">Netherlands</option>
                                    <option value="New Zealand">New Zealand</option>
                                    <option value="Nicaragua">Nicaragua</option>
                                    <option value="Niger">Niger</option>
                                    <option value="Nigeria">Nigeria</option>
                                    <option value="North Korea">North Korea</option>
                                    <option value="North Macedonia">North Macedonia</option>
                                    <option value="Norway">Norway</option>
                                    <option value="Oman">Oman</option>
                                    <option value="Pakistan">Pakistan</option>
                                    <option value="Palau">Palau</option>
                                    <option value="Palestine">Palestine</option>
                                    <option value="Panama">Panama</option>
                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                    <option value="Paraguay">Paraguay</option>
                                    <option value="Peru">Peru</option>
                                    <option value="Philippines">Philippines</option>
                                    <option value="Poland">Poland</option>
                                    <option value="Portugal">Portugal</option>
                                    <option value="Qatar">Qatar</option>
                                    <option value="Romania">Romania</option>
                                    <option value="Russia">Russia</option>
                                    <option value="Rwanda">Rwanda</option>
                                    <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                    <option value="Saint Lucia">Saint Lucia</option>
                                    <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                                    <option value="Samoa">Samoa</option>
                                    <option value="San Marino">San Marino</option>
                                    <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                    <option value="Senegal">Senegal</option>
                                    <option value="Serbia">Serbia</option>
                                    <option value="Seychelles">Seychelles</option>
                                    <option value="Sierra Leone">Sierra Leone</option>
                                    <option value="Singapore">Singapore</option>
                                    <option value="Slovakia">Slovakia</option>
                                    <option value="Slovenia">Slovenia</option>
                                    <option value="Solomon Islands">Solomon Islands</option>
                                    <option value="Somalia">Somalia</option>
                                    <option value="South Africa">South Africa</option>
                                    <option value="South Korea">South Korea</option>
                                    <option value="Spain">Spain</option>
                                    <option value="Sri Lanka">Sri Lanka</option>
                                    <option value="Sudan">Sudan</option>
                                    <option value="Suriname">Suriname</option>
                                    <option value="Sweden">Sweden</option>
                                    <option value="Switzerland">Switzerland</option>
                                    <option value="Syria">Syria</option>
                                    <option value="Taiwan">Taiwan</option>
                                    <option value="Tajikistan">Tajikistan</option>
                                    <option value="Tanzania">Tanzania</option>
                                    <option value="Thailand">Thailand</option>
                                    <option value="Togo">Togo</option>
                                    <option value="Tonga">Tonga</option>
                                    <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                    <option value="Tunisia">Tunisia</option>
                                    <option value="Turkey">Turkey</option>
                                    <option value="Turkmenistan">Turkmenistan</option>
                                    <option value="Tuvalu">Tuvalu</option>
                                    <option value="Uganda">Uganda</option>
                                    <option value="Ukraine">Ukraine</option>
                                    <option value="United Arab Emirates">United Arab Emirates</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="United States">United States</option>
                                    <option value="Uruguay">Uruguay</option>
                                    <option value="Uzbekistan">Uzbekistan</option>
                                    <option value="Vanuatu">Vanuatu</option>
                                    <option value="Vatican City">Vatican City</option>
                                    <option value="Venezuela">Venezuela</option>
                                    <option value="Vietnam">Vietnam</option>
                                    <option value="Yemen">Yemen</option>
                                    <option value="Zambia">Zambia</option>
                                    <option value="Zimbabwe">Zimbabwe</option>
                                </select>
                            </div>
                           
                        

                            <!-- Image -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Image*</label>

                                <input type="file" id="fileInput" name="image" class="form-control rounded-4" multiple
                                    accept="image/*" value="{{ old('image') }}" required>
                                <div id="errorMsg" class="text-danger"></div>
                                <script>
                                    const fileInput = document.getElementById("fileInput");
                                    const errorMsg = document.getElementById("errorMsg");

                                    const MAX_SIZE = 2 * 1024 * 1024; // 2 MB

                                    fileInput.addEventListener("change", function () {
                                        errorMsg.textContent = ""; // clear old error

                                        if (fileInput.files.length > 0) {
                                            const oversizedFiles = [];

                                            for (let file of fileInput.files) {
                                                if (file.size > MAX_SIZE) {
                                                    oversizedFiles.push(file.name);
                                                }
                                            }

                                            if (oversizedFiles.length > 0) {
                                                errorMsg.textContent =
                                                    "These files exceed 2 MB: " + oversizedFiles.join(", ");
                                                fileInput.value = ""; // clear file input
                                            }
                                        }
                                    });
                                </script>
                            </div>
                        </div>
                        <!-- Password -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Password*</label>
                                <input type="password" name="password" class="form-control rounded-4" placeholder="Enter password" required />
                            </div>
                             
                        <!-- Description -->
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control rounded-4"
                                rows="2">{{ old('description') }}</textarea>
                        </div>

                            </div>

                        <!-- Modal Footer -->
                        <div class="modal-footer border-0 d-flex justify-content-start">
                            <button type="submit" class="btn btn-submit rounded-4">Submit</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>


    <!--- Add Partner Modal -->
    <div class="modal fade" id="addPartnerModal" tabindex="-1" aria-labelledby="addPartnerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content bg-conic-gradient p-3"> <!-- Add padding inside modal content -->
                <div class="modal-header border-0">
                    <h5 class="modal-title fw-bold" id="addPartnerModalLabel">Register With Us</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form id="addPartnerForm" action="{{ route('partner.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="row g-3"> <!-- Use Bootstrap grid gutter -->
                            <div class="col-md-6">
                                <label class="form-label">Full Name*</label>
                                <input type="text" name="full_name" value="{{ old('full_name') }}"
                                    class="form-control rounded-4" placeholder="Enter full name" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Mobile Number*</label>
                                <input type="tel" name="mobile" value="{{ old('mobile') }}" class="form-control rounded-4"
                                    placeholder="Enter mobile number" required pattern="[0-9]{10}" maxlength="10">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Email*</label>
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control rounded-4"
                                    placeholder="Enter email" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Location / Address*</label>
                                <input type="text" name="location" value="{{ old('location') }}"
                                    class="form-control rounded-4" placeholder="Enter city / state" required>
                            </div>

                            {{-- <div class="col-md-6">
                                <label class="form-label">Country*</label>
                                <select name="country" id="countrySelect1" class="form-select rounded-4" required>
                                    <option value="" disabled selected>Loading countries...</option>
                                </select>
                            </div> --}}

                            <div class="row">
                            <!-- Country -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Country*</label>
                                <select name="country" class="form-select rounded-4" required>
                                    <option value="" disabled selected>Select country</option>
                                    <option value="India">India</option>
                                    <option value="Afghanistan">Afghanistan</option>
                                    <option value="Albania">Albania</option>
                                    <option value="Algeria">Algeria</option>
                                    <option value="Andorra">Andorra</option>
                                    <option value="Angola">Angola</option>
                                    <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                    <option value="Argentina">Argentina</option>
                                    <option value="Armenia">Armenia</option>
                                    <option value="Australia">Australia</option>
                                    <option value="Austria">Austria</option>
                                    <option value="Azerbaijan">Azerbaijan</option>
                                    <option value="Bahamas">Bahamas</option>
                                    <option value="Bahrain">Bahrain</option>
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="Barbados">Barbados</option>
                                    <option value="Belarus">Belarus</option>
                                    <option value="Belgium">Belgium</option>
                                    <option value="Belize">Belize</option>
                                    <option value="Benin">Benin</option>
                                    <option value="Bhutan">Bhutan</option>
                                    <option value="Bolivia">Bolivia</option>
                                    <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                    <option value="Botswana">Botswana</option>
                                    <option value="Brazil">Brazil</option>
                                    <option value="Brunei">Brunei</option>
                                    <option value="Bulgaria">Bulgaria</option>
                                    <option value="Burkina Faso">Burkina Faso</option>
                                    <option value="Burundi">Burundi</option>
                                    <option value="Cambodia">Cambodia</option>
                                    <option value="Cameroon">Cameroon</option>
                                    <option value="Canada">Canada</option>
                                    <option value="Cape Verde">Cape Verde</option>
                                    <option value="Central African Republic">Central African Republic</option>
                                    <option value="Chad">Chad</option>
                                    <option value="Chile">Chile</option>
                                    <option value="China">China</option>
                                    <option value="Colombia">Colombia</option>
                                    <option value="Comoros">Comoros</option>
                                    <option value="Congo (Brazzaville)">Congo (Brazzaville)</option>
                                    <option value="Congo (Kinshasa)">Congo (Kinshasa)</option>
                                    <option value="Costa Rica">Costa Rica</option>
                                    <option value="Croatia">Croatia</option>
                                    <option value="Cuba">Cuba</option>
                                    <option value="Cyprus">Cyprus</option>
                                    <option value="Czech Republic">Czech Republic</option>
                                    <option value="Denmark">Denmark</option>
                                    <option value="Djibouti">Djibouti</option>
                                    <option value="Dominica">Dominica</option>
                                    <option value="Dominican Republic">Dominican Republic</option>
                                    <option value="Ecuador">Ecuador</option>
                                    <option value="Egypt">Egypt</option>
                                    <option value="El Salvador">El Salvador</option>
                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                    <option value="Eritrea">Eritrea</option>
                                    <option value="Estonia">Estonia</option>
                                    <option value="Eswatini">Eswatini</option>
                                    <option value="Ethiopia">Ethiopia</option>
                                    <option value="Fiji">Fiji</option>
                                    <option value="Finland">Finland</option>
                                    <option value="France">France</option>
                                    <option value="Gabon">Gabon</option>
                                    <option value="Gambia">Gambia</option>
                                    <option value="Georgia">Georgia</option>
                                    <option value="Germany">Germany</option>
                                    <option value="Ghana">Ghana</option>
                                    <option value="Greece">Greece</option>
                                    <option value="Grenada">Grenada</option>
                                    <option value="Guatemala">Guatemala</option>
                                    <option value="Guinea">Guinea</option>
                                    <option value="Guinea-Bissau">Guinea-Bissau</option>
                                    <option value="Guyana">Guyana</option>
                                    <option value="Haiti">Haiti</option>
                                    <option value="Honduras">Honduras</option>
                                    <option value="Hungary">Hungary</option>
                                    <option value="Iceland">Iceland</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="Iran">Iran</option>
                                    <option value="Iraq">Iraq</option>
                                    <option value="Ireland">Ireland</option>
                                    <option value="Israel">Israel</option>
                                    <option value="Italy">Italy</option>
                                    <option value="Jamaica">Jamaica</option>
                                    <option value="Japan">Japan</option>
                                    <option value="Jordan">Jordan</option>
                                    <option value="Kazakhstan">Kazakhstan</option>
                                    <option value="Kenya">Kenya</option>
                                    <option value="Kiribati">Kiribati</option>
                                    <option value="Kuwait">Kuwait</option>
                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                    <option value="Laos">Laos</option>
                                    <option value="Latvia">Latvia</option>
                                    <option value="Lebanon">Lebanon</option>
                                    <option value="Lesotho">Lesotho</option>
                                    <option value="Liberia">Liberia</option>
                                    <option value="Libya">Libya</option>
                                    <option value="Liechtenstein">Liechtenstein</option>
                                    <option value="Lithuania">Lithuania</option>
                                    <option value="Luxembourg">Luxembourg</option>
                                    <option value="Madagascar">Madagascar</option>
                                    <option value="Malawi">Malawi</option>
                                    <option value="Malaysia">Malaysia</option>
                                    <option value="Maldives">Maldives</option>
                                    <option value="Mali">Mali</option>
                                    <option value="Malta">Malta</option>
                                    <option value="Marshall Islands">Marshall Islands</option>
                                    <option value="Mauritania">Mauritania</option>
                                    <option value="Mauritius">Mauritius</option>
                                    <option value="Mexico">Mexico</option>
                                    <option value="Micronesia">Micronesia</option>
                                    <option value="Moldova">Moldova</option>
                                    <option value="Monaco">Monaco</option>
                                    <option value="Mongolia">Mongolia</option>
                                    <option value="Montenegro">Montenegro</option>
                                    <option value="Morocco">Morocco</option>
                                    <option value="Mozambique">Mozambique</option>
                                    <option value="Myanmar (Burma)">Myanmar (Burma)</option>
                                    <option value="Namibia">Namibia</option>
                                    <option value="Nauru">Nauru</option>
                                    <option value="Nepal">Nepal</option>
                                    <option value="Netherlands">Netherlands</option>
                                    <option value="New Zealand">New Zealand</option>
                                    <option value="Nicaragua">Nicaragua</option>
                                    <option value="Niger">Niger</option>
                                    <option value="Nigeria">Nigeria</option>
                                    <option value="North Korea">North Korea</option>
                                    <option value="North Macedonia">North Macedonia</option>
                                    <option value="Norway">Norway</option>
                                    <option value="Oman">Oman</option>
                                    <option value="Pakistan">Pakistan</option>
                                    <option value="Palau">Palau</option>
                                    <option value="Palestine">Palestine</option>
                                    <option value="Panama">Panama</option>
                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                    <option value="Paraguay">Paraguay</option>
                                    <option value="Peru">Peru</option>
                                    <option value="Philippines">Philippines</option>
                                    <option value="Poland">Poland</option>
                                    <option value="Portugal">Portugal</option>
                                    <option value="Qatar">Qatar</option>
                                    <option value="Romania">Romania</option>
                                    <option value="Russia">Russia</option>
                                    <option value="Rwanda">Rwanda</option>
                                    <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                    <option value="Saint Lucia">Saint Lucia</option>
                                    <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                                    <option value="Samoa">Samoa</option>
                                    <option value="San Marino">San Marino</option>
                                    <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                    <option value="Senegal">Senegal</option>
                                    <option value="Serbia">Serbia</option>
                                    <option value="Seychelles">Seychelles</option>
                                    <option value="Sierra Leone">Sierra Leone</option>
                                    <option value="Singapore">Singapore</option>
                                    <option value="Slovakia">Slovakia</option>
                                    <option value="Slovenia">Slovenia</option>
                                    <option value="Solomon Islands">Solomon Islands</option>
                                    <option value="Somalia">Somalia</option>
                                    <option value="South Africa">South Africa</option>
                                    <option value="South Korea">South Korea</option>
                                    <option value="Spain">Spain</option>
                                    <option value="Sri Lanka">Sri Lanka</option>
                                    <option value="Sudan">Sudan</option>
                                    <option value="Suriname">Suriname</option>
                                    <option value="Sweden">Sweden</option>
                                    <option value="Switzerland">Switzerland</option>
                                    <option value="Syria">Syria</option>
                                    <option value="Taiwan">Taiwan</option>
                                    <option value="Tajikistan">Tajikistan</option>
                                    <option value="Tanzania">Tanzania</option>
                                    <option value="Thailand">Thailand</option>
                                    <option value="Togo">Togo</option>
                                    <option value="Tonga">Tonga</option>
                                    <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                    <option value="Tunisia">Tunisia</option>
                                    <option value="Turkey">Turkey</option>
                                    <option value="Turkmenistan">Turkmenistan</option>
                                    <option value="Tuvalu">Tuvalu</option>
                                    <option value="Uganda">Uganda</option>
                                    <option value="Ukraine">Ukraine</option>
                                    <option value="United Arab Emirates">United Arab Emirates</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="United States">United States</option>
                                    <option value="Uruguay">Uruguay</option>
                                    <option value="Uzbekistan">Uzbekistan</option>
                                    <option value="Vanuatu">Vanuatu</option>
                                    <option value="Vatican City">Vatican City</option>
                                    <option value="Venezuela">Venezuela</option>
                                    <option value="Vietnam">Vietnam</option>
                                    <option value="Yemen">Yemen</option>
                                    <option value="Zambia">Zambia</option>
                                    <option value="Zimbabwe">Zimbabwe</option>
                                </select>
                            </div>
                       

                            <div class="col-md-6">
                                <label class="form-label">Photo*</label>
                                <input type="file" name="photo" class="form-control rounded-4" accept="image/*" required>
                            </div>
                            </div>
                            <!-- Documents Section -->
                            <div class="col-12">
                                <h6 class="fw-semibold mt-3">Upload Documents</h6>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Aadhar Card</label>
                                <input type="file" name="aadhar_card" class="form-control rounded-4"
                                    accept=".pdf,.jpg,.png">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">PAN Card</label>
                                <input type="file" name="pan_card" class="form-control rounded-4" accept=".pdf,.jpg,.png">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">CV / Resume</label>
                                <input type="file" name="cv_resume" class="form-control rounded-4" accept=".pdf,.doc,.docx">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Previous Work</label>
                                <input type="file" name="previous_work" class="form-control rounded-4"
                                    accept=".pdf,.jpg,.png,.zip">
                            </div>

                            <!-- Password -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Password*</label>
                                <input type="password" name="password" class="form-control rounded-4" placeholder="Enter password" required />
                            </div>

                            <div class="col-12">
                                <label class="form-label">Description</label>
                                <textarea name="description" class="form-control rounded-4" rows="2"
                                    placeholder="Write a short description">{{ old('description') }}</textarea>
                            </div>
                        </div>

                        <div class="modal-footer border-0 justify-content-start mt-3">
                            <button type="submit" class="btn btn-submit rounded-4">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Partner Photo Preview Script -->
    <script>
        document.getElementById('partnerPhoto').addEventListener('change', function (event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById('partnerPhotoPreview').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection

<script>
    // Fetch countries from API and populate dropdown
    fetch('https://restcountries.com/v3.1/all?fields=name')
        .then(response => response.json())
        .then(countries => {
            const select = document.getElementById('countrySelect');

            // Clear loading message
            select.innerHTML = '<option value="" disabled selected>Select country</option>';

            // Sort countries alphabetically
            countries.sort((a, b) => a.name.common.localeCompare(b.name.common));

            // Add all countries to dropdown
            countries.forEach(country => {
                const option = document.createElement('option');
                option.value = country.name.common;
                option.textContent = country.name.common;
                select.appendChild(option);
            });
        })
        .catch(error => {
            console.error('Error loading countries:', error);
            // Fallback to your original countries if API fails
            const select = document.getElementById('countrySelect');
            select.innerHTML = `
            <option value="" disabled selected>Select country</option>
            <option value="India">India</option>
            <option value="USA">USA</option>
            <option value="UK">UK</option>
            <option value="Australia">Australia</option>
            <option value="Canada">Canada</option>
        `;
        });
</script>

<script>
    // Fetch countries from API and populate dropdown
    fetch('https://restcountries.com/v3.1/all?fields=name')
        .then(response => response.json())
        .then(countries => {
            const select = document.getElementById('countrySelect1');

            // Clear loading message
            select.innerHTML = '<option value="" disabled selected>Select country</option>';

            // Sort countries alphabetically
            countries.sort((a, b) => a.name.common.localeCompare(b.name.common));

            // Add all countries to dropdown
            countries.forEach(country => {
                const option = document.createElement('option');
                option.value = country.name.common;
                option.textContent = country.name.common;
                select.appendChild(option);
            });
        })
        .catch(error => {
            console.error('Error loading countries:', error);
            // Fallback to your original countries if API fails
            const select = document.getElementById('countrySelect1');
            select.innerHTML = `
            <option value="" disabled selected>Select country</option>
            <option value="India">India</option>
            <option value="USA">USA</option>
            <option value="UK">UK</option>
            <option value="Australia">Australia</option>
            <option value="Canada">Canada</option>
        `;
        });
</script>

