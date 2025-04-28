<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>AppKasir - Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="/currency-fill.png" type="image/x-icon" />

    {{--  rimix Icon --}}
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />

    <style>
        #navbar {
            transition: margin-left 0.7s;
        }

        #navbar.sidebar-closed {
            margin-left: 1rem;
        }
    </style>


</head>

<body class="bg-[#1E1C29] text-[#F7F8FF] min-h-screen">
    <span id="blur" for="sidebarToggle" class=" fixed inset-0 z-40 cursor-pointer"></span>
    <x-sidebar></x-sidebar>

    <div id="navbar" class="flex-1 ml-64 max-lg:ml-4 transition-[margin] duration-700">
        <x-navbar>
            {{ $title }}
        </x-navbar>

        <main class="w-full pr-4">
            {{ $slot }}
        </main>
    </div>




    <script>
        window.addEventListener("DOMContentLoaded", () => {
            const sidebarToggle = document.getElementById("sidebarToggle");
            const sidebar = document.getElementById("sidebar");
            const navbar = document.getElementById("navbar");
            const blur = document.getElementById("blur");
            blur.style.display = 'none'; // Sembunyikan blur saat sidebar tersembunyi


            sidebarToggle.addEventListener("click", () => {
                blur.classList.toggle("bg-black/20");
                blur.classList.toggle("backdrop-blur-sm");
                sidebar.classList.toggle("-translate-x-full");
                navbar.classList.toggle("sidebar-closed");

                if (sidebar.classList.contains("-translate-x-full")) {
                    blur.style.display = 'none'; // Sembunyikan blur saat sidebar tersembunyi
                } else {
                    blur.style.display = 'block'; // Tampilkan blur saat sidebar terbuka
                }
            });


            const handleResize = () => {
                if (window.innerWidth <= 1920) {
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.js" defer></script>


    @vite(['resources/css/app.css', 'resources/js/export.js'])

</body>

</html>
