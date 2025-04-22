<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>MyApp</title>
    {{-- css --}}
    <link href="css/styles.css" rel="stylesheet" />
    {{-- Link Tailwindcss/vite --}}
    @vite('resources/css/app.css')
    {{-- Simmple database --}}
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />

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
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>


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
