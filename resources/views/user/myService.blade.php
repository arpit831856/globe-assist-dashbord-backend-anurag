<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Services | Globe Assist</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --blue: #0383c2; --green: #6cba0c;
            --muted: #6b7280; --shadow: rgba(0,0,0,.12);
            --wrap: 1200px; --pad: clamp(12px,2.2vw,22px);
        }
        * { margin:0; padding:0; box-sizing:border-box; font-family:Poppins,sans-serif; }
        body { background:#f4f6f9; }

        /* ===== NAVBAR ===== */
        .navbar {
            position:sticky; top:0; width:100%;
            background:#fff; box-shadow:0 2px 8px rgba(0,0,0,0.08);
            z-index:1000; padding:12px 0;
        }
        .navbar-logo { height:45px; width:auto; }
        @media(min-width:1200px){ .navbar-logo{ height:50px; } }
        @media(max-width:991px) { .navbar-logo{ height:40px; } }
        @media(max-width:576px) { .navbar-logo{ height:35px; } }

        .navbar .nav-link { color:#444; font-size:15px; font-weight:500; padding:6px 4px; transition:color 0.2s; }
        .navbar .nav-link:hover  { color:#148a3a !important; }
        .navbar .nav-link.active { color:#6cba0c !important; font-weight:600; }

        .profile-wrapper { position:relative; display:inline-block; }
        .profile-img {
            height:40px; width:40px; object-fit:cover;
            border-radius:50%; cursor:pointer;
            transition:all 0.3s; border:2px solid transparent;
        }
        .profile-img:hover { border-color:#1fa84f; transform:scale(1.05); }

        .profile-dropdown {
            position:absolute; top:calc(100% + 12px); right:0;
            width:220px; background:#fff; border-radius:12px;
            box-shadow:0 8px 28px rgba(0,0,0,0.13); z-index:9999;
            overflow:hidden; opacity:0; visibility:hidden;
            transform:translateY(-8px);
            transition:opacity 0.22s ease,transform 0.22s ease,visibility 0.22s;
            pointer-events:none;
        }
        .profile-dropdown::before {
            content:''; position:absolute; top:-6px; right:14px;
            width:12px; height:12px; background:#f9fdf6;
            transform:rotate(45deg); border-radius:2px;
        }
        .profile-dropdown.open { opacity:1; visibility:visible; transform:translateY(0); pointer-events:auto; }

        .dropdown-header {
            display:flex; align-items:center; gap:10px;
            padding:14px 16px; background:#f9fdf6; border-bottom:1px solid #eee;
        }
        .dropdown-header img { width:40px; height:40px; border-radius:50%; object-fit:cover; border:2px solid #1fa84f; flex-shrink:0; }
        .dropdown-header .d-name  { font-weight:700; font-size:14px; color:#222; line-height:1.2; }
        .dropdown-header .d-phone { font-size:12px; color:#888; margin-top:2px; }

        .dropdown-link {
            display:flex; align-items:center; gap:12px;
            padding:11px 16px; color:#333; font-size:14px;
            text-decoration:none;
            transition:background 0.15s,color 0.15s,padding-left 0.15s;
        }
        .dropdown-link i { font-size:14px; color:#1fa84f; width:16px; text-align:center; }
        .dropdown-link:hover { background:#f4fbf5; color:#1fa84f; padding-left:20px; }
        .dropdown-link.logout { border-top:1px solid #eee; color:#e53935; }
        .dropdown-link.logout i { color:#e53935; }
        .dropdown-link.logout:hover { background:#fff5f5; color:#c62828; padding-left:20px; }

        @media(max-width:991px){
            .navbar .container-fluid { position:relative; }
            .navbar-brand { position:absolute; left:50%; transform:translateX(-50%); margin:0; }
            .navbar .ms-auto { position:relative; z-index:2; }
            .navbar-toggler { position:relative; z-index:2; border:none; box-shadow:none; background:none !important; }
            .navbar-toggler i { font-size:24px; color:#333; }
        }
        .offcanvas { background:#fff; }
        .offcanvas-header { border-bottom:1px solid #f0f0f0; padding:20px; }
        .offcanvas-title { font-weight:700; font-size:18px; color:#333; }

        /* ===== PAGE CONTENT ===== */
        .wrapper { max-width:var(--wrap); margin:30px auto; padding:0 var(--pad); }

        .page-header {
            background:linear-gradient(135deg,var(--blue),var(--green));
            color:#fff; padding:2rem; border-radius:18px;
            margin-bottom:22px; box-shadow:0 10px 28px var(--shadow);
        }
        .page-header h1 { font-size:26px; font-weight:600; margin:0; }
        .page-header p  { opacity:.9; margin:6px 0 0; }

        .services-grid {
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(380px,1fr));
            gap:20px; margin-top:20px;
        }

        .service-card {
            background:#fff; border-radius:18px; padding:2rem;
            display:flex; align-items:center; gap:.6rem;
            box-shadow:0 10px 28px var(--shadow); transition:.25s ease;
            border:1px solid rgba(0,0,0,.05);
        }
        .service-card:hover { transform:translateY(-3px); box-shadow:0 16px 40px rgba(0,0,0,.18); }

        .service-media {
            width:92px; height:92px; border-radius:16px; overflow:hidden;
            flex:0 0 92px; position:relative;
            box-shadow:0 10px 18px rgba(0,0,0,.12); background:#e9eef5;
        }
        .service-media img { width:100%; height:100%; object-fit:cover; display:block; transform:scale(1.02); }

        .service-info { display:flex; flex-direction:column; gap:2px; flex:1; min-width:220px; }
        .service-info strong {
            font-size:16px; color:#111827; font-weight:600;
            display:flex; align-items:center; gap:8px; line-height:1.3; margin-bottom:2px;
        }

        .service-status {
            min-width:auto !important; padding:4px 10px !important;
            border-radius:8px !important; font-size:11px !important;
            font-weight:700; text-align:center; letter-spacing:.3px;
            white-space:nowrap; flex-shrink:0;
        }
        .completed { color:#2563eb; }
        .active    { color:#16a34a; }
        .expired   { color:#dc2626; }

        .service-info small { display:block; color:var(--muted); font-size:13px; line-height:1.25; margin-top:1px !important; }
        .service-info small:first-of-type { font-size:14px; font-weight:500; margin-top:0; }

        .actions { display:flex; gap:10px; align-items:center; }

        .btn-view {
            padding:10px 20px; border-radius:999px; font-weight:600;
            color:#fff; text-decoration:none; display:inline-flex; align-items:center; gap:8px;
            background:linear-gradient(135deg,var(--blue),var(--green));
            transition:.2s ease; border:1px solid rgba(0,0,0,.06); white-space:nowrap;
        }
        .btn-view:hover { transform:scale(1.03); color:#fff; }

        @media(max-width:992px){
            .wrapper { margin:30px 0; }
            .services-grid { grid-template-columns:1fr; gap:16px; }
            .service-card { flex-wrap:nowrap; }
            .page-header h1 { font-size:1rem; }
            .page-header { font-size:.9rem; }
            .service-info strong { font-size:.8rem; }
            .service-info small:first-of-type { font-size:.7rem; }
            .service-info small, .btn-view { font-size:.7rem !important; }
            .completed { font-size:.5rem !important; }
        }

        @media(max-width:576px){
            .services-grid { grid-template-columns:1fr; }
            .service-card { width:100%; flex-direction:column; align-items:flex-start; padding:1.2rem; }
            .service-media { width:100%; height:180px; flex:none; margin-bottom:10px; }
            .service-media img { width:100%; height:100%; object-fit:cover; }
            .service-info { width:100%; }
            .actions { width:100%; justify-content:center; margin-top:10px; }
            .btn-view { width:auto; font-size:.75rem; padding:8px 16px; }
        }
    </style>
</head>
<body>

<!-- ===== NAVBAR ===== -->
<nav class="navbar navbar-expand-lg">
  <div class="container-fluid px-4">

    <button class="navbar-toggler d-lg-none" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar">
      <i class="bi bi-list"></i>
    </button>

    <a class="navbar-brand" href="#">
      <img src="aasets/image/logo.png" alt="Globe Assist" class="navbar-logo"
           onerror="this.outerHTML='<span style=\'font-family:Poppins;font-size:20px;font-weight:700;color:#148a3a\'>Globe Assist</span>'">
    </a>

    <div class="collapse navbar-collapse d-none d-lg-flex">
      <ul class="navbar-nav mx-auto gap-4">
        <li class="nav-item"><a class="nav-link" href="userProfile.html">Profile</a></li>
        <li class="nav-item"><a class="nav-link active" href="myService.html">My Service</a></li>
        <li class="nav-item"><a class="nav-link" href="needHelp.html">Need Help</a></li>
      </ul>
    </div>

    <div class="d-flex align-items-center gap-3 ms-auto">
      <div class="profile-wrapper" id="profileWrapper">
        <img src="https://globeassist.in/assets/unsplash_ig.png" class="profile-img" id="profileBtn" alt="Profile">
        <div class="profile-dropdown" id="profileDropdown">
          <div class="dropdown-header">
            <img src="https://globeassist.in/assets/unsplash_ig.png" alt="Profile">
            <div>
              <div class="d-name">Rahul Kumar</div>
              <div class="d-phone">+91 9876543210</div>
            </div>
          </div>
          <a href="userProfile.html" class="dropdown-link"><i class="fas fa-user"></i> Profile Details</a>
          <a href="myService.html"   class="dropdown-link"><i class="fas fa-cogs"></i> My Services</a>
          <a href="needHelp.html"    class="dropdown-link"><i class="fas fa-life-ring"></i> Need Help</a>
          <a href="index.html"       class="dropdown-link logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
      </div>
    </div>
  </div>
</nav>

<!-- Mobile Offcanvas -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title">Menu</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
  </div>
  <div class="offcanvas-body">
    <ul class="navbar-nav">
      <li class="nav-item"><a class="nav-link" href="userProfile.html">Profile</a></li>
      <li class="nav-item"><a class="nav-link active" href="myService.html">My Service</a></li>
      <li class="nav-item"><a class="nav-link" href="needHelp.html">Need Help</a></li>
    </ul>
  </div>
</div>

<!-- ===== PAGE CONTENT ===== -->
<div class="wrapper">
    <div class="page-header">
        <h1>My Services</h1>
        <p>All services you have used so far</p>
    </div>

    <div class="services-grid">

        <!-- CARD 1: Travel -->
        <div class="service-card">
            <div class="service-media">
                <img src="aasets/image/travellAgency.png" alt="Travel service" loading="lazy">
            </div>
            <div class="service-info">
                <div class="d-flex align-items-center">
                    <strong>Travel Agencies</strong>
                    <div class="service-status completed">COMPLETED</div>
                </div>
                <small>Group Tours, FIT, Luxury Operators</small>
                <small>Service ID: ORD-1001</small>
                <small>15 Dec 2023 → 20 Dec 2023</small>
            </div>
            <div class="actions">
                <a href="viewService.html" class="btn-view"><i class="fa-regular fa-eye"></i> View</a>
            </div>
        </div>

        <!-- CARD 2: Events -->
        <div class="service-card">
            <div class="service-media">
                <img src="aasets/image/eventCom.png" alt="Event service" loading="lazy">
            </div>
            <div class="service-info">
                <div class="d-flex align-items-center">
                    <strong>Event Companies</strong>
                    <div class="service-status active">ACTIVE</div>
                </div>
                <small>Corporate Events, MICE, Brand Activations</small>
                <small>Service ID: ORD-1002</small>
                <small>15 Dec 2023 → 20 Dec 2023</small>
            </div>
            <div class="actions">
                <a href="viewService.html" class="btn-view"><i class="fa-regular fa-eye"></i> View</a>
            </div>
        </div>

        <!-- CARD 3: Wedding -->
        <div class="service-card">
            <div class="service-media">
                <img src="aasets/image/wedding.png" alt="Wedding service" loading="lazy">
            </div>
            <div class="service-info">
                <div class="d-flex align-items-center">
                    <strong>Wedding Planners</strong>
                    <div class="service-status expired">EXPIRED</div>
                </div>
                <small>Destination Weddings, Guest Management</small>
                <small>Service ID: ORD-1003</small>
                <small>15 Dec 2023 → 20 Dec 2023</small>
            </div>
            <div class="actions">
                <a href="viewService.html" class="btn-view"><i class="fa-regular fa-eye"></i> View</a>
            </div>
        </div>

        <!-- CARD 4: Wedding -->
        <div class="service-card">
            <div class="service-media">
                <img src="aasets/image/wedding.png" alt="Wedding service" loading="lazy">
            </div>
            <div class="service-info">
                <div class="d-flex align-items-center">
                    <strong>Wedding Planners</strong>
                    <div class="service-status expired">EXPIRED</div>
                </div>
                <small>Destination Weddings, Guest Management</small>
                <small>Service ID: ORD-1003</small>
                <small>15 Dec 2023 → 20 Dec 2023</small>
            </div>
            <div class="actions">
                <a href="viewService.html" class="btn-view"><i class="fa-regular fa-eye"></i> View</a>
            </div>
        </div>

    </div>
</div>

<script>
// ── PROFILE DROPDOWN ──
const profileBtn      = document.getElementById('profileBtn');
const profileDropdown = document.getElementById('profileDropdown');
const profileWrapper  = document.getElementById('profileWrapper');
profileBtn.addEventListener('click', e => { e.stopPropagation(); profileDropdown.classList.toggle('open'); });
document.addEventListener('click', e => { if (!profileWrapper.contains(e.target)) profileDropdown.classList.remove('open'); });
</script>
</body>
</html>
