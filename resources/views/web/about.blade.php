

@extends('web.layouts.app')

@section('title', 'About Us - Global Assist')

@section('content')

<!-- hero section -->
<div class="about-section-container py-5">
    <div class="container">
        <div class="row align-items-center">
            
            <!-- Left Side: Content -->
            <div class="col-lg-6 col-md-12">
    <div class="about-heading-wrapper mb-3">
        <h1 class="about-main-title mt-4">About Us</h1>
        <img src="{{ asset('assets/vector1.svg') }}" alt="">
    </div>

    <p class="about-description-text">
        At Globe Assist, we believe the future of work is flexible, specialized, and on-demand. 
        Born from a deep understanding of the travel, event, and wedding industries, Globe Assist 
        was founded to solve one of the sector’s biggest challenges — the need for reliable, 
        skilled professionals without the burden of full-time staffing and infrastructure costs.
    </p>

    <p class="about-description-text">
        With decades of combined experience, our team identified the operational strain that 
        seasonal peaks, large-scale events, and project-specific demands create. Traditional 
        staffing models lack the speed, scalability, and precision needed in today’s dynamic 
        market — and that’s where Globe Assist redefines the standard.
    </p>

    <p class="about-description-text mb-4">
        We provide a specialized flexi-workforce platform that connects businesses with a 
        verified network of trained professionals. From telecallers and tour managers to 
        ground operators and content creators, Globe Assist ensures you always have the 
        right talent, at the right time.
    </p>
</div>


            <!-- Right Side: Image -->
            <div class="col-lg-6 col-md-12 text-center mt-4 mt-lg-0">
                <div class="about-team-img">
                    <img src="https://clipart-library.com/2024/image-of-team-work/image-of-team-work-13.png" 
                         alt="Team collaboration at Globe Assist"
                         class="img-fluid rounded-4 shadow">
                </div>
            </div>
        </div>
    </div>
</div>


<!-- stats section -->
<section class="stats-container">
  <div class="container">
    <div class="stats-grid text-center" style="display:grid; grid-template-columns:repeat(auto-fit,minmax(200px,1fr)); gap:2rem;">
      
      <div class="stat-item" data-aos="zoom-in" data-aos-delay="100">
        <div class="counter" data-target="300" style="font-size:2.5rem; font-weight:700; color:#6cba0c;">0</div>
        <div class="label">Verified Professionals</div>
      </div>

      <div class="stat-item" data-aos="zoom-in" data-aos-delay="200">
        <div class="counter" data-target="120" style="font-size:2.5rem; font-weight:700; color:#6cba0c;">0</div>
        <div class="label">Projects Delivered</div>
      </div>

      <div class="stat-item" data-aos="zoom-in" data-aos-delay="300">
        <div class="counter" data-target="40" style="font-size:2.5rem; font-weight:700; color:#6cba0c;">0</div>
        <div class="label">Partner Companies</div>
      </div>

      <div class="stat-item" data-aos="zoom-in" data-aos-delay="400">
        <div class="counter" data-target="98" style="font-size:2.5rem; font-weight:700; color:#6cba0c;">0</div>
        <div class="label">Client Satisfaction (%)</div>
      </div>

    </div>
  </div>
</section>


<section class="how-it-works text-center py-5">
  <div class="container">
    <h2 class="how-globe mb-5 lexend-font">
      What makes <span class="blue-text">Globe</span> <span class="green-text">Assist</span> different
    </h2>

    <div class="row justify-content-center g-4">
      <!-- Step 1 -->
      <div class="col-12 col-md-4">
        <div class="step-card p-4 bg-white shadow-sm rounded-4">
          <div class="step-icon mb-3">
            <!-- Trust Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="none" stroke="#6cba0c" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M12 22L20 30L36 14" />
              <circle cx="24" cy="24" r="22" />
            </svg>
          </div>
          <h5 class="step-title mb-2">Trust & Verification</h5>
          <p class="para-font">Every professional on our platform is vetted, trained, and reviewed for quality assurance.</p>
        </div>
      </div>

      <!-- Step 2 -->
      <div class="col-12 col-md-4">
        <div class="step-card p-4 bg-white shadow-sm rounded-4">
          <div class="step-icon mb-3">
            <!-- Cost Efficiency Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="none" stroke="#6cba0c" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="24" cy="24" r="22" />
              <path d="M16 24h16M24 16v16" />
            </svg>
          </div>
          <h5 class="step-title mb-2">Cost Efficiency</h5>
          <p class="para-font">No infrastructure, no training overheads. You only pay for what you need, when you need it.</p>
        </div>
      </div>

      <!-- Step 3 -->
      <div class="col-12 col-md-4">
        <div class="step-card p-4 bg-white shadow-sm rounded-4">
          <div class="step-icon mb-3">
            <!-- Delivery Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="none" stroke="#6cba0c" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M3 12l18 10 18-10M3 12v20l18 10 18-10V12M3 32l18 10 18-10" />
            </svg>
          </div>
          <h5 class="step-title mb-2">Seamless Delivery</h5>
          <p class="para-font">From onboarding to execution, our team monitors every step to ensure a flawless client experience.</p>
        </div>
      </div>
    </div>
  </div>
</section>




<!-- Guided by Passion Section -->
<section class="hero-section" style="background-color:#f9fafb;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="guid-heading-wrapper">
                    <h1 class="hero-title">Driven by Purpose, Guided by Vision</h1>
                    <img src="{{ asset('assets/vector1.svg') }}" alt="Vector">
                </div>
                <p class="hero-description">
                     We’re not just building a platform — we’re building partnerships that redefine how businesses access<br>
        skilled professionals. At Globe Assist, our mission and vision reflect our commitment to creating a<br>
        future where expertise is accessible, flexible, and always reliable.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Vision & Mission Section -->
<section class="content-wrapper mb-5 pb-5" style="background-color:#f9fafb;">
    <div class="container">
        <div class="row">
               <div class="col-lg-7">
                <div class="vision-mission-container ps-lg-5">
                    <div class="vision-block">
                        <h2 class="section-heading">Our Vision</h2>
                        <p class="section-text">
                           We’re not just redefining how teams are built — we’re transforming how businesses grow. 
        At Globe Assist, every partnership is guided by clarity, accountability, and excellence. 
        Our mission and vision are built on the belief that the future of work lies in flexibility, 
        verified expertise, and the power of meaningful collaboration.
                        </p>
                    </div>
                    <div class="mission-block">
                        <h2 class="section-heading">Our Mission</h2>
                        <p class="section-text mb-0">
                            To become the most trusted and recognized <strong>flexi-workforce and content partner</strong> 
            for the travel, events, and wedding industries — not just in India, but across global markets. 
            We envision a world where businesses can access specialized professionals instantly, without 
            boundaries or bottlenecks, ensuring projects are delivered with precision, creativity, and 
            reliability every single time.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 mb-4 mb-lg-0">
                <div class="mountain-image-container">
                    <img src="https://media.licdn.com/dms/image/v2/C5612AQE6T7ti7yt2vA/article-cover_image-shrink_720_1280/article-cover_image-shrink_720_1280/0/1613726752909?e=2147483647&v=beta&t=PqvoPJddxAJ8t7KwEYtw87blKOHmyK6aQQg9OJFaxIc" alt="Mountain Vision" class="mountain-image" />
                </div>
            </div>
         
        </div>
    </div>
</section>

<!-- Workforce Platform Section -->
<section class="workforce-platform-section text-center py-5 mb-2">
  <div class="container">
    <h2 class="platform-heading-primary">
      Empower Your Business with 
      <span class="brand-blue-color">Globe</span><span class="brand-green-color"> Assist</span>
    </h2>
<img src="https://globeassist.in/assets/vector1.svg" alt="" class="mb-3 empower-img" style="position: absolute;right: 370px;/* top: 5000px; */ right:550px;">

    <p class="platform-description-text mx-auto mb-4" style="max-width:750px; font-size:1.05rem; line-height:1.7;">
      Simplify operations and scale smarter with our curated network of verified professionals. 
      From telecallers and tour managers to content creators and on-ground specialists — 
      Globe Assist ensures you have the right people, at the right time.
    </p>

    <a href="https://www.globeassist.in/support" class="btn btn-lg rounded-4 px-4 py-2"
       style="background-color:#6cba0c; color:#fff; font-weight:500;">
      Let’s Connect <i class="bi bi-arrow-up-right ms-2"></i>
    </a>
  </div>
</section>

<script>
// Counter Animation Script
document.addEventListener("DOMContentLoaded", () => {
  const counters = document.querySelectorAll(".counter");
  const speed = 50; // lower = faster

  const animateCounters = () => {
    counters.forEach(counter => {
      const updateCount = () => {
        const target = +counter.getAttribute("data-target");
        const count = +counter.innerText;
        const increment = target / speed;

        if (count < target) {
          counter.innerText = Math.ceil(count + increment);
          setTimeout(updateCount, 40);
        } else {
          counter.innerText = target;
        }
      };
      updateCount();
    });
  };

  // Trigger animation when section is visible
  const observer = new IntersectionObserver(entries => {
    if (entries[0].isIntersecting) {
      animateCounters();
      observer.disconnect();
    }
  });

  observer.observe(document.querySelector(".stats-container"));
});
</script>



@endsection
