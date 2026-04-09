@extends('web.layouts.app')

@section('title', 'Our Services - Globe Assist')

@section('content')
     <!-- banner image -->
<section class="our-services-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 offset-lg-6 text-content">
        <div class="text-inner mt-5 ps-4">
          <h2 class="our-services-title "><span >Our</span> <span > Services</span></h2>
          <p class="text-dark pt-0 text-center">Our teams are trained specifically for <br> luxury environments — guest care, presence, communication, <br> and seamless coordination.</p>
        </div>
      </div>
      
    </div>
  </div>
</section>


<!-- what we offer section -->
 <div class="mt-5">  
<div class="service-offer-heading">
  <h2 class="offer-title">Our Capabilities</h2>
<img src="{{ asset('assets/vector1_blue_v2.svg') }}" alt="">
</div>
<p class="offer-subtitle mt-5">Globe Assist delivers specialized workforce solutions tailored to the travel, event, and wedding sectors.<br> From operational support to creative execution, we provide trained professionals who <br>ensure excellence, efficiency, and seamless client experiences at every stage.</p>
 </div>

<!-- cards section -->
 <section class="roles-section py-5">
  <div class="container">
    <div class="row g-4">
      
      <!-- Card 1 -->
      <div class="col-md-6">
        <div class="role-card">
          <div class="role-icon">
            <i class="bi bi-arrow-up-right"></i>
          </div>
          <h3 class="role-title">On-Ground Guest Experience Teams</h3>
          <p class="role-text">
         Hospitality Stewards • Hostesses • Guest Relations • Logistics & Movement Coordination Polished, empathetic and trained for luxury environments.

          </p>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="col-md-6">
        <div class="role-card">
          <div class="role-icon">
            <i class="bi bi-arrow-up-right"></i>
          </div>
          <h3 class="role-title">Event & Destination Wedding Crew</h3>
          <p class="role-text">
            Client Desk & Check-In Teams • Venue Operations • Family Assistants Ensuring smooth flow, time management and elegance in delivery.

          </p>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="col-md-6">
        <div class="role-card">
          <div class="role-icon">
            <i class="bi bi-arrow-up-right"></i>
          </div>
          <h3 class="role-title">Tour Managers & Travel Escorts</h3>
          <p class="role-text">
            For pre-wedding travel, post-wedding leisure groups, corporate retreats and influencer trips.
          </p>
        </div>
      </div>

      <!-- Card 4 -->
      <div class="col-md-6">
        <div class="role-card">
          <div class="role-icon">
            <i class="bi bi-arrow-up-right"></i>
          </div>
          <h3 class="role-title">Reelographers & Content Creators</h3>
          <p class="role-text">
            Real-time storytelling — candid, social-first, celebratory and unobtrusive.

          </p>
        </div>
      </div>

      <!-- Card 5 -->
      <div class="col-md-6">
        <div class="role-card">
          <div class="role-icon">
            <i class="bi bi-arrow-up-right"></i>
          </div>
          <h3 class="role-title">Pre-Event Coordination & Tele-Calling Support
            </h3>
                      <p class="role-text">
                    Invites • RSVPs • Guest Data • Travel Updates • Follow-Ups
            Structured, professional communication that reflects your brand tone.

          </p>
        </div>
      </div>

    </div>
  </div>
</section>


   <!-- industries we serve -->
     <div class="iws-main-section mb-5">
       <div class="service-industry-heading">
         <h1 class="iws-title-heading">Industries We Serve</h1>
        <img src="{{ asset('assets/vector1.svg') }}" alt="">
       </div>
        
        <div class="iws-cards-container">
            <!-- Travel Agencies Card -->
            <div class="iws-industry-card iws-travel-card">
                <div class="iws-card-image-wrapper">
                    <img src="https://images.unsplash.com/photo-1488646953014-85cb44e25828?w=600&h=400&fit=crop" alt="Travel Agencies">
                </div>
                <div class="iws-card-content">
                    <h3 class="iws-card-title">Travel Agencies</h3>
                    <p class="iws-card-description">Group Tours, FIT, Luxury Operators</p>
                </div>
            </div>

            <!-- Event Companies Card -->
            <div class="iws-industry-card iws-event-card">
                <div class="iws-card-image-wrapper">
                    <img src="{{ asset('assets/schuling trip.png') }}" alt="Event Companies">
                </div>
                <div class="iws-card-content">
                    <h3 class="iws-card-title">Event Companies</h3>
                    <p class="iws-card-description">Corporate Events, MICE, Brand Activations</p>
                </div>
            </div>

            <!-- Wedding Planners Card -->
            <div class="iws-industry-card iws-wedding-card">
                <div class="iws-card-image-wrapper">
                    <img src="{{ asset('assets/wedding couploe.png')}}" alt="Wedding Planners">
                </div>
                <div class="iws-card-content">
                    <h3 class="iws-card-title">Wedding Planners</h3>
                    <p class="iws-card-description">Destination Weddings, Guest Management, Content Creation</p>
                </div>
            </div>
        </div>
    </div>





<section class="ga-hero-section">
    <div class="container">
        <div class="ga-hero-heading">
            <h1 class="ga-main-heading">Get Started with 
                <span class="brand-blue-color">Globe</span><span class="brand-green-color"> Assist</span>
            </h1>
            <img src="{{ asset('assets/Vector 1.svg') }}" alt="">
        </div>

        <p class="ga-subtitle-text">
            Begin your partnership with Globe Assist in just a few simple steps. Our process ensures transparency, efficiency, and seamless collaboration from consultation to execution.
        </p>

                <div class="ga-features-grid">
            <!-- Step 1: Consultation -->
            <div class="ga-feature-card">
                <div class="ga-icon-wrapper"><i class="bi bi-envelope-paper"></i></div>
                <h3 class="ga-feature-title">Consultation</h3>
                <p class="ga-feature-description">
                    Write to us at <a href="mailto:connect@globeassist.in" class="text-decoration-none">connect@globeassist.in</a> or connect via WhatsApp for a quick discussion.
                </p>
            </div>

            <!-- Step 2: Assessment -->
            <div class="ga-feature-card">
                <div class="ga-icon-wrapper"><i class="bi bi-clipboard-data"></i></div>
                <h3 class="ga-feature-title">Assessment</h3>
                <p class="ga-feature-description">
                    Share your requirements, goals, and project details for precise understanding and tailored solutions.
                </p>
            </div>

            <!-- Step 3: Proposal -->
            <div class="ga-feature-card">
                <div class="ga-icon-wrapper"><i class="bi bi-file-earmark-text"></i></div>
                <h3 class="ga-feature-title">Proposal</h3>
                <p class="ga-feature-description">
                    Receive a customized plan outlining scope, deliverables, and transparent pricing for complete clarity.
                </p>
            </div>

            <!-- Step 4: Agreement -->
            <div class="ga-feature-card center-row">
                <div class="ga-icon-wrapper"><i class="bi bi-pencil-square"></i></div>
                <h3 class="ga-feature-title">Agreement</h3>
                <p class="ga-feature-description">
                    Review and sign off the agreement to confirm deployment and begin collaboration.
                </p>
            </div>

            <!-- Step 5: Execution -->
            <div class="ga-feature-card center-row">
                <div class="ga-icon-wrapper"><i class="bi bi-rocket-takeoff"></i></div>
                <h3 class="ga-feature-title">Execution</h3>
                <p class="ga-feature-description">
                    Our professionals are deployed, performance is monitored, and results are delivered with precision and accountability.
                </p>
            </div>
        </div>
    </div>
</section>


<!-- platform benefits -->
 <section class="pb-platform-benefits">
        <div class="container "> 
           <!-- For Partners Section -->
            <div class="pb-partner-section">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-6 order-md-1">
                      <div class="pb-platform-benefits-heading">

             <h3 class="pb-main-heading">Our Value to You?</h3>
            <img src="{{ asset('assets/vector1_blue_v2.svg') }}" alt="">
          </div>
                     <ul>
                          <li>
                            <strong>Scale Without Hiring Overheads:</strong> Avoid full-time staffing costs while maintaining service excellence year-round.
                          </li>
                          <li>
                            <strong>Professionally Trained, Verified Talent:</strong> Every individual is screened and groomed for guest-facing roles.
                          </li>
                          <li>
                            <strong>Pan-India & International Deployment:</strong> Wherever the event goes — your team goes too.
                          </li>
                          <li>
                            <strong>Seamless Alignment With Your Brand Tone:</strong> We integrate into your system, not override it.
                          </li>
                        </ul>

                        <p><strong>Your vision remains the hero.</strong> We simply ensure flawless execution.</p>

                    
                        {{-- <a href="#" class="pb-cta-button2">
                            Become a Partner
                            <i class="fas fa-arrow-right"></i>
                        </a> --}}
                        <a href="" data-bs-toggle="modal" data-bs-target="#addPartnerModal" class="pb-cta-button2">
                       Let's Connect<i class="fas fa-arrow-right"></i>
                    </a>
                    </div>
                    <div class="col-lg-5 col-md-6 order-md-2 mt-4 mt-md-0">
                        <div class="pb-image-wrapper">
                            <img src="{{ asset('assets/AdobeStock_229930631.jpeg ') }}" alt="Happy couple with travel bags and passports">
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<section class="ga-hero-section">
    <div class="container">
        <div class="ga-hero-heading">
            <h1 class="ga-main-heading"> 
                <span class="brand-blue-color">Where People Meet Precision</span>
            </h1>
            <img src="{{ asset('assets/Vector 1.svg') }}" alt="">
        </div>

        <p class="ga-subtitle-text">
We blend warmth, timing, and teamwork to elevate every occasion.        </p>

          <div class="ga-features-grid">
            <!-- Step 1: Consultation -->
            <div class="ga-feature-card">
                <div class="ga-icon-wrapper"><i class="bi bi-envelope-paper"></i></div>
                <h3 class="ga-feature-title">Guest Experience & Hospitality Teams</h3>
                <p class="ga-feature-description">
                    Front desk, welcome hosts, family assistants, guest movement coordination.

                </p>
            </div>

            <!-- Step 2: Assessment -->
            <div class="ga-feature-card">
                <div class="ga-icon-wrapper"><i class="bi bi-clipboard-data"></i></div>
                <h3 class="ga-feature-title">Destination Wedding Crew
                  </h3>
                <p class="ga-feature-description">
                    Multi-day crew support, venue management coordination, itinerary flow.
                </p>
            </div>

            <!-- Step 3: Proposal -->
            <div class="ga-feature-card">
                <div class="ga-icon-wrapper"><i class="bi bi-file-earmark-text"></i></div>
                <h3 class="ga-feature-title">Tour Managers & Travel Escorts</h3>
                <p class="ga-feature-description">
                    For pre/post wedding travel groups, leisure, incentive & event itineraries.
                </p>
            </div>

            <!-- Step 4: Agreement -->
            <div class="ga-feature-card center-row">
                <div class="ga-icon-wrapper"><i class="bi bi-pencil-square"></i></div>
                <h3 class="ga-feature-title">Reelographers & Social-First Content
            </h3>
                <p class="ga-feature-description">
                    Candid storytelling for couples, guests and planners to share in real-time.
                </p>
            </div>

            <!-- Step 5: Execution -->
            <div class="ga-feature-card center-row">
                <div class="ga-icon-wrapper"><i class="bi bi-rocket-takeoff"></i></div>
                <h3 class="ga-feature-title">Pre-Event Tele-Coordination </h3>
                <p class="ga-feature-description">
                    RSVP management, guest database handling, communication follow-through.
                </p>
            </div>
</div>
    </div>
</section>



    <!-- why choose globe assist -->
 
@endsection