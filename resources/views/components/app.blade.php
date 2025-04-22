<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>MyApp</title>
    {{-- css --}}
    <link href="css/styles.css" rel="stylesheet" />
    {{-- Link Tailwindcss/vite --}}
    @vite('resources/css/app.css')
</head>

<body class="bg-[#1E1C29] text-[#F7F8FF] min-h-screen">
    <x-sidebar></x-sidebar>

    <div id="navbar" class="flex-1 ml-64 transition-[margin] duration-700">
        <x-navbar>
          {{$title}}
        </x-navbar>

        <main class="container mx-auto px-4 py-6">
            @yield('content')
        </main>
    </div>

    {{-- js --}}
    <script>
        window.addEventListener("DOMContentLoaded", () => {
            const sidebarToggle = document.getElementById("sidebarToggle");
            const sidebar = document.getElementById("sidebar");
            const navbar = document.getElementById("navbar");

            sidebarToggle.addEventListener("click", () => {
                sidebar.classList.toggle("-translate-x-full");
                navbar.classList.toggle("sidebar-closed");
            });
        });
    </script>


</body>

</html>
