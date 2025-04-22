<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>AppKasir - Dashboard</title>
<link rel="icon" href="/currency-fill.png" type="image/x-icon" />
    {{-- css --}}
    <link href="css/styles.css" rel="stylesheet" />
    {{-- Link Tailwindcss/vite --}}
    @vite('resources/css/app.css')
    {{-- Simmple database --}}

</head>

<body class="bg-[#1E1C29] text-[#F7F8FF] min-h-screen">
    <x-sidebar></x-sidebar>

    <div id="navbar" class="flex-1 ml-[16rem] transition-[margin] duration-700">
        <x-navbar>
            {{ $title }}
        </x-navbar>

        <main class="w-full pr-4    ">
            {{ $slot }}
        </main>
    </div>

    {{-- js --}}
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.js" defer></script>


    <script>
        window.addEventListener("DOMContentLoaded", () => {
            const sidebarToggle = document.getElementById("sidebarToggle");
            const sidebar = document.getElementById("sidebar");
            const navbar = document.getElementById("navbar");

            // Toggle manual
            sidebarToggle.addEventListener("click", () => {
                sidebar.classList.toggle("-translate-x-full");
                navbar.classList.toggle("sidebar-closed");
            });

            // Auto close on small screens
            const handleResize = () => {
                if (window.innerWidth <= 768) { // md breakpoint = 768px
                    sidebar.classList.add("-translate-x-full");
                    navbar.classList.add("sidebar-closed");
                } else {
                    sidebar.classList.remove("-translate-x-full");
                    navbar.classList.remove("sidebar-closed");
                }
            };

            // Jalankan saat pertama kali halaman dimuat
            handleResize();

            // Jalankan ketika layar di-resize
            window.addEventListener("resize", handleResize);
        });

    </script>



</body>

</html>
