<!doctype html>
<html lang="en"><head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Book Services</title>
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Fraunces:opsz,wght@9..144,600;9..144,700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  <style>
    *,*::before,*::after{box-sizing:border-box}body{margin:0;font-family:"Manrope",sans-serif;color:#18212f;background:radial-gradient(circle at top left,rgba(15,143,83,.1),transparent 26%),linear-gradient(180deg,#f8fbfd 0%,#eef3f8 100%)}
    :root{--brand:#0f8f53;--brand-dark:#08633a;--brand-soft:#eaf8f1;--ink:#18212f;--muted:#667085;--line:#dbe3ec;--surface:#fff;--surface-alt:#f4f7fb;--shadow-sm:0 10px 30px rgba(16,24,40,.06);--shadow-md:0 18px 50px rgba(16,24,40,.12);--radius-xl:28px;--radius-lg:20px;--radius-md:14px}
    .page-shell{max-width:1340px;margin:0 auto;padding:28px 24px 44px}.panel{background:rgba(255,255,255,.92);border:1px solid rgba(219,227,236,.9);border-radius:var(--radius-xl);box-shadow:var(--shadow-sm)}
    .hero{position:relative;overflow:hidden;border-radius:34px;padding:34px;color:#fff;background:linear-gradient(135deg,rgba(5,31,20,.2),rgba(5,31,20,0)),linear-gradient(135deg,#0a7b47 0%,#12945a 48%,#19a668 100%);box-shadow:var(--shadow-md)}
    .hero::before,.hero::after{content:"";position:absolute;border-radius:999px;background:rgba(255,255,255,.08)}.hero::before{width:220px;height:220px;top:-70px;right:80px}.hero::after{width:340px;height:340px;right:-120px;bottom:-180px}
    .hero-grid{position:relative;z-index:1;display:grid;grid-template-columns:minmax(0,1.45fr) minmax(300px,.8fr);gap:24px;align-items:end}.eyebrow{display:inline-flex;align-items:center;gap:8px;padding:8px 14px;border-radius:999px;background:rgba(255,255,255,.14);font-size:13px;font-weight:700}
    .hero h1{margin:18px 0 12px;max-width:700px;font-family:"Fraunces",serif;font-size:clamp(34px,4vw,34px);line-height:1.04}.hero p{margin:0;max-width:620px;color:rgba(255,255,255,.86);font-size:16px;line-height:1.75}
    .hero-stats{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:12px;margin-top:26px}.hero-stat,.hero-panel-item{padding:16px;border-radius:18px;background:rgba(255,255,255,.12);backdrop-filter:blur(8px)}.hero-stat strong{display:block;font-size:22px;font-weight:800}.hero-stat span{display:block;margin-top:4px;font-size:12px;color:rgba(255,255,255,.82)}
    .hero-panel{padding:24px;border-radius:26px;background:rgba(9,32,23,.18);border:1px solid rgba(255,255,255,.14);backdrop-filter:blur(14px)}.hero-panel-title{margin:0 0 16px;font-size:15px;font-weight:800}.hero-panel-list{display:grid;gap:12px}.hero-panel-item{display:flex;gap:12px;align-items:flex-start}.hero-panel-icon{width:42px;height:42px;display:grid;place-items:center;border-radius:14px;background:rgba(255,255,255,.14);font-size:16px}.hero-panel-item strong{display:block;font-size:14px}.hero-panel-item span{display:block;margin-top:4px;color:rgba(255,255,255,.8);font-size:12px;line-height:1.55}
    .content-grid{display:grid;grid-template-columns:minmax(0,1fr) 320px;gap:24px;margin-top:24px}.main-stack,.side-stack{display:grid;gap:22px;align-content:start}.filters,.sidebar-card,.service-card,.booking-body,.booking-head{padding:22px}.filters-top,.results-head,.service-topline,.service-bottom,.selected-service,.booking-head{display:flex;justify-content:space-between;gap:16px;flex-wrap:wrap}
    .section-title{margin:0;font-size:21px;font-weight:800}.section-subtitle{margin:6px 0 6px;color:var(--muted);font-size:14px}.trusted-note,.type-badge,.status-badge,.rating-pill{display:inline-flex;align-items:center;gap:8px;padding:10px 14px;border-radius:999px;font-size:13px;font-weight:800}
    .trusted-note{background:var(--brand-soft);color:var(--brand-dark)}.search-row{display:grid;grid-template-columns:repeat(4,minmax(0,1fr)) auto auto;gap:14px;align-items:end}.search-box,.select-box,.date-box{position:relative}.search-box i,.select-box i,.date-box i{position:absolute;left:16px;top:50%;transform:translateY(-50%);color:var(--muted);font-size:14px;pointer-events:none}.select-box .caret{left:auto;right:16px}.mmt-filter-shell{padding:24px;border-radius:30px;background:linear-gradient(180deg,#ffffff 0%,#f7fbff 100%);border:1px solid #e4ecf3;box-shadow:0 20px 50px rgba(15,23,42,.08)}.mmt-tabs{display:flex;flex-wrap:wrap;gap:10px;margin:18px 0 22px}.mmt-tab{display:inline-flex;align-items:center;gap:8px;padding:12px 16px;border-radius:999px;background:#f4f8fc;border:1px solid #dfe7ef;color:#475467;font-size:13px;font-weight:800}.mmt-tab.active{background:var(--ink);border-color:var(--ink);color:#fff}.mmt-grid{display:grid;grid-template-columns:1.4fr 1fr 1fr 1fr;gap:14px;padding:14px;border-radius:26px;background:#fff;border:1px solid #e6edf5;box-shadow:inset 0 1px 0 rgba(255,255,255,.9),0 10px 25px rgba(15,23,42,.04)}.mmt-field{position:relative;min-height:88px;padding:16px 18px 14px 52px;border-right:1px solid #edf2f7}.mmt-grid .mmt-field:last-child{border-right:none}.mmt-label{display:block;font-size:12px;font-weight:800;letter-spacing:.08em;text-transform:uppercase;color:#64748b}.mmt-value,.field,.booking-input,.booking-textarea{width:100%;font:inherit;color:var(--ink);outline:none;transition:border-color .2s,box-shadow .2s}.field{height:54px;background:#fff;border:1px solid var(--line);border-radius:16px;padding:0 16px 0 44px}.mmt-field .field{height:auto;padding:6px 0 0;border:none;background:transparent;border-radius:0;font-size:19px;font-weight:800;box-shadow:none}.mmt-field .field::placeholder{color:#98a2b3;font-weight:700}.mmt-field .field:focus,.booking-input:focus,.booking-textarea:focus{border-color:rgba(15,143,83,.55);box-shadow:0 0 0 4px rgba(15,143,83,.1)}.mmt-field select.field{padding-right:24px;appearance:none}.mmt-field i{position:absolute;left:20px;top:24px;color:var(--brand);font-size:18px}.mmt-hint{display:block;margin-top:6px;color:#667085;font-size:12px}
    .clear-btn,.btn,.close-btn{cursor:pointer;font:inherit}.clear-btn{height:54px;border:none;border-radius:16px;padding:0 20px;background:var(--ink);color:#fff;font-weight:700}.filter-actions{display:flex;justify-content:space-between;align-items:center;gap:14px;flex-wrap:wrap;margin-top:18px}.filter-cta-group,.service-actions,.booking-actions,.highlights,.chip-row{display:flex;flex-wrap:wrap;gap:10px}.filter-submit{height:54px;padding:0 24px;border:none;border-radius:16px;background:linear-gradient(135deg,#0d8c52,#14a867);color:#fff;font-size:15px;font-weight:800;box-shadow:0 14px 24px rgba(13,140,82,.18)}.filter-reset{display:inline-flex;align-items:center;justify-content:center;height:54px;padding:0 20px;border:1px solid var(--line);border-radius:16px;background:#fff;color:var(--ink);font-size:14px;font-weight:800;text-decoration:none}.chip-row{margin-top:0}.filter-chip{border:1px solid var(--line);background:#fff;color:var(--ink);border-radius:999px;padding:10px 14px;font:inherit;font-size:13px;font-weight:700;cursor:default}.filter-chip.active{border-color:var(--brand);background:var(--brand-soft);color:var(--brand-dark)}
    .results-copy{color:var(--muted);font-size:14px}.service-list,.hero-panel-list{display:grid;gap:16px}.service-card{display:grid;grid-template-columns:220px minmax(0,1fr);gap:18px}.service-card[hidden],.empty-state[hidden]{display:none}
    .service-visual{position:relative;border-radius:24px;overflow:hidden;padding:18px;display:flex;flex-direction:column;justify-content:space-between;color:#103226;background:linear-gradient(160deg,rgba(255,255,255,.22),rgba(255,255,255,0)),var(--card-bg,linear-gradient(135deg,#ddeef7,#f7fbff))}.service-badge-row{display:flex;justify-content:space-between;gap:8px;align-items:flex-start}.type-badge{background:rgba(255,255,255,.82)}.status-badge{background:rgba(13,18,28,.12);color:#fff}.status-badge.active{background:rgba(0,90,46,.72)}.status-badge.inactive{background:rgba(91,106,133,.62)}
    .service-visual-icon,.highlight-icon{width:62px;height:62px;display:grid;place-items:center;border-radius:20px;background:rgba(255,255,255,.26);backdrop-filter:blur(8px);font-size:24px}.service-visual-copy strong{display:block;font-size:19px;line-height:1.25}.service-visual-copy span{display:block;margin-top:8px;font-size:13px;line-height:1.55;color:rgba(16,50,38,.78)}
    .service-title{margin:0;font-size:22px;font-weight:800}.service-desc,.sidebar-card p,.empty-state p{margin:10px 0 0;color:var(--muted);line-height:1.75;font-size:14px}.rating-pill{background:#fff8eb;color:#9a6200;white-space:nowrap}
    .service-meta{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:12px;margin-top:18px}.meta-item{padding:14px;border-radius:18px;background:var(--surface-alt);border:1px solid #e8edf3}.meta-item small{display:flex;align-items:center;gap:8px;color:var(--muted);font-size:12px;font-weight:700}.meta-item strong{display:block;margin-top:8px;font-size:15px;line-height:1.45}
    .service-bottom{align-items:flex-end;padding-top:18px;margin-top:18px;border-top:1px solid #edf1f6}.price-note,.selected-service small{color:var(--muted);font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:.04em}.price{margin-top:6px;font-size:23px;font-weight:800;color:var(--brand-dark)}.price span{font-size:14px;color:var(--muted);font-weight:700}
    .btn{display:inline-flex;align-items:center;justify-content:center;gap:8px;height:48px;padding:0 18px;border-radius:14px;font-size:14px;font-weight:800;text-decoration:none;transition:transform .18s ease}.btn:hover{transform:translateY(-1px)}.btn-primary{border:none;color:#fff;background:linear-gradient(135deg,#0d8c52,#14a867);box-shadow:0 14px 24px rgba(13,140,82,.18)}.btn-secondary{border:1px solid var(--line);background:#fff;color:var(--ink)}
    .sidebar-card h3,.empty-state h3{margin:0;font-size:18px;font-weight:800}.highlight{display:flex;gap:12px;align-items:flex-start}.highlight-icon{width:42px;height:42px;border-radius:14px;background:var(--brand-soft);color:var(--brand-dark);font-size:16px}.highlight strong{display:block;font-size:14px}.highlight span,.summary-box span{display:block;margin-top:4px;color:var(--muted);font-size:13px;line-height:1.55}
    .summary-box{margin-top:18px;padding:16px;border-radius:18px;background:linear-gradient(135deg,#0f8f53,#13a164);color:#fff}.summary-box strong{display:block;font-size:24px}.summary-box span{color:rgba(255,255,255,.84)}.flash{margin-bottom:18px;padding:14px 16px;border-radius:18px;font-size:14px;font-weight:700}.flash-success{background:#dcfce7;color:#166534;border:1px solid #86efac}.flash-error{background:#fee2e2;color:#991b1b;border:1px solid #fecaca}
    .empty-state{padding:44px 24px;text-align:center}.empty-state i{font-size:38px;color:var(--brand)}.booking-overlay{position:fixed;inset:0;z-index:9999;display:none;align-items:center;justify-content:center;padding:20px;background:rgba(12,18,28,.7);backdrop-filter:blur(8px)}.booking-overlay.active{display:flex}.booking-modal{width:min(940px,100%);max-height:92vh;overflow:auto;background:#fff;border-radius:30px;box-shadow:0 30px 80px rgba(0,0,0,.24)}
    .booking-head{border-bottom:1px solid #edf1f6}.booking-head h2{margin:0;font-size:28px;font-weight:800}.booking-head p{margin:8px 0 0;color:var(--muted);font-size:14px}.close-btn{width:44px;height:44px;border:none;border-radius:14px;background:var(--ink);color:#fff;font-size:18px}
    .selected-service{align-items:center;padding:18px;margin-bottom:18px;border-radius:22px;background:var(--surface-alt);border:1px solid #e8edf3}.selected-service strong{display:block;margin-top:6px;font-size:18px}.booking-grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:16px}.booking-field.full{grid-column:1/-1}.booking-label{display:block;margin-bottom:8px;font-size:13px;font-weight:800}.booking-input{height:52px;padding:0 16px}.booking-textarea{min-height:130px;padding:14px 16px;resize:vertical}.booking-actions{justify-content:flex-end;margin-top:22px}
    @media (max-width:1100px){.content-grid,.hero-grid,.mmt-grid{grid-template-columns:1fr}}@media (max-width:860px){.service-card,.search-row,.service-meta,.booking-grid,.hero-stats{grid-template-columns:1fr}.mmt-field{border-right:none;border-bottom:1px solid #edf2f7;padding-left:46px}.mmt-grid .mmt-field:last-child{border-bottom:none}}@media (max-width:640px){.page-shell{padding:18px 14px 32px}.hero,.filters,.sidebar-card,.service-card,.booking-body,.booking-head{padding-left:16px;padding-right:16px}.hero{padding-top:24px;padding-bottom:24px;border-radius:28px}.section-title,.service-title{font-size:18px}.price{font-size:26px}.mmt-filter-shell,.mmt-grid{padding:14px}.filter-cta-group,.filter-actions{width:100%}.filter-submit,.filter-reset{width:100%}}
  </style>
 <style>
.page-alert-wrapper{
    position: fixed;
    top: 20px;
    right: 20px;
    z-index: 9999;
}

.page-alert{
    width: 380px;
    padding: 16px 18px;
    border-radius: 12px;
    color: #fff;
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 12px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.18);
    animation: slideInRight .4s ease;
    margin-bottom: 10px;
}

.page-alert i{
    font-size: 20px;
}

.page-alert span{
    flex: 1;
    font-size: 15px;
}

.page-alert button{
    background: transparent;
    border: none;
    color: #fff;
    font-size: 20px;
    cursor: pointer;
}

.success-alert{
    background: linear-gradient(135deg,#16a34a,#22c55e);
}

.error-alert{
    background: linear-gradient(135deg,#dc2626,#ef4444);
}

@keyframes slideInRight{
    from{
        opacity:0;
        transform:translateX(100%);
    }
    to{
        opacity:1;
        transform:translateX(0);
    }
}
</style>
<style>
@media(max-width:500px){
    .page-alert-wrapper{
        right:10px;
        left:10px;
    }

    .page-alert{
        width:100%;
    }
}
</style>
</head>
<body>
  @php
    $user = auth('user')->user();
    $serviceCount = $services->count();
    $activeSort = request('sort', 'latest');
  @endphp

  <!-- Global Alert Message -->
<div class="page-alert-wrapper">

    @if(session('success'))
        <div class="page-alert success-alert" id="flashMessage">
            <i class="fas fa-check-circle"></i>
            <span>{{ session('success') }}</span>
            <button onclick="closeFlashMessage()">×</button>
        </div>
    @endif

    @if(session('error'))
        <div class="page-alert error-alert" id="flashMessage">
            <i class="fas fa-times-circle"></i>
            <span>{{ session('error') }}</span>
            <button onclick="closeFlashMessage()">×</button>
        </div>
    @endif

</div>

    {{-- <section style="margin:25px" class="hero">
      <div class="hero-grid">
        <div>
          <span class="eyebrow"><i class="fas fa-shield-heart"></i> Verified service booking experience</span>
          <h1>Book trusted travel and support services with a premium booking flow.</h1>
          <p>Aapke users ko ab ek polished marketplace feel milega jahan service compare, trust signals dekhkar decision lena, aur direct booking submit karna easy ho.</p>
          <div class="hero-stats">
            <div class="hero-stat"><strong>{{ $serviceCount }}</strong><span>Active service options</span></div>
            <div class="hero-stat"><strong>4.8/5</strong><span>Average partner satisfaction</span></div>
            <div class="hero-stat"><strong>24x7</strong><span>Support and request handling</span></div>
          </div>
        </div>
        <div class="hero-panel">
          <h2 class="hero-panel-title">Why this layout feels more professional</h2>
          <div class="hero-panel-list">
            <div class="hero-panel-item"><div class="hero-panel-icon"><i class="fas fa-magnifying-glass"></i></div><div><strong>Quick service discovery</strong><span>Search, category filters, and status filters all in one clean header.</span></div></div>
            <div class="hero-panel-item"><div class="hero-panel-icon"><i class="fas fa-badge-check"></i></div><div><strong>Trust-building details</strong><span>Ratings, availability, location, and verified styling make decisions easier.</span></div></div>
            <div class="hero-panel-item"><div class="hero-panel-icon"><i class="fas fa-calendar-check"></i></div><div><strong>Smooth booking modal</strong><span>Users can submit service requests without leaving the listing experience.</span></div></div>
          </div>
        </div>
      </div>
    </section> --}}

    <div class="content-grid">
      <div class="main-stack">
        <section style="margin:25px" class="panel filters mmt-filter-shell">
          <div class="filters-top">
            <div>
              <h2 class="section-title">Find the right service partner</h2>
              <p class="section-subtitle">MakeMyTrip-style discovery bar with backend-powered filtering and cleaner results.</p>
            </div>
            <div class="trusted-note"><i class="fas fa-circle-check"></i> Handpicked and verified listings</div>
          </div>

          <div class="mmt-tabs">
            <span class="mmt-tab active"><i class="fas fa-briefcase"></i> Services</span>
            <span class="mmt-tab"><i class="fas fa-location-dot"></i> Verified Locations</span>
            <span class="mmt-tab"><i class="fas fa-calendar-days"></i> Scheduled Availability</span>
          </div>

          <form method="GET" action="{{ route('user.services') }}">
            <div class="mmt-grid">
              <div class="mmt-field">
                <i class="fas fa-search"></i>
                <label class="mmt-label" for="search">Search</label>
                <input
                  type="text"
                  id="search"
                  name="search"
                  class="field"
                  value="{{ request('search') }}"
                  placeholder="Service, partner, location"
                />
                <span class="mmt-hint">Title, category, location, description</span>
              </div>

              <div class="mmt-field">
                <i class="fas fa-layer-group"></i>
                <label class="mmt-label" for="category">Category</label>
                <select id="category" name="category" class="field">
                  <option value="all">All Categories</option>
                  @foreach(($filterOptions['categories'] ?? collect()) as $category)
                    <option value="{{ $category }}" {{ request('category') === $category ? 'selected' : '' }}>
                      {{ $category }}
                    </option>
                  @endforeach
                </select>
                <span class="mmt-hint">Choose your required service type</span>
              </div>

              <div class="mmt-field">
                <i class="fas fa-location-dot"></i>
                <label class="mmt-label" for="location_filter">Location</label>
                <select id="location_filter" name="location" class="field">
                  <option value="all">All Locations</option>
                  @foreach(($filterOptions['locations'] ?? collect()) as $location)
                    <option value="{{ $location }}" {{ request('location') === $location ? 'selected' : '' }}>
                      {{ $location }}
                    </option>
                  @endforeach
                </select>
                <span class="mmt-hint">Filter by available city or destination</span>
              </div>

              <div class="mmt-field">
                <i class="fas fa-calendar-days"></i>
                <label class="mmt-label" for="service_date_filter">Service Date</label>
                <input
                  type="date"
                  id="service_date_filter"
                  name="service_date"
                  class="field"
                  value="{{ request('service_date') }}"
                />
                <span class="mmt-hint">See listings available on your date</span>
              </div>
            </div>

            <div class="filter-actions">
              <div class="chip-row">
                <span class="filter-chip {{ $activeSort === 'latest' ? 'active' : '' }}">Newest First</span>
                <span class="filter-chip {{ $activeSort === 'price_low' ? 'active' : '' }}">Lowest Price</span>
                <span class="filter-chip {{ $activeSort === 'service_date' ? 'active' : '' }}">Upcoming Date</span>
              </div>

              <div class="filter-cta-group">
                <div class="select-box">
                  <i class="fas fa-arrow-down-wide-short"></i>
                  <select id="sort" name="sort" class="field">
                    <option value="latest" {{ $activeSort === 'latest' ? 'selected' : '' }}>Newest First</option>
                    <option value="price_low" {{ $activeSort === 'price_low' ? 'selected' : '' }}>Price: Low to High</option>
                    <option value="price_high" {{ $activeSort === 'price_high' ? 'selected' : '' }}>Price: High to Low</option>
                    <option value="service_date" {{ $activeSort === 'service_date' ? 'selected' : '' }}>Upcoming Service Date</option>
                  </select>
                  <i class="fas fa-chevron-down caret"></i>
                </div>
                <button type="submit" class="filter-submit">Search Services</button>
                <a href="{{ route('user.services') }}" class="filter-reset">Reset</a>
              </div>
            </div>
          </form>
        </section>

        <section>
          <div class="results-head">
            <div>
              <h2 style="margin-left:25px"class="section-title">Available Services</h2>
              <p style="margin-left:25px" class="results-copy">
                Showing {{ $serviceCount }} service{{ $serviceCount === 1 ? '' : 's' }}
                @if(request()->filled('search') || request()->filled('category') || request()->filled('location') || request()->filled('service_date'))
                  for your selected filters
                @else
                  across active verified listings
                @endif
              </p>
            </div>
          </div>
          <div class="service-list" id="serviceList">
             @foreach($services as $service)
              @php
                $categoryKey = \Illuminate\Support\Str::slug($service->category ?? 'service');
                $statusKey = strtolower((string) $service->status) === 'active' ? 'active' : 'inactive';
                $partnerCount = optional($service->service)->partnerServices ? $service->service->partnerServices->count() : 0;
                $serviceTitle = $service->title ?: $service->category;
                $categoryMap = [
                  'telecaller' => ['icon' => 'fa-headset', 'bg' => 'linear-gradient(135deg, #ddf7ec, #bfe9d3)'],
                  'tour-manager' => ['icon' => 'fa-route', 'bg' => 'linear-gradient(135deg, #e1efff, #c9dbff)'],
                  'ground-operator' => ['icon' => 'fa-map-location-dot', 'bg' => 'linear-gradient(135deg, #f5e8ff, #e3d1fb)'],
                  'content-creator' => ['icon' => 'fa-camera-retro', 'bg' => 'linear-gradient(135deg, #ffefd9, #ffd8a8)'],
                  'visa' => ['icon' => 'fa-passport', 'bg' => 'linear-gradient(135deg, #fff6c9, #ffe39b)'],
                ];
                $visualConfig = $categoryMap[$categoryKey] ?? ['icon' => 'fa-briefcase', 'bg' => 'linear-gradient(135deg, #ddebf5, #c9dcea)'];
                $description = $service->description ?: 'Professional support customised to your travel and business requirements.';
                $categoryValue = strtolower((string) ($service->category ?? ''));
              @endphp

              <article style="margin:25px" class="panel service-card" data-status="{{ $statusKey }}" data-category="{{ $categoryValue }}">
                <div class="service-visual" style="--card-bg: {{ $visualConfig['bg'] }}">
                  <div class="service-badge-row">
                    <span class="type-badge"><i class="fas {{ $visualConfig['icon'] }}"></i> {{ $service->category }}</span>
                    <span class="status-badge {{ $statusKey }}">{{ ucfirst($statusKey) }}</span>
                  </div>
                  <div class="service-visual-icon"><i class="fas {{ $visualConfig['icon'] }}"></i></div>
                  <div class="service-visual-copy">
                    <strong>{{ $serviceTitle }}</strong>
                    <span>Premium presentation with service-first booking flow that feels closer to MakeMyTrip and modern travel marketplaces.</span>
                  </div>
                </div>

                <div class="service-body">
                  <div class="service-topline">
                    <div>
                      <h3 class="service-title">{{ $serviceTitle }}</h3>
                      <p class="service-desc">{{ $description }}</p>
                    </div>
                    <div class="rating-pill"><i class="fas fa-star"></i> 4.8 Verified</div>
                  </div>

                  <div class="service-meta">
                    <div class="meta-item">
                      <small><i class="fas fa-location-dot"></i> Service Location</small>
                      <strong>{{ $service->location ?: 'Location shared after booking' }}</strong>
                    </div>
                    <div class="meta-item">
                      <small><i class="fas fa-users"></i> Partners Available</small>
                      <strong>{{ $partnerCount }} partner{{ $partnerCount === 1 ? '' : 's' }} mapped</strong>
                    </div>
                      <div class="meta-item">
        <small><i class="fas fa-calendar-days"></i>Availability Service Date</small>
        <strong>
            {{ $service->service_date 
                ? \Carbon\Carbon::parse($service->service_date)->format('d M Y') 
                : 'Date on request' }}
        </strong>
    </div>
                
                  </div>

                  <div class="service-bottom">
                    <div>
                      <div class="price-note">Starting price</div>
                      <div class="price">Rs. {{ number_format((float) $service->price) }} <span>/ {{ strtolower($service->availability ?: 'booking') }}</span></div>
                    </div>
                    <div class="service-actions">
                      <button type="button" class="btn btn-secondary" >
                        <i class="fas fa-circle-info"></i> View & Book
                      </button>
                      <button type="button" class="btn btn-primary" onclick="openBookingModal({{ (int) $service->id }}, {{ (int) $service->partner_id }}, @js($serviceTitle), @js($service->category), @js($service->price), @js($service->availability ?: 'Flexible schedule'))">
                        <i class="fas fa-calendar-check"></i> Book Now
                      </button>
                    </div>
                  </div>
                </div>
              </article>
            @endforeach
          </div>

          <div class="panel empty-state" id="emptyState" hidden>
            <i class="fas fa-compass"></i>
            <h3>No matching services found</h3>
            <p>Try changing the search text or reset your filters to view more options.</p>
          </div>
        </section>
      </div>

      <aside class="side-stack">
        <section style="margin:25px" class="panel sidebar-card">
          <h3>Booking Confidence</h3>
          <p>Right-side information blocks page ko marketplace jaisa professional trust layer dete hain.</p>
          <div class="highlights">
            <div class="highlight"><div class="highlight-icon"><i class="fas fa-user-shield"></i></div><div><strong>Verified listing style</strong><span>Each card shows status, category, pricing, and trust-focused details.</span></div></div>
            <div class="highlight"><div class="highlight-icon"><i class="fas fa-bolt"></i></div><div><strong>Fast request flow</strong><span>Users can fill booking date, time, contact info, and requirements in one modal.</span></div></div>
            <div class="highlight"><div class="highlight-icon"><i class="fas fa-headset"></i></div><div><strong>Professional support feel</strong><span>Layout is structured like a service marketplace instead of a plain dashboard list.</span></div></div>
          </div>
          <div class="summary-box"><strong>{{ $serviceCount }}</strong><span>live services ready to be explored and booked</span></div>
        </section>

        <section style="margin:25px"class="panel sidebar-card">
          <h3>How users will book</h3>
          <p>Discovery se booking tak flow ko friction-free banaya gaya hai.</p>
          <div class="highlights">
            <div class="highlight"><div class="highlight-icon"><i class="fas fa-1"></i></div><div><strong>Compare listings</strong><span>Users search and shortlist by category, availability, and location.</span></div></div>
            <div class="highlight"><div class="highlight-icon"><i class="fas fa-2"></i></div><div><strong>Open booking modal</strong><span>Selected service details stay visible while the request form opens instantly.</span></div></div>
            <div class="highlight"><div class="highlight-icon"><i class="fas fa-3"></i></div><div><strong>Submit request</strong><span>Booking posts directly to your existing `user.book-service` route.</span></div></div>
          </div>
        </section>
      </aside>
    </div>
  </div>

  <div class="booking-overlay" id="bookingOverlay" aria-hidden="true">
    <div class="booking-modal">
      <div class="booking-head">
        <div>
          <h2>Complete your booking request</h2>
          <p>Share trip details and our team will process the request for the selected service.</p>
        </div>
        <button type="button" class="close-btn" onclick="closeBookingModal()"><i class="fas fa-times"></i></button>
      </div>

      <div class="booking-body">
        <div class="selected-service">
          <div>
            <small>Selected Service</small>
            <strong id="selectedServiceName">Service not selected</strong>
            <div class="section-subtitle" id="selectedServiceCategory">Choose a listing to continue</div>
          </div>
          <div>
            <small>Pricing Snapshot</small>
            <strong id="selectedServicePrice">Rs. 0</strong>
            <div class="section-subtitle" id="selectedServiceAvailability">Flexible schedule</div>
          </div>
        </div>

        <form method="POST" action="{{ route('user.book-service') }}">
          @csrf
          <input type="hidden" name="service_id" id="service_id" />
            <input type="hidden" name="partner_id" id="partner_id" />
             <input type="hidden" name="service_name" id="service_name" />
               <input type="hidden" name="budget" id="budget" />




          <div class="booking-grid">
            <div class="booking-field">
              <label class="booking-label" for="name">Full Name</label>
              <input class="booking-input" type="text" id="name" name="name" value="{{ old('name', $user->name ?? '') }}" required />
            </div>
            <div class="booking-field">
              <label class="booking-label" for="phone">Phone Number</label>
              <input class="booking-input" type="text" id="phone" name="phone" value="{{ old('phone', $user->phone ?? $user->mobile ?? '') }}" required />
            </div>
            <div class="booking-field">
              <label class="booking-label" for="email">Email Address</label>
              <input class="booking-input" type="email" id="email" name="email" value="{{ old('email', $user->email ?? '') }}" />
            </div>
            <div class="booking-field">
              <label class="booking-label" for="location">Service Location</label>
              <input class="booking-input" type="text" id="location" name="location" value="{{ old('location') }}" placeholder="Enter city or destination" required />
            </div>
            <div class="booking-field">
              <label class="booking-label" for="booking_date">Booking Date</label>
              <input class="booking-input" type="date" id="booking_date" name="booking_date" value="{{ old('booking_date') }}" required />
            </div>
            <div class="booking-field">
              <label class="booking-label" for="start_time">Start Time</label>
              <input class="booking-input" type="time" id="start_time" name="start_time" value="{{ old('start_time') }}" required />
            </div>
            <div class="booking-field">
              <label class="booking-label" for="end_time">End Time</label>
              <input class="booking-input" type="time" id="end_time" name="end_time" value="{{ old('end_time') }}" required />
            </div>
            <div class="booking-field full">
              <label class="booking-label" for="requirements">Special Requirements</label>
              <textarea class="booking-textarea" id="requirements" name="requirements" placeholder="Tell us about guest count, trip purpose, language preference, or any custom need">{{ old('requirements') }}</textarea>
            </div>
          </div>

          <div class="booking-actions">
            <button type="button" class="btn btn-secondary" onclick="closeBookingModal()">Cancel</button>
            <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Submit Booking</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    const bookingOverlay = document.getElementById("bookingOverlay");

    function openBookingModal(serviceId, partnerId, title, category, price, availability) {
      document.getElementById("service_id").value = serviceId;
      document.getElementById("partner_id").value = partnerId;
            document.getElementById("service_name").value = category;
    document.getElementById("budget").value = Number(price || 0);

      document.getElementById("selectedServiceName").textContent = title;
      document.getElementById("selectedServicePrice").textContent = `Rs. ${Number(price || 0).toLocaleString()}`;
      document.getElementById("selectedServiceAvailability").textContent = availability;
      bookingOverlay.classList.add("active");
      document.body.style.overflow = "hidden";
    }

    function closeBookingModal() {
      bookingOverlay.classList.remove("active");
      document.body.style.overflow = "";
    }

    bookingOverlay.addEventListener("click", (event) => {
      if (event.target === bookingOverlay) closeBookingModal();
    });

    document.addEventListener("keydown", (event) => {
      if (event.key === "Escape") closeBookingModal();
    });

    @if($errors->any())
      bookingOverlay.classList.add("active");
      document.body.style.overflow = "hidden";
    @endif

    const flashMessage = document.getElementById("flashMessage");
    if (flashMessage) {
      setTimeout(() => {
        flashMessage.style.transition = "opacity 0.4s ease";
        flashMessage.style.opacity = "0";
      setTimeout(() => flashMessage.remove(), 400);
      }, 3200);
    }
  </script>
  <script>
function closeFlashMessage(){
    let msg = document.getElementById('flashMessage');
    if(msg){
        msg.style.display = 'none';
    }
}

setTimeout(() => {
    closeFlashMessage();
}, 5000);
</script>
</body>
</html>
  
