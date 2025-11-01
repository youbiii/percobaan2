<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Bengkel Berkat Yakin')</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts: Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    {{-- SCRIPT PENTING UNTUK INTERAKTIVITAS DROPDOWN --}}
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Custom CSS & Konfigurasi Tailwind -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8fafc;
        }

        /* Animasi sederhana untuk elemen saat scroll */
        .animate-on-scroll {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }

        .animate-on-scroll.is-visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
    @stack('styles')
</head>

<body class="text-slate-800">

    @include('layouts.partials.header')

    <main>
        @yield('content')
    </main>

    @include('layouts.partials.footer')

    <script>
        // Inisialisasi Lucide Icons
        lucide.createIcons();

        // Script untuk Hamburger Menu
        const hamburgerButton = document.getElementById('hamburger-button');
        const mobileMenu = document.getElementById('mobile-menu');

        if (hamburgerButton) {
            hamburgerButton.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }

        // Script untuk animasi saat scroll (jika masih digunakan)
        const scrollElements = document.querySelectorAll(".animate-on-scroll");
        const elementInView = (el, dividend = 1) => {
            const elementTop = el.getBoundingClientRect().top;
            return (
                elementTop <= (window.innerHeight || document.documentElement.clientHeight) / dividend
            );
        };
        const displayScrollElement = (element) => {
            element.classList.add("is-visible");
        };
        const handleScrollAnimation = () => {
            scrollElements.forEach((el) => {
                if (elementInView(el, 1.25)) {
                    displayScrollElement(el);
                }
            });
        }
        window.addEventListener("scroll", handleScrollAnimation);
        handleScrollAnimation(); // Panggil saat load
    </script>
    @stack('scripts')

</body>

</html>
 