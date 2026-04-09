<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Global Assist')</title>

    <!-- Bootstrap -->
    {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <link rel="icon" type="image/png" href="{{ asset('assets/favicon.png') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/webstyle.css') }}">
</head>

<body>

    <!-- Header -->
    @include('web.partials.header')

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    @include('web.partials.footer')

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const counters = document.querySelectorAll('.counter');

            counters.forEach(counter => {
                const target = +counter.getAttribute('data-target');
                const format = counter.getAttribute('data-format');
                let count = 0;
                const increment = target / 200; // Adjust for speed

                const updateCount = () => {
                    count += increment;
                    if (count < target) {
                        counter.innerText = formatNumber(Math.floor(count), format);
                        requestAnimationFrame(updateCount);
                    } else {
                        counter.innerText = formatNumber(target, format);
                    }
                };

                updateCount();
            });

            function formatNumber(value, format) {
                if (format === 'k') {
                    return Math.floor(value / 1000) + 'k';
                } else if (format === 'k+') {
                    return Math.floor(value / 1000) + 'k+';
                } else if (format === '%') {
                    return value + '%';
                } else {
                    return value;
                }
            }
        }); 
    </script>
    {{-- <script src="{{ asset('js/validation.js') }}"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</body>

</html>