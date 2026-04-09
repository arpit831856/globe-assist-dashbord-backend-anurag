<!-- footer -->
<section class="">
    <div class="container-fluid">
        <div class="bg-black text-white d-flex flex-md-row flex-column px-4 py-5  rounded-5 gap-4">
            <div class="row justify-content-between">
                <div class="col-md-5">
                    <a href="https://www.globeassist.in" target="_blank" rel="noopener noreferrer">
                        <img class="mb-2" src="{{ asset('assets/globe assist logo.png') }}" alt="Globe Assist Logo"
                            height="60">
                    </a>
                    <p class="  footer-para mb-4">
                        Get in touch with our team for workforce support, partnerships, or inquiries. We’re here to connect you with the right experts, anytime you need assistance.
                    </p>
                    <h4 class="h2 fw-semibold mb-2 fs-5">Follow Us:</h4>
                    <div class="d-flex gap-3 mb-4">

                        <a href="https://www.facebook.com/profile.php?id=61578756719974" target="_blank"><img src="{{ asset('assets/ic_baseline-facebook.svg')}}" class="green-icon"
                                alt=""></a>
                        <a href="https://www.instagram.com/globeassist_?igsh=MW9lejBuazQxNzBoYQ==" target="_blank"><img
                                src="{{ asset('assets/line-md_instagram.svg')}}" class="green-icon" alt=""></a>
                        <a href="https://www.linkedin.com/company/globeassist/"
                            target="_blank"><img src="{{ asset('assets/entypo-social_linkedin-with-circle.svg')}}"
                                class="green-icon" alt=""></a>
                        <a href="#"><img src="{{ asset('assets/prime_twitter.svg')}}" class="green-icon" alt=""></a>
                    </div>
                    <h4 class="h2 fw-semibold fs-5 mb-2">Contact Us</h4>
                    <div class="d-flex gap-2 align-items-center pb-1">
                        <img src="{{ asset('assets/dashicons_email.svg')}}" alt="">
                        <a class="text-decoration-none text-white"
                            href="mailto:connect@globeassist.in">connect@globeassist.in</a>

                    </div>
                    
                </div>
                <div class="col-md-5">
                    <div class="row pb-">
                        <div class="col mb-3 mt-5">
                            <ul class="nav flex-column">
                                <li class="nav-item mb-2"><a href="/" class="nav-link p-0 text-white ">Home</a>
                                </li>
                                <li class="nav-item mb-2"><a href="{{ route('web.how-it-works') }}" class="nav-link p-0 text-white ">How
                                        it work</a></li>
                                <li class="nav-item mb-2"><a href="{{ route('user.create') }}" target="_blank" class="nav-link p-0 text-white "
                                        >For
                                        users</a></li>
                                <li class="nav-item mb-2"><a href="{{ route('partner.create') }}" target="_blank" class="nav-link p-0 text-white "
                                        >For
                                        partners</a></li>
                            </ul>
                        </div>
                        <div class="col mb-3 mt-5">
                            <ul class="nav flex-column">
                                <li class="nav-item mb-2"><a href="/about" class="nav-link p-0 text-white ">About
                                        Us</a></li>
                                <li class="nav-item mb-2"><a href="{{ route('web.support') }}" class="nav-link p-0 text-white ">Support &
                                        FAQs</a></li>
                                <li class="nav-item mb-2"><a href="{{ route('web.privacy-policy') }}" class="nav-link p-0 text-white">Privacy
                                        Policy</a></li>
                                <li class="nav-item mb-2"><a href="{{ route('web.terms&condition') }}" class="nav-link p-0 text-white">Terms
                                        of Services</a></li>
                            </ul>
                        </div>
                    </div>
                    <p class=" mt-3 mb-4 col-10 footer-para">Join Globe Assist’s expert network to access premium projects, flexible opportunities, and trusted collaborations that recognize your skills and professionalism.</p>
                    <!-- {{-- <button class=" btn-dark rounded-3  fw-light  mt-2 btn-partner">Become a Partner <i
                            class="bi bi-arrow-up-right"></i></button> --}}

                    <a href="" data-bs-toggle="modal" data-bs-target="#addPartnerModal"
                        class="btn btn-dark rounded-3 fw-light mt-2 btn-partner">
                        Become a Partner <i class="bi bi-arrow-up-right"></i>
                    </a> -->
                </div>
                <p class="fw-light fs-6 mt-5">© 2025 Globe Assist. All rights reserved Designed by <a
                            href="https://digitalutilization.com/" class="text-decoration-none text-white"
                            target="_blank">BMDU</a>.</p>
            </div>
        </div>
    </div>


      <!--- Add Partner Modal -->
    <div class="modal fade" id="addPartnerModal" tabindex="-1" aria-labelledby="addPartnerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content bg-conic-gradient p-3 ready-container"> <!-- Add padding inside modal content -->
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
                                <select name="country" class="form-select rounded-4" required>
                                    <option value="" disabled {{ old('country') ? '' : 'selected' }}>Select country</option>
                                    <option value="India" {{ old('country')=='India' ? 'selected' : '' }}>India</option>
                                    <option value="USA" {{ old('country')=='USA' ? 'selected' : '' }}>USA</option>
                                    <option value="UK" {{ old('country')=='UK' ? 'selected' : '' }}>UK</option>
                                    <option value="Australia" {{ old('country')=='Australia' ? 'selected' : '' }}>Australia
                                    </option>
                                    <option value="Canada" {{ old('country')=='Canada' ? 'selected' : '' }}>Canada</option>
                                </select>
                            </div> --}}
                            <div class="col-md-6">
                                <label class="form-label">Country*</label>
                                <select name="country" id="countrySelect1" class="form-select rounded-4" required>
                                    <option value="" disabled selected>Loading countries...</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Photo*</label>
                                <input type="file" name="photo" class="form-control rounded-4" accept="image/*" required>
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

    
</section>

<!-- Back to Top Button -->
<button type="button" class="btn btn-success btn-lg rounded-circle shadow back-to-top" id="backToTopBtn">
    <i class="bi bi-arrow-up"></i>
</button>

<script>
    // Show or hide the button
    const backToTopBtn = document.getElementById("backToTopBtn");
    window.addEventListener("scroll", () => {
        if (window.scrollY > 200) {
            backToTopBtn.style.display = "flex";
        } else {
            backToTopBtn.style.display = "none";
        }
    });

    // Scroll smoothly to top when clicked
    backToTopBtn.addEventListener("click", () => {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    });
</script>

<style>
   .back-to-top {
    background-color: #6cba0c;
    position: fixed;
    bottom: 30px;
    right: 30px;
    display: none;
    z-index: 999;
    width: 50px;
    height: 50px;
    font-size: 22px;
    justify-content: center;
    align-items: center;
    transition: all 0.3s ease;
}

.back-to-top:hover {
    transform: scale(1.1);
    background-color: #0383c2; /* optional hover color */
    color: #fff;
}


</style>