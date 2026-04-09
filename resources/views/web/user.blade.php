@extends('web.layouts.app')
@section('title', 'Find & Hire Verified Professionals | Globe Assist')
@section('content')

    <body class="bg-light">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Validation Errors -->
        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="partner-header-section text-center pt-3 pb-4">
                        <div class="partner-header-top">
                            <h1 class="partner-main-heading green-text">Hire Smarter. Scale Faster.</h1>
                            <img src="./Globe Assist Home Page Assets/Vector 1.svg" alt="">
                        </div>
                        <p class="partner-description-text">
                          At Globe Assist, we empower businesses in the travel, events, and wedding sectors to connect with skilled freelance professionals—on demand. Our flexible workforce model ensures agility, quality, and efficiency while minimizing overheads and long-term commitments.
<br> <em>Sign up today and discover a new way to build your workforce—dynamic, reliable, and future-ready.</em>

                        </p>
                    </div>
                    <div class="modal-content bg-conic-gradient shadow-lg rounded-4 p-4 ready-container">
                        {{-- <div class="modal-header mx-4 border-0 mt-4">
                            <h5 class="modal-title">Register here</h5>
                        </div> --}}
                        <!-- Success Message -->

                        <!-- User Form -->
                        <div class="modal-body mx-4 small">

                            <form id="addUserForm" action="{{ route('users.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <!-- Name -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Full Name*</label>
                                        <input type="text" name="name" value="{{ old('name') }}"
                                            class="form-control rounded-4" placeholder="Enter full name" required />
                                    </div>

                                    <!-- Mobile -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Mobile Number*</label>
                                        <input type="tel" name="mobile" value="{{ old('mobile') }}"
                                            class="form-control rounded-4" placeholder="Enter mobile number" required />
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Email -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Email*</label>
                                        <input type="email" name="email" value="{{ old('email') }}"
                                            class="form-control rounded-4" placeholder="Enter email" required />
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
                                            <option value="" disabled {{ old('company_type') ? '' : 'selected' }}>Select
                                                type</option>
                                            <option value="Private Ltd" {{ old('company_type') == 'Private Ltd' ? 'selected' : '' }}>Private Ltd</option>
                                            <option value="Public Ltd" {{ old('company_type') == 'Public Ltd' ? 'selected' : '' }}>Public Ltd</option>
                                            <option value="Partnership" {{ old('company_type') == 'Partnership' ? 'selected' : '' }}>Partnership</option>
                                            <option value="Proprietorship" {{ old('company_type') == 'Proprietorship' ? 'selected' : '' }}>Proprietorship</option>
                                            <option value="Startup" {{ old('company_type') == 'Startup' ? 'selected' : '' }}>
                                                Startup</option>
                                        </select>
                                    </div>

                                    <!-- Location -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Location / Address*</label>
                                        <input type="text" name="location" value="{{ old('location') }}"
                                            class="form-control rounded-4" placeholder="Enter city / state" required />
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Country -->
                                    <div class="col-md-6">
                                        <label class="form-label">Country*</label>
                                        <select name="country" id="countrySelect" class="form-select rounded-4" required>
                                            <option value="" disabled selected>Loading countries...</option>
                                        </select>
                                    </div>

                                    <!-- Image -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Image*</label>
                                        <input type="file" id="fileInput" name="image" class="form-control rounded-4"
                                            multiple accept="image/*" value="{{ old('image') }}" required>
                                        <div id="errorMsg" class="text-danger"></div>
                                    </div>
                                </div>
                                

                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea name="description" class="form-control rounded-4"
                                        rows="2">{{ old('description') }}</textarea>
                                </div>

                                <div class="modal-footer border-0 d-flex justify-content-start">
                                    <button type="submit" class="btn btn-submit rounded-4 help-submit-btn">Submit</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                        errorMsg.textContent = "These files exceed 2 MB: " + oversizedFiles.join(", ");
                        fileInput.value = ""; // clear file input
                    }
                }
            });
        </script>

    </body>
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