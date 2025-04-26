<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>AppKasir - Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="/currency-fill.png" type="image/x-icon" />
    {{-- Link Tailwindcss/vite --}}
    @vite('resources/css/app.css')
    {{-- css --}}
    <link href="css/styles.css" rel="stylesheet" />
    {{--  Tailwind CDN --}}


</head>

<body class="bg-[#1E1C29] text-[#F7F8FF] min-h-screen">
    <x-sidebar></x-sidebar>

    <div id="navbar" class="flex-1 ml-64 max-md:ml-4 transition-[margin] duration-700">
        <x-navbar>
            {{ $title }}
        </x-navbar>

        <main class="W-full pr-4">
            {{ $slot }}
        </main>
    </div>




    <script>
        window.addEventListener("DOMContentLoaded", () => {
            const sidebarToggle = document.getElementById("sidebarToggle");
            const sidebar = document.getElementById("sidebar");
            const navbar = document.getElementById("navbar");

            sidebarToggle.addEventListener("click", () => {
                sidebar.classList.toggle("-translate-x-full");
                navbar.classList.toggle("sidebar-closed");
            });

            const handleResize = () => {
                if (window.innerWidth <= 1024) { 
                    sidebar.classList.add("-translate-x-full");
                    navbar.classList.add("sidebar-closed");
                } else {
                    sidebar.classList.remove("-translate-x-full");
                    navbar.classList.remove("sidebar-closed");
                }
            };

            handleResize();

            window.addEventListener("resize", handleResize);
        });
    </script>

    <style>
        #navbar {
            transition: margin-left 0.7s;
        }

        #navbar.sidebar-closed {
            margin-left: 1rem;
        }
    </style>

    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.js" defer></script>

</body>

</html>
