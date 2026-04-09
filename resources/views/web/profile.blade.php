<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Profile Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <style>
        /* SAME CSS — no change */
        {{--
            Keep your full CSS here as-is
        --}}
    </style>
</head>

<body>

<div class="profile-page">

    <!-- LEFT SIDEBAR -->
    <div class="profile-sidebar">

        <div class="avatar-wrap">
            <img src="{{ $user->profile_image ?? asset('images/default-user.png') }}"
                 class="profile-img">
        </div>

        <h3 class="mt-3 username">{{ $user->name }}</h3>

        <p>User ID: <strong>USR{{ $user->id }}</strong></p>

        <span class="badge-status">
            {{ $user->status ?? 'Active' }}
        </span>

        <div class="profile-meta">
            <p>
                <i class="fa-solid fa-calendar-days"></i>
                Joined:
                <span>{{ $user->created_at->format('M Y') }}</span>
            </p>

            <p>
                <i class="fa-solid fa-rotate"></i>
                Last Update:
                <span>{{ $user->updated_at->diffForHumans() }}</span>
            </p>

            <p>
                <i class="fa-solid fa-earth-asia"></i>
                Country:
                <span>{{ $user->country ?? 'India' }}</span>
            </p>
        </div>
    </div>

    <!-- RIGHT CONTENT -->
    <div class="profile-content">

        <div class="top-bar">
            <h2>Profile Details</h2>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-danger logout-btn">Logout</button>
            </form>
        </div>

        <div class="info-grid">
            <div class="info-card">
                <label>Name</label>
                <span data-key="name">{{ $user->name }}</span>
            </div>

            <div class="info-card">
                <label>Mobile Number</label>
                <span data-key="mobile">{{ $user->phone ?? 'N/A' }}</span>
            </div>

            <div class="info-card">
                <label>Email</label>
                <span data-key="email">{{ $user->email }}</span>
            </div>

            <div class="info-card">
                <label>Company Name</label>
                <span data-key="company-name">{{ $user->company_name ?? '-' }}</span>
            </div>

            <div class="info-card">
                <label>Company Type</label>
                <span data-key="company-type">{{ $user->company_type ?? '-' }}</span>
            </div>

            <div class="info-card">
                <label>Country</label>
                <span data-key="country">{{ $user->country ?? 'India' }}</span>
            </div>
        </div>

        <div class="about-box">
            <h5>About</h5>
            <p data-key="about">
                {{ $user->about ?? 'No description available.' }}
            </p>
        </div>

        <div class="action-bar d-flex justify-content-end gap-2">
            <button id="cancelBtn" class="btn btn-secondary action-btn d-none">
                Cancel
            </button>

            <button id="editBtn" class="btn btn-primary action-btn">
                Edit Profile
            </button>
        </div>

    </div>
</div>

<script>
    // SAME JS (no API needed now)
    let editMode = false;
    const editBtn = document.getElementById("editBtn");
    const cancelBtn = document.getElementById("cancelBtn");

    editBtn.addEventListener("click", function () {
        const fields = document.querySelectorAll("[data-key]");

        if (!editMode) {
            fields.forEach(el => {
                const val = el.innerText.trim();
                const key = el.getAttribute("data-key");

                if (el.tagName === "P") {
                    el.innerHTML = `<textarea class="form-control">${val}</textarea>`;
                } else {
                    el.innerHTML = `<input class="form-control" value="${val}">`;
                }
            });

            editBtn.innerText = "Save Profile";
            editBtn.classList.replace("btn-primary", "btn-success");
            cancelBtn.classList.remove("d-none");
            editMode = true;

        } else {
            editBtn.innerText = "Edit Profile";
            editBtn.classList.replace("btn-success", "btn-primary");
            cancelBtn.classList.add("d-none");
            editMode = false;
        }
    });
</script>

</body>
</html>
