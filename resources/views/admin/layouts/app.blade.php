  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Globe Assist | India’s First Curated Flexi Workforce for Travel & Events')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Chart.js -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />

    <link rel="icon" type="image/png" href="{{ asset('assets/favicon.png') }}">
    
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> --}}
      <meta name="csrf-token" content="{{ csrf_token() }}">

  </head>


  <body>
    <div class="d-flex">
      <!-- Sidebar -->
      @include('admin.partials.sidebar')

      <!-- Main Content -->
      <div class="main-content w-100">
        <!-- Navbar-->
        @include('admin.partials.navbar')

        <!-- Page Content -->
        <div class="page-content p-3">
          @yield('content')
        </div>
      </div>
    </div>

    <!-- JS Files -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

    <!-- Common scripts -->
    {{-- <script src="{{ asset('js/validation.js') }}"></script> --}}

    <script src="{{ asset('js/script.js') }}"></script>

    <!-- Bootstrap Bundle JS (includes Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

   <!-- Change Password Modal Script -->
  <script src="{{ asset('js/change-password.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Page Specific Scripts -->
  @stack('scripts')
  </body>

  </html>