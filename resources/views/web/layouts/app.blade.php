<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Global Assist')</title>

    <!-- Bootstrap -->
    {{--
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}
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
    <main class="overflow-hidden">
        @yield('content')
        <div class="alert-wrapper">
            @if(session('success'))
                <div class="alert alert-success auto-hide">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger auto-hide">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

    </main>

    <!-- Footer -->
    @include('web.partials.footer')
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const counters = document.querySelectorAll('.counter');
            counters.forEach(counter => {
                const target = +counter.getAttribute('data-target');
                const format = counter.getAttribute('data-format');
                let count = 0;
                const increment = target / 200;

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
                if (format === 'k') return Math.floor(value / 1000) + 'k';
                if (format === 'k+') return Math.floor(value / 1000) + 'k+';
                if (format === '%') return value + '%';
                return value;
            }
        });
    </script>

    <script>
        setTimeout(() => {
            document.querySelectorAll('.auto-hide').forEach(el => {
                el.style.transition = 'opacity 0.5s, transform 0.5s';
                el.style.opacity = '0';
                el.style.transform = 'translateY(-10px)';
                setTimeout(() => el.remove(), 500);
            });
        }, 3000);
    </script>


</body>

</html>