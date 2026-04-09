@php
  $partners = $partners ?? collect(); 
@endphp
{{-- @dd($partners ?? 'No data received') --}}

@extends('admin.layouts.app')
@section('title', 'Join Globe Assist | Partner With Trusted Professionals')
@section('content')

  <!-- Main Content -->

  <!-- Stats Cards -->
  <div class="row mb-4">
    <!-- Total Partners -->
    <div class="col-md-6 col-lg-3 mb-3">
      <div class="card card-primary h-100">
        <div class="card-body">
          <div class="stat-card d-flex align-items-center">
            <div class="icon primary me-3">
              <i class="fas fa-user-shield"></i>
            </div>
            <div>
              <h6 class="mb-1">Total Partners</h6>
              <h4 class="mb-0">{{ $totalPartners }}</h4>
              <small class="text-success">

              </small>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Active Partners -->
    <div class="col-md-6 col-lg-3 mb-3">
      <div class="card card-primary h-100">
        <div class="card-body">
          <div class="stat-card d-flex align-items-center">
            <div class="icon primary me-3">
              <i class="fas fa-circle-check"></i>
            </div>
            <div>
              <h6 class="mb-1">Active Partners</h6>
              <h4 class="mb-0">{{ $activePartners }}</h4>
              <small class="text-success">
                <i class="fas fa-arrow-up"></i>
                {{ $activePartners - $inactivePartners > 0 ? 'More than last month' : 'Less than last month' }}
              </small>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Inactive Partners -->
    <div class="col-md-6 col-lg-3 mb-3">
      <div class="card card-secondary h-100">
        <div class="card-body">
          <div class="stat-card d-flex align-items-center">
            <div class="icon secondary me-3">
              <i class="fas fa-user-slash"></i>
            </div>
            <div>
              <h6 class="mb-1">Deactivated Partners</h6>
              <h4 class="mb-0">{{ $inactivePartners }}</h4>
              <small class="text-danger">
                <i class="fas fa-arrow-down"></i>
                {{ $inactivePartners > 0 ? $inactivePartners . ' inactive this month' : 'No deactivations' }}
              </small>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Last Login Activity -->
    <div class="col-md-6 col-lg-3 mb-3">
      <div class="card card-secondary h-100">
        <div class="card-body">
          <div class="stat-card d-flex align-items-center">
            <div class="icon secondary me-3">
              <i class="fas fa-clock-rotate-left"></i>
            </div>
            <div>
              <h6 class="mb-1">Last Login Activity</h6>
              <h4 class="mb-0">5 hrs ago</h4>
              <small class="text-success">Recent activity recorded</small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Partner Users Page -->
  <div id="Partner-users-page" class="page-content">
    <div class="page-header">
      <h4 class="page-title">Partner Management</h4>
      <!-- Trigger Button -->
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPartnerModal">
        <i class="fas fa-user-plus me-1"></i> Add Partner
      </button>
    </div>

    <!--Search Bar and Export/Filter-->
    <div class="card mb-3">
      <div class="card-body">
        <div class="row g-3 align-items-center">
          <!-- Search Bar -->
          <div class="col-md-8">
            <form action="{{ route('partner.index') }}" method="GET">

              <div class="input-group" style="max-width: 300px">
                <input type="text" name="search" class="form-control form-control-sm"
                  placeholder="Search by name, email, or company..." value="{{ request('search') }}" />
                <button class="btn btn-sm btn-outline-secondary" type="submit">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </form>
          </div>

          <!-- Export / Filter / Reset -->
          <div class="col-md-4">
            <div class="d-flex justify-content-end gap-2">
              <!-- Export Button -->
              <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal"
                data-bs-target="#exportPartnerModal">
                <i class="fas fa-file-export me-1"></i> Export
              </button>

              <!-- Filter Button -->
              <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                data-bs-target="#partnerFilterModal">
                <i class="fas fa-filter me-1"></i> Filter
              </button>

              <!-- Reset Filters -->
              <a href="{{ url('/admin/partner') }}" class="btn btn-outline-secondary" id="resetFilters"
                title="Reset Filters">
                <i class="fas fa-sync-alt"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>



    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-hover" id="PartnerUsersTable">
            <thead>
              <tr>
                <th>Sr.No.</th>
                <th>Date</th>
                <th>ID</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Mobile Number</th>
                <th>Email</th>
                <th>Location</th>
                <th>Country</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($partners as $index => $partner)
                <tr>
                  {{-- @dd($partner); --}}
                  <td>{{ $index + 1 }}</td>
                  <td>{{ \Carbon\Carbon::parse($partner->created_at)->format('d M Y') }}</td>
                  <td>{{ $partner->id }}</td>
                  <td>
                    <img
                      src="{{ $partner->photo ? asset('uploads/partners/' . $partner->photo) : asset('assets/globe assist logo.png') }}"
                      class="rounded-circle" width="40" height="40" alt="Partner" />
                  </td>
                  <td>{{ $partner->full_name }}</td>
                  <td>{{ $partner->mobile }}</td>
                  <td>{{ $partner->email }}</td>
                  <td>{{ $partner->location }}</td>
                  <td>{{ ucfirst($partner->country) }}</td>
                  <td>
                    @if($partner->status === 'active')
                      <span class="badge bg-success">Active</span>
                    @elseif($partner->status === 'inactive')
                      <span class="badge bg-danger">Inactive</span>
                    @else
                      <span class="badge bg-warning text-dark">Pending</span>
                    @endif
                  </td>
                  <td class="text-center">
                    <div class="dropdown">
                      <button class="btn btn-sm" type="button" data-bs-toggle="dropdown">
                        <i class="fas fa-ellipsis-v"></i>
                      </button>
                      <ul class="dropdown-menu dropdown-menu-end">

                        <li>
                          <a class="dropdown-item" href="#" 
                            data-bs-toggle="modal" 
                            data-bs-target="#timeSlotModal"

                            data-name="{{ $partner->full_name }}"
                            data-slots='@json($partner->time_slots ?? [])'>

                            <i class="fas fa-clock me-2"></i> Time Slots
                          </a>
                        </li>

                        <li>
                          <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewPartnerModal"
                            data-id="{{ $partner->id }}" data-name="{{ $partner->full_name }}"
                            data-email="{{ $partner->email }}" data-phone="{{ $partner->mobile }}"
                            data-address="{{ $partner->location }}, {{ ucfirst($partner->country) }}"
                            data-photo="{{ $partner->photo ? asset('uploads/partners/' . $partner->photo) : asset('assets/globe assist logo.png') }}"
                            data-status="{{ $partner->status }}"
                            data-doc1="{{ $partner->aadhar_card ? asset('uploads/partners/' . $partner->aadhar_card) : asset('assets/globe assist logo.png') }}"
                            data-doc2="{{ $partner->pan_card ? asset('uploads/partners/' . $partner->pan_card) : asset('assets/globe assist logo.png') }}"
                            data-doc3="{{ $partner->cv_resume ? asset('uploads/partners/' . $partner->cv_resume) : '' }}"
                            data-doc4="{{ $partner->previous_work ? asset('uploads/partners/' . $partner->previous_work) : '' }}"
                            data-description="{{ $partner->description ?? 'No description available' }}">
                            <i class="fas fa-eye me-2"></i> View
                          </a>
                        </li>


                        <li>
                          <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editPartnerModal"
                            data-id="{{ $partner->id }}" data-name="{{ $partner->full_name }}"
                            data-email="{{ $partner->email }}" data-phone="{{ $partner->mobile }}"
                            data-location="{{ $partner->location }}" data-country="{{ $partner->country }}"
                            data-status="{{ $partner->status }}"
                            data-photo="{{ $partner->photo ? asset('uploads/partners/' . $partner->photo) : asset('assets/globe assist logo.png') }}"
                            data-description="{{ $partner->description ?? '' }}">
                            <i class="fas fa-edit me-2"></i> Edit
                          </a>
                        </li>

                        <li>
                          <hr class="dropdown-divider">
                        </li>
                        <li>
                          <form action="{{ route('partner.destroy', $partner->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="dropdown-item text-danger">
                              <i class="fas fa-trash me-2"></i> Delete
                            </button>
                          </form>

                        </li>
                        </li>
                      </ul>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          <div class="d-flex justify-content-between align-items-center mt-4">
            <div class="text-muted">
              Page <strong>{{ $partners->currentPage() }}</strong> of <strong>{{ $partners->lastPage() }}</strong> —
              Showing <strong>{{ $partners->firstItem() }}–{{ $partners->lastItem() }}</strong> of
              <strong>{{ $partners->total() }}</strong> entries
            </div>
            <nav aria-label="Page navigation">
              <ul class="pagination mb-0 gap-1">
                {{-- Prev button --}}
                <li class="page-item {{ $partners->onFirstPage() ? 'disabled' : '' }}">
                  <a class="page-link px-3 rounded-pill" href="{{ $partners->previousPageUrl() ?? '#' }}">
                    <i class="bi bi-arrow-left-circle-fill me-1"></i> Prev
                  </a>
                </li>

                {{-- Page numbers --}}
                @foreach ($partners->getUrlRange(1, $partners->lastPage()) as $page => $url)
                  <li class="page-item {{ $page == $partners->currentPage() ? 'active' : '' }}">
                    <a class="page-link px-3 rounded-pill" href="{{ $url }}">{{ $page }}</a>
                  </li>
                @endforeach

                {{-- Next button --}}
                <li class="page-item {{ $partners->hasMorePages() ? '' : 'disabled' }}">
                  <a class="page-link px-3 rounded-pill" href="{{ $partners->nextPageUrl() ?? '#' }}">
                    Next <i class="bi bi-arrow-right-circle-fill ms-1"></i>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>


@endsection

<!-- Add Partner Modal -->
<div class="modal fade" id="addPartnerModal" tabindex="-1" aria-labelledby="addPartnerModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content bg-green p-3" style="color: var(--bs-modal-color);"> <!-- Custom green background -->

      <div class="modal-header border-0  rounded-3">
        <h5 class="modal-title fw-bold text-dark" id="addPartnerModalLabel">Register With Us</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form id="addPartnerForm" action="{{ route('partner.store') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label text-dark">Full Name*</label>
              <input type="text" name="full_name" value="{{ old('full_name') }}" class="form-control rounded-4"
                placeholder="Enter full name" required>
            </div>

            <div class="col-md-6">
              <label class="form-label text-dark">Mobile Number*</label>
              <input type="tel" name="mobile" value="{{ old('mobile') }}" class="form-control rounded-4"
                placeholder="Enter mobile number" required pattern="[0-9]{10}" maxlength="10">
            </div>

            <div class="col-md-6">
              <label class="form-label text-dark">Email*</label>
              <input type="email" name="email" value="{{ old('email') }}" class="form-control rounded-4"
                placeholder="Enter email" required>
            </div>

            <div class="col-md-6">
              <label class="form-label text-dark">Location / Address*</label>
              <input type="text" name="location" value="{{ old('location') }}" class="form-control rounded-4"
                placeholder="Enter city / state" required>
            </div>

            {{-- <div class="col-md-6">
              <label class="form-label text-dark">Country*</label>
              <select name="country" id="countrySelect1" class="form-select rounded-4" required>
                <option value="" disabled selected>Loading countries...</option>
              </select>
            </div> --}}
            <div class="col-md-6">
              <label class="form-label">Country*</label>
              <select name="country" id="countrySelect1" class="form-select rounded-4" required>
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
              <label class="form-label text-dark">Photo*</label>
              <input type="file" name="photo" class="form-control rounded-4" accept="image/*" required>
            </div>

            <div class="col-12">
              <h6 class="fw-semibold mt-3 text-dark">Upload Documents</h6>
            </div>

            <div class="col-md-6">
              <label class="form-label text-dark">Aadhar Card</label>
              <input type="file" name="aadhar_card" class="form-control rounded-4" accept=".pdf,.jpg,.png">
            </div>

            <div class="col-md-6">
              <label class="form-label text-dark">PAN Card</label>
              <input type="file" name="pan_card" class="form-control rounded-4" accept=".pdf,.jpg,.png">
            </div>

            <div class="col-md-6">
              <label class="form-label text-dark">CV / Resume</label>
              <input type="file" name="cv_resume" class="form-control rounded-4" accept=".pdf,.doc,.docx">
            </div>

            <div class="col-md-6">
              <label class="form-label text-dark">Previous Work</label>
              <input type="file" name="previous_work" class="form-control rounded-4" accept=".pdf,.jpg,.png,.zip">
            </div>

            <div class="col-12">
              <label class="form-label text-dark">Description</label>
              <textarea name="description" class="form-control rounded-4" rows="2"
                placeholder="Write a short description">{{ old('description') }}</textarea>
            </div>
          </div>

          <div class="modal-footer border-0 justify-content-start mt-3 rounded-3">
            <button type="submit" class="btn btn-submit rounded-4 text-white"
              style="background-color: rgb(108, 186, 12);">Submit</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>

<!-- View Partner Modal -->
<div class="modal fade" id="viewPartnerModal" tabindex="-1" aria-labelledby="viewPartnerModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header border-bottom">
        <h5 class="modal-title" id="viewPartnerModalLabel">Partner Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <!-- Top Section: Partner Photo & Basic Info -->
        <div class="d-flex align-items-center mb-4">
          <div class="me-4 text-center">
            <img id="viewPartnerPhoto" src="{{ url('./assets/globe assist logo.png') }}" class="rounded-circle border"
              width="120" height="120" alt="Partner Photo" />
          </div>
          <div class="flex-grow-1">
            <h4 id="viewPartnerName">Partner Name</h4>
            <p class="mb-1"><strong>Email:</strong> <span id="viewPartnerEmail">partner@example.com</span></p>
            <p class="mb-1"><strong>Phone:</strong> <span id="viewPartnerPhone">+91 9876543210</span></p>
            <p class="mb-0"><strong>Address:</strong> <span id="viewPartnerAddress">123, Main Street, New Delhi,
                India</span></p>
          </div>
        </div>

        <hr />

        <!-- Status -->
        <h6 class="text-uppercase text-muted mb-2">Status</h6>
        <div class="p-3 border rounded mb-3">
          <strong>Status:</strong>
          <p id="viewPartnerStatus" class="mb-0"><span class="badge bg-success">Active</span></p>
        </div>

        <!-- Documents Section -->
        <h6 class="text-uppercase text-muted mb-2">Documents</h6>

        <div class="row text-center mb-3" id="documentImageRow">
          <!-- Doc 1 -->
          <div class="col-md-3 mb-2">
            <img id="partnerDoc1" src="" class="img-fluid border rounded" alt="Document 1" />
          </div>

          <!-- Doc 2 -->
          <div class="col-md-3 mb-2">
            <img id="partnerDoc2" src="" class="img-fluid border rounded" alt="Document 2" />
          </div>

          <!-- Doc 3 (can be image or PDF) -->
          <div class="col-md-3 mb-2">
            <img id="partnerDoc3Img" src="" class="img-fluid border rounded" alt="Document 3" style="display:none;" />
            <a id="partnerDoc3Link" href="#" target="_blank" class="btn btn-primary btn-sm mt-2"
              style="display:none; width:auto; min-width:150px;">
              view Documents
            </a>
          </div>

          <!-- Doc 4 (can be image or PDF) -->
          <div class="col-md-3 mb-2">
            <img id="partnerDoc4Img" src="" class="img-fluid border rounded" alt="Document 4" style="display:none;" />
            <a id="partnerDoc4Link" href="#" target="_blank" class="btn btn-primary btn-sm mt-2"
              style="display:none; width:auto; min-width:150px;">
              view Documents
            </a>
          </div>
        </div>

        <hr />

        <!-- Description -->
        <h6 class="text-uppercase text-muted mb-2">Description</h6>
        <div class="p-3 border rounded">
          <p id="viewPartnerDescription" class="mb-0">
            This is a sample partner description message where additional information can be shown.
          </p>
        </div>
      </div>

      <div class="modal-footer border-top">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Time Slot Modal -->
<div class="modal fade" id="timeSlotModal" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header border-bottom">
        <h5 class="modal-title">
          Partner Time Slots - <span id="slotPartnerName">Rahul Sharma</span>
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">

        <!-- MONDAY -->
        <div class="mb-4">
          <h6 class="fw-bold mb-2">Monday</h6>
          <div class="d-flex flex-wrap gap-2">
            <span class="badge bg-light text-dark border px-3 py-2">10:00 AM - 12:00 PM</span>
            <span class="badge bg-light text-dark border px-3 py-2">02:00 PM - 05:00 PM</span>
          </div>
        </div>

        <!-- TUESDAY -->
        <div class="mb-4">
          <h6 class="fw-bold mb-2">Tuesday</h6>
          <div class="d-flex flex-wrap gap-2">
            <span class="badge bg-light text-dark border px-3 py-2">11:00 AM - 01:00 PM</span>
          </div>
        </div>

        <!-- WEDNESDAY -->
        <div class="mb-4">
          <h6 class="fw-bold mb-2">Wednesday</h6>
          <div class="d-flex flex-wrap gap-2">
            <span class="badge bg-light text-dark border px-3 py-2">09:00 AM - 12:00 PM</span>
            <span class="badge bg-light text-dark border px-3 py-2">03:00 PM - 06:00 PM</span>
          </div>
        </div>

        <!-- THURSDAY -->
        <div class="mb-4">
          <h6 class="fw-bold mb-2">Thursday</h6>
          <div class="d-flex flex-wrap gap-2">
            <span class="badge bg-light text-dark border px-3 py-2">10:30 AM - 02:30 PM</span>
          </div>
        </div>

        <!-- FRIDAY -->
        <div class="mb-4">
          <h6 class="fw-bold mb-2">Friday</h6>
          <div class="d-flex flex-wrap gap-2">
            <span class="badge bg-light text-dark border px-3 py-2">12:00 PM - 04:00 PM</span>
          </div>
        </div>

        <!-- WEEKEND -->
        <div class="mb-2">
          <h6 class="fw-bold mb-2">Saturday / Sunday</h6>
          <span class="text-muted">Not Available</span>
        </div>

      </div>

    </div>
  </div>
</div>

{{-- partner Details script--}}
<script>
  document.getElementById('viewPartnerModal').addEventListener('show.bs.modal', function (event) {
    var button = event.relatedTarget;

    // Get data attributes
    var name = button.getAttribute('data-name');
    var email = button.getAttribute('data-email');
    var phone = button.getAttribute('data-phone');
    var address = button.getAttribute('data-address');
    var photo = button.getAttribute('data-photo');
    var status = button.getAttribute('data-status');
    var doc1 = button.getAttribute('data-doc1');
    var doc2 = button.getAttribute('data-doc2');
    var doc3 = button.getAttribute('data-doc3');
    var doc4 = button.getAttribute('data-doc4');
    var description = button.getAttribute('data-description');

    // Fill details
    document.getElementById('viewPartnerPhoto').src = photo;
    document.getElementById('viewPartnerName').textContent = name;
    document.getElementById('viewPartnerEmail').textContent = email;
    document.getElementById('viewPartnerPhone').textContent = phone;
    document.getElementById('viewPartnerAddress').textContent = address;
    document.getElementById('viewPartnerDescription').textContent = description;

    // Status
    var statusEl = document.getElementById('viewPartnerStatus');
    if (status === 'active') statusEl.innerHTML = '<span class="badge bg-success">Active</span>';
    else if (status === 'inactive') statusEl.innerHTML = '<span class="badge bg-danger">Inactive</span>';
    else statusEl.innerHTML = '<span class="badge bg-warning text-dark">Pending</span>';

    // Document 1 & 2 (always images)
    document.getElementById('partnerDoc1').src = doc1 || '';
    document.getElementById('partnerDoc2').src = doc2 || '';

    // Document 3 (image or PDF)
    var doc3Img = document.getElementById('partnerDoc3Img');
    var doc3Link = document.getElementById('partnerDoc3Link');
    if (doc3) {
      if (doc3.toLowerCase().endsWith('.pdf')) {
        doc3Img.style.display = 'none';
        doc3Link.href = doc3;
        doc3Link.style.display = 'inline-block';
      } else {
        doc3Img.src = doc3;
        doc3Img.style.display = 'block';
        doc3Link.style.display = 'none';
      }
    } else {
      doc3Img.style.display = 'none';
      doc3Link.style.display = 'none';
    }

    // Document 4 (image or PDF)
    var doc4Img = document.getElementById('partnerDoc4Img');
    var doc4Link = document.getElementById('partnerDoc4Link');
    if (doc4) {
      if (doc4.toLowerCase().endsWith('.pdf')) {
        doc4Img.style.display = 'none';
        doc4Link.href = doc4;
        doc4Link.style.display = 'inline-block';
      } else {
        doc4Img.src = doc4;
        doc4Img.style.display = 'block';
        doc4Link.style.display = 'none';
      }
    } else {
      doc4Img.style.display = 'none';
      doc4Link.style.display = 'none';
    }
  });
</script>

<script>
  document.addEventListener("DOMContentLoaded", function () {

    const slotModal = document.getElementById('timeSlotModal');

    slotModal.addEventListener('show.bs.modal', function (event) {

        const button = event.relatedTarget;

        const name = button.getAttribute('data-name');
        const slots = JSON.parse(button.getAttribute('data-slots') || '[]');

        document.getElementById('slotPartnerName').innerText = name;

        const container = document.getElementById('slotContainer');
        const noSlots = document.getElementById('noSlots');

        container.innerHTML = '';

        if (slots.length === 0) {
            noSlots.classList.remove('d-none');
            return;
        }

        noSlots.classList.add('d-none');

        slots.forEach(slot => {

            let html = `
                <div class="col-md-4">
                    <div class="border rounded p-3 text-center">
                        <strong>${slot.day}</strong><br>
                        <span class="text-muted">${slot.start} - ${slot.end}</span>
                    </div>
                </div>
            `;

            container.innerHTML += html;
        });

    });

});
</script>




<!-- Edit Partner Modal -->
<div class="modal fade" id="editPartnerModal" tabindex="-1" aria-labelledby="editPartnerModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editPartnerModalLabel">
          Edit Partner
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form id="editPartnerForm" action="{{ route('admin.partner.update') }}" method="POST"
          enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <input type="hidden" name="id" id="editPartnerId" value="{{ $partner->id ?? '' }}" />

          <!-- Partner Photo -->
          <div class="mb-3 text-center">
            <div class="position-relative d-inline-block">
              <img id="editPartnerPhotoPreview"
                src="{{ isset($partner->photo) ? asset('uploads/partners/' . $partner->photo) : 'https://via.placeholder.com/150' }}"
                class="rounded-circle border" width="120" height="120" alt="Partner photo" />
              <label for="editPartnerPhoto"
                class="btn btn-sm btn-primary position-absolute bottom-0 end-0 rounded-circle">
                <i class="fas fa-camera"></i>
                <input type="file" id="editPartnerPhoto" name="photo" accept="image/*" class="d-none" />
              </label>
            </div>
          </div>

          <!-- Basic Info -->
          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label">Full Name*</label>
              <input type="text" class="form-control" name="full_name" value="{{ $partner->full_name ?? '' }}"
                required />
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label">Mobile Number*</label>
              <input type="tel" class="form-control" name="mobile" value="{{ $partner->mobile ?? '' }}" required />
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label">Email*</label>
              <input type="email" class="form-control" name="email" value="{{ $partner->email ?? '' }}" required />
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label">Location / Address*</label>
              <input type="text" class="form-control" name="location" value="{{ $partner->location ?? '' }}" required />
            </div>
          </div>

          <div class="row">
            {{-- <div class="col-md-6">
              <label class="form-label">Country*</label>
              <select name="country" id="countrySelect1" class="form-select rounded-4" required>
                <option value="" disabled selected>Loading countries...</option>
              </select>
            </div> --}}

            <div class="col-md-6">
              <label class="form-label">Country*</label>
              <select name="country" id="countrySelect1"  class="form-select rounded-4" required>
                <option value="" disabled >Select country</option>
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


            <div class="col-md-6 mb-3">
              <label class="form-label">Status*</label>
              <select class="form-select" name="status" required>
                <option value="active" {{ (isset($partner) && $partner->status == 'active') ? 'selected' : '' }}>Active
                </option>
                <option value="inactive" {{ (isset($partner) && $partner->status == 'inactive') ? 'selected' : '' }}>
                  Inactive</option>
                <option value="pending" {{ (isset($partner) && $partner->status == 'pending') ? 'selected' : '' }}>Pending
                </option>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12 mb-3">
              <label class="form-label">Description</label>
              <textarea class="form-control" name="description" rows="2">{{ $partner->description ?? '' }}</textarea>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Update Partner</button>
          </div>
        </form>


      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const countryValue = "{{ old('country', $partner->country ?? '') }}";
    const countrySelect = document.getElementById("countrySelect1");

    if (countryValue && countrySelect) {
        countrySelect.value = countryValue;
    }
});
</script>


<script>

  var editModal = document.getElementById('editPartnerModal');

  editModal.addEventListener('show.bs.modal', function (event) {
    var button = event.relatedTarget;

    var id = button.getAttribute('data-id');
    var name = button.getAttribute('data-name');
    var email = button.getAttribute('data-email');
    var phone = button.getAttribute('data-phone');
    var location = button.getAttribute('data-location');
    var country = button.getAttribute('data-country');
    var status = button.getAttribute('data-status');
    var photo = button.getAttribute('data-photo');
    var description = button.getAttribute('data-description');

    // Document URLs
    var docAadhar = button.getAttribute('data-doc-aadhar');
    var docPan = button.getAttribute('data-doc-pan');
    var docCV = button.getAttribute('data-doc-cv');
    var docWork = button.getAttribute('data-doc-work');

    // Populate inputs
    document.getElementById('editPartnerId').value = id;
    document.getElementById('editPartnerName').value = name;
    document.getElementById('editPartnerEmail').value = email;
    document.getElementById('editPartnerMobile').value = phone;
    document.getElementById('editPartnerLocation').value = location;
    document.getElementById('editPartnerCountry').value = country.toLowerCase();
    document.getElementById('editPartnerStatus').value = status;
    document.getElementById('editPartnerDescription').value = description;
    document.getElementById('editPartnerPhotoPreview').src = photo;

    // Populate document previews
    var aadharPreview = document.getElementById('editPartnerAadharPreview');
    aadharPreview.href = docAadhar || '#';
    aadharPreview.textContent = docAadhar ? 'View current document' : '';

    var panPreview = document.getElementById('editPartnerPanPreview');
    panPreview.href = docPan || '#';
    panPreview.textContent = docPan ? 'View current document' : '';

    var cvPreview = document.getElementById('editPartnerCVPreview');
    cvPreview.href = docCV || '#';
    cvPreview.textContent = docCV ? 'View current document' : '';

    var workPreview = document.getElementById('editPartnerWorkPreview');
    workPreview.href = docWork || '#';
    workPreview.textContent = docWork ? 'View current document' : '';
  });


</script>


<!-- Export Feedback Modal -->
<div class="modal fade" id="exportFeedbackModal" tabindex="-1" aria-labelledby="exportFeedbackModalLabel"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exportFeedbackModalLabel">
          Export Feedback
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="export-form">
          <div class="mb-3">
            <label for="exportFormat" class="form-label">Format</label>
            <select class="form-select" id="exportFormat">
              <option value="csv">CSV</option>
              <option value="excel">Excel</option>
              <option value="pdf">PDF</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="exportRange" class="form-label">Date Range</label>
            <select class="form-select" id="exportRange">
              <option value="all">All Feedback</option>
              <option value="last7">Last 7 Days</option>
              <option value="last30">Last 30 Days</option>
              <option value="custom">Custom Range</option>
            </select>
          </div>
          <div class="row mb-3" id="customDateRange" style="display: none">
            <div class="col-md-6">
              <label for="startDate" class="form-label">From</label>
              <input type="date" class="form-control" id="startDate" />
            </div>
            <div class="col-md-6">
              <label for="endDate" class="form-label">To</label>
              <input type="date" class="form-control" id="endDate" />
            </div>
          </div>
          <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" id="includeResponses" />
            <label class="form-check-label" for="includeResponses">Include our responses</label>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
          Cancel
        </button>
        <button type="button" class="btn btn-primary" id="confirmExport">
          <i class="fas fa-download me-2"></i> Export
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Export User Modal -->
<div class="modal fade" id="exportPartnerModal" tabindex="-1" aria-labelledby="exportPartnerModalLabel"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exportPartnerModalLabel">Export Partners</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('partner.export') }}" method="GET">

        <div class="modal-body">
          <div class="mb-3">
            <label for="exportFormat" class="form-label">Export Format</label>
            <select class="form-select" id="exportFormat" name="format" required>
              <option value="">Select Format</option>
              <option value="csv">CSV</option>
              <option value="excel">Excel</option>
              <option value="pdf">PDF</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="exportRange" class="form-label">Date Range</label>
            <select class="form-select" id="exportRange" name="range" required>
              <option value="all">All Records</option>
              <option value="last7">Last 7 Days</option>
              <option value="last30">Last 30 Days</option>
              <option value="custom">Custom Range</option>
            </select>
          </div>

          <div id="customDateRange" style="display: none;">
            <div class="mb-3">
              <label for="exportStartDate" class="form-label">Start Date</label>
              <input type="date" class="form-control" id="exportStartDate" name="start_date">
            </div>

            <div class="mb-3">
              <label for="exportEndDate" class="form-label">End Date</label>
              <input type="date" class="form-control" id="exportEndDate" name="end_date">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">
            <i class="fas fa-download me-1"></i> Export
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Partner Filter Modal -->
<div class="modal fade" id="partnerFilterModal" tabindex="-1" aria-labelledby="partnerFilterModalLabel"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="partnerFilterModalLabel">Filter Partners</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="{{ url('/admin/partner') }}" method="GET">
        <div class="modal-body">
          <!-- Preserve search query -->
          @if(request('search'))
            <input type="hidden" name="search" value="{{ request('search') }}">
          @endif

          <div class="mb-3">
            <label for="filterType" class="form-label">Partner Type</label>
            <select class="form-select" id="filterType" name="type">
              <option value="">All Types</option>
              <option value="Distributor" {{ request('type') == 'Distributor' ? 'selected' : '' }}>Distributor</option>
              <option value="Retailer" {{ request('type') == 'Retailer' ? 'selected' : '' }}>Retailer</option>
              <option value="Wholesaler" {{ request('type') == 'Wholesaler' ? 'selected' : '' }}>Wholesaler</option>
              <option value="Agent" {{ request('type') == 'Agent' ? 'selected' : '' }}>Agent</option>
              <option value="Other" {{ request('type') == 'Other' ? 'selected' : '' }}>Other</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="filterCountry" class="form-label">Country</label>
            <input type="text" class="form-control" id="filterCountry" name="country" value="{{ request('country') }}"
              placeholder="Enter country">
          </div>

          <div class="mb-3">
            <label for="filterLocation" class="form-label">Location</label>
            <input type="text" class="form-control" id="filterLocation" name="location"
              value="{{ request('location') }}" placeholder="Enter location">
          </div>

          <div class="mb-3">
            <label for="filterStatus" class="form-label">Status</label>
            <select class="form-select" id="filterStatus" name="status">
              <option value="">All Status</option>
              <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
              <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="filterDateFrom" class="form-label">Date From</label>
            <input type="date" class="form-control" id="filterDateFrom" name="date_from"
              value="{{ request('date_from') }}">
          </div>

          <div class="mb-3">
            <label for="filterDateTo" class="form-label">Date To</label>
            <input type="date" class="form-control" id="filterDateTo" name="date_to" value="{{ request('date_to') }}">
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Apply Filters</button>
        </div>
      </form>
    </div>
  </div>
</div>




<!--country script add new partner-->
{{--
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
</script> --}}

<!--country script edit partner-->
{{--
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
</script> --}}