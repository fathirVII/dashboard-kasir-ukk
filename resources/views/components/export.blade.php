<div>
    <!-- I have not failed. I've just found 10,000 ways that won't work. - Thomas Edison -->
</div><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>AppKasir - Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="/currency-fill.png" type="image/x-icon" />

    
    {{-- <link href="{{ asset('css/tailwindCDN.css') }}" rel="stylesheet" /> --}}

    {{--  rimix Icon --}}
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />

</head>

<body class="bg-[#1E1C29] text-[#F7F8FF] min-h-screen">

    <div id="navbar" class="flex-1 transition-[margin] duration-700">
        <x-navbar>
            {{ $title }}
        </x-navbar>

        <main class="W-full pr-4">
            {{ $slot }}
        </main>
    </div>

</body>

</html>
