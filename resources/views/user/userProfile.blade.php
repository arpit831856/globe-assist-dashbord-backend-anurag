<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Profile | Globe Assist</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/css/intlTelInput.css">

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Poppins', sans-serif; background: #f4f5f7; }

        :root {
            --blue: #0383c2;
            --green: #6cba0c;
        }

        /* ===== GLOBE ASSIST NAVBAR ===== */
        .navbar {
            position: sticky; top: 0; width: 100%;
            background: #fff;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            z-index: 1000; padding: 12px 0;
        }
        .navbar-logo { height: 45px; width: auto; }
        @media (min-width: 1200px) { .navbar-logo { height: 50px; } }
        @media (max-width: 991px)  { .navbar-logo { height: 40px; } }
        @media (max-width: 576px)  { .navbar-logo { height: 35px; } }

        .navbar .nav-link { color: #444; font-size: 15px; font-weight: 500; padding: 6px 4px; transition: color 0.2s; }
        .navbar .nav-link:hover  { color: #148a3a !important; }
        .navbar .nav-link.active { color: #6cba0c !important; font-weight: 600; }

        /* profile wrapper */
        .profile-wrapper { position: relative; display: inline-block; }
        .profile-img {
            height: 40px; width: 40px; object-fit: cover;
            border-radius: 50%; cursor: pointer;
            transition: all 0.3s; border: 2px solid transparent;
        }
        .profile-img:hover { border-color: #1fa84f; transform: scale(1.05); }

        /* dropdown */
        .profile-dropdown {
            position: absolute; top: calc(100% + 12px); right: 0;
            width: 220px; background: #fff; border-radius: 12px;
            box-shadow: 0 8px 28px rgba(0,0,0,0.13); z-index: 9999;
            overflow: hidden; opacity: 0; visibility: hidden;
            transform: translateY(-8px);
            transition: opacity 0.22s ease, transform 0.22s ease, visibility 0.22s;
            pointer-events: none;
        }
        .profile-dropdown::before {
            content: ''; position: absolute; top: -6px; right: 14px;
            width: 12px; height: 12px; background: #f9fdf6;
            transform: rotate(45deg); border-radius: 2px;
        }
        .profile-dropdown.open { opacity: 1; visibility: visible; transform: translateY(0); pointer-events: auto; }

        .dropdown-header {
            display: flex; align-items: center; gap: 10px;
            padding: 14px 16px; background: #f9fdf6; border-bottom: 1px solid #eee;
        }
        .dropdown-header img { width: 40px; height: 40px; border-radius: 50%; object-fit: cover; border: 2px solid #1fa84f; flex-shrink: 0; }
        .dropdown-header .d-name  { font-weight: 700; font-size: 14px; color: #222; line-height: 1.2; }
        .dropdown-header .d-phone { font-size: 12px; color: #888; margin-top: 2px; }

        .dropdown-link {
            display: flex; align-items: center; gap: 12px;
            padding: 11px 16px; color: #333; font-size: 14px;
            font-family: 'Poppins', sans-serif; text-decoration: none;
            transition: background 0.15s, color 0.15s, padding-left 0.15s;
        }
        .dropdown-link i { font-size: 14px; color: #1fa84f; width: 16px; text-align: center; }
        .dropdown-link:hover { background: #f4fbf5; color: #1fa84f; padding-left: 20px; }
        .dropdown-link.logout { border-top: 1px solid #eee; color: #e53935; }
        .dropdown-link.logout i { color: #e53935; }
        .dropdown-link.logout:hover { background: #fff5f5; color: #c62828; padding-left: 20px; }

        @media (max-width: 991px) {
            .navbar .container-fluid { position: relative; }
            .navbar-brand { position: absolute; left: 50%; transform: translateX(-50%); margin: 0; }
            .navbar .ms-auto { position: relative; z-index: 2; }
            .navbar-toggler { position: relative; z-index: 2; border: none; box-shadow: none; background: none !important; }
            .navbar-toggler i { font-size: 24px; color: #333; }
        }
        .offcanvas { background: #fff; }
        .offcanvas-header { border-bottom: 1px solid #f0f0f0; padding: 20px; }
        .offcanvas-title { font-weight: 700; font-size: 18px; color: #333; }

        /* ===== PAGE CONTENT ===== */
        .main-container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 20px;
            min-height: calc(100vh - 140px);
            display: grid;
            grid-template-columns: 320px 1fr;
            gap: 25px;
            align-items: stretch;
        }

        .profile-sidebar {
            background: var(--blue);
            color: #fff;
            border-radius: 20px;
            padding: 40px 25px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100%;
            text-align: center;
            box-shadow: 0 10px 30px rgba(3,131,194,0.2);
        }

        .avatar-wrap {
            position: relative; width: 140px; height: 140px; margin-bottom: 25px;
        }
        .avatar-wrap img {
            width: 100%; height: 100%; object-fit: cover;
            border-radius: 50%; border: 4px solid #fff;
        }
        .badge-status-small {
            position: absolute; top: 5px; right: 5px;
            background: var(--green); color: #fff;
            width: 35px; height: 35px; border-radius: 50%;
            border: 3px solid #fff;
            display: flex; align-items: center; justify-content: center;
        }

        .username { font-size: 22px; color: #92ed22; margin-bottom: 10px; font-weight: 600; }
        .user-id  { font-size: 14px; opacity: 0.9; margin-bottom: 30px; }

        .sidebar-details { width: 100%; }
        .sidebar-details p {
            font-size: 14px; margin: 15px 0; padding: 12px;
            background: rgba(255,255,255,0.1); border-radius: 12px;
        }

        .profile-content {
            background: #fff; border-radius: 20px; padding: 40px;
            min-height: 100%; box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        .top-bar h2 { color: var(--green); margin-bottom: 30px; font-size: 28px; }

        .info-grid { display: grid; grid-template-columns: repeat(2,1fr); gap: 10px; }
        .info-card {
            padding: 5px 20px; border-radius: 15px;
            border: 1px solid #eee; position: relative; overflow: hidden;
        }
        .info-card label { font-size: 12px; color: #666; margin-bottom: 10px; display: block; }
        .info-card span  { font-weight: 600; font-size: 16px; color: #333; }

        .about-card { grid-column: 1/-1; margin-top: 25px; }
        .about-card p { margin-top: 15px; line-height: 1.6; }

        .action-bar {
            margin-top: 40px; display: flex; gap: 15px;
            justify-content: flex-end; padding-top: 25px; border-top: 1px solid #eee;
        }

        .btn { border-radius: 25px; padding: 12px 30px; font-weight: 500; border: none; font-size: 15px; }
        .btn-primary   { background: var(--blue);  color: #fff; }
        .btn-success   { background: var(--green); color: #fff; }
        .btn-secondary { background: #6c757d; color: #fff; }

        .form-control {
            border: 1px solid #ddd; border-radius: 10px;
            padding: 12px 15px; height: 48px;
            font-family: 'Poppins', sans-serif;
        }

        .iti { width: 100%; }
        .country-select-wrap { position: relative; width: 100%; }
        .country-select-wrap select { padding-right: 35px; cursor: pointer; }

        @media (max-width: 992px) {
            .main-container { grid-template-columns: 1fr; gap: 30px; }
            .profile-sidebar { min-height: auto; border-radius: 20px; }
            .avatar-wrap { margin-bottom: 0; }
            .sidebar-details { width: 50%; }
            .profile-content { padding: 20px !important; }
            .top-bar h2 { font-size: 20px; }
            .info-card span { font-size: 12px; }
            .info-card label { font-size: 10px; }
            .btn-primary, .btn-secondary, .btn-success { width: 30%; }
        }
        @media (max-width: 556px) {
            .sidebar-details { width: 100%; }
            .sidebar-details p { font-size: 10px; margin: 8px 0; padding: 8px; }
            .avatar-wrap { width: 110px; height: 110px; }
            .badge-status-small { width: 25px; height: 25px; top: 8px; right: 8px; }
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
        <li class="nav-item"><a class="nav-link active" href="userProfile.html">Profile</a></li>
        <li class="nav-item"><a class="nav-link" href="myService.html">My Service</a></li>
        <li class="nav-item"><a class="nav-link" href="needHelp.html">Need Help</a></li>
      </ul>
    </div>

    <div class="d-flex align-items-center gap-3 ms-auto">
      <div class="profile-wrapper" id="profileWrapper">
        <img src="https://i.pravatar.cc/300" class="profile-img" id="profileBtn" alt="Profile">
        <div class="profile-dropdown" id="profileDropdown">
          <div class="dropdown-header">
            <img src="https://i.pravatar.cc/300" alt="Profile">
            <div>
              <div class="d-name" id="navName">John Doe</div>
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
      <li class="nav-item"><a class="nav-link" href="myService.html">My Service</a></li>
      <li class="nav-item"><a class="nav-link" href="needHelp.html">Need Help</a></li>
    </ul>
  </div>
</div>

<!-- ===== PAGE CONTENT ===== -->
<div class="main-container">

    <div class="profile-sidebar">
        <div class="avatar-wrap">
            <img src="https://i.pravatar.cc/300" alt="Profile">
            <span class="badge-status-small"><i class="fa fa-check"></i></span>
        </div>
        <div>
            <h3 class="username" id="sidebarName">John Doe</h3>
            <p class="user-id">User ID: USR1024</p>
        </div>
        <div class="sidebar-details">
            <p>Joined: Jan 2024</p>
            <p>Country: <span id="sidebarCountry">India</span></p>
            <p>Last Active: Today</p>
        </div>
    </div>

    <div class="profile-content">
        <div class="top-bar">
            <h2>Profile Details</h2>
        </div>

        <div class="info-grid">
            <div class="info-card"><label>Name</label><span data-key="name"></span></div>
            <div class="info-card"><label>Email</label><span data-key="email"></span></div>
            <div class="info-card"><label>Mobile</label><span data-key="mobile"></span></div>
            <div class="info-card"><label>Company</label><span data-key="company"></span></div>
            <div class="info-card"><label>Company Type</label><span data-key="companyType"></span></div>
            <div class="info-card"><label>Country</label><span data-key="country"></span></div>
        </div>

        <div class="info-card about-card">
            <label>About</label>
            <p data-key="about"></p>
        </div>

        <div class="action-bar">
            <button id="cancelBtn" class="btn btn-secondary d-none">Cancel</button>
            <button id="editBtn" class="btn btn-primary">Edit Profile</button>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/intlTelInput.min.js"></script>
<script>
// ── PROFILE DROPDOWN ──
const profileBtn      = document.getElementById('profileBtn');
const profileDropdown = document.getElementById('profileDropdown');
const profileWrapper  = document.getElementById('profileWrapper');
profileBtn.addEventListener('click', e => { e.stopPropagation(); profileDropdown.classList.toggle('open'); });
document.addEventListener('click', e => { if (!profileWrapper.contains(e.target)) profileDropdown.classList.remove('open'); });

// ── PROFILE EDIT ──
const userData = {
    name: "John Doe",
    mobile: "+91 88888 88888",
    email: "abc@email.com",
    company: "Global Assist",
    companyType: "Security Services",
    country: "India",
    about: "Professional service provider for security, housekeeping & manpower solutions."
};

const fields    = document.querySelectorAll("[data-key]");
const editBtn   = document.getElementById("editBtn");
const cancelBtn = document.getElementById("cancelBtn");
let editMode = false, iti = null;

function loadView() {
    fields.forEach(el => { el.innerText = userData[el.dataset.key] || ""; });
    document.getElementById("sidebarName").innerText = userData.name;
    document.getElementById("sidebarCountry").innerText = userData.country;
    document.getElementById("navName").innerText = userData.name;
}

editBtn.onclick = () => {
    if (!editMode) {
        editMode = true;
        fields.forEach(el => {
            const key = el.dataset.key, val = userData[key] || "";
            if (key === "email") return;
            if (key === "mobile") {
                el.innerHTML = `<input id="phone" type="tel" class="form-control">`;
                iti = window.intlTelInput(document.getElementById("phone"), {
                    initialCountry: "in", separateDialCode: true, nationalMode: false,
                    dropdownContainer: document.body,
                    utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/utils.js"
                });
                iti.setNumber(val);
            } else if (key === "country") {
                const countries = window.intlTelInputGlobals.getCountryData();
                el.innerHTML = `<div class="country-select-wrap"><select class="form-control">${countries.map(c=>`<option value="${c.name}"${c.name===val?' selected':''}>${c.name}</option>`).join('')}</select></div>`;
            } else {
                el.innerHTML = `<input class="form-control" value="${val}">`;
            }
        });
        editBtn.innerText = "Save"; editBtn.className = "btn btn-success";
        cancelBtn.classList.remove("d-none");
    } else {
        fields.forEach(el => {
            const key = el.dataset.key;
            if (key === "email") return;
            if (key === "mobile") {
                const cc = "+" + iti.getSelectedCountryData().dialCode;
                const num = iti.getNumber(intlTelInputUtils.numberFormat.NATIONAL);
                userData[key] = cc + " " + num;
            } else {
                const input = el.querySelector("input, select");
                userData[key] = input ? input.value : "";
            }
            el.innerText = userData[key];
        });
        editMode = false; iti = null;
        editBtn.innerText = "Edit Profile"; editBtn.className = "btn btn-primary";
        cancelBtn.classList.add("d-none");
        loadView();
    }
};

cancelBtn.onclick = () => location.reload();
loadView();
</script>
</body>
</html>
